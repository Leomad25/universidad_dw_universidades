function onInit_subCategory(idInput, idInput2, data) {
    const input = document.getElementById(idInput);
    input.addEventListener('change', () => {
        onChange_subCategory(idInput, idInput2, data)
    });
    const input2 = document.getElementById(idInput2);
    var option = document.createElement('option');
    option.value = '';
    option.text = '- Selecciona una categoría -';
    input2.appendChild(option);
}

function onChange_subCategory(idInput, idInput2, data) {
    const input = document.getElementById(idInput);
    const input2 = document.getElementById(idInput2);
    input2.innerHTML = '';
    if (input.value != '') {
        var option;
        option = document.createElement('option');
        option.value = '';
        option.text = '- Selecciona una subcategoría -';
        input2.appendChild(option);
        data.forEach(element => {
            if (element.inherit == input.value) {
                option = document.createElement('option');
                option.value = element.id;
                option.text = element.name;
                input2.appendChild(option);
            }
        });
    } else {
        var option = document.createElement('option');
        option.value = '';
        option.text = '- categoría invalida -';
        input2.appendChild(option);
    }
    
}