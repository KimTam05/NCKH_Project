@extends('layouts.main')

@section('title', 'Chỉnh sửa hồ sơ')

@section('content')
<h2>Chỉnh sửa hồ sơ</h2>

<form action="{{ route('profile.update', $user_data->profile_url) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user_profile->name }}" required>
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
        <label for="gender">Giới tính:</label>
        <select class="form-control" id="gender" name="gender" required>
            <option value="0" {{ $user_data->gender == 0 ? 'selected' : '' }}>Nam</option>
            <option value="1" {{ $user_data->gender == 1 ? 'selected' : '' }}>Nữ</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="date_of_birth">Ngày sinh:</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $user_data->date_of_birth }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="user_image">Ảnh đại diện:</label>
        <input type="file" class="form-control" id="user_image" name="user_image">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('profile.show', ['profile_url' => $user_data->profile_url]) }}" class="btn btn-secondary"> Trở lại </a>
    </div>
    <div class="mb-3">
        <a href="#" class="btn btn-info">Đổi mật khẩu</a>
    </div>
</form>
@endsection
