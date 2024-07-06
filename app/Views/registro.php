<section class="panel" id="panelEntrada">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
        <h2 class="panel-title">Usuarios</h2>
    </header>
    <div class="panel-body">
        <div class="row" style="margin: 10px 0px; gap: 10px;">
            <button id="datosproveedor" href="#datosprov" class="btn btn-primary modal-with-form" onclick="abrirModalCrearUsuario()">Agregar Usuario <i class="fa fa-user-plus"></i></button>
            <button id="entrada" class="btn btn-primary" onclick="abrirModalEditarUsuario()">Editar Usuario <i class="fa fa-pencil" aria-hidden="true"></i> </button>
            <button id="verdetalle" class="btn btn-primary" onclick="abrirModalEliminarUsuario()">Eliminar Usuario <i class="fa fa-user-times"></i></button>
        </div>
        <div class="row" style="margin: 10px 15px; overflow-x: none; min-width: 99%">
            <table class="table table-bordered table-striped mb-none" id="tablaUsuarios" style="width: 99%; min-width: 99%">
                <thead>
                <tr>
                    <th></th>
                    <th>Usuario</th>
                    <th>fecha Registro</th>
                    <th>Estado</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="modalproveedor" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="tituloModal" class="panel-title">Datos del proveedor</h2>
            </div>
            <div class="modal-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label text-right">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text" id="nombreprov" name="nombreprov" class="form-control" readonly="readonly" placeholder="nombre Proveedor" value="" required="">
                    </div>
                </div>  
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label text-right">RFC:</label>
                    <div class="col-sm-9">
                        <input type="text" id="rfcprov" name="rfcprov" class="form-control" readonly="readonly" placeholder="rfc Proveedor" value="" required="">
                    </div>
                </div> 
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label text-right">Correo:</label>
                    <div class="col-sm-9">
                        <input type="text" id="correoprov" name="correoprov" class="form-control" readonly="readonly" placeholder="correo Proveedor" value="" required="">
                    </div>
                </div> 
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label text-right">Dias de crédito:</label>
                    <div class="col-sm-9">
                        <input type="text" id="diascreditoprov" name="diascreditoprov" class="form-control" readonly="readonly" placeholder="dias de crédito Proveedor" value="" required="">
                    </div>
                </div> 
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label text-right">Telefono:</label>
                    <div class="col-sm-9">
                        <input type="text" id="telefonoprov" name="telefonoprov" class="form-control" readonly="readonly" placeholder="telefono Proveedor" value="" required="">
                    </div>
                </div> 
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label text-right">Contacto:</label>
                    <div class="col-sm-9">
                        <input type="text" id="contactoprov" name="contactoprov" class="form-control" readonly="readonly" placeholder="contacto Proveedor" value="" required="">
                    </div>
                </div> 
            </div>
            <br>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button data-dismiss="modal" id="modalCancelar" class="btn btn-default" >Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let ruta = "<?php echo base_url() ?>";
    
    document.addEventListener("DOMContentLoaded", function() {
        $('#tablaUsuarios').DataTable({
            "pageLength": 10,
            "lengthChange": false,
            "destroy": true,
            "drawCallback": function() {
                var radioButton = $(this).find("input:radio[name=opcionUsuario]").first();
                radioButton.prop("checked", true); //marca automaticamente el primer valor que aparece en la tabla
            },
            "autoWidth": true,
            "scrollY": "",
        });
        obtenerUsuarios();
    });


    function obtenerUsuarios() {
        $.post(ruta + "HOMObtenerUsuarios", {

        }).done(function(data) {
            data = $.parseJSON(data);
            if (data) {
                $("#tablaUsuarios").DataTable().clear().draw();
                let tabla = $("#tablaUsuarios").DataTable();
                
                $(data).each((index, elemento) => {
                    let action = "<input type='radio' checked='true' id='opcionOrden' name='opcionOrden' value='" + elemento.idusuario +"'>";
                    let estado = prepararEstadoUsuario(elemento.activo);
                    
                    let fila = tabla.row.add([
                        action,
                        elemento.usuario,
                        elemento.fecharegistro,
                        estado
                    ]).draw().node();
                });
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });
    }

    function prepararEstadoUsuario(activo) {
        if (activo == "S") {
            return "Habilitado";
        } else {
            return "Deshabilitado"
        }
    }

</script>