@extends('layouts.backend')
@section('content')
    <div class="col-xl-6 col-md-6 mb-6">
        <div class="mb-6">
            <label for="">Name</label>
            <input name="name" type="text" class="form-control title {{ $errors->has('name') ? 'is-invalid' : '' }} "
                placeholder="Tên" value="{{ old('name') }}">
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-6">
        <div class="mb-3">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control slug  {{ $errors->has('slug') ? 'is-invalid' : '' }} "
                placeholder="slug" value="{{ old('slug') }}">
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-6">
        <div class="mb-6">
            <label for="">Category</label>
            <select id="" name="category" class="form-control">
                <option value="food">Food</option>
            </select>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-6">
        <div class="mb-3">
            <label for="">Quantity</label>
            <input type="text" name="quantity" class="form-control   {{ $errors->has('quantity') ? 'is-invalid' : '' }} "
                placeholder="Quantity" value="{{ old('quantity') }}">
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-6">
        <div class="mb-3">
            <label for="">Image</label>
            <div class="input-group">
                <input type="text" name="image" class="form-control   {{ $errors->has('image') ? 'is-invalid' : '' }} "
                    placeholder="image" value="{{ old('image') }}">
                <button id="lfm-video" type="button" data-input="image_url" class="btn btn-primary btn-choose-file">choose</button>
            </div>
        </div>
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
            <textarea name="description"  class="ckeditor"  id="" cols="30" rows="5">{{old('description')}}</textarea>
        </div>
    </div>
    <div class="col-xl-12 col-md-12 mb-12">
        <div class="mb-3">
           <button class="btn btn-primary">Post Products</button>
        </div>
    </div>
@endsection
@section('stylesheet')
@endsection