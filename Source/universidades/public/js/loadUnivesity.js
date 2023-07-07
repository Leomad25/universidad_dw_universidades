function preLoadInfo(predata) {
    document.querySelectorAll('div.form-input').forEach((e) => {
        if (!e.classList.contains('form-input-active')) e.classList.add('form-input-active');
    });

    document.querySelector('input#nit').value = predata.nit;
    document.querySelector('input#name').value = predata.name;
    document.querySelector('input#address').value = predata.address;
    document.querySelector('input#email').value = predata.email.replace(/'/g, '');
    document.querySelector('input#date').value = predata.date;
    document.querySelector('input#phone').value = predata.phone;
    document.querySelector('input#max_rooms').value = predata.max_rooms;
}