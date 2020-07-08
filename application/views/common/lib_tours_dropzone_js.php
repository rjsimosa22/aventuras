<script>
    Dropzone.autoDiscover=false;
    $("div#dropzone").dropzone({ 
      autoQueue: false,
        init:function() {
            this.on('thumbnail', function(file) {
              if (file.accepted !== false) {
                if (file.width < 1600 || file.height < 1060) {
                  file.rejectDimensions();
                }
                else {
                  file.acceptDimensions();
                }
              }
            });
        },
        accept: function(file,done) {
            file.acceptDimensions=done;
            file.rejectDimensions=function() {
              done('La imagen debe tener al menos 1600 x 1060 píxeles de tamaño.');
            };
            if(file.size <= '2097152') {
                if(file.type!="image/jpeg") {
                    done("Error! La imagen debe ser JPG o JPEG");
                } else {
                    done("")
                }
            } else {
                done("Error! La imagen debe tener un peso menor a 2MB");
            }
        },
        url:$('#urlinsertImg').val()
    });
</script>