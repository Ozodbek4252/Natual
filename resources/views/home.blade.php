@extends('front-layout')
@section('content')
    <!-- Header / Banner-->
    <header
        style="
        background-image: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.55),
            rgba(0, 0, 0, 0.55)
          ),
          url({{ $banner->image_original }});
      ">
        <div class="container">
            <div class="xl:px-20 px-4">
                <div style="display: flex; justify-content: end;">
                    <p data-aos="fade-up" class="xl:text-right text-center text-white md:text-2xl text-xs font-light"
                        style="width: 40%;">
                        {{ $bannerTranslations['description']['content'] }}
                    </p>
                </div>

                <h1 data-aos="flip-up" class="mt-6 mb-12 xl:text-right text-center leading-tight">
                    {{ $bannerTranslations['title']['content'] }}</h1>

                <a data-aos="zoom-in" class="btn btn-light btn-big"
                    href="{{ $banner->link }}">{{ $bannerTranslations['button']['content'] }}</a>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main>
        <!-- About Us -->
        <section class="section-about_us">
            <div class="container">
                <div class="grid grid-cols-12 gap-6">
                    <div class="md:col-span-8 col-span-full">
                        <h2 data-aos="zoom-in-up" class="text-green-light mb-12">
                            {{ $sectionTranslations['title']['content'] }}
                        </h2>

                        <div class="mb-8">
                            {!! $sectionTranslations['description']['content'] !!}
                        </div>
                        <a data-aos="zoom-in" class="btn btn-green btn-medium"
                            href="{{ $section->link }}">{{ __('front.home.Узнать больше') }}</a>
                    </div>

                    <div data-aos="zoom-in" class="md:col-span-4 col-span-full">
                        <img src="{{ asset('storage/' . $section->image) }}" alt="experience" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section class="section-features"
            style="
          background-image: linear-gradient(
              to bottom,
              rgba(0, 0, 0, 0.7),
              rgba(0, 0, 0, 0.7)
            ),
            url({{ asset('front/img/features-img.png') }});">
            <div class="container">
                <div data-aos="zoom-in" class="swiper swiper-features">
                    <div class="swiper-wrapper">
                        @foreach ($services as $service)
                            <div class="swiper-slide">
                                <div class="slide-shape">
                                    <div class="slide-img">
                                        <img src="{{ asset('storage/' . $service->icon) }}" />
                                    </div>
                                </div>
                                <div class="slide-content">
                                    <h3>{{ $service['translations']['title']['content'] }}:</h3>
                                    <ul>
                                        {!! $service['translations']['description']['content'] !!}
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                        <!-- Dont Delete -->
                        @foreach ($services as $service)
                            <div class="swiper-slide">
                                <div class="slide-shape">
                                    <div class="slide-img">
                                        <img src="{{ asset('storage/' . $service->icon) }}" />
                                    </div>
                                </div>
                                <div class="slide-content">
                                    <h3>{{ $service['translations']['title']['content'] }}:</h3>
                                    <ul>
                                        {!! $service['translations']['description']['content'] !!}
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next swiper-button-next-features"></div>
                    <div class="swiper-button-prev swiper-button-prev-features"></div>
                </div>
            </div>
        </section>

        <!-- Owner -->
        <section class="section-ceo">
            <div class="container relative py-20">
                <div class="grid grid-cols-12 gap-6 ceo-content md:px-12">
                    <div data-aos="zoom-in" class="md:col-span-5 col-span-full">
                        <img src="{{ asset('storage/' . $staff->image) }}" alt="ceo" />
                    </div>
                    <div class="md:col-span-7 col-span-full flex justify-center items-center flex-col text-center">
                        <h2 data-aos="flip-up" class="mb-12">{{ $staff->name }}</h2>
                        <div>
                            <p data-aos="fade-up" class="mb-4">
                                {{ ucfirst($staffTranslations['position']['content']) }}
                            </p>
                            <p data-aos="fade-up" class="mb-4">
                                {{ ucfirst(__('front.home.email')) }}:
                                <a class="hover:underline" href="mailto:{{ $staff->email }}">
                                    {{ $staff->email }}
                                </a>
                            </p>
                            <p data-aos="fade-up" class="mb-4">
                                {{ ucfirst(__('front.home.сайт')) }}:
                                <a class="hover:underline" target="_blank"
                                    href="https://{{ $staff->website }}">{{ $staff->website }}</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pointers">
                    <img data-aos="zoom-in" class="absolute top-0 left-0 w-32"
                        src="{{ asset('front/img/pointer-top-left.png') }}" alt="pointer-top-left">
                    <img data-aos="zoom-in" class="absolute top-0 right-0 w-48"
                        src="{{ asset('front/img/pointer-top-right.png') }}" alt="pointer-top-right">
                    <img data-aos="zoom-in" class="absolute bottom-32 right-16 w-28"
                        src="{{ asset('front/img/pointer-bottom-right.png') }}" alt="pointer-bottom-right">
                    <img data-aos="zoom-in" class="absolute bottom-8 left-1/3 w-28"
                        src="{{ asset('front/img/pointer-bottom-left.png') }}" alt="pointer-bottom-left">
                </div>
            </div>
        </section>

        <!-- Projects -->
        <section class="section-projects" id="projects">
            <h2 data-aos="fade-up">{{ __('front.home.Наши профессиональные ландшафтные дизайны') }}</h2>

            <div class="container py-20 lg:px-12">
                <div class="grid grid-cols-12 lg:gap-12 gap-6">
                    @foreach ($categories as $category)
                        <div class="md:col-span-6 col-span-full">
                            <div data-aos="zoom-in" class="project">
                                <div class="project-body">
                                    <a href="{{ Route('front.category', $category->id) }}"
                                        class="project-inner relative block">
                                        <img src="{{ $category->image }}" alt="home page project 1" />
                                        <div class="project-title">
                                            <h3>{{ $category['translations']['name']['content'] }}</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
