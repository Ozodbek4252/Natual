@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center pb-3">
                    <h4 class="card-title">{{ __('body.Contacts') }}</h4>
                    <div>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target=".create-contact-modal">
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
                                <th>{{ __('body.Title') }}</th>
                                <th>{{ __('body.Value') }}</th>
                                <th>{{ __('body.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = ($contacts->currentPage() - 1) * $contacts->perPage();
                            @endphp
                            @foreach ($contacts as $contact)
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td>{{ ucfirst($contact->title) }}</td>
                                    <td>{{ $contact->value }}</td>
                                    <td style="width: 250px;">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target=".edit-contact-modal-{{ $contact->id }}"
                                            class="btn btn-warning waves-effect waves-light my-2">
                                            <i class="fas fa-pen"></i>
                                            {{ __('body.Edit') }}
                                        </button>
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target=".delete-contact-modal-{{ $contact->id }}"
                                            class="btn btn-danger waves-effect waves-light">
                                            <i class="fas fa-trash"></i>
                                            {{ __('body.Delete') }}
                                        </button>
                                    </td>
                                </tr>

                                {{--  Delete Modal Beginning  --}}
                                <div class="modal fade delete-contact-modal-{{ $contact->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteContactModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteContactModalLabel">
                                                    {{ __('body.Delete Contact') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ Route('contacts.destroy', $contact->id) }}" method="POST">
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
                                <div class="modal fade edit-contact-modal-{{ $contact->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editContactModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editContactModalLabel">
                                                    {{ __('body.Update Contact') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{ Route('contacts.update', $contact->id) }}"
                                                enctype="multipart/form-data" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="contact-title">{{ __('body.Title') }}</label>
                                                                <input value="{{ $contact->title }}" name="title"
                                                                    placeholder="{{ __('body.Enter title') }}..."
                                                                    type="text" class="form-control" id="contact-title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="contact-value">{{ __('body.Value') }}</label>
                                                                <input value="{{ $contact->value }}" name="value"
                                                                    placeholder="{{ __('body.Enter value') }}..."
                                                                    type="text" class="form-control" id="contact-value">
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

                {{ $contacts->links() }}
            </div>
        </div>
    </div>

    {{--  Create Modal Beginning  --}}
    <div class="modal fade create-contact-modal" tabindex="-1" role="dialog" aria-labelledby="createContactModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createContactModalLabel">{{ __('body.Create Contact') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="{{ Route('contacts.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="contact-title">{{ __('body.Title') }}</label>
                                    <input name="title" type="text" placeholder="{{ __('body.Enter title') }}..." class="form-control" id="contact-title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="contact-value">{{ __('body.Value') }}</label>
                                    <input name="value" type="text" placeholder="{{ __('body.Enter value') }}..." class="form-control" id="contact-value">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">{{ __('body.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('body.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--  Create Modal End  --}}
@endsection
