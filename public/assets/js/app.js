listarCurso();
function openModalTema(data){
    $("#idAsignatura").val(data)
    $("#form-modal-tema").modal("show")
}
function openModalEditCurso(data){
    var {IdAsignatura,nombreAsig, Descripcion, objetivoAsignatura,imagen}=data;
    $("#idAsignatura-c").val(IdAsignatura)
    $("#descripcion-c").val(Descripcion);
    $("#nombre-c").val(nombreAsig);
    $("#objetivo-c").val(objetivoAsignatura);
    $("#nameImage-c").val(imagen)

    $("#form-modal-curso-edit").modal("show")

}
function openModalEditTema(data){
    var {IdTema,mapaMentallTema,imagen,nombreTema,objetivoTema}=data;
    $("#IdTema").val(IdTema)
    $("#mapa").val(mapaMentallTema);
    $("#nombre").val(nombreTema);
    $("#objetivo").val(objetivoTema);
    $("#nameImage").val(imagen)

    $("#desarrollo_url").attr("href","?url=dashboard/tema/"+IdTema)
    $("#glosario_url").attr("href","?url=dashboard/glosario/"+IdTema)
    $("#form-modal-tema-edit").modal("show")
}
function listarTema(id){
    var data=[];
    $.ajax({
        type: "GET",
        async: false, 
        url: `?url=dashboard/listtema/${id}`,
        dataType: 'json',
        success: function(resp)
        {
            data=resp;
        }
    });
    return data;
}
function listarCurso(){
    var listHtml=$("#list-curso");
    $.ajax({
        type: "GET",
        url: "?url=dashboard/listcurso",
        dataType: 'json',
        success: function(data)
        {
            html=``;
            data.forEach(item => {
                var imagen="public/assets/images/matematica.jpeg";
                if(item.imagen!=""){
                    imagen="public/assets/images/"+item.imagen;
                }

                var temas=listarTema(item.IdAsignatura);
                var temasH=`<a href="#" onclick="openModalTema(${item.IdAsignatura})" class="btn-plus">
                        <i class="fa fa-plus fa-2x"> </i>
                    </a>
                `;
                temas.forEach(el=>{
                    var dataJson=JSON.stringify(el);
                    temasH+=`<a href="#" onclick=\'openModalEditTema(${dataJson})\' class="temas">
                        ${el.nombreTema}
                    </a>`;
                })


                
                html+=`
                    <div class="col-xl-4 col-lg-12">
                    <div class="card card-chart">
                        <div class="card-header J-card-m-h" style="overflow: hidden;height: 200px;">
                            <img src="${imagen}" class="card-img" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">${item.nombreAsig}</h4>
                            <p class="card-category">
                                ${item.Descripcion}
                            </p>
                            <button class="btn btn-primary btn-full" onclick='openModalEditCurso(${JSON.stringify(item)})'>Editar</button>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                               ${temasH} 
                            </div>
                        </div>
                    </div>
                </div>
                `;
                
            });

            listHtml.html(html);
        }
    });
}

$("#form-curso").submit(function(e) {
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
            listarCurso();
            $("#form-modal").modal("hide")
            //md.showNotification('top','center',"data")
            alert("guardado"); // show response from the php script.
        }
    });
});
$("#form-tema").submit(function(e) {
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
            listarCurso();
            $("#form-modal").modal("hide")
            //md.showNotification('top','center',"data")
            alert("guardado"); // show response from the php script.
        }
    });
});
$("#form-tema-edit").submit(function(e) {
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
            listarCurso();
            $("#form-modal-tema-edit").modal("hide")
            //md.showNotification('top','center',"data")
            alert("guardado"); // show response from the php script.
        }
    });
});
$("#form-curso-edit").submit(function(e) {
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
            listarCurso();
            $("#form-modal-curso-edit").modal("hide")
            //md.showNotification('top','center',"data")
            alert("guardado"); // show response from the php script.
        }
    });
});