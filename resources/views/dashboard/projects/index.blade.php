@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center pb-3">
                    <h4 class="card-title">{{ __('body.Projects') }}</h4>
                    <div>
                        <a href="{{ Route('projects.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus"></i>
                            {{ __('body.Create') }}
                        </a>
                    </div>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>{{ __('body.Image') }}</th>
                                <th>{{ __('body.Name') }}</th>
                                <th>{{ __('body.Address') }}</th>
                                <th>{{ __('body.Finished') }}</th>
                                <th>{{ __('body.Category') }}</th>
                                <th>{{ __('body.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = ($pagination->currentPage() - 1) * $pagination->perPage();
                            @endphp
                            @foreach ($pagination->items() as $project)
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td>
                                        <img style="background-color: lightgray; width: 200px; height: auto;"
                                            @if (isset($project->new_image)) src="{{ $project->new_image }}" @else src="{{ 'storage/' . $project->image }}" @endif
                                            alt="">
                                    </td>
                                    <td>{{ $project->name }}</td>
                                    <td>
                                        {{ $project->translations['address']['content'] }}
                                    </td>
                                    <td>
                                        @if ($project->is_finished)
                                            <span class="badge bg-primary">{{ __('body.Finished') }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ __('body.Progressing') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ Route('categories.index') }}">
                                            {{ $project->categoryTranslations['name']['content'] }}
                                        </a>
                                    </td>
                                    <td style="width: 250px;">
                                        <a href="{{ Route('projects.edit', $project->id) }}"
                                            class="btn btn-warning waves-effect waves-light my-2">
                                            <i class="fas fa-pen"></i>
                                            {{ __('body.Edit') }}
                                        </a>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target=".delete-project-modal-{{ $project->id }}"
                                            class="btn btn-danger waves-effect waves-light">
                                            <i class="fas fa-trash"></i>
                                            {{ __('body.Delete') }}
                                        </button>
                                    </td>
                                </tr>

                                {{--  Delete Modal Beginning  --}}
                                <div class="modal fade delete-project-modal-{{ $project->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteProjectModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteProjectModalLabel">
                                                    {{ __('body.Delete Project') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ Route('projects.destroy', $project->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal-body">
                                                    {{ __('body.Do you really want to delete this?') }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">{{ __('body.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ __('body.Delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{--  Delete Modal End  --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $pagination->links() }}
            </div>
        </div>
    </div>
@endsection
