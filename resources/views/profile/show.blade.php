@extends('layouts.main')

@section('title', 'Hồ sơ cá nhân')

@section('content')
<h2>Hồ sơ cá nhân</h2>
<p><strong>Tên:</strong> {{ $user_data->name }}</p>
<p><strong>Email:</strong> {{ $user_data->email }}</p>
<p><strong>Số điện thoại:</strong> {{ $user_data->contact_number }}</p>
<p><strong>Kinh nghiệm:</strong> {{ $user_data->experience }} năm</p>
<a href="{{ route('profile.edit', $user_data->id) }}">Chỉnh sửa hồ sơ</a>
@endsection
