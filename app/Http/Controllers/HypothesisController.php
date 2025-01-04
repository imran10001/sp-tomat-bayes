<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Evidence;
use App\Models\Hypothesis;
use App\Models\HypothesisImage;
use App\Models\Rule;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HypothesisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hypothesis.index',[
            'title' => 'Hypothesis - '.Setting::where('component', 'hypothesis')->first()->value, 
            'hypothesis_data' => Hypothesis::orderBy('id','desc')->get()
        ]);
    }

    public function autoCode(){
        $lates_evidence = Hypothesis::orderby('id', 'desc')->first();
        $code = $lates_evidence->code;
        $order = (int) substr($code, 2, 3);
        $order++;
        $letter = "P";
        $code = $letter . sprintf("%03s", $order);
        return $code;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hypothesis.create',[
            'title' => 'Hypothesis',
            'get_auto_code' => $this->autoCode()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'solution' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        // Buat data Hypothesis
        $hypothesis = Hypothesis::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'solution' => $request->solution,
        ]);

        // Simpan setiap gambar ke dalam tabel hypothesis_images
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = 'Hypothesis_' . date('YmdHis') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('Public/Hypothesis-Image', $imageName);

                // Log::info('Image uploaded to: ' . $image);


                // Simpan nama gambar ke tabel hypothesis_images
                HypothesisImage::create([
                    'hypothesis_id' => $hypothesis->id,
                    'image_path' => $imageName,
                ]);

                // Log::info('Image saved to database: ' . $imageName);

            }
        }
        
        // $image = $request->file('image');
        // $imageName = 'Hypothesis' . date('YmdHis') . '.' . $image->getClientOriginalExtension();
        // $image->storeAs('Public/Hypothesis-Image', $imageName);

        // // Buat data Hypothesis
        // $hypothesis = Hypothesis::create([
        //     'code' => $request->code,
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'solution' => $request->solution,
        //     'image' => $imageName // Menyimpan nama file gambar
        // ]);

        // Buat data Rule untuk setiap Evidence
        foreach (Evidence::all() as $value) {
            Rule::create([
                'evidence_id' => $value->id,
                'hypothesis_id' => $hypothesis->id,
                'weight' => 0.1
            ]);
        }

        return redirect()->route('hypothesis.index')->with('status','Data created succesfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hypothesis $hypothesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('hypothesis.edit',[
            'title' => 'Hypothesis',
            'get_hypothesis' => Hypothesis::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'solution' => 'required',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg' // Nullable jika gambar tidak wajib diupdate
        ]);

        $hypothesis = Hypothesis::findOrFail($id);

        // Jika ada gambar baru yang diunggah
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = 'Hypothesis_' . date('YmdHis') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('Public/Hypothesis-Image', $imageName);

                // Simpan nama gambar ke tabel hypothesis_images
                HypothesisImage::create([
                    'hypothesis_id' => $hypothesis->id,
                    'image_path' => $imageName,
                ]);
            }
        }

        // // Jika ada gambar baru yang diunggah
        // if ($request->hasFile('image')) {
        //     // Hapus gambar lama jika ada
        //     if ($hypothesis->image && Storage::disk('local')->exists('Hypothesis-Image/' . $hypothesis->image)) {
        //         Storage::disk('local')->delete('Public/Hypothesis-Image/' . $hypothesis->image);
        //     }

        //     // Unggah gambar baru
        //     $image = $request->file('image');
        //     $imageName = 'Hypothesis_' . date('YmdHis') . '.' . $image->getClientOriginalExtension();
        //     $image->storeAs('Public/Hypothesis-Image', $imageName);

        //     // Update nama gambar di database
        //     $hypothesis->image = $imageName;
        // }

        // Update data lainnya
        $hypothesis->update([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'solution' => $request->solution,
        ]);

        // Tidak perlu update Rule jika tidak ada perubahan

        return redirect()->route('hypothesis.index')->with('status', 'Data updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Ambil data hypothesis berdasarkan ID
        $hypothesis = Hypothesis::findOrFail($id);

        // Hapus semua gambar terkait
        foreach ($hypothesis->images as $image) {
            Storage::disk('local')->delete('Public/Hypothesis-Images/' . $image->image_path);
            $image->delete();
        }

        // // Hapus gambar jika ada
        // if ($hypothesis->image) {
        //     Storage::disk('local')->delete('Public/Hypothesis-Image/' . $hypothesis->image);
        // }
        Diagnosis::where('hypothesis_id',$id)->delete();
        Rule::where('hypothesis_id',$id)->delete();
        Hypothesis::where('id',$id)->delete();
        return redirect()->route('hypothesis.index')->with('status','Data deleted succesfully!');
    }
}
