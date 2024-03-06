@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center pb-3">
                    <h4 class="card-title">Categories</h4>
                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".create-category-modal">
                            <i class="fas fa-plus"></i>
                            Create
                        </button>
                    </div>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = ($categories->currentPage() - 1) * $categories->perPage();
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <img @if ($category->image == null || !Storage::exists('/public/' . $category->image)) src="{{ asset('assets/images/user-regular-204.png') }}"
                                            @else src="{{ asset('storage/' . $category->image) }}" @endif
                                            style="width: 300px; height: auto;" alt="">
                                    </td>
                                    <td style="width: 250px;">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target=".edit-category-modal-{{ $category->id }}"
                                            class="btn btn-warning waves-effect waves-light">
                                            <i class="fas fa-pen"></i>
                                            Edit
                                        </button>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target=".delete-category-modal-{{ $category->id }}"
                                            class="btn btn-danger waves-effect waves-light">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                {{--  Delete Modal Beginning  --}}
                                <div class="modal fade delete-category-modal-{{ $category->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ Route('categories.destroy', $category->id) }}" method="POST">
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

                                {{--  Edit Modal Beginning  --}}
                                <div class="modal fade edit-category-modal-{{ $category->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editCategoryModalLabel">Update Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ Route('categories.update', $category->id) }}"
                                                enctype="multipart/form-data" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <img @if ($category->image == null || !Storage::exists('/public/' . $category->image)) src="{{ asset('assets/images/user-regular-204.png') }}"
                                                                @else src="{{ asset('storage/' . $category->image) }}" @endif
                                                                    style="width: 100px; height: 100px;" alt="">
                                                                Image preview
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="category-name">
                                                                    Name <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="name" value="{{ $category->name }}"
                                                                    type="text" placeholder="Enter name..."
                                                                    class="form-control" id="category-name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="category-image">
                                                                    Image <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="image" type="file" class="form-control"
                                                                    id="category-image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{--  Edit Modal End  --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $categories->links() }}
            </div>
        </div>
    </div>

    {{--  Create Modal Beginning  --}}
    <div class="modal fade create-category-modal" tabindex="-1" role="dialog"
        aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="{{ Route('categories.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="category-name">
                                        Name <span class="text-danger">*</span>
                                    </label>
                                    <input name="name" type="text" placeholder="Enter name..."
                                        class="form-control" id="category-name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="category-image">
                                        Image <span class="text-danger">*</span>
                                    </label>
                                    <input name="image" type="file" class="form-control" id="category-image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  Create Modal End  --}}
@endsection
