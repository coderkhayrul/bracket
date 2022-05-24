@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <p>Sub Category Create</p>
        <a href="{{ route('sub-category.index') }}" class="btn btn-sm btn-primary">All Sub Category</a>
    </div>
    <div class="card-body">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong class="d-block d-sm-inline-block-force">{{ Session::get('success') }}</strong>
            </div>
        @endif
        <form action="{{ route('sub-category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">name: <span class="tx-danger">*</span></label>
                            <input value="{{ old('sub_cat_name') }}" class="form-control" type="text" name="sub_cat_name" placeholder="Sub Category Name">
                            @error('sub_cat_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="category_id">
                                <option label="Choose Category"></option>
                                @foreach ($categories as $data)
                                <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="sub_cat_image">
                            @error('sub_cat_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-6 -->
                    <div class="col-lg-6 d-flex">
                        <div class="row form-group mg-b-10-force m-auto">
                            <img style="width:100px" src="{{ asset('backend/default/no-image.png') }}" alt="Image">
                        </div>
                    </div><!-- col-6 -->
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" name="sub_cat_description" id=""></textarea>
                        </div>
                    </div><!-- col-8 -->
                    <div class="form-layout-footer">
                        <button class="ml-3 btn btn-info">Create Product</button>
                    </div><!-- form-layout-footer -->
                </div>
            </div>
        </form>
    </div>
    @endsection
