<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mechanics</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil fa-fw"></i> Mechanic update
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php foreach ($mechanics as $mechanic) { ?>
                            <form role="form" method="POST" action="<?php echo base_url('admin/mechanics/update/' . $mechanic->id_mechanic); ?>">
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
                                    <label>ID:</label> <?php echo $mechanic->id_mechanic; ?>
                                </div>
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input required name="name" id="name" class="form-control" type="text" value="<?php echo $mechanic->name_mechanic; ?>">
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