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
                <h2 id="tituloModal" class="panel-title">Agregar Usuario</h2>
            </div>
            <div class="modal-body">
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label text-right">Usuario:</label>
                    <div class="col-sm-9">
                        <input type="text" id="nombreUsuario" class="form-control" placeholder="Nombre Usuario">
                    </div>
                </div>  
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label text-right">Contraseña:</label>
                    <div class="col-sm-9">
                        <input type="text" id="contraseñaUsuario" class="form-control" placeholder="Contraseña">
                    </div>
                </div> 
                <div class="form-group mt-lg">
                    <label class="col-sm-3 control-label text-right">Estado:</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="estado">
                            <option value="S">Habilitado</option>
                            <option value="N">Deshabilitado</option>
                        </select>
                    </div>
                </div> 
            </div>
            <br>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary" onclick="comprobarUsuarioAgregar()">Agregar</button>
                        <button data-dismiss="modal" id="modalCancelar" class="btn btn-default" >Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let ruta = "<?php echo base_url() ?>";
    let regContraseña = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

    function mensajeErrorComprobacion(mensaje) {
        Swal.fire({
            title: "<h2>" + mensaje + "</h2>",
            icon: "error"
        });
    }

    function mensajeError(mensaje) {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "<h1>" + mensaje + "</h1>",
            showConfirmButton: false,
            timer: 1500
        });
    }

    function mensajeFunciono(mensaje) {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "<h1>" + mensaje + "</h1>",
            showConfirmButton: false,
            timer: 1500
        });
    }
    
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
                    ]);
                });
                tabla.draw();
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

    function abrirModalCrearUsuario() {
        $("#nombreUsuario, #contraseñaUsuario").val("").text("");
        $("#estado").val("S");
        $("#modalproveedor").modal("show");
    }

    function comprobarUsuarioAgregar() {
        let usuario = $("#nombreUsuario").val();
        let contraseña = $("#contraseñaUsuario").val();

        if (!regContraseña.test(contraseña)) {
            mensajeErrorComprobacion("Contraseña Invalida<br>8 Caracteres<br>1 Mayúscula<br>1 Minúscula<br>1 Numero");
            return;
        } else if (usuario.length < 5) {
            mensajeErrorComprobacion("Usuario Invalido<br>Minimo 5 Caracteres");
            return;
        }

        agregarUsuario(usuario, contraseña);
    }

    function agregarUsuario(usuario, contraseña) {
        let datosGenerales = prepararDatosGeneralesAgregarUsuario(usuario, contraseña);

        $.post(ruta + "HOMAgregarUsuario", {
            datosGenerales : datosGenerales
        }).done(function(data) {
            data = $.parseJSON(data);
            if (data) {
                mensajeFunciono("Usuario Agregado Correctamente");
                $("#modalproveedor").modal("hide");
                obtenerUsuarios();
            } else {
                mensajeError("Fallo al Agregar el Usuario");
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });
    }

    function prepararDatosGeneralesAgregarUsuario(usuario, contraseña) {
        let estado = $("#estado").val();

        let datosGenerales = {
            usuario : usuario,
            contraseña : contraseña,
            estado : estado,
        }   

        return datosGenerales;
    }

</script>