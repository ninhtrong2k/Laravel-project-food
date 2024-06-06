@extends('layouts.backend')
@section('content')
    <form action="{{ route('admin.categories.create') }}" method="post">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-12">
                <div class="mb-3">
                    <label for="">Name</label>
                    <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} "
                        placeholder="Tên" value="{{ old('name') }}">
                </div>
                @error('name')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xl-12 col-md-12 mb-12">
                <div class="mb-3">
                    <button class="btn btn-primary">Save Category</button>
                    <button class="btn btn-danger"><a href="{{ route('admin.categories.index') }}">Back</a></button>

                </div>
            </div>
        </div>
        @csrf
    </form>
@endsection
@section('stylesheet')
@endsection
