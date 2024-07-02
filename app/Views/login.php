<section class="body-sign" id="userpass">
    <div class="center-sign">
        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>Iniciar Sesion</h2>
            </div>
            <div class="panel-body">
                <div id="form" class="form-horizontal">
                    <p id="respuesta"></p>
                    <section class="panel">
                        <div class="form-group mb-lg">
                            <label>Usuario</label>
                            <div class="input-group input-group-icon">
                                <input id="Usuario" name="Usuario" type="text" class="form-control input-lg" placeholder="Usuario" required />
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mb-lg">
                            <div class="clearfix">
                                <label class="pull-left">Contraseña</label>
                            </div>
                            <div class="input-group input-group-icon">
                                <input id="Password" name="Password" type="password" class="form-control input-lg" placeholder="Contraseña" required />
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="display: flex; justify-content: space-between;">
                                <a href="https://sistemasilsa.com:3670/" id="irsilsadrive" class="btn btn-primary" target="_blank">Silsa Drive</a>
                                <button class="btn btn-primary" id="botonVerificar" onclick="verificarUsuario()">Entrar</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>