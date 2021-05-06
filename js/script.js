function validar() {
    mail=document.getElementById('email').value
    pass=document.getElementById('password').value
    mensaje=document.getElementById('mensaje')

    if (mail=='' && pass==''){
        mensaje.innerHTML='Falta email y password'
        return false
    } else if (mail==''){
        mensaje.innerHTML='Falta email'
            return false
    } else if (pass==''){
        mensaje.innerHTML='Falta password'
            return false
    } else {
            return true
    }
}