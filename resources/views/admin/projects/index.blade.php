@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <a class="btn btn-primary btn-sm" href="{{ route('admin.projects.create') }}">
                    <i class="fa-solid fa-plus me-1"></i>Nuovo Progetto
                </a>
            </div>

            <div class="col-auto">
                @if (session('success'))
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header bg-success text-white">
                                <strong class="me-auto"><i class="fa-solid fa-check me-1"></i>Successo!</strong>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body bg-success-subtle text-emphasis-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('message'))
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header bg-danger text-white">
                                <strong class="me-auto"><i class="fa-solid fa-trash-can me-1"></i>Eliminato!</strong>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body bg-danger-subtle text-emphasis-danger">
                                {{ session('message') }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th scope="col">Titolo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col" id="mirko-p" class="text-end">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project_item)
                                <tr>

                                    <td>{{ $project_item->title }}</td>
                                    <td>{{ $project_item->type->title }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-end">
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.projects.show', $project_item) }}">
                                                    <i class="fas fa-info-circle me-2"></i>Info
                                                </a>
                                                <a class="btn btn-secondary"
                                                    href="{{ route('admin.projects.edit', $project_item) }}">
                                                    <i class="fas fa-edit me-2"></i>Modifica
                                                </a>
                                                <form action="{{ route('admin.projects.destroy', $project_item) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mc-delete">
                                                        <i class="fas fa-trash-alt me-2"></i>Elimina
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
