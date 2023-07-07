function onInit_university(container_id, data) {
    let container = document.getElementById(container_id);
    data.forEach((e) => {
        var spam, div, divInfo, btn, form;

        let element = document.createElement('li');
        element.classList.add('university-element');

        divInfo = document.createElement('div');
        divInfo.classList.add('university-element-info');

        div = document.createElement('div');
        div.classList.add('university-element-id');
        spam = document.createElement('b');
        spam.innerHTML = e.id;
        div.appendChild(spam);
        divInfo.appendChild(div);

        div = document.createElement('div');
        div.classList.add('university-element-name');
        spam = document.createElement('p');
        spam.innerHTML = e.name;
        div.appendChild(spam);
        spam = document.createElement('p');
        spam.innerHTML = '(' + e.nit + ')';
        div.appendChild(spam);
        divInfo.appendChild(div);

        div = document.createElement('div');
        div.classList.add('university-element-contact');
        spam = document.createElement('p');
        spam.innerHTML = e.email;
        div.appendChild(spam);
        spam = document.createElement('p');
        spam.innerHTML = e.phone;
        div.appendChild(spam);
        divInfo.appendChild(div);

        div = document.createElement('div');
        div.classList.add('university-element-date');
        spam = document.createElement('p');
        spam.innerHTML = e.date;
        div.appendChild(spam);
        divInfo.appendChild(div);

        element.appendChild(divInfo);

        div = document.createElement('div');
        div.classList.add('university-element-btns');

        form = document.createElement('form');
        form.action = '/university/' + e.id;
        form.method = 'get';
        btn = document.createElement('button');
        btn.type = 'submit';
        btn.textContent = 'Seleccionar';
        form.appendChild(btn);
        div.appendChild(form);

        form = document.createElement('form');
        form.action = '/updateUniversity/' + e.id;
        form.method = 'get';
        btn = document.createElement('button');
        btn.type = 'submit';
        btn.textContent = 'Editar';
        form.appendChild(btn);
        div.appendChild(form);

        form = document.createElement('form');
        form.action = '/deleteUniversity/' + e.id;
        form.method = 'get';
        btn = document.createElement('button');
        btn.type = 'submit';
        btn.textContent = 'Eliminar';
        form.appendChild(btn);
        div.appendChild(form);

        element.appendChild(div);
        document.getElementById(container_id).appendChild(element);
    });
}