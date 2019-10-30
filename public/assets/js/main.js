(function(){
    let form = document.querySelectorAll('.destroy');
    
    for (var i = form.length - 1; i >= 0; i--) {
        form[i].addEventListener('submit', function(event){
        let confirmacion = confirm('¿Seguro qué quieres borrar?');
        if (!confirmacion) {
            event.preventDefault();
        }
        });
    }
})();