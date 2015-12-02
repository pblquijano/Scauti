$("#myloader").hide();
 $('.modal-trigger').leanModal({
      dismissible: false
  });
    $('.tooltipped').tooltip({delay: 50});
     $("#formNew").validationEngine();
function clean(){

}

var closeModalAdd = function(){
	 $('#modal-login').closeModal();
      $('#formNew').trigger("reset");
}


    $('#formNew').on('submit', function(event) {
        toastr.clear();
        if($("#username").val() != "" && $("#password").val() != ""){
        $("#btn-login").prop('disabled', true);
        $("#btn-cancel").prop('disabled', true);  
        $("#btn-login").addClass("disabled");
        $("#btn-cancel").addClass("disabled");
        $("#btn-login").html('Guardando...');
        event.preventDefault();
       
        var formData = new FormData(document.getElementById("formNew"));
        //formData.append("activo", ""+act);
        $.ajax({
            url: "login",
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
                  
                    if(dato.error!=1){
                      $("#btn-login").prop('disabled', false);
                      $("#btn-cancel").prop('disabled', false);
                        $("#btn-login").removeClass("disabled");
                        $("#btn-cancel").removeClass("disabled");
                        $("#btn-login").html('Guardar');

                         setTimeout(function() { redirect(dato.tipo); }, 3000);
                         closeModalAdd();
                         $("#myloader").show();              
                         toastr.success('Iniciando sesión', 'Bienvenido'); 
                    }else{
                       $("#btn-login").prop('disabled', false);
                      $("#btn-cancel").prop('disabled', false);
                         $("#btn-login").removeClass("disabled");
                        $("#btn-cancel").removeClass("disabled");
                        $("#btn-login").html('Guardar');                                    
                          toastr.error('Datos de acceso incorrectos', 'Error');
                    }
                                              
                }
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
               // alert('No response from server');
               console.log(""+jqXHR.responseText+"/"+ajaxOptions+"/"+thrownError);
                 $("#btn-login").prop('disabled', false);
                      $("#btn-cancel").prop('disabled', false);
                $("#btn-login").removeClass("disabled");
                    $("#btn-cancel").removeClass("disabled");
                    $("#btn-login").html('Guardar');
                toastr.error('Ocurrio un error, el servidor no responde', 'Error');                 
            });
      }
        return false;

    });

function redirect(tipo){
  if(tipo>0){
    window.location.replace("inicio");
  }else{
     window.location.replace("admin");
  }
       
    }