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
        },
    ])
    .onSuccess((e) => {
        document.getElementById("form").submit();
    });