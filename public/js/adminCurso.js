$(document).ready(function() {
   /* $('#example').DataTable( {
        "paging":   false,        
        "info":     false
    });*/
   
} );
var myid=0;
 $('.modal-trigger').leanModal({
      dismissible: false
  });
    $('.tooltipped').tooltip({delay: 50});
function setid(id){
 myid=id;
 console.log(""+myid);
}

var closeModalAdd = function(){
	 $('#modal-add').closeModal();
      $('#formNew').trigger("reset");
}
var closeModalDel = function(){
     $('#modal-del').closeModal();
      $('#formDel').trigger("reset");
}


    $('#formNew').on('submit', function(event) {
        $("#btn-addCurso").prop('disabled', true);
        $("#btn-cancelCurso").prop('disabled', true);
        $("#btn-addCurso").addClass("disabled");
        $("#btn-cancelCurso").addClass("disabled");
        $("#btn-addCurso").html('Guardando...');
        event.preventDefault();
        var act=0;
        var tipo=0;
        if ($("#activo").is(':checked')) {
            var act=1;
        };
         if ($("#tipo").is(':checked')) {
            var tipo=1;
        };
        var formData = new FormData(document.getElementById("formNew"));
        formData.append("activo", ""+act);
        formData.append("tipo", ""+tipo);
        //var data = $(this).serialize();
        $.ajax({
            url: "cursos",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                    $("#btn-addCurso").prop('disabled', false);
                    $("#btn-cancelCurso").prop('disabled', false);
                    $("#btn-addCurso").removeClass("disabled");
                    $("#btn-cancelCurso").removeClass("disabled");
                    $("#btn-addCurso").html('Guardar');
                    closeModalAdd();                
                     toastr.success('Curso asignado', 'Éxito');                           
                }
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
               // alert('No response from server');
               console.log(""+jqXHR.responseText+"/"+ajaxOptions+"/"+thrownError);
                 $("#btn-addCurso").prop('disabled', false);
                    $("#btn-cancelCurso").prop('disabled', false);
                $("#btn-addCurso").removeClass("disabled");
                    $("#btn-cancelCurso").removeClass("disabled");
                    $("#btn-addCurso").html('Guardar');
                toastr.error('Ocurrio un error, el servidor no responde', '');                 
            });
        return false;
    });

$('#formDel').on('submit', function(event) {
            $("#btn-addCurso2").prop('disabled', true);
            $("#btn-cancelCurso2").prop('disabled', true);
            $("#btn-addCurso2").addClass("disabled");
            $("#btn-cancelCurso2").addClass("disabled");
            $("#btn-addCurso2").html('Eliminando...');
            $.ajax({
            url: "cursos/eliminar",
            type: "post",
           
            data: {id: myid},
            
            success: function(data) {
                    $("#btn-addCurso2").prop('disabled', false);
                    $("#btn-cancelCurso2").prop('disabled', false);
                    $("#btn-addCurso2").removeClass("disabled");
                    $("#btn-cancelCurso2").removeClass("disabled");
                    $("#btn-addCurso2").html('Eliminar');
                    closeModalDel();                
                     toastr.success('Curso eliminado', 'Éxito');                           
                }
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
               // alert('No response from server');
               console.log(""+jqXHR.responseText+"/"+ajaxOptions+"/"+thrownError);
                $("#btn-addCurso2").prop('disabled', false);
                $("#btn-cancelCurso2").prop('disabled', false);
                $("#btn-addCurso2").removeClass("disabled");
                $("#btn-cancelCurso2").removeClass("disabled");
                $("#btn-addCurso2").html('Eliminar');
                toastr.error('Ocurrio un error, el servidor no responde', '');                 
            });
        return false;
    });

