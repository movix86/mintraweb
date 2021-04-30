$(document).ready(function() {
    $('.text-editor').richText();
});

function delete_date(url='', id=''){
    //alert(url + id);
    var path_delete = url + id;
    var elemento = document.getElementById('delete');
    elemento.setAttribute('href', path_delete);

}

