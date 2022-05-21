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
        <p>All Product</p>
        <a href="{{ route('product.create') }}" class="btn btn-sm btn-success">Create Product</a>
    </div>
    <div class="card-body">
        <table class="table mg-b-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Size</th>
                    <th>Cost Price</th>
                    <th>Sell Price</th>
                    <th>Quntity</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sl = 1; ?>
                @foreach ($products as $data)
                <tr>
                    <th scope="row">{{ $sl++ }}</th>
                    <td>{{ $data['product_name'] }}</td>
                    <td>{{ $data['product_category'] }}</td>
                    <td>{{ $data['product_size'] }}</td>
                    <td>{{ $data['product_cost'] }}</td>
                    <td>{{ $data['product_sell'] }}</td>
                    <td>{{ $data['product_quentity'] }}</td>
                    <td class="text-center">
                        <a href="{{ route('product.show',$data->id) }}" class="btn btn-sm btn-info"><i class="icon ion-eye"></i></a>
                        <a href="{{ route('product.edit',$data->id) }}" class="btn btn-sm btn-primary"><i class="icon ion-edit"></i></a>
                        {{-- <a href="{{ route('product.destroy',$data->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> --}}
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Are You Sure Went To Delete This Product?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{ route('product.destroy',$data->id) }}" class="btn btn-danger">Delete</a>
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
