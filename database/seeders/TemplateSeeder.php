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
        $this->insertTemplate('Surat Tugas Praktik Industri', 'PraktikIndustri');
        $this->insertTemplate('Surat Keterangan Aktif Kuliah', 'KeteranganAktifKuliah');
        $this->insertTemplate('Surat Keterangan Alumni', 'KeteranganAlumni');
        $this->insertTemplate('Surat Rekomendasi Beasiswa', 'RekomendasiBeasiswa');
        $this->insertTemplate('Surat Magang MBKM', 'MagangMbkm');
        $this->insertTemplate('Surat Pengantar Penelitian PA', 'PengantarPenelitian');
        $this->insertTemplate('Surat Pengantar Praktik Industri', 'PengantarPraktikIndustri');
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
