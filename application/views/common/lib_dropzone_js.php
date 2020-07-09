<script>
    Dropzone.autoDiscover=false;
    $("div#dropzone").dropzone({ 
      init:function() {
        this.on('thumbnail',function(file) {
          if(file.accepted !== false) {
            if(file.width >= 1600 && file.height >= 1060) {
              file.acceptDimensions();
            } else {
              file.rejectDimensions();
            }
          }
        });
      },
      accept: function(file,done) {
        file.acceptDimensions=done;
        file.rejectDimensions=function() {
          done('La imagen debe tener al menos 1600 x 1060 píxeles');
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
      url:$('#urlinsertImg').val(),
      params: {
        name:'foto-tour-'
      },
    });
</script>    