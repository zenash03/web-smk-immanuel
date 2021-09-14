<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\News;
use App\Models\Prestasi;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // create admin
        Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        // create user
        User::create([
            'name' => 'User Test 1',
            'username' => '1000',
            'password' => bcrypt('1000'),
            'role' => 'siswa'
        ]);

        User::create([
            'name' => 'User Test 2',
            'username' => '2000',
            'password' => bcrypt('2000'),
            'role' => 'siswa'
        ]);

        User::create([
            'name' => 'User Test 3',
            'username' => '3000',
            'password' => bcrypt('3000'),
            'role' => 'siswa'
        ]);

        User::create([
            'name' => 'User Test 4',
            'username' => '4000',
            'password' => bcrypt('4000'),
            'role' => 'siswa'
        ]);

        User::create([
            'name' => 'User Test 5',
            'username' => '5000',
            'password' => bcrypt('5000'),
            'role' => 'siswa'
        ]);


        // Create Prestasi
        Prestasi::create([
            'title' => 'Prestasi Siswa/i SMK Kristen Immanuel Pontianak pada “KUIS KIHAJAR 2019” tingkat Provinsi',
            'content' => 'Selamat kepada Mina Amelia yang berhasil meraih Juara 3 dalam lomba “Kuis Kihajar Tingkat Nasional jenjang SMK/MAK”. Kuis ini bertujuan untuk menumbuhkembangkan budaya belajar serta menghasilkan karya inovatif siswa Indonesia dengan memanfaatkan Teknologi.',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec24fsaf34gssfd.jpg',
            'tag' => 'Prestasi',
            'date' => 'November 17, 2019'
        ]);

        Prestasi::create([
            'title' => 'Prestasi Siswa SMK, Hengki Sanjaya dan Luki Centuri dalam World Skill Kazan 2019',
            'content' => 'Selamat kepada Hengki Sanjaya yang telah mewakili INDONESIA meraih Silver Medal di World Skill Kazan 2019 untuk IT Software Solution for Business. Dari pengumuman hasil World Skill di bidang ini terlihat Jia-He Tu (Taipei) meraih emas dengan 754 poin, Hengki Sanjaya (Indonesia) meraih perak dengan 751 poin, dan Mahyar Jabari (Iran) meraih perunggu dengan 742 poin. Tidak hanya itu, Luki Centuri juga telah mewakili Indonesia dalam World Skill Kazan 2019 untuk kategori Web Technologies dan mendapatkan Medallion Of Excellence.
            
            Hengki dan Luki sudah membesarkan nama SMK Kristen Immanuel dan bahkan Indonesia ke mata dunia internasional, dan membuktikan SMK Kristen Immanuel bisa memberikan fasilitas untuk mengembangkan diri ke tingkat internasional.',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec3d6f5dadf23rg3f.jpg',
            'tag' => 'Prestasi',
            'date' => 'August 28, 2019'
        ]);
        

        // Create Headline News
        News::create([
            'title' => 'Vaksinasi ke-2 Siswa kelas 12 SMK Immanuel Pontianak',
            'content' => 'Semua karna anugerah Tuhan sehingga siswa kelas 12 SMK Kristen Immanuel Pontianak sudah divaksin ke-2.
           
Berikutnya vaksinasi untuk kelas 10 dan 11 pada tanggal 16 September 2021.',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec3d14fdff5dab45h30f.jpg',
            'tag' => 'Berita',
            'date' => 'September 9, 2021',
            'headline' => 'y'
        ]);
        
        // Create News
        News::create([
            'title' => 'Pelatihan IHT Kepada guru-guru SMK Immanuel Pontianak',
            'content' => 'Guru-guru SMK Kristen Immanuel Pontianak telah mengikuti pelatihan IHT (In House Training) untuk Kurikulum SMK Pusat Keunggulan yang dilakukan pada tanggal 3-13 Agustus 2021.',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec3d14g3iofqef.jpg',
            'tag' => 'Berita',
            'date' => 'August 14, 2021'
        ]);

        // Create News
        News::create([
            'title' => 'Penerimaan Siswa Baru SMK Immanuel Pontianak',
            'content' => 'Pendaftaran Siswa Baru untuk tahun ajaran 2021/2022 SMK Kristen Immanuel Pontianak akan dibuka tanggal 1 Maret 2021.
Dengan 3 jurusan:
Akuntansi Keuangan dan Lembaga (AKL)
Bisnis Daring Pemasaran (BDP)
Teknik Komputer dan Jaringan (TKJ)
Ayo segera bergabung bersama kami.
            
            Nomor Contact SMK (bisa via whatsapp): 089524435865',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec3d2db7e6c130133.jpg',
            'tag' => 'Berita',
            'date' => 'February 27, 2021'
        ]); 

        // Create News
        News::create([
            'title' => 'HUT ke-33 SMK Immanuel Pontianak',
            'content' => 'Anugerah Tuhan ditengah Pandemi itulah tema ultah SMK Kristen Immanuel Pontianak ke 33 tanggal 5 Februari 2021, dan kado ultah dari Tuhan adalah SMK IMMANUEL dipercaya Direktorat untuk dikembangkan menjadi SMK PUSAT KEUNGGULAN (Center of Excellence ) Sektor Hospitality. Segala kemuliaan hanya bagi Tuhan.',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec29aja9fh2fna23s.jpg',
            'tag' => 'Berita',
            'date' => 'February 7, 2021'
        ]); 
    }
}
