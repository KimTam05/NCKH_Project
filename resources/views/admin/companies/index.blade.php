@extends('layouts.admin')

@section('title', 'Danh sách công ty')

@section('content')
<div class="container">
    <h2>Danh sách công ty</h2>
    <a href="{{ route('admin.companies.create') }}" class="btn btn-primary mb-3">Thêm công ty mới</a>
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>Tên công ty</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{ $company->company_name }}</td>
                    <td>{{ $company->company_email }}</td>
                    <td>{{ $company->company_website_url }}</td>
                    <td>
                        <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection