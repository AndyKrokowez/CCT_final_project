<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Vehicles</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil fa-fw"></i> vehicle update
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php foreach ($vehicles as $vehicle) { ?>
                            <form role="form" method="POST" action="<?php echo base_url('admin/vehicles/update/' . $vehicle->id_vehicle); ?>">
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
                                    <label>ID:</label> 
                                </div>
                                <div class="form-group">
                                    <label>Client *</label>
                                    <select required name="client" id="client" class="form-control">
                                        <option value="0"> - select client - </option>
                                        <?php foreach ($clients as $client) { ?>
                                        <option <?php if($vehicle->id_user == $client->id_user){ echo 'selected'; } ?> value="<?php echo $client->id_user; ?>"><?php echo $client->name_user; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Type vehicle *</label>
                                    <select required name="type_vehicle" id="type_vehicle" class="form-control">
                                        <option <?php if($vehicle->type_vehicle == 'car'){ echo 'selected'; } ?> value="car">Car</option>
                                        <option <?php if($vehicle->type_vehicle == 'motorbike'){ echo 'selected'; } ?> value="motorbike">motorbike</option>
                                        <option <?php if($vehicle->type_vehicle == 'van'){ echo 'selected'; } ?> value="van">Small Van</option>
                                        <option <?php if($vehicle->type_vehicle == 'bus'){ echo 'selected'; } ?> value="bus">Small Bus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Make vehicle *</label>
                                    <input required name="make_vehicle" id="make_vehicle" class="form-control" type="text" value="<?php echo $vehicle->make_vehicle; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Model vehicle *</label>
                                    <input required name="model_vehicle" id="model_vehicle" class="form-control" type="text" value="<?php echo $vehicle->model_vehicle; ?>">
                                </div>
                                <div class="form-group">
                                    <label>License plate *</label>
                                    <input required name="license_plate" id="license_plate" class="form-control" type="text" value="<?php echo $vehicle->license_plate_vehicle; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Engine type *</label>
                                    <select required name="engine_type" id="engine_type" class="form-control">
                                        <option <?php if($vehicle->engine_type_vehicle == 'petrol'){ echo 'selected'; } ?> value="petrol">Petrol</option>
                                        <option <?php if($vehicle->engine_type_vehicle == 'diesel'){ echo 'selected'; } ?> value="diesel">Diesel</option>
                                        <option <?php if($vehicle->engine_type_vehicle == 'electric'){ echo 'selected'; } ?> value="electric">Electric</option>
                                        <option <?php if($vehicle->engine_type_vehicle == 'hybrid'){ echo 'selected'; } ?> value="hybrid">Hybrid</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date service *</label>
                                    <input required name="date_service" id="date_service" class="form-control" type="date" value="<?php echo $vehicle->date_service_vehicle; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Type service *</label>
                                    <select required name="type_service" id="type_service" class="form-control">
                                        <?php foreach ($services as $service) { ?>
                                        <option  <?php if($vehicle->type_service_vehicle == $service->id_service){ echo 'selected'; } ?> value="<?php echo $service->id_service; ?>"><?php echo $service->name_service; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Comments *</label>
                                    <textarea name="comments" id="comments" class="form-control"><?php echo $vehicle->comments_vehicle; ?></textarea>
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