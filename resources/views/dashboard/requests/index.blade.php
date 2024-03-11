@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title pb-3">{{ __('body.Requests') }}</h4>

                <div class="table-responsive mb-3">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>{{ __('body.Name') }}</th>
                                <th>{{ __('body.Number') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = ($requests->currentPage() - 1) * $requests->perPage();
                            @endphp
                            @foreach ($requests as $request)
                                <tr>
                                    <th scope="row">{{ ++$count }}</th>
                                    <td>{{ $request->name }}</td>
                                    <td>{{ $request->number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $requests->links() }}
            </div>
        </div>
    </div>
@endsection
