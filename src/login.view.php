<?php require 'header.php' ?>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="login.php">


                        <div class="form-group ">
                            <label for="empresa" class="col-md-4 control-label">Empresa</label>

                            <div class="col-md-6">

                                <select class="form-control" name="empresa" id="empresa">

                                    <?php foreach ( $empresas as $empresa ): ?>
                                        <option value="<?=$empresa->idempresa?>"><?=$empresa->nombre?></option>
                                    <?php endforeach; ?>

                                </select>

                            </div>
                        </div>



                        <div class="form-group <?=$group_e_email ?> ">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                                <?php if( isset($e_correo) ): ?>
                                    <span class="help-block">
                                        <strong><?=$e_correo ?></strong>
                                    </span>
                                <?php endif; ?>

                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if( isset($e_password) ): ?>
                                <span class="help-block">
                                        <strong><?=$e_password ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" > Recordar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>

                                <a class="btn btn-link" href="#">
                                    Olvidé mi contraseña
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'footer.php' ?>
