@extends('layouts.backend')
@section('content')
    <form action="{{ route('admin.users.create') }}" method="post">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-6">
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
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="mb-3">
                    <label for="">email</label>
                    <input type="email" name="email"
                        class="form-control   {{ $errors->has('email') ? 'is-invalid' : '' }} " placeholder="email"
                        value="{{ old('email') }}">
                </div>
                @error('email')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xl-3 col-md-3 mb-3">
                <div class="mb-3">
                    <label for="">Status</label>
                    <select id="" name="status" class="form-control">
                        <option value="0">Not Activated</option>
                        <option value="1">Active</option>
                    </select>
                </div>
                @error('status')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xl-3 col-md-3 mb-3">
                <div class="mb-3">
                    <label for="">Roles</label>
                    <select id="" name="group_id" class="form-control">
                        <option value="1">Member</option>
                        <option value="2">Admin</option>
                    </select>
                </div>
                @error('group_id')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="text" name="password"
                        class="form-control   {{ $errors->has('password') ? 'is-invalid' : '' }} " placeholder="password"
                        value="{{ old('password') }}">
                </div>
                @error('password')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xl-12 col-md-12 mb-12">
                <div class="mb-3">
                    <button class="btn btn-primary">Post Products</button>
                    <button class="btn btn-danger"><a href="{{ route('admin.products.index') }}">Back</a></button>

                </div>
            </div>
        </div>
        @csrf
    </form>
@endsection
@section('stylesheet')
@endsection
