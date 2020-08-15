<nav>
    <ul>
        <li>
            <a title="Homepage" href="<?php echo base_url('home'); ?>">Homepage</a>
        </li>

        <li>
            <a title="About Us" href="#" aria-haspopup="true">About Us</a>
            <ul>
                <li>
                    <a title="Staff" href="<?php echo base_url('staff'); ?>">Staff</a>
                </li>

                <li>
                    <a title="Our_History" href="<?php echo base_url('history'); ?>">Our History</a>
                </li>

            </ul>

        </li>

        <li>
            <a title="Services" href="#" aria-haspopup="true">Services</a>
            <ul>
                <li>
                    <a title="Valet" href="<?php echo base_url('valet'); ?>">Valet</a>
                </li>

                <li>
                    <a title="Car_Parts" href="<?php echo base_url('car_parts'); ?>">Car Parts</a>
                </li>

                <li>
                    <a title="General_Services" href="#" aria-haspopup="true">General Services</a>
                    <ul>
                        <li>
                            <a title="Annual_Services" href="<?php echo base_url('annual_services'); ?>">Annual Services</a>
                        </li>
                        <li>
                            <a title="Major_repair" href="<?php echo base_url('major_repair'); ?>">Major Repair</a>
                        </li>
                        <li>
                            <a title="Major_Service" href="<?php echo base_url('major_service'); ?>">Major Service</a>
                        </li>
                        <li>
                            <a title="Fault_Repair" href="<?php echo base_url('fault_repair'); ?>">Fault / Repair</a>
                        </li>
                        <li>
                            <a title="NCT_Check" href="<?php echo base_url('nct_check'); ?>">NCT Check</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li>
            <a title="Booking" href="<?php echo base_url('booking'); ?>" aria-haspopup="true">Booking</a>
            <ul>
                <?php if ($this->session->userdata('logged') == true) { ?>
                    <li>
                        <a title="Start" href="<?php echo base_url('start'); ?>">Start</a>
                    </li>
                    <li>
                        <a title="Logout" href="<?php echo base_url('logout'); ?>">Logout</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a title="Login" href="<?php echo base_url('login'); ?>">Login</a>
                    </li>
                    <li>
                        <a title="Register" href="<?php echo base_url('register'); ?>">Register</a>
                    </li>
                <?php } ?>
                    <li>
                        <a title="Admin Area" target="_blank" href="<?php echo base_url('admin'); ?>">Admin Area</a>
                    </li>


            </ul>
        </li>

        <li>
            <a title="Contact Us" href="<?php echo base_url('contact'); ?>">Contact Us</a>

        </li>

    </ul>
</nav>
