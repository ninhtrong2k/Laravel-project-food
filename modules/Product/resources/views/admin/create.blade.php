@extends('layouts.backend')
@section('content')
    <form action="{{ route('admin.products.create') }}" method="post">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="mb-3">
                    <label for="">Name</label>
                    <input name="name" type="text"
                        class="form-control title {{ $errors->has('name') ? 'is-invalid' : '' }} " placeholder="Tên"
                        value="{{ old('name') }}">
                </div>
                @error('name')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug"
                        class="form-control slug  {{ $errors->has('slug') ? 'is-invalid' : '' }} " placeholder="slug"
                        value="{{ old('slug') }}">
                </div>
                @error('slug')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xl-3 col-md-3 mb-3">
                <div class="mb-3">
                    <label for="">Category</label>
                    <select id="" name="category_id" class="form-control">
                        @if ($categories)
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('category_id') == $item->id ? 'selected' : false }}>{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                @error('category_id')
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
                    <label for="">Quantity</label>
                    <input type="text" name="quantity"
                        class="form-control   {{ $errors->has('quantity') ? 'is-invalid' : '' }} " placeholder="Quantity"
                        value="{{ old('quantity') }}">
                </div>
                @error('quantity')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xl-3 col-md-3 mb-3">
                <div class="mb-3">
                    <label for="">Price</label>
                    <input type="text" name="price"
                        class="form-control   {{ $errors->has('price') ? 'is-invalid' : '' }} " placeholder="price"
                        value="{{ old('price') }}">
                </div>
                @error('price')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="mb-3">
                    <label for="">Image</label>
                    <div class="input-group">
                        <input id="image" type="text" name="image"
                            class="form-control   {{ $errors->has('image') ? 'is-invalid' : '' }} " placeholder="image"
                            value="{{ old('image') }}">
                        <button id="lfm" type="button" data-input="image"
                            class="btn btn-primary btn-choose-file">choose</button>
                    </div>
                </div>
                @error('image')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xl-6 col-md-6 mb-6">
                <div class="mb-3">
                    <label for="">Perview image</label>
                    <p>_________</p>
                </div>
            </div>
            <div class="col-xl-12 col-md-12 mb-12">
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea id="" name="description" class="ckeditor" cols="30" rows="5">{{ old('description') }}</textarea>
                </div>
                @error('description')
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
