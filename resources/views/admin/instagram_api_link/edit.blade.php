<!-- resources/views/admin/instagram_api_link/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Éditer un lien Instagram') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden break-word  shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST"
                          action="{{ route('admin.instagram_api_link.update', $instagramApiLink) }})">
                    @csrf
                    @method('PUT') <!-- Utilisez la méthode PUT pour la mise à jour -->

                        <!-- Champ URL -->
                        <div class="mb-4">
                            <label for="url" class="block text-gray-600">URL :</label>
                            <input type="text" name="url" id="url" class="form-input w-full"
                                   value="{{ $instagramApiLink->url }}" required>
                        </div>

                        <!-- Champ Endpoint -->
                        <div class="mb-4">
                            <label for="endpoint" class="block text-gray-600">Endpoint :</label>
                            <input type="text" name="endpoint" id="endpoint" class="form-input w-full"
                                   value="{{ $instagramApiLink->endpoint }}" required>
                        </div>

                        <!-- Champ User ID -->
                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-600">User ID :</label>
                            <input type="text" name="user_id" id="user_id" class="form-input w-full"
                                   value="{{ $instagramApiLink->user_id }}" required>
                        </div>

                        <!-- Champ Fields -->
                        <!-- Afficher les cases à cocher pour les champs JSON -->
                        <div class="mb-4">
                            <label class="block text-gray-600">Champs :</label>
                            <div class="grid grid-cols-2 gap-4 mt-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="id"
                                           @if(in_array('id', json_decode($instagramApiLink->fields))) checked @endif>
                                    <span class="ml-2">ID</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="username"
                                           @if(in_array('username', json_decode($instagramApiLink->fields))) checked @endif>
                                    <span class="ml-2">Username</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="caption"
                                           @if(in_array('caption', json_decode($instagramApiLink->fields))) checked @endif>
                                    <span class="ml-2">Caption</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="media_type"
                                           @if(in_array('media_type', json_decode($instagramApiLink->fields))) checked @endif>
                                    <span class="ml-2">Media Type</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="media_url"
                                           @if(in_array('media_url', json_decode($instagramApiLink->fields))) checked @endif>
                                    <span class="ml-2">Media URL</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="thumbnail_url"
                                           @if(in_array('thumbnail_url', json_decode($instagramApiLink->fields))) checked @endif>
                                    <span class="ml-2">Thumbnail URL</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="permalink"
                                           @if(in_array('permalink', json_decode($instagramApiLink->fields))) checked @endif>
                                    <span class="ml-2">Permalink</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="timestamp"
                                           @if(in_array('timestamp', json_decode($instagramApiLink->fields))) checked @endif>
                                    <span class="ml-2">Timestamp</span>
                                </label>
                            </div>
                        </div>


                        <!-- Champ Access Token -->
                        <div class="mb-4">
                            <label for="access_token" class="block text-gray-600">Access Token :</label>
                            <input type="text" name="access_token" id="access_token" class="form-input w-full"
                                   value="{{ $instagramApiLink->access_token }}" required>
                        </div>

                        <!-- Bouton de mise à jour -->
                        <div class="mt-4">
                            <button type="submit"
                                    class="btn btn-primary text-white font-bold py-2 px-4 rounded">
                                Mettre à jour
                            </button>
                        </div>
                    </form>

                    <form
                        class="p-4"
                        action="{{ route('admin.instagram_api_link.destroy', ['instagramApiLink' => $instagramApiLink]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="float-right btn btn-danger hover:bg-red-500 text-white font-bold rounded">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
