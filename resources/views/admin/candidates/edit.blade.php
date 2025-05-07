@extends('layouts.admin')

@section('title', 'Sửa ứng viên')

@section('content')
<div class="container">
    <h2>Sửa ứng viên</h2>
    <form action="{{ route('admin.candidates.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $candidate->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $candidate->email }}" required>
        </div>
        <div class="mb-3">
            <label for="contact_number" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $candidate->contact_number }}" required>
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Hồ sơ</label>
            <input type="file" class="form-control" id="resume" name="resume">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật ứng viên</button>
    </form>
</div>
@endsection