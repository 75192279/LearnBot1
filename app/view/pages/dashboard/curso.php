
<?php require ROUT_APP.'/view/pages/dashboard/partials/header.php'; ?>
<?php require ROUT_APP.'/view/pages/dashboard/partials/nav.php';?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="modal" data-target="#form-modal">
                    <i class="fa fa-plus fa-2x"> </i>
                </a>
            </div>
        </div>
        <div class="row" id="list-curso">
            
        </div>
          
      </div>
    </div>
  </div>
    <div class="modal" id="form-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registar curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="container" enctype="multipart/form-data" id="form-curso" action="?url=dashboard/createcurso">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombre</label>
                                <input name="nombre" type="text" class="form-control J-color-b">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Descripcion</label>
                                <input name="descripcion" type="text" class="form-control J-color-b">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Objetivo</label>
                                <input name="objetivo" type="text" class="form-control J-color-b">
                            </div>
                        </div>
                        <div class="col-md-12">
                                <input type="file" name="file" accept="image/gif, image/jpeg, image/png" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Crear</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </form>

            </div>
        </div>
    </div>
    <div class="modal" id="form-modal-tema" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar tema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="container" enctype="multipart/form-data" id="form-tema" action="?url=dashboard/createtema">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombre</label>
                                <input name="nombre" type="text" class="form-control J-color-b">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Objetivo</label>
                                <input name="objetivo" type="text" class="form-control J-color-b">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Mapa</label>
                                <input name="mapa" type="text" class="form-control J-color-b">
                            </div>
                        </div>
                        <div class="col-md-12">
                                <input type="file" name="file" accept="image/gif, image/jpeg, image/png" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <input name="idAsignatura" type="hidden" id="idAsignatura">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Agregar </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </form>

            </div>
        </div>
    </div>

    <div class="modal" id="form-modal-tema-edit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar tema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="container" enctype="multipart/form-data" id="form-tema-edit" action="?url=dashboard/edittetema">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="">Nombre</label>
                                    <input id="nombre"  name="nombre" type="text" class="form-control J-color-b">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="">Objetivo</label>
                                    <input id="objetivo" name="objetivo" type="text" class="form-control J-color-b">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="">Mapa</label>
                                    <input id="mapa" name="mapa" type="text" class="form-control J-color-b">
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <input type="file" id="file" name="file" accept="image/gif, image/jpeg, image/png" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <input name="idTema" type="hidden" id="IdTema">
                            <input name="nameImage" type="hidden" id="nameImage">
                        </div>
                        <div class="col-md-6">

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="?url=dashboard/tema" id="desarrollo_url" class="btn btn-primary pull-right">Desarrollo</a>
                    <button type="submit" class="btn btn-primary pull-right">Editar </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </form>

            </div>
        </div>
    </div>

    <div class="modal" id="form-modal-curso-edit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="container" enctype="multipart/form-data" id="form-curso-edit" action="?url=dashboard/editcurso">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="">Nombre</label>
                                    <input id="nombre-c"  name="nombre" type="text" class="form-control J-color-b">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="">Descripcion</label>
                                    <input id="descripcion-c" name="descripcion" type="text" class="form-control J-color-b">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="">Objetivo</label>
                                    <input id="objetivo-c" name="objetivo" type="text" class="form-control J-color-b">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <input type="file" id="file" name="file" accept="image/gif, image/jpeg, image/png" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <input name="idAsignatura" type="hidden" id="idAsignatura-c">
                            <input name="nameImage" type="hidden" id="nameImage-c">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Editar </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </form>

            </div>
        </div>
    </div>
<?php require ROUT_APP.'/view/pages/dashboard/partials/footer.php'; ?>