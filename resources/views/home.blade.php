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
          url('{{ asset('front/img/header-img.png') }}');
      ">
        <div class="container">
            <div class="xl:px-20 px-4">
                <p data-aos="fade-up" class="xl:text-right text-center text-white md:text-2xl text-xs font-light">
                    Измените <b>ландшафтный дизайн</b> вокруг себя <br />
                    - подчеркните индивидуальность
                </p>

                <h1 data-aos="flip-up" class="mt-6 mb-12 xl:text-right text-center leading-tight">Natural Peyzaj</h1>

                <a data-aos="zoom-in" class="btn btn-light btn-big" href="#catalog">Каталог</a>
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
                            Профессиональные ландшафтные услуги более
                        </h2>

                        <p data-aos="fade-up" class="mb-8">
                            <b>Natural Peyzaj</b> входит в число компаний, которые формируют
                            сектор с его завершенными и в настоящее время действующими
                            зарубежными и отечественными проектами и приложениями для
                            промышленности, дорог, туристических объектов, торговых центров,
                            жилищного строительства.
                        </p>

                        <p data-aos="fade-up" class="mb-12">
                            Основанная в 1996 году, наша компания предоставляет услуги в
                            ландшафтном секторе с архитектурным офисом, теплицами и
                            питомником, расположенными на 16 акрах в Эйюпе Кемербургазе.
                        </p>

                        <a data-aos="zoom-in" class="btn btn-green btn-medium" href="#more">Узнать больше</a>
                    </div>

                    <div data-aos="zoom-in" class="md:col-span-4 col-span-full">
                        <img src="{{ asset('front/img/experience.png') }}" alt="experience" />
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
                        <div class="swiper-slide">
                            <div class="slide-shape">
                                <div class="slide-img">
                                    <img src="{{ asset('front/img/sirkul.png') }}" />
                                </div>
                            </div>
                            <div class="slide-content">
                                <h3>Ландшафтное проектирование:</h3>
                                <ul>
                                    <li>
                                        -Дендроплан
                                    </li>
                                    <li>
                                        -Подробная схема посадки
                                    </li>
                                    <li>
                                        -Разработка цветников
                                    </li>
                                    <li>
                                        -Ассортиментная ведомость всех растений
                                    </li>
                                    <li>
                                        -План газонного покрытия
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-shape">
                                <div class="slide-img">
                                    <img src="{{ asset('front/img/cloud.png') }}" />
                                </div>
                            </div>
                            <div class="slide-content">
                                <h3>Озеленение:</h3>
                                <ul>
                                    <li>
                                        -Разработка растительного грунта
                                    </li>
                                    <li>
                                        -Посадка кустарников
                                    </li>
                                    <li>
                                        -Система полива
                                    </li>
                                    <li>
                                        -Установка рулонного газона
                                    </li>
                                    <li>
                                        -Система грунтового дренажа
                                    </li>
                                    <li>
                                        -Установка Гидропосева
                                    </li>
                                    <li>
                                        -Система кровельного дренажа
                                    </li>
                                    <li>
                                        -Укладка декоративного камня
                                    </li>
                                    <li>
                                        -Посадка деревьев
                                    </li>
                                    <li>
                                        -Установка разделителей
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-shape">
                                <div class="slide-img">
                                    <img src="{{ asset('front/img/beton.png') }}" />
                                </div>
                            </div>
                            <div class="slide-content">
                                <h3>Мошение:</h3>
                                <ul>
                                    <li>
                                        -Подготовка основания для бетонных работ (ГПС+Щебень)
                                    </li>
                                    <li>
                                        -Работа по подготовочным бетонам
                                    </li>
                                    <li>
                                        -Укладка бетонных или каменных бордюров
                                    </li>
                                    <li>
                                        -Укладка бетонной или каменной брусчатки
                                    </li>
                                    <li>
                                        -Установка бетона с декоративной поверхности
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Dont Delete -->
                        <div class="swiper-slide">
                            <div class="slide-shape">
                                <div class="slide-img">
                                    <img src="{{ asset('front/img/sirkul.png') }}" />
                                </div>
                            </div>
                            <div class="slide-content">
                                <h3>Ландшафтное проектирование::</h3>
                                <ul>
                                    <li>
                                        -Дендроплан
                                    </li>
                                    <li>
                                        -Подробная схема посадки
                                    </li>
                                    <li>
                                        -Разработка цветников
                                    </li>
                                    <li>
                                        -Ассортиментная ведомость всех растений
                                    </li>
                                    <li>
                                        -План газонного покрытия
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-shape">
                                <div class="slide-img">
                                    <img src="{{ asset('front/img/cloud.png') }}" />
                                </div>
                            </div>
                            <div class="slide-content">
                                <h3>Озеленение:</h3>
                                <ul>
                                    <li>
                                        -Разработка растительного грунта
                                    </li>
                                    <li>
                                        -Посадка кустарников
                                    </li>
                                    <li>
                                        -Система полива
                                    </li>
                                    <li>
                                        -Установка рулонного газона
                                    </li>
                                    <li>
                                        -Система грунтового дренажа
                                    </li>
                                    <li>
                                        -Установка Гидропосева
                                    </li>
                                    <li>
                                        -Система кровельного дренажа
                                    </li>
                                    <li>
                                        -Укладка декоративного камня
                                    </li>
                                    <li>
                                        -Посадка деревьев
                                    </li>
                                    <li>
                                        -Установка разделителей
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-shape">
                                <div class="slide-img">
                                    <img src="{{ asset('front/img/beton.png') }}" />
                                </div>
                            </div>
                            <div class="slide-content">
                                <h3>Мошение:</h3>
                                <ul>
                                    <li>
                                        -Подготовка основания для бетонных работ (ГПС+Щебень)
                                    </li>
                                    <li>
                                        -Работа по подготовочным бетонам
                                    </li>
                                    <li>
                                        -Укладка бетонных или каменных бордюров
                                    </li>
                                    <li>
                                        -Укладка бетонной или каменной брусчатки
                                    </li>
                                    <li>
                                        -Установка бетона с декоративной поверхности
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                        <img src="{{ asset('front/img/ceo.png') }}" alt="ceo" />
                    </div>
                    <div class="md:col-span-7 col-span-full flex justify-center items-center flex-col text-center">
                        <h2 data-aos="flip-up" class="mb-12">MUSTAFA FEDAİ ÖZASLAN</h2>
                        <div>
                            <p data-aos="fade-up" class="mb-4">Региональный директор</p>
                            <p data-aos="fade-up" class="mb-4">
                                тел:
                                <a class="hover:underline" href="tel:+998 97 156 74 94">+998 97 156 74 94</a>
                            </p>
                            <p data-aos="fade-up" class="mb-4">
                                email:
                                <a class="hover:underline" href="mailto:mustafa@naturalpeyzaj.com.tr">
                                    mustafa@naturalpeyzaj.com.tr
                                </a>
                            </p>
                            <p data-aos="fade-up" class="mb-4">
                                сайт:
                                <a class="hover:underline" target="_blank"
                                    href="https://naturalpeyzaj.com.tr">naturalpeyzaj.com.tr</a>
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
            <h2 data-aos="fade-up">Наши профессиональные ландшафтные дизайны</h2>

            <div class="container py-20 lg:px-12">
                <div class="grid grid-cols-12 lg:gap-12 gap-6">
                    <div class="md:col-span-6 col-span-full">
                        <div data-aos="zoom-in" class="project">
                            <div class="project-body">
                                <a href="projects-local.html" class="project-inner relative block">
                                    <img src="{{ asset('front/img/home-page-project-1.png') }}"
                                        alt="home page project 1" />
                                    <div class="project-title">
                                        <h3>Проекты в Узбекистане</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="md:col-span-6 col-span-full">
                        <div data-aos="zoom-in" class="project">
                            <div class="project-body">
                                <a href="projects-world.html" class="project-inner relative block">
                                    <img src="{{ asset('front/img/home-page-project-2.png') }}"
                                        alt="home page project 1" />
                                    <div class="project-title">
                                        <h3>Проекты за границей</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
