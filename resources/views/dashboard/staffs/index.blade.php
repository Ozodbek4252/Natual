@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center pb-3">
                    <h4 class="card-title">Staffs</h4>
                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".create-staff-modal">
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = ($staffs->currentPage() - 1) * $staffs->perPage();
                            @endphp
                            @foreach ($staffs as $staff)
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td>
                                        <img @if ($staff->image == null || !Storage::exists('/public/' . $staff->image)) src="{{ asset('assets/images/user-regular-204.png') }}"
                                            @else src="{{ asset('storage/' . $staff->image) }}" @endif
                                            style="width: 100px; height: 100px;" alt="">
                                    </td>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->position }}</td>
                                    <td>{{ $staff->number }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td>{{ $staff->website }}</td>
                                    <td style="width: 250px;">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target=".edit-staff-modal-{{ $staff->id }}"
                                            class="btn btn-warning waves-effect waves-light">
                                            <i class="fas fa-pen"></i>
                                            Edit
                                        </button>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target=".delete-staff-modal-{{ $staff->id }}"
                                            class="btn btn-danger waves-effect waves-light">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>

                                {{--  Delete Modal Beginning  --}}
                                <div class="modal fade delete-staff-modal-{{ $staff->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteStaffModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteStaffModalLabel">Delete Staff</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ Route('staffs.destroy', $staff->id) }}" method="POST">
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
                                <div class="modal fade edit-staff-modal-{{ $staff->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editStaffModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editStaffModalLabel">Update Staff</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ Route('staffs.update', $staff->id) }}"
                                                enctype="multipart/form-data" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <img @if ($staff->image == null || !Storage::exists('/public/' . $staff->image)) src="{{ asset('assets/images/user-regular-204.png') }}"
                                                                @else src="{{ asset('storage/' . $staff->image) }}" @endif
                                                                    style="width: 100px; height: 100px;" alt="">
                                                                Image preview
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="staff-name">
                                                                    Name <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="name" value="{{ $staff->name }}"
                                                                    type="text" placeholder="Enter name..."
                                                                    class="form-control" id="staff-name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="staff-position">
                                                                    Position <span class="text-danger">*</span>
                                                                </label>
                                                                <input name="position" value="{{ $staff->position }}"
                                                                    type="text" placeholder="Enter Position..."
                                                                    class="form-control" id="staff-position">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="staff-image">Image</label>
                                                                <input name="image" type="file" class="form-control"
                                                                    id="staff-image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="staff-number">Number</label>
                                                                <input name="number" value="{{ $staff->number }}"
                                                                    placeholder="Enter number..." type="text"
                                                                    class="form-control" id="staff-number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="staff-email">Email</label>
                                                                <input name="email" type="text"
                                                                    value="{{ $staff->email }}"
                                                                    placeholder="Enter email..." class="form-control"
                                                                    id="staff-email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="staff-website">Website</label>
                                                                <input name="website" value="{{ $staff->website }}"
                                                                    placeholder="Enter website..." type="text"
                                                                    class="form-control" id="staff-website">
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

                {{ $staffs->links() }}
            </div>
        </div>
    </div>

    {{--  Create Modal Beginning  --}}
    <div class="modal fade create-staff-modal" tabindex="-1" role="dialog" aria-labelledby="createStaffModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createStaffModalLabel">Create Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="{{ Route('staffs.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="staff-name">
                                        Name <span class="text-danger">*</span>
                                    </label>
                                    <input name="name" type="text" placeholder="Enter name..."
                                        class="form-control" id="staff-name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="staff-position">
                                        Position <span class="text-danger">*</span>
                                    </label>
                                    <input name="position" type="text" placeholder="Enter Position..."
                                        class="form-control" id="staff-position">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="staff-image">Image</label>
                                    <input name="image" type="file" class="form-control" id="staff-image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="staff-number">Number</label>
                                    <input name="number" placeholder="Enter number..." type="text"
                                        class="form-control" id="staff-number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="staff-email">Email</label>
                                    <input name="email" type="text" placeholder="Enter email..."
                                        class="form-control" id="staff-email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="staff-website">Website</label>
                                    <input name="website" placeholder="Enter website..." type="text"
                                        class="form-control" id="staff-website">
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
