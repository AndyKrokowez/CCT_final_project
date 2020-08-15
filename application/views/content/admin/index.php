<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-users fa-fw"></i> Search bookings
                    <div class="pull-right">
                        <div class="btn-group">

                        </div>

                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" method="POST" action="<?php echo base_url('admin/start'); ?>">
                            <div class="form-group col-lg-4">
                                <label>Initial date: </label>
                                <input class="form-control" name="initial_date" id="initial_date" type="date" value="">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Final date: </label>
                                <input class="form-control" name="final_date" id="final_date" type="date" value="">
                            </div>
                            
                            <div class="pull-right">
                                <div class="btn-group">
                                    <br />
                                    <button type="submit" class="btn btn-default">Search</button>
                                </div>
                            </div>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Date service</th>
                                    <th style="text-align: center;">Client</th>
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">Vehicle</th>
                                    <th style="text-align: center;">Mechanic</th>
                                    <th style="text-align: center;">Service type</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <!--
                                Status: sucess, info, warning, danger
                                -->
                                <?php
                                if (isset($booking)) {
                                    foreach ($booking as $b) {
                                        ?>
                                        <tr class="">
                                            <td><?php echo $b->date_service; ?></td>
                                            <td><?php echo $b->name_user; ?></td>
                                            <td><?php echo $b->mobile_user; ?></td>
                                            <td><?php echo $b->make_vehicle . ' - ' . $b->model_vehicle; ?></td>
                                            <td><?php echo $b->name_mechanic; ?></td>
                                            <td><?php echo $b->name_service; ?></td>
                                            <td><?php echo $b->status; ?></td>
                                            <th style="text-align: center;">
                                                <a href="<?php echo base_url('/admin/booking/invoice/' . $b->id_booking); ?>" title="Invoice"><i class="fa fa-euro fa-fw"></i></a>
                                                <a href="<?php echo base_url('/admin/booking/update/' . $b->id_booking); ?>" title="Update booking"><i class="fa fa-pencil fa-fw"></i></a>
                                                </td>
                                        </tr>
    <?php }
} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-calendar-check-o fa-fw"></i> Bookings for the day
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="list-group">
                        <?php
                        $booked = 0;
                        $in_service = 0;
                        $fixed_completed = 0;
                        $collected = 0;
                        $unrepairable_scrapped = 0;
                        foreach ($to_day as $key):
                            if ($key->status == 'Booked')
                                $booked ++;
                            elseif ($key->status == 'In Service')
                                $in_service ++;
                            elseif ($key->status == 'Fixed / Completed')
                                $fixed_completed ++;
                            elseif ($key->status == 'Collected')
                                $collected ++;
                            elseif ($key->status == 'Unrepairable / Scrapped')
                                $unrepairable_scrapped ++;
                        endforeach;
                        ?>
                        <a href="#" class="list-group-item">
                            Booked
                            <span class="pull-right text-muted small"><em><?php echo $booked; ?></em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            In Service
                            <span class="pull-right text-muted small"><em><?php echo $in_service; ?></em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            Fixed / Completed
                            <span class="pull-right text-muted small"><em><?php echo $fixed_completed; ?></em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            Collected
                            <span class="pull-right text-muted small"><em><?php echo $collected; ?></em>
                            </span>
                        </a>
                        <a href="#" class="list-group-item">
                            Unrepairable / Scrapped
                            <span class="pull-right text-muted small"><em><?php echo $unrepairable_scrapped; ?></em>
                            </span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel .chat-panel -->
        </div>