<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }

    /**
     *Omplir taula usuaris
     */
    private function seedUserTable()
    {
        $user = new User();
        $user->name = "francesc fores ";
        $user->password = bcrypt(env('PASSWORD_ESTIMAT'));
        $user->email = "ffores93@gmail.com";
        $user->save();
    }
}
