const validator = new window.JustValidate('#form');

validator
    .addField('#nombre', [{
            rule: 'required',
            errorMessage: 'El nombre es obligatorio'
        },
        {
            rule: 'customRegexp',
            value: /^[a-zA-Z]+$/,
            errorMessage: 'El nombre solo puede contener letras'
        },
    ])
    .onSuccess((e) => {
        document.getElementById("form").submit();
    });