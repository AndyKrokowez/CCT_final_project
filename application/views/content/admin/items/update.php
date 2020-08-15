<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Items / Parts</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil fa-fw"></i> Item update
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php foreach ($items as $item) { ?>
                            <form role="form" method="POST" action="<?php echo base_url('admin/items/update/' . $item->id_items_parts); ?>">
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
                                    <label>ID:</label> <?php echo $item->id_items_parts; ?>
                                </div>
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input required name="name_item" id="name_item" class="form-control" type="text" value="<?php echo $item->name_items_parts; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Price *</label>
                                    <input required name="price_item" id="price_item" class="form-control" type="text" value="<?php echo $item->price_items_parts; ?>">
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