@extends('layouts.admin')
@section('title','Slider / Banner')
@section('breadcrumb')Slider@endsection

@section('content')
<div class="page-header">
    <div class="page-header-info"><h1>Slider / Banner</h1><p>Kelola banner yang tampil di halaman utama</p></div>
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Banner</a>
</div>
<div class="card card-table">
    <table>
        <thead><tr><th>Preview</th><th>Judul</th><th>Status</th><th>Urutan</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($sliders as $slider)
            <tr>
                <td>
                    @if($slider->image)
                        <img src="{{ asset('storage/'.$slider->image) }}" style="width:80px;height:50px;border-radius:6px;object-fit:cover">
                    @else
                        <div style="width:80px;height:50px;border-radius:6px;background:#f3f4f6;display:flex;align-items:center;justify-content:center;color:#9ca3af"><i class="fas fa-image"></i></div>
                    @endif
                </td>
                <td style="font-weight:600;color:#111827">{{ $slider->title ?? 'Banner' }}</td>
                <td><span class="badge {{ $slider->is_active ? 'badge-green' : 'badge-gray' }}">{{ $slider->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                <td style="color:#6b7280">{{ $slider->order }}</td>
                <td style="white-space:nowrap">
                    <a href="{{ route('admin.sliders.edit', $slider) }}" class="action-btn action-edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.sliders.destroy', $slider) }}" class="inline" onsubmit="return confirm('Hapus banner ini?')">@csrf @method('DELETE')
                        <button type="submit" class="action-btn action-delete"><i class="fas fa-trash"></i></button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;color:#9ca3af;padding:3rem">Belum ada banner</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top:1rem">{{ $sliders->links() }}</div>
@endsection
