{{-- Edit a job post which have posted --}}
@extends('layouts.main')

@section('title', 'Chỉnh sửa tin tuyển dụng')

@section('content')
<div class="container">
    <h2 class="mt-4">Chỉnh sửa tin tuyển dụng</h2>
    <form action="{{ route('employer.update', $job->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="job_title" class="form-label">Tiêu đề công việc</label>
            <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $job->job_title }}" required>
        </div>
        <div class="mb-3">
            <label for="job_description" class="form-label">Mô tả công việc</label>
            <textarea class="form-control" id="job_description" name="description" rows="5" required>{{ $job->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="job_location" class="form-label">Địa điểm làm việc</label>
            <input type="text" class="form-control" id="job_location" name="location" value="{{ $job->location }}" required>
        </div>
        <div class="mb-3">
            <label for="job_salary" class="form-label">Mức lương</label>
            <input type="text" class="form-control" id="job_salary" name="salary" value="{{ $job->salary }}" required>
        </div>
        <div class="mb-3">
            <label for="job_type" class="form-label">Loại công việc</label>
            <select class="form-select" id="job_type" name="job_type" required>
                <option value="" disabled selected>Chọn loại công việc</option>
                <option value="1" {{ $job->job_type == 1 ? 'selected' : '' }}>Toàn thời gian</option>
                <option value="2" {{ $job->job_type == 2 ? 'selected' : '' }}>Bán thời gian</option>
                <option value="3" {{ $job->job_type == 3 ? 'selected' : '' }}>Thực tập</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="job_status" class="form-label">Trạng thái</label>
            <select class="form-select" id="job_status" name="is__active" required>
                <option value="" disabled selected>Chọn trạng thái</option>
                <option value="1" {{ $job->is__active == 1 ? 'selected' : '' }}>Đang tuyển</option>
                <option value="0" {{ $job->is__active == 0 ? 'selected' : '' }}>Ngừng tuyển</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="job_expired" class="form-label">Ngày hết hạn</label>
            <input type="date" class="form-control" id="job_expired" name="date_expired" value="{{ $job->date_expired->format('Y-m-d') }}" required>
        </div>
        <input type="submit" value="Cập nhật" class="btn btn-primary">
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