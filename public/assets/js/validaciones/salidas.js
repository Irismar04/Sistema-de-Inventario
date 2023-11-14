const validator = new window.JustValidate('#form');

validator
    .addField('#productos', [{
            rule: 'required',
            errorMessage: 'El producto es obligatorio'
        },
    ])
    .addField('#stock-actual', [{
            rule: 'integer',
            errorMessage: 'El campo de stock solo puede contener números'
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
        },
        {
            validator: (value, fields) => {
              if (
                fields['#stock-actual'] &&
                fields['#stock-actual'].elem &&
                fields['#stock-actual'].elem.value != ''
              ) {
                const stockActual = fields['#stock-actual'].elem.value;
                return parseInt(value) <= parseInt(stockActual);
              }

              return true;
            },
            errorMessage: 'La cantidad a retirar no puede ser mayor al stock actual',
        },
    ])
    .addField('#precio', [
        {
        rule: 'required',
            errorMessage: 'El precio de salida es obligatorio'
        },        
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