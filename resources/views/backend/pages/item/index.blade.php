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
        <p>All Item</p>
        <a href="{{ route('item.create') }}" class="btn btn-sm btn-success">Create Item</a>
    </div>
    <div class="card-body">
        <table class="table mg-b-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sl = 1; ?>
                @foreach ($items as $data)
                <tr>
                    <th scope="row">{{ $sl++ }}</th>
                    <td>
                        @if ($data->item_image)
                            <img src="{{ asset('backend/uploads/item/'.$data->item_image) }}" alt="Itam Image" class="img-fluid rounded" width="50">
                        @else
                            <img src="{{ asset('backend/default/no-image.png') }}" alt="image" class="img-fluid rounded" width="80"/>
                        @endif
                    </td>
                    <td>{{ $data['item_name'] }}</td>
                    <td>{{ $data['item_description'] }}</td>
                    <td class="text-center">
                        <a href="{{ route('item.edit',$data->item_code) }}" class="btn btn-sm btn-primary"><i class="icon ion-edit"></i></a>
                        {{-- <a href="{{ route('product.destroy',$data->item_id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> --}}
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->item_code }}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="delete{{ $data->item_code }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Item Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Are You Sure Went To Delete This Product?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{ route('item.delete',$data->id) }}" class="btn btn-danger">Delete</a>
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
