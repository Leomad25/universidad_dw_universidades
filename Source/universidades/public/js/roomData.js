function onInit_rooms(containerId, data, dataCategory, dataSubCategory) {
    let count = 1;
    data.forEach((e) => {
        var p;
        let container = document.createElement('li');
        container.classList.add('rooms-item');

        let containerCounter = document.createElement('div');
        containerCounter.classList.add('rooms-counter');

        p = document.createElement('b');
        p.textContent = count;
        containerCounter.appendChild(p);

        let containerInfo = document.createElement('div');
        containerInfo.classList.add('rooms-info');

        p = document.createElement('b');
        p.textContent = searchById(e.category_id, dataCategory);
        containerInfo.appendChild(p);

        p = document.createElement('p');
        p.textContent = searchById(e.sub_category_id, dataSubCategory);
        containerInfo.appendChild(p);

        let containerBtn = document.createElement('div');
        containerBtn.classList.add('rooms-btn');

        let form = document.createElement('form');
        form.action = '/deleteRoom/' + e.id;
        form.method = 'get';
        btn = document.createElement('button');
        btn.type = 'submit';
        btn.textContent = 'Eliminar';
        form.appendChild(btn);
        containerBtn.appendChild(form);

        container.appendChild(containerCounter);
        container.appendChild(containerInfo);
        container.appendChild(containerBtn);
        document.getElementById(containerId).appendChild(container);
        count++;
    });
}

function searchById(id, list) {
    let rtn = '';
    list.forEach((e) => { if (e.id == id) rtn = e.name; });
    return rtn;
}