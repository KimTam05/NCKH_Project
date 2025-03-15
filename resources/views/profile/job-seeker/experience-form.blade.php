@extends('layouts.main')

@section('title', 'Chỉnh sửa hồ sơ')

@section('content')
    <form action="" method="post">
        <div class="mb-3">
            <label for="start-date" class="form-label">Ngày bắt đầu: </label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="mb-3">
            <label for="end-date" class="form-label">Ngày kết thúc:</label>
            <input type="date" name="end_date" id="" class="form-control">
        </div>
        <div class="mb-3 form-check">
            <label for="is-current-jobs" class="form-label">Hiện tại còn làm việc không?</label>
            <input type="radio" class="form-check-input" name="is_current_job" id=""> <label for="" class="form-check-input">Có</label>
            <input type="radio" class="form-check-input" name="is_current_job" id=""> <label for="" class="form-check-input">Không</label>
        </div>
        <div class="mb-3">
            <label for="job-name" class="form-label">Tên công việc:</label>
            <input type="text" name="job_name" id="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="company-name" class="form-label">Tên công ty:</label>
            <input type="text"  class="form-control" name="company_name">
        </div>
        <div class="mb-3">
            <label for="job-location-city" class="form-label">Thành phố nơi làm việc:</label>
            <input type="text" name="job_location_city" class="form-control">
        </div>
        <div class="mb-3">
            <label for="job-location-state" class="form-label">Tiểu bang nơi làm việc:</label>
            <input type="text" name="job_location_state" class="form-control">
        </div>
        <div class="mb-3">
            <label for="job-location-country" class="form-label">Quốc gia nơi làm việc:</label>
            <input type="text" name="job-location-country" class="form-control">
        </div>
    </form>
@endsection