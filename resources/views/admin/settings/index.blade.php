@extends('layouts.admin')
@section('title','Pengaturan Sekolah')
@section('breadcrumb')Pengaturan@endsection
@php use App\Models\Teacher; use App\Models\Achievement; @endphp

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.25rem">

        {{-- Kolom kiri --}}
        <div style="display:flex;flex-direction:column;gap:1.25rem">
            <div class="card">
                <div class="card-header"><h3><i class="fas fa-school" style="color:#2aad8c;margin-right:.5rem"></i>Informasi Sekolah</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Nama Sekolah</label>
                        <input type="text" name="school_name" class="form-input" value="{{ \App\Models\Setting::get('school_name') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Kepala Sekolah</label>
                        <input type="text" name="principal_name" class="form-input" value="{{ \App\Models\Setting::get('principal_name') }}">
                    </div>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                        <div class="form-group">
                            <label class="form-label">Kota / Kabupaten</label>
                            <input type="text" name="school_city" class="form-input" value="{{ \App\Models\Setting::get('school_city', 'Kab. Jepara, Jawa Tengah') }}" placeholder="Kab. Jepara, Jawa Tengah">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Akreditasi</label>
                            <input type="text" name="school_accreditation" class="form-input" value="{{ \App\Models\Setting::get('school_accreditation', 'A') }}" placeholder="A">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <textarea name="school_address" rows="3" class="form-textarea">{{ \App\Models\Setting::get('school_address') }}</textarea>
                    </div>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                        <div class="form-group">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="school_phone" class="form-input" value="{{ \App\Models\Setting::get('school_phone') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" name="school_email" class="form-input" value="{{ \App\Models\Setting::get('school_email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Logo Sekolah</label>
                        @if(\App\Models\Setting::get('school_logo'))
                        <div style="margin-bottom:.75rem">
                            <img src="{{ asset('storage/'.\App\Models\Setting::get('school_logo')) }}" style="height:80px;object-fit:contain">
                        </div>
                        @endif
                        <input type="file" name="school_logo" accept="image/*" class="form-input" data-crop="true" data-crop-ratio="1/1" data-preview-img="schoolLogoPreview" data-preview-box="schoolLogoPreviewBox">
                        <div id="schoolLogoPreviewBox" style="display:none;margin-top:.75rem">
                            <img id="schoolLogoPreview" style="height:80px;object-fit:contain">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h3><i class="fas fa-eye" style="color:#2aad8c;margin-right:.5rem"></i>Visi &amp; Misi</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Visi</label>
                        <textarea name="vision" rows="4" class="form-textarea">{{ \App\Models\Setting::get('vision') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Misi</label>
                        <textarea name="mission" rows="6" class="form-textarea" placeholder="Pisahkan setiap poin misi dengan baris baru...">{{ \App\Models\Setting::get('mission') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom kanan --}}
        <div style="display:flex;flex-direction:column;gap:1.25rem">
            <div class="card">
                <div class="card-header"><h3><i class="fas fa-share-alt" style="color:#2aad8c;margin-right:.5rem"></i>Media Sosial</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label"><i class="fab fa-facebook" style="color:#1877f2;margin-right:.4rem"></i>Facebook</label>
                        <input type="url" name="facebook_url" class="form-input" value="{{ \App\Models\Setting::get('facebook_url') }}" placeholder="https://facebook.com/...">
                    </div>
                    <div class="form-group">
                        <label class="form-label"><i class="fab fa-instagram" style="color:#e1306c;margin-right:.4rem"></i>Instagram</label>
                        <input type="url" name="instagram_url" class="form-input" value="{{ \App\Models\Setting::get('instagram_url') }}" placeholder="https://instagram.com/...">
                    </div>
                    <div class="form-group">
                        <label class="form-label"><i class="fab fa-twitter" style="color:#1da1f2;margin-right:.4rem"></i>Twitter / X</label>
                        <input type="url" name="twitter_url" class="form-input" value="{{ \App\Models\Setting::get('twitter_url') }}" placeholder="https://twitter.com/...">
                    </div>
                    <div class="form-group">
                        <label class="form-label"><i class="fab fa-youtube" style="color:#ff0000;margin-right:.4rem"></i>YouTube</label>
                        <input type="url" name="youtube_url" class="form-input" value="{{ \App\Models\Setting::get('youtube_url') }}" placeholder="https://youtube.com/...">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h3><i class="fas fa-map-marker-alt" style="color:#2aad8c;margin-right:.5rem"></i>Lokasi &amp; Maps</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Embed Google Maps URL</label>
                        <textarea name="maps_embed" rows="4" class="form-textarea" placeholder="Paste URL atau embed code Google Maps...">{{ \App\Models\Setting::get('maps_embed') }}</textarea>
                        <p style="font-size:.75rem;color:#9ca3af;margin-top:.3rem">Masukkan URL embed dari Google Maps (bukan URL biasa)</p>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Koordinat Latitude</label>
                        <input type="text" name="school_lat" class="form-input" value="{{ \App\Models\Setting::get('school_lat') }}" placeholder="-6.12345">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Koordinat Longitude</label>
                        <input type="text" name="school_lng" class="form-input" value="{{ \App\Models\Setting::get('school_lng') }}" placeholder="106.12345">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h3><i class="fas fa-chart-bar" style="color:#2aad8c;margin-right:.5rem"></i>Statistik Beranda</h3></div>
                <div class="card-body">
                    <p style="font-size:.8rem;color:#9ca3af;margin-bottom:1rem">Angka yang ditampilkan di section statistik halaman utama.</p>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-users" style="margin-right:.4rem;color:#2aad8c"></i>Jumlah Siswa Aktif</label>
                            <input type="number" name="students_count" class="form-input" value="{{ \App\Models\Setting::get('students_count', 500) }}" min="0" placeholder="500">
                        </div>
                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-calendar-check" style="margin-right:.4rem;color:#2aad8c"></i>Tahun Berdiri</label>
                            <input type="number" name="founded_year" class="form-input" value="{{ \App\Models\Setting::get('founded_year', 1999) }}" min="1900" max="2100" placeholder="1999">
                        </div>
                        <div class="form-group">
                            <label class="form-label" style="color:#9ca3af"><i class="fas fa-chalkboard-teacher" style="margin-right:.4rem"></i>Guru (otomatis dari data)</label>
                            <input type="text" class="form-input" value="{{ \App\Models\Teacher::count() }} guru terdaftar" disabled style="background:#f9fafb;color:#6b7280">
                        </div>
                        <div class="form-group">
                            <label class="form-label" style="color:#9ca3af"><i class="fas fa-trophy" style="margin-right:.4rem"></i>Prestasi (otomatis dari data)</label>
                            <input type="text" class="form-input" value="{{ \App\Models\Achievement::count() }} prestasi terdaftar" disabled style="background:#f9fafb;color:#6b7280">
                        </div>
                    </div>
                </div>
            </div>

            <div style="display:flex;gap:.75rem">
                <button type="submit" class="btn btn-primary" style="flex:1;justify-content:center"><i class="fas fa-save"></i> Simpan Semua Pengaturan</button>
            </div>
        </div>
    </div>
</form>
@endsection
