@extends('layouts.admin')

@section('title', 'Sửa việc làm')

@section('content')
<div class="container">
    <h2>Sửa việc làm</h2>
    <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="job_title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $job->job_title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $job->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="date_expired" class="form-label">Hạn nộp</label>
            <input type="date" class="form-control" id="date_expired" name="date_expired" value="{{ $job->date_expired }}" required>
        </div>
        <div class="mb-3">
            <label for="posted_by" class="form-label">Công ty</label>
            <input type="number" class="form-control" id="posted_by" name="posted_by" value="{{ $job->posted_by }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật việc làm</button>
    </form>
</div>
@endsection