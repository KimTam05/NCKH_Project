@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Quản Lý Bài Đăng Công Việc</h2>

    <!-- Nếu có biến $jobPost thì hiển thị Form chỉnh sửa, nếu không thì hiển thị Form thêm -->
    <div class="card mb-4">
        <div class="card-header">
            <h4>{{ isset($jobPost) ? 'Chỉnh Sửa' : 'Thêm' }} Bài Đăng Công Việc</h4>
        </div>
        <div class="card-body">
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
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $jobPost->description ?? '' }}</textarea>
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
    </div>

    <!-- Danh sách bài đăng công việc -->
    <div class="card">
        <div class="card-header">
            <h4>Danh Sách Bài Đăng Công Việc</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Mô Tả</th>
                        <th>Lương</th>
                        <th>Ngày Nhận Hồ Sơ</th>
                        <th>Ngày Hết Hạn</th>
                        <th>Trạng Thái</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobPosts as $jobPost)
                    <tr>
                        <td>{{ $jobPost->id }}</td>
                        <td>{{ $jobPost->job_title }}</td>
                        <td>{{ Str::limit($jobPost->description, 50) }}</td>
                        <td>{{ number_format($jobPost->salary, 0, ',', '.') }} VND</td>
                        <td>{{ $jobPost->date_receiving_applications }}</td>
                        <td>{{ $jobPost->date_expired }}</td>
                        <td>
                            @if ($jobPost->is_active)
                                <span class="badge bg-success">Đang Hoạt Động</span>
                            @else
                                <span class="badge bg-danger">Ngừng Hoạt Động</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('job_post.edit', $jobPost->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('job_post.destroy', $jobPost->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection