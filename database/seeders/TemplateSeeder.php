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
        $this->createTemplate('Surat Praktik Industri', 'SuratPI');
    }

    protected function createTemplate(string $name, string $class_name): void
    {
        DB::table('templates')->insert([
            'name' => $name,
            'class_name' => $class_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
