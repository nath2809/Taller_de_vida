
// --------------------------------------\\
// CODIGO PARA ABRIR Y CERRAR EL MENU LATERAL

function openNav() {
    // Obtener el objeto media query para pantallas menores a 500px
    var mediaQuery = window.matchMedia("(max-width: 500px)");
  
    document.getElementById("overlay").style.display = "block";
  
    // Mostrar el menú en pantallas menores a 500px
    if (mediaQuery.matches) {
      document.getElementById("mySidenav").style.width = "80%";
    } else {
      // Mostrar el menú en pantallas mayores a 800px
      if (window.innerWidth > 800) {
        document.getElementById("mySidenav").style.width = "20%";
        document.getElementById("overlay").style.display = "block";
      } else {
        document.getElementById("overlay").style.display = "block";
        document.getElementById("mySidenav").style.width = "20%";
      }
    }
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("overlay").style.display = "none";
}

// --------------------------------------\\
// Funcion de las alertas para Loguearse como usuario en la app
function validateLogin(){
    
    let name = document.getElementById('name').value
    let password = document.getElementById('password').value

    if(name.length == 0 || password.length == 0){

        Swal.fire({
            title: 'Error de validacion!',
            text: 'Todos los Campos son Obligatorios',
            icon: 'error',
            confirmButtonText: 'Cerrar'
        })
            return false;

        }
        document.getElementById('form').submit()
}

// --------------------------------------\\
// Funcion de las alertas para registrarse como usuario en la app
function validateRegister(){

    let name = document.getElementById('name').value
    let surnames = document.getElementById('surnames').value
    let type_document = document.getElementById('type_document').value
    let document_number = document.getElementById('document_number').value
    let email = document.getElementById('email').value
    let phone_number = document.getElementById('phone_number').value
    let region = document.getElementById('region').value
    let city = document.getElementById('city').value
    let password = document.getElementById('password').value
    let birthdate= document.getElementById('birthdate').value
    //let password_confirmation= document.getElementById('password_confirmation').value


    if(name.length == 0 || document_number.length == 0|| surnames.length == 0 || 
        email.length == 0 || password.length == 0 || type_document.length == 0 || phone_number.length==0 ||
        birthdate.length == 0 || region.length==0 || city.length==0 )
        {
            Swal.fire({
                title: 'Ha ocurrido un error!',
                text: 'Todos los Campos son Obligatorios',
                icon: 'error',
                confirmButtonText: 'Cerrar'
            })
                return false 
            }
            document.getElementById('formRegister').submit()
        
}

// --------------------------------------\\
// Funcion para validad el registro de una actividad
function validateRegisterActivity(){

    let type = document.getElementById('type').value
    let name = document.getElementById('name').value
    let description = document.getElementById('description').value
    let region = document.getElementById('region').value
    let city = document.getElementById('city').value
    let participants = document.getElementById('participants').value
    let attendance = document.getElementById('attendance').value
    let report= document.getElementById('report').value


    if(type.length == 0 || name.length == 0 || description.length == 0 || 
        region.length == 0 || city.length == 0 || participants.length == 0 || attendance.length == 0 || report.length == 0)
        {
            Swal.fire({
                title: 'Ha ocurrido un error!',
                text: 'Todos los Campos son Obligatorios',
                icon: 'error',
                confirmButtonText: 'Cerrar'
            })
                return false 
            }
            document.getElementById('formRegister').submit()
        
}

// --------------------------------------\\
// Funcion de las alertas para validar que todos los campos esten llenos en el form de editar usuarios
function confirmarCambiosUser(){

    let name = document.getElementById('name').value
    let surnames = document.getElementById('surnames').value
    let type_document = document.getElementById('type_document').value
    let document_number = document.getElementById('document_number').value
    let email = document.getElementById('email').value
    let phone_number = document.getElementById('phone_number').value
    let region = document.getElementById('region').value
    let city = document.getElementById('city').value
    let birthdate= document.getElementById('birthdate').value

    if(name.length == 0 || document_number.length == 0 || surnames.length == 0 || 
        email.length == 0 || type_document.length == 0 || birthdate.length == 0 || phone_number.length ==0 || 
        region.length ==0 || city.length ==0)
        {
            Swal.fire({
                title: 'Ha ocurrido un error!',
                text: 'Todos los Campos son Obligatorios',
                icon: 'error',
                confirmButtonText: 'Cerrar'
            })
                return false
            }
            
        {
            Swal.fire({
                title: 'Quieres confirmar los cambios?',
                text: "Esta accion modificara la informacion del usuario",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si,confirmar',
                cancelButtonText: 'Cancelar'

            }).then((result) => {
                if(result.isConfirmed) {
                  
                        document.getElementById('formEdit').submit()
                    }
                    
            })
    
        }
}

// --------------------------------------\\
// Funcion de las alertas para validar que todos los campos esten llenos en el form de editar acitivity
function confirmarCambiosActivity(){

    let type = document.getElementById('type').value
    let name = document.getElementById('name').value
    let description = document.getElementById('description').value
    let region = document.getElementById('region').value
    let city = document.getElementById('city').value
    let participants = document.getElementById('participants').value


    if(type.length == 0 || name.length == 0 || description.length == 0 || 
        region.length == 0 || city.length == 0 || participants.length == 0 )
        {
            Swal.fire({
                title: 'Ha ocurrido un error!',
                text: 'Todos los Campos son Obligatorios',
                icon: 'error',
                confirmButtonText: 'Cerrar'
            })
                return false
            }
   
        {
            Swal.fire({
                title: 'Quieres confirmar los cambios?',
                text: "Esta accion modificara la informacion de la actividad",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si,confirmar',
                cancelButtonText: 'Cancelar'

            }).then((result) => {
                if(result.isConfirmed) {
                  
                        document.getElementById('formEditActivity').submit()
                    }
                    
            })
    
        }
    
}

// --------------------------------------\\
//FUNCION PARA MOSTRAR LAS IMAGENES MAS GRANDES
function showImage(imageUrl) {

    // Crear un elemento div que contendrá la imagen y los botones de navegación
    const modal = document.createElement("div");
    modal.classList.add("modal");
    
    // Crear los botones de navegación
    const prevBtn = document.createElement("button");
    prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
    prevBtn.classList.add("prev-btn");
    
    const nextBtn = document.createElement("button");
    nextBtn.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
    nextBtn.classList.add("next-btn");
    
    // Agregar eventos a los botones de navegación
    let imgIndex = 0;
    const imgs = document.querySelectorAll(".pictures img");
    
    prevBtn.addEventListener("click", () => {
      if (imgIndex > 0) imgIndex--;
      img.src = imgs[imgIndex].src;
    });
    
    nextBtn.addEventListener("click", () => {
      if (imgIndex < imgs.length - 1) imgIndex++;
      img.src = imgs[imgIndex].src;
    });
    
    // Crear un elemento img con la URL de la imagen
    const img = new Image();
    img.src = imageUrl;
    img.onload = () => {
      modal.appendChild(img);
      modal.appendChild(prevBtn);
      modal.appendChild(nextBtn);
      document.body.appendChild(modal);
    };
    
    // Añadir un evento click al elemento div que cerrará la ventana emergente al hacer clic fuera de ella
    modal.addEventListener("click", (e) => {
      if (e.target == modal) document.body.removeChild(modal);
    });
  }
  
// --------------------------------------\\
//FUNCION PARA FILTRAR LAS CIUDADES DEPENDIENDO EL DEPARTAMENTO
function loadCities(ciudades) {
    
    var regionSelect = document.getElementById('region');
    var citySelect = document.getElementById('city');

    regionSelect.addEventListener('change', function() {
        // Limpia las opciones existentes del selector de ciudades
        citySelect.innerHTML = '';

        // Obtén las ciudades correspondientes al departamento seleccionado
        var selectedRegion = regionSelect.value;
        var selectedCities = ciudades.filter(function(ciudad) {
            return ciudad.departamento === selectedRegion;
        });

        // Agrega las opciones correspondientes al selector de ciudades
        selectedCities.forEach(function(ciudad) {
            var option = document.createElement('option');
            option.value = ciudad.municipio;
            option.text = ciudad.municipio;
            citySelect.add(option);

            // Verifica si la ciudad está seleccionada según el valor anteriormente enviado
            if (option.value === "{{ old('city') }}") {
                option.selected = true;
            }
        });
    });
}

// --------------------------------------\\
//FUNCION PARA ACTUALIZAR LA CIUDAD
function updateCities(ciudades) {
    var regionSelect = document.getElementById('region');
    var citySelect = document.getElementById('city');
    
    regionSelect.addEventListener('change', function() {
        // Limpia las opciones existentes del selector de ciudades
        citySelect.innerHTML = '';
    
        // Obtén las ciudades correspondientes al departamento seleccionado
        var selectedRegion = regionSelect.value;
        var selectedCities = ciudades.filter(function(ciudad) {
            return ciudad.departamento === selectedRegion;
        });
    
        // Agrega las opciones correspondientes al selector de ciudades
        selectedCities.forEach(function(ciudad) {
            var option = document.createElement('option');
            option.value = ciudad.municipio;
            option.text = ciudad.municipio;
            citySelect.add(option);
        });
    });
}

// --------------------------------------\\
// FUNCION PARA LA VENTANA EMERGENTE - AGREGAR LIDERES

const botonAgregarLideres = document.querySelector('#boton-agregar-lideres');
const modalAgregarLideres = document.querySelector('#modal-agregar-lideres');
const closeButton = document.querySelector('.closeLideres');

botonAgregarLideres.addEventListener('click', () => {
    modalAgregarLideres.style.opacity = '1';
  modalAgregarLideres.style.display = 'block';
});

closeButton.addEventListener('click', () => {
  modalAgregarLideres.style.display = 'none';
});

// --------------------------------------\\
// FUNCION PARA VALIDAR EL ENVIO DE DATOS - AGREGAR LIDERES
function ValidateRegisterParticipant(){

    let searchInpunt = document.getElementById('participants').value

    if(searchInpunt.length == 0)

    {
        Swal.fire({
            title: 'Ha ocurrido un error!',
            text: 'Debes ingresar los datos del lider participante!',
            icon: 'error',
            confirmButtonText: 'Cerrar'
        })
            return false 
        }

        document.getElementById('formAddUserToActivity').submit()

}

// --------------------------------------\\
// FUNCION PARA VALIDAR ELIMINAR UN REGISTRO DE UN LIDER PARTICIPANTE 
function confirmDelete() {
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma la eliminación, enviar el formulario
            document.getElementById('removeParticipantForm').submit();
        }
    });
}






   



