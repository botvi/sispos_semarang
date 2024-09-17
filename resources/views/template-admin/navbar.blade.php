<ul class="metismenu" id="menu">
    @if(Auth::user()->role == 'posyandu')
    <li class="menu-label">DASHBOARD</li>
    <li>
        <a href="/dashboard-posyandu">
            <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
            <div class="menu-title">DASHBOARD</div>
        </a>
    </li>
    @elseif(Auth::user()->role == 'puskesmas')
    <li class="menu-label">DASHBOARD</li>
    <li>
        <a href="/dashboard-puskesmas">
            <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
            <div class="menu-title">DASHBOARD</div>
        </a>
    </li>
    @elseif(Auth::user()->role == 'dinaskesehatan')
    <li class="menu-label">DASHBOARD</li>
    <li>
        <a href="/dashboard-dinaskesehatan">
            <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
            <div class="menu-title">DASHBOARD</div>
        </a>
    </li>
    @elseif(Auth::user()->role == 'forum_posyandu_kota')
    <li class="menu-label">DASHBOARD</li>
    <li>
        <a href="/dashboard-dinaskesehatan">
            <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
            <div class="menu-title">DASHBOARD</div>
        </a>
    </li>
    @elseif(Auth::user()->role == 'kordinator_kecamatan')
    <li class="menu-label">DASHBOARD</li>
    <li>
        <a href="/dashboard-dinaskesehatan">
            <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
            <div class="menu-title">DASHBOARD</div>
        </a>
    </li>
    @elseif(Auth::user()->role == 'superadmin')
    <li class="menu-label">DASHBOARD</li>
    <li>
        <a href="/dashboard-superadmin">
            <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
            <div class="menu-title">DASHBOARD</div>
        </a>
    </li>
    @endif

    @if(Auth::user()->role == 'superadmin')
        <li class="menu-label">KALAU SUPERADMIN LOGIN</li>
        <li>
            <a href="/puskesmas">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">MASTER PUSKESMAS</div>
            </a>
        </li>
        <li>
            <a href="/dinaskesehatan">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">MASTER DINAS KESEHATAN</div>
            </a>
        </li>
        <li>
            <a href="/forum_pos_kota">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">MASTER FORUM POSYANDU</div>
            </a>
        </li>
        <li>
            <a href="/kordinator_kec">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">MASTER KORDINATOR KEC</div>
            </a>
        </li>
        <li>
            <a href="/stratapos">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">MASTER STRATA</div>
            </a>
        </li>
        <li>
            <a href="/wilayah">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">MASTER WILAYAH</div>
            </a>
        </li>
        <li>
            <a href="/master-peralatankes">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">MASTER PERALATAN KES</div>
            </a>
        </li>
        <li>
            <a href="/master-perbekalankes">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">MASTER PERBEKALAN KES</div>
            </a>
        </li>
        <li>
            <a href="/master-instrumen">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">MASTER INSTRUMEN</div>
            </a>
        </li>
    
    @elseif(Auth::user()->role == 'puskesmas')
        <li class="menu-label">KALAU PUSKESMAS LOGIN</li>
        <li>
            <a href="/request-posyandu">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">REQUEST POSYANDU</div>
            </a>
        </li>
        <li>
            <a href="/daftarposyandu">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">DAFTAR POSYANDU</div>
            </a>
        </li>
    
    @elseif(Auth::user()->role == 'dinaskesehatan')
        <li class="menu-label">DAFTAR PUSKESMAS</li>
        <li>
            <a href="/daftarpuskesmas">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">DAFTAR PUSKESMAS</div>
            </a>
        </li>
    @elseif(Auth::user()->role == 'forum_posyandu_kota')
        <li class="menu-label">DAFTAR PUSKESMAS</li>
        <li>
            <a href="/daftarpuskesmas">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">DAFTAR PUSKESMAS</div>
            </a>
        </li>
    @elseif(Auth::user()->role == 'kordinator_kecamatan')
        <li class="menu-label">DAFTAR PUSKESMAS</li>
        <li>
            <a href="/daftarpuskesmas">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">DAFTAR PUSKESMAS</div>
            </a>
        </li>
    
    @elseif(Auth::user()->role == 'posyandu')
        <li class="menu-label">KALAU POSYANDU LOGIN</li>
        <li>
            <a href="/dataposyandu">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">POSYANDU</div>
            </a>
        </li>
        <li>
            <a href="/bulanan-balita">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">BULANAN BALITA</div>
            </a>
        </li>
        <li>
            <a href="/bulanan_ibu_hamil">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">BULANAN IBU HAMIL</div>
            </a>
        </li>
        <li>
            <a href="/bulanan-anak-dan-remaja">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">BULANAN ANAK DAN REMAJA</div>
            </a>
        </li>
        <li>
            <a href="/bulanan-dewasa-dan-lansia">
                <div class="parent-icon"><i class='bx bx-radio-circle-marked'></i></div>
                <div class="menu-title">BULANAN DEWASA DAN LANSIA</div>
            </a>
        </li>
    @endif
</ul>
