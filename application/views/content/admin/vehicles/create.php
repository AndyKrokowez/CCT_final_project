<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Vehicles</h1>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil fa-fw"></i> Vehicle create
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                            <form role="form" method="POST" action="<?php echo base_url('admin/vehicles/create'); ?>">
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
                                    <label>Client *</label>
                                    <select required name="client" id="client" class="form-control">
                                        <option value="0"> - select client - </option>
                                        <?php foreach ($clients as $client) { ?>
                                        <option value="<?php echo $client->id_user; ?>"><?php echo $client->name_user; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Type vehicle *</label>
                                    <select required name="type_vehicle" id="type_vehicle" class="form-control">
                                        <option value="car">Car</option>
                                        <option value="motorbike">motorbike</option>
                                        <option value="van">Small Van</option>
                                        <option value="bus">Small Bus</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Make vehicle *</label>
                                    <input required name="make_vehicle" id="make_vehicle" class="form-control" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label>Model vehicle *</label>
                                    <input required name="model_vehicle" id="model_vehicle" class="form-control" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label>License plate *</label>
                                    <input required name="license_plate" id="license_plate" class="form-control" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label>Engine type *</label>
                                    <select required name="engine_type" id="engine_type" class="form-control">
                                        <option value="petrol">Petrol</option>
                                        <option value="diesel">Diesel</option>
                                        <option value="electric">Electric</option>
                                        <option value="hybrid">Hybrid</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date service *</label>
                                    <input required name="date_service" id="date_service" class="form-control" type="date" value="">
                                </div>
                                <div class="form-group">
                                    <label>Type service *</label>
                                    <select required name="type_service" id="type_service" class="form-control">
                                        <?php foreach ($services as $service) { ?>
                                        <option value="<?php echo $service->id_service; ?>"><?php echo $service->name_service; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Comments *</label>
                                    <textarea name="comments" id="comments" class="form-control"></textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-default">Create</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>