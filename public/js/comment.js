$('.post-comment').click(function () {
    var product_id = $(this).prev().val();
    var user_id = $(this).prev().prev().val();
    var content = $(this).prev().prev().prev().val();
    $.ajax({
        method : 'POST',
        url :'/post-comment',
        data : {
            'product_id' : product_id,
            'user_id' : user_id,
            'content' :content,
            '_token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (resp) {


        },
        error: function (r) {
            console.log(r);
        }
    })

});
