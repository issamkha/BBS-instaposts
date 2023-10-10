<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du lien Instagram') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden break-word shadow-sm sm:rounded-lg">
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
                    <h3 class="text-lg font-semibold mb-4">Informations du lien :</h3>
                    <ul class="list-disc ml-6 mb-4">
                        <li><strong>URL :</strong> {{ $instagramApiLink->url }}</li>
                        <li><strong>User ID :</strong> {{ $instagramApiLink->user_id }}</li>
                        <li><strong>Endpoint :</strong> {{ $instagramApiLink->endpoint }}</li>
                        <li><strong>Fields :</strong> {{ $instagramApiLink->fields }}</li>
                        <li><strong>Access Token :</strong> {{ $instagramApiLink->access_token }}</li>
                        <li><strong>Nombre de publications :</strong> {{ $instagramApiLink->limit }}</li>
                        <li><strong>Créé le :</strong> {{ $instagramApiLink->created_at->format('d/m/Y H:i:s') }}</li>
                        <li><strong>Mis à jour le :</strong> {{ $instagramApiLink->updated_at->format('d/m/Y H:i:s') }}
                        </li>
                    </ul>
                    <p><strong>Le lien final est :</strong></p>
                    <p>
                        {{ $instagramApiLink->url }}/{{ $instagramApiLink->user_id }}/{{ $instagramApiLink->endpoint }}?fields={{ implode(', ', json_decode($instagramApiLink->fields)) }}&access_token={{ $instagramApiLink->access_token }}&&limit={{ $instagramApiLink->limit }}&sort=timestamp
                    </p>

                    <hr class="p-3 mt-4">

                    <a href="{{route('admin.instagram_api_link.edit',['instagramApiLink'=>$instagramApiLink])}}"
                       class="btn btn-primary text-white font-bold py-2 px-4 rounded">
                        Modifier le lien
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
