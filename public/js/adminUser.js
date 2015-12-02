var table;
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
     table = $('#example2').DataTable( {
    "searching": true,
        "paging":   false,        
        "info":     false,
         "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
   $('input.global_filter').on( 'keyup click', function () {
        $('#example2').DataTable().search(
        $('#global_filter').val(),
        false,
        true
    ).draw();
    } ); 
 $('.modal-trigger').leanModal({
      dismissible: false
  });
$('.tooltipped').tooltip({delay: 50});;
  });
  
function clean(){
    $("#nombre").val("");
    $("#video").val("");
    $("#desc").val("");
    $("#activo").prop("checked", true);

}

var closeModalAdd = function(){
	 $('#modal-add').closeModal();
      $('#formNew').trigger("reset");
}


    $('#formNew').submit(function(e){ 
        toastr.clear();       
        $("#btn-addUser").prop('disabled', true);
        $("#btn-cancelUser").prop('disabled', true);
        $("#btn-addUser").addClass("disabled");
        $("#btn-cancelUser").addClass("disabled");
        $("#btn-addUser").html('Guardando...');
        event.preventDefault();
        var act=0;
        if ($("#activo").is(':checked')) {
            var act=1;
        };
        var sexo=0;
        if ($("#sexo").is(':checked')) {
            var sexo=1;
        };
        var formObj = $(this);
        var formData = new FormData(this);
         formData.append("sexo", ""+sexo);
        formData.append("activo", ""+act);
        //console.log("data"+formData);
        //var data = $(this).serialize();
        $.ajax({
            url: "usuarios",
            type: "POST",
            dataType: "html",
            data: formData,
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {
                var dato =$.parseJSON(data);
                console.log(""+dato.error+"/ "+JSON.stringify(dato.message));
                if (dato.error==0) {
                    $("#btn-addUser").prop('disabled', false);
                    $("#btn-cancelUser").prop('disabled', false);
                    $("#btn-addUser").removeClass("disabled");
                    $("#btn-cancelUser").removeClass("disabled");
                    $("#btn-addUser").html('Guardar');
                    addrow(dato.message);
                    closeModalAdd();                
                    toastr.success('Usuario asignado', 'Éxito');
                } else{
                    $("#btn-addUser").prop('disabled', false);
                    $("#btn-cancelUser").prop('disabled', false);
                     $("#btn-addUser").removeClass("disabled");
                    $("#btn-cancelUser").removeClass("disabled");
                    $("#btn-addUser").html('Guardar');
                    for(var k in dato.message) {
                        
                        toastr.options.timeOut =""+(5000*(1+k));
                        toastr.error(''+dato.message[k][0], 'Error');                       
                    }
                   
                     
                };
                                           
            }
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
               // alert('No response from server');
               console.log(""+jqXHR.responseText+"/"+ajaxOptions+"/"+thrownError);
               $("#btn-addUser").prop('disabled', false);
                    $("#btn-cancelUser").prop('disabled', false);
                $("#btn-addUser").removeClass("disabled");
                    $("#btn-cancelUser").removeClass("disabled");
                    $("#btn-addUser").html('Guardar');
                toastr.error('Ocurrio un error, el servidor no responde', '');                 
            });
        return false;
    });

function addrow(datos){
    var tipo = "Cursante";
    
        table.row.add( [
           datos.username,
            datos.nombres+" "+datos.apellido_p+" "+datos.apellido_m,
            tipo,
            '<a class="btn-floating  waves-effect waves-light blue tooltipped" data-position="bottom" data-delay="20" data-tooltip="Editar"><i class="material-icons">create</i></a><a class="btn-floating  waves-effect waves-light red tooltipped" data-position="bottom" data-delay="20" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>'
        ] ).draw( false );   
}