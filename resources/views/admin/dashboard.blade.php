@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Việc làm</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $jobCount }}</h5>
                    <p class="card-text">Số lượng việc làm hiện có.</p>
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-light">Quản lý việc làm</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Ứng viên</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $candidateCount }}</h5>
                    <p class="card-text">Số lượng ứng viên hiện có.</p>
                    <a href="{{ route('admin.candidates.index') }}" class="btn btn-light">Quản lý ứng viên</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Công ty</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $companyCount }}</h5>
                    <p class="card-text">Số lượng công ty hiện có.</p>
                    <a href="{{ route('admin.companies.index') }}" class="btn btn-light">Quản lý công ty</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection