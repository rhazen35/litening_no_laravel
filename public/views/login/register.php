<div class="register">
    <div class="register-container">
        <div class="register-title">Register</div>
        <div class="register-form">
            <div class="register-form-item" id="full-name">
                <label for="text">
                    Full Name
                    <span></span>
                </label>
                <input @focusout="validate(this)" v-model="input" type="text" name="name" value="" placeholder=" Full Name" title="Please enter your full name.">
            </div>
            <div class="register-form-item" id="email">
                <label for="email">
                    Email *
                    <span></span>
                </label>
                <input @focusout="validate(this)" v-model="input" type="email" name="email" value="" placeholder=" Email" title="Please enter your email address.">
            </div>
            <div class="register-form-item" id="password">
                <label for="password">
                    Password*
                </label>
                <input @focusout="validate(this)" v-model="input" type="password" name="password" value="" placeholder=" Password" title="Please enter your password.">
            </div>
            <div class="register-form-item" id="password-repeat">
                <label for="passwordRepeat">
                    Password repeat*
                </label>
                <input @focusout="validate(this)" v-model="input" type="password" name="passwordRepeat" value="" placeholder=" Password Repeat" title="Please repeat your password.">
            </div>
            <div class="register-form-item" id="submit">
                <input v-on:click="" type="submit" name="submitRegister" value="Register" title="Click to register.">
            </div>
        </div>
    </div>
</div>