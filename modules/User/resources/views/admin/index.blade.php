@extends('layouts.backend')
@section('content')
    <p><a href="{{ route('admin.users.create') }}" class="btn btn-primary">Thêm Mới</a></p>
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <div class="card mb-4">
        <div class="card-body">
            <table id="data-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            @include('parts.backend.delete')
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            new DataTable('#data-table', {
                ajax: '{!! route('admin.users.data') !!}',
                processing: true,
                serverSide: true,

                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'created_at'
                    },
                    {
                        data: 'edit'
                    },
                    {
                        data: 'delete'
                    }
                ]
            });
        });
    </script>
@endsection
