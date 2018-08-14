// Article
$('.btn-quick-edit').click(function () {
    var id = $(this).closest('.row').attr('id').replace('row-item-', '');
    $.ajax({
        method: 'GET',
        url: '/admin/article/get-json/' + id,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (resp) {
            $('form[name="quick-edit-form"] input[name="title"]').val(resp.item.title);
            $('form[name="quick-edit-form"] input[name="author"]').val(resp.item.author);
            $('form[name="quick-edit-form"] textarea[name="content"]').val(resp.item.content);
            // $('form[name="quick-edit-form"] img').attr('src', resp.item.images);
            // $('form[name="quick-edit-form"] input[name="images"]').val(resp.item.images);
        },
        error: function () {
            alert('error');
        }
    });
    $('#modal-edit').modal();
    return false;
});

$('#btn-update-changes').click(function () {
    var name = $('form[name="quick-edit-form"] input[name="title"]').val();
    var author = $('form[name="quick-edit-form"] input[name="author"]').val();
    var content = $('form[name="quick-edit-form"] textarea[name="content"]').val();
    // var images = $('form[name="quick-edit-form"] input[name="images"]').val();
    $.ajax({
        url:'/admin/article/update-json/' + id,
        method: 'PUT',
        data:'title=' + name + '&title=' + author + '&content=' + content + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
        success: function (resp) {
            alert('success');
        },
        error: function (xhr) {
            switch (xhr.status) {
                case 422:
                    alert(xhr.responseJSON.message);
            }
        }
    });
});



// Product
$('.btn-quick-edit').click(function () {
    var id = $(this).closest('.row').attr('id').replace('row-item-', '');
    $.ajax({
        method: 'GET',
        url: '/admin/product/get-json/' + id,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (resp) {
            $('form[name="quick-edit-form"] input[name="name"]').val(resp.item.name);
            $('form[name="quick-edit-form"] input[name="price"]').val(resp.item.price);
            $('form[name="quick-edit-form"] textarea[name="overview"]').val(resp.item.overview);
        },
        error: function () {
            alert('error');
        }
    });
    $('#modal-edit').modal();
    return false;
});

$('#btn-update-changes').click(function () {
    var name = $('form[name="quick-edit-form"] input[name="name"]').val();
    var price = $('form[name="quick-edit-form"] input[name="price"]').val();
    var overview = $('form[name="quick-edit-form"] textarea[name="overview"]').val();
    var id = $('form[name="quick-edit-form"] input[name="id"]').val();
    $.ajax({
        url:'/admin/product/update-json/' + id,
        method: 'PUT',
        data:'name=' + name + '&price=' + price + '&overview=' + overview + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
        success: function (resp) {
            alert('success');
        },
        error: function (xhr) {
            switch (xhr.status) {
                case 422:
                    alert(xhr.responseJSON.message);
            }
        }
    });
});