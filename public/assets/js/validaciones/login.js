const validator = new window.JustValidate('#form');

validator
.addField('#usuario', [
    {
        rule: 'required',
        errorMessage: 'El usuario es obligatorio'
    }
])
.addField('#clave', [
    {
        rule: 'required',
        errorMessage: 'La contraseña es obligatoria'
    },
    {
        rule:'password',
        errorMessage: 'La contraseña necesita contener 8 caracteres minimo, 1 letra y 1 numero'
    }
])
.onSuccess((e) => {
    document.getElementById("form").submit();
});