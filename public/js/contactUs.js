$(document).ready(function (e) {
    $('.send').click(function (e) {
        var name = $('#name').val();
        var address = $('.address').val();
        var phone = $('.phone').val();
        var email = $('.email').val();
        var info = $('.info').val();
        if (name == '') {
            $('.mustname').show();
        }
        else if (address == '') {
            $('.mustaddress').show();
            $('.mustname').hide();
        }
        else if (phone == '') {
            $('.mustphone').show();
            $('.mustaddress').hide();
        }
        else if (email == '') {
            $('.mustemail').show();
            $('.mustphone').hide();
        }
        else if (info == '') {
            $('.mustinfo').show();
            $('.mustemail').hide();
        }
        else {
            $('.mustinfo').hide();
            alert("Bạn đã gửi thành công")
        };
    });
});