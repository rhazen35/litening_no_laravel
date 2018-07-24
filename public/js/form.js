var Form = (function () {

    var validateInputMethod = function (input) {
        var id    = input.$el.id;
        var value = input.data[id];
        
        console.log(id);
        console.log(value);

    };

    var submitMethod = function (submit) {
        console.log(submit.value);
    };

    return {
        validateInput: validateInputMethod,
        submit: submitMethod
    };
}());


window.onload = function () {
    let elements = document.getElementsByClassName('register-form-item');
    for (let el of elements) {
        new Vue({
            el: el,
            data: {
                value: '',
                data: {
                    name: ""
                }
            },
            methods: {
                validate: function (event) {
                    Form.validateInput(this);
                },
                submit: function (event) {
                    Form.submit(this);
                }
            }
        });
    }
};

