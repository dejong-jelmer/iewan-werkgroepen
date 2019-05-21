<?php

use Illuminate\Database\Seeder;

class WorkgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workgroups = ['Intern', 'Technische Dienst', 'Webgroep', 'Tuingroep', 'Voko', 'Kleine Wiel', 'Dubbeltje', 'Educatie'];
        foreach ($workgroups as $workgroup) {
            App\Workgroup::create([
                'name' => $workgroup
            ]);
        }
    }
}
