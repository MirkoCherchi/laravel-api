@extends('layouts.admin')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="m-0"><i class="fas fa-info-circle"></i> Dettaglio Progetto: {{ $project->title }}</h5>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $project->title }}</h5>
                        <p class="card-text"><strong>Descrizione:</strong> {{ $project->description }}</p>

                        <p class="card-text"><strong>Tipo:</strong> {{ $project->type?->title ?: 'Nessun Tipo' }}</p>
                        <p class="card-text"><strong>Tecnologie:</strong>
                        <ul>
                            @foreach ($project->technologies as $technology)
                                <li> {{ $technology?->title ?: 'Nessun Tipo' }}</li>
                            @endforeach

                        </ul>
                        </p>


                    </div>

                    <div class="mt-3 text-center">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm"><i
                                class="fas fa-arrow-left"></i> Torna Indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
