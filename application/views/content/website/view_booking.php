<section class="login">
    <article>

        <div class="main">          

            <div>

                <h4>Booking</h4><br>

                <div>
                    <table style="border: solid 1px #000;">
                        <thead>
                            <tr>
                                <td>Vehicle</td>
                                <td>Date service</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($booking)){ foreach ($booking as $b):  ?>
                                <tr>
                                    <td><?php echo $b->make_vehicle. ' - '. $b->model_vehicle; ?></td>
                                    <td><?php echo $b->date_service; ?></td>
                                </tr>
                            <?php endforeach; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </article>
</section>