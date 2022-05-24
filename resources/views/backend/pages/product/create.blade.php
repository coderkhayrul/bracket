@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <p>Product Create</p>
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">All Product</a>
    </div>
    <div class="card-body">
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong class="d-block d-sm-inline-block-force">{{ Session::get('message') }}</strong>
            </div>
        @endif
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product name: <span class="tx-danger">*</span></label>
                            <input value="{{ old('product_name') }}" class="form-control" type="text" name="product_name" placeholder="Product Name">
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
                                <option value="man">Man</option>
                                <option value="woman">Women</option>
                                <option value="baby">Baby</option>
                                <option value="toy">Toy</option>
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
                                <option value="s">S</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
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
                            <input class="form-control" type="number" name="product_cost" placeholder="Cost Price">
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
                            <input class="form-control" type="number" name="product_sell" placeholder="Sell Price">
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
                            <input class="form-control" type="number" name="product_quentity" placeholder="Quntity">
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
                            <textarea class="form-control" name="description" id=""></textarea>
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
