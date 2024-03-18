@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="m-0">{{ __('body.Update Catalog') }}</h4>

                            <div class="my-2">
                                <a href="{{ Route('catalog.index') }}"
                                    class="btn btn-secondary btn-soft-secondary waves-effect waves-light d-flex
                                        align-items-center justify-content-between">
                                    <i class='bx bx-arrow-back'></i>
                                    {{ __('body.Back') }}
                                </a>
                            </div>
                        </div>

                        <form action="{{ Route('catalog.update', $catalog->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @method('PUT')
                            @csrf

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="catalog-image">
                                                {{ __('body.File') }}
                                            </label>
                                            <input name="file" type="file" class="form-control" id="catalog-image">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="form-label" style="opacity: 0;">|</label>
                                            <button type="submit" id="catalog-update"
                                                class="btn btn-primary waves-effect waves-light form-control">
                                                {{ __('body.Update') }}
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
