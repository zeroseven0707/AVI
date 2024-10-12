@extends('layouts.app-admin')

@section('content')
<div class="container">
    <h1>Settings Management</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('settings.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="favicon">Favicon</label>
                    <input type="file" name="favicon" class="form-control">
                    @if ($setting->favicon)
                        <img src="{{ asset('storage/' . $setting->favicon) }}" alt="Favicon" width="50" class="mt-2">
                    @endif
                </div>

                <div class="form-group mt-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $setting->title }}" required>
                </div>

                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $setting->email }}" required>
                </div>

                <div class="form-group mt-3">
                    <label for="no_telp">No. Telp</label>
                    <input type="text" name="no_telp" class="form-control" value="{{ $setting->no_telp }}" required>
                </div>

                <div class="form-group mt-3">
                    <label for="copyright">Copyright</label>
                    <input type="text" name="copyright" class="form-control" value="{{ $setting->copyright }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" class="form-control">
                    @if ($setting->logo)
                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" width="100" class="mt-2">
                    @endif
                </div>

                <div class="form-group mt-3">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="4" required>{{ $setting->meta_description }}</textarea>
                </div>
                
                <div class="form-group mt-3">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" rows="4" required>{{ $setting->address }}</textarea>
                </div>

                <h4 class="mt-4">Social Media</h4>
                <div id="social-medias">
                    @if(is_array($setting->social_medias) && count($setting->social_medias) > 0)
                        @foreach($setting->social_medias as $index => $social)
                            <div class="row mb-3 social-media-item">
                                <div class="col-md-4">
                                    <input type="file" name="social_medias[{{ $index }}][logo]" class="form-control">
                                    @if ($social['logo'])
                                        <img src="{{ asset('storage/' . $social['logo']) }}" alt="Social Media Logo" width="50" class="mt-2">
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="social_medias[{{ $index }}][name]" class="form-control" placeholder="Name" value="{{ $social['name'] }}">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="social_medias[{{ $index }}][link]" class="form-control" placeholder="Link" value="{{ $social['link'] }}">
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row mb-3 social-media-item">
                            <div class="col-md-4">
                                <input type="file" name="social_medias[0][logo]" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="social_medias[0][name]" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="social_medias[0][link]" class="form-control" placeholder="Link">
                            </div>
                        </div>
                    @endif
                </div>

                <button type="button" id="add-social-media" class="btn btn-secondary mt-3">Add Social Media</button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Settings</button>
    </form>
</div>

<script>
    document.getElementById('add-social-media').addEventListener('click', function() {
        const socialMediasDiv = document.getElementById('social-medias');
        const index = socialMediasDiv.children.length;

        const newSocialMedia = `
        <div class="row mb-3 social-media-item">
            <div class="col-md-4">
                <input type="file" name="social_medias[${index}][logo]" class="form-control">
            </div>
            <div class="col-md-4">
                <input type="text" name="social_medias[${index}][name]" class="form-control" placeholder="Name">
            </div>
            <div class="col-md-4">
                <input type="text" name="social_medias[${index}][link]" class="form-control" placeholder="Link">
            </div>
        </div>`;

        socialMediasDiv.insertAdjacentHTML('beforeend', newSocialMedia);
    });
</script>
@endsection
