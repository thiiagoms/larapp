@extends('layouts.template')

@section('title')
    List series
@endsection

@section('content')

    @includeWhen(!empty($message), 'messages.message', ['message' => $message])

    <div class="d-flex justify-content-center mt-4 mb-4 text-center">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Series List</h1>
        </div>
    </div>

    <a href="{{ route('create_series') }}" class="btn btn-dark mb-2">Add</a>

    <ul class="list-group">
        @foreach($series as $serie)

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <h5 id="series-name-{{ $serie->id }}">{{ $serie->name }}</h5>

                <div class="input-group w-50" hidden id="input-series-name-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->name }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="serieEdit({{ $serie->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>
                
                <div class="modal fade" id="serie{{ $serie->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $serie->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ $serie->description }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <span class="d-flex">
                    <a class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#serie{{ $serie->id }}" role="button"
                        aria-expanded="false" aria-controls="serie{{ $serie->id }}"
                    >
                        <i class="fas fa-comment-dots"></i>
                    </a>
        
                    @auth
                        <a href="{{ route('seasons', ['id' => $serie->id]) }}" class="btn btn-info btn-sm me-1">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                    @endauth

                    @auth
                        <button class="btn btn-info btn-sm me-1" onclick="toggleInput({{ $serie->id }})">
                            <i class="fas fa-edit"></i>
                        </button>
                    @endauth

                    @auth
                        <form method="post" action="{{ route('delete', ['id' => $serie->id]) }}"
                            onsubmit="return confirm('Are you sure to remove {{ addslashes($serie->name) }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    @endauth
                </span>
            </li>

        @endforeach
    </ul>

    <script>

        function toggleInput(serieId) {
            let seriesName = document.getElementById(`series-name-${serieId}`);
            let seriesInput = document.getElementById(`input-series-name-${serieId}`);

            if (seriesName.hasAttribute('hidden')) {
                seriesName.removeAttribute('hidden');
                seriesInput.hidden = true;
            } else {
                seriesInput.removeAttribute('hidden');
                seriesName.hidden = true;
            }
        }

        function serieEdit(serieId) {

            let formData = new FormData();

            const url = `/series/${serieId}/edit`;
            const name = document.querySelector(`#input-series-name-${serieId} > input`).value;
            const token = document.querySelector(`input[name="_token"]`).value;

            formData.append('name', name);
            formData.append('_token', token)

            fetch(url, {
                method: 'POST',
                body: formData
            }).then(() => {
                toggleInput(serieId)
                document.getElementById(`series-name-${serieId}`).textContent = name;
            });
        }

    </script>

@endsection

