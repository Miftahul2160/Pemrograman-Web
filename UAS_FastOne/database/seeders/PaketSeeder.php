<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paket; // Import model Paket

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * This will populate the 'pakets' table with initial data.
     */
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat jika seeder dijalankan lagi
        Paket::query()->delete();

        $pakets = [
            [
                'nama' => 'Paket Basic (Normal Punch)',
                'slug' => 'basic',
                'harga' => 'Rp 180.000',
                'gambar' => 'paket-basic-hero.jpg',
                'judul' => 'Solusi Internet Handal untuk Keseharian Anda',
                'deskripsi' => 'Nikmati koneksi internet stabil dan handal untuk kebutuhan sehari-hari Anda. Paket Basic dirancang untuk pengguna rumahan yang membutuhkan internet untuk browsing, media sosial, streaming musik, dan video berkualitas standar.',
                'fitur' => [
                    '<strong>Simetris Up To 20 Mbps:</strong> Kecepatan download dan upload yang seimbang, ideal untuk video call, belajar online, dan mengunggah konten tanpa hambatan.',
                    '<strong>Layanan Call Center 24/7:</strong> Dapatkan bantuan kapan saja Anda membutuhkannya melalui tim dukungan pelanggan kami yang responsif.',
                    '<strong>Free Disney Hotstar 3 Bulan:</strong> Nikmati ribuan jam hiburan dari Disney, Pixar, Marvel, dan lainnya selama 3 bulan pertama tanpa biaya tambahan.',
                ]
            ],
            [
                'nama' => 'Paket Standard (Sharp Punch)',
                'slug' => 'standard',
                'harga' => 'Rp 280.000',
                'gambar' => 'paket-standard-hero.jpg',
                'judul' => 'Koneksi Super Cepat untuk Produktivitas & Hiburan',
                'deskripsi' => 'Paket Standard adalah pilihan ideal untuk keluarga modern atau para profesional yang bekerja dari rumah. Nikmati kecepatan yang lebih tinggi untuk streaming HD, video conference tanpa hambatan, dan pengalaman online yang lebih kaya.',
                'fitur' => [
                    '<strong>Simetris Up To 30 Mbps:</strong> Streaming film Full HD, bermain game online, dan bekerja dari rumah dengan beberapa perangkat secara bersamaan tanpa lag.',
                    '<strong>Layanan Call Center 24/7:</strong> Akses tak terbatas ke serial TV, film, dan konten eksklusif dari Netflix dan VIU selama 6 bulan.',
                    '<strong>Free Netflix & VIU 6 Bulan:</strong> Dapatkan penanganan lebih cepat untuk setiap pertanyaan atau kendala teknis yang Anda hadapi.',
                ]
            ],
            [
                'nama' => 'Paket Pro (Heavy Punch)',
                'slug' => 'pro',
                'harga' => 'Rp 400.000',
                'gambar' => 'paket-pro-hero.jpg',
                'judul' => 'Kecepatan Superior untuk Performa Tanpa Kompromi',
                'deskripsi' => 'Untuk Anda para profesional, gamer sejati, content creator, atau keluarga dengan kebutuhan internet super intensif, Paket Pro hadir dengan kecepatan superior dan fitur premium. Rasakan pengalaman online tanpa kompromi!',
                'fitur' => [
                    '<strong>Simetris Up To 50 Mbps:</strong> Transfer file besar, streaming 4K, dan bermain game kompetitif dengan latensi rendah.',
                    '<strong>Teknisi Live Caller:</strong> Akses langsung ke teknisi ahli untuk penanganan masalah yang lebih cepat dan mendalam.',
                    '<strong>Akses Cloud 20GB (6 Bulan):</strong> Simpan dan akses file penting Anda dari mana saja dengan penyimpanan cloud gratis.',
                    '<strong>Custom Access Point Device:</strong> Dapatkan perangkat Access Point yang dioptimalkan untuk performa dan jangkauan WiFi terbaik.',
                ]
            ],
            [
                'nama' => 'Paket Hemat (Ratio Punch)',
                'slug' => 'hemat',
                'harga' => 'Rp 150.000',
                'gambar' => 'paket-basic-hero.jpg',
                'judul' => 'Solusi Internet Terjangkau untuk Kebutuhan Dasar',
                'deskripsi' => 'Paket Hemat adalah solusi internet terjangkau untuk kebutuhan dasar Anda. Ideal bagi pengguna dengan budget terbatas yang memerlukan koneksi stabil untuk browsing, media sosial, dan komunikasi sehari-hari.',
                'fitur' => [
                    '<strong>Simetris Up To 20 Mbps (FUP 400 GB):</strong> Kecepatan wajar dengan batas penggunaan data (FUP) yang besar untuk penggunaan normal.',
                    '<strong>Free biaya Registrasi:</strong> Hemat biaya pendaftaran dan langsung nikmati layanan internet kami tanpa biaya awal.',
                ]
            ],
            [
                'nama' => 'Paket Bisnis (Professional Punch)',
                'slug' => 'bisnis',
                'harga' => 'Rp 600.000',
                'gambar' => 'paket-bisnis-hero.jpg',
                'judul' => 'Solusi Konektivitas Unggul untuk Bisnis Anda',
                'deskripsi' => 'Dirancang khusus untuk mendukung operasional bisnis Anda, Paket Bisnis dari FAST ONE menawarkan konektivitas internet berkecepatan tinggi, handal, dengan dukungan prioritas untuk memastikan kelancaran usaha Anda.',
                'fitur' => [
                    '<strong>Simetris Up To 100 Mbps:</strong> Ideal untuk aplikasi bisnis, transfer data besar, video conference, dan penggunaan cloud yang intensif.',
                    '<strong>Teknisi On-Home 24/7:</strong> Dukungan prioritas dengan jaminan kunjungan teknisi kapan saja untuk meminimalkan downtime.',
                    '<strong>Akses Cloud 50GB (2 Tahun):</strong> Penyimpanan data bisnis yang aman dan terjamin untuk semua file penting perusahaan Anda.',
                    '<strong>Add-on Switch/Mikrotik Controller:</strong> Manajemen jaringan yang lebih canggih untuk distribusi dan kontrol koneksi di kantor Anda.',
                ]
            ],
            [
                'nama' => 'Paket Premium (SUPER Punch)',
                'slug' => 'premium',
                'harga' => 'Rp 850.000',
                'gambar' => 'paket-premium-hero.jpg',
                'judul' => 'Konektivitas Tertinggi untuk Performa Ultimate',
                'deskripsi' => 'Paket Premium adalah solusi konektivitas internet tertinggi untuk bisnis dan pengguna profesional yang menuntut performa tanpa kompromi, keandalan maksimal, dan layanan eksklusif.',
                'fitur' => [
                    '<strong>Semua Fitur Paket Bisnis:</strong> Mendapatkan semua keunggulan dari paket bisnis, termasuk dukungan teknisi prioritas.',
                    '<strong>Simetris Up To 300 Mbps:</strong> Bandwidth masif untuk beban kerja terberat, multi-streaming 8K, dan operasional bisnis yang kritikal.',
                    '<strong>Dedicated Line:</strong> Jalur koneksi khusus untuk Anda, menjamin stabilitas dan kecepatan maksimal yang konsisten setiap saat.',
                    '<strong>Premium Care Fast-One:</strong> Layanan pelanggan VIP dengan Account Manager khusus untuk menangani semua kebutuhan Anda.',
                    '<strong>On-demand 3 Server Fast-One:</strong> Akses on-Demand terhadap resource 3 server Fast One',
                ]
            ],
            [
                'nama' => 'Paket Enterprise (Anomaly Punch)',
                'slug' => 'enterprise',
                'harga' => 'Custom',
                'gambar' => 'paket-enterprise-hero.jpg',
                'judul' => 'Solusi Internet Enterprise Kustom',
                'deskripsi' => 'Solusi Enterprise kami dirancang untuk memberikan performa, keandalan, keamanan, dan dukungan tertinggi yang dapat disesuaikan sepenuhnya dengan infrastruktur dan tujuan bisnis Anda.',
                'fitur' => [
                    '<strong>Semua Fitur Paket Premium:</strong> Mewarisi semua layanan eksklusif dari paket premium sebagai fondasi layanan Anda.',
                    '<strong>Simetris Up To 1 Gbps:</strong> Konektivitas ultra-cepat dengan bandwidth masif yang dapat disesuaikan lebih lanjut sesuai kebutuhan.',
                    '<strong>Konsultasi Professional:</strong> Tim ahli kami akan membantu merancang arsitektur jaringan terbaik untuk operasional bisnis Anda.',
                    '<strong>Fast-One Hosting 4 Tahun:</strong> Solusi hosting terintegrasi yang andal untuk semua kebutuhan web dan aplikasi bisnis Anda.',
                    '<strong>SLA Terjamin:</strong> Komitmen Service Level Agreement tertinggi untuk menjamin ketersediaan dan performa layanan.',
                    '<strong>Add-On Custom Switch & Router by Ruijie:</strong> Include Switch beserta Router dari Brand terkemuka Ruijie',
                ]
            ],
        ];

        // Looping untuk memasukkan setiap paket ke database
        foreach ($pakets as $paketData) {
            Paket::create($paketData);
        }
    }
}
