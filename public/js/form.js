var Form = (function () {

    var validateInputMethod = function (input) {
        console.log(input.id);
    };

    return {
        validateInput: validateInputMethod
    };
}());


window.onload = function () {

    let elements = document.getElementsByClassName('register-form-item');
    for (let el of elements) {
        new Vue({
            el: el,
            data: {
                input: ''
            },
            methods: {
                validate: function (event) {
                    Form.validateInput(this);
                },
                submit: function (event) {
                    Form.submit();
                }
            }
        });
    }
};

