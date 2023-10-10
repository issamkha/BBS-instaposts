<?php

namespace App\Console\Commands;

use App\Models\InstagramApiLink;
use App\Models\InstagramPosts;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncInstagramPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-instagram-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            // Sélectionner le premier élément du tableau pour avoir le lien API Instagram
            $instaLink = InstagramApiLink::first();

            // Vérifiez si un lien API Instagram existe
            if (!$instaLink) {
                $this->error('Aucun lien API Instagram trouvé.');
                return;
            }

            // Décoder la chaîne JSON en un tableau PHP
            $fieldsArray = json_decode($instaLink->fields, true);

            // Utiliser implode pour concaténer les éléments du tableau avec une virgule
            $fieldsString = implode(',', $fieldsArray);
            $url = $instaLink->url . '/' . $instaLink->user_id . '/' . $instaLink->endpoint . '?fields=' . $fieldsString . '&access_token=' . $instaLink->access_token . '&limit=' . $instaLink->limit . '&sort=timestamp';

            // Effectuer la requête HTTP
            $response = Http::get($url);

            // Gérez les erreurs HTTP possibles
            if ($response->failed()) {
                $this->error('La requête HTTP a échoué avec un code HTTP : ' . $response->status());
                return;
            }

            // Récupérez le contenu JSON à partir de la réponse
            $jsonContent = $response->body();

            // Utilisez json_decode pour décoder le contenu JSON en un tableau associatif
            $decodedData = json_decode($jsonContent, true);

            // Vérifiez si la clé 'data' existe dans le tableau
            if (isset($decodedData['data'])) {
                $instagramData = $decodedData['data'];

                foreach ($instagramData as $data) {
                    // Vérifiez si la donnée existe déjà dans la base de données par son ID
                    $existingData = InstagramPosts::where('id', $data['id'])->first();

                    if (!$existingData) {
                        // Créez un tableau avec les valeurs par défaut
                        $insertData = [
                            'id' => $data['id'],
                            'username' => $data['username'],
                            'caption' => $data['caption'],
                            'media_type' => $data['media_type'],
                            'media_url' => $data['media_url'],
                            'permalink' => $data['permalink'],
                            'timestamp' => Carbon::parse($data['timestamp'])->format('Y-m-d H:i:s'),
                        ];

                        // Vérifiez si 'thumbnail_url' existe dans les données avant de l'ajouter
                        if (isset($data['thumbnail_url'])) {
                            $insertData['thumbnail_url'] = $data['thumbnail_url'];
                        }

                        // Insérez les données dans la base de données
                        InstagramPosts::create($insertData);
                    }
                }
                $this->info('Données Instagram synchronisées avec succès.');
            } else {
                $this->error('Aucune donnée Instagram trouvée dans la réponse JSON.');
            }
        } catch (\Throwable $e) {
            $this->error('Une erreur est survenue lors de la synchronisation des données Instagram : ' . $e->getMessage());
        }
    }

}
