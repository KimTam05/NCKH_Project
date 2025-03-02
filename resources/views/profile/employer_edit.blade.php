@extends('layouts.main')

@section('title', 'Chỉnh sửa hồ sơ nhà tuyển dụng')

@section('content')
<h2>Chỉnh sửa hồ sơ nhà tuyển dụng</h2>

<form action="{{ route('profile.update', $user_data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="company_name">Tên công ty:</label>
        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $user_profile->company_name }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user_data->email }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="contact_number">Số điện thoại:</label>
        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $user_data->contact_number }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="company_address">Địa chỉ công ty:</label>
        <input type="text" class="form-control" id="company_address" name="company_address" value="{{ $user_profile->company_address }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="user_image">Ảnh đại diện:</label>
        <input type="file" class="form-control" id="user_image" name="user_image">
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection