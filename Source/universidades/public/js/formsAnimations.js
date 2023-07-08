document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('input').forEach((e) => {
        if (e.parentElement.classList.contains('form-input')) {
            inputOnFocus(e);
            inputOnBlur(e);
            inputOnKeyPress(e);
        }
    });

    var input;
    input = document.querySelector('input#phone');
    input.addEventListener('keydown', (e) => {
        onlyNumbers(e);
        limitCharacters(e, 10);
    });
    input = document.querySelector('input#max_rooms');
    input.addEventListener('keydown', (e) => {
        onlyNumbers(e);
        limitCharacters(e, 2);
    });

    sendFormIsValid();
});

function inputOnFocus(input) {
    input.addEventListener("focus", function() {
        if (!input.parentElement.classList.contains('form-input-active'))
            input.parentElement.classList.add('form-input-active');
    });
}

function inputOnBlur(input) {
    input.addEventListener("blur", function() {
        if (input.parentElement.classList.contains('form-input-active') && input.value.length == 0)
            input.parentElement.classList.remove('form-input-active');

        if (input.parentElement.classList.contains('error-show')) {
            if (input.value.length > 0 && !(/^0+$/.test(input.value)))
                input.parentElement.classList.remove('error-show');
        } else {
            if (input.value.length == 0)
                input.parentElement.classList.add('error-show');
        }
    });
}

function inputOnKeyPress(input) {
    input.addEventListener("input", function() {
        if (input.parentElement.classList.contains('error-show'))
            input.parentElement.classList.remove('error-show');

        if (input.id == 'email')
            if (!isValidEmail(input))
                if (!input.parentElement.classList.contains('error-show')) {
                    input.parentElement.classList.add('error-show');
                    changeMessageToInvalid(input);
                }

        if (input.id == 'phone')
            if (!isValidPhone(input))
                if (!input.parentElement.classList.contains('error-show')) {
                    input.parentElement.classList.add('error-show');
                    changeMessageToInvalid(input);
                }

        if (input.id == 'max_rooms')
            if (!isValidMaxRoom(input))
                if (!input.parentElement.classList.contains('error-show')) {
                    input.parentElement.classList.add('error-show');
                    changeMessageToInvalid(input);
                }
                
        if (input.value.length == 0) {
            if (input.id == 'email') changeMessageToInvalid(input, true);
            if (input.id == 'phone') changeMessageToInvalid(input, true);
            if (input.id == 'max_rooms') changeMessageToInvalid(input, true);
        }

        sendFormIsValid();
    });
}

function sendFormIsValid() {
    let isValid = true;
    const btn = document.querySelector("form").querySelector('button');
    let input = null;
    document.querySelectorAll('div.form-input').forEach((e) => {
        input = e.querySelector('input');
        if (isValid) isValid = input.value.length > 0;

        if (isValid && input.id == 'email') isValid = isValidEmail(input);
        if (isValid && input.id == 'phone') isValid = isValidPhone(input);
        if (isValid && input.id == 'max_rooms') isValid = isValidMaxRoom(input);
    });
    btn.disabled = !isValid;
}

function isValidEmail(input) {
    let rtn = true;
    let value = input.value;
    rtn = value.includes('@');
    if (rtn) {
        const arr = value.split('@');
        rtn = arr.length == 2;
        if (rtn) rtn = arr[0].length > 0;
        if (rtn) rtn = arr[1].charAt(arr[1].length - 1) != '.';
        if (rtn) rtn = arr[1].includes('.');
    }
    return rtn;
}

function isValidPhone(input) {
    return input.value.length == 10;
}

function isValidMaxRoom(input) {
    return input.value != 0;
}

function changeMessageToInvalid(input, reverse = false) {
    let containers = input.parentElement.querySelector('div.form-input-error').children;
    if (containers.length != 2) return;
    if (!reverse) {
        containers[0].style = 'display: none;';
        containers[1].style = 'display: block;';
    } else {
        containers[0].style = 'display: block;';
        containers[1].style = 'display: none;';
    }
}

function onlyNumbers(event) {
    let keyCode = event.keyCode || event.which;
    let isNumer = (keyCode >= 48 && keyCode <= 57);
    let isBackSpace = (keyCode == 8);
    let isTabLine = (keyCode == 9);
    if (!isNumer && !(isBackSpace || isTabLine))
        event.preventDefault();
}

function limitCharacters(event, limit) {
    let input = event.target;
    let isBackSpace = (event.keyCode == 8);
    let isTabLine = (event.keyCode == 9);
    if (input.value.length >= limit) {
        if ((isBackSpace || isTabLine)) return;
        event.preventDefault();
    }
}