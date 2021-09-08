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

    data_show.innerHTML = '<strong>Url:</strong> ' + '/storage/medios/' + url + '<br>' + '<strong>Peso:</strong> ' + p;

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

//FILE
// Add the following code if you want the name of the file appear on select
$(".url_path_image_course_btn").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

