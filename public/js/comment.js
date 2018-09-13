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
            console.log(resp);
            var comments = '';
            for (var i in resp) {
                comments += '<div class="col-sm-8">';
                comments += '<div class="panel panel-white post panel-shadow">';
                comments += '<div class="post-heading">';
                comments += '<div class="pull-left">'
                comments += '<div class="image text-center p-t-15 avatar" style="background-color: #fcb1ae">'+resp[i].user_first_char+'</div>';
                comments += '</div>';
                comments += '<div class="pull-left meta m-l-30">';
                comments += '<div class="userName title h5">'
                comments += '<b>'+resp[i].user_comment+'</b>';
                comments += ' made a review'
                comments += '</div>';
                comments += '<h6 class="text-muted time">'+resp[i].created_at+'</h6>'
                comments += '</div>';
                comments += '</div>';
                comments += '</div>';
                comments += '<div class="post-description">';
                comments += '<p>' + resp[i].content + '</p>'
                comments += '</div>';
                comments += '</div>';
                comments += '</div>';

            }
            $('.comments').html(comments);
            var content = $(this).prev().prev().prev().val('');


        },
        error: function (r) {
            console.log(r);
        }
    })

});
