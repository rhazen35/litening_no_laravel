<div class="register">
    <div class="register-container">
        <div class="register-title">Register</div>
        <div class="register-form">
            <div class="register-form-item" id="name">
                <label for="text">
                    Full Name
                    <span></span>
                </label>
                <input @focusout="validate(this)" v-model="data.name" type="text" name="name" value="" placeholder=" Name" title="Please enter your full name.">
            </div>
            <div class="register-form-item" id="email">
                <label for="email">
                    Email *
                    <span></span>
                </label>
                <input @focusout="validate(this)" v-model="data.email" type="email" name="email" value="" placeholder=" Email" title="Please enter your email address.">
            </div>
            <div class="register-form-item" id="password">
                <label for="password">
                    Password*
                </label>
                <input @focusout="validate(this)" v-model="data.password" type="password" name="password" value="" placeholder=" Password" title="Please enter your password.">
            </div>
            <div class="register-form-item" id="passwordRepeat">
                <label for="passwordRepeat">
                    Password repeat*
                </label>
                <input @focusout="validate(this)" v-model="data.passwordRepeat" type="password" name="password-repeat" value="" placeholder=" Password Repeat" title="Please repeat your password.">
            </div>
            <div class="register-form-item" id="submit">
                <input @click="submit(this)" type="submit" name="submitRegister" value="Register" title="Click to register.">
            </div>
        </div>
    </div>
</div>