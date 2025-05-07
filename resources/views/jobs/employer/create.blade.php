{{-- Create a form to store job post  --}}
@extends('layouts.main')
@section('title', 'Đăng tin tuyển dụng')
@section('content')

<div class="container">
    <h2 class="mt-4">Đăng tin tuyển dụng</h2>
    <form action="{{ route('employer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="job_title" class="form-label">Tiêu đề công việc</label>
            <input type="text" class="form-control" id="job_title" name="job_title" required>
        </div>
        <div class="mb-3">
            <label for="job_description" class="form-label">Mô tả công việc</label>
            <textarea class="form-control" id="job_description" name="description" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="job_location" class="form-label">Địa điểm làm việc</label>
            <input type="text" class="form-control" id="job_location" name="location" required>
        </div>
        <div class="mb-3">
            <label for="job_salary" class="form-label">Mức lương (đơn vị $)</label>
            <input type="text" class="form-control" id="job_salary" name="salary" required>
        </div>
        <div class="mb-3">
            <label for="job_type" class="form-label">Loại công việc</label>
            <select class="form-select" id="job_type" name="job_type" required>
                <option value="" disabled selected>Chọn loại công việc</option>
                <option value="1">Toàn thời gian</option>
                <option value="2">Bán thời gian</option>
                <option value="3">Thực tập</option>
            </select>
        </div>
        <input type="submit" value="Đăng tin" class="btn btn-primary">
    </form>
</div>
@endsection
{{-- Add a script to show success message --}}
<script>
    @if (session('success'))
        Swal.fire({
            title: 'Thành công!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
</script>
{{-- Add a script to show error message --}}
<script>
    @if (session('error'))
        Swal.fire({
            title: 'Lỗi!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    @endif
</script>