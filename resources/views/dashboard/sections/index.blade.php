@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center pb-3">
                    <h4 class="card-title">Sections</h4>
                    <div>
                        <a href="{{ Route('sections.create') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-plus"></i>
                            Create
                        </a>
                    </div>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = ($pagination->currentPage() - 1) * $pagination->perPage();
                            @endphp
                            @foreach ($pagination->items() as $section)
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td>
                                        <img @if ($section->image == null || !Storage::exists('/public/' . $section->image)) src="{{ asset('assets/images/user-regular-204.png') }}"
                                            @else src="{{ asset('storage/' . $section->image) }}" @endif
                                            style="width: 150px; height: auto;" alt="">
                                    </td>
                                    <td>{{ $section->translations['title']['content'] }}</td>
                                    <td>{{ $section->translations['description']['content'] }}</td>
                                    <td style="width: 250px;">
                                        <a href="{{ Route('sections.edit', $section->id) }}"
                                            class="btn btn-warning waves-effect waves-light my-2">
                                            <i class="fas fa-pen"></i>
                                            Edit
                                        </a>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target=".delete-section-modal-{{ $section->id }}"
                                            class="btn btn-danger waves-effect waves-light">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                {{--  Delete Modal Beginning  --}}
                                <div class="modal fade delete-section-modal-{{ $section->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteSectionModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteSectionModalLabel">Delete Section</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ Route('sections.destroy', $section->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal-body">
                                                    Do you really want to delete this?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
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
