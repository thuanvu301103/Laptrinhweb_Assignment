function getParameter(parameterName) {
    let parameter = new URLSearchParams(window.location.search);
    return parameter.get(parameterName);
}

// Validator object
function Validator(options) {
    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }

    var selectorRules = {};

    // Validate function handling
    function validate(inputElement, rule) {
        var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
        var errorMessage;

        // Get rules from selector
        var rules = selectorRules[rule.selector];

        //Loop though rules and test, if there is an error, stop
        for (var i = 0; i < rules.length; ++i) {
            switch (inputElement.type) {
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](
                        formElement.querySelector(rule.selector + ':checked')
                    );
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
            }
            if (errorMessage) break;
        }

        if (errorMessage) {
            errorElement.innerText = errorMessage;
            getParent(inputElement, options.formGroupSelector).classList.add('invalid');
        } else {
            errorElement.innerText = '';
            getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
        }

        return !errorMessage;
    }

    // GET data from form
    var formElement = document.querySelector(options.form);
    if (formElement) {
        // submit form handling
        formElement.onsubmit = function(e) {
            e.preventDefault();

            var isFormValid = true;

            // Loop thourgh all rules and validate them
            options.rules.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isValid = validate(inputElement, rule);
                if (!isValid) {
                    isFormValid = false;
                }
            });

            if (isFormValid) {
                // Submit form with javascript
                if (typeof options.onSubmit === 'function') {
                    var enableInputs = formElement.querySelectorAll('[name]');
                    var formValues = Array.from(enableInputs).reduce(function(values, input) {
                        switch (input.type) {
                            case 'radio':
                                values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value;
                                break;
                            case 'checkbox':
                                if (!input.matches(':checked')) {
                                    values[input.name] = '';
                                    return values;
                                }
                                if (!Array.isArray(values[input.name])) {
                                    values[input.name] = [];
                                }
                                values[input.name].push(input.value);
                                break;
                            case 'file':
                                values[input.name] = input.files;
                                break;
                            default:
                                values[input.name] = input.value;
                        }
                        return values;
                    }, {});
                    options.onSubmit(formValues);
                }
                // Submit form by default
                else {
                    formElement.submit();
                }
            }
        }

        // loop through all rules and check each user behavior on input field
        options.rules.forEach(function(rule) {

            // Lưu lại các rules cho mỗi input
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElements = formElement.querySelectorAll(rule.selector);

            Array.from(inputElements).forEach(function(inputElement) {
                // When users leave the input field
                inputElement.onblur = function() {
                    validate(inputElement, rule);
                }

                //When users input something
                inputElement.oninput = function() {
                    var errorElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
                    errorElement.innerText = '';
                    getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
                }
            });
        });
    }

}



/*
Define some rules
if there are errors, return error message
if there is no errors, return undefined
 */
Validator.isRequired = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            return value ? undefined : message || 'Vui lòng nhập trường này'
        }
    };
}

Validator.isEmail = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'Trường này phải là email';
        }
    };
}

Validator.usernameCheck = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            // ^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$
            if (/[a-zA-Z0-9]{8,20}/.test(value) == false) {
                return "Username must between 8 - 20 characters";
            } else if (/(?=.*[A-Z])/.test(value) == false) {
                return "Username must contain at least a uppercase";
            } else if (/(?=.*\d)/.test(value) == false) {
                return "Username only contains 1 digit";
            } else if (/[a-zA-Z0-9._]/.test(value) == false) {
                return "Username contains not allowed words";
            } else if (/(?=.*[a-z])/.test(value) == false) {
                return "Username must contain at least a lowercase";
            } else if (value === "password" || value === "Password" || value === "PASSWORD") {
                return "Username cannot be password";
            } else
                return undefined;
        }
    }
}
Validator.minLength = function(selector, min, message) {
    return {
        selector: selector,
        test: function(value) {
            return value.length >= min ? undefined : message || `Vui lòng nhập tối thiểu ${min} kí tự`;
        }
    };
}

Validator.isConfirmed = function(selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function(value) {
            return value === getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác';
        }
    }
}

Validator.phoneCheck = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
            return regex.test(value) ? undefined : message || 'Trường này phải là số điện thoại';
        }
    }
}

Validator.passwordCheck = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            if (value === "password" || value === "Password" || value === "PASSWORD") {
                return "Password cannot be password";
            } else return undefined;
        }
    }
}