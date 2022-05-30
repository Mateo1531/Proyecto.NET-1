//Validar campos login

function resetUI(idModal){
    idModal[0].reset();
}

function msgBoxAlert(){

}
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }


  $(document).ready(function() {
    $("#msgAlert").hide();

  })



