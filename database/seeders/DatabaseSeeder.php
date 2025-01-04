<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Diagnosis;
use App\Models\Evidence;
use App\Models\Hypothesis;
use App\Models\Rule;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Add user data
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            // 'avatar' => 'avatar'
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('user123'),
            'role' => 'user',
            // 'avatar' => 'avatar'
        ]);

        // Add evidence data
        Evidence::create(['code' => 'G001', 'name' => 'Tangkai daun berwarna putih']);
        Evidence::create(['code' => 'G002', 'name' => 'Daun berubah warna menjadi kuning ']);
        Evidence::create(['code' => 'G003', 'name' => 'Tanaman tampak lemah']);
        Evidence::create(['code' => 'G004', 'name' => 'Daun warna kuning bagian bawah']);
        Evidence::create(['code' => 'G005', 'name' => 'Bercak-bercak berwarna hijau kekuningan muncul di permukaan batang']);
        Evidence::create(['code' => 'G006', 'name' => 'Daun-daun menunjukkan pola mosaik dengan bercak-bercak kuning dan hijau']);
        Evidence::create(['code' => 'G007', 'name' => 'Pertumbuhan tanaman terhambat']);
        Evidence::create(['code' => 'G008', 'name' => 'Buah memiliki bercak-bercak warna yang tidak normal']);
        Evidence::create(['code' => 'G009', 'name' => 'Daun mengering dan gugur']);
        Evidence::create(['code' => 'G010', 'name' => 'Daun-daun yang terinfeksi cenderung menggulung ke atas dan ke dalam']);
        Evidence::create(['code' => 'G011', 'name' => 'Daun-daun menjadi kaku']);

        // Add hypothesis data
        Hypothesis::create(['code' => 'P001', 'name' => 'Layu fusarium', 'description' => 'penjelasan penyakit', 'solution' => 'solution']);
        Hypothesis::create(['code' => 'P002', 'name' => 'Layu bakteri', 'description' => 'penjelasan penyakit', 'solution' => 'solution']);
        Hypothesis::create(['code' => 'P003', 'name' => 'Mosaik', 'description' => 'penjelasan penyakit', 'solution' => 'solution']);
        Hypothesis::create(['code' => 'P004', 'name' => 'Virus Kuning Keriting Pada Daun Tomat', 'description' => 'penjelasan penyakit', 'solution' => 'solution']);
        // Add diagnosis data
        // Diagnosis::create(['hypothesis_id' => 1, 'name' => 'jonathan', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 1, 'name' => 'zeppeli', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 1, 'name' => 'erina', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 1, 'name' => 'dio', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 1, 'name' => 'speedwagon', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 2, 'name' => 'joseph', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 2, 'name' => 'cecar', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 2, 'name' => 'lisa', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 2, 'name' => 'jotaro', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 2, 'name' => 'kakyoin', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 2, 'name' => 'avdol', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 3, 'name' => 'polnaref', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 3, 'name' => 'josuke', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 3, 'name' => 'okuyasu', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 3, 'name' => 'koichi', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 3, 'name' => 'rohan', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 3, 'name' => 'giorno', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 4, 'name' => 'bucalati', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 4, 'name' => 'mista', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 4, 'name' => 'fugo', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 4, 'name' => 'narancia', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 4, 'name' => 'abacio', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 4, 'name' => 'jolyne', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Diagnosis::create(['hypothesis_id' => 4, 'name' => 'ermes', 'description' => 'pasien', 'value' => rand(50, 100) * 0.01]);
        // Add rule data
        Rule::create(['evidence_id' => 1, 'hypothesis_id' => 1, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 2, 'hypothesis_id' => 1, 'weight' => 0.9]);
        Rule::create(['evidence_id' => 3, 'hypothesis_id' => 1, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 4, 'hypothesis_id' => 1, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 5, 'hypothesis_id' => 1, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 6, 'hypothesis_id' => 1, 'weight' => 0.9]);
        Rule::create(['evidence_id' => 7, 'hypothesis_id' => 1, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 8, 'hypothesis_id' => 1, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 9, 'hypothesis_id' => 1, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 10, 'hypothesis_id' => 1, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 11, 'hypothesis_id' => 1, 'weight' => 0.2]);

        Rule::create(['evidence_id' => 1, 'hypothesis_id' => 2, 'weight' => 0.7]);
        Rule::create(['evidence_id' => 2, 'hypothesis_id' => 2, 'weight' => 0.1]);
        Rule::create(['evidence_id' => 3, 'hypothesis_id' => 2, 'weight' => 0.7]);
        Rule::create(['evidence_id' => 4, 'hypothesis_id' => 2, 'weight' => 0.9]);
        Rule::create(['evidence_id' => 5, 'hypothesis_id' => 2, 'weight' => 0.3]);
        Rule::create(['evidence_id' => 6, 'hypothesis_id' => 2, 'weight' => 0.3]);
        Rule::create(['evidence_id' => 7, 'hypothesis_id' => 2, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 8, 'hypothesis_id' => 2, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 9, 'hypothesis_id' => 2, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 10, 'hypothesis_id' => 2, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 11, 'hypothesis_id' => 2, 'weight' => 0.2]);

        Rule::create(['evidence_id' => 1, 'hypothesis_id' => 3, 'weight' => 0.7]);
        Rule::create(['evidence_id' => 2, 'hypothesis_id' => 3, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 3, 'hypothesis_id' => 3, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 4, 'hypothesis_id' => 3, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 5, 'hypothesis_id' => 3, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 6, 'hypothesis_id' => 3, 'weight' => 0.7]);
        Rule::create(['evidence_id' => 7, 'hypothesis_id' => 3, 'weight' => 0.9]);
        Rule::create(['evidence_id' => 8, 'hypothesis_id' => 3, 'weight' => 0.9]);
        Rule::create(['evidence_id' => 9, 'hypothesis_id' => 3, 'weight' => 0.9]);
        Rule::create(['evidence_id' => 10, 'hypothesis_id' => 3, 'weight' => 0.9]);
        Rule::create(['evidence_id' => 11, 'hypothesis_id' => 3, 'weight' => 0.9]);

        Rule::create(['evidence_id' => 1, 'hypothesis_id' => 4, 'weight' => 0.6]);
        Rule::create(['evidence_id' => 2, 'hypothesis_id' => 4, 'weight' => 0.5]);
        Rule::create(['evidence_id' => 3, 'hypothesis_id' => 4, 'weight' => 0.7]);
        Rule::create(['evidence_id' => 4, 'hypothesis_id' => 4, 'weight' => 0.2]);
        Rule::create(['evidence_id' => 5, 'hypothesis_id' => 4, 'weight' => 0.9]);
        Rule::create(['evidence_id' => 6, 'hypothesis_id' => 4, 'weight' => 0.3]);
        Rule::create(['evidence_id' => 7, 'hypothesis_id' => 4, 'weight' => 0.5]);
        Rule::create(['evidence_id' => 8, 'hypothesis_id' => 4, 'weight' => 0.5]);
        Rule::create(['evidence_id' => 9, 'hypothesis_id' => 4, 'weight' => 0.5]);
        Rule::create(['evidence_id' => 10, 'hypothesis_id' => 4, 'weight' => 0.5]);
        Rule::create(['evidence_id' => 11, 'hypothesis_id' => 4, 'weight' => 0.5]);

        // Add Setting data
        Setting::create(['component' => 'title', 'value' => 'Sistem Pakar Penyakit']);
        Setting::create(['component' => 'description', 'value' => '
            Sistem pakar adalah sistem komputer yang dirancang untuk menyelesaikan masalah atau memberikan solusi yang rumit dengan cara mengaplikasikan pengetahuan dari seorang ahli dalam bidang tertentu. Sistem pakar memanfaatkan berbagai macam metode untuk menghasilkan solusi yang tepat dan efektif. Salah satu metode yang sering digunakan dalam sistem pakar adalah metode teorema Bayes.
            Metode teorema Bayes digunakan untuk menghitung probabilitas kejadian suatu peristiwa berdasarkan kondisi awal atau informasi sebelumnya. Dalam sistem pakar, teorema Bayes digunakan untuk mengambil keputusan atau memberikan rekomendasi dengan mempertimbangkan informasi awal atau kondisi sebelumnya.
            Contoh penerapan metode teorema Bayes dalam sistem pakar adalah dalam bidang kesehatan. Seorang ahli medis dapat memanfaatkan metode ini untuk mendiagnosis suatu penyakit berdasarkan gejala dan kondisi pasien. Dalam hal ini, informasi awal atau kondisi sebelumnya adalah gejala yang dialami oleh pasien, sedangkan kejadian yang ingin diketahui probabilitasnya adalah apakah pasien tersebut menderita penyakit tertentu atau tidak.
        ']);
        Setting::create(['component' => 'evidence', 'value' => 'Gejala']);
        Setting::create(['component' => 'hypothesis', 'value' => 'Penyakit']);
    }
}
