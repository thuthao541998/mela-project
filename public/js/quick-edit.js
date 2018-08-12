$('.btn-quick-edit').click(function () {
    var id = $(this).closest('.row').attr('id').replace('row-item-', '');
    $.ajax({
        method: 'GET',
        url: '/admin/article/get-json/' + id,
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (resp) {
            $('form[name="quick-edit-form"] input[name="name"]').val(resp.item.name);
            $('form[name="quick-edit-form"] input[name="price"]').val(resp.item.price);
            $('form[name="quick-edit-form"] input[name="images"]').val(resp.item.images);
            // $('form[name="quick-edit-form"] input[name="id"]').val(resp.item.id);
            // $('form[name="quick-edit-form"] img').attr('src', resp.item.images);
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
    var images = $('form[name="quick-edit-form"] input[name="images"]').val();
    var id = $('form[name="quick-edit-form"] input[name="id"]').val();
    $.ajax({
        url:'/admin/article/update-json/' + id,
        method: 'PUT',
        data:'name=' + name + '&price=' + price + '&images=' + images + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
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