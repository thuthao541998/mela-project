$('.btn-num-product-down').click(function () {
    var oldTotal = $(this).parent().parent().next().text().replace(/\,/g, '');
    if ($(this).next().val() > 1) {
        var value = $(this).next().val();
        $(this).next().val(value -= 1);
        $(this).parent().parent().next().text($(this).next().val().replace(/\,/g, '') * parseInt($(this).parent().parent().prev().text().replace(/\,/g, ''))).formatNumber();
        var currentTotal = parseInt($(this).parent().parent().next().text().replace(/\,/g, ''));
        var minus = oldTotal - currentTotal;
        var totalMoney = parseInt($('.total-money').text().replace(/\,/g, ''));
        $('.total-money').text(totalMoney - minus).formatNumber();
    }

});
$('.btn-num-product-up').click(function () {
    var oldTotal = parseInt($(this).parent().parent().next().text().replace(/\,/g, ''));
    var value = parseInt($(this).prev().val());
    $(this).prev().val(value += 1);
    $(this).parent().parent().next().text($(this).prev().val().replace(/\,/g, '') * parseInt($(this).parent().parent().prev().text().replace(/\,/g, ''))).formatNumber();
    var currentTotal = parseInt($(this).parent().parent().next().text().replace(/\,/g, ''));
    var plus = currentTotal - oldTotal;
    var totalMoney = parseInt($('.total-money').text().replace(/\,/g, '').replace(/\,/g, ''));
    $('.total-money').text(totalMoney + plus).formatNumber();
});
$(".cart_delete").click(function () {
    var id = $(this).children().attr('id').replace('delete-', '');
    var deleteTotal = parseInt($('#unit-total-' + id).text().replace(/\,/g, ''));
    var totalMoney = parseInt($('.total-money').text().replace(/\,/g, ''));
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this product",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: 'GET',
                    url: '/cart-remove/' + id,
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'id': id
                    },
                    success: function (resp) {
                        $('.total-money').text(totalMoney - deleteTotal).formatNumber();
                        swal("Poof! This product has been remove!", {
                            icon: "success",
                        });
                        $('#row-' + id).closest('tr').remove();
                        if ($('tbody').children().length == 1) {
                            setTimeout(function () {
                                window.location.reload(1);
                            }, 1 * 1000);
                        }
                        ;

                    },
                    error: function (r) {
                        console.log(r)
                    }
                });
            } else {
                swal("This product is safe!");
            }
            ;
        });
});

$('.checkout-btn').click(function () {
    if ($('input[name="ship_name"]').length < 7) {
        $('span[name="ship_name"]').html('Your name has to be longer than 7.')
    };
    if ($('input[name="ship_address"]').length < 10){
        $('span[name="ship_address"]').html('Your address has to be longer than 7.');
    };
    if (isNaN($('input[name="ship_phone"]'))){
        $('span[name="ship_phone"]').html('This field has to be number');
    } else if ($('input[name="ship_phone"]').length < 10){
        $('span[name="ship_phone"]').html('Your phone has to have 10 letters.');
    };
});
