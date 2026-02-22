<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Achievement;
use App\Models\Teacher;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin SD 1 Tengguli',
            'email' => 'admin@sd1tengguli.sch.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create categories
        $categories = [
            ['name' => 'Berita Umum', 'type' => 'news'],
            ['name' => 'Pengumuman', 'type' => 'news'],
            ['name' => 'Prestasi Akademik', 'type' => 'achievement'],
            ['name' => 'Prestasi Olahraga', 'type' => 'achievement'],
        ];

        foreach($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'type' => $cat['type'],
            ]);
        }

        // Create sample news
        News::create([
            'title' => 'Selamat Datang di Website SD Negeri 1 Tengguli',
            'slug' => 'selamat-datang-di-website-sd-1-tengguli',
            'content' => 'Kami dengan bangga mempersembahkan website resmi SD Negeri 1 Tengguli. Website ini dibuat untuk memberikan informasi terkini tentang kegiatan sekolah, prestasi siswa, dan berbagai berita penting lainnya.',
            'category_id' => 1,
            'user_id' => $admin->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        // Create sample announcement
        Announcement::create([
            'title' => 'Pengumuman Penting: Pendaftaran Siswa Baru TP 2024/2025',
            'content' => 'Dibuka pendaftaran siswa baru untuk tahun pelajaran 2024/2025. Syarat dan ketentuan dapat dilihat di halaman pendaftaran.',
            'priority' => 'urgent',
            'user_id' => $admin->id,
            'published_at' => now(),
        ]);

        // Create sample achievements
        Achievement::create([
            'title' => 'Juara I Lomba Matematika Tingkat Kabupaten',
            'category' => 'akademik',
            'student_name' => 'Andi Saputra',
            'year' => 2024,
            'achievement_date' => now()->subMonths(2),
            'user_id' => $admin->id,
        ]);

        Achievement::create([
            'title' => 'Juara II Lomba Olahraga Lari 100M',
            'category' => 'olahraga',
            'student_name' => 'Siti Nurhaliza',
            'year' => 2024,
            'achievement_date' => now()->subMonths(1),
            'user_id' => $admin->id,
        ]);

        // Create sample teachers
        Teacher::create([
            'name' => 'Ibu Dra. Soemitro, M.Si',
            'position' => 'Kepala Sekolah',
            'email' => 'kepala@sd1tengguli.sch.id',
            'nip' => '196512311989032001',
            'bio' => 'Kepala Sekolah dengan pengalaman lebih dari 20 tahun di bidang pendidikan.',
        ]);

        Teacher::create([
            'name' => 'Bapak Bambang Setiawan, S.Pd',
            'position' => 'Guru',
            'email' => 'bambang@sd1tengguli.sch.id',
            'subjects' => 'Matematika, IPA',
        ]);

        Teacher::create([
            'name' => 'Ibu Ratni Wijaya, S.Pd',
            'position' => 'Guru',
            'email' => 'ratni@sd1tengguli.sch.id',
            'subjects' => 'Bahasa Indonesia, IPS',
        ]);

        // Create sample gallery
        $gallery = Gallery::create([
            'name' => 'Upacara Bendera',
            'slug' => 'upacara-bendera',
            'description' => 'Dokumentasi kegiatan upacara bendera rutin setiap hari Senin',
            'user_id' => $admin->id,
        ]);

        // Create sample settings
        Setting::put('school_name', 'SD Negeri 1 Tengguli');
        Setting::put('school_address', 'Jl. Tengguli, Kabupaten Bangli, Bali 80513');
        Setting::put('school_phone', '(0353) 23456');
        Setting::put('school_email', 'info@sd1tengguli.sch.id');
        Setting::put('principal_name', 'Ibu Dra. Soemitro, M.Si');
        Setting::put('vision', 'Terwujudnya pembelajaran yang berkualitas dan berorientasi pada pengembangan karakter siswa');
        Setting::put('mission', 'Menyelenggarakan pendidikan yang komprehensif dan mengembangkan potensi siswa secara optimal');
        Setting::put('facebook_url', 'https://facebook.com/sd1tengguli');
        Setting::put('instagram_url', 'https://instagram.com/sd1tengguli');
    }
}
