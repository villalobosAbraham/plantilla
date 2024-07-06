<section class="body-sign" id="userpass">
    <div class="center-sign">
        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>Iniciar Sesion</h2>
            </div>
            <div class="panel-body">
                <div id="form" class="form-horizontal">
                    <section class="panel">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuario:</label>
                            <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp" placeholder="Ingresa tu correo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña:</label>
                            <input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
                        </div>
                        <button class="btn btn-primary" style="margin-top: 10px;" onclick="iniciarSesion();">Enviar</button>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let ruta = "<?php echo base_url() ?>";
    let regContraseña = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d._-]{8,}$/;

    function mensajeErrorComprobacion(mensaje) {
        Swal.fire({
            title: "<h2>" + mensaje + "</h2>",
            icon: "error"
        });
    }

    function mensajeError(mensaje) {
        Swal.fire({
            position: "top-end",
            icon: "error",
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

    function iniciarSesion() {
        let datosGenerales = prepararDatosIniciarSesion();
        $.post(ruta + "HOMIniciarSesion", {
            datosGenerales : datosGenerales
        }).done(function(data) {
            data = $.parseJSON(data);
            if (data) {
                mensajeFunciono("Sesion Iniciada Correctamente");
                irRegistro();
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });
    }

    function prepararDatosIniciarSesion() {
        let usuario = $("#usuario").val();
        let contraseña = $("#contraseña").val();

        let datosGenerales = {
            usuario : usuario,
            contraseña : contraseña,
        };

        return datosGenerales;
    }

    function irRegistro() {
        window.location.href = ruta + "registro";
    }
    
</script>