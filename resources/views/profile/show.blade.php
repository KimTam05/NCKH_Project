@extends('layouts.main')

@section('title', 'Hồ sơ cá nhân')

@section('content')
<h2>Hồ sơ cá nhân</h2>
<p><strong>Email:</strong> {{ Auth::user()->email }}</p>
<p><strong>Số điện thoại:</strong> {{ Auth::user()->phone }}</p>
<p><strong>Kinh nghiệm:</strong> {{ Auth::user()->experience }} năm</p>
<a href="{{ route('profile.edit') }}">Chỉnh sửa hồ sơ</a>
@endsection