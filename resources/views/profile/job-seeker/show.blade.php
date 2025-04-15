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
            <p><strong>Tên:</strong> {{ $user_profile->name }}</p>
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
    
</div>
<h2 class="mt-4">Kinh nghiệm việc làm</h2>
<div class="container">
    @forelse ($exp as $item)
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Ngày bắt đầu:</strong> {{ $item->start_date }}</p>
            @if ($item->is_current_job == 1)
                <p><strong>Hiện tại vẫn còn làm việc!</strong></p>
            @else
                <p><strong>Ngày kết thúc:</strong> {{ $item->end_date }}</p>
            @endif
        </div>
        <div class="col-sm-4">
            <p><strong>Tên công ty: </strong> {{ $item->company_name }}</p>
            <p><strong>Chức vụ: </strong> {{ $item->job_name }}</p>
        </div>
        <div class="col-sm-4">
            <p><strong>Thành phố nơi làm việc: </strong>  {{ $item->job_location_city }}</p>
            <p><strong>Xã / Phường nơi làm việc: </strong> {{ $item->job_location_state }}</p>
            <p><strong>Đất nước nợi làm việc: </strong></p>
        </div>
    </div>
    @empty
        
    @endforelse
</div>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
        <a href="{{ route('profile.edit', $user_data->profile_url) }}" class="btn btn-outline-primary"><i class="fa-solid fa-note-sticky"></i> Chỉnh sửa</a>
    </div>
    <div class="col-sm-4"></div>
</div>
@endsection