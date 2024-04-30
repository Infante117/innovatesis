/* Enviar formularios via AJAX */
const formularios_ajax = document.querySelectorAll(".FormularioAjax");

formularios_ajax.forEach(formulario => {
    formulario.addEventListener("submit", function(e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Quieres realizar la acción solicitada",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, realizar',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                let data = new FormData(this);
                let method = this.getAttribute("method");
                let action = this.getAttribute("action");

                let encabezados = new Headers();
                let config = {
                    method: method,
                    headers: encabezados,
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
                };

                fetch(action, config)
                    .then(respuesta => respuesta.json())
                    .then(respuesta => {
                        return alertas_ajax(respuesta);
                    });
            }
        });
    });
});

function alertas_ajax(alerta) {
    if (alerta.tipo == "simple") {
        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        });
    } else if (alerta.tipo == "recargar") {
        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            }
        });
    } else if (alerta.tipo == "limpiar") {
        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector(".FormularioAjax").reset();
                var urlActual = window.location.href;
                var $url = urlActual.split("#")[0];
                window.location.href = $url;
                window.history.pushState({}, document.title, $url);
            }
        });
    } else if (alerta.tipo == "limpiarCompany") {
        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector(".FormularioAjax").reset();
                window.location.href = 'http://localhost/www.innovatesisperu.com/Acompany/';
            }
        });
    }else if(alerta.tipo=="limpiarRegistroUsuario"){
        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if(result.isConfirmed){                
                document.querySelector(".FormularioAjax").reset();
                window.location.href = 'http://localhost/www.innovatesisperu.com/Ausers/';              
            }
        });
    }else if(alerta.tipo=="limpiarRegistroAlumno"){
        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if(result.isConfirmed){                
                document.querySelector(".FormularioAjax").reset();
                window.location.href = 'http://localhost/www.innovatesisperu.com/Aclients/';              
            }
        });
    }else if(alerta.tipo=="limpiarUsuarioActualizado"){

        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {                
                var urlActual = window.location.href;// Capturamos la URL actual               
                var partesURL = urlActual.split("/");// Obtener el ID de usuario de la URL actual
                var idUsuario = partesURL[partesURL.length - 2]; // El ID estaría en la penúltima posición del array    
                // Redireccionar a otra página con el ID de usuario almacenado
                var nuevaURL = "http://localhost/www.innovatesisperu.com/DetailsUser/" + idUsuario+"/";
                window.location.href = nuevaURL;
            }
        });

    }else if(alerta.tipo=="limpiarAlumnoActualizado"){

        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {                
                var urlActual = window.location.href;// Capturamos la URL actual               
                var partesURL = urlActual.split("/");// Obtener el ID de usuario de la URL actual
                var idUsuario = partesURL[partesURL.length - 2]; // El ID estaría en la penúltima posición del array    
                // Redireccionar a otra página con el ID de usuario almacenado
                var nuevaURL = "http://localhost/www.innovatesisperu.com/DetailsUser/" + idUsuario+"/";
                window.location.href = nuevaURL;
            }
        });

    }else if(alerta.tipo=="limpiarUsuarioEliminado"){

        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {  
                var nuevaURL = "http://localhost/www.innovatesisperu.com/Ausers/";
                window.location.href = nuevaURL;
            }
        });

    }else if(alerta.tipo=="limpiarAlumnoEliminado"){

        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {  
                var nuevaURL = "http://localhost/www.innovatesisperu.com/Aclients/";
                window.location.href = nuevaURL;
            }
        });

    }else if(alerta.tipo=="limpiarPerfilActualizado"){

        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {                
                var urlActual = window.location.href;// Capturamos la URL actual               
                var partesURL = urlActual.split("/");// Obtener el ID de usuario de la URL actual
                var idUsuario = partesURL[partesURL.length - 2]; // El ID estaría en la penúltima posición del array    
                // Redireccionar a otra página con el ID de usuario almacenado
                var nuevaURL = "http://localhost/www.innovatesisperu.com/Perfil/";
                window.location.href = nuevaURL;
            }
        });

    }else if(alerta.tipo=="limpiarClaveActualizada"){

        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {                
                var urlActual = window.location.href;// Capturamos la URL actual               
                var partesURL = urlActual.split("/");// Obtener el ID de usuario de la URL actual
                var idUsuario = partesURL[partesURL.length - 2]; // El ID estaría en la penúltima posición del array    
                // Redireccionar a otra página con el ID de usuario almacenado
                var nuevaURL = "http://localhost/www.innovatesisperu.com/Perfil/";
                window.location.href = nuevaURL;
            }
        });

    }else if(alerta.tipo=="limpiarDeleteBlogsssss"){

         Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if(result.isConfirmed){                
                document.querySelector(".FormularioAjax").reset();
                var nuevaURL = "http://localhost/www.innovatesisperu.com/Ablog/";
                window.location.href = nuevaURL;   
            }
        });

    } else if(alerta.tipo=="bajaPromotions"){

        Swal.fire({
           icon: alerta.icono,
           title: alerta.titulo,
           text: alerta.texto,
           confirmButtonText: 'Aceptar'
       }).then((result) => {
           if(result.isConfirmed){                
               document.querySelector(".FormularioAjax").reset();
               var nuevaURL = "http://localhost/www.innovatesisperu.com/Apromotions/";
               window.location.href = nuevaURL;   
           }
       });

   }else if(alerta.tipo=="limpiarServicioBaja"){

    Swal.fire({
       icon: alerta.icono,
       title: alerta.titulo,
       text: alerta.texto,
       confirmButtonText: 'Aceptar'
   }).then((result) => {
       if(result.isConfirmed){                
           document.querySelector(".FormularioAjax").reset();
           var nuevaURL = "http://localhost/www.innovatesisperu.com/Aservices/";
           window.location.href = nuevaURL;   
       }
   });

}   
   
    else if(alerta.tipo=="redireccionar"){
        window.location.href=alerta.url;
    }
}

