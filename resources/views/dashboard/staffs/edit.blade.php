@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="m-0">Update Staff</h4>

                            <div class="my-2">
                                <a href="{{ Route('staffs.index') }}"
                                    class="btn btn-secondary btn-soft-secondary waves-effect waves-light d-flex
                                align-items-center justify-content-between">
                                    <i class='bx bx-arrow-back'></i>
                                    {{ __('body.back') }}
                                </a>
                            </div>
                        </div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($langs as $lang)
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab"
                                        href="ui-tabs-accordions.html#navtabs-{{ $lang->code }}" role="tab">
                                        <span class="d-none d-sm-block">
                                            <img src="/{{ $lang->icon }}" style="width: 20px; height: auto;"
                                                alt="user-image" class="me-1">
                                            {{ $lang->name }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <form action="{{ Route('staffs.update', $staff->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @method('PUT')
                            @csrf
                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane" id="navtabs-{{ $lang->code }}" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="staff-position">
                                                        Position <span class="text-danger">*</span>
                                                    </label>
                                                    <input name="position_{{ $lang->code }}"
                                                        value="{{ $staff->translations[$lang->code]['position']['content'] }}"
                                                        type="text" placeholder="Enter position..." class="form-control"
                                                        id="staff-position-{{ $lang->code }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 d-flex flex-column">
                                            <label class="form-label" for="staff-image">
                                                Image Preview
                                            </label>
                                            <img src="{{ asset('storage/' . $staff->image) }}" width="200px">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="staff-name">
                                                Name <span class="text-danger">*</span>
                                            </label>
                                            <input value="{{ $staff->name }}" name="name" type="text" placeholder="Enter name..."
                                                class="form-control" id="staff-name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="staff-image">Image</label>
                                            <input name="image" type="file" class="form-control" id="staff-image">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="staff-number">Number</label>
                                            <input value="{{ $staff->number }}" name="number" placeholder="Enter number..." type="text"
                                                class="form-control" id="staff-number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="staff-email">Email</label>
                                            <input value="{{ $staff->email }}" name="email" type="text" placeholder="Enter email..."
                                                class="form-control" id="staff-email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="staff-website">Website</label>
                                            <input value="{{ $staff->website }}" name="website" placeholder="Enter website..." type="text"
                                                class="form-control" id="staff-website">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="form-label" style="opacity: 0;">|</label>
                                            <button type="submit" id="staff-create"
                                                class="btn btn-primary waves-effect waves-light form-control">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            // add active class to the first nav-link
            $('.nav-link').first().addClass('active');
            $('.tab-pane').first().addClass('active');

            $('.nav-link').click(function() {
                $('.nav-link').removeClass('active');
                $(this).addClass('active');
            });
            $('.tab-pane').click(function() {
                $('.tab-pane').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>

    <script>
        let langs = @json($langs);
        langs.forEach(lang => {
            // create a new instance of ClassicEditor
            ClassicEditor
                .create(document.querySelector(`#classic-editor-${lang.code}`))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
