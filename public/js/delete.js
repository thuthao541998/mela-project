$('.btn-delete-article').click(function () {
    var id = $(this).closest('.row').attr('id').replace('row-item-', '');
    if (confirm('Do you really want to delete this article?')) {
        $.ajax({
            method: 'DELETE',
            url: '/admin/article/' + id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id
            },
            success: function (resp) {
                $('#messageSuccess').text('Action success!');
                $('#messageSuccess').removeClass('hidden');
                $('#row-item-' + id).remove();
                setTimeout(function () {
                    window.location.reload(1);
                }, 3 * 1000);
            },
            error: function () {
                $('#messageError').removeClass('hidden');
                $('#messageError').text('Action fails! Please try again later!');
            }
        });
    }
});

$('.btn-delete-brand').click(function () {
    var id = $(this).closest('.row').attr('id').replace('row-item-', '');
    if (confirm('Do you really want to delete this brand?')) {
        $.ajax({
            method: 'DELETE',
            url: '/admin/product/' + id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id
            },
            success: function (resp) {
                $('#messageSuccess').text('Action success!');
                $('#messageSuccess').removeClass('hidden');
                $('#row-item-' + id).remove();
                setTimeout(function () {
                    window.location.reload(1);
                }, 3 * 1000);
            },
            error: function () {
                $('#messageError').removeClass('hidden');
                $('#messageError').text('Action fails! Please try again later!');
            }
        });
    }
});

$('.btn-delete-category').click(function () {
    var id = $(this).closest('.row').attr('id').replace('row-item-', '');
    if (confirm('Do you really want to delete this category?')) {
        $.ajax({
            method: 'DELETE',
            url: '/admin/category/' + id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id
            },
            success: function (resp) {
                $('#messageSuccess').text('Action success!');
                $('#messageSuccess').removeClass('hidden');
                $('#row-item-' + id).remove();
                setTimeout(function () {
                    window.location.reload(1);
                }, 3 * 1000);
            },
            error: function () {
                $('#messageError').removeClass('hidden');
                $('#messageError').text('Action fails! Please try again later!');
            }
        });
    }
});
$('.btn-delete-product').click(function () {
    var id = $(this).closest('.row').attr('id').replace('row-item-', '');
    if (confirm('Do you really want to delete this product?')) {
        $.ajax({
            method: 'DELETE',
            url: '/admin/product/' + id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id
            },
            success: function (resp) {
                $('#messageSuccess').text('Action success!');
                $('#messageSuccess').removeClass('hidden');
                $('#row-item-' + id).remove();
                setTimeout(function () {
                    window.location.reload(1);
                }, 3 * 1000);
            },
            error: function () {
                $('#messageError').removeClass('hidden');
                $('#messageError').text('Action fails! Please try again later!');
            }
        });
    }
});