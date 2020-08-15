<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Items / Parts</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users fa-fw"></i> Items list
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="<?php echo base_url('admin/items/create'); ?>" class="btn btn-default btn-xs">Register new item/part</a>
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
                                    <th style="text-align: center;">Item</th>
                                    <th style="text-align: center;">Price</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <!--
                                Status: sucess, info, warning, danger
                                -->
                                <?php 
                                if(isset($items)){
                                foreach ($items as $item) { ?>
                                        <tr class="">
                                        <th style="text-align: center;"><?php echo $item->id_items_parts; ?></td>
                                        <td><?php echo $item->name_items_parts; ?></td>
                                        <td style="text-align: center;"><?php echo '€ '.$item->price_items_parts; ?></td>
                                        <th style="text-align: center;">
                                            <a href="<?php echo base_url('/admin/items/update/' . $item->id_items_parts); ?>" title="Update items"><i class="fa fa-pencil fa-fw"></i></a>
                                            <a href="<?php echo base_url('/admin/items/delete/' . $item->id_items_parts); ?>" onclick="return confirm('Want to delete this item?');" title="Delete items"><i class="fa fa-close fa-fw"></i></a>
                                        </td>
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
