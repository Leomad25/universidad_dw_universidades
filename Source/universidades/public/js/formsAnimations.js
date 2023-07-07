document.addEventListener('DOMContentLoaded', () => {
    let inputs = document.querySelectorAll('input');
    inputs.forEach((e) => {
        if (e.parentElement.classList.contains('form-input')) {
            inputOnFocus(e);
            inputOnBlur(e);
        }
    });
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
    });
}