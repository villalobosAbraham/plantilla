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
        <div class="row" style="margin: 10px 15px; overflow-x: none;">
            <table class="table table-bordered table-striped mb-none" id="tablaEntradaCompra">
                <thead>
                <tr>
                    <th></th>
                    <th>Orden de compra</th>
                    <th>maquinaria</th>
                    <th>Obra</th>
                    <th>Proveedor</th>
                    <th>Estado de entrega</th>
                    <th>Factura</th>
                    <th>Observaciones</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
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

    $(document).ready(function() {
        obtenerUsuarios();
    });

    function obtenerUsuarios() {
        $.post(ruta + "HOMObtenerUsuarios", {

        }).done(function(data) {
            data = $.parseJSON(data);
            if (data) {
                
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });
    }

</script>