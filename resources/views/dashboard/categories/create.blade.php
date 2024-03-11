@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="m-0">{{ __('body.Create Category') }}</h4>

                            <div class="my-2">
                                <a href="{{ Route('categories.index') }}"
                                    class="btn btn-secondary btn-soft-secondary waves-effect
                                        waves-light d-flex
                                        align-items-center justify-content-between">
                                    <i class='bx bx-arrow-back'></i>
                                    {{ __('body.Back') }}
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

                        <form action="{{ Route('categories.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane" id="navtabs-{{ $lang->code }}" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="category-name">
                                                        {{ __('body.Name') }} <span class="text-danger">*</span>
                                                    </label>
                                                    <input name="name_{{ $lang->code }}" type="text"
                                                        placeholder="{{ __('body.Enter name') }}..." class="form-control"
                                                        id="category-name-{{ $lang->code }}">
                                                </div>
                                            </div>
                                            {{--  <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="classic-editor-{{ $lang->code }}">
                                                        Description <span class="text-danger">*</span>
                                                    </label>
                                                    <textarea class="classic-editor" name="description_{{ $lang->code }}" id="classic-editor-{{ $lang->code }}"></textarea>
                                                </div>
                                            </div>  --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="category-image">
                                                {{ __('body.Image') }} <span class="text-danger">*</span>
                                            </label>
                                            <input name="image" type="file" class="form-control" id="category-image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="form-label" style="opacity: 0;">|</label>
                                            <button type="submit" id="category-create"
                                                class="btn btn-primary waves-effect waves-light form-control">
                                                {{ __('body.Create') }}
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

    {{--  <script>
        let langs = @json($langs);
        langs.forEach(lang => {
            // create a new instance of ClassicEditor
            ClassicEditor
                .create(document.querySelector(`#classic-editor-${lang.code}`))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>  --}}
@endsection
