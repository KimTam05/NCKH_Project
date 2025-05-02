@extends('layouts.main')

@section('title', 'Hồ sơ công ty')

@section('content')
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
        <img src="{{ asset($user_profile->company_logo) }}" style="width: 100px; height: 100px;" alt="">
    </div>
    <div class="col-sm-4"></div>
</div>

<h2 class="mt-4">Thông tin công ty</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Tên công ty:</strong> {{ $user_profile->company_name }}</p>
            <p><strong>Email:</strong> {{ $user_data->email }}</p>
        </div>
        <div class="col-sm-4">
            <p><strong>Số điện thoại:</strong> {{ $user_data->contact_number }}</p>
            <p><strong>Website:</strong> {{ $user_profile->company_website_url }}</p>
        </div>
        <div class="col-sm-4">
            <p><strong>Ngày thành lập: </strong> {{ $user_profile->establishment_date }} </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center">
            <a href="{{ route('profile.company.edit', ['profile_url' => $user_data->profile_url]) }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Chỉnh sửa</a>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
@endsection