<section class="login">
    <article>
        <h2>Login Form</h2>


        <div class="main">
            <div>

                <!-- starting the function to check if the user type correctly or wrong the e-mail or password to show the error message or not -->
                    <?php
                        switch ($this->session->userdata('result')) {
                            case "sucess_create":
                                echo '<div>
                                        <p><strong>Profile created. Do the login to book your car.</strong></p>
                                     </div>';
                                break;
                        }
                        if ($this->session->userdata('result') != NULL) {
                            $data['result'] = array('result' => NULL);
                            $this->session->set_userdata($data['result']);
                        }
                        ?>
                    <?php
                if ((isset($msg))) {
                    ?>
                    <div>
                        <p><strong><?= $msg ?></strong></p>
                    </div>
                <?php } ?>
                <div>
                    <form action="<?php echo base_url('login'); ?>" method="POST">
                        <div class="field">
                            <div>
                                <input type="text" name="email" placeholder="Email" autofocus="">
                                <br>
                                <br>
                            </div>
                        </div>

                        <div>
                            <div>
                                <input name="password" type="password" placeholder="Password">
                                <br>
                                <br>
                            </div>

                        </div>

                        <button type="submit" class="btn">Login</button>
                        <br>
                        <br>
                        <h4>Do you have an account?</h4>
                        <a href="<?php echo base_url('register'); ?>">Register here</a>

                    </form>
                </div>
            </div>
        </div>

    </article>
</section>