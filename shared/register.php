<div class="modal-overlay modal-inactive">
    <div class="modal-container">
        <div class="modal-head">

            <?php if(get_heading() == "Services" || get_heading() == "Red Teaming" || get_heading() == "Web Security" || get_heading() == "Network Security" || get_heading() == "Social Engineering"){ ?>
                <div class="modal-heading">
                    <p class="heading">Lets make your business secure!</p>
                    <p class="subheading">You are just a step away from assurance of your business protection and growth.</p>
                </div>
            <?php } ?>

            <?php if(get_heading() == "Trainings"){ ?>
                <div class="modal-heading">
                    <p class="heading">Get Ready for any cyber threat!</p>
                    <p class="subheading">Register now to </p>
                </div>
            <?php } ?>

            <?php xsvg(40, 40, "modal-close") ?>

        </div>
        <div class="modal-body">
            <form method="POST" name="registration_form" class="modal-form" onsubmit="formValidation(event)">
                <p class="form-msg error-msg"></p>
                <?php if(get_heading() == "Trainings"){ ?>
                    <div class="form-field">
                        <label for="cname" class="form-label">Your Name(To be printed on Certificate):</label>
                        <input type="text" name="name" class="form-input" placeholder="Enter name"/>
                    </div>
                <?php } ?>
                <div class="form-field">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-input" placeholder="Enter email"/>
                </div>
                <div class="form-field">
                    <label for="phn" class="form-label">Contact number:</label>
                    <input type="tel" name="phone" class="form-input" placeholder="Enter phone"/>
                </div>
                <?php if(get_heading() == "Services" || get_heading() == "Red Teaming" || get_heading() == "Web Security" || get_heading() == "Network Security" || get_heading() == "Social Engineering"){ ?>
                    <div class="form-field">
                        <label for="domain" class="form-label">Business Domain:</label>
                        <input type="text" name="domain" class="form-input" placeholder="Your Domain"/>
                    </div>
                <?php } ?>
                <?php if(get_heading() == "Services" || get_heading() == "Red Teaming" || get_heading() == "Web Security" || get_heading() == "Network Security" || get_heading() == "Social Engineering"){ ?>
                    <div class="form-field">
                        <label for="service" class="form-label">Service:</label>
                        <select name="service" class="form-select form-input">
                            <option>Red Teaming</option>
                            <option>Network Security</option>
                            <option>Web Security</option>
                            <option>Social Engineering</option>
                        </select>
                    </div>
                <?php } ?>
                <?php if(get_heading() == "Trainings"){ ?>
                    <div class="form-field">
                        <label for="training" class="form-label">Training:</label>
                        <
                        <select name="training" class="form-select form-input">
                            <option>Secure Web Development</option>
                            <option>Secure Android Development</option>
                            <option>Ethical Hacking</option>
                        </select>
                    </div>
                <?php } ?>
                <div class="form-field">
                    <input type="submit" class="form-btn"/>
                </div>
            </form>
            <div class="submit-msg">
                <h2>Thankyou for registering.</h2>
            </div>
        </div>
    </div>
</div>