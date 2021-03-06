$(".b").toolbar({
    content: '#toolbar-options',
    position: 'left',
    style: 'danger',
    event: 'click',
    adjustment:110,
    hideOnClick:true
});

/*  Area de funciones Ajax de las interfaz de gestion de registros de investigadores....
 *  Autor: Azael Ponce
 *  Fecha Creacion: 09-09-2018          Fecha ultima edicion: 09-09-2018
 */




function enviarSelect(e){
    $('#busqueda').prop('disabled',true);
    e.form.submit();
}

$(function () {
    var url=$('#busqueda').attr('url');
    var opcion=$('#opcion').val();
    var array=[];
    $.ajax({
        type: "get",
        url: url,
        data: {opcion:opcion},
        success: function( data )
        {
            console.log(data);
            $.each(data,function (index,value) {
                array.push(value.rt_nombre_persona);
            });

            if (array.length >1){
                $('#busqueda').autocomplete({
                    source: array
                });
            }else {
                $('#busqueda').val('');
                $('#busqueda').prop('disabled',true);
            }

        }
    });
});

function formulario() {
    if ($('#busqueda').attr('disabled')){

    }else{
        $('#busqueda').removeClass('is-invalid');

        var txt=$('#busqueda').val();
        if(txt.length < 4 || txt==null ){
            $('#busqueda').addClass('is-invalid')
        }else {
            $('#frm-tip').submit();
        }
    }

}



