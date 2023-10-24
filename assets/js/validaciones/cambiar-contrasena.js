const validator = new window.JustValidate('#form');

validator
    .addField('#password', [
        {
            rule: 'required',
            errorMessage: 'La contraseña es obligatoria'
        },
        {
            rule: 'password',
            errorMessage: 'La contraseña necesita contener 8 caracteres minimo, 1 letra y 1 numero'
        }
    ])
    .addField('#confirm-password', [
        {
        rule: 'required',
            errorMessage: 'La contraseña es obligatoria'
        },
        {
            rule: 'password',
            errorMessage: 'La contraseña necesita contener 8 caracteres minimo, 1 letra y 1 numero'
        },
        {
            validator: (value, fields) => {
              if (
                fields['#password'] &&
                fields['#password'].elem
              ) {
                const repeatPasswordValue =
                  fields['#password'].elem.value;
      
                return value === repeatPasswordValue;
              }
      
              return true;
            },
            errorMessage: 'La contraseña no coincide',
        },
    ])
    .onSuccess((e) => {
        document.getElementById("form").submit();
    });