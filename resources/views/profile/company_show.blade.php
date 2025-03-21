@extends('layouts.main')

@section('title', 'Hồ sơ công ty')

@section('content')
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4 text-center">
        <img src="{{ asset($company_data->company_logo) }}" style="width: 100px; height: 100px;" alt="">
    </div>
    <div class="col-sm-4"></div>
</div>

<h2 class="mt-4">Thông tin công ty</h2>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <p><strong>Tên công ty:</strong> {{ $company_data->company_name }}</p>
            <p><strong>Email:</strong> {{ $company_data->email }}</p>
        </div>
        <div class="col-sm-4">
            <p><strong>Số điện thoại:</strong> {{ $company_data->contact_number }}</p>
            <p><strong>Địa chỉ:</strong> {{ $company_data->company_address }}</p>
        </div>
        <div class="col-sm-4">
            <p><strong>Ngày thành lập: </strong> {{ $company_data->established_date }} </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center">
            <a href="{{ route('company.edit', $company_data->profile_url) }}" class="btn btn-outline-primary"><i class="fa-solid fa-note-sticky"></i> Chỉnh sửa</a>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
@endsection