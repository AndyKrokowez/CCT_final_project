<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil fa-fw"></i> User create
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                            <form role="form" method="POST" action="<?php echo base_url('admin/users/create'); ?>">
                                <?php
                                if (isset($result)) {
                                    if ($result === "sucess") {
                                        ?>
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Succes to save!
                                        </div>
                                        <?php
                                    } else if ($result === "error") {
                                        ?>
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Error to save!
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <label>ID:</label> 
                                </div>
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input required name="name" id="name" class="form-control" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label>Mobile *</label>
                                    <input required name="mobile" id="mobile" class="form-control" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label>E-mail *</label>
                                    <input required name="email" id="email" class="form-control" type="email" value="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="pass1" id="pass1"  class="form-control" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <label>Confirm to password</label>
                                    <input name="pass2" id="pass2"  class="form-control" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <label>Level *</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="1"  >Admin</option>
                                        <option value="2"  >Client</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default">Create</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>