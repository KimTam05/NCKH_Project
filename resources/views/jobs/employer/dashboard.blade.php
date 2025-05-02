{{-- Create a dashboard about job posted by employer --}}
@extends('layouts.main')
@section('title', 'Dashboard Nhà tuyển dụng')
@section('content')

<div class="container">
    <h2 class="mt-4">Dashboard Nhà tuyển dụng</h2>
    <div class="row">
        <div class="col-sm-12">
            <h3>Danh sách việc làm đã đăng</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên công việc</th>
                        <th>Nơi làm việc</th>
                        <th>Ngày đăng</th>
                        <th>Ngày hết hạn</th>
                        <th>Lương</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->id }}</td>
                            <td>{{ $job->job_title }}</td>
                            <td>{{ $job->location }}</td>
                            <td>{{ $job->created_at->format('d/m/Y') }}</td>
                            <td>{{ $job->date_expired->format('d/m/Y') }}</td>
                            <td>${{ $job->salary }}</td>
                            <td>{{ $job->is__active }}</td>
                            <td>
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-primary">Chỉnh sửa</a>
                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $jobs->links() }}
        </div>
    </div>
</div>