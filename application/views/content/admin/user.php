<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Users</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users fa-fw"></i> User list
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="<?php echo base_url('admin/users/create'); ?>" class="btn btn-default btn-xs">Register new user</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">

                        <?php
                        switch ($this->session->userdata('result')) {
                            case "sucess_edit":
                                echo '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Sucess to update!
                                    </div>';
                                break;
                            case "error_edit":
                                echo '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Error to update!
                                    </div>';
                                break;
                            case "sucess_create":
                                echo '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Sucess to insert!
                                    </div>';
                                break;
                            case "error_create":
                                echo '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Error to insert!
                                    </div>';
                                break;
                            case "sucess_delete":
                                echo '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Sucess to delete!
                                    </div>';
                                break;
                            case "error_delete":
                                echo '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Error to delete!
                                    </div>';
                                break;
                        }
                        if ($this->session->userdata('result') != NULL) {
                            $data['result'] = array('result' => NULL);
                            $this->session->set_userdata($data['result']);
                        }
                        ?>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">E-mail</th>
                                    <th style="text-align: center;">Level</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <!--
                                Status: sucess, info, warning, danger
                                -->
                                <?php foreach ($users as $user) { ?>
                                    <?php if ($user->level_user == 1) { ?>
                                        <tr class="warning">
                                        <?php } else { ?>            
                                        <tr class="success">
                                        <?php } ?>
                                        <th style="text-align: center;"><?php echo $user->id_user; ?></td>
                                        <td><?php echo $user->name_user; ?></td>
                                        <td><?php echo $user->mobile_user; ?></td>
                                        <td><?php echo $user->email_user; ?></td>
                                        <th style="text-align: center;"><?php if ($user->level_user == 1){ echo 'admin'; } else { echo 'client'; } ?></td>
                                        <th style="text-align: center;">
                                            <a href="<?php echo base_url('/admin/users/update/' . $user->id_user); ?>" title="Update user"><i class="fa fa-pencil fa-fw"></i></a>
                                            <a href="<?php echo base_url('/admin/users/delete/' . $user->id_user); ?>" onclick="return confirm('Want to delete this user?');" title="Delete user"><i class="fa fa-close fa-fw"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
