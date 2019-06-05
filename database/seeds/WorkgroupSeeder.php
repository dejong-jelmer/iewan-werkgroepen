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
        $workgroupNames = ['Intern', 'Technische Dienst', 'Webgroep', 'Tuingroep', 'Voko', 'Kleine Wiel', 'Dubbeltje', 'Educatie', 'Aanname'];
        foreach ($workgroupNames as $workgroup) {
            App\Workgroup::create([
                'name' => $workgroup
            ]);
        }
        $workgroups = App\Workgroup::get();
        foreach($workgroups as $id => $workgroup) {
            $role = new App\WorkgroupRole();
            $role->role = $workgroupNames[$id];
            $workgroup->role()->save($role);
        }
    }
}
