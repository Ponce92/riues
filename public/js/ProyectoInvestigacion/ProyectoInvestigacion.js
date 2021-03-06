
$("#area").change();

function verificarSelcArea(campo){
    var c=($('select[name="area"] option:selected').text());


    if (c.trim()=='Otra area del conocimiento'){
        $('#area-c').prop('disabled',false);
    }else {
        $('#area-c').prop('disabled', true);
    }
}

$("#tipoFuente").change();

function verificarSelcFF(campo){
    var c=($('select[name="tipoFuente"] option:selected').text());


    if (c.trim()=='13'){
        $('#fuente-f').prop('disabled',false);
    }else {
        $('#fuente-f').prop('disabled', true);
    }
}

$(function () {
   $('#ff').datepicker({
        dateFormat:"dd-mm-yy",
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        changeMonth: true,
        changeYear: true,
   });
    $('#fi').datepicker({
        dateFormat:"dd-mm-yy",
        monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        changeMonth: true,
        changeYear: true,
    });
});

/*
    |           Funciones de jquery ui  ......................................
 */

$(function () {
    $('#form-tabs').tabs();
    $( "#selectable" ).selectable({
        selected:function (event,ui) {

            var clase=ui.selected;
            var clc=clase.id;
            alert(clc);

            $('#idInconoTxt').val(clc);
            $('#iconDestini').removeClass();
            $('#iconDestini').removeAttr('name');

            $('#iconDestini').attr('name',clc);

            $('#iconDestini').addClass(clc);
            $('#iconDestini').addClass('fa-5x');
            $('#colorIcon').prop('selectedIndex',0);
        }
    });
});

/*
 Funcion que reconstruye el valor que se ha selecionado en el selectable de ui....

 Funcionamiento: Se obtiene el valor del atributo nombre  que es el icono que se ha seleccionado en el selectable
                 luego se resetea el div y se agrega el valor que tenia anteriormente
                 y se agrega la clase que corresponde al color seleccionado....

 */

$('#colorIcon').on('change',function () {
    var divv=$('#iconDestini');
    var ant=divv.attr('name');

    var color = $('option:selected', $('#colorIcon')).attr("name");


    // var c=$('#selectable').selectable('option');

    divv.removeClass();

    divv.addClass(ant);
    $('#iconDestini').addClass('fa-5x');
    divv.addClass(color);

});
