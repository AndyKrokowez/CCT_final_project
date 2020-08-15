<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil fa-fw"></i> User update
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php foreach ($services as $service) { ?>
                            <form role="form" method="POST" action="<?php echo base_url('admin/services/update/' . $service->id_service); ?>">
                                <?php
                                if (isset($result)) {
                                    if ($result === "sucess") {
                                        ?>
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Succes to update!
                                        </div>
                                        <?php
                                    } else if ($result === "error") {
                                        ?>
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Error to update!
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <label>ID:</label>  <?php echo $service->id_service; ?>
                                </div>
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input required name="name" id="name" class="form-control" type="text" value="<?php echo $service->name_service; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Price *</label>
                                    <input required name="price" id="price" class="form-control" type="text" value="<?php echo $service->price_service; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Date at create *</label> 
                                    <?php echo date("d/m/Y", strtotime($service->created_at_service)); ?>
                                </div>
                                <div class="form-group">
                                    <label>Date at last update *</label> 
                                    <?php echo date("d/m/Y", strtotime($service->updated_at_service)); ?>
                                </div>
                                <button type="submit" class="btn btn-default">Update</button>
                            </form>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>