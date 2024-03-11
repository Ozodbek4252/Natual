@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center pb-3">
                    <h4 class="card-title">{{ __('body.Partners') }}</h4>
                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".create-partner-modal">
                            <i class="fas fa-plus"></i>
                            {{ __('body.Create') }}
                        </button>
                    </div>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>{{ __('body.Logo') }}</th>
                                <th>{{ __('body.Name') }}</th>
                                <th>{{ __('body.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = ($partners->currentPage() - 1) * $partners->perPage();
                            @endphp
                            @foreach ($partners as $partner)
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td>
                                        <img src="{{ asset('storage/' . $partner->logo) }}"
                                            style="width: 100px; height: 100px;" alt="">
                                    </td>
                                    <td>{{ $partner->name }}</td>
                                    <td style="width: 250px;">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target=".edit-partner-modal-{{ $partner->id }}"
                                            class="btn btn-warning waves-effect waves-light my-2">
                                            <i class="fas fa-pen"></i>
                                            {{ __('body.Edit') }}
                                        </button>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target=".delete-partner-modal-{{ $partner->id }}"
                                            class="btn btn-danger waves-effect waves-light">
                                            <i class="fas fa-trash"></i>
                                            {{ __('body.Delete') }}
                                        </button>
                                    </td>
                                </tr>

                                {{--  Delete Modal Beginning  --}}
                                <div class="modal fade delete-partner-modal-{{ $partner->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deletePartnerModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deletePartnerModalLabel">
                                                    {{ __('body.Delete Partner') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ Route('partners.destroy', $partner->id) }}" method="POST">
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

                                {{--  Edit Modal Beginning  --}}
                                <div class="modal fade edit-partner-modal-{{ $partner->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editPartnerModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPartnerModalLabel">
                                                    {{ __('body.Update Partner') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ Route('partners.update', $partner->id) }}"
                                                enctype="multipart/form-data" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="partner-image">{{ __('body.Logo') }}</label>
                                                                <input name="logo" type="file" class="form-control"
                                                                    id="partner-image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="partner-name">{{ __('body.Name') }}</label>
                                                                <input value="{{ $partner->name }}" name="name"
                                                                    placeholder="{{ __('body.Enter name') }}..."
                                                                    type="text" class="form-control" id="partner-name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">{{ __('body.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-primary">{{ __('body.Update') }}</button>
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

                {{ $partners->links() }}
            </div>
        </div>
    </div>

    {{--  Create Modal Beginning  --}}
    <div class="modal fade create-partner-modal" tabindex="-1" role="dialog" aria-labelledby="createPartnerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPartnerModalLabel">{{ __('body.Create Partner') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="{{ Route('partners.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="partner-image">{{ __('body.Logo') }}</label>
                                    <input name="logo" type="file" class="form-control" id="partner-image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="partner-name">{{ __('body.Name') }}</label>
                                    <input name="name" type="text" placeholder="{{ __('body.Enter name') }}..." class="form-control" id="partner-name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('body.Close') }}Close</button>
                        <button type="submit" class="btn btn-primary">{{ __('body.Save') }}Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  Create Modal End  --}}
@endsection
