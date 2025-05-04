@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($jobPost) ? 'Chỉnh Sửa' : 'Thêm' }} Bài Đăng Công Việc</h2>
    <form action="{{ isset($jobPost) ? route('job_post.update', $jobPost->id) : route('job_post.store') }}" method="POST">
        @csrf
        @if (isset($jobPost))
            @method('PUT')
        @endif
        
        <div class="mb-3">
            <label for="job_title" class="form-label">Tiêu Đề Công Việc</label>
            <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $jobPost->job_title ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $jobPost->description ?? '' }}</textarea>
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Lương</label>
            <input type="number" class="form-control" id="salary" name="salary" value="{{ $jobPost->salary ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label for="date_receiving_applications" class="form-label">Ngày Nhận Hồ Sơ</label>
            <input type="date" class="form-control" id="date_receiving_applications" name="date_receiving_applications" value="{{ $jobPost->date_receiving_applications ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="date_expired" class="form-label">Ngày Hết Hạn</label>
            <input type="date" class="form-control" id="date_expired" name="date_expired" value="{{ $jobPost->date_expired ?? '' }}">
        </div>
        <div class="mb-3">
            <label for="file_description" class="form-label">File Mô Tả</label>
            <input type="text" class="form-control" id="file_description" name="file_description" value="{{ $jobPost->file_description ?? '' }}">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ isset($jobPost) && $jobPost->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Kích Hoạt</label>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($jobPost) ? 'Cập Nhật' : 'Thêm Mới' }}</button>
    </form>
</div>
@endsection