<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [

            /* ===============================
               1. TEKNIK INFORMATIKA (10)
            =============================== */
            ['category_id' => 1, 'title' => 'Frontend Developer', 'description' => 'HTML, CSS, JavaScript, Vue.js, React, UI responsif.'],
            ['category_id' => 1, 'title' => 'Backend Developer', 'description' => 'Laravel, PHP, REST API, MySQL, autentikasi, server.'],
            ['category_id' => 1, 'title' => 'Mobile Developer', 'description' => 'Flutter, Dart, Firebase, UI mobile.'],
            ['category_id' => 1, 'title' => 'Data Analyst', 'description' => 'Python, SQL, Excel, machine learning dasar.'],
            ['category_id' => 1, 'title' => 'UI/UX Designer', 'description' => 'Figma, wireframe, user research, prototyping.'],
            ['category_id' => 1, 'title' => 'DevOps Engineer', 'description' => 'CI/CD, Docker, Linux, pipeline deployment.'],
            ['category_id' => 1, 'title' => 'QA Tester', 'description' => 'Manual testing, automation testing, bug reporting.'],
            ['category_id' => 1, 'title' => 'Cybersecurity Analyst', 'description' => 'Keamanan sistem, penetration testing, jaringan.'],
            ['category_id' => 1, 'title' => 'Database Administrator', 'description' => 'Query optimization, MySQL, indexing.'],
            ['category_id' => 1, 'title' => 'AI/ML Engineer', 'description' => 'Machine learning, Python, model training.'],

            /* ===============================
               2. AGRIBISNIS (10)
            =============================== */
            ['category_id' => 2, 'title' => 'Penyuluh Pertanian', 'description' => 'Pendampingan petani, budidaya, pemupukan.'],
            ['category_id' => 2, 'title' => 'Quality Control Pangan', 'description' => 'Standar pangan, pengecekan kualitas.'],
            ['category_id' => 2, 'title' => 'Analis Komoditas', 'description' => 'Analisis pasar komoditas pertanian.'],
            ['category_id' => 2, 'title' => 'Manajer Agribisnis', 'description' => 'Manajemen usaha pertanian, produksi.'],
            ['category_id' => 2, 'title' => 'Ahli Hortikultura', 'description' => 'Budidaya sayur dan buah, hama penyakit.'],
            ['category_id' => 2, 'title' => 'Ahli Tanah', 'description' => 'Analisis kesuburan tanah, pemupukan.'],
            ['category_id' => 2, 'title' => 'Ahli Perkebunan', 'description' => 'Perawatan tanaman perkebunan, panen.'],
            ['category_id' => 2, 'title' => 'Staf Riset Pertanian', 'description' => 'Riset bibit, uji coba tanaman.'],
            ['category_id' => 2, 'title' => 'Field Officer', 'description' => 'Monitoring produksi pertanian di lapangan.'],
            ['category_id' => 2, 'title' => 'Supply Chain Agribisnis', 'description' => 'Distribusi hasil tani, logistik.'],

            /* ===============================
               3. BIOTEKNOLOGI (10)
            =============================== */
            ['category_id' => 3, 'title' => 'Asisten Peneliti Biotek', 'description' => 'PCR, kultur jaringan, DNA.'],
            ['category_id' => 3, 'title' => 'Quality Assurance Lab', 'description' => 'Pengecekan sampel biologis.'],
            ['category_id' => 3, 'title' => 'Food Technologist', 'description' => 'R&D pangan, fermentasi.'],
            ['category_id' => 3, 'title' => 'Lab Technician', 'description' => 'Pemrosesan sampel, instrumen lab.'],
            ['category_id' => 3, 'title' => 'Bioprocess Engineer', 'description' => 'Fermentasi industri, kultur mikroba.'],
            ['category_id' => 3, 'title' => 'R&D Scientist', 'description' => 'Riset bioteknologi tingkat lanjut.'],
            ['category_id' => 3, 'title' => 'Genetic Analyst', 'description' => 'Analisis genom, sekuensing DNA.'],
            ['category_id' => 3, 'title' => 'Lab Quality Controller', 'description' => 'Validasi proses dan dokumentasi.'],
            ['category_id' => 3, 'title' => 'Environmental Analyst', 'description' => 'Uji kualitas lingkungan, mikrobiologi.'],
            ['category_id' => 3, 'title' => 'Bioinformatics Assistant', 'description' => 'Analisis data biologis, genomik.'],

            /* ===============================
               4. FARMASI (10)
            =============================== */
            ['category_id' => 4, 'title' => 'Apoteker', 'description' => 'Pelayanan resep, farmasi klinis.'],
            ['category_id' => 4, 'title' => 'Regulatory Officer', 'description' => 'Registrasi obat, BPOM.'],
            ['category_id' => 4, 'title' => 'R&D Formulasi', 'description' => 'Pengembangan formula obat.'],
            ['category_id' => 4, 'title' => 'Analis Farmasi', 'description' => 'Uji laboratorium obat.'],
            ['category_id' => 4, 'title' => 'Apoteker Industri', 'description' => 'Produksi obat skala besar.'],
            ['category_id' => 4, 'title' => 'Clinical Research Associate', 'description' => 'Uji klinis obat.'],
            ['category_id' => 4, 'title' => 'Quality Control Farmasi', 'description' => 'QC bahan baku dan obat.'],
            ['category_id' => 4, 'title' => 'Quality Assurance Farmasi', 'description' => 'Dokumentasi QA, validasi produk.'],
            ['category_id' => 4, 'title' => 'Staf Produksi Farmasi', 'description' => 'Perakitan obat, mixing, packaging.'],
            ['category_id' => 4, 'title' => 'Farmasis Klinis Rumah Sakit', 'description' => 'Konseling obat untuk pasien.'],

            /* ===============================
               5. TEKNIK ELEKTRO (10)
            =============================== */
            ['category_id' => 5, 'title' => 'Electrical Engineer', 'description' => 'Instalasi listrik, kontrol tenaga.'],
            ['category_id' => 5, 'title' => 'PLC Programmer', 'description' => 'Otomasi industri, ladder logic.'],
            ['category_id' => 5, 'title' => 'Embedded System Engineer', 'description' => 'IoT, mikrokontroler.'],
            ['category_id' => 5, 'title' => 'Telecommunication Engineer', 'description' => 'Jaringan telekomunikasi.'],
            ['category_id' => 5, 'title' => 'Instrumentation Engineer', 'description' => 'Sensor, kontrol alat industri.'],
            ['category_id' => 5, 'title' => 'Power System Engineer', 'description' => 'Sistem tenaga listrik, relai.'],
            ['category_id' => 5, 'title' => 'SCADA Engineer', 'description' => 'Sistem SCADA, monitoring industri.'],
            ['category_id' => 5, 'title' => 'Maintenance Engineer', 'description' => 'Perawatan mesin listrik.'],
            ['category_id' => 5, 'title' => 'Automation Engineer', 'description' => 'Robotik, sistem otomatis.'],
            ['category_id' => 5, 'title' => 'Renewable Energy Engineer', 'description' => 'Energi surya, angin.'],

            /* ===============================
               6. TEKNIK INDUSTRI (10)
            =============================== */
            ['category_id' => 6, 'title' => 'Quality Control Engineer', 'description' => 'SPC, QA, mutu barang.'],
            ['category_id' => 6, 'title' => 'Production Planner', 'description' => 'Perencanaan produksi.'],
            ['category_id' => 6, 'title' => 'Lean Manufacturing Specialist', 'description' => '5S, Kaizen, Six Sigma.'],
            ['category_id' => 6, 'title' => 'Industrial Engineer', 'description' => 'Efisiensi proses produksi.'],
            ['category_id' => 6, 'title' => 'Logistics Coordinator', 'description' => 'Distribusi dan supply chain.'],
            ['category_id' => 6, 'title' => 'Procurement Staff', 'description' => 'Pembelian bahan baku.'],
            ['category_id' => 6, 'title' => 'Project Engineer', 'description' => 'Manajemen proyek produksi.'],
            ['category_id' => 6, 'title' => 'Safety Engineer', 'description' => 'K3, keselamatan kerja.'],
            ['category_id' => 6, 'title' => 'Manufacturing Engineer', 'description' => 'Optimasi lini produksi.'],
            ['category_id' => 6, 'title' => 'Data Industrial Analyst', 'description' => 'Analisis data produksi.'],

            /* ===============================
               7. TEKNOLOGI PANGAN HALAL (10)
            =============================== */
            ['category_id' => 7, 'title' => 'Auditor Halal', 'description' => 'Sertifikasi halal, audit bahan baku.'],
            ['category_id' => 7, 'title' => 'Food Safety Officer', 'description' => 'HACCP, sanitasi, keamanan pangan.'],
            ['category_id' => 7, 'title' => 'Halal Compliance Officer', 'description' => 'BPJPH, dokumentasi halal.'],
            ['category_id' => 7, 'title' => 'R&D Pangan Halal', 'description' => 'Pengembangan produk halal.'],
            ['category_id' => 7, 'title' => 'Quality Control Pangan Halal', 'description' => 'QC produk makanan halal.'],
            ['category_id' => 7, 'title' => 'Food Production Staff', 'description' => 'Proses produksi makanan.'],
            ['category_id' => 7, 'title' => 'Halal Supply Chain Analyst', 'description' => 'Distribusi halal, logistik.'],
            ['category_id' => 7, 'title' => 'Halal Auditor Assistant', 'description' => 'Pendampingan audit halal.'],
            ['category_id' => 7, 'title' => 'Food Packaging Specialist', 'description' => 'Pengemasan produk pangan.'],
            ['category_id' => 7, 'title' => 'Halal Certification Coordinator', 'description' => 'Dokumen sertifikasi halal.'],

        ];

        Job::insert($jobs);
    }
}
