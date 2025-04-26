@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm Bằng Cấp</h2>
    <form action="{{ route('education.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="degree_name" class="form-label">Tên Bằng Cấp</label>
            <input type="text" class="form-control" id="degree_name" name="degree_name" required>
        </div>
        <div class="mb-3">
            <label for="major" class="form-label">Chuyên Ngành</label>
            <input type="text" class="form-control" id="major" name="major" required>
        </div>
        <div class="mb-3">
            <label for="institute_name" class="form-label">Tên Trường</label>
            <input type="text" class="form-control" id="institute_name" name="institute_name" required>
        </div>
        <div class="mb-3">
            <label for="starting_date" class="form-label">Ngày Bắt Đầu</label>
            <input type="date" class="form-control" id="starting_date" name="starting_date" required>
        </div>
        <div class="mb-3">
            <label for="completion_date" class="form-label">Ngày Tốt Nghiệp</label>
            <input type="date" class="form-control" id="completion_date" name="completion_date">
        </div>
        <div class="mb-3">
            <label for="honors_awards" class="form-label">Danh Hiệu/Giải Thưởng</label>
            <input type="text" class="form-control" id="honors_awards" name="honors_awards">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
</div>
@endsection