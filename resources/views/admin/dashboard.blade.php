@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')

{{-- Stat Cards --}}
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-bottom:1.75rem">
    <div class="card" style="padding:1.25rem;display:flex;align-items:center;gap:1rem;">
        <div style="width:48px;height:48px;border-radius:12px;background:#edfaf7;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fas fa-newspaper" style="color:#2aad8c;font-size:1.2rem"></i>
        </div>
        <div>
            <div style="font-size:1.75rem;font-weight:800;color:#111827;line-height:1">{{ $total_news }}</div>
            <div style="font-size:.78rem;color:#6b7280;font-weight:500;margin-top:2px">Total Berita</div>
        </div>
    </div>
    <div class="card" style="padding:1.25rem;display:flex;align-items:center;gap:1rem;">
        <div style="width:48px;height:48px;border-radius:12px;background:#eff6ff;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fas fa-bullhorn" style="color:#3b82f6;font-size:1.2rem"></i>
        </div>
        <div>
            <div style="font-size:1.75rem;font-weight:800;color:#111827;line-height:1">{{ $total_announcements }}</div>
            <div style="font-size:.78rem;color:#6b7280;font-weight:500;margin-top:2px">Pengumuman</div>
        </div>
    </div>
    <div class="card" style="padding:1.25rem;display:flex;align-items:center;gap:1rem;">
        <div style="width:48px;height:48px;border-radius:12px;background:#fefce8;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fas fa-trophy" style="color:#d97706;font-size:1.2rem"></i>
        </div>
        <div>
            <div style="font-size:1.75rem;font-weight:800;color:#111827;line-height:1">{{ $total_achievements }}</div>
            <div style="font-size:.78rem;color:#6b7280;font-weight:500;margin-top:2px">Prestasi</div>
        </div>
    </div>
    <div class="card" style="padding:1.25rem;display:flex;align-items:center;gap:1rem;">
        <div style="width:48px;height:48px;border-radius:12px;background:#faf5ff;display:flex;align-items:center;justify-content:center;flex-shrink:0">
            <i class="fas fa-users" style="color:#8b5cf6;font-size:1.2rem"></i>
        </div>
        <div>
            <div style="font-size:1.75rem;font-weight:800;color:#111827;line-height:1">{{ $total_visitors }}</div>
            <div style="font-size:.78rem;color:#6b7280;font-weight:500;margin-top:2px">Total Pengunjung</div>
        </div>
    </div>
</div>

{{-- Quick Stats + Quick Actions --}}
<div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1.75rem">
    <div class="card">
        <div class="card-header"><h3><i class="fas fa-chart-bar" style="color:#2aad8c;margin-right:.5rem"></i>Statistik</h3></div>
        <div class="card-body" style="padding:1.25rem">
            <div style="display:flex;justify-content:space-between;align-items:center;padding:.6rem 0;border-bottom:1px solid #f1f5f9">
                <span style="font-size:.85rem;color:#6b7280">Pengunjung Hari Ini</span>
                <span style="font-weight:700;color:#111827;font-size:.9rem">{{ $visitors_today }}</span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;padding:.6rem 0">
                <span style="font-size:.85rem;color:#6b7280">Berita Bulan Ini</span>
                <span style="font-weight:700;color:#111827;font-size:.9rem">{{ $news_this_month }}</span>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><h3><i class="fas fa-bolt" style="color:#2aad8c;margin-right:.5rem"></i>Akses Cepat</h3></div>
        <div class="card-body" style="padding:1.25rem;display:flex;flex-direction:column;gap:.6rem">
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary" style="justify-content:center">
                <i class="fas fa-plus"></i> Tambah Berita
            </a>
            <a href="{{ route('admin.announcements.create') }}" class="btn btn-secondary" style="justify-content:center">
                <i class="fas fa-plus"></i> Buat Pengumuman
            </a>
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-secondary" style="justify-content:center">
                <i class="fas fa-plus"></i> Upload Galeri
            </a>
        </div>
    </div>
</div>

{{-- Recent Lists --}}
<div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
    <div class="card card-table">
        <div class="card-header">
            <h3><i class="fas fa-newspaper" style="color:#2aad8c;margin-right:.5rem"></i>Berita Terbaru</h3>
            <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-secondary">Lihat Semua</a>
        </div>
        <table>
            <tbody>
                @forelse($recent_news as $news)
                <tr>
                    <td>
                        <div style="font-weight:600;font-size:.83rem;color:#111827">{{ Str::limit($news->title, 45) }}</div>
                        <div style="font-size:.72rem;color:#9ca3af;margin-top:2px">{{ $news->published_at?->format('d M Y') ?? 'Draft' }}</div>
                    </td>
                    <td style="white-space:nowrap">
                        <span class="badge {{ $news->status === 'published' ? 'badge-green' : 'badge-yellow' }}">
                            {{ $news->status === 'published' ? 'Publish' : 'Draft' }}
                        </span>
                    </td>
                    <td style="white-space:nowrap">
                        <a href="{{ route('admin.news.edit', $news) }}" class="action-btn action-edit"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center;color:#9ca3af;padding:2rem">Belum ada berita</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card card-table">
        <div class="card-header">
            <h3><i class="fas fa-bullhorn" style="color:#2aad8c;margin-right:.5rem"></i>Pengumuman Terbaru</h3>
            <a href="{{ route('admin.announcements.index') }}" class="btn btn-sm btn-secondary">Lihat Semua</a>
        </div>
        <table>
            <tbody>
                @forelse($recent_announcements as $ann)
                <tr>
                    <td>
                        <div style="font-weight:600;font-size:.83rem;color:#111827">{{ Str::limit($ann->title, 45) }}</div>
                        <div style="font-size:.72rem;color:#9ca3af;margin-top:2px">{{ $ann->created_at->format('d M Y') }}</div>
                    </td>
                    <td style="white-space:nowrap">
                        <span class="badge {{ $ann->is_active ? 'badge-green' : 'badge-gray' }}">
                            {{ $ann->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td style="white-space:nowrap">
                        <a href="{{ route('admin.announcements.edit', $ann) }}" class="action-btn action-edit"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" style="text-align:center;color:#9ca3af;padding:2rem">Belum ada pengumuman</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
