<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ Route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('/' . $logo->main_logo) }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('/' . $logo->main_logo) }}" style="max-height: 30px; height: auto" alt="">
            </span>
        </a>

        <a href="{{ Route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('/' . $logo->main_logo) }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('/' . $logo->main_logo) }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ Route('projects.index') }}" class="waves-effect">
                        <i class="fas fa-tree"></i>
                        <span>{{ __('body.Projects') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('categories.index') }}" class="waves-effect">
                        <i class="fas fa-list-alt"></i>
                        <span>{{ __('body.Categories') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('banners.index') }}" class="waves-effect">
                        <i class="fas fa-photo-video"></i>
                        <span>{{ __('body.Banners') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('sections.index') }}" class="waves-effect">
                        <i class="uil-window-section"></i>
                        <span>{{ __('body.Sections') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('requests.index') }}" class="waves-effect">
                        <i class="uil-envelope"></i>
                        <span>{{ __('body.Requests') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('services.index') }}" class="waves-effect">
                        <i class="fas fa-cogs"></i>
                        <span>{{ __('body.Services') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('partners.index') }}" class="waves-effect">
                        <i class="fas fa-user-tie"></i>
                        <span>{{ __('body.Partners') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('contacts.index') }}" class="waves-effect">
                        <i class="uil-book-alt"></i>
                        <span>{{ __('body.Contacts') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ Route('staffs.index') }}" class="waves-effect">
                        <i class="fas fa-users"></i>
                        <span>{{ __('body.Staff') }}</span>
                    </a>
                </li>



                <li>
                    <a href="{{ Route('abouts.index') }}" class="waves-effect">
                        <i class="uil-file-alt"></i>
                        <span>{{ __('body.About company') }}</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-cog"></i>
                        <span>{{ __('body.Settings') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" class="has-arrow">Organization Structure</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ Route('langs.index') }}">{{ __('body.Lang') }}</a></li>
                        <li><a href="{{ Route('facilities.index') }}">{{ __('body.Facilities') }}</a></li>
                        <li><a href="{{ Route('logos.index') }}">{{ __('body.Logo') }}</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
