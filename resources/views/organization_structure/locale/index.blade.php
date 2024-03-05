@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="card-title">Locales</h4>
                            </div>
                            <div>
                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                                    data-bs-target="#localeModal">
                                    <i class="uil-plus"></i> Add
                                </button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-editable table-nowrap align-middle table-edits">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id="1">
                                        <td data-field="id" style="width: 80px">1</td>
                                        <td data-field="name">David McHenry</td>
                                        <td data-field="age">24</td>
                                        <td data-field="gender">Male</td>
                                        <td style="width: 100px">
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-id="2">
                                        <td data-field="id">2</td>
                                        <td data-field="name">Frank Kirk</td>
                                        <td data-field="age">22</td>
                                        <td data-field="gender">Male</td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-id="3">
                                        <td data-field="id">3</td>
                                        <td data-field="name">Rafael Morales</td>
                                        <td data-field="age">26</td>
                                        <td data-field="gender">Male</td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-id="4">
                                        <td data-field="id">4</td>
                                        <td data-field="name">Mark Ellison</td>
                                        <td data-field="age">32</td>
                                        <td data-field="gender">Male</td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-id="5">
                                        <td data-field="id">5</td>
                                        <td data-field="name">Minnie Walter</td>
                                        <td data-field="age">27</td>
                                        <td data-field="gender">Female</td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--  Modal Beginning  --}}
    <div id="localeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="localeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            @livewire('store-locale')
        </div>
    </div>
    {{--  Modal End  --}}
@endsection
