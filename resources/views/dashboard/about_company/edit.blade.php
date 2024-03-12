@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="m-0">{{ __('body.Update About') }}</h4>

                            <div class="my-2">
                                <a href="{{ Route('abouts.index') }}"
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

                        <form action="{{ Route('abouts.update', $about->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @method('PUT')
                            @csrf
                            <!-- Tab panes -->
                            <div class="tab-content p-3 text-muted">
                                @foreach ($langs as $lang)
                                    <div class="tab-pane" id="navtabs-{{ $lang->code }}" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="classic-editor-{{ $lang->code }}">
                                                        {{ __('body.Description') }} <span class="text-danger">*</span>
                                                    </label>
                                                    <textarea class="classic-editor" name="description_{{ $lang->code }}" id="classic-editor-{{ $lang->code }}">
                                                        @if (array_key_exists($lang->code, $about->translations))
                                                            {{ $about->translations[$lang->code]['description']['content'] }}
                                                        @endif
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3 d-flex flex-column">
                                            <label class="form-label" for="about-image-preview">
                                                {{ __('body.Image Preview') }}
                                            </label>
                                            <img src="{{ asset('storage/' . $about->image) }}" width="100%">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-3 d-flex flex-column">
                                            <label class="form-label" for="about-image-preview">
                                                {{ __('body.Additional Images Preview') }}
                                            </label>
                                            <div class="d-flex gap-3">
                                                @foreach ($about->images as $image)
                                                    <div class="d-flex">
                                                        <img src="{{ asset('storage/' . $image['name']) }}" class="py-1"
                                                            width="200px" style="object-fit: contain;">
                                                        <button type="button" class="btn-close" style="font-size: 10px;"
                                                            data-bs-toggle="modal"
                                                            data-bs-target=".delete-additionalImage-modal-{{ $image['id'] }}"></button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="about-image">
                                                {{ __('body.Image') }}
                                            </label>
                                            <input name="image" type="file" class="form-control" id="about-image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="about-additional-image">
                                                {{ __('body.Additional Images') }}
                                            </label>
                                            <input name="additional_images[]" multiple type="file" class="form-control"
                                                id="about-additional-image">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3 d-flex flex-column">
                                            <label class="form-label" for="about-certificates-preview">
                                                {{ __('body.Certificates Preview') }}
                                            </label>
                                            <div>
                                                <div id="pdfContainer" style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 pt-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="about-certificates">
                                                {{ __('body.Certificates') }}
                                            </label>
                                            <input name="certificates[]" multiple type="file" class="form-control"
                                                id="about-certificates">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="form-label" style="opacity: 0;">|</label>
                                            <button type="submit" id="about-update"
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

    {{--  Delete Additional Image Modal Beginning  --}}
    @foreach ($about->images as $additionalImage)
        <div class="modal fade delete-additionalImage-modal-{{ $additionalImage['id'] }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteAdditionalImageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAdditionalImageModalLabel">{{ __('body.Delete image') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form action="{{ Route('abouts.destroy.additionalImage', $additionalImage['id']) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            {{ __('body.Do you really want to delete this?') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light"
                                data-bs-dismiss="modal">{{ __('body.Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('body.Delete') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{--  Delete Additional Image Modal End  --}}

    {{--  Delete Certificates Modal Beginning  --}}
    @foreach ($about->certificates as $certificate)
        <div class="modal fade delete-certificate-modal-{{ $certificate['id'] }}" tabindex="-1" role="dialog"
            aria-labelledby="deleteCertificateModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCertificateModalLabel">{{ __('body.Delete Certificate') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form action="{{ Route('abouts.destroy.certificate', $certificate['id']) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            {{ __('body.Do you really want to delete this?') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light"
                                data-bs-dismiss="modal">{{ __('body.Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('body.Delete') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{--  Delete Certificates Modal End  --}}

    @php
        $arrayOfPdfs = [];
        foreach ($about->certificates as $index => $certificate) {
            $arrayOfPdfs[$index]['url'] = asset('storage/' . $certificate['name']);
            $arrayOfPdfs[$index]['id'] = $certificate['id'];
        }
    @endphp
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
        // Load PDF file
        const arrayOfPdfs = @json($arrayOfPdfs);

        const renderPdf = (pdfUrl, canvasId) => {
            pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
                pdf.getPage(1).then(function(page) {
                    const canvas = document.getElementById(canvasId);
                    const context = canvas.getContext('2d');
                    const viewport = page.getViewport({
                        scale: 1
                    });
                    canvas.width = viewport.width;
                    canvas.height = viewport.height;
                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            });
        };

        // Render PDF files
        arrayOfPdfs.forEach((pdfUrl, index) => {
            const canvasId = `pdfCanvas${index + 1}`;
            const canvasHtml =
                `<div class="d-flex">
                    <a href="${ pdfUrl.url }" target="_blank">
                        <canvas id="${canvasId}" style="width: 150px; height: auto; object-fit: contain;"></canvas>
                    </a>
                    <button type="button" class="btn-close" style="font-size: 10px;" data-bs-toggle="modal"
                    data-bs-target=".delete-certificate-modal-${pdfUrl.id}"></button>
                </div>
                `;
            document.getElementById('pdfContainer').innerHTML += canvasHtml;
            renderPdf(pdfUrl.url, canvasId);
        });


        // Rich text editor for each language
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
