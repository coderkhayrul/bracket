@extends('layouts.admin_layout')
@section('admin-content')
@if (Session::has('message'))
    <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong class="d-block d-sm-inline-block-force">{{ Session::get('message') }}</strong>
    </div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <p>All Sub Category</p>
        <a href="{{ route('sub-category.create') }}" class="btn btn-sm btn-success">Create Sub Category</a>
    </div>
    <div class="card-body">
        <table class="table mg-b-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sl = 1; ?>
                @foreach ($subCategory as $data)
                <tr>
                    <th scope="row">{{ $sl++ }}</th>
                    <td>
                        @if ($data->sub_cat_image)
                            <img id="main-preview-image" src="{{ asset('backend/uploads/subcategory/'.$data->sub_cat_image) }}" alt="sub category" class="img-fluid rounded" width="50">
                        @else
                            <img id="main-preview-image" src="{{ asset('backend/default/no-image.png') }}" alt="image" class="img-fluid rounded" width="80"/>
                        @endif
                    </td>
                    <td>{{ $data['category_id'] }}</td>
                    <td>{{ $data['sub_cat_name'] }}</td>
                    <td>{{ $data['sub_cat_description'] }}</td>
                    <td>
                        @if ($data['sub_cat_status'] == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">DeActive</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="" class="btn btn-sm btn-info"><i class="icon ion-eye"></i></a>
                        <a href="" class="btn btn-sm btn-primary"><i class="icon ion-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#SubCatdelete{{ $data['sub_cat_id'] }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <!-- Sub Category Delete Modal -->
                <div class="modal fade" id="SubCatdelete{{ $data['sub_cat_id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Sub Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Are You Sure Went To Delete This Product?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{ route('sub-category.delete',$data['sub_cat_id']) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
