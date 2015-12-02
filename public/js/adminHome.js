


$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
$('select').material_select();
  
 $('.modal-trigger').leanModal({
      dismissible: false
  });
$('.tooltipped').tooltip({delay: 50});;
  });
var closeModalAdd = function(){
     $('#modal-add').closeModal();
      $('#formNew').trigger("reset");
}
 $('#formNew').submit(function(e){
        $("#btn-add").prop('disabled', true);
        $("#btn-cancel").prop('disabled', true);
        $("#btn-add").addClass("disabled");
        $("#btn-cancel").addClass("disabled");
        $("#btn-add").html('Guardando...');
        event.preventDefault();               
        var formData = new FormData(this);
       
        $.ajax({

            url: "mensaje",
            type: "POST",
            dataType: "html",
            data: formData,
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,            
            processData:false,
            success: function(data) {
                    $("#btn-add").prop('disabled', false);
                    $("#btn-cancel").prop('disabled', false);
                    $("#btn-add").removeClass("disabled");
                    $("#btn-cancel").removeClass("disabled");
                    $("#btn-add").html('Guardar');
                    closeModalAdd();                
                     toastr.success('Mensaje guardado', 'Éxito');                           
                }
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
               // alert('No response from server');
               console.log(""+jqXHR.responseText+"/"+ajaxOptions+"/"+thrownError);
                $("#btn-add").removeClass("disabled");
                $("#btn-add").prop('disabled', false);
                    $("#btn-cancel").prop('disabled', false);
                    $("#btn-cancel").removeClass("disabled");
                    $("#btn-add").html('Guardar');
                toastr.error('Ocurrio un error, el servidor no responde', '');                 
            });
        return false;
    });
