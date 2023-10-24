const validator = new window.JustValidate('#form');

validator
    .addField('#precio', [
        {
        rule: 'required',
            errorMessage: 'El precio de la divisa es obligatorio'
        },
        {
            rule: 'integer',
            errorMessage: 'El precio de la divisa solo puede contener números'
        }
        
    ])
    .onSuccess((e) => {
        document.getElementById("form").submit();
    });