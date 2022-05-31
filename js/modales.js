const modalFabricante = async () => {
    const { value: formValues } = await Swal.fire({
        title: 'Agregar Nuevo registro',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          },
        confirmButtonColor: '#green',
        
        html:
            '<input id="swal-input1" class="swal2-input" placeholder="nombre">' +
            '<input id="swal-input2" class="swal2-input" placeholder="nit">',
        focusConfirm: false,
        preConfirm: () => {
            return {
                nombre:  document.getElementById('swal-input1').value,
                nit: document.getElementById('swal-input2').value
            }    
        }
    })
    window.location.href = window.location.href+"?nombre="+formValues.nombre+"&nit="+formValues.nit;
}

const modalCategoria = async () => {
    const { value: formValues } = await Swal.fire({
        title: 'Agregar Nueva categoria',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          },
        confirmButtonColor: '#green',
        
        html:
            '<input id="swal-input1" class="swal2-input" placeholder="nombre">',
        focusConfirm: false,
        preConfirm: () => {
            return {
                nombre:  document.getElementById('swal-input1').value
            }    
        }
    })
    window.location.href = window.location.href+"?nombre="+formValues.nombre;
}

const modalUbicacion = async () => {
    const { value: formValues } = await Swal.fire({
        title: 'Agregar Nueva ubicacion',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          },
        confirmButtonColor: '#green',
        
        html:
            '<input id="swal-input1" class="swal2-input" placeholder="nombre">'+
            '<input id="swal-input2" class="swal2-input" placeholder="departamento">'+
            '<input id="swal-input3" class="swal2-input" placeholder="cuidad">'+
            '<input id="swal-input4" class="swal2-input" placeholder="direccion">',
        focusConfirm: false,
        preConfirm: () => {
            return {
                nombre:  document.getElementById('swal-input1').value,
                departamento:  document.getElementById('swal-input2').value,
                cuidad:  document.getElementById('swal-input3').value,
                direccion:  document.getElementById('swal-input4').value
            }    
        }
    })
    window.location.href = window.location.href+"?nombre="+formValues.nombre+"&departamento="+formValues.departamento+"&cuidad="+formValues.cuidad+"&direccion="+formValues.direccion;
}

const modalmtp = async () => {
    const { value: formValues } = await Swal.fire({
        title: 'Agregar Nuevo Metodo de pago',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          },
        confirmButtonColor: '#green',
        
        html:
            '<input id="swal-input1" class="swal2-input" placeholder="nombre">',
        focusConfirm: false,
        preConfirm: () => {
            return {
                nombre:  document.getElementById('swal-input1').value
            }    
        }
    })
    window.location.href = window.location.href+"?nombre="+formValues.nombre;
}

const modalBanco = async () => {
    const { value: formValues } = await Swal.fire({
        title: 'Agregar Nuevo Aliado',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          },
        confirmButtonColor: '#green',
        
        html:
            '<input id="swal-input1" class="swal2-input" placeholder="nombre">',
        focusConfirm: false,
        preConfirm: () => {
            return {
                nombre:  document.getElementById('swal-input1').value
            }    
        }
    })
    window.location.href = window.location.href+"?nombre="+formValues.nombre;
}