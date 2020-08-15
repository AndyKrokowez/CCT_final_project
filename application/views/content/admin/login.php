<div style="width: 100%; background-image: URL('./include/img/Raca3.jpeg'); background-repeat: no-repeat; background-size: 100%; min-height: 768px; height: 100% !important;" class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Administrator</h3>
                </div>
                <div class="panel-body">
                    <form name="login" id="login" action="<?php echo base_url('/admin/login'); ?>" method="post" role="form">
                        <fieldset>
                            <div class="form-group input-group">
                                <span class="input-group-addon">E-mail:</span>
                                <input class="form-control" placeholder="" id="user" name="user" type="text" autofocus>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Password:</span>
                                <input class="form-control" placeholder="" id="password" name="password" type="password" value="">
                            </div>
                            <input type="submit" class="btn btn-lg btn-success btn-block"/>

                            <?php if (isset($erro_login)) { ?>
                                <br/>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <?php
                                    echo $erro_login;
                                    ?>
                                </div>
                            <?php } ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>