@extends('layouts.main')

@section('title', 'Thêm bằng cấp')

{{-- Hiển thị lỗi chung --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<div class="container">
    <h2>Thêm Bằng Cấp</h2>
    <form action="{{ route('profile.educationSubmit', compact('profile_url')) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="certificate_degree_name" class="form-label">Tên Bằng Cấp</label>
            <input type="text" class="form-control" id="degree_name" name="certificate_degree_name" value="{{ old('certificate_degree_name') }}" required>
        </div>
        <div class="mb-3">
            <label for="major" class="form-label">Chuyên Ngành</label>
            <input type="text" class="form-control" id="major" name="major" value="{{ old('major') }}" required>
        </div>
        <div class="mb-3">
            <label for="insitute_university_name" class="form-label">Tên Trường</label>
            <input type="text" class="form-control" id="insitute_university_name" name="insitute_university_name" value="{{ old('insitute_university_name') }}" required>
        </div>
        <div class="mb-3">
            <label for="starting_date" class="form-label">Ngày Bắt Đầu</label>
            <input type="date" class="form-control" id="starting_date" name="starting_date" value="{{ old('starting_date') }}" required>
        </div>
        <div class="mb-3">
            <label for="completion_date" class="form-label">Ngày Tốt Nghiệp</label>
            <input type="date" class="form-control" id="completion_date" name="completion_date" value="{{ old('completion_date') }}">
        </div>
        <div class="mb-3">
            <label for="percentage" class="form-label">Hoàn thành </label>
            <input type="number" class="form-control" id="percentage" name="percentage" value="{{ old('percentage') }}">
        </div>
        <div class="mb-3">
            <label for="cgpa" class="form-label">GPA Point</label>
            <input type="number" class="form-control" id="cgpa" name="cgpa" value="{{ old('cgpa') }}">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection