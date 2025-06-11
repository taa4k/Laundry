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
                    <span class="hide-menu">Manajemen Pelanggan</span>
                </div>

            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <a class="collapse-item <?= isset($_REQUEST['page']) && $_REQUEST['page'] == 'MP/form_input' ? 'active' : ''; ?>"
                                href="?page=MP/form_input">Form Pelanggan</a>
                        </div>

                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <span class="hide-menu">Data Pelanggan</span>
                        </div>

                    </a>
                </li>
            </ul>
        </li>
        <br>
        <li class="sidebar-item">
            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                    <span class="hide-menu">Laundry</span>
                </div>

            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Form Laundry</span>
                        </div>

                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Data Laundry</span>
                        </div>

                    </a>
                </li>
            </ul>
        </li>
        <br>
        <li class="sidebar-item">
            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                    <span class="hide-menu">Manajemen Karyawan</span>
                </div>

            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Form Karyawan</span>
                        </div>

                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Data Karyawan</span>
                        </div>

                    </a>
                </li>
            </ul>
        </li>
        <br>
        <li class="sidebar-item">
            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                    <span class="hide-menu">Laporan Keuangan</span>
                </div>

            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Form Laporan Keuangan</span>
                        </div>

                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#">
                        <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Data Laporan Keuangan</span>
                        </div>

                    </a>
                </li>
            </ul>
        </li>
    </ul>
</ul>