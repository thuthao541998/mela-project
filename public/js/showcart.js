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

$(document).ready(function () {
    $('form[name="order-form"]').validate({
        rules: {
            ship_name: {
                required: true,
                minlength: 7
            },
            ship_address: {
                required: true,
                minlength: 7
            },
            ship_phone: {
                required: true,
                number: true,
                length: 10
            },
        },
        messages: {
            name: {
                required: "This field is required.",
                minlength: "This field has to be longer than 7 characters."
            },
            ship_address: {
                required: "This field is required.",
                minlength: "This field has to be longer than 7 characters."
            },
            ship_phone: {
                required: "This field is required.",
                number: "This field has to be numeric.",
                length: "This field has to be 10 digits long."
            },
        }
    });

    $('#submitBtn').click(function () {
        console.log();
        if ($('#checkLogin')[0].value == 0) {
            swal({
                title: "You haven't logged in yet!",
                text: "Please log in to checkout!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((ok) => {
                    window.location.href = '/client-login';
                    return false;
                });
        } else {
            $('form[name="order-form"]').submit();
        }
    })
});
