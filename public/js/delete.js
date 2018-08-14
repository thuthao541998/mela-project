var listDeleteButton = document.getElementsByClassName('btn-delete');
for (var i = 0; i < listDeleteButton.length; i++) {
    listDeleteButton[i].onclick = function () {
        if(confirm('Do you really want to delete this?')){
            var params = '_token={{csrf_token()}}';
            var currentId = this.id;
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "" +
                "/admin/article/" + currentId, true);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 10 && this.status == 200) {
                    alert('Delete success!');
                    window.location.reload();
                }
            };
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(params);
        }
    }
}
