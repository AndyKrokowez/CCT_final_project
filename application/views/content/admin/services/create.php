<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Service</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil fa-fw"></i> Service create
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                            <form role="form" method="POST" action="<?php echo base_url('admin/services/create'); ?>">
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
                                    <label>Price *</label>
                                    <input required name="price" id="price" class="form-control" type="text" value="">
                                </div>
                                <button type="submit" class="btn btn-default">Create</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>