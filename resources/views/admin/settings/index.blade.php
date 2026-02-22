@extends('layouts.admin')

@section('title', 'Pengaturan Sekolah')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="max-w-4xl">
    @csrf
    
    <div class="bg-white rounded-lg shadow p-6 space-y-8">
        <!-- Informasi Sekolah -->
        <div>
            <h3 class="text-lg font-bold text-gray-900 mb-6 border-b pb-4">Informasi Sekolah</h3>
            
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Sekolah</label>
                    <input type="text" name="school_name" value="{{ \App\Models\Setting::get('school_name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Alamat</label>
                    <textarea name="school_address" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>{{ \App\Models\Setting::get('school_address') }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Telepon</label>
                        <input type="text" name="school_phone" value="{{ \App\Models\Setting::get('school_phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Email</label>
                        <input type="email" name="school_email" value="{{ \App\Models\Setting::get('school_email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Logo Sekolah</label>
                    @if(\App\Models\Setting::get('school_logo'))
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . \App\Models\Setting::get('school_logo')) }}" alt="Logo" class="w-32 h-32 object-contain">
                        </div>
                    @endif
                    <input type="file" name="school_logo" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Nama Kepala Sekolah</label>
                    <input type="text" name="principal_name" value="{{ \App\Models\Setting::get('principal_name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div>
            <h3 class="text-lg font-bold text-gray-900 mb-6 border-b pb-4">Visi & Misi</h3>
            
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Visi</label>
                    <textarea name="vision" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ \App\Models\Setting::get('vision') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Misi</label>
                    <textarea name="mission" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ \App\Models\Setting::get('mission') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <div>
            <h3 class="text-lg font-bold text-gray-900 mb-6 border-b pb-4">Media Sosial</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Facebook</label>
                    <input type="url" name="facebook_url" value="{{ \App\Models\Setting::get('facebook_url') }}" placeholder="https://facebook.com/sd1tengguli" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Instagram</label>
                    <input type="url" name="instagram_url" value="{{ \App\Models\Setting::get('instagram_url') }}" placeholder="https://instagram.com/sd1tengguli" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Twitter</label>
                    <input type="url" name="twitter_url" value="{{ \App\Models\Setting::get('twitter_url') }}" placeholder="https://twitter.com/sd1tengguli" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">YouTube</label>
                    <input type="url" name="youtube_url" value="{{ \App\Models\Setting::get('youtube_url') }}" placeholder="https://youtube.com/@sd1tengguli" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>
            </div>
        </div>

        <div class="pt-4 space-x-3 border-t">
            <button type="submit" class="btn-primary">Simpan Pengaturan</button>
        </div>
    </div>
</form>
@endsection
