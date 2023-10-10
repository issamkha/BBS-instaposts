<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un lien Instagram API') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden break-word  shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.instagram_api_link.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="url" class="block text-gray-600">URL :</label>
                            <input type="text" name="url" id="url" class="form-input w-full"
                                   value="https://graph.instagram.com/" required readonly>
                        </div>
                        <div class="mb-4">
                            <label for="endpoint" class="block text-gray-600">Endpoint :</label>
                            <input type="text" name="endpoint" id="endpoint" class="form-input w-full"
                                   required>
                        </div>
                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-600">User Id :</label>
                            <input type="text" name="user_id" id="user_id" class="form-input w-full"
                                   required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600">Champs :</label>
                            <div class="grid grid-cols-2 gap-4 mt-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="id" checked>
                                    <span class="ml-2">ID</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="username" checked>
                                    <span class="ml-2">Username</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="caption" checked>
                                    <span class="ml-2">Caption</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="media_type" checked>
                                    <span class="ml-2">Media Type</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="media_url" checked>
                                    <span class="ml-2">Media URL</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="thumbnail_url" checked>
                                    <span class="ml-2">Thumbnail URL</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="permalink" checked>
                                    <span class="ml-2">Permalink</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="fields[]" value="timestamp" checked>
                                    <span class="ml-2">Timestamp</span>
                                </label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="access_token" class="block text-gray-600">Access Token :</label>
                            <input type="text" name="access_token" id="access_token" class="form-input w-full"
                                   required>
                        </div>
                        <div class="mb-4">
                            <label for="limit" class="block text-gray-600">Nombre de publications :</label>
                            <input type="number" name="limit" id="limit" class="form-input w-full"
                                   value="6" required>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary text-white font-bold py-2 px-4 rounded">
                                Créer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
