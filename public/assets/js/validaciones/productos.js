const validator = new window.JustValidate('#form');

validator
    .addField('#nombre', [{
            rule: 'required',
            errorMessage: 'El nombre es obligatorio'
        },
        {
            rule: 'customRegexp',
            value: /^[A-Za-z\s\W]+$/,
            errorMessage: 'El nombre solo puede contener letras o caracteres especiales'
        }
    ])
    .addField('#categorias', [
        {
        rule: 'required',
            errorMessage: 'La categoría es obligatoria'
        }
    ])
    .addField('#marcas', [
        {
        rule: 'required',
            errorMessage: 'La marca es obligatoria'
        }
    ])
    .addField('#stock', [
        {
        rule: 'required',
            errorMessage: 'El stock inicial es obligatorio'
        },
        {
            rule: 'integer',
            errorMessage: 'El stock inicial solo puede contener números'
        }
        
    ])
    .addField('#stock_minimo', [
        {
        rule: 'required',
            errorMessage: 'El stock mínimo es obligatorio'
        },
        {
            rule: 'integer',
            errorMessage: 'El stock minimo solo puede contener números'
        }
    ])
    .addField('#precio', [
        {
        rule: 'required',
            errorMessage: 'El precio es obligatorio'
        },
        {
            rule: 'number',
            errorMessage: 'El precio solo puede contener números'
        },
    ])
    .onSuccess((e) => {
        document.getElementById("form").submit();
    });