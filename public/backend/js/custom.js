$(document).ready(function () {
    categoryAll();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Category Create
    $('#categorySave').click(function (e) {
        e.preventDefault();
        var category_name = $('#category_name').val();
        var category_tag = $('#category_tag').val();
        var category_status = $('#category_status').val();
        var description = $('#description').val();
        $.ajax({
            url: "category",
            type: "POST",
            dataType: "json",
            data: {
                category_name: category_name,
                category_tag: category_tag,
                category_status: category_status,
                description: description
            },
            success: function (response) {
                $('#erroor_message').append('<div class="alert alert-success" role="alert">Category Create Successfully</div>');
                $('#erroor_message').fadeOut(3000);
                $('#createcategoryModel').modal('hide');
                $('#createcategoryModel').find('input').val('');
                $('#createcategoryModel').find('textarea').val('');
                categoryAll();

            }
        });
    });

    // FCategory Show
    jQuery(document).on('click', '#categoryShow', function(e){
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: "category/show/"+id,
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status == '404') {
                    jQuery('.erroor_message').html("<div class='alert alert-primary' role='alert'>Category Not Found! </div>");
                }else{
                    $('#showCatName').val(response.data.name);
                $('#showCatTag').val(response.data.tag);
                if (response.data.status == '1') {
                    $('#showCatStatus').val('Active');
                } else {
                    $('#showCatStatus').val('Deactive');
                }
                $('#showCatDescription').val(response.data.description);
                }
            }
        });
    });

    // Category Edit
    jQuery(document).on('click', '#categoryEdit', function(e){
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: "category/edit/"+id,
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status == '404') {
                    jQuery('.erroor_message').html("<div class='alert alert-primary' role='alert'>Category Not Found! </div>");
                }else{
                    $('#editCatId').val(response.data.id);
                    $('#editCatName').val(response.data.name);
                    $('#editCatTag').val(response.data.tag);
                    $('#editCatStatus').val(response.data.status);
                    $('#editCatDescription').val(response.data.description);
                }
            }
        });
    });

    // Category Update
    jQuery(document).on('click', '#categoryUpdate', function(e){
        e.preventDefault();
        var category_id = $('.editId').val();
        var category_name = $('.editName').val();
        var category_tag = $('.editTag').val();
        var category_status = $('.editStatus').val();
        var description = $('.editDescription').val();

        $.ajax({
            url: "category/update/"+category_id,
            type: "POST",
            data: {
                'category_id' : category_id,
                'category_name' : category_name,
                'category_tag' : category_tag,
                'category_status' : category_status,
                'category_description' : description,
            },
            dataType: "json",
            success: function (response) {
                console.log(response.data);
                if (response.status == '400') {
                    jQuery('.erroor_message').html("<div class='alert alert-success' role='alert'>Category Update Failed! </div>");
                }else{
                    $('#editcategoryModel').modal('hide');
                    $('#editcategoryModel').find('input').val('');
                    $('#editcategoryModel').find('textarea').val('');
                    categoryAll();
                }
            }
        });
    });

    // Get Category Id For Delete
    jQuery(document).on('click', '#categoryDelete', function(e){
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: "category/edit/"+id,
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.status == '404') {
                    jQuery('.erroor_message').html("<div class='alert alert-primary' role='alert'>Category Not Found! </div>");
                }else{
                    $('#deleteCatId').val(response.data.id);
                }
            }
        });
    });


    // Category Delete
    jQuery(document).on('click', '#categoryDeleteSubmit', function(e){
        e.preventDefault();
        var id = $('.deleteId').val();
        $.ajax({
            url: "category/delete/"+id,
            type: "GET",
            dataType: "json",
            success: function (response) {
                console.log(response.data);
                if (response.status == '400') {
                    jQuery('.erroor_message').html("<div class='alert alert-success' role='alert'>Category Delete Failed! </div>");
                }else{
                    console.log(response.message);
                    $('#deletecategoryModel').modal('hide');
                    $('#deletecategoryModel').find('input').val('');
                    categoryAll();
                }
            }
        });
    });

    // Get All Category Function
    function categoryAll() {
        $.ajax({
            url: "category/alldata",
            type: "GET",
            dataType: "json",
            success: function (response) {
                var sl = 1;
                $('#tbody').html('');
                $.each(response.data, function (key, item) {
                    $('#tbody').append('<tr>\
                            <th scope="row">' + item.id + '</th>\
                            <td>' + item.name + '</td>\
                            <td>\
                                <div class="badge badge-primary">' + item.tag + '</div>\
                            </td>\
                            <td>\
                                <div class="badge badge-success">Active</div>\
                            </td>\
                            <td>' + item.description + '</td>\
                            <td class="text-center">\
                            <button value="' + item.id + '" id="categoryShow" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#showcategoryModel"><i class="icon ion-eye"></i></button>\
                            <button value="' + item.id + '" id="categoryEdit" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editcategoryModel"><i class="icon ion-edit"></i></button>\
                            <button value="' + item.id + '" id="categoryDelete" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deletecategoryModel"><i class="fa fa-trash"></i></button>\
                            </td>\
                        </tr>');
                });

            }
        });
    }

});
