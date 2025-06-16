<ul id="sidebarnav">
    <li class="sidebar-item">
        <a class="sidebar-link" href="?page=dashboard" aria-expanded="false">
            <span class="hide-menu">Dashboard</span>
        </a>
    </li>
    <br>
    <ul id="sidebarnav">
        <li class="sidebar-item">
            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                aria-expanded="<?= isset($_REQUEST['page']) && in_array($_REQUEST['page'], ['MP/form_input', 'MP/table']) ? 'true' : 'false'; ?>">
                <div class="d-flex align-items-center gap-3">
                    <span class="hide-menu">Pelanggan</span>
                </div>

            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div
                            class="d-flex align-items-center gap-3 <?= isset($_REQUEST['page']) && in_array($_REQUEST['page'], ['MP/form_input', 'MP/table']) ? 'show' : ''; ?>">
                            <a class="collapse-item <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'MP/form_input' ? 'active' : ''; ?>"
                                href="?page=MP/form_input">Form Pelanggan</a>
                        </div>

                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <a class="collapse-item <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'MP/table' ? 'active' : ''; ?>"
                                href="?page=MP/table">Table Pelanggan</a>
                        </div>

                    </a>
                </li>
            </ul>
        </li>
        <br>
        <li class="sidebar-item">
            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                aria-expanded="<?= isset($_REQUEST['page']) && in_array($_REQUEST['page'], ['LY/form_input', 'LY/table']) ? 'true' : 'false'; ?>">
                <div class="d-flex align-items-center gap-3">
                    <span class="hide-menu">Laundry</span>
                </div>

            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div
                            class="d-flex align-items-center gap-3 <?= isset($_REQUEST['page']) && in_array($_REQUEST['page'], ['LY/form_input', 'LY/table']) ? 'show' : ''; ?>">
                            <a class="collapse-item <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'LY/form_input' ? 'active' : ''; ?>"
                                href="?page=LY/form_input">Form Laundry</a>
                        </div>

                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <a class="collapse-item <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'LY/table' ? 'active' : ''; ?>"
                                href="?page=LY/table">Table Laundry</a>
                        </div>

                    </a>
                </li>
            </ul>
        </li>
        <br>
        <li class="sidebar-item">
            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                aria-expanded="<?= isset($_REQUEST['page']) && in_array($_REQUEST['page'], ['MK/form_input', 'MK/table']) ? 'true' : 'false'; ?>">
                <div class="d-flex align-items-center gap-3">
                    <span class="hide-menu">Karyawan</span>
                </div>

            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div
                            class="d-flex align-items-center gap-3 <?= isset($_REQUEST['page']) && in_array($_REQUEST['page'], ['MK/form_input', 'MK/table']) ? 'show' : ''; ?>">
                            <a class="collapse-item <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'MK/form_input' ? 'active' : ''; ?>"
                                href="?page=MK/form_input">Form Karyawan</a>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <a class="collapse-item <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'MK/table' ? 'active' : ''; ?>"
                                href="?page=MK/table">Table Karyawan</a>
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <br>
        <li class="sidebar-item">
            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                aria-expanded="<?= isset($_REQUEST['page']) && in_array($_REQUEST['page'], ['KT/form_input', 'KT/table']) ? 'true' : 'false'; ?>">
                <div class="d-flex align-items-center gap-3">
                    <span class="hide-menu">Keuangan dan Transaksi</span>
                </div>

            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div
                            class="d-flex align-items-center gap-3 <?= isset($_REQUEST['page']) && in_array($_REQUEST['page'], ['KT/form_input', 'KT/table']) ? 'show' : ''; ?>">
                            <a class="collapse-item <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'KT/form_input' ? 'active' : ''; ?>"
                                href="?page=KT/form_input">Transaksi Masuk</a>
                        </div>

                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div
                            class="d-flex align-items-center gap-3 <?= isset($_REQUEST['page']) && in_array($_REQUEST['page'], ['KT/form_keluar', 'KT/table']) ? 'show' : ''; ?>">
                            <a class="collapse-item <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'KT/form_keluar' ? 'active' : ''; ?>"
                                href="?page=KT/form_keluar">Transaksi Keluar</a>
                        </div>

                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <a class="collapse-item <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'KT/table' ? 'active' : ''; ?>"
                                href="?page=KT/table">Table Transaksi</a>
                        </div>

                    </a>
                </li>
            </ul>
        </li>
    </ul>
</ul>