<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Str;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Frontend', 'Backend', 'Fullstack'];

        foreach ($data as $value) {
            $new_type = new Type();
            $new_type->name = $value;
            $new_type->slug = Str::slug($new_type->name);
            $new_type->save();
        }
    }
}
