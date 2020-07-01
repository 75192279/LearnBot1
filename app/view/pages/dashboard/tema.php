
<?php require ROUT_APP.'/view/pages/dashboard/partials/header.php'; ?>
<?php require ROUT_APP.'/view/pages/dashboard/partials/nav.php';?>
  <div class="content">
    <div class="container-fluid">
        <h1 id="temaNombre">

        </h1>
        <div class="J-color-clare">
            <div id="editor">
            </div>
            <button type="button" onclick="saved()" class="btn btn-primary pull-right">Guardar </button>

        </div>
          
      </div>
    </div>
  </div>
  <div class="modal" id="form-modal-upload" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Subir imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="container" enctype="multipart/form-data" id="form-upload" action="?url=dashboard/uploadarchive">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <input type="file" id="file" name="file" accept="image/gif, image/jpeg, image/png" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Subir </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>

            </div>
        </div>
    </div>
<?php require ROUT_APP.'/view/pages/dashboard/partials/footer.php'; ?>
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    var URLactual = window.location.href;
    var urls=URLactual.split("/")
    var id=urls[urls.length-1];
    var idDesarrollo='';
    var quill = new Quill('#editor', {
        modules: {
            toolbar:{   
                container:[
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    ['image', 'link'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'font': [] }],
                    [{ 'align': [] }],
                ],
                handlers: {
                    image: imageHandler
                }
            }
            
        },
        placeholder: 'Compose an epic...',
        theme: 'snow'  // or 'bubble'
    });
    


    var range=null;
    function imageHandler() {
        range = this.quill.getSelection();
        $("#form-modal-upload").modal('show');
    }

    $("#form-upload").submit(function(e) {
        e.preventDefault(); 
        var form = $(this);
        var url = form.attr('action');
        
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                form[0].reset();
                upload("public/assets/images/"+data.data);
                $("#form-modal-upload").modal('hide');                
            }
        });
        
    });
    function upload(val){
        var value = val;
        this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
    }
    function saved(){
        var data=$("#editor .ql-editor").html();
        $.ajax({
            type: "POST",
            url: "?url=dashboard/createdesarrollo",
            dataType:'json',
            data:  {body:data,id:id,idDesarrollo:idDesarrollo},
            contentType:'application/x-www-form-urlencoded',
            traditional: true,
            success: function(data)
            {
                alert("guardado");
                
                $("#form-modal-upload").modal('hide');                
            }
        });
    }

    list();
    function list(){
        var data=[];
        $.ajax({
            type: "GET",
            async: false, 
            url: `?url=dashboard/desarrollo/${id}`,
            dataType: 'json',
            success: function(resp)
            {
                var {desarrollo,tema}=resp;
                if(desarrollo){
                    idDesarrollo=desarrollo.IdDesarrollo;
                    $("#editor .ql-editor").html(desarrollo.body)
                    $("#temaNombre").html(tema.nombreTema);
                }
            }
        });
        return data;
    }
</script>