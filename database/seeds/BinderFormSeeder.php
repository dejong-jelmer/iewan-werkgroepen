<?php
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BinderFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $name = 'test';
        // $key = Str::random(32);
        $fields = (string) '[{"name": "naam", "type": "text", "required": "1"}, {"name": "Leeftijd", "type": "text", "required": "1"}, {"name": "Nieuw_veld", "type": "checkbox", "required": "1"}, {"name": "Spontaan_stukje", "type": "textarea", "required": "0"}, {"name": "Aanname", "type": "checkbox", "required": "0"}, {"name": "Uitleg_werkgroep_keuze", "type": "textarea", "required": "0"}]';
        \App\BinderFormField::create([
            'fields' => $fields
        ]);

        \App\BinderForm::create([
            'name'  => 'test',
            'key' => Str::random(32),
            'fields' => $fields,
            'expires' => Carbon::now()->addMonth()
        ]);
    }
}
