<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — Admin CMS SD Negeri 1 Tengguli</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --primary:       #2aad8c;
            --primary-dark:  #1f8a6f;
            --primary-50:    #edfaf7;
            --primary-100:   #d4f2eb;
            --sidebar-bg:    #0d2e25;
            --sidebar-hover: rgba(42,173,140,.15);
            --sidebar-active:#2aad8c;
            --tan:           #C8B27E;
            --border:        #e5e7eb;
            --radius:        10px;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f3f4f6; color: #111827; overflow-x: hidden; }

        /* ── SIDEBAR ── */
        #sidebar {
            position: fixed; top: 0; left: 0;
            width: 260px; height: 100vh;
            background: var(--sidebar-bg);
            display: flex; flex-direction: column;
            z-index: 200;
            transition: transform .3s ease;
            overflow: hidden;
        }
        #sidebar.collapsed { transform: translateX(-260px); }

        .sidebar-logo {
            display: flex; align-items: center; gap: .85rem;
            padding: 1.5rem 1.5rem 1.25rem;
            border-bottom: 1px solid rgba(255,255,255,.07);
            flex-shrink: 0;
        }
        .sidebar-logo-icon {
            width: 42px; height: 42px;
            background: var(--primary);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; color: #fff; flex-shrink: 0;
        }
        .sidebar-logo-text strong { display: block; color: #fff; font-size: .9rem; font-weight: 700; line-height: 1.2; }
        .sidebar-logo-text span   { color: rgba(255,255,255,.45); font-size: .7rem; }

        .sidebar-nav { flex: 1; overflow-y: auto; padding: 1rem 0; scrollbar-width: thin; scrollbar-color: rgba(255,255,255,.1) transparent; }
        .sidebar-nav::-webkit-scrollbar { width: 4px; }
        .sidebar-nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,.1); border-radius: 4px; }

        .nav-section-label {
            padding: .9rem 1.5rem .35rem;
            font-size: .65rem; font-weight: 700; letter-spacing: .1em;
            text-transform: uppercase; color: rgba(255,255,255,.3);
        }
        .nav-item {
            display: flex; align-items: center; gap: .75rem;
            padding: .65rem 1.5rem;
            color: rgba(255,255,255,.65);
            text-decoration: none;
            font-size: .83rem; font-weight: 500;
            border-radius: 0;
            transition: background .2s, color .2s;
            border-left: 3px solid transparent;
            margin: 1px 0;
        }
        .nav-item:hover { background: var(--sidebar-hover); color: #fff; }
        .nav-item.active {
            background: rgba(42,173,140,.2);
            color: #fff;
            border-left-color: var(--primary);
        }
        .nav-item i { width: 18px; text-align: center; font-size: .85rem; flex-shrink: 0; }

        .sidebar-footer {
            border-top: 1px solid rgba(255,255,255,.07);
            padding: 1rem 1.5rem;
            flex-shrink: 0;
        }
        .sidebar-user {
            display: flex; align-items: center; gap: .75rem;
            margin-bottom: .85rem;
        }
        .sidebar-user-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: var(--primary);
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 700; font-size: .85rem; flex-shrink: 0;
        }
        .sidebar-user-name { color: #fff; font-size: .82rem; font-weight: 600; }
        .sidebar-user-role { color: rgba(255,255,255,.4); font-size: .7rem; }
        .btn-logout {
            display: flex; align-items: center; gap: .6rem;
            width: 100%; padding: .55rem .85rem;
            background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.1);
            border-radius: 8px; color: rgba(255,255,255,.65);
            font-size: .8rem; font-family: inherit; cursor: pointer;
            transition: background .2s, color .2s;
            text-decoration: none;
        }
        .btn-logout:hover { background: rgba(239,68,68,.15); color: #fca5a5; border-color: rgba(239,68,68,.3); }

        /* ── TOPBAR & MAIN ── */
        #main-wrap { margin-left: 260px; min-height: 100vh; display: flex; flex-direction: column; transition: margin-left .3s; }
        #main-wrap.expanded { margin-left: 0; }

        #topbar {
            position: sticky; top: 0; z-index: 100;
            background: #fff; border-bottom: 1px solid var(--border);
            padding: .9rem 1.75rem;
            display: flex; align-items: center; justify-content: space-between; gap: 1rem;
        }
        .topbar-left { display: flex; align-items: center; gap: .85rem; }
        #sidebar-toggle {
            width: 36px; height: 36px; border: 1px solid var(--border); border-radius: 8px;
            background: #fff; cursor: pointer; display: flex; align-items: center; justify-content: center;
            color: #6b7280; font-size: .9rem; transition: background .2s, color .2s;
        }
        #sidebar-toggle:hover { background: var(--primary-50); color: var(--primary); border-color: var(--primary-100); }
        .topbar-title { font-size: 1.1rem; font-weight: 700; color: #111827; }
        .topbar-breadcrumb { font-size: .75rem; color: #9ca3af; display: flex; align-items: center; gap: .35rem; }
        .topbar-breadcrumb a { color: var(--primary); text-decoration: none; }

        .topbar-right { display: flex; align-items: center; gap: .75rem; }
        .topbar-view-site {
            display: flex; align-items: center; gap: .5rem;
            padding: .45rem .9rem; border: 1.5px solid var(--primary);
            border-radius: 8px; color: var(--primary); text-decoration: none;
            font-size: .8rem; font-weight: 600; transition: background .2s, color .2s;
        }
        .topbar-view-site:hover { background: var(--primary); color: #fff; }
        .topbar-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-weight: 700; font-size: .85rem;
        }

        /* ── CONTENT ── */
        #content { flex: 1; padding: 1.75rem; }

        /* Alerts */
        .alert {
            padding: .85rem 1.1rem; border-radius: var(--radius); margin-bottom: 1.5rem;
            display: flex; align-items: flex-start; gap: .6rem; font-size: .85rem;
        }
        .alert-success { background: #ecfdf5; border: 1px solid #6ee7b7; color: #065f46; }
        .alert-error   { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; }
        .alert ul { list-style: disc; padding-left: 1.1rem; }

        /* ── GLOBAL HELPERS ── */
        .card {
            background: #fff; border-radius: var(--radius);
            border: 1px solid var(--border); overflow: hidden;
        }
        .card-header {
            padding: 1rem 1.5rem; border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between; gap: 1rem;
        }
        .card-header h3 { font-size: .95rem; font-weight: 700; color: #111827; }
        .card-body { padding: 1.5rem; }
        .card-table table { width: 100%; border-collapse: collapse; }
        .card-table thead { background: #f9fafb; }
        .card-table th { padding: .75rem 1.25rem; text-align: left; font-size: .75rem; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: .05em; white-space: nowrap; }
        .card-table td { padding: .85rem 1.25rem; font-size: .85rem; color: #374151; border-top: 1px solid #f1f5f9; vertical-align: middle; }
        .card-table tbody tr:hover td { background: #fafafa; }

        .badge {
            display: inline-flex; align-items: center;
            padding: .25rem .6rem; border-radius: 99px;
            font-size: .7rem; font-weight: 700; letter-spacing: .03em;
        }
        .badge-green  { background: #ecfdf5; color: #059669; }
        .badge-yellow { background: #fefce8; color: #d97706; }
        .badge-red    { background: #fef2f2; color: #dc2626; }
        .badge-blue   { background: #eff6ff; color: #2563eb; }
        .badge-gray   { background: #f3f4f6; color: #6b7280; }
        .badge-teal   { background: var(--primary-50); color: var(--primary-dark); }

        /* Buttons */
        .btn {
            display: inline-flex; align-items: center; gap: .45rem;
            padding: .55rem 1.1rem; border-radius: 8px;
            font-size: .82rem; font-weight: 600; font-family: inherit;
            cursor: pointer; text-decoration: none; border: none;
            transition: opacity .2s, transform .15s, box-shadow .2s;
        }
        .btn:hover { opacity: .88; transform: translateY(-1px); }
        .btn:active { transform: translateY(0); opacity: 1; }
        .btn-primary { background: var(--primary); color: #fff; box-shadow: 0 2px 8px rgba(42,173,140,.3); }
        .btn-primary:hover { background: var(--primary-dark); opacity: 1; }
        .btn-secondary { background: #f3f4f6; color: #374151; border: 1px solid var(--border); }
        .btn-danger  { background: #ef4444; color: #fff; }
        .btn-sm { padding: .38rem .8rem; font-size: .75rem; }
        .btn-icon { padding: .45rem; border-radius: 7px; }

        /* Form */
        .form-label { display: block; font-size: .8rem; font-weight: 600; color: #374151; margin-bottom: .4rem; }
        .form-input, .form-select, .form-textarea {
            width: 100%; padding: .65rem .9rem;
            border: 1.5px solid var(--border); border-radius: 8px;
            font-size: .875rem; font-family: inherit; color: #111827;
            background: #fafafa; outline: none;
            transition: border-color .2s, box-shadow .2s, background .2s;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(42,173,140,.1);
            background: #fff;
        }
        .form-group { margin-bottom: 1.25rem; }

        /* Table action icons */
        .action-btn {
            display: inline-flex; align-items: center; justify-content: center;
            width: 30px; height: 30px; border-radius: 6px;
            font-size: .8rem; border: none; cursor: pointer;
            text-decoration: none; transition: background .2s;
        }
        .action-edit   { background: #eff6ff; color: #3b82f6; }
        .action-edit:hover { background: #dbeafe; }
        .action-delete { background: #fef2f2; color: #ef4444; }
        .action-delete:hover { background: #fee2e2; }
        .action-view   { background: var(--primary-50); color: var(--primary); }
        .action-view:hover { background: var(--primary-100); }

        /* Page header */
        .page-header { display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap; }
        .page-header-info h1 { font-size: 1.3rem; font-weight: 800; color: #111827; }
        .page-header-info p  { color: #6b7280; font-size: .83rem; margin-top: .2rem; }

        /* Overlay for mobile */
        #sidebar-overlay {
            display: none; position: fixed; inset: 0; background: rgba(0,0,0,.5); z-index: 150;
        }
        @media (max-width: 768px) {
            #sidebar { transform: translateX(-260px); }
            #sidebar.open { transform: translateX(0); }
            #sidebar-overlay.active { display: block; }
            #main-wrap { margin-left: 0 !important; }
        }

        .crop-modal {
            position: fixed;
            inset: 0;
            z-index: 1200;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: rgba(2, 6, 23, .72);
        }
        .crop-modal.open { display: flex; }
        .crop-panel {
            width: min(980px, 96vw);
            max-height: 94vh;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 20px 50px rgba(0,0,0,.25);
            display: flex;
            flex-direction: column;
        }
        .crop-panel-header {
            padding: .9rem 1rem;
            border-bottom: 1px solid #eef2f7;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
        }
        .crop-panel-title { font-size: .92rem; font-weight: 700; color: #111827; }
        .crop-panel-body {
            padding: .75rem;
            background: #f8fafc;
            min-height: 340px;
            height: min(66vh, 620px);
        }
        .crop-image-wrap {
            width: 100%;
            height: 100%;
            background: #111827;
            border-radius: 10px;
            overflow: hidden;
        }
        #cropperImage {
            display: block;
            max-width: 100%;
        }
        .crop-panel-footer {
            padding: .9rem 1rem;
            border-top: 1px solid #eef2f7;
            display: flex;
            justify-content: flex-end;
            gap: .6rem;
            flex-wrap: wrap;
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- Sidebar Overlay (mobile) --}}
<div id="sidebar-overlay" onclick="closeSidebar()"></div>

{{-- SIDEBAR --}}
<aside id="sidebar">
    <div class="sidebar-logo">
        <div class="sidebar-logo-icon"><i class="fas fa-school"></i></div>
        <div class="sidebar-logo-text">
            <strong>SDN 1 Tengguli</strong>
            <span>Admin CMS</span>
        </div>
    </div>

    <nav class="sidebar-nav">
        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i> Dashboard
        </a>

        {{-- Konten --}}
        <div class="nav-section-label">Konten</div>
        <a href="{{ route('admin.news.index') }}" class="nav-item {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
            <i class="fas fa-newspaper"></i> Berita & Artikel
        </a>
        <a href="{{ route('admin.announcements.index') }}" class="nav-item {{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
            <i class="fas fa-bullhorn"></i> Pengumuman
        </a>
        <a href="{{ route('admin.achievements.index') }}" class="nav-item {{ request()->routeIs('admin.achievements.*') ? 'active' : '' }}">
            <i class="fas fa-trophy"></i> Prestasi
        </a>
        <a href="{{ route('admin.extracurriculars.index') }}" class="nav-item {{ request()->routeIs('admin.extracurriculars.*') ? 'active' : '' }}">
            <i class="fas fa-shapes"></i> Ekstrakurikuler
        </a>
        <a href="{{ route('admin.galleries.index') }}" class="nav-item {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
            <i class="fas fa-images"></i> Galeri Foto
        </a>
        {{-- Data --}}
        <div class="nav-section-label">Data Sekolah</div>
        <a href="{{ route('admin.teachers.index') }}" class="nav-item {{ request()->routeIs('admin.teachers.*') ? 'active' : '' }}">
            <i class="fas fa-chalkboard-teacher"></i> Guru & Staff
        </a>
        <a href="{{ route('admin.sliders.index') }}" class="nav-item {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
            <i class="fas fa-sliders-h"></i> Slider / Banner
        </a>

        {{-- Sistem --}}
        <div class="nav-section-label">Sistem</div>
        <a href="{{ route('admin.users.index') }}" class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="fas fa-users-cog"></i> Manajemen User
        </a>
        <a href="{{ route('admin.settings.index') }}" class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <i class="fas fa-cog"></i> Pengaturan Sekolah
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="sidebar-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <div>
                <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                <div class="sidebar-user-role">Administrator</div>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </button>
        </form>
    </div>
</aside>

{{-- MAIN --}}
<div id="main-wrap">
    {{-- TOPBAR --}}
    <header id="topbar">
        <div class="topbar-left">
            <button id="sidebar-toggle" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <div>
                <div class="topbar-title">@yield('title', 'Dashboard')</div>
                <div class="topbar-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i></a>
                    @hasSection('breadcrumb')
                        <span>/</span>
                        @yield('breadcrumb')
                    @endif
                </div>
            </div>
        </div>
        <div class="topbar-right">
            <a href="{{ route('home') }}" target="_blank" class="topbar-view-site">
                <i class="fas fa-external-link-alt"></i>
                <span class="hidden sm:inline">Lihat Website</span>
            </a>
            <div class="topbar-avatar" title="{{ auth()->user()->name }}">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
        </div>
    </header>

    {{-- CONTENT --}}
    <main id="content">
        @if($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-circle-exclamation" style="margin-top:2px;flex-shrink:0"></i>
                <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-circle-check" style="margin-top:2px;flex-shrink:0"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>
</div>

<div id="cropModal" class="crop-modal" aria-hidden="true">
    <div class="crop-panel" role="dialog" aria-modal="true" aria-labelledby="cropperTitle">
        <div class="crop-panel-header">
            <div class="crop-panel-title" id="cropperTitle">Atur Crop Foto</div>
            <button type="button" class="btn btn-secondary btn-sm" id="cropCancelTop">
                <i class="fas fa-xmark"></i> Tutup
            </button>
        </div>
        <div class="crop-panel-body">
            <div class="crop-image-wrap">
                <img id="cropperImage" alt="Crop Preview">
            </div>
        </div>
        <div class="crop-panel-footer">
            <button type="button" class="btn btn-secondary" id="cropCancelBtn">Batal</button>
            <button type="button" class="btn btn-primary" id="cropApplyBtn"><i class="fas fa-crop"></i> Gunakan Hasil Crop</button>
        </div>
    </div>
</div>

<script>
    const sidebar     = document.getElementById('sidebar');
    const mainWrap    = document.getElementById('main-wrap');
    const overlay     = document.getElementById('sidebar-overlay');
    const isMobile    = () => window.innerWidth <= 768;

    function toggleSidebar() {
        if (isMobile()) {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
        } else {
            sidebar.classList.toggle('collapsed');
            mainWrap.classList.toggle('expanded');
        }
    }
    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('active');
    }

    // Auto-dismiss alerts
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => {
            el.style.transition = 'opacity .5s';
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 500);
        });
    }, 4000);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
<script>
    (() => {
        const modal = document.getElementById('cropModal');
        const imageEl = document.getElementById('cropperImage');
        const applyBtn = document.getElementById('cropApplyBtn');
        const cancelBtn = document.getElementById('cropCancelBtn');
        const cancelTopBtn = document.getElementById('cropCancelTop');

        if (!modal || !imageEl || typeof Cropper === 'undefined') return;

        let cropper = null;
        let activeInput = null;
        let activeFileName = 'cropped-image.jpg';

        const parseRatio = (value) => {
            if (!value || value === 'free') return NaN;
            if (value.includes('/')) {
                const parts = value.split('/').map(v => Number(v.trim()));
                if (parts.length === 2 && parts[0] > 0 && parts[1] > 0) {
                    return parts[0] / parts[1];
                }
            }
            const num = Number(value);
            return Number.isFinite(num) && num > 0 ? num : NaN;
        };

        const closeModal = () => {
            modal.classList.remove('open');
            modal.setAttribute('aria-hidden', 'true');
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
            imageEl.removeAttribute('src');
            activeInput = null;
        };

        const updatePreview = (input, file) => {
            const form = input.closest('form');
            const previewImgId = input.dataset.previewImg || 'imgPreview';
            const previewBoxId = input.dataset.previewBox || 'imgPreviewBox';
            const previewImg = form ? form.querySelector('#' + previewImgId) : document.getElementById(previewImgId);
            const previewBox = form ? form.querySelector('#' + previewBoxId) : document.getElementById(previewBoxId);
            if (!previewImg) return;

            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                if (previewBox) previewBox.style.display = 'block';
            };
            reader.readAsDataURL(file);
        };

        const openModal = (input, file) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                imageEl.src = e.target.result;
                modal.classList.add('open');
                modal.setAttribute('aria-hidden', 'false');

                const aspectRatio = parseRatio(input.dataset.cropRatio || '16/9');
                cropper = new Cropper(imageEl, {
                    viewMode: 1,
                    dragMode: 'move',
                    autoCropArea: 1,
                    responsive: true,
                    background: false,
                    aspectRatio,
                });
            };
            reader.readAsDataURL(file);
        };

        document.addEventListener('change', (event) => {
            const input = event.target;
            if (!(input instanceof HTMLInputElement)) return;
            if (input.type !== 'file') return;
            if (input.multiple) return;
            if (input.dataset.crop !== 'true') return;

            const file = input.files && input.files[0];
            if (!file || !file.type.startsWith('image/')) return;

            activeInput = input;
            activeFileName = file.name || 'cropped-image.jpg';
            openModal(input, file);
        });

        applyBtn.addEventListener('click', () => {
            if (!cropper || !activeInput) return;

            const mimeType = activeInput.dataset.cropType || 'image/jpeg';
            const quality = Number(activeInput.dataset.cropQuality || '0.92');
            const width = Number(activeInput.dataset.cropWidth || 0);
            const height = Number(activeInput.dataset.cropHeight || 0);

            const canvasOptions = {
                fillColor: '#ffffff',
                imageSmoothingQuality: 'high',
            };
            if (width > 0) canvasOptions.width = width;
            if (height > 0) canvasOptions.height = height;

            cropper.getCroppedCanvas(canvasOptions).toBlob((blob) => {
                if (!blob || !activeInput) return;

                const ext = mimeType === 'image/png' ? 'png' : 'jpg';
                const baseName = activeFileName.replace(/\.[^/.]+$/, '');
                const croppedFile = new File([blob], baseName + '-cropped.' + ext, {
                    type: mimeType,
                    lastModified: Date.now(),
                });

                const dt = new DataTransfer();
                dt.items.add(croppedFile);
                activeInput.files = dt.files;
                updatePreview(activeInput, croppedFile);
                closeModal();
            }, mimeType, Number.isFinite(quality) ? quality : 0.92);
        });

        cancelBtn.addEventListener('click', closeModal);
        cancelTopBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
    })();
</script>
@stack('scripts')
</body>
</html>
