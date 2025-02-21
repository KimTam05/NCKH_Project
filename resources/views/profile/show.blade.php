@extends('layouts.main')

@section('title', 'Hồ sơ cá nhân')

@section('content')
<h2>Hồ sơ cá nhân</h2>
<img src="{{ asset($user_data->user_image) }}" style="width: 100px; height: 100px;" alt="">
<p><strong>Tên:</strong> {{ $user_profile->first_name }} {{ $user_profile->last_name }}</p>
<p><strong>Email:</strong> {{ $user_data->email }}</p>
<p><strong>Số điện thoại:</strong> {{ $user_data->contact_number }}</p>
<p><strong>Giới tính: </strong> {{ $user_profile->gender == 1 ? 'Nữ' : 'Nam' }}</strong></p>
<p><strong>Ngày sinh: </strong> {{ $user_data->date_of_birth }} </p>
<a href="{{ route('profile.edit', $user_data->profile_url) }}">Chỉnh sửa hồ sơ</a>
@endsection
