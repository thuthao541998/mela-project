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
                        // console.log(resp);
                        $('.total-money').text(totalMoney - deleteTotal).formatNumber();
                        swal("Poof! This product has been remove!", {
                            icon: "success",
                        });
                        $('#row-' + id).closest('tr').remove();
                        var new_count = 0;
                        var new_total_money = 0;
                        for(var i in resp[0]){
                            new_count += parseInt(resp[0][i].quantity);
                            new_total_money += parseInt(resp[0][i].quantity) * parseInt(resp[0][i].quantity);
                        }
                        // var new_total_money = resp[1].total_money;
                        var new_items = resp[0];
                        var new_content = '';
                        for (var i in new_items) {
                            new_content += '<li class="header-cart-item">';
                            new_content += '<div class="header-cart-item-img">';
                            new_content += '<img src="' + new_items[i].product.images + '" alt="IMG">';
                            new_content += '</div>';
                            new_content += '<div class="header-cart-item-txt">';
                            new_content += '<a href="#" class="header-cart-item-name" style="color: #555;">';
                            new_content += new_items[i].product.name;
                            new_content += '</a>';
                            new_content += '<span class="header-cart-item-info">';
                            new_content += new_items[i].quantity + ' x ' + new_items[i].product.discount_price_string;
                            new_content += '</span>';
                            new_content += '</div>';
                            new_content += '</li>';
                        }
                        $('.header-cart-wrapitem').html(new_content);
                        if (new_count == undefined) {
                            $('#header-icons-noti').text(1);
                        } else {
                            $('#header-icons-noti').text(new_count);
                        }
                        $('#header-cart-total').text(new_total_money).formatNumber();
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
    $('input[name="save-changes"]').click(function () {
        var list = document.getElementsByClassName("num-product");
        for (var i = 0; i < list.length; i++) {
            // alert(isNaturalNumber(list[i].value));
            if (list[i].value <= 0 && isNaturalNumber(list[i].value) == false) {
                console.log(list[i].parentElement.nextElementSibling);
                list[i].parentElement.nextElementSibling.innerHTML = "Quantity has to be a natural number that is bigger than 0";
                return false;
            }
        }
    });

});

$('.num-product').keyup(function () {
    if ($(this).val() > 0) {
        $(this).parent().next().html('');
    }
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
            // alert(1)
            // console.log($('form[name="order-form"]'))
            document.getElementById('order-form').submit();
        }
    })
});

function isNaturalNumber(n) {
    n = n.toString(); // force the value incase it is not
    var n1 = Math.abs(n),
        n2 = parseInt(n, 10);
    return !isNaN(n1) && n2 === n1 && n1.toString() === n;
}