<div class="modal-overlay modal-inactive">
    <div class="modal-container">
        <div class="modal-head">
            <h2 class="modal-name">Lets make your business more secure...</h2>
            <?php xsvg(40, 40, "modal-close") ?>
        </div>
        <div class="modal-body">
            <form action method="POST" class="modal-form">
                <?php if(get_heading() == "Trainings"){ ?>
                    <div class="form-field">
                        <label for="name" class="form-label">Your Name(To be printed on Certificate):</label>
                        <input type="text" name="name" class="form-input" placeholder="Enter name" required autofocus/>
                    </div>
                <?php } ?>
                <div class="form-field">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-input" placeholder="Enter email" required/>
                </div>
                <div class="form-field">
                    <label for="phn" class="form-label">Contact number:</label>
                    <input type="phn" name="phn" class="form-input" placeholder="Enter phone" required/>
                </div>
                <?php if(get_heading() == "Services"){ ?>
                    <div class="form-field">
                        <label for="domain" class="form-label">Business Domain:</label>
                        <input type="text" name="domain" class="form-input" placeholder="Your Domain" required/>
                    </div>
                <?php } ?>
                <!-- <?php if(get_heading() == "Services"){ ?>
                    <div class="form-field">
                        <label for="training" class="form-label">Service:</label>
                        <select name="training" class="form-select">
                            <option class="form-input">Red Teaming</option>
                            <option class="form-input">Network Security</option>
                            <option class="form-input">Web Security</option>
                            <option class="form-input">Social Engineering</option>
                        </select>
                    </div>
                <?php } ?>
                <?php if(get_heading() == "Trainings"){ ?>
                    <div class="form-field">
                        <label for="training" class="form-label">Training:</label>
                        <select name="training" class="form-select">
                            <option class="form-input">Secure Web Development</option>
                            <option class="form-input">Secure Android Development</option>
                            <option class="form-input">Ethical Hacking</option>
                        </select>
                    </div>
                <?php } ?> -->
                <div class="form-field">
                    <input type="submit" class="form-btn"/>
                </div>
            </form>
        </div>
    </div>
</div>