@extends('layouts.admin')

@section('title', 'Thêm việc làm mới')

@section('content')
<div class="container">
    <h2>Thêm việc làm mới</h2>
    <form action="{{ route('admin.jobs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="job_title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="job_title" name="job_title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="date_expired" class="form-label">Hạn nộp</label>
            <input type="date" class="form-control" id="date_expired" name="date_expired" required>
        </div>
        <div class="mb-3">
            <label for="posted_by" class="form-label">Công ty</label>
            <input type="number" class="form-control" id="posted_by" name="posted_by" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm việc làm</button>
    </form>
</div>
@endsection