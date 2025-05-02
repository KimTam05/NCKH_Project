@extends('layouts.main')

@section('title', 'Chỉnh sửa hồ sơ nhà tuyển dụng')

@section('content')
<h2>Chỉnh sửa hồ sơ nhà tuyển dụng</h2>

<form action="{{ route('profile.company.update', $user_data->profile_url) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="company_name">Tên công ty:</label>
        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $user_profile->company_name }}" required>
        @error('company_name')
            <div class="alert alert-danger">{{ $message }}</div>
            
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="company_email" name="company_email" value="{{ $user_data->email }}" required>
        @error('company_email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="company_website_url">Website:</label>
        <input type="text" class="form-control" id="company_website_url" name="company_website_url" value="{{ $user_profile->company_website_url }}" required>
        @error('company_website_url')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="contact_number">Số điện thoại:</label>
        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $user_data->contact_number }}" required>
        @error('contact_number')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="user_image">Ảnh đại diện:</label>
        <input type="file" class="form-control" id="user_image" name="company_image" accept="image/*">
        @error('company_image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @if ($user_profile->company_logo)
            <img src="{{ asset($user_profile->company_logo) }}" alt="Company Logo" style="width: 100px; height: 100px;">
        @endif
    </div>
    <div class="form-group mb-3">
        <label for="establishment_date">Ngày thành lập:</label>
        <input type="date" class="form-control" id="establishment_date" name="establishment_date" value="{{ \Carbon\Carbon::parse($user_profile->establishment_date)->format('Y-m-d') }}" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="profile-description">Mô tả</label>
        <textarea class="form-control" id="profile-description" name="profile_description" rows="4">{{ $user_profile->profile_description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection