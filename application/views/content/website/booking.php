<section class="login">
    <article>

        <div class="main">          

            <div>

                <h4>Vehicles</h4><br>

                <div>
                    <table style="border: solid 1px #000;">
                        <thead>
                            <tr>
                                <td>Vehicle</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($vehicles)){ foreach ($vehicles as $b):  ?>
                                <tr>
                                    <td><a href="<?php echo base_url('booking_/'.$b->id_vehicle); ?>"><?php echo $b->make_vehicle.' - '.$b->model_vehicle; ?></a></td>
                                </tr>
                            <?php endforeach; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </article>
</section>