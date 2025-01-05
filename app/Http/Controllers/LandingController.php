<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Evidence;
use App\Models\Hypothesis;
use App\Models\HypothesisImage;
use App\Models\Rule;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index', [
            'title' => 'Dashboard',
            // Filter diagnoses by the currently logged-in user
            'diagnosis_data' => Diagnosis::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->paginate(5),
            'hypothesis_data' => Hypothesis::orderBy('id', 'desc')->paginate(4),
            
        ]);
    }

    public function add()
    {
        return view('landing.add', [
            'title' => 'User',
        ]);
    }

    public function add_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
            'address' => 'required',
            // 'avatar' => 'nullable|'
        ]);

        // $defaultAvatarPath = 'public/assets/img/avatar-default.png';
        // Path avatar default
        // $defaultAvatarPath = 'assets/img/avatar-default.png';

        // Inisialisasi avatar
        // $avatarPath = $defaultAvatarPath;

        // Cek apakah user mengunggah avatar
        // if ($request->hasFile('avatar')) {
        //     $image = $request->file('avatar');
        //     $imageName = 'user_' . str_replace(' ', '_', strtolower($request->name)) . '.' . $image->getClientOriginalExtension();
        //     $image->storeAs('public/User-Avatar', $imageName); // Simpan di folder storage/public/User-Avatar
        //     $avatarPath = 'User-Avatar/' . $imageName; // Simpan nama path
        // }else{
        //     // Path avatar default
        //     $defaultAvatarPath = 'assets/img/avatar-default.png';

        //     // Inisialisasi avatar
        //     $avatarPath = $defaultAvatarPath;
        // }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'address' => $request->address,
            // 'avatar' => $avatarPath
        ]);
        

        return redirect()->route('login')->with('status', 'Akun Berhasil Dibuat');
    }

    public function edit_profile()
    {
        return view('landing.profile', [
            'title' => 'Profile'
        ]);
    }

    public function profile_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'min:6|nullable',
            'repassword' => 'same:password|nullable',
            'address' => 'required',
        ]);

        if ($request->password == '') {
            $password = User::findOrFail($id)->password;
        } else {
            $password = bcrypt($request->password);
        }

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'address' => $request->address,
        ]);

        return redirect()->route('index')->with('status', 'User updated successfully');
    }

    public function hypothesis_page()
    {
        return view('landing.hypothesis', [
            'hypothesis_data' => Hypothesis::all()
        ]);
    }


    public function hypothesis_detail($id)
    {
        return view('landing.detail', [
            'title' => 'Hypothesis',
            'get_hypothesis' => Hypothesis::with('images')->findOrFail($id),
        ]);
    }

    public function diagnosa()
    {
        return view('landing.diagnosa', [
            'title' => 'Expert System',
            'evidence' => Evidence::all(),
        ]);
    }

    public function history_page()
    {
        return view('landing.history', [
            'diagnosis_data' => Diagnosis::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get()

        ]);
    }

    public function history_detail($id)
    {
        return view('landing.history_detail', [
            'title' => 'Hypothesis',
            'get_diagnosis' => Diagnosis::findOrFail($id)
        ]);
    }

    public function destroy_history($id)
    {
        Diagnosis::where('id', $id)->delete();
        return redirect()->back()->with('status', 'Data deleted succesfully!');
    }

    public function showOtherDiagnosis($hypothesisId)
    {
        // Mengambil data Hypothesis berdasarkan ID
        $hypothesis = Hypothesis::find($hypothesisId);

        if (!$hypothesis) {
            return redirect()->back()->with('error', 'Data penyakit tidak ditemukan.');
        }
        return view('landing.more_diagnosis_detail', compact(
            'hypothesis'
        ));
    }

    public function result(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'evidence_id' => 'required|array|min:0'
        ]);

        $selectedEvidences = $request->input('evidence_id');
        // $weights = $request->input('evidence_id'); // Get the weights input by user

        $hypotheses = Rule::distinct('hypothesis_id')->pluck('hypothesis_id')->toArray();
        // $hypotheses = Hypothesis::all();

        $results = [];
        $maxWeight = null;
        $bestHypothesis = null;

        foreach ($hypotheses as $hypothesis) {
            $totalWeight = 0;
            foreach ($selectedEvidences as $evidenceId) {
                $rule = Rule::where('evidence_id', $evidenceId)
                    ->where('hypothesis_id', $hypothesis)
                    ->first();
                if ($rule) {
                    $totalWeight += $rule->weight;
                }
            }
            $results[$hypothesis] = $totalWeight;


            // calculate the contribution of each evidence
            foreach ($selectedEvidences as $evidenceId) {
                $rule = Rule::where('evidence_id', $evidenceId)
                    ->where('hypothesis_id', $hypothesis)
                    ->first();
                if ($rule && $totalWeight > 0) {
                    $contribution = $rule->weight / $totalWeight;

                    $probability_H = $rule->weight * $contribution;
                    $probabilityHypothesis[$hypothesis][$evidenceId] = $probability_H;
                } else {
                    $probabilityHypothesis[$hypothesis][$evidenceId] = 0;
                }
            }

            $totalProbabilities = [];
            foreach ($probabilityHypothesis as $hypothesis => $probability_H) {
                $totalProbabilities[$hypothesis] = array_sum($probability_H);
            }

            foreach ($selectedEvidences as $evidenceId) {
                $rule = Rule::where('evidence_id', $evidenceId)
                    ->where('hypothesis_id', $hypothesis)
                    ->first();
                if ($rule && isset($totalProbabilities[$hypothesis]) && $totalProbabilities[$hypothesis] > 0) {
                    $bayesValue = ($probability_H[$evidenceId] * $rule->weight) / $totalProbabilities[$hypothesis];
                    $bayesValues[$hypothesis][$evidenceId] = $bayesValue;
                } else {
                    $bayesValues[$hypothesis][$evidenceId] = 0;
                }
            }

            $totalBayes = [];
            foreach ($bayesValues as $hypothesis => $bayesvalue) {
                $totalBayes[$hypothesis] = array_sum($bayesvalue) * 100;
            }

            // Check if the current hypothesis has the maximum weight
            if (is_null($maxWeight) || $totalWeight > $maxWeight) {
                $maxWeight = $totalWeight;
                $bestHypothesis = $hypothesis;
            }

            // Mendapatkan nilai terbesar
            $maxTotalBayes = max($totalBayes);

            // Menemukan hipotesis dengan nilai terbesar
            $bestBayes = array_search($maxTotalBayes, $totalBayes);
        }

        // Urutkan nilai $totalBayes dari yang terbesar ke yang terkecil
        arsort($totalBayes);

        $certaintyDescriptions = []; // Array untuk menyimpan deskripsi kepastian

        foreach ($totalBayes as $hypothesisId => $bayesValue) {
            // Simpan deskripsi kepastian berdasarkan totalBayes masing-masing hypothesis
            $certaintyDescriptions[$hypothesisId] = $this->getCertaintyDescription($bayesValue);
        }

        // Mengambil data Hypothesis dengan ID $bestBayes
        $bestHypothesisData = Hypothesis::find($bestBayes);

        // Ambil data Hypothesis berdasarkan ID yang ada di $totalBayes
        $hypothesesData = Hypothesis::whereIn('id', array_keys($totalBayes))->get()->keyBy('id');

        // Ambil data evidence yang dipilih
        $selectedEvidencesData = Evidence::whereIn('id', $selectedEvidences)->get();

        // Determine certainty description based on maxTotalBayes value
        $certainty = $this->getCertaintyDescription($maxTotalBayes);

        Diagnosis::create([
            'hypothesis_id' => $bestHypothesisData->id, // Menggunakan ID dari hypothesis terbaik
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'value' => $maxTotalBayes, // Menyimpan nilai Total Bayes tertinggi
            'user_id' => Auth::id() // Simpan ID pengguna yang sedang login

        ]);

        session([
            'selectedEvidences' => $selectedEvidences,
            'totalBayes' => $totalBayes,
            'certaintyDescriptions' => $certaintyDescriptions
        ]);

        return view('landing.hasil', compact(
            'results',
            'bestHypothesis',
            'maxWeight',
            // 'evidenceContributions', 
            'probabilityHypothesis',
            'selectedEvidences',
            'totalProbabilities',
            'bayesValues',
            'totalBayes',
            'maxTotalBayes',
            'bestBayes',
            'bestHypothesisData', // Mengirim data nama dan gambar ke view
            'hypothesesData',
            'selectedEvidencesData',
            'certainty',
            'certaintyDescriptions'

        ));
    }

    private function getCertaintyDescription($value)
    {
        if ($value >= 90 && $value <= 100) {
            return 'Pasti';
        } elseif ($value >= 70 && $value < 90) {
            return 'Hampir pasti';
        } elseif ($value >= 50 && $value < 70) {
            return 'Kemungkinan besar';
        } elseif ($value >= 20 && $value < 50) {
            return 'Kemungkinan Kecil';
        } else {
            return 'Tidak ada';
        }
    }
}
