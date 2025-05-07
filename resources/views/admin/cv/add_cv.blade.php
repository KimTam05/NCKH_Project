@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Thêm CV</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="full_name" class="form-label">Họ và Tên</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nhập họ và tên" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Tải Lên CV (PDF)</label>
                    <input type="file" class="form-control" id="file" name="file" accept=".pdf" required>
                </div>
                <div class="mb-3">
                    <label for="experience" class="form-label">Kinh Nghiệm Làm Việc</label>
                    <textarea class="form-control" id="experience" name="experience" rows="4" placeholder="Mô tả kinh nghiệm làm việc"></textarea>
                </div>
                <div class="mb-3">
                    <label for="education" class="form-label">Học Vấn</label>
                    <textarea class="form-control" id="education" name="education" rows="3" placeholder="Mô tả học vấn"></textarea>
                </div>
                <div class="mb-3">
                    <label for="skills" class="form-label">Kỹ Năng</label>
                    <textarea class="form-control" id="skills" name="skills" rows="3" placeholder="Nhập các kỹ năng"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Thêm CV</button>
            </form>
        </div>
    </div>
</div>
@endsection