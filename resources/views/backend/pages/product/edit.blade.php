@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <p>Student Update</p>
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">All Product</a>
    </div>
    <div class="card-body">
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong class="d-block d-sm-inline-block-force">{{ Session::get('message') }}</div>
        @endif
        <form action="{{ route('product.update',$data->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product name: <span class="tx-danger">*</span></label>
                            <input value="{{ $data->product_name }}" class="form-control" type="text" name="product_name" placeholder="Product Name">
                            @error('product_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="product_category">
                                <option label="Choose Category"></option>
                                <option {{ $data->product_category == 'man' ? 'selected' : '' }} value="man" >Man</option>
                                <option {{ $data->product_category == 'woman' ? 'selected' : '' }} value="woman">Women</option>
                                <option {{ $data->product_category == 'baby' ? 'selected' : '' }} value="baby">Baby</option>
                                <option {{ $data->product_category == 'toy' ? 'selected' : '' }} value="toy">Toy</option>
                            </select>
                            @error('product_category')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="product_size">
                                <option label="Choose Size"></option>
                                <option {{ $data->product_size == 's' ? 'selected' : '' }} value="s">S</option>
                                <option {{ $data->product_size == 'l' ? 'selected' : '' }} value="l">L</option>
                                <option {{ $data->product_size == 'xl' ? 'selected' : '' }} value="xl">XL</option>
                                <option {{ $data->product_size == 'xxl' ? 'selected' : '' }} value="xxl">XXL</option>
                            </select>
                            @error('product_size')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Cost: <span class="tx-danger">*</span></label>
                            <input value="{{ $data->product_cost }}" class="form-control" type="number" name="product_cost" placeholder="Cost Price">
                            @error('product_cost')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Product Sell: <span class="tx-danger">*</span></label>
                            <input value="{{ $data->product_sell }}"  class="form-control" type="number" name="product_sell" placeholder="Sell Price">
                            @error('product_sell')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-8 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Quntity: <span class="tx-danger">*</span></label>
                            <input value="{{ $data->product_sell }}" class="form-control" type="number" name="product_quentity" placeholder="Quntity">
                            @error('product_quentity')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-8 -->
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" name="description" >{{ $data->description }}</textarea>
                        </div>
                    </div><!-- col-8 -->
                    <div class="form-layout-footer">
                        <button class="ml-3 btn btn-info">Update Product</button>
                    </div><!-- form-layout-footer -->
                </div>
            </div>
        </form>
    </div>
    @endsection
