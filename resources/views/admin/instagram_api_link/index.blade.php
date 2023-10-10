<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voir les liens Instagram') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($instagramApiLinks->isEmpty())
                        <p>Aucun lien n'est disponible.
                            <a href="{{ route('admin.instagram_api_link.create') }}" class="text-green-600">
                                Ajouter un lien
                            </a>
                        </p>
                    @else
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="px-4 py-2"></th>
                                <th class="px-4 py-2">URL</th>
                                <th class="px-4 py-2">Endpoint</th>
                                <th class="px-4 py-2">User ID</th>
                                <th class="px-4 py-2">Fields</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($instagramApiLinks as $link)
                                <tr>
                                    <td class="border px-4 py-2"><a
                                            href="{{ route('admin.instagram_api_link.show',['instagramApiLink'=>$link] ) }}">#{{ $link->id }}</a>
                                    </td>
                                    <td class="border px-4 py-2">{{ $link->url }}</td>
                                    <td class="border px-4 py-2">{{ $link->endpoint }}</td>
                                    <td class="border px-4 py-2">{{ $link->user_id }}</td>
                                    <td class="border px-4 py-2">{{ $link->fields }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
