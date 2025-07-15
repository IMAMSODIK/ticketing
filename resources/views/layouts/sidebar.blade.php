<nav class="vertical_nav">
    <div class="left_section menu_left" id="js-menu">
        <div class="left_section">
            <ul>
                <li class="menu--item">
                    <a href="/dashboard" class="menu--link {{Route::currentRouteName() == 'admin.dashboard' || Route::currentRouteName() == 'user.dashboard' ? 'active' : ''}}" title="Dashboard"
                        data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fa-solid fa-gauge menu--icon"></i>
                        <span class="menu--label">Dashboard</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="/jenis-tiket" class="menu--link {{Route::currentRouteName() == 'tiket' ? 'active' : ''}}" title="Tiket"
                        data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fa-solid fa-ticket menu--icon"></i>
                        <span class="menu--label">Jenis Tiket</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="/event" class="menu--link {{Route::currentRouteName() == 'event' ? 'active' : ''}}" title="Events"
                        data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fa-solid fa-calendar-days menu--icon"></i>
                        <span class="menu--label">Events</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="/laporan" class="menu--link" title="Laporan"
                        data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fa-solid fa-rectangle-ad menu--icon"></i>
                        <span class="menu--label">Laporan</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="/web-settings" class="menu--link" title="Web Settings"
                        data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fa-regular fa-address-card menu--icon"></i>
                        <span class="menu--label">Web Settings</span>
                    </a>
                </li>
                <li class="menu--item">
                    <a href="my_organisation_dashboard_payout.html" class="menu--link" title="Payouts"
                        data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fa-solid fa-credit-card menu--icon"></i>
                        <span class="menu--label">Payouts</span>
                    </a>
                </li>
                {{-- <li class="menu--item">
                    <a href="/log-aktivitas" class="menu--link" title="Log Aktivitas"
                        data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fa-solid fa-chart-pie menu--icon"></i>
                        <span class="menu--label">Log Aktivitas</span>
                    </a>
                </li> --}}
                <li class="menu--item">
                    <a href="/user" class="menu--link" title="User"
                        data-bs-toggle="tooltip" data-bs-placement="right">
                        <i class="fa-solid fa-bahai menu--icon"></i>
                        <span class="menu--label">User</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
