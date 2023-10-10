<?php

use App\Http\Controllers\Admin\InstagramApiLinkController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Afficher la liste des liens Instagram API
    Route::get('/instalink', [InstagramApiLinkController::class, 'index'])->name('admin.instagram_api_link.index');

    // Afficher le formulaire de création
    Route::get('/instalink/create', [InstagramApiLinkController::class, 'create'])->name('admin.instagram_api_link.create');

    // Enregistrer un nouveau lien Instagram API
    Route::post('/instalink', [InstagramApiLinkController::class, 'store'])->name('admin.instagram_api_link.store');

    // Afficher les détails d'un lien Instagram API
    Route::get('/instalink/{instagramApiLink}', [InstagramApiLinkController::class, 'show'])->name('admin.instagram_api_link.show');

    // Afficher le formulaire de mise à jour
    Route::get('/instalink/{instagramApiLink}/edit', [InstagramApiLinkController::class, 'edit'])->name('admin.instagram_api_link.edit');

    // Mettre à jour un lien Instagram API
    Route::put('/instalink/{instagramApiLink}', [InstagramApiLinkController::class, 'update'])->name('admin.instagram_api_link.update');

    // Supprimer un lien Instagram API
    Route::delete('/instalink/{instagramApiLink}', [InstagramApiLinkController::class, 'destroy'])->name('admin.instagram_api_link.destroy');
});
