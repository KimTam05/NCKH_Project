@extends('layouts.main')

@section('title', 'Danh sách việc làm')

@section('content')
<h2>Danh sách việc làm</h2>
<table border="1" width="100%" cellpadding="10">
    <thead>
        <tr>
            <th>Tiêu đề</th>
            <th>Công ty</th>
            <th>Hạn nộp</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $job)
        <tr>
            <td>{{ $job->job_title }}</td>
            <td>{{ $job->postedBy->name }}</td>
            <td>{{ $job->date_expired }}</td>
            <td><a href="{{ route('jobs.show', $job->id) }}">Xem</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection