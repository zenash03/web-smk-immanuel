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
            'name' => 'Erick Chandra',
            'username' => '6700',
            'password' => bcrypt('6700'),
            'role' => 'siswa'
        ]);

        User::create([
            'name' => 'Evotianus',
            'username' => '6701',
            'password' => bcrypt('6701'),
            'role' => 'siswa'
        ]);

        User::create([
            'name' => 'Luissando',
            'username' => '6702',
            'password' => bcrypt('6702'),
            'role' => 'siswa'
        ]);


        // Create Prestasi
        Prestasi::create([
            'title' => 'Prestasi Siswa/i SMK Kristen Immanuel Pontianak pada “KUIS KIHAJAR 2019” tingkat Provinsi',
            'content' => 'Selamat kepada siswa/siswi SMK Kristen Immanuel Pontianak, Mina Amelia yang berhasil meraih Juara 1 dan Alvin Wijaya Bun yang berhasil meraih Juara 2 dalam lomba “KUIS KIHAJAR TINGKAT PROVINSI TAHUN 2019” dan akan lanjut ke tingkat nasional bulan November nanti. Kuis ini bertujuan untuk menumbuhkembangkan budaya belajar serta menghasilkan karya inovatif siswa Indonesia dengan memanfaatkan Teknologi.',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec24fsaf34gssfd.jpg',
            'tag' => 'Prestasi',
            'date' => 'Sunday, July 2019'
        ]);

        Prestasi::create([
            'title' => 'Prestasi Siswa SMK, Hengki Sanjaya dan Luki Centuri dalam World Skill Kazan 2019',
            'content' => 'Selamat kepada Hengki Sanjaya yang telah mewakili INDONESIA meraih Silver Medal di World Skill Kazan 2019 untuk IT Software Solution for Business. Dari pengumuman hasil World Skill di bidang ini terlihat Jia-He Tu (Taipei) meraih emas dengan 754 poin, Hengki Sanjaya (Indonesia) meraih perak dengan 751 poin, dan Mahyar Jabari (Iran) meraih perunggu dengan 742 poin. Tidak hanya itu, Luki Centuri juga telah mewakili Indonesia dalam World Skill Kazan 2019 untuk kategori Web Technologies dan mendapatkan Medallion Of Excellence.
            
            Hengki dan Luki sudah membesarkan nama SMK Kristen Immanuel dan bahkan Indonesia ke mata dunia internasional, dan membuktikan SMK Kristen Immanuel bisa memberikan fasilitas untuk mengembangkan diri ke tingkat internasional.',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec3d6f5dadf23rg3f.jpg',
            'tag' => 'Prestasi',
            'date' => 'Monday, August 2019'
        ]);
        

        // Create Headline News
        News::create([
            'title' => 'Penerimaan Siswa Baru SMK Immanuel Pontianak',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Fermentum odio eu feugiat pretium nibh ipsum consequat. Fringilla urna porttitor rhoncus dolor purus non enim. Nibh tortor id aliquet lectus proin nibh nisl condimentum id. Ut sem viverra aliquet eget sit amet tellus. Fermentum dui faucibus in ornare. Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque. Lacus vel facilisis volutpat est velit egestas dui. Turpis massa sed elementum tempus. Sed elementum tempus egestas sed sed risus. Adipiscing tristique risus nec feugiat in.

            Netus et malesuada fames ac turpis egestas maecenas pharetra convallis. Duis convallis convallis tellus id interdum velit laoreet. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam. Fermentum leo vel orci porta non. Non consectetur a erat nam at lectus urna duis convallis. Donec et odio pellentesque diam volutpat commodo sed egestas. Vitae proin sagittis nisl rhoncus. Elit ullamcorper dignissim cras tincidunt lobortis. Neque convallis a cras semper auctor. Turpis massa tincidunt dui ut ornare lectus sit amet. Cursus eget nunc scelerisque viverra mauris in. Pulvinar mattis nunc sed blandit libero volutpat sed cras ornare. Dolor sit amet consectetur adipiscing elit. Quam nulla porttitor massa id neque aliquam. Quis auctor elit sed vulputate. Consectetur purus ut faucibus pulvinar elementum integer enim neque. Ac odio tempor orci dapibus. Tincidunt tortor aliquam nulla facilisi. Aenean euismod elementum nisi quis eleifend quam adipiscing vitae proin.
            
            Interdum posuere lorem ipsum dolor. In arcu cursus euismod quis viverra nibh cras pulvinar mattis. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus. A condimentum vitae sapien pellentesque habitant. Facilisis mauris sit amet massa vitae. Ut faucibus pulvinar elementum integer enim neque volutpat. Amet porttitor eget dolor morbi. Tellus id interdum velit laoreet. Bibendum est ultricies integer quis auctor. At urna condimentum mattis pellentesque id nibh tortor id. Sed felis eget velit aliquet sagittis id. Duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Non blandit massa enim nec dui. Integer feugiat scelerisque varius morbi enim nunc faucibus a pellentesque. Cursus in hac habitasse platea dictumst quisque sagittis. Cras pulvinar mattis nunc sed blandit libero volutpat sed cras. Eu feugiat pretium nibh ipsum consequat.',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec463a3dc89134010.png',
            'tag' => 'Berita',
            'date' => 'Monday, July 2021',
            'headline' => 'y'
        ]);
        
        // Create News
        News::create([
            'title' => 'Perayaan hari batik SMK Immanuel Pontianak',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultrices at ipsum sit amet sodales. Donec rhoncus dictum eleifend. Sed tempus vestibulum magna, non rutrum est feugiat ut. Praesent ullamcorper venenatis nulla eu lobortis. Quisque interdum arcu vitae sodales bibendum. Curabitur quis sem nec massa dignissim venenatis. Proin id lacus in purus fringilla laoreet. Vestibulum eget hendrerit dolor.

            Etiam fringilla nec sapien quis laoreet. Donec augue nulla, consectetur eu vehicula id, bibendum non eros. Pellentesque volutpat diam et maximus dapibus. Phasellus bibendum sem nec sagittis facilisis. Vestibulum egestas rhoncus ex et consectetur. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec et turpis ut mi cursus molestie ac quis augue. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ullamcorper blandit nisl, sed rutrum nunc. Integer ut ornare tortor.',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec3d6f5dab3130239.jpg',
            'tag' => 'Prestasi',
            'date' => 'Monday, July 2021'
        ]);

        // Create News
        News::create([
            'title' => 'Penerimaan Siswa Baru SMK Immanuel Pontianak',
            'content' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
            'author' => 'Admin',
            'image_url' => 'http://localhost:8000/upload/60ec3d2db7e6c130133.jpg',
            'tag' => 'Prestasi',
            'date' => 'Monday, July 2021'
        ]); 


        // Create Banner
        Banner::create([
            'title' => 'Lorem Ipsum',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'image_url' => 'http://localhost:8000/upload/1.jpeg',
            'active' => 'y'
        ]);

        Banner::create([
            'title' => 'Lorem Ipsum',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'image_url' => 'http://localhost:8000/upload/2.jpeg',
            'active' => 'y'
        ]);
    }
}
