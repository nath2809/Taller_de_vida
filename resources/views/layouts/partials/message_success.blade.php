
<!--------------------------------------------------------------------------------------------->
<!-- ALERTA DE QUE TODO SALIO BIEN EN LA EDICION DE DATOS DE LA ACTIVIDAD-->

    @if (session('editar')== 'ok')
                
        <script>
            const Toast = Swal.mixin({
                toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: false,
            didOpen: (toast) => {
                //toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })
            
            Toast.fire({
            icon: 'success',
            title: 'Datos editados Correctamente'
            })    
        </script>

    @endif

<!--------------------------------------------------------------------------------------------->
<!-- ALERTA DE QUE TODO SALIO BIEN EN LA CREACION DE UNA DE UN USUARIO-->

    @if (session('create_user')== 'ok')
            
        <script>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Usuario Registrado Correctamente',
            showConfirmButton: false,
            timer: 1400
                })
        </script>
    
    @endif

<!--------------------------------------------------------------------------------------------->
<!-- ALERTA DE QUE TODO SALIO BIEN EN LA CREACION DE UNA ACTIVIDAD-->
    
    @if (session('create_activity')== 'ok')
            
        <script>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Actividad Registrada Correctamente',
            showConfirmButton: false,
            timer: 2400
                })
        </script>
    
    @endif

<!--------------------------------------------------------------------------------------------->
<!-- ALERTA DE QUE TODO SALIO BIEN AL CERRAR SESION-->

    @if (session('logout')== 'ok')
        
        <script>
            const Toast = Swal.mixin({
                    toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: false,
                didOpen: (toast) => {
                    //toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })
                
                Toast.fire({
                icon: 'success',
                title: 'Sesión Cerrada Correctamente'
            })    
        </script>
    
    @endif
    
<!--------------------------------------------------------------------------------------------->
<!-- ALERTA PARA EL SUCCESS DEL ENVIO DEL LINK PARA RESETEAR EL PASSWORD-->
    
    @if (session('sendOk')== 'ok')
            
        <script>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Envío Satisfactorio',
            showConfirmButton: false,
            timer: 2400
                })
        </script>
    
    @endif

<!--------------------------------------------------------------------------------------------->
<!-- ALERTA PARA EL SUCCESS DEL PASSWORD-->

    @if (session('passwordResetOk')== 'ok')
            
        <script>
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Contraseña actualizada correctamente',
            showConfirmButton: false,
            timer: 2400
                })
        </script>

    @endif

<!--------------------------------------------------------------------------------------------->
<!-- ALERTA DE QUE TODO SALIO BIEN AL CERRAR SESION-->

    @if (session('participant')== 'ok')
        
        <script>
            const Toast = Swal.mixin({
                toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: false,
            didOpen: (toast) => {
                //toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })
            
            Toast.fire({
            icon: 'success',
            title: 'Participantes agregados correctamente'
        })    
        </script>

    @endif

<!--------------------------------------------------------------------------------------------->
<!-- ALERTA DE QUE TODO SALIO BIEN AL CERRAR SESION-->

    @if (session('participantRemoved')== 'ok')
            
        <script>
            const Toast = Swal.mixin({
                toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: false,
            didOpen: (toast) => {
                //toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })
            
            Toast.fire({
            icon: 'success',
            title: 'Participante eliminado correctamente'
        })    
        </script>

    @endif