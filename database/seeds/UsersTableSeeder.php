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
        // DB::table('users')->where('email', 'admin@gmail.com')->delete();

        $user = new \App\User;
        $user->name     = 'Marcos Gonzalez';
        //$user->username = 'laradmin';
        //$user->genero   = 'M';
        //$user->lastname = 'Gonzalez';
        $user->email    = 'mgonzalez@mail.com';
        $user->password = bcrypt('admin');
        $user->status   = 1; // (1) active (0)disabled
        $user->type   = 'Super Administrador'; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Super Administrador');


        $user = new \App\User;
        $user->name     = 'Jesús Rodríguez';
        //$user->username = 'laradmin';
        //$user->genero   = 'M';
        //$user->lastname = 'Gonzalez';
        $user->email    = 'jerodriguez@mail.com';
        $user->password = bcrypt('admin');
        $user->status   = 1; // (1) active (0)disabled
        $user->type   = 'Administrador'; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Administrador');

     

     
    }
}
