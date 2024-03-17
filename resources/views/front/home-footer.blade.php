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
                <h2>{{ __('front.footer.Партнеры') }}:</h2>
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
                <a class="footer-logo" href="{{ Route('front.home') }}"><img
                        src="{{ asset('front/img/footer-logo.png') }}" alt="logo" /></a>
            </div>
            <div class="lg:col-span-9 col-span-full text-center text-white pt-4">
                <div class="grid grid-cols-12 gap-6">
                    @if (array_key_exists('number', $global_contacts))
                        <div class="md:col-span-4 col-span-full">
                            <p class="mb-2">{{ __('front.footer.Наш номер телефона') }}</p>
                            <a class="hover:underline"
                                href="tel:{{ $global_contacts['telegram']['value'] }}">{{ formatPhoneNumber($global_contacts['number']['value']) }}
                                22</a>
                        </div>
                    @endif
                    @if (array_key_exists('email', $global_contacts))
                        <div class="md:col-span-4 col-span-full">
                            <p class="mb-2">{{ __('front.footer.Информация и жалобы') }}</p>
                            <a target="_blank" class="hover:underline"
                                href="mailto:{{ $global_contacts['email']['value'] }}">{{ $global_contacts['email']['value'] }}</a>
                        </div>
                    @endif
                    @if (array_key_exists('address', $global_contacts))
                        <div class="md:col-span-4 col-span-full">
                            <span>
                                {{ $global_contacts['address']['value'] }}
                            </span>
                        </div>
                    @endif

                    <div class="md:col-span-8 col-span-full">
                        <ul class="flex justify-around items-center">
                            <li>
                                <a href="{{ Route('front.home') }}">{{ __('front.footer.Главная') }}</a>
                            </li>
                            <li>
                                <a href="about.html">{{ __('front.footer.О нас') }}</a>
                            </li>
                            <li>
                                <a href="/#projects">{{ __('front.footer.Проекты') }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="md:col-span-4 col-span-full">
                        <ul class="flex justify-evenly items-center">
                            @if (array_key_exists('telegram', $global_contacts))
                                <li>
                                    <a href="{{ $global_contacts['telegram']['value'] }}">
                                        <img src="{{ asset('front/img/telegram.svg') }}" alt="telegram">
                                    </a>
                                </li>
                            @endif
                            @if (array_key_exists('linkedin', $global_contacts))
                                <li>
                                    <a href="{{ $global_contacts['telegram']['value'] }}" target="_blank">
                                        <img src="{{ asset('front/img/linkedin.svg') }}" alt="linkedin">
                                    </a>
                                </li>
                            @endif
                            @if (array_key_exists('instagram', $global_contacts))
                                <li>
                                    <a href="{{ $global_contacts['instagram']['value'] }}" target="_blank">
                                        <img src="{{ asset('front/img/instagram.svg') }}" alt="instagram">
                                    </a>
                                </li>
                            @endif
                            @if (array_key_exists('facebook', $global_contacts))
                                <li>
                                    <a href="{{ $global_contacts['facebook']['value'] }}" target="_blank">
                                        <img src="{{ asset('front/img/facebook.svg') }}" alt="facebook">
                                    </a>
                                </li>
                            @endif
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
