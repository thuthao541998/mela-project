$(document).ready(function (e) {
    $('.send').click(function (e) {
        var name = $('#name').val();
        var phone = $('.phone').val();
        var email = $('.email').val();
        var message = $('.message').val();
        // Validate data
        if (name == '') {
            $('.mustname').show();
        }
        else if (phone == '') {
            $('.mustphone').show();
            $('.mustname').hide();
        }
        else if (email == '') {
            $('.mustemail').show();
            $('.mustphone').hide();
        }
        else if (message == '') {
            $('.mustmessage').show();
            $('.mustemail').hide();
        }
        else {
            $('.mustmessage').hide();
            // alert(window.location.pathname)
            //    Send Request Ajax\
            var data = {
                'name': name,
                'phone' : phone,
                'email' : email,
                'message':message
            }
            $.ajax({
                method: 'POST',
                url: window.location.href,
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'contactData': JSON.stringify(data)
                },
                success: function (resp) {
                    alert('Success');
                    console.log(resp)
                    location.href = '/';
                },
                error: function () {
                    alert('Fail')
                }
            })
        };

    });
});