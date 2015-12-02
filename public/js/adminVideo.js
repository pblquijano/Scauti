
   var table = $('#example').DataTable( {
    "searching": true,
        "paging":   false,        
        "info":     false,
         "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
   $('input.global_filter').on( 'keyup click', function () {
        $('#example').DataTable().search(
        $('#global_filter').val(),
        false,
        true
    ).draw();
    } );
 
 $('.modal-trigger').leanModal({
      dismissible: false
  });
    $('.tooltipped').tooltip({delay: 50});
function clean(){
    $("#nombre").val("");
    $("#video").val("");
    $("#desc").val("");
    $("#activo").prop("checked", true);

}

var closeModalAdd = function(){
	 $('#modal-add').closeModal();
      $('#formNew2').trigger("reset");
}
function progress(evt) {
    console.log('updateProgress');
    if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            console.log(percentComplete);
    } else {
            // Unable to compute progress information since the total size is unknown
            console.log('unable to complete');
    }
}

    $('#formNew2').submit(function(e){
        $("#btn-addVideo").prop('disabled', true);
        $("#btn-cancelVideo").prop('disabled', true);
        $("#btn-addVideo").addClass("disabled");
        $("#btn-cancelVideo").addClass("disabled");
        $("#btn-addVideo").html('Guardando...');
        event.preventDefault();
        var act=0;
        if ($("#activo").is(':checked')) {
            var act=1;
        };
        var formObj = $(this);
        var formData = new FormData(this);
       
        formData.append("activo", ""+act);
        console.log("data"+formData);
        //var data = $(this).serialize();
        $.ajax({

            url: "../../curso",
            type: "POST",
            dataType: "html",
            data: formData,
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            xhr: function() {  // custom xhr
                myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // check if upload property exists
                    myXhr.upload.addEventListener('progress',progress, false); // for handling the progress of the upload
                }
                return myXhr;
            },
            processData:false,
            success: function(data) {
                    $("#btn-addVideo").prop('disabled', false);
                    $("#btn-cancelVideo").prop('disabled', false);
                    $("#btn-addVideo").removeClass("disabled");
                    $("#btn-cancelVideo").removeClass("disabled");
                    $("#btn-addVideo").html('Guardar');
                    closeModalAdd();                
                     toastr.success('Video guardado', 'Éxito');                           
                }
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
               // alert('No response from server');
               console.log(""+jqXHR.responseText+"/"+ajaxOptions+"/"+thrownError);
                $("#btn-addVideo").prop('disabled', false);
                    $("#btn-cancelVideo").prop('disabled', false);
                $("#btn-addVideo").removeClass("disabled");
                    $("#btn-cancelVideo").removeClass("disabled");
                    $("#btn-addVideo").html('Guardar');
                toastr.error('Ocurrio un error, el servidor no responde', '');                 
            });
        return false;
    });

   

    
    //var bar = $('.bar');
    //var percent = $('.percent');
    //var status = $('#status');
       
    
