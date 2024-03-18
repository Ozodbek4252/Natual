@extends('front-layout')
@section('content')
    <main>
        <!-- Project Item -->
        <section class="section-project_item">
            <div class="container">
                <div class="grid grid-cols-12 lg:gap-16 gap-6">
                    <div data-aos="zoom-in" class="lg:col-span-6 col-span-full flex justify-center items-center">
                        <a class="block project-item__img" href="{{ asset('storage/' . $project->image) }}"
                            data-fancybox="gallery" data-caption="{{ $project->name }}">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}">
                        </a>
                    </div>

                    <div class="lg:col-span-6 col-span-full project-item__detail">
                        <h3 data-aos="flip-up">{{ $project->name }} - {{ $project->date }}</h3>
                        <p data-aos="flip-up">{{ $projectTranslations['address']['content'] }}</p>

                        <div class="grid grid-cols-12 gap-6 mt-10">
                            @foreach ($project->facilities as $facility)
                                <div class="md:col-span-6 col-span-full gap-6 project-item__info">
                                    <div data-aos="fade-up" class="grid grid-cols-12">
                                        <div class="col-span-3 flex justify-center items-center">
                                            <img src="{{ asset('storage/' . $facility['image']) }}" alt="person">
                                        </div>
                                        <div class="col-span-9 pl-4">
                                            <p>{{ $facility['translations']['name']['content'] }}</p>
                                            <p>{{ $facility['pivot']['value'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
