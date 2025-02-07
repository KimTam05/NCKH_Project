@extends('layouts.main')

@section('title', 'Chỉnh sửa hồ sơ')

@section('content')
<h2>Chỉnh sửa hồ sơ</h2>

<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ Auth::user()->email }}" required>
    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <label for="phone">Số điện thoại:</label>
    <input type="text" name="phone" value="{{ Auth::user()->phone }}" required>
    @error('phone')
        <div>{{ $message }}</div>
    @enderror

    <label for="experience">Kinh nghiệm:</label>
    <input type="number" name="experience" value="{{ Auth::user()->experience }}" required>
    @error('experience')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Cập nhật</button>
</form>
@endsection