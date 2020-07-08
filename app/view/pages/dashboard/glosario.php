
<?php require ROUT_APP.'/view/pages/dashboard/partials/header.php'; ?>
<?php require ROUT_APP.'/view/pages/dashboard/partials/nav.php';?>
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="dropdown show-dropdown">
                    <a href="#" data-toggle="modal" data-target="#form-modal-glosario">
                        <i class="fa fa-plus fa-2x"> </i>
                    </a>
                </div>
            </div>
            <div class="row col-lg-12" id="list-glosario">
                
            </div>
        </div>
    </div>
  </div>
    <div class="modal" id="form-modal-glosario" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registar Glosario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="container" enctype="multipart/form-data" id="form-glosario" action="?url=dashboard/createglosario">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Titulo</label>
                                <input name="titulo" id="titulo-insert" type="text" class="form-control J-color-b">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Definicion</label>
                                <input name="descripcion" id="descripcion-insert" type="text" class="form-control J-color-b">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>

            </div>
        </div>
    </div>
    <div class="modal" id="form-modal-glosario-edit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Glosario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="container" enctype="multipart/form-data" id="form-glosario-edit" action="?url=dashboard/updateglosario">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Titulo</label>
                                <input id="titulo-update" name="titulo" type="text" class="form-control J-color-b">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Definicion</label>
                                <input id="descripcion-update" name="descripcion" type="text" class="form-control J-color-b">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id-glosario">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
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
    var idGlosario='';


    var range=null;
    $("#form-glosario").submit(function(e) {
        e.preventDefault(); 
        var form = $(this);
        var url = form.attr('action');
        
        var titulo=$('#titulo-insert').val()
        var descripcion=$('#descripcion-insert').val()
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: {titulo:titulo,descripcion:descripcion,id:id},
            contentType:'application/x-www-form-urlencoded',
            success: function(data)
            {
                form[0].reset();
                $("#form-modal-glosario").modal('hide');  
                listGlosario();              
            }
        }); 
    });
    $("#form-glosario-edit").submit(function(e) {
        e.preventDefault(); 
        var form = $(this);
        var url = form.attr('action');
        
        $.ajax({
            type: "POST",
            url: url,
            data:  new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                form[0].reset();
                $("#form-modal-glosario-edit").modal('hide');  
                listGlosario();              
            }
        });
        
    });
    function openModalEditGlosario(data){
        var {TituloGlosario, DefinicionGlosario, IdGlosario}=data;
        $("#descripcion-update").val(DefinicionGlosario);
        $("#titulo-update").val(TituloGlosario);
        $("#id-glosario").val(IdGlosario)

        $("#form-modal-glosario-edit").modal("show")
    }
    
    listGlosario();
    function listGlosario(){
        var listHtml=$("#list-glosario");

        $.ajax({
            type: "GET",
            async: false, 
            url: `?url=dashboard/glosarios/${id}`,
            dataType: 'json',
            success: function(resp)
            {
                var {glosario,tema}=resp;
                if(glosario){
                    var html='';
                    glosario.forEach((item)=>{
                        html+=`
                        <div class="col-xl-4 col-lg-12">
                            <div class="card card-chart">
                                <div class="card-body">
                                    <h4 class="card-title">${item.TituloGlosario}</h4>
                                    <p class="card-category">
                                        ${item.DefinicionGlosario}
                                    </p>
                                    <button class="btn btn-primary btn-full" onclick='openModalEditGlosario(${JSON.stringify(item)})'>Editar</button>
                                </div>
                            </div>
                        </div>
                        `;
                    })
                    listHtml.html(html);
                    // $("#temaNombre").html(tema.nombreTema);
                }
            }
        });
    }
</script>