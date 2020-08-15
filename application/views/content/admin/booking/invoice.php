<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Booking invoice</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-euro fa-fw"></i> Invoice
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="form-group">
                            <label>CUSTOMER: </label> <?php echo $invoice->name_user; ?> <br />
                            <label>Mobile No: </label> <?php echo $invoice->mobile_user; ?>
                        </div>
                        <div class="form-group">
                            <label>Vehicle: </label> <?php echo $invoice->model_vehicle; ?> <br />
                            <label>License: </label> <?php echo $invoice->license_plate_vehicle; ?>
                        </div>
                        <div class="form-group">
                            <label><?php echo $invoice->name_service; ?>: </label> € <?php echo $invoice->price_service; ?>
                        </div>
                        <div class="form-group">
                            <?php if(isset($items)){ foreach ($items as $key):
                            echo '<label>'.$key->name_items_parts.'</label> € '.$key->price_items_parts.'<br/>';
                            endforeach; } ?>
                        </div>
                        <div class="form-group">
                            <label>TOTAL DUE: </label> € <?php echo ($invoice->items+$invoice->price_service); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>