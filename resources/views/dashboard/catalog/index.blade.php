@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title pb-3">{{ __('body.Catalog') }}</h4>

                <div class="table-responsive mb-3">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>{{ __('body.File') }}</th>
                                <th>{{ __('body.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ asset('storage/' . $catalog->file) }}" target="_blank">{{ __('body.Catalog') }}</a>
                                </td>
                                <td style="width: 110px;">
                                    <a href="{{ Route('catalog.edit', $catalog->id) }}" style="min-width: 150px;"
                                        class="btn btn-warning waves-effect waves-light">
                                        <i class="fas fa-pen"></i>
                                        {{ __('body.Edit') }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
