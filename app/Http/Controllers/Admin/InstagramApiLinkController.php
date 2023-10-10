<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramApiLink;
use Illuminate\Http\Request;

class InstagramApiLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les liens Instagram API
        $instagramApiLinks = InstagramApiLink::all();

        // Afficher la vue avec les liens
        return view('admin.instagram_api_link.index', compact('instagramApiLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Afficher le formulaire de création
        return view('admin.instagram_api_link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'url' => 'required|string',
            'endpoint' => 'required|string',
            'user_id' => 'required|string',
            'fields' => 'required|array',
            'access_token' => 'required|string|max:500',
        ]);

        try {
            // Convertir le tableau 'fields' en JSON
            $fieldsJson = json_encode($validatedData['fields'], JSON_THROW_ON_ERROR);

            // Créer un nouveau lien en utilisant les données validées
            InstagramApiLink::create([
                'url' => $validatedData['url'],
                'endpoint' => $validatedData['endpoint'],
                'user_id' => $validatedData['user_id'],
                'fields' => $fieldsJson,
                'access_token' => $validatedData['access_token'],
            ]);

            // Rediriger vers la liste des liens avec un message de succès
            return redirect()->route('admin.instagram_api_link.index')->with('success', 'Lien Instagram API créé avec succès.');
        } catch (\Exception $e) {
            // En cas d'erreur, ajouter l'erreur au système de session
            return redirect()->route('admin.instagram_api_link.index')->withErrors('Une erreur est survenue lors de la création du lien Instagram API : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InstagramApiLink $instagramApiLink)
    {
        // Afficher les détails du lien en utilisant l'instance existante
        return view('admin.instagram_api_link.show', compact('instagramApiLink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstagramApiLink $instagramApiLink)
    {
        // Afficher le formulaire d'édition avec l'instance existante
        return view('admin.instagram_api_link.edit', compact('instagramApiLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstagramApiLink $instagramApiLink)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'url' => 'required|string',
            'endpoint' => 'required|string',
            'user_id' => 'required|string',
            'fields' => 'required|array',
            'access_token' => 'required|string|max:500',
        ]);

        try {
            // Convertir le tableau 'fields' en JSON
            $fieldsJson = json_encode($validatedData['fields'], JSON_THROW_ON_ERROR);

            // Mettre à jour le lien existant en utilisant les données validées
            $instagramApiLink->update([
                'url' => $validatedData['url'],
                'endpoint' => $validatedData['endpoint'],
                'user_id' => $validatedData['user_id'],
                'fields' => $fieldsJson,
                'access_token' => $validatedData['access_token'],
            ]);

            // Rediriger vers la liste des liens avec un message de succès
            return redirect()->route('admin.instagram_api_link.index')->with('success', 'Lien Instagram API mis à jour avec succès.');
        } catch (\Throwable $e) {
            // En cas d'erreur, ajouter l'erreur au système de session
            return redirect()->route('admin.instagram_api_link.index')->withErrors(['error' => 'Une erreur est survenue lors de la mis à jour du lien Instagram API : ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstagramApiLink $instagramApiLink)
    {
        try {
            // Supprimer le lien Instagram API
            $instagramApiLink->delete();

            // Rediriger vers la liste des liens avec un message de succès
            return redirect()->route('admin.instagram_api_link.index')->with('success', 'Lien Instagram API supprimé avec succès.');
        } catch (\Throwable $e) {
            // En cas d'erreur, ajouter l'erreur au système de session
            return redirect()->route('admin.instagram_api_link.index')->withErrors(['error' => 'Une erreur est survenue lors de la suppression du lien Instagram API : ' . $e->getMessage()]);
        }
    }
}
