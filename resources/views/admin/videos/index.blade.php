@extends('layouts.admin')
@section('title','Manajemen Video')
@section('breadcrumb')Video@endsection

@section('content')
<div class="page-header">
    <div class="page-header-info"><h1>Video</h1><p>Kelola koleksi video dari YouTube</p></div>
    <a href="{{ route('admin.videos.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Video</a>
</div>
<div class="card card-table">
    <table>
        <thead><tr><th>Thumbnail</th><th>Judul</th><th>YouTube ID</th><th>Aksi</th></tr></thead>
        <tbody>
            @forelse($videos as $video)
            <tr>
                <td>
                    <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/mqdefault.jpg" style="width:80px;height:50px;border-radius:6px;object-fit:cover">
                </td>
                <td style="font-weight:600;color:#111827">{{ Str::limit($video->title,55) }}</td>
                <td><span class="badge badge-red">{{ $video->youtube_id }}</span></td>
                <td style="white-space:nowrap">
                    <a href="https://youtube.com/watch?v={{ $video->youtube_id }}" target="_blank" class="action-btn action-view"><i class="fas fa-play"></i></a>
                    <a href="{{ route('admin.videos.edit', $video) }}" class="action-btn action-edit"><i class="fas fa-edit"></i></a>
                    <form method="POST" action="{{ route('admin.videos.destroy', $video) }}" class="inline" onsubmit="return confirm('Hapus video ini?')">@csrf @method('DELETE')
                        <button type="submit" class="action-btn action-delete"><i class="fas fa-trash"></i></button></form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" style="text-align:center;color:#9ca3af;padding:3rem">Belum ada video</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top:1rem">{{ $videos->links() }}</div>
@endsection
