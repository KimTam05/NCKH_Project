@extends('layouts.app')

@section('title', 'Danh sách ứng viên')

@section('content')
<div class="card mt-4">
    <div class="card-header">Danh sách ứng viên</div>
    <div class="card-body">
        @foreach ($candidates as $candidate)
            <div class="d-flex justify-content-between align-items-center border-bottom py-2">
                <div>
                    <strong>{{ $candidate->name }}</strong> - {{ $candidate->email }}
                </div>
                <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-sm btn-info">Xem hồ sơ</a>
            </div>
        @endforeach
    </div>
</div>
@endsection