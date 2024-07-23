<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengaturan::create([
            'title' => 'Fakultas Ilmu Administrasi Dan Bisnis',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis quod officia eos enim praesentium distinctio atque omnis aliquid velit iste iusto molestias sint veniam ab, assumenda, totam modi sunt. Error!',
            'icon' => 'faviocn.ico',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, fuga! Ex iusto delectus repellendus consectetur. Eaque ducimus, pariatur incidunt temporibus odit porro natus omnis exercitationem sapiente doloribus, vitae, dolores repellat? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium eum iste ex aspernatur excepturi, beatae quaerat inventore vero sit cumque pariatur magni fugit, sint impedit sed dolorum, voluptates ipsa harum?',
            'visi_misi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae libero harum ut illo officia, quae modi ad sed autem repellat, id quasi esse optio excepturi, debitis aspernatur sequi at unde!',
            'phone' => '082393508734',
            "total_mahasiswa" => 0,
            "total_pengajar" => 0,
            "total_lulusan" => 0,
            "total_prodi" => 0,
        ]);
    }
}
