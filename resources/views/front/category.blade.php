<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('front.includes.links')
</head>

<body>
    @include('front.navbar')

    <!-- Header -->
    <header
        style="
        background-image: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.55),
            rgba(0, 0, 0, 0.55)
          ),
          url({{ asset('storage/' . $category->image) }});">
        <div class="container">
            <div class="lg:px-20">
                <h2 data-aos="flip-up" class="text-center leading-tight">{{ $categoryTranslations['name']['content'] }}
                </h2>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main>
        @if (isset($projects['Uzbekistan']))
            <!-- Local Projects -->
            <section class="section-projects_catalog">
                <div class="container">
                    @if (isset($projects['Uzbekistan'][1]))
                        <div class="grid grid-cols-12 lg:gap-16 lg:px-20 gap-6">
                            @foreach ($projects['Uzbekistan'][1] as $project)
                                <div data-aos="zoom-in" class="md:col-span-6 xl:col-span-4 col-span-full">
                                    <a href="{{ Route('front.project.show', $project['id']) }}" class="project-item">
                                        <img src="{{ asset('storage/' . $project['image']) }}" alt="project-item img">
                                        <div class="project-item__title">
                                            <h3>{{ $project['name'] }} - {{ $project['date'] }}</h3>
                                            <p>{{ $project['translations']['address']['content'] }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </section>

            @if (isset($projects['Uzbekistan'][0]))
                <!-- Currently Projects -->
                <section class="section-projects_catalog pt-[0]">
                    <div class="container">
                        <h2 class="text-green-light text-center">{{ __('front.project.Наши проекты в процессе') }}</h2>

                        <div class="grid grid-cols-12 lg:gap-16 lg:px-20 gap-6">
                            @foreach ($projects['Uzbekistan'][0] as $project)
                                <div data-aos="zoom-in" class="md:col-span-6 xl:col-span-4 col-span-full">
                                    <a href="{{ Route('front.project.show', $project['id']) }}" class="project-item">
                                        <img src="{{ asset('storage/' . $project['image']) }}" alt="project-item img">

                                        <div class="project-item__title">
                                            <h3>{{ $project['name'] }} - {{ $project['date'] }}</h3>
                                            <p>{{ $project['translations']['address']['content'] }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        @else
            <!-- Around The World Projects -->
            <section class="section-projects_catalog pt-[0]">
                @foreach ($projects as $country => $project)
                    <div class="container">
                        <h4>{{ $country }}</h4>

                        <div class="grid grid-cols-12 lg:gap-16 lg:px-20 gap-6">
                            @if (isset($project[1]))
                                @foreach ($project[1] as $project)
                                    <div data-aos="zoom-in" class="md:col-span-6 xl:col-span-4 col-span-full">
                                        <a href="{{ Route('front.project.show', $project['id']) }}"
                                            class="project-item">
                                            <img src="{{ asset('storage/' . $project['image']) }}"
                                                alt="project-item img">

                                            <div class="project-item__title">
                                                <h3>{{ $project['name'] }} - {{ $project['date'] }}</h3>
                                                <p>{{ $project['translations']['address']['content'] }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif

                            @if (isset($project[0]))
                                @foreach ($project[0] as $project)
                                    <div data-aos="zoom-in" class="md:col-span-6 xl:col-span-4 col-span-full">
                                        <a href="{{ Route('front.project.show', $project['id']) }}"
                                            class="project-item">
                                            <img src="{{ asset('storage/' . $project['image']) }}"
                                                alt="project-item img">

                                            <div class="project-item__title">
                                                <h3>{{ $project['name'] }} - {{ $project['date'] }}</h3>
                                                <p>{{ $project['translations']['address']['content'] }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach
            </section>
        @endif


        <!-- Каталог -->
        <div class="container flex justify-center items-center pb-20">
            <a class="btn btn-green btn-big" href="#more">{{ __('front.category.Каталог') }}</a>
        </div>
    </main>

    @include('front.footer')

    @include('front.request-modal')

    @include('front.includes.scripts')
</body>

</html>
