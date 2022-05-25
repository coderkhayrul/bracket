@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <p>Item Create</p>
        <a href="{{ route('item.index') }}" class="btn btn-sm btn-primary">All Item</a>
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
        <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Item Name: <span class="tx-danger">*</span></label>
                            <input value="{{ old('item_name') }}" class="form-control" type="text" name="item_name" placeholder="Item Name">
                            @error('item_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Item Image: <span class="tx-danger">*</span></label>
                            <input id="upload_image" class="form-control" type="file" name="item_image">
                            @error('item_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Gallery Image: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="gallery_image[]" multiple>
                            @error('gallery_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-12 d-flex">
                        <div class="form-group mg-b-10-force m-auto">
                            <label class="form-control-label">Image Preview:</label>
                            <img id="preview-image" style="width: 200px; height: 200px" src="{{ asset('backend/default/thumbnail-default.png') }}" alt="">
                        </div>
                    </div><!-- col-8 -->
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" name="item_description" id=""></textarea>
                        </div>
                    </div><!-- col-8 -->
                    <div class="form-layout-footer">
                        <button class="ml-3 btn btn-info">Create Product</button>
                    </div><!-- form-layout-footer -->
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $('#upload_image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
            $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    </script>
    @endsection
