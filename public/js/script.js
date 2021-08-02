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
    var p = 'Peso sugerido no mas de 3mb';

    data_show.innerHTML = '<strong>Url:</strong> ' + '/storage/' + url + '<br>' + '<strong>Peso:</strong> ' + p;

}
//MODAL PARA ELIMINAR USURIO
function btn_services(state){
    if (state == 1) {

        document.getElementById('modal-uni').style.display = "block";
    }
    if(state == 0){

        document.getElementById('modal-uni').style.display = "none";
    }
}

//BUSCADOR DE NOTICIAS, ESTE DESACTUVA LA CAJA DE FILTROS
function myFunction(){


        $val = document.getElementById('buscador-noticias').value;

    if($val != ''){
        document.getElementById('result').style.display = "none";
    }else{
        document.getElementById('result').style.display = "block";
    }
}

