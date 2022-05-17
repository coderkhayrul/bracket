@extends('layouts.admin_layout')
@section('admin-content')
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
                        <a href="#" class="btn btn-sm btn-info"><i class="icon ion-eye"></i></a>
                        <a href="#" class="btn btn-sm btn-primary"><i class="icon ion-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
