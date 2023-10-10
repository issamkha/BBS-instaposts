<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstagramApiLinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vérifiez si la table "instagram_api_link" est vide
        if (DB::table('instagram_api_link')->count() === 0) {
            // Si la table est vide, insérez des données
            DB::table('instagram_api_link')->insert([
                'url' => 'https://graph.instagram.com',
                'user_id' => '7132908793420378',
                'endpoint' => 'media',
                'fields' => json_encode(['id', 'username', 'caption', 'media_type', 'media_url', 'thumbnail_url', 'permalink', 'timestamp']),
                'access_token' => 'IGQWRORENKbmtpWWlBS1U0M1BJSzVKUHM3RFVrOXNRYzFXU2dxSmRwaXdyZAGRWMFFrYWtudkM0UXhuSlgxOEtickU3R2lwbHVJbGFBclVrOTRqamFtQ0lGRXhERXVsa1ZAHdld2eV8wdjBkUQZDZD',
                'limit' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            // Si des enregistrements existent déjà, ne rien faire
            echo "La table 'instagram_api_link' contient déjà des enregistrements. Aucune donnée n'a été insérée.\n";
        }
    }
}
