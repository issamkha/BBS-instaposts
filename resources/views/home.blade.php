@php
    use Carbon\Carbon;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden break-word  shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($posts->isEmpty())
                        <div class="row">
                            <p>Aucune publication n'est disponible.</p>
                        </div>
                        @else
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($posts as $post)
                                <div class="col mb-3">
                                    <div class="card shadow-sm">
                                        @if($post->media_type === 'VIDEO')
                                            <video src="{{ $post->media_url }}" data-video-id="{{$post->id}}"
                                                   class="card-img-top"
                                                   poster="{{ $post->thumbnail_url }}" muted autoplay loop></video>
                                        @else
                                            <img class="bd-placeholder-img card-img-top" width="100%"
                                                 src="{{ $post->media_url }}" alt="Image">
                                        @endif
                                        <div class="card-body">
                                            <p class="card-text">
                                                {{$post->caption}}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                                            data-bs-toggle="modal" data-bs-target="#modal{{$post->id}}">
                                                        Voir
                                                    </button>
                                                </div>
                                                <small class="text-body-secondary">
                                                    {{ Carbon::parse($post->timestamp)->locale('fr_FR')->isoFormat('LLLL') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="modal fade" id="modal{{$post->id}}" tabindex="-1" role="dialog"
             aria-labelledby="modalLabel{{$post->id}}" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="modalLabel{{$post->id}}">
                            {{ Carbon::parse($post->timestamp)->locale('fr_FR')->isoFormat('LLLL') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if($post->media_type === 'VIDEO')
                            <video src="{{ $post->media_url }}" class="img-fluid"
                                   poster="{{ $post->thumbnail_url }}" controls></video>
                        @else
                            <img class="img-fluid" src="{{ $post->media_url }}" alt="Image">
                        @endif
                        <p class="card-text">
                            {{$post->caption}}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>

        // Obtenir le son des posts au click
        const videos = document.querySelectorAll('video');
        videos.forEach(video => {
            video.addEventListener('click', () => {
                if (video.muted) {
                    video.muted = false; // Activer le son
                } else {
                    video.muted = true; // Désactiver le son
                }
            });
        });
    </script>
</x-app-layout>
