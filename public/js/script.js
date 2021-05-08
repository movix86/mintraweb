$(document).ready(function() {
    $('.text-editor').richText();
});

function delete_date(url='', id=''){
    //alert(url + id);
    var path_delete = url + id;
    var elemento = document.getElementById('delete');
    elemento.setAttribute('href', path_delete);

}

function show_data_file(url='', sizes = ''){
    //alert(url);
    var data_show = document.getElementById('file-visor');
    var file = '/storage/' + url;
    var p = sizes;

    data_show.innerHTML = '<strong>Url:</strong> ' + '/storage/' + url + '<br>' + '<strong>Peso:</strong> ' + p;


}

