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
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#createcategoryModel">
            Create Product
        </button>
    </div>
    <div class="card-body">
        <div id="erroor_message"></div>
        <table class="table mg-b-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Tag</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <!-- Create Category Modal -->
                <div class="modal fade" id="createcategoryModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-control-label" for="category_name">Category Name</label>
                                    <input class="form-control" type="text" name="category_name" id="category_name">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="category_tag">Category Tag</label>
                                    <input class="form-control" type="text" name="category_tag" id="category_tag">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="category_status">Category Status</label>
                                    <select class="form-control" name="category_status" id="category_status">
                                        <option value="1">Active</option>
                                        <option value="0">DeActive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="categorySave" type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Show Category Modal -->
                <div class="modal fade" id="showcategoryModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Show Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="form-control-label" for="category_name">Category Name</label>
                                    <input disabled id="showCatName" class="form-control" type="text"
                                        name="category_name" id="category_name">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="category_tag">Category Tag</label>
                                    <input disabled id="showCatTag" class="form-control" type="text" name="category_tag"
                                        id="category_tag">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="category_status">Category Status</label>
                                    <input disabled id="showCatStatus" class="form-control" type="text"
                                        name="category_status" id="category_status">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="description">Description</label>
                                    <textarea disabled class="form-control" name="description"
                                        id="showCatDescription"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Category Modal -->
                <div class="modal fade" id="editcategoryModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input id="editCatId" class="editId form-control" type="hidden">
                                <div class="form-group">
                                    <label class="form-control-label" for="category_name">Category Name</label>
                                    <input id="editCatName" class="editName form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="category_tag">Category Tag</label>
                                    <input id="editCatTag" class="editTag form-control" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="category_status">Category Status</label>
                                    <select class="editStatus form-control" id="editCatStatus">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="description">Description</label>
                                    <textarea class="editDescription form-control" id="editCatDescription"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="categoryUpdate" type="button" class="btn btn-primary">Update
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Category Modal -->
                <div class="modal fade" id="deletecategoryModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-light" id="exampleModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input class="deleteId" type="text" id="deleteCatId">
                                <h4>Are You Sure Went To Delete This Category ?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="categoryDeleteSubmit" type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('custom-script')
<script src="{{ asset('backend/js/custom.js') }}"></script>
@endsection
