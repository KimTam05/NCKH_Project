@extends('layouts.main')

@section('title', 'Thêm kinh nghiệm việc làm')

@section('content')
    <h2>Thêm kinh nghiệm việc làm</h2>

    {{-- Hiển thị lỗi chung --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.experienceSubmit', compact('profile_url')) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày bắt đầu: </label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}">
            @error('start_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày kết thúc:</label>
            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date') }}">
            @error('end_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Hiện tại còn làm việc không?</label>
            <input type="radio" id="is_current_job_yes" class="form-check-input" name="is_current_job" value="1" {{ old('is_current_job') == '1' ? 'checked' : '' }}>
            <label for="is_current_job_yes" class="form-label-input">Có</label><br>
            <input type="radio" id="is_current_job_no" class="form-check-input" name="is_current_job" value="0" {{ old('is_current_job') == '0' ? 'checked' : '' }}>
            <label for="is_current_job_no" class="form-label-input">Không</label>
            @error('is_current_job')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="job_name" class="form-label">Tên công việc:</label>
            <input type="text" id="job_name" name="job_name" class="form-control" value="{{ old('job_name') }}">
            @error('job_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="company_name" class="form-label">Tên công ty:</label>
            <input type="text" id="company_name" class="form-control" name="company_name" value="{{ old('company_name') }}">
            @error('company_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="job_location_city" class="form-label">Thành phố nơi làm việc:</label>
            <input type="text" id="job_location_city" name="job_location_city" class="form-control" value="{{ old('job_location_city') }}">
            @error('job_location_city')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="job_location_state" class="form-label">Tiểu bang nơi làm việc:</label>
            <input type="text" id="job_location_state" name="job_location_state" class="form-control" value="{{ old('job_location_state') }}">
            @error('job_location_state')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="job_location_country" class="form-label">Quốc gia nơi làm việc:</label>
            <input type="text" id="job_location_country" name="job_location_country" class="form-control" value="{{ old('job_location_country') }}">
            @error('job_location_country')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}">
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" value="Thêm kinh nghiệm" class="btn btn-primary">
        
    </form>
@endsection
