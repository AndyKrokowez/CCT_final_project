<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Booking</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil fa-fw"></i> Booking update
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php foreach ($booking as $b) { ?>
                            <form role="form" method="POST" action="<?php echo base_url('admin/booking/update/' . $b->id_booking); ?>">
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
                                    <label>ID:</label> <?php echo $b->id_booking; ?> 
                                </div>
                                <div class="form-group">
                                    <label>Client *</label>
                                    <input readonly name="client" id="client" class="form-control" type="text" value="<?php echo $b->name_user; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Vehicle *</label>
                                    <input readonly name="vehicle" id="vehicle" class="form-control" type="text" value="<?php echo $b->make_vehicle. ' - '. $b->model_vehicle; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mechanic *</label>
                                    <input readonly required name="mechanic" id="mechanic" class="form-control" type="text" value="<?php echo $b->name_mechanic; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Service *</label>
                                    <input readonly required name="service" id="service" class="form-control" type="text" value="<?php echo $b->name_service; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Date service *</label>
                                    <input readonly required name="date_service" id="date_service" class="form-control" type="text" value="<?php echo $b->date_service; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Comments *</label>
                                    <textarea readonly required name="comments" id="comments" class="form-control"><?php echo $b->comments_vehicle; ?></textarea>
                                </div>
                            </form>
<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil fa-fw"></i> Items / Parts
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Items / Parts</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <!--
                                Status: sucess, info, warning, danger
                                -->
                                <?php if (isset($items)) { ?>
                                    <?php foreach ($items as $item): ?>
                                        <tr class="">
                                            <td style="text-align: center;"><?php echo $item->id_booking_items; ?></td>
                                            <td style="text-align: center;"><?php echo $item->name_items_parts; ?></td>
                                            <td style="text-align: center;">
                                                <a href="<?php echo base_url('admin/booking/del_item/'.$item->id_booking_items); ?>" onclick="return confirm('Want to delete this item?');" title="Delete item"><i class="fa fa-close fa-fw"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <form role="form" method="POST" action="<?php echo base_url('admin/booking/add_item/'.$b->id_booking); ?>">
                            <div class="form-group">
                                <label>Select items/parts</label>
                                <select name="parts" id="parts" class="form-control">
                                    <option > - select -</option>
                                    <?php if (isset($parts)) { ?>
                                    <?php foreach ($parts as $part): ?>
                                        <option value="<?php echo $part->id_items_parts; ?>"><?php echo $part->name_items_parts. ' - € '.$part->price_items_parts; ?></option>
                                    <?php endforeach; ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil fa-fw"></i> Booking status
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Status</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <!--
                                Status: sucess, info, warning, danger
                                -->
                                <?php if (isset($status)) { ?>
                                    <?php foreach ($status as $s): ?>
                                        <tr class="">
                                            <td style="text-align: center;"><?php echo $s->status; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <form role="form" method="POST" action="<?php echo base_url('admin/booking/status/'.$b->id_booking); ?>">
                            <div class="form-group">
                                <label>Select status</label>
                                <select name="status" id="status" class="form-control">
                                        <option value="Booked"> Booked</option>
                                        <option value="In Service"> In Service</option>
                                        <option value="Fixed / Completed"> Fixed / Completed</option>
                                        <option value="Collected"> Collected</option>
                                        <option value="Unrepairable / Scrapped"> Unrepairable / Scrapped</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>