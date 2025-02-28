@extends('layouts.main')

@section('title', 'Chỉnh sửa hồ sơ')

@section('content')
<h2>Chỉnh sửa hồ sơ</h2>

<form action="{{ route('profile.update', $user_data->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">First Name:</label>
        <input type="text" class="form-control" id="" name="name" value="{{ $user_data->name }}" required>
    </div>
    
</form>
@endsection
