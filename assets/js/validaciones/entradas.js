const validator = new window.JustValidate('#form');

validator
    .addField('#productos', [{
            rule: 'required',
            errorMessage: 'El producto es obligatorio'
        },
    ])
    .addField('#precio', [
        {
        rule: 'required',
            errorMessage: 'El precio de entrada es obligatorio'
        },
        {
            rule:'number',
            errorMessage: 'El precio de entrada solo puede contener números'
        }
        
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
    .addField('#fecha', [
        {
        rule: 'required',
            errorMessage: 'La fecha de vencimiento es obligatoria'
        },
        {
            rule: 'customRegexp',
            value: /^\d{4}-\d{2}-\d{2}$/,
            errorMessage: 'La fecha de vencimiento tiene que seguir un formato YYYY-mm-dd'
        }
    ])
    .onSuccess((e) => {
        document.getElementById("form").submit();
    });