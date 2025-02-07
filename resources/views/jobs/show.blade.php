@extends('layouts.main')

@section('title', $job->job_title)

@section('content')
<h2>{{ $job->job_title }}</h2>
<p><strong>Công ty:</strong> {{ $job->postedBy->name }}</p>
<p><strong>Mô tả công việc:</strong></p>
<p>{{ $job->description }}</p>
<p><strong>Hạn nộp hồ sơ:</strong> {{ $job->date_expired }}</p>
<a href="#" class="btn">Ứng tuyển</a>
@endsection