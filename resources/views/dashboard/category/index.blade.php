@extends('layouts.dashboard.layout')

@section('main')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<a href="{{ route('category.create') }}" class="btn btn-success">Create product</a>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col-3">Name</th>
                <th scope="col-3">Header</th>
                <th scope="col-6">Header</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <row>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-success">Show</a>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </row>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
