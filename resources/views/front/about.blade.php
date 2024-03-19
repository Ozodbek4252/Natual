@extends('front-layout')
@section('content')
    <!-- Header -->
    <header
        style="
        background-image: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.55),
            rgba(0, 0, 0, 0.55)
          ),
          url({{ asset('storage/' . $about->image) }});
      ">
        <div class="container">
            <div class="lg:px-20">
                <h2 data-aos="flip-up" class="text-center leading-tight">{{ __('front.about.О Нашей Компании') }}</h2>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main>
        <!-- About Us -->
        <section class="section-about"
            style="
          background-image: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.01),
            rgba(0, 0, 0, 0.01)
          ), url({{ asset('front/img/pages/green-leaves-background.png') }});">
            <div class="container">
                <div class="grid grid-cols-12 gap-6">
                    <div class="md:col-span-7 col-span-full">
                        <p data-aos="fade-up" class="mb-8">
                            {!! $aboutTranslations['description']['content'] !!}
                        </p>
                    </div>


                    <div data-aos="zoom-in" class="md:col-span-5 col-span-full">
                        <img src="{{ asset('storage/' . $files['images'][0]['name']) }}" alt="about-images" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Ceritificate -->
        <section class="section-certificate">
            <div class="container">
                <div class="flex justify-between items-center flex-wrap">
                    @if (array_key_exists('certificates', $files))
                        <div id="pdfContainer" style="display: flex; flex-wrap: wrap;">
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>

    @php
        $arrayOfPdfs = [];
        if (array_key_exists('certificates', $files)) {
            foreach ($files['certificates'] as $index => $certificate) {
                $arrayOfPdfs[$index]['url'] = asset('storage/' . $certificate['name']);
                $arrayOfPdfs[$index]['id'] = $certificate['id'];
            }
        }
    @endphp
@endsection
@section('js')
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

            const canvasHtml = `
                <div data-aos="zoom-in" class="md:w-1/4 w-full lg:p-10">
                    <a class="block shadow-2xl" href="${ pdfUrl.url }" data-fancybox="gallery"
                        data-caption="Certificate #1">
                        <canvas id="${canvasId}"></canvas>
                    </a>
                </div>`;

            document.getElementById('pdfContainer').innerHTML += canvasHtml;
            renderPdf(pdfUrl.url, canvasId);
        });
    </script>
@endsection
