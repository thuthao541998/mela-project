$('.add-to-cart').click(function () {
    var product_id = $(this).attr('id').replace('add-cart-', '');
    var quantity = 1;
    $.ajax({
        url: '/api-add-to-cart',
        method: 'post',
        data: {
            id: product_id,
            quantity: quantity,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (resp) {
            console.log(resp);
            var new_count = resp.cart.count;
            var new_total_money = resp.cart.total_money;
            var new_items = resp.cart.items;
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
                new_content += new_items[i].quantity + ' x ' + new_items[i].product.dicountPriceString;
                new_content += '</span>';
                new_content += '</div>';
                new_content += '</li>';
            }
            if(new_count == undefined){
                $('#header-icons-noti').text(1);
            }else{
                $('#header-icons-noti').text(new_count);
            }

            $('#header-cart-wrapitem').html(new_content);
            $('#header-cart-total').text(new_total_money);
            // import swal from 'sweetalert';
            swal('Successfully!', 'ADDED TO CART. You can change the quantity of the product in cart later!', 'success');
        },
        error: function (error) {
            swal('FAILED', JSON.parse(error.responseText).msg);
        }
    });
});