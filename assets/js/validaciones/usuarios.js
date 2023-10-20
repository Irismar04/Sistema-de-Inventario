const validator = new window.JustValidate('#form');

validator
    .addField('#username', [{
            rule: 'required',
            errorMessage: 'El nombre de usuario es obligatorio'
        },
    ])
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
    .addField('#nombre', [
        {
        rule: 'required',
            errorMessage: 'El nombre es obligatorio'
        },
        {
            rule: 'customRegexp',
            value: /^[a-zA-Z]+$/,
            errorMessage: 'El nombre solo puede contener letras'
        },
    ])
    .addField('#apellido', [
        {
        rule: 'required',
            errorMessage: 'El apellido es obligatorio'
        },
        {
            rule: 'customRegexp',
            value: /^[a-zA-Z]+$/,
            errorMessage: 'El apellido solo puede contener letras'
        },
    ])
    .addField('#roles', [
        {
        rule: 'required',
            errorMessage: 'El rol de usuario es obligatorio'
        },
    ])
    .addField('#cedula', [
        {
            rule: 'required',
            errorMessage: 'La cédula de identidad es obligatoria'
        },
        {
            rule: 'integer',
            errorMessage: 'La cédula solo puede contener números'
        }
    ])
    .addField('#generos', [
        {
        rule: 'required',
            errorMessage: 'El genero es obligatorio'
        },
    ])
    .addField('#telefono', [
        {
            rule: 'integer',
            errorMessage: 'el número telefónico solo puede contener números'
        },
        {
            rule: 'maxLength',
            value: 11,
            errorMessage: 'el número telefónico no puede tener mas de 11 dígitos'
        },
    ])
    .addField('#correo', [
        {
            rule: 'email',
            errorMessage: 'introduzca un formato valido para correos, e.j: ejemplo@correo.com'
        }
    ])
    .onSuccess((e) => {
        document.getElementById("form").submit();
    });