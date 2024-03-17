<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="194x194" href="img/favicon/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#376300">
    <link rel="shortcut icon" href="img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#376300">
    <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png">
    <meta name="msapplication-config" content="img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#376300">

    <title>Natural Peyzaj</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Playfair+Display+SC&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet" />

    <!-- Link Swipers CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Fancybox css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <!-- Aos Css -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- <link href="css/base.css" rel="stylesheet" /> -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" />

</head>

<body>
    <!-- Navbar -->
    <div id="navbar" class="navbar fixed top-0 w-full bg-white z-40">
        <div class="container h-full flex items-center justify-between">
            <a href="index.html" class="logo block">
                <img class="" src="{{ asset('front/img/logo.png') }}" alt="logo" />
            </a>

            <button class="lg:hidden flex ml-auto top-7 right-4 fixed w-10" type="button" id="toggle-button">
                <svg width="46" height="26" viewBox="0 0 46 26" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2H44" stroke="#376300" stroke-width="4" stroke-linecap="round" />
                    <path d="M2 13H30" stroke="#376300" stroke-width="4" stroke-linecap="round" />
                    <path d="M2 24H44" stroke="#376300" stroke-width="4" stroke-linecap="round" />
                </svg>
            </button>

            <nav class="flex items-center ml-12 nav-links" id="nav-links">
                <a href="index.html" class="menu-logo lg:hidden block">
                    <img class="" src="{{ asset('front/img/logo.png') }}" alt="logo" />
                </a>

                <button id="close-button" class="order-1 lg:hidden block fixed top-6 right-6">
                    <svg width="33" height="19" viewBox="0 0 33 19" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M30.3644 9.15322L31.2021 9.87427L32.0374 9.15322L31.2021 8.43216L30.3644 9.15322ZM29.5267 8.43216L20.0613 16.5797L21.7367 18.0218L31.2021 9.87427L29.5267 8.43216ZM31.2021 8.43216L21.7367 0.284668L20.0613 1.72677L29.5267 9.87427L31.2021 8.43216ZM30.3644 8.13478L0.785047 8.13478L0.785047 10.1717L30.3644 10.1717L30.3644 8.13478Z"
                            fill="#837655" />
                    </svg>
                </button>

                <ul class="nav-pages flex items-center order-2">
                    <li>
                        <a class="active" href="index.html">Главная</a>
                    </li>
                    <li>
                        <a href="about.html">О нас</a>
                    </li>
                    <li>
                        <a href="#contact">Контакт</a>
                    </li>
                    <li>
                        <a href="/#projects">Проекты</a>
                    </li>
                </ul>

                <button id="order-now-btn" class="xl:order-3 order-4 btn btn-green ml-auto mr-4">Оставить
                    заявку</button>

                <div class="flex items-center xl:my-0 my-4 xl:order-4 order-3">
                    <div class="lang relative mx-4">
                        <span class="lang-selected cursor-pointer">Ru</span>
                        <div class="lang-list absolute">
                            <a href="#uz">Uz</a>
                        </div>
                    </div>

                    <a class="nav-phone flex items-center" href="tel:+9989 78 777 77 22">
                        <span class="mr-2">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.1339 17.3842C19.2708 17.2474 19.377 17.0831 19.4456 16.9021C19.5141 16.7211 19.5434 16.5276 19.5314 16.3345C19.5194 16.1413 19.4664 15.9529 19.376 15.7818C19.2857 15.6107 19.1599 15.4608 19.0071 15.342L16.0669 13.0556L16.0664 13.0552C15.9031 12.9286 15.7133 12.8407 15.5111 12.7982C15.309 12.7557 15.0998 12.7596 14.8994 12.8097L12.1084 13.5069L12.1083 13.5069C11.8195 13.5791 11.5169 13.5752 11.23 13.4958C10.9432 13.4163 10.6818 13.2639 10.4713 13.0535C10.4713 13.0534 10.4712 13.0534 10.4712 13.0534L7.34109 9.922L7.3408 9.92171C7.13013 9.7113 6.97755 9.44993 6.8979 9.16304C6.81826 8.87615 6.81427 8.57352 6.88633 8.28463L7.58467 5.49381L7.58469 5.49374C7.6348 5.29334 7.63875 5.08417 7.59623 4.88202C7.55371 4.67987 7.46583 4.49002 7.33923 4.32679L7.33884 4.32629L5.05241 1.38605C5.0524 1.38603 5.05238 1.38601 5.05237 1.38599C4.9336 1.23323 4.7837 1.10749 4.6126 1.01711C4.44149 0.926715 4.2531 0.873766 4.05995 0.861778C3.86679 0.849789 3.6733 0.879035 3.49232 0.947573C3.31136 1.0161 3.14706 1.12235 3.01031 1.25925C3.01029 1.25927 3.01028 1.25928 3.01026 1.2593L1.69247 2.57837L1.69227 2.57856C0.956392 3.31597 0.661438 4.38639 1.00089 5.35327L1.00103 5.35367C2.14201 8.59468 3.99797 11.5373 6.43127 13.9632C8.8572 16.3964 11.7998 18.2524 15.0408 19.3934L15.0412 19.3935C16.008 19.733 17.0785 19.438 17.8159 18.7022L17.8162 18.7018L19.1339 17.3842ZM19.1339 17.3842L18.7805 17.0304L19.1341 17.3839L19.1339 17.3842ZM2.79563 0.966179L2.75661 1.0052L1.43876 2.32305C0.615248 3.14656 0.270729 4.35993 0.660869 5.47027L2.79563 0.966179ZM2.79563 0.966179C2.96015 0.81197 3.15347 0.691404 3.36471 0.611499C3.59344 0.524983 3.83796 0.488116 4.08203 0.503347C4.3261 0.518578 4.56413 0.585558 4.78033 0.69984C4.99653 0.814122 5.18594 0.97309 5.33599 1.16619L5.33616 1.16641L7.6226 4.10539C7.94744 4.52305 8.06215 5.06735 7.93367 5.58127L7.93365 5.58138L7.23649 8.37255L7.23644 8.37276C7.17954 8.60097 7.18261 8.84003 7.24536 9.06671C7.30812 9.29339 7.42841 9.49999 7.59457 9.66645L7.5949 9.66678L10.7264 12.7983L10.7266 12.7984C10.8932 12.9649 11.1002 13.0854 11.3272 13.1482C11.5543 13.2109 11.7937 13.2138 12.0223 13.1566M2.79563 0.966179L0.660942 5.47048C1.81955 8.76234 3.70437 11.7512 6.17561 14.2152L6.17662 14.2163C8.64112 16.6877 11.6304 18.5726 14.9228 19.731L14.9229 19.731C16.0345 20.1224 17.2465 19.7779 18.0701 18.9544L19.3879 17.6365L19.3882 17.6363C20.1207 16.9048 20.0462 15.6946 19.2267 15.057C19.2267 15.057 19.2267 15.057 19.2267 15.057L16.2879 12.7707C16.0816 12.6103 15.8415 12.499 15.5858 12.4451C15.33 12.3912 15.0654 12.3961 14.8119 12.4595L14.8118 12.4595L12.0223 13.1566M12.0223 13.1566L12.0219 13.1566L11.9007 12.6716L12.0223 13.1566Z"
                                    fill="#fff" stroke="#fff" />
                            </svg>
                        </span>
                        <div>+9989 78 777 77 22</div>
                    </a>
                </div>

                <ul class="nav-socials lg:hidden flex justify-evenly items-center order-5 mt-8">
                    <li class="mx-4">
                        <a href="#telegram">
                            <img src="{{ asset('front/img/navbar/telegram.svg') }}" alt="telegram">
                        </a>
                    </li>
                    <li class="mx-4">
                        <a href="#linkedin">
                            <img src="{{ asset('front/img/navbar/linkedin.svg') }}" alt="linkedin">
                        </a>
                    </li>
                    <li class="mx-4">
                        <a href="#instagram">
                            <img src="{{ asset('front/img/navbar/instagram.svg') }}" alt="instagram">
                        </a>
                    </li>
                    <li class="mx-4">
                        <a href="#facebook">
                            <img src="{{ asset('front/img/navbar/facebook.svg') }}" alt="facebook">
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Header -->
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
            url({{ asset('front/img/features-img.png') }});
        ">
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

    <!-- Footer -->
    <footer>
        <div class="container">
            <div data-aos="zoom-in" class="partners relative">
                <svg class="" width="930" height="319" viewBox="0 0 930 319" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 60C0 26.8629 26.8629 0 60 0H870C903.137 0 930 26.8629 930 60V112.25L921.21 122.655C902.322 145.013 902.322 177.737 921.21 200.095L930 210.5V259C930 292.137 903.137 319 870 319H60C26.8629 319 0 292.137 0 259L0 210.5L9.15252 199.26C27.1165 177.197 27.1165 145.553 9.15252 123.49L0 112.25L0 60Z"
                        fill="#4D8506" />
                    <path
                        d="M0.5 60C0.5 27.1391 27.1391 0.5 60 0.5H870C902.861 0.5 929.5 27.1391 929.5 60V112.067L920.828 122.332C901.783 144.877 901.783 177.873 920.828 200.418L929.5 210.683V259C929.5 291.861 902.861 318.5 870 318.5H60C27.1391 318.5 0.5 291.861 0.5 259V210.678L9.54024 199.575C27.654 177.329 27.654 145.421 9.54024 123.175L0.5 112.072V60Z"
                        stroke="white" stroke-opacity="0.5" />
                </svg>

                <div class="swiper swiper-partners">
                    <h2>Партнеры:</h2>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide flex justify-center items-center">
                            <img src="{{ asset('front/img/partner-logo-1.png') }}" alt="partner logo 1" />
                        </div>
                        <div class="swiper-slide flex justify-center items-center">
                            <img src="{{ asset('front/img/partner-logo-2.png') }}" alt="partner logo 2" />
                        </div>
                        <div class="swiper-slide flex justify-center items-center">
                            <img src="{{ asset('front/img/partner-logo-3.png') }}" alt="partner logo 3" />
                        </div>
                        <div class="swiper-slide flex justify-center items-center">
                            <img src="{{ asset('front/img/partner-logo-4.png') }}" alt="partner logo 4" />
                        </div>
                        <div class="swiper-slide flex justify-center items-center">
                            <img src="{{ asset('front/img/partner-logo-1.png') }}" alt="partner logo 1" />
                        </div>
                        <div class="swiper-slide flex justify-center items-center">
                            <img src="{{ asset('front/img/partner-logo-2.png') }}" alt="partner logo 2" />
                        </div>
                        <div class="swiper-slide flex justify-center items-center">
                            <img src="{{ asset('front/img/partner-logo-3.png') }}" alt="partner logo 3" />
                        </div>
                        <div class="swiper-slide flex justify-center items-center">
                            <img src="{{ asset('front/img/partner-logo-4.png') }}" alt="partner logo 4" />
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next swiper-button-next-partners"></div>
                <div class="swiper-button-prev swiper-button-prev-partners"></div>
            </div>
        </div>

        <div class="container lg:px-12 mt-10" id="contact">
            <div class="grid grid-cols-12 gap-6">
                <div class="lg:col-span-3 col-span-full flex justify-center">
                    <a class="footer-logo" href="index.html"><img src="{{ asset('front/img/footer-logo.png') }}"
                            alt="logo" /></a>
                </div>
                <div class="lg:col-span-9 col-span-full text-center text-white pt-4">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="md:col-span-4 col-span-full">
                            <p class="mb-2">Наш номер телефона</p>
                            <a target="_blank" class="hover:underline" href="tel:+9989 78 777 77 22">+9989 78 777 77
                                22</a>
                        </div>
                        <div class="md:col-span-4 col-span-full">
                            <p class="mb-2">Информация и жалобы</p>
                            <a target="_blank" class="hover:underline"
                                href="mailto:info@naturalpeyzaj.uz">info@naturalpeyzaj.uz</a>
                        </div>
                        <div class="md:col-span-4 col-span-full">
                            <span>
                                Узбекистан, г. Ташкент, <br />
                                Шайхантахурский район, <br />
                                улица Фуркат, 1 A
                            </span>
                        </div>

                        <div class="md:col-span-8 col-span-full">
                            <ul class="flex justify-around items-center">
                                <li>
                                    <a href="index.html">Главная</a>
                                </li>
                                <li>
                                    <a href="about.html">О нас</a>
                                </li>
                                <li>
                                    <a href="/#projects">Проекты</a>
                                </li>
                            </ul>
                        </div>

                        <div class="md:col-span-4 col-span-full">
                            <ul class="flex justify-evenly items-center">
                                <li>
                                    <a href="#telegram">
                                        <img src="{{ asset('front/img/telegram.svg') }}" alt="telegram">
                                    </a>
                                </li>
                                <li>
                                    <a href="#linkedin">
                                        <img src="{{ asset('front/img/linkedin.svg') }}" alt="linkedin">
                                    </a>
                                </li>
                                <li>
                                    <a href="#instagram">
                                        <img src="{{ asset('front/img/instagram.svg') }}" alt="instagram">
                                    </a>
                                </li>
                                <li>
                                    <a href="#facebook">
                                        <img src="{{ asset('front/img/facebook.svg') }}" alt="facebook">
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-span-full flex md:justify-end justify-center items-center">
                            <a class="flex items-center xl:mr-10 md:mr-6" target="_blank" href="https://usoft.uz/"
                                title="USOFT">
                                Developed by

                                <svg class="w-20 h-auto ml-2" viewBox="0 0 8000 3165" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5216.92 2222.01V975.667H6053.11V1229.17H5491.53V1482.65H6010.84V1736.16H5491.53V2222.03L5216.92 2222.01ZM6713.24 2222.01V1218.6H6357.64V975.667H7343.45V1218.6H6987.85V2222.03L6713.24 2222.01ZM1058.93 2214.97C993.203 2189.16 938.34 2153.36 894.336 2107.6C850.313 2061.83 817.16 2007.84 794.869 1945.64C772.58 1883.44 761.432 1815.37 761.424 1741.44V975.667H1036.04V1730.87C1036.04 1769.6 1042.2 1805.4 1054.53 1838.25C1066.85 1871.12 1084.16 1899.57 1106.46 1923.63C1128.92 1947.81 1156.21 1967 1186.56 1979.97C1217.65 1993.47 1251.39 2000.21 1287.78 2000.2C1324.16 2000.2 1357.6 1993.45 1388.12 1979.97C1418.12 1966.84 1445.08 1947.67 1467.33 1923.63C1489.63 1899.57 1506.93 1871.11 1519.27 1838.25C1531.6 1805.4 1537.76 1769.61 1537.76 1730.87V975.667H1812.37V1741.44C1812.37 1815.39 1801.23 1883.44 1778.92 1945.64C1756.61 2007.84 1723.47 2061.83 1679.45 2107.6C1635.45 2153.37 1580.6 2189.16 1514.87 2214.97C1449.13 2240.79 1373.44 2253.71 1287.78 2253.71C1200.93 2253.71 1124.65 2240.8 1058.93 2214.97ZM2388 2216.73C2318.77 2192.09 2254.23 2152.19 2194.36 2097.03L2389.76 1882.27C2417.63 1919.57 2454.19 1949.48 2496.27 1969.4C2539.11 1989.93 2583.41 2000.2 2629.17 2000.2C2652 2000.15 2674.73 1997.49 2696.95 1992.28C2718.56 1987.49 2739.33 1979.48 2758.57 1968.52C2776.12 1958.55 2791.17 1944.69 2802.57 1928.03C2813.72 1911.61 2819.31 1892.24 2819.29 1869.95C2819.29 1832.39 2804.92 1802.75 2776.17 1781.04C2747.41 1759.32 2711.33 1740.84 2667.89 1725.59C2624.48 1710.33 2577.53 1695.08 2527.07 1679.81C2477.79 1665.08 2430.51 1644.4 2386.24 1618.21C2343.05 1592.6 2306.07 1557.72 2277.97 1516.11C2249.23 1473.85 2234.85 1418.11 2234.85 1348.88C2234.85 1281.97 2248.05 1223.29 2274.47 1172.83C2300.01 1123.39 2336.07 1080.12 2380.09 1046.08C2424.09 1012.04 2474.84 986.52 2532.36 969.507C2590.08 952.453 2649.96 943.853 2710.16 943.973C2779.33 943.8 2848.15 953.88 2914.36 973.906C2980.08 993.853 3039.35 1027.31 3092.16 1074.25L2903.8 1280.21C2881.49 1252.05 2851.28 1231.21 2813.15 1217.72C2775 1204.21 2738.92 1197.47 2704.88 1197.48C2684.15 1197.56 2663.49 1199.92 2643.27 1204.52C2622.41 1209.12 2602.28 1216.52 2583.41 1226.52C2565.25 1235.95 2549.57 1249.52 2537.64 1266.13C2525.91 1282.56 2520.04 1302.51 2520.04 1325.99C2520.04 1363.53 2534.12 1392.28 2562.29 1412.24C2590.45 1432.19 2625.96 1449.2 2668.79 1463.29C2711.63 1477.39 2757.69 1491.47 2806.99 1505.53C2855.49 1519.28 2901.96 1539.41 2945.17 1565.39C2988.01 1591.21 3023.51 1625.84 3051.68 1669.25C3079.84 1712.67 3093.92 1770.76 3093.93 1843.52C3093.93 1912.76 3081.01 1973.21 3055.2 2024.84C3029.37 2076.48 2994.45 2119.32 2950.44 2153.36C2906.44 2187.39 2855.39 2212.61 2797.29 2229.05C2739.2 2245.48 2677.88 2253.69 2613.35 2253.69C2532.35 2253.71 2457.24 2241.39 2388 2216.75V2216.73ZM3966.19 1227.4C3918.65 1247.36 3877.87 1275.23 3843.83 1311.03C3809.8 1346.81 3783.69 1389.36 3765.51 1438.65C3747.32 1487.95 3738.23 1541.33 3738.21 1598.84C3738.21 1657.52 3747.31 1711.21 3765.51 1759.92C3783.68 1808.63 3809.79 1850.87 3843.83 1886.67C3877.87 1922.47 3918.65 1950.33 3966.19 1970.28C4013.71 1990.23 4066.81 2000.2 4125.49 2000.21C4184.17 2000.21 4237.28 1990.24 4284.81 1970.28C4332.33 1950.33 4373.12 1922.45 4407.16 1886.67C4441.19 1850.87 4467.31 1808.63 4485.48 1759.92C4503.67 1711.21 4512.77 1657.52 4512.77 1598.84C4512.77 1541.35 4503.68 1487.95 4485.48 1438.65C4467.28 1389.36 4441.17 1346.81 4407.16 1311.03C4373.12 1275.23 4332.35 1247.36 4284.81 1227.4C4237.28 1207.45 4184.17 1197.48 4125.49 1197.48C4066.81 1197.48 4013.71 1207.47 3966.17 1227.41L3966.19 1227.4ZM3856.16 2207.93C3774 2177.41 3703 2133.69 3643.15 2076.79C3583.29 2019.87 3536.64 1950.92 3503.2 1869.95C3469.76 1788.96 3453.04 1698.6 3453.04 1598.84C3453.04 1499.09 3469.76 1408.73 3503.2 1327.75C3536.65 1246.76 3583.31 1177.83 3643.15 1120.91C3703 1064 3774 1020.28 3856.16 989.76C3938.31 959.24 4028.08 943.987 4125.49 943.987C4222.89 943.987 4312.68 959.24 4394.83 989.76C4476.97 1020.28 4547.97 1064 4607.81 1120.91C4667.68 1177.83 4714.33 1246.76 4747.79 1327.75C4781.23 1408.72 4797.95 1499.09 4797.95 1598.84C4797.95 1698.6 4781.23 1788.96 4747.79 1869.95C4714.33 1950.93 4667.68 2019.88 4607.81 2076.79C4547.96 2133.71 4476.97 2177.43 4394.83 2207.93C4312.68 2238.45 4222.91 2253.71 4125.49 2253.71C4028.08 2253.71 3938.31 2238.45 3856.16 2207.93ZM1.63907 0.133789L1156.65 0.000488281V230.573H232.875L232.608 2933.63L1157.16 2933.77L1157.33 3164.12L0 3164.75L1.63907 0.133789ZM6842.69 3164.12L6842.85 2933.77L7767.41 2933.63L7767.15 230.573H6843.37V0.000488281L7998.37 0.133789L8000 3164.75L6842.69 3164.12Z"
                                        fill="white" />
                                </svg>

                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>


    <!-- The Modal -->
    <div id="modal-form" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" id="close-modal" class="close">
                    <svg width="71" height="71" viewBox="0 0 71 71" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="36" cy="35" r="23.5" transform="rotate(-180 36 35)"
                            stroke="white" />
                        <path d="M30.5 47L42 35.5L30.5 24" stroke="white" stroke-width="2" stroke-linecap="round" />
                        <circle cx="35.5" cy="35.5" r="35" transform="rotate(-180 35.5 35.5)"
                            stroke="white" stroke-opacity="0.8" stroke-dasharray="5 5" />
                    </svg>
                </button>

                <h2>Обратный звонок</h2>
                <p>Оставьте заявку, наш оператор свяжется с вами </p>

                <form>
                    <div class="form-control mb-8">
                        <label class="text-center text-green text-xl font-light mb-1 block" for="fio">ФИО</label>
                        <input required
                            class="text-xl font-light text-black outline-none rounded-none
              bg-transparent block w-full border-b border-solid
              border-green text-center py-3 px-8"
                            id="fio" type="text">
                    </div>

                    <div class="form-control mb-8">
                        <label class="text-center text-green text-xl font-light mb-1 block"
                            for="phone-number">Телефон</label>
                        <input required
                            class="text-xl font-light text-black outline-none rounded-none
              bg-transparent block w-full border-b border-solid
              border-green text-center py-3 px-8"
                            id="phone-number" type="tel">
                    </div>

                    <p class="text-base text-black opacity-80 font-light my-8 text-center">
                        Нажимая кнопку «Отправить заявку»,
                        вы подтверждаете свое согласие на обработку персональных данных
                    </p>

                    <div class="flex justify-center items-center">
                        <button type="submit" class="btn btn-green btn-medium">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Fancybox js -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <!-- Aos js -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- imask js -->
    <script src="https://unpkg.com/imask"></script>

    <!-- Scripts -->
    <script src="{{ asset('front/js/script.js') }}"></script>
</body>

</html>
