<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Super Admin',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'id' => 2,
            'name' => 'Bapak Guru',
            'username' => 'pakguru',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
        ]);

        User::create([
            'id' => 3,
            'name' => 'Ibu Guru',
            'username' => 'buguru',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
        ]);

        User::create([
            'id' => 4,
            'name' => 'Anak Siswa',
            'username' => 'siswa',
            'password' => Hash::make('siswa123'),
            'role' => 'siswa',
        ]);

        $thumbnailPath = 'assets/images/blog/blog.jpg';


        // Buat 5 blog minggu lalu
        for ($i = 1; $i <= 5; $i++) {
            Blog::create([
                'created_by' => rand(1, 3),
                'title' => 'Blog Minggu Lalu #' . $i,
                'description' => 'Konten blog minggu lalu...',
                'thumbnail' => $thumbnailPath,
                'created_at' => Carbon::now()->subWeek()->addDays($i), // minggu lalu
                'updated_at' => Carbon::now()->subWeek()->addDays($i),
            ]);
        }

        // Buat 5 blog hari ini
        for ($i = 1; $i <= 5; $i++) {
            Blog::create([
                'created_by' => rand(1, 3),
                'title' => 'Blog Hari Ini #' . $i,
                'description' => 'Konten blog hari ini...',
                'thumbnail' => $thumbnailPath,
                'created_at' => Carbon::now(), // hari ini
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
