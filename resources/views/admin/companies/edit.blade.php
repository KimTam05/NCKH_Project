@extends('layouts.admin')

@section('title', 'Sửa công ty')

@section('content')
<div class="container">
    <h2>Sửa công ty</h2>
    <form action="{{ route('admin.companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="company_name" class="form-label">Tên công ty</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $company->company_name }}" required>
        </div>
        <div class="mb-3">
            <label for="profile_description" class="form-label">Mô tả hồ sơ</label>
            <textarea class="form-control" id="profile_description" name="profile_description" rows="5" required>{{ $company->profile_description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="establishment_date" class="form-label">Ngày thành lập</label>
            <input type="date" class="form-control" id="establishment_date" name="establishment_date" value="{{ $company->establishment_date }}" required>
        </div>
        <div class="mb-3">
            <label for="company_website_url" class="form-label">Website</label>
            <input type="url" class="form-control" id="company_website_url" name="company_website_url" value="{{ $company->company_website_url }}">
        </div>
        <div class="mb-3">
            <label for="company_email" class="form-label">Email công ty</label>
            <input type="email" class="form-control" id="company_email" name="company_email" value="{{ $company->company_email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật công ty</button>
    </form>
</div>
@endsection