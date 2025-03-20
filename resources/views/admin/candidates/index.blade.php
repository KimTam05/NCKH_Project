@extends('layouts.admin')

@section('title', 'Danh sách ứng viên')

@section('content')
<div class="container">
    <h2>Danh sách ứng viên</h2>
    <a href="{{ route('admin.candidates.create') }}" class="btn btn-primary mb-3">Thêm ứng viên mới</a>
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->name }}</td>
                    <td>{{ $candidate->email }}</td>
                    <td>{{ $candidate->contact_number }}</td>
                    <td>
                        <a href="{{ route('admin.candidates.edit', $candidate->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('admin.candidates.destroy', $candidate->id) }}" method="POST" style="display:inline-block;">
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