<div class="row show-grid">
    <div class="row show-grid">
        <div class="col-xs-6">.col-md-1</div>
        <div class="col-xs-6">
            <form class="form-inline" role="form">
                <div class="form-group">
                    <div class="input-group">
                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                        <div class="input-group-addon">Usuario</div>
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Usuario">
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Sign in</button>
            </form>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-8">
            <center><img src="<?php echo BASE_URL . 'Vistas/index/img/bienvenido.gif' ?>" class="kbien"></center>
            <img src="<?php echo BASE_URL . 'Vistas/index/img/pollo.jpg' ?>" class="img-circle img-responsive"> 
        </div>
        <div class="col-xs-4 kreg">
            <label class="ktitulo">REGISTRATE</label>
            <div class="form-group">
                <label>Nombre: </label>
                <input type="text" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label>Apellidos: </label>
                <input type="text" class="form-control" placeholder="Apellidos">
            </div>
            <div class="form-group">
                <label>Dirección: </label>
                <input type="text" class="form-control" placeholder="Dirección">
            </div>
            <label>Correo: </label>
            <input type="email" class="form-control" placeholder="Correo">
            <div class="form-group">
                <label>Teléfono: </label>
                <input type="text" class="form-control" placeholder="Teléfono">
            </div>
            <div class="form-group">
                <label>DNI: </label>
                <input type="text" class="form-control" placeholder="DNI">
            </div>
            <div class="form-group">
                <label>Ciudad: </label>
                <select  class="form-control" >
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <p>Date: <input type="text" id="datepicker" size="30"></p>
                <script>
                    $(function () {
                        $("#datepicker").datepicker();
                        $("#anim").change(function () {
                            $("#datepicker").datepicker("option", "showAnim", $(this).val());
                        });
                    });
                </script>
            </div>
            <br>
            <center><button type="submit" class="btn btn-success">REGISTRAR</button></center>

        </div>
    </div>
</div>
