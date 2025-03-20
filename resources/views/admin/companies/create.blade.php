@extends('layouts.admin')

@section('title', 'Thêm công ty mới')

@section('content')
<div class="container">
    <h2>Thêm công ty mới</h2>
    <form action="{{ route('admin.companies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="company_name" class="form-label">Tên công ty</label>
            <input type="text" class="form-control" id="company_name" name="company_name" required>
        </div>
        <div class="mb-3">
            <label for="profile_description" class="form-label">Mô tả hồ sơ</label>
            <textarea class="form-control" id="profile_description" name="profile_description" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="establishment_date" class="form-label">Ngày thành lập</label>
            <input type="date" class="form-control" id="establishment_date" name="establishment_date" required>
        </div>
        <div class="mb-3">
            <label for="company_website_url" class="form-label">Website</label>
            <input type="url" class="form-control" id="company_website_url" name="company_website_url">
        </div>
        <div class="mb-3">
            <label for="company_email" class="form-label">Email công ty</label>
            <input type="email" class="form-control" id="company_email" name="company_email" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm công ty</button>
    </form>
</div>
@endsection