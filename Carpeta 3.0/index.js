function init(){

}

$(document).ready( ()=> {
  // Con esto de aqui cambiamos de usuario a administrador 
});
$(document).on("click", "#accesoAdministrador", ()=>{
    if ($('#rol_id').val()== 1) {
        $('#accesoUsuario').html("Acceso Administrador");
        $('#accesoAdministrador').html("Acceso Usuario");
        $('#rol_id').val(2);

        
    } else {
        $('#accesoUsuario').html("Acceso Usuario");
        $('#accesoAdministrador').html("Acceso Administrador");
        $('#rol_id').val(1);
    }

});


init(); 
