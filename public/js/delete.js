var listDeleteButton = document.getElementsByClassName('btn-delete');
for (var i = 0; i < listDeleteButton.length; i++) {
    listDeleteButton[i].onclick = function () {
        if(confirm('Do you really want to delete this?')){
            var params = '_token='+$('meta[name="csrf-token"]').attr('content');
            var currentId = this.id;
            var xhttp = new XMLHttpRequest();
            xhttp.open("DELETE", "" + "/admin/article/" + currentId, true);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert('Delete success!');
                    window.location.reload();
                }
            };
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(params);
        }
    }
}

for (var i = 0; i < listDeleteButton.length; i++) {
    listDeleteButton[i].onclick = function () {
        if(confirm('Do you really want to delete this?')){
            var params = '_token='+$('meta[name="csrf-token"]').attr('content');
            var currentId = this.id;
            var xhttp = new XMLHttpRequest();
            xhttp.open("DELETE", "" + "/admin/product/" + currentId, true);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert('Delete success!');
                    window.location.reload();
                }
            };
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(params);
        }
    }
}