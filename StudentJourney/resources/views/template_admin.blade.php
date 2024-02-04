<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard Nav -->
        <li class="nav-heading">Dashboard</li>

        <li class="nav-item">
            <a class="nav-link "
                href="{{ route('Dashboard.dashboard') }}">
                <i class="bi bi-house-door-fill"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <!-- Master Nav -->
        <li class="nav-heading">Transaksi</li>

        <li class="nav-item">
            <a class="nav-link "
                href="{{ route('pendaftarans.index') }}">
                <i class="bi bi-person-workspace"></i><span style="color :#000000">Pendaftaran</span><i></i>
            </a>
        </li><!-- End Admin Nav -->

        <li class="nav-item">
            <a class="nav-link "
                href="{{ route('pengajuans.index') }}">
                <i class="bi bi-file-earmark-plus"></i><span style="color :#000000">Pengajuan</span><i></i>
            </a>
        </li><!-- End Pengajuan Nav -->

        <!-- Master Nav -->
        <li class="nav-heading">Master</li>

        <li class="nav-item">
            <a class="nav-link "
                href="{{ route('admins.index') }}">
                <i class="bi bi-person-plus-fill"></i><span style="color :#000000">Admin</span><i></i>
            </a>
        </li><!-- End Admin Nav -->

        <li class="nav-item">
            <a class="nav-link "
                href="{{ route('mahasiswas.index') }}">
                <i class="bi bi-people-fill"></i><span style="color :#000000">Mahasiswa</span><i></i>
            </a>
        </li><!-- End Mahasiswa Nav -->

        <li class="nav-item">
            <a class="nav-link "
                href="{{ route('kegiatans.index') }}">
                <i class="bi bi-map-fill"></i><span style="color :#000000">Kegiatan</span><i></i>
            </a>
        </li><!-- End Kegiatan Nav -->

        <li class="nav-item">
            <a class="nav-link "
                href="{{ route('aktifitas.index') }}">
                <i class="bi bi-activity"></i><span style="color :#000000">Aktivitas</span><i></i>
            </a>
        </li><!-- End Aktivitas Nav -->

        <li class="nav-heading">Settings</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logins.logout') }}">
                <i class="bi bi-box-arrow-in-left"></i>
                <span style="color :#000000">Keluar</span>
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