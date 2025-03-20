@extends('layouts.admin')

@section('title', 'Thêm ứng viên mới')

@section('content')
<div class="container">
    <h2>Thêm ứng viên mới</h2>
    <form action="{{ route('admin.candidates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="contact_number" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" required>
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Hồ sơ</label>
            <input type="file" class="form-control" id="resume" name="resume" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm ứng viên</button>
    </form>
</div>
@endsection