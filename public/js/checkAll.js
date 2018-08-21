$('#check-all').click(function () {
    $('.check-item').prop('checked', $(this).is(':checked'));
});
$('#btn-apply-product').click(function () {
    var value = ($('select[name="select-action"]').val());
    switch (value){
        case '0':
            alert('Please choose an action before click "Apply".');
            break;
        case '1':
            var arrayId = [];
            $('.check-item:checked').each(function(index, item) {
                arrayId.push(item.closest('.row').id.replace('row-item-', ''));
            });
            if(arrayId.length == 0){
                alert('Please choose at least 1 item.');
                return;
            }
            if (confirm('Are you sure want to delete these product?')) {
                $.ajax({
                    method: 'DELETE',
                    url: '/admin/product/destroy-many',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'ids': arrayId
                    },
                    success: function (resp) {
                        $('#messageSuccess').text('Action success!');
                        $('#messageSuccess').removeClass('hidden');
                        for (var i = 0; i < arrayId.length; i++) {
                            $('#row-item-' + arrayId[i]).remove();
                        }
                        if($('.check-item').length == 0){
                            setTimeout(function(){
                                window.location.reload(1);
                            }, 2*1000);
                        }
                    },
                    error: function (r) {
                        console.log(r);
                        $('#messageError').removeClass('hidden');
                        $('#messageError').text('Action fails! Please try again later!');
                    }
                });
            }
            break;
        case '2':
            alert('Coming soon! Please try again later.');
            break;
        default:
            alert('Invalid action! Please try again');
            break;
    }
})

$('#btn-apply-article').click(function () {
    switch ($('#select-action').val()){
        case '0':
            alert('Please choose an action before click "Apply".');
            break;
        case '1':
            var arrayId = [];
            $('.check-item:checked').each(function(index, item) {
                arrayId.push(item.closest('.row').id.replace('row-item-', ''));
            });
            if(arrayId.length == 0){
                alert('Please choose at least 1 item.');
                return;
            }
            if (confirm('Are you sure want to delete these product?')) {
                $.ajax({
                    method: 'DELETE',
                    url: '/admin/article/destroy-many',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'ids': arrayId
                    },
                    success: function (resp) {
                        $('#messageSuccess').text('Action success!');
                        $('#messageSuccess').removeClass('hidden');
                        for (var i = 0; i < arrayId.length; i++) {
                            $('#row-item-' + arrayId[i]).remove();
                        }
                        if($('.check-item').length == 0){
                            setTimeout(function(){
                                window.location.reload(1);
                            }, 3*1000);
                        }
                    },
                    error: function () {
                        $('#messageError').removeClass('hidden');
                        $('#messageError').text('Action fails! Please try again later!');
                    }
                });
            }
            break;
        case '2':
            alert('Coming soon! Please try again later.');
            break;
        default:
            alert('Invalid action.');
            break;
    }
});

$('#btn-apply-category').click(function () {
    switch ($('#select-action').val()){
        case '0':
            alert('Please choose an action before click "Apply".');
            break;
        case '1':
            var arrayId = [];
            $('.check-item:checked').each(function(index, item) {
                arrayId.push(item.closest('.row').id.replace('row-item-', ''));
            });
            if(arrayId.length == 0){
                alert('Please choose at least 1 item.');
                return;
            }
            if (confirm('Are you sure want to delete these product?')) {
                $.ajax({
                    method: 'DELETE',
                    url: '/admin/category/destroy-many',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'ids': arrayId
                    },
                    success: function (resp) {
                        $('#messageSuccess').text('Action success!');
                        $('#messageSuccess').removeClass('hidden');
                        for (var i = 0; i < arrayId.length; i++) {
                            $('#row-item-' + arrayId[i]).remove();
                        }
                        if($('.check-item').length == 0){
                            setTimeout(function(){
                                window.location.reload(1);
                            }, 3*1000);
                        }
                    },
                    error: function () {
                        $('#messageError').removeClass('hidden');
                        $('#messageError').text('Action fails! Please try again later!');
                    }
                });
            }
            break;
        case '2':
            alert('Coming soon! Please try again later.');
            break;
        default:
            alert('Invalid action.');
            break;
    }
});

$('#btn-apply-brand').click(function () {
    switch ($('#select-action').val()){
        case '0':
            alert('Please choose an action before click "Apply".');
            break;
        case '1':
            var arrayId = [];
            $('.check-item:checked').each(function(index, item) {
                arrayId.push(item.closest('.row').id.replace('row-item-', ''));
            });
            if(arrayId.length == 0){
                alert('Please choose at least 1 item.');
                return;
            }
            if (confirm('Are you sure want to delete these product?')) {
                $.ajax({
                    method: 'DELETE',
                    url: '/admin/brand/destroy-many',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'ids': arrayId
                    },
                    success: function (resp) {
                        $('#messageSuccess').text('Action success!');
                        $('#messageSuccess').removeClass('hidden');
                        for (var i = 0; i < arrayId.length; i++) {
                            $('#row-item-' + arrayId[i]).remove();
                        }
                        if($('.check-item').length == 0){
                            setTimeout(function(){
                                window.location.reload(1);
                            }, 3*1000);
                        }
                    },
                    error: function () {
                        $('#messageError').removeClass('hidden');
                        $('#messageError').text('Action fails! Please try again later!');
                    }
                });
            }
            break;
        case '2':
            alert('Coming soon! Please try again later.');
            break;
        default:
            alert('Invalid action.');
            break;
    }
});


