@extends('layouts.admin')

@section('title', 'Danh sách việc làm')

@section('content')
<div class="container">
    <h2>Danh sách việc làm</h2>
    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary mb-3">Thêm việc làm mới</a>
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Công ty</th>
                    <th>Hạn nộp</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>{{ $job->job_title }}</td>
                    <td>{{ $job->postedBy->name }}</td>
                    <td>{{ $job->date_expired }}</td>
                    <td>
                        <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection