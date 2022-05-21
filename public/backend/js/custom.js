$(document).ready(function () {
    categoryAll();
    function categoryAll() {
        $.ajax({
            url: "category/alldata",
            type: "GET",
            dataType: "json",
            success: function (response) {
                var sl = 1;
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
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete">\
                                    <i class="fa fa-trash"></i>\
                                </button>\
                            </td>\
                        </tr>');
                });

            }
        });
    }


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
                $('#createcategoryModel').modal('hide');
                $('#createcategoryModel').find('input').val('');
                $('#createcategoryModel').find('textarea').val('');
                categoryAll();
            }
        });
    });


    // For Show
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

    // For Edit
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
                    $('#editCatName').val(response.data.name);
                    $('#editCatTag').val(response.data.tag);
                    $('#editCatStatus').val(response.data.status);
                    $('#editCatDescription').val(response.data.description);
                }
            }
        });
    });



});
