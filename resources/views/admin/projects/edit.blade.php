@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary  text-white">
                        <h5 class="m-0"><i class="fas fa-edit me-1"></i>Modifica Progetto: {{ $project->title }}</h5>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm mb-3"><i
                                class="fas fa-arrow-left me-1"></i>Torna indietro</a>
                        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Titolo</label>
                                <input type="text" id="title" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $project->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                    rows="6">{{ old('description', $project->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipo</label>
                                <select name="type_id" class="form-select @error('type_id') is-invalid @enderror">
                                    <option selected>Seleziona un tipo</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            @if (old('type_id', $project->type_id) == $type->id) selected @endif>
                                            {{ $type->title }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div><label class="form-label">Tecnologie</label></div>
                                @foreach ($technologies as $technology)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="tag-{{ $technology->id }}"
                                            value="{{ $technology->id }}" name="technologies[]"
                                            @if (is_array(old('technologies')) && in_array($technology->id, old('technologies'))) checked
                                            @elseif ($project->technologies->contains($technology->id)) checked @endif>
                                        <label class="form-check-label"
                                            for="tag-{{ $technology->id }}">{{ $technology->title }}</label>
                                    </div>
                                @endforeach
                                @error('technologies')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>
                                Modifica</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
