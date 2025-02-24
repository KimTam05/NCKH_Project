@extends('layouts.main')

@section('title', 'Hồ sơ cá nhân')

@section('content')
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
        <img src="{{ asset($user_data->user_image) }}" style="width: 100px; height: 100px;" alt="">
    </div>
    <div class="col-sm-4"></div>
</div>

<h2 class="mt-4">Thông tin</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Tên:</strong> {{ $user_profile->first_name }} {{ $user_profile->last_name }}</p>
            <p><strong>Email:</strong> {{ $user_data->email }}</p>
        </div>
        <div class="col-sm-4">
            <p><strong>Số điện thoại:</strong> {{ $user_data->contact_number }}</p>
            <p><strong>Giới tính: </strong> {{ $user_profile->gender == 0 ? 'Nam' : 'Nữ' }}</p>
        </div>
        <div class="col-sm-4">
            <p><strong>Ngày sinh: </strong> {{ $user_data->date_of_birth }} </p>
        </div>
    </div>
    <!-- Thêm học vấn và kinh nghiệm làm việc bên dưới này -->
</div>
@endsection
