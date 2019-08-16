<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function($user){
            $workgroup = random_int(1, count(App\Workgroup::all()));
            $user->workgroups()->save(App\Workgroup::find($workgroup));
            // factory(App\Message::class, 20)->create()->each(function($msg) use ($user){
            //     $msg->senders()->save($user);
            //     $msg->save();
            //     $user_to = random_int(1, count(App\User::all()));
            //     $msg->receiver()->save(App\User::find($user_to));
            // });
        });
        $users = \App\User::whereIn('id', [1,2,3,4])->get();
        $names = ['jelmer', 'wen', 'thomas', 'ciarán'];
        foreach ($users as $id => $user) {
            $user->email = $names[$id].'@test.com';
            $user->name = $names[$id];
            $user->save();
        }
    }
}
