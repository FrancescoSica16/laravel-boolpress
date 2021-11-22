<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Models\Role;
use Illuminate\Support\Arr;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //recuperiamo tutti gli utenti dal Db
        $users = User::all();

        //recuperiamo i ruoli e ne prediamo l'id inserendoli in un array
        $role_ids = Role::pluck('id')->toArray();
        
        // per ogni utente aggiungiamo alla sua lista dei ruoli un ruolo preso random tra quelli disponibili
        foreach ($users as $user){
            $user->roles()->attach(Arr::random($role_ids)) ;

        }
    }
}
