<?php

namespace Database\Seeders;

use App\Models\Form;
use App\Models\FormLine;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=FormSeeder
     * @return void
     */
    public function run()
    {
        $parent = $this->generateData();
        foreach ($parent as $value) {
            $this->generateSubData(Form::insertGetId($value));
        }
    }

    public function generateSubData($form_id)
    {
        $data = [
            [
                'form_id' => $form_id,
                'key' => 'rs_type',
                'label' => 'Rumah Sakit',
                'type' => 'select',
                'data' => json_encode([
                    'Tipe A', 'Tipe B', 'Tipe C', 'Tipe D',
                ])
            ],
            [
                'form_id' => $form_id,
                'key' => 'akreditasi_type',
                'label' => 'Akreditasi',
                'type' => 'select',
                'data' => json_encode([
                    'Dasar', 'Madya', 'Utama', 'Paripurna'
                ])
            ],
            [
                'form_id' => $form_id,
                'key' => 'klinik_type',
                'label' => 'Klinik',
                'type' => 'select',
                'data' => json_encode([
                    'Klinik Utama', 'Klinik Pratama'
                ])
            ],
            [
                'form_id' => $form_id,
                'key' => 'lab_type',
                'label' => 'Lab',
                'type' => 'select',
                'data' => json_encode([
                    'Madya', 'Pratama', 'Utama'
                ])
            ],
            [
                'form_id' => $form_id,
                'key' => 'pendidikan_type',
                'label' => 'Pendidikan',
                'type' => 'select',
                'data' => json_encode([
                    'SMK Kesehatan', 'AKADEMI/STIKES', 'Universitas'
                ])
            ]
        ];

        return FormLine::insert($data);
    }

    public function generateData(): array
    {
        $data = [
            [
                'key' => 'category_id',
                'label' => 'Kategori',
                'type' => 'select'
            ]
        ];
        return $data;
    }
}
//             $table->string('label');
//             $table->json('data')->nullable();
//             $table->string('icon', 50)->default('info');
//             $table->string('type', 20)->default('text');
//             $table->boolean('required')->default(false);
//             $table->string('placeholder')->nullable();
//             $table->foreignId('form_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
//             $table->boolean('is_active')->default(true);
//             $table->timestamps();
