<section class="login">
    <article>

        <div class="main">          

            <div>

                <h4>Insert Vehicle Details</h4><br>

                <div>
                    <form action="<?php echo base_url('register_cars'); ?>" method="POST">
                        <div class="field">
                            <select type="text" name="type" id="type">
                                <option value="car">Car</option>
                                <option value="motorbike">motorbike</option>
                                <option value="van">Small Van</option>
                                <option value="bus">Small Bus</option>

                            </select><br><br>
                        </div>

                        <div>
                            <div>
                                <input name="make" id="make" type="text" class="input is-large" placeholder="Vehicle Make"><br><br>
                            </div>
                        </div>

                        <div>
                            <div>
                                <input name="model" id="model" type="text" class="input is-large" placeholder="Vehicle Model"><br><br>
                            </div>
                        </div>

                        <div>
                            <input name="license_plate" id="license_plate" type="text" placeholder="License Plate"><br><br>

                        </div>
                        <select type="text" name="engine_type" id="engine_type">
                            <option value="petrol">Petrol</option>
                            <option value="diesel">Diesel</option>
                            <option value="electric">Electric</option>
                            <option value="hybrid">Hybrid</option>

                        </select><br><br>

                        <div>
                            <input name="date_service" id="date_service" type="date"><br><br>

                        </div>

                        <select type="text" name="type_service" id="type_service">
                            <?php foreach ($services as $service) { ?>
                                <option value="<?php echo $service->id_service; ?>"><?php echo $service->name_service; ?></option>

                            <?php } ?>
                        </select><br><br>

                        <div>
                            <textarea name="comments" id="comments" rows="10" cols="30" placeholder="Type your comments"></textarea><br><br>

                        </div>

                        <button type="submit" class="btn">Confirm Booking</button><br><br>

                    </form>
                </div>
            </div>
        </div>
    </article>
</section>