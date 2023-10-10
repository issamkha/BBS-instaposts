<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vérifiez si la table "users" est vide
        if (DB::table('users')->count() === 0) {
            // Si la table est vide, insérez des données
            DB::table('users')->insert([
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
            ]);
        } else {
            // Si des enregistrements existent déjà, ne rien faire
            echo "La table 'users' contient déjà des enregistrements. Aucune donnée n'a été insérée.\n";
        }
    }
}
