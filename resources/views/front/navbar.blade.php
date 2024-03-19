<!-- Navbar -->
<div id="navbar" class="navbar">
    <div class="container h-full flex items-center">
        <a href="{{ Route('front.home') }}" class="logo block">
            <img class="" src="{{ asset('front/img/logo.png') }}" alt="logo" />
        </a>

        <button class="lg:hidden flex ml-auto top-7 right-4 fixed w-10" type="button" id="toggle-button">
            <svg width="46" height="26" viewBox="0 0 46 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2H44" stroke="#376300" stroke-width="4" stroke-linecap="round" />
                <path d="M2 13H30" stroke="#376300" stroke-width="4" stroke-linecap="round" />
                <path d="M2 24H44" stroke="#376300" stroke-width="4" stroke-linecap="round" />
            </svg>
        </button>

        <nav class="nav-links" id="nav-links">
            <a href="{{ Route('front.home') }}" class="menu-logo lg:hidden block">
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

            <ul class="nav-pages">
                <li>
                    <a @if (request()->route()->getName() == 'front.home') class="active" @endif
                        href="{{ Route('front.home') }}">{{ __('front.navbar.Главная') }}</a>
                </li>
                <li>
                    <a @if (request()->route()->getName() == 'front.about') class="active" @endif
                        href="{{ Route('front.about') }}">{{ __('front.navbar.О нас') }}</a>
                </li>
                <li>
                    <a href="#contact">{{ __('front.navbar.Контакт') }}</a>
                </li>
                <li>
                    <a href="/#projects">{{ __('front.navbar.Проекты') }}</a>
                </li>
            </ul>

            <button id="order-now-btn"
                class="xl:order-3 order-4 btn btn-green ml-auto mr-4">{{ __('front.navbar.Оставить заявку') }}</button>

            <div class="flex items-center xl:my-0 my-4 xl:order-4 order-3">
                <div class="lang relative mx-4">
                    <span class="lang-selected cursor-pointer">{{ ucfirst($currenctLang->code) }}</span>
                    <div class="lang-list absolute">
                        @php
                            $langs = collect($langsForHeader)->filter(function ($model) use ($currenctLang) {
                                return $model['code'] !== $currenctLang->code;
                            });
                        @endphp
                        @foreach ($langs as $lang)
                            <a href="{{ Route('lang.change', $lang['code']) }}">{{ ucfirst($lang['code']) }}</a>
                        @endforeach
                    </div>
                </div>

                @if (array_key_exists('email', $global_contacts))
                    <a class="nav-phone flex items-center" href="tel:{{ $global_contacts['number']['value'] }}">
                        <span class="mr-2">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.1339 17.3842C19.2708 17.2474 19.377 17.0831 19.4456 16.9021C19.5141 16.7211 19.5434 16.5276 19.5314 16.3345C19.5194 16.1413 19.4664 15.9529 19.376 15.7818C19.2857 15.6107 19.1599 15.4608 19.0071 15.342L16.0669 13.0556L16.0664 13.0552C15.9031 12.9286 15.7133 12.8407 15.5111 12.7982C15.309 12.7557 15.0998 12.7596 14.8994 12.8097L12.1084 13.5069L12.1083 13.5069C11.8195 13.5791 11.5169 13.5752 11.23 13.4958C10.9432 13.4163 10.6818 13.2639 10.4713 13.0535C10.4713 13.0534 10.4712 13.0534 10.4712 13.0534L7.34109 9.922L7.3408 9.92171C7.13013 9.7113 6.97755 9.44993 6.8979 9.16304C6.81826 8.87615 6.81427 8.57352 6.88633 8.28463L7.58467 5.49381L7.58469 5.49374C7.6348 5.29334 7.63875 5.08417 7.59623 4.88202C7.55371 4.67987 7.46583 4.49002 7.33923 4.32679L7.33884 4.32629L5.05241 1.38605C5.0524 1.38603 5.05238 1.38601 5.05237 1.38599C4.9336 1.23323 4.7837 1.10749 4.6126 1.01711C4.44149 0.926715 4.2531 0.873766 4.05995 0.861778C3.86679 0.849789 3.6733 0.879035 3.49232 0.947573C3.31136 1.0161 3.14706 1.12235 3.01031 1.25925C3.01029 1.25927 3.01028 1.25928 3.01026 1.2593L1.69247 2.57837L1.69227 2.57856C0.956392 3.31597 0.661438 4.38639 1.00089 5.35327L1.00103 5.35367C2.14201 8.59468 3.99797 11.5373 6.43127 13.9632C8.8572 16.3964 11.7998 18.2524 15.0408 19.3934L15.0412 19.3935C16.008 19.733 17.0785 19.438 17.8159 18.7022L17.8162 18.7018L19.1339 17.3842ZM19.1339 17.3842L18.7805 17.0304L19.1341 17.3839L19.1339 17.3842ZM2.79563 0.966179L2.75661 1.0052L1.43876 2.32305C0.615248 3.14656 0.270729 4.35993 0.660869 5.47027L2.79563 0.966179ZM2.79563 0.966179C2.96015 0.81197 3.15347 0.691404 3.36471 0.611499C3.59344 0.524983 3.83796 0.488116 4.08203 0.503347C4.3261 0.518578 4.56413 0.585558 4.78033 0.69984C4.99653 0.814122 5.18594 0.97309 5.33599 1.16619L5.33616 1.16641L7.6226 4.10539C7.94744 4.52305 8.06215 5.06735 7.93367 5.58127L7.93365 5.58138L7.23649 8.37255L7.23644 8.37276C7.17954 8.60097 7.18261 8.84003 7.24536 9.06671C7.30812 9.29339 7.42841 9.49999 7.59457 9.66645L7.5949 9.66678L10.7264 12.7983L10.7266 12.7984C10.8932 12.9649 11.1002 13.0854 11.3272 13.1482C11.5543 13.2109 11.7937 13.2138 12.0223 13.1566M2.79563 0.966179L0.660942 5.47048C1.81955 8.76234 3.70437 11.7512 6.17561 14.2152L6.17662 14.2163C8.64112 16.6877 11.6304 18.5726 14.9228 19.731L14.9229 19.731C16.0345 20.1224 17.2465 19.7779 18.0701 18.9544L19.3879 17.6365L19.3882 17.6363C20.1207 16.9048 20.0462 15.6946 19.2267 15.057C19.2267 15.057 19.2267 15.057 19.2267 15.057L16.2879 12.7707C16.0816 12.6103 15.8415 12.499 15.5858 12.4451C15.33 12.3912 15.0654 12.3961 14.8119 12.4595L14.8118 12.4595L12.0223 13.1566M12.0223 13.1566L12.0219 13.1566L11.9007 12.6716L12.0223 13.1566Z"
                                    fill="#fff" stroke="#fff" />
                            </svg>
                        </span>
                        <div>{{ formatPhoneNumber($global_contacts['number']['value']) }}</div>
                    </a>
                @endif
            </div>

            <ul class="nav-socials lg:hidden flex justify-evenly items-center order-5 mt-8">
                @if (array_key_exists('telegram', $global_contacts))
                    <li class="mx-4">
                        <a href="{{ $global_contacts['telegram']['value'] }}" target="_blank">
                            <img src="{{ asset('front/img/navbar/telegram.svg') }}" alt="telegram">
                        </a>
                    </li>
                @endif
                @if (array_key_exists('linkedin', $global_contacts))
                    <li class="mx-4">
                        <a href="{{ $global_contacts['linkedin']['value'] }}" target="_blank">
                            <img src="{{ asset('front/img/navbar/linkedin.svg') }}" alt="linkedin">
                        </a>
                    </li>
                @endif
                @if (array_key_exists('instagram', $global_contacts))
                    <li class="mx-4">
                        <a href="{{ $global_contacts['instagram']['value'] }}" target="_blank">
                            <img src="{{ asset('front/img/navbar/instagram.svg') }}" alt="instagram">
                        </a>
                    </li>
                @endif
                @if (array_key_exists('facebook', $global_contacts))
                    <li class="mx-4">
                        <a href="{{ $global_contacts['facebook']['value'] }}" target="_blank">
                            <img src="{{ asset('front/img/navbar/facebook.svg') }}" alt="facebook">
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
