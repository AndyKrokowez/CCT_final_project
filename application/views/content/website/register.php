<!-- starting the login process -->
<section class="login">
    <article>
        <h2>Register</h2>

        <div class="main">

            <div>

                <br>

                <!-- starting profile creation by user -->
                <h4>Create your profile to have access</h4>
                <div>
                    <form action="<?php echo base_url('register'); ?>" method="POST">
                        <div class="field">
                            <div class="control">
                                <input name="name" id="name" type="text" placeholder="Name" autofocus>
                                <br>
                                <br>
                            </div>
                        </div>

                        <div>
                            <div>
                                <input name="mobile" id="mobile" type="text" placeholder="mobile">
                                <br>
                                <br>
                            </div>
                        </div>

                        <div>
                            <div>
                                <input name="email" id="email" type="email" placeholder="email">
                                <br>
                                <br>
                            </div>
                        </div>

                        <div>
                            <div>
                                <input name="password" id="password" type="password" placeholder="Password">
                                <br>
                                <br>
                            </div>
                        </div>
                        <button type="submit" class="btn">Register</button>
                        <br>
                        <br>

                        <a href="<?php echo base_url('login'); ?>">Click here </a> to Login

                    </form>
                </div> <!-- end of profile creation -->
            </div>
        </div>
    </article>
</section>