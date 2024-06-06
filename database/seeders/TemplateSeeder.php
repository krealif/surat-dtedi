<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->insertTemplate('Praktik Industri', 'PraktikIndustri');
        $this->insertTemplate('Keterangan Aktif Kuliah', 'KeteranganAktifKuliah');
        $this->insertTemplate('Keterangan Alumni', 'KeteranganAlumni');
        $this->insertTemplate('Rekomendasi Beasiswa', 'RekomendasiBeasiswa');
        $this->insertTemplate('Magang PMMB', 'MagangPmmb');
        $this->insertTemplate('Pengantar Penelitian PA', 'PengantarPenelitian');
    }

    protected function insertTemplate(string $name, string $class_name): void
    {
        DB::table('templates')->insert([
            'name' => $name,
            'class_name' => $class_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
