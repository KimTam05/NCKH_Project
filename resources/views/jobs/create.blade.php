@extends('layouts.app')

@section('title', 'Đăng tin tuyển dụng')

@section('content')
<div class="card mt-4">
    <div class="card-header">Đăng tin tuyển dụng</div>
    <div class="card-body">
        <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Loại công việc</label>
                <select name="job_type" class="form-control">
                    <option value="fulltime">Fulltime</option>
                    <option value="parttime">Parttime</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Mức lương</label>
                <input type="text" name="salary" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" name="location" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">File đính kèm</label>
                <input type="file" name="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Đăng tin</button>
        </form>
    </div>
</div>
@endsection