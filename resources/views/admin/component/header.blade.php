<nav class="navbar navbar-expand-lg navbar-light border-bottom py-0 fixed-top bg-white">
    <div class="container-fluid">
        <a class="navbar-brand d-flex justify-content-start align-items-center border-end" href="./index.html">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/images/logo-telkom.png') }}" style="height: 50px; width:50px" alt="">
                <span class="fw-black text-uppercase tracking-wide fs-6 lh-1">Telkom Indonesia</span>
            </div>
        </a>
        <div class="d-flex justify-content-between align-items-center flex-grow-1 navbar-actions">

            <!-- Search Bar and Menu Toggle-->
            <div class="d-flex align-items-center">

                <!-- Menu Toggle-->
                <div class="menu-toggle cursor-pointer me-4 text-primary-hover transition-color disable-child-pointer">
                    <i class="ri-skip-back-mini-line ri-lg fold align-middle" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Close menu"></i>
                    <i class="ri-skip-forward-mini-line ri-lg unfold align-middle" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Open Menu"></i>
                </div>
                <!-- / Menu Toggle-->
            </div>
            <!-- / Search Bar and Menu Toggle-->

            <!-- Right Side Widgets-->
            <div class="d-flex align-items-center">

                <!-- Profile Menu-->
                <div class="dropdown ms-1">
                    <button class="btn-icon bg-primary-faded text-primary fw-bolder me-3" type="button"
                        id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </button>
                    <ul class="dropdown-menu dropdown-md dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li class="d-flex py-2 align-items-start">
                            <button
                                class="btn-icon bg-primary-faded text-primary fw-bolder me-3">{{ substr(Auth::user()->name, 0, 1) }}</button>
                            <div class="d-flex align-items-start justify-content-between flex-grow-1">
                                <div>
                                    <p class="lh-1 mb-2 fw-semibold text-body">{{ Auth::user()->name }}</p>
                                    <p class="text-muted lh-1 mb-2 small">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>Logout
                            </a>
                        </li>
                    </ul>
                </div> <!-- / Profile Menu-->

            </div>
            <!-- / Notifications & Profile-->
        </div>
    </div>
</nav>
