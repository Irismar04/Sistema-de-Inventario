const validator = new window.JustValidate('#form');

validator
    .addField('#productos', [{
            rule: 'required',
            errorMessage: 'El producto es obligatorio'
        },
    ])
    .addField('#cantidad', [
        {
        rule: 'required',
            errorMessage: 'la cantidad es obligatoria'
        },
        {
            rule: 'integer',
            errorMessage: 'el campo de cantidad solo puede contener números'
        }
        
    ])
    .addField('#precio', [
        {
        rule: 'required',
            errorMessage: 'El precio de salida es obligatorio'
        },
        {
            rule: 'integer',
            errorMessage: 'El precio de salida solo puede contener números'
        }
        
    ])
    .addField('#motivo', [
        {
        rule: 'required',
            errorMessage: 'El motivo de salida es obligatorio'
        },
    ])
    .onSuccess((e) => {
        document.getElementById("form").submit();
    });