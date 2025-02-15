@extends('layouts.main')

@section('title', 'Chỉnh sửa hồ sơ')

@section('content')
<h2>Chỉnh sửa hồ sơ</h2>

<form action="{{ route('profile.update', $user_data->id) }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user_data->email }}" required>
    @error('email')
        <div>{{ $message }}</div>
    @enderror


    <label for="gender">Giới tính:</label>
    <select name="gender" required>
        <option value="1" {{ $user_data->gender == 1 ? 'selected' : '' }}>Nam</option>
        <option value="0" {{ $user_data->gender == 0 ? 'selected' : '' }}>Nữ</option>
    </select>

    <label for="phone">Số điện thoại:</label>
    <input type="text" name="contact_number" value="{{ $user_data->contact_number }}" required>
    @error('contact_number')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Cập nhật</button>
</form>
@endsection
