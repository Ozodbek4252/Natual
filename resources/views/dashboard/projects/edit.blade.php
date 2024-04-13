@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="m-0">{{ __('body.Update Project') }}</h4>

                            <div class="my-2">
                                <a href="{{ Route('projects.index') }}"
                                    class="btn btn-secondary btn-soft-secondary waves-effect waves-light d-flex
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

                        <form action="{{ Route('projects.update', $project->id) }}" enctype="multipart/form-data"
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
                                                    <label class="form-label" for="project-address">
                                                        {{ __('body.Address') }} <span class="text-danger">*</span>
                                                    </label>
                                                    <input name="address_{{ $lang->code }}"
                                                        value="{{ $project->translations[$lang->code]['address']['content'] }}"
                                                        type="text" placeholder="{{ __('body.Enter address') }}..."
                                                        class="form-control" id="project-address-{{ $lang->code }}">
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
                                            <label class="form-label" for="project-image">
                                                {{ __('body.Image Preview') }}
                                            </label>
                                            <img src="{{ $project->new_image }}" width="200px">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="project-image">
                                                {{ __('body.Image') }}
                                            </label>
                                            <input name="image" type="file" class="form-control" id="project-image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="project-name">
                                                {{ __('body.Name') }} <span class="text-danger">*</span>
                                            </label>
                                            <input name="name" value="{{ $project->name }}"
                                                placeholder="{{ __('body.Enter name') }}..." type="text"
                                                class="form-control" id="project-name">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="project-date">
                                                {{ __('body.Date') }} <span class="text-danger">*</span>
                                            </label>
                                            <input name="date" value="{{ $project->date }}"
                                                placeholder="{{ __('body.Enter date') }}..." type="text"
                                                class="form-control" id="project-date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="category_id">
                                                @lang('body.Category') <span class="text-danger">*</span>
                                            </label>
                                            <select name="category_id" id="category_id" class="select2 form-select">
                                                <option value="">@lang('body.Select')</option>
                                                @foreach ($categories as $category)
                                                    <option @selected($category['id'] == $project->category_id) value="{{ $category['id'] }}">
                                                        {{ $category['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="row g-3">

                                <div class="col-md-2 mt-0 top-right d-flex justify-content-center align-items-baseline">
                                    <button type="button" id="add-day-button" style="width: 120px;"
                                        class="form-control mt-4 btn btn-primary btn-sm">
                                        @lang('body.Add facility')
                                    </button>
                                </div>

                                <div class="col-md-10 hidden-section m-0" id="labels-container-for-facilities">
                                    <div class="row g-3 mt-0">
                                        <div class="col-md-5">
                                            <label class="form-label">@lang('body.Facility')</label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">@lang('body.Value')</label>
                                        </div>
                                        <div class="col-md-1">
                                        </div>
                                    </div>
                                </div>

                                {{-- Hidden input to keep track of the number of sets of inputs --}}
                                <input type="hidden" id="inputCounter" value="0">
                            </div>


                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-6 d-flex align-items-end">
                                        <div class="form-check form-switch mb-3" dir="ltr">
                                            <label class="form-check-label"
                                                for="isFinishedSwitch">{{ __('body.Finished') }}</label>
                                            <input name="is_finished" type="checkbox" class="form-check-input"
                                                id="isFinishedSwitch" @checked($project->is_finished)>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="project-country">
                                                {{ __('body.Country') }}
                                            </label>
                                            <input name="country" value="{{ $project->country }}"
                                                placeholder="{{ __('body.Enter country') }}..." type="text"
                                                class="form-control" id="project-country">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="form-label" style="opacity: 0;">|</label>
                                            <button type="submit" id="project-create"
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

        var facilities = @json($project->facilities);

        function populateFacilities() {

            if (facilities.length > 0) {
                $("#labels-container-for-facilities").removeClass("hidden-section");
            }

            var inputCounter = parseInt($("#inputCounter").val());
            var newSetOfElements = '';
            $.each(facilities, function(index, facility) {
                newSetOfElements = newSetOfElements + `
                    <div class="row g-3 mb-4">
                        <div class="col-md-5 d-flex" style="padding-right: 37px;">
                            <select name="facilities[${inputCounter}][facility_id]" id="facility-select" class="form-select" style="width: calc(100% - 50px);">
                                <option>
                                    {{ __('body.Select') }}
                                </option>
                                @foreach ($facilities as $facility)
                                    <option value="{{ $facility['id'] }}" data-image="{{ asset('storage/' . $facility['image']) }}">
                                                {{ $facility['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="facilities[${inputCounter}][value]" placeholder="{{ __('body.Enter value') }}..."
                                value="${facility.value}" />
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger btn-sm remove-button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                `;

                inputCounter++;

                // Update the value of "inputCounter" in the hidden input
                $("#inputCounter").val(inputCounter);
            });

            $("#labels-container-for-facilities .row.g-3:last").after(newSetOfElements);
        }
        populateFacilities();

        // Add selected to schedules select option
        $.each(facilities, function(index, facility) {
            var selectElement = $('select[name="facilities[' + index + '][facility_id]"]');

            selectElement.each(function() {
                let selectedOption = $(this).find(`option[value="${facility.id}"]`);
                selectedOption.attr('selected', 'selected');

                let imageData = selectedOption.data('image');

                let imageTag = `
                    <img class="facility-image" src="${imageData}"
                        style="min-width: 38px; width: 38px; height: 38px;
                            object-fit: contain; margin-left: 12px"
                        alt="facility image">
                    `;

                $(this).after(imageTag);
            });
        });


        $("#add-day-button").on("click", function() {
            var inputCounter = parseInt($("#inputCounter").val());

            var newSetOfElements = `
                <div class="row g-3 mb-4">
                    <div class="col-md-5 d-flex" style="padding-right: 37px;">
                        <select name="facilities[${inputCounter}][facility_id]" id="facility-select" class="form-select" style="width: calc(100% - 50px);">
                            <option>
                                {{ __('body.Select') }}
                            </option>
                            @foreach ($facilities as $facility)
                                <option value="{{ $facility['id'] }}"
                                data-image="{{ asset('storage/' . $facility['image']) }}">
                                            {{ $facility['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="facilities[${inputCounter}][value]" placeholder="Enter value..."
                            value="{{ old('value', $item->value ?? '') }}" />
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm remove-button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            `;

            // Remove the "hidden-section" class before adding new elements
            $("#labels-container-for-facilities").removeClass("hidden-section");

            // Find the specific <div class="row g-3"> and insert newSetOfElements after it
            $("#labels-container-for-facilities .row.g-3:last").after(newSetOfElements);

            inputCounter++;

            // Update the value of "inputCounter" in the hidden input
            $("#inputCounter").val(inputCounter);
        });

        $(document).on('change', 'select[id="facility-select"]', function() {
            facilityImage = $(this).closest('.col-md-5').find('.facility-image');
            facilityImage.remove();

            // Get the selected option
            var selectedOption = $(this).find(":selected");

            // Get the value of the data-image attribute
            var imageData = selectedOption.data('image');

            let image = `
                <img class="facility-image" src="${imageData}"
                    style="min-width: 38px; width: 38px; height: 38px;
                        object-fit: contain; margin-left: 12px"
                    alt="facility image">
                `;

            $(this).after(image);
        });

        // Handle the remove button click event (for dynamically added elements)
        $(document).on("click", ".remove-button", function() {
            $(this).closest(".row").remove();
        });
    </script>
@endsection
