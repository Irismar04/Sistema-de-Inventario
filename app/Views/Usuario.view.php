
<main>
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp;</h3>
    </div>
        <div class="panel-body">
                <form>
            <fieldset>
    <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
                                <div class="container-fluid">
                                    <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group label-floating">
            <label class="control-label">Cedula *</label>
<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="cedula" required="" maxlength="30">
                        </div>
                        </div>
                            <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
        <label class="control-label">Nombre *</label>
<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                        </div>
                        </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
    <label class="control-label">Apellido *</label>
    <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                                                        </div>
                                                        </div>
                                <div class="col-xs-12 col-sm-6">
                        <div class="form-group label-floating">
    <label class="control-label">Teléfono</label>
<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
                                                        </div>
                                                        
                                                        <div class="col-xs-12">
                                        <div class="form-group label-floating">
    <label class="control-label">Dirección</label>
<textarea name="direccion-reg" class="form-control" rows="2" maxlength="100"></textarea>

<br>
                                            <label for="genero">Género:</label>
  <select id="genero" name="genero" class="form-control" required>
    <option value="">Seleccione</option>
    <option value="masculino">Masculino</option>
    <option value="femenino">Femenino</option>
    <option value="otro">Otro</option>
  </select>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <br>
                                            <fieldset>
<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="form-group label-floating">
    <label class="control-label">Nombre de usuario *</label>
    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-reg" required="" maxlength="15">
                                                            </div>
                                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
    <label class="control-label">Contraseña *</label>
<input class="form-control" type="password" name="password1-reg" required="" maxlength="70">
                                                            </div>
                                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                            <label class="control-label">Repita la contraseña *</label>
<input class="form-control" type="password" name="password2-reg" required="" maxlength="70">
                                                            </div>
                                                        </div>
                                <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
<label class="control-label">E-mail</label>
    <input class="form-control" type="email" name="email-reg" maxlength="50">
                                                            
                                                        
                                                        <div class="col-xs-12">
                                                            <div class="form-group">
    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <br>
                                            <fieldset>
                <p class= "text-center"><i>* Campos Obligatorios</i></p>

            <p class="text-center" style="margin-top: 20px;">
            <button class="btn btn-success">Guardar</button>
            <input class="btn btn-danger"  type="reset" value="Limpiar"></a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            

                        </div>
                        <div style="height: 100vh"></div>
                       
                    </div>
                </main>
                