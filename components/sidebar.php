<ul id="sidebarnav">
    <li class="sidebar-item">
        <a class="sidebar-link" href="?page=dashboard" aria-expanded="false">
            <span class="hide-menu">Dashboard</span>
        </a>
    </li>
    <br>
    <li class="sidebar-item">
        <a class="sidebar-link <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'MP/table' ? 'active' : ''; ?>"
            href="?page=MP/table" aria-expanded="false">
            <span class="hide-menu">Pelanggan</span>
        </a>
    </li>
    <br>
    <li class="sidebar-item">
        <a class="sidebar-link <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'LY/table' ? 'active' : ''; ?>"
            href="?page=LY/table" aria-expanded="false">
            <span class="hide-menu">Laundry</span>
        </a>
    </li>
    <br>
    <li class="sidebar-item">
        <a class="sidebar-link <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'MK/table' ? 'active' : ''; ?>"
            href="?page=MK/table" aria-expanded="false">
            <span class="hide-menu">Karyawan</span>
        </a>
    </li>
    <br>
    <li class="sidebar-item">
        <a class="sidebar-link <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'KT/table' ? 'active' : ''; ?>"
            href="?page=KT/table" aria-expanded="false">
            <span class="hide-menu">Transaksi</span>
        </a>
    </li>
    <br>
    <li class="sidebar-item">
        <a class="sidebar-link <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'LK/table' ? 'active' : ''; ?>"
            href="?page=LK/table" aria-expanded="false">
            <span class="hide-menu">Laporan Keuangan</span>
        </a>
    </li>
    <br>
</ul>