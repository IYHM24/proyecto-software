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