// var listDeleteButton = document.getElementsByClassName('btn-delete');
// for (var i = 0; i < listDeleteButton.length; i++) {
//     listDeleteButton[i].onclick = function () {
//         if(confirm('Do you really want to delete this?')){
//             var params = '_token='+$('meta[name="csrf-token"]').attr('content');
//             var currentId = this.id;
//             var xhttp = new XMLHttpRequest();
//             xhttp.open("DELETE", "" + "/admin/article/" + currentId, true);
//             xhttp.onreadystatechange = function() {
//                 if (this.readyState == 4 && this.status == 200) {
//                     alert('Delete success!');
//                     window.location.reload();
//                 }
//             };
//             xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//             xhttp.send(params);
//         }
//     }
// }
//
// for (var i = 0; i < listDeleteButton.length; i++) {
//     listDeleteButton[i].onclick = function () {
//         if(confirm('Do you really want to delete this?')){
//             var params = '_token='+$('meta[name="csrf-token"]').attr('content');
//             var currentId = this.id;
//             var xhttp = new XMLHttpRequest();
//             xhttp.open("DELETE", "" + "/admin/product/" + currentId, true);
//             xhttp.onreadystatechange = function() {
//                 if (this.readyState == 4 && this.status == 200) {
//                     alert('Delete success!');
//                     window.location.reload();
//                 }
//             };
//             xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//             xhttp.send(params);
//         }
//     }
// }

$('.btn-delete').click(function () {
    var id = $(this).closest('.row').attr('id').replace('row-item-', '');
    if (confirm('Are you sure want?')) {
        $.ajax({
            method: 'DELETE',
            url: '/admin/article/' + id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id
            },
            success: function (resp) {
                $('#messageSuccess').text('Action success!');
                $('#messageSuccess').removeClass('d-none');
                $('#row-item-' + id).remove();
                setTimeout(function () {
                    window.location.reload(1);
                }, 3 * 1000);
            },
            error: function () {
                $('#messageError').removeClass('d-none');
                $('#messageError').text('Action fails! Please try again later!');
            }
        });
    }
});