@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm Kinh Nghiệm Làm Việc</h2>
    <form action="{{ route('experience.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="job_name" class="form-label">Tên Công Việc</label>
            <input type="text" class="form-control" id="job_name" name="job_name" required>
        </div>
        <div class="mb-3">
            <label for="company_name" class="form-label">Tên Công Ty</label>
            <input type="text" class="form-control" id="company_name" name="company_name" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày Bắt Đầu</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày Kết Thúc</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả Công Việc</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="current_job" name="current_job">
            <label class="form-check-label" for="current_job">Công Việc Hiện Tại</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Lưu</button>
    </form>
</div>
@endsection