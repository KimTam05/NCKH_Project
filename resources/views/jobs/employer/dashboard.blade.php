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
                    @forelse ($job as $item)
                        {{-- Show job post --}}
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->job_title }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td>{{ $item->date_expired->format('d/m/Y') }}</td>
                            <td>{{ number_format($item->salary, 0, ',', '.') }} VNĐ</td>
                            <td>
                                @if ($item->is__active == 1)
                                    Đang tuyển
                                @else
                                    Ngừng tuyển
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('employer.edit', $item->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                                <form action="{{ route('employer.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Chưa có việc làm nào được đăng</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $jobs->links() }}
        </div>
    </div>
</div>