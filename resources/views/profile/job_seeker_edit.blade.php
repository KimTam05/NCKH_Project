@extends('layouts.main')

@section('title', 'Chỉnh sửa hồ sơ')

@section('content')
<h2>Chỉnh sửa hồ sơ</h2>

<form action="{{ route('profile.update', $user_data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user_profile->first_name }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user_profile->last_name }}" required>
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
            <option value="0" {{ $user_profile->gender == 0 ? 'selected' : '' }}>Nam</option>
            <option value="1" {{ $user_profile->gender == 1 ? 'selected' : '' }}>Nữ</option>
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
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection