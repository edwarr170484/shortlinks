function validate(form) {
    let inputs = form.querySelectorAll("input");
    let textareas = form.querySelectorAll("textarea");
    let error = false;

    [...inputs, ...textareas].forEach((element) => {
        if (element.required) {
            if (element.nextElementSibling) {
                element.nextElementSibling.remove();
            }
            if (element.value == '' || element.value === null || element.value === undefined) {
                element.classList.add('is-invalid');
                element.insertAdjacentHTML('afterend', '<div id="validationServer05Feedback" class="invalid-feedback">Это обязательное поле</div>');
                error = true;
            } else {
                element.classList.remove('is-invalid');
            }
        }
    });

    return error;
}

module.exports = validate;