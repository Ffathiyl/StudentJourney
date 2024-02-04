<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard Nav -->
        <li class="nav-heading">Dashboard</li>

        <li class="nav-item">
            <a class="nav-link "
                href="{{ route('Dashboard.dashboardsek') }}">
                <i class="bi bi-house-door-fill"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <!-- Master Nav -->
        <li class="nav-heading">Laporan</li>

        <li class="nav-item">
            <a class="nav-link "
                href="{{ route('laporans.index') }}">
                <i class="bi bi-person-plus-fill"></i><span style="color :#000000">Laporan</span><i></i>
            </a>
        </li><!-- End Admin Nav -->

        <li class="nav-heading">Settings</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logins.logout') }}">
                <i class="bi bi-box-arrow-in-left"></i>
                <span style="color :#000000">Logout</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>

</aside><!-- End Sidebar-->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script>
    var title = document.title;
    console.log(title);
</script>

<script>
    $(document).ready(function () {
        // Get the current page URL
        var currentUrl = window.location.href;

        // Loop through each nav-link and check if its href matches the current URL
        $('.nav-link').each(function () {
            var href = $(this).attr('href');

            // Check if the href attribute exists and if it matches the current URL
            if (href && currentUrl.includes(href)) {
                // If the href matches, remove the 'collapsed' class
                $(this).removeClass('collapsed');

                // If you want to expand the parent collapsible menu (if any), you can use:
                // $(this).closest('.collapse').addClass('show');
            } else {
                // If the href doesn't match, add the 'collapsed' class
                $(this).addClass('collapsed');
            }
        });
    });
</script>