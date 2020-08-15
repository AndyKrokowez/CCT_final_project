<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Mechanic</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users fa-fw"></i> Mechanic list
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="<?php echo base_url('admin/mechanics/create'); ?>" class="btn btn-default btn-xs">Register new mechanic</a>
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
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <!--
                                Status: sucess, info, warning, danger
                                -->
                                <?php 
                                if(isset($mechanics)){
                                foreach ($mechanics as $mechanic) { ?>
                                        <tr class="">
                                        <th style="text-align: center;"><?php echo $mechanic->id_mechanic; ?></td>
                                        <td><?php echo $mechanic->name_mechanic; ?></td>
                                        <th style="text-align: center;">
                                            <a href="<?php echo base_url('/admin/mechanics/update/' . $mechanic->id_mechanic); ?>" title="Update mechanic"><i class="fa fa-pencil fa-fw"></i></a>
                                            <a href="<?php echo base_url('/admin/mechanics/delete/' . $mechanic->id_mechanic); ?>" onclick="return confirm('Want to delete this mechanic?');" title="Delete mechanic"><i class="fa fa-close fa-fw"></i></a>
                                        </td>
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
