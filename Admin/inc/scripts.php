<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

 function alert(type, msg, position='body'){
    let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
    let element = document.createElement('div');
    element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show" style="position: fixed; top: 80px; right: 25px; role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"  aria-label="Close"></button>
        </div>
    `;

    if (position === 'body') {
        document.body.appendChild(element);
    } else {
        document.getElementById(position).appendChild(element);
    }

    setTimeout(remAlert, 2000);
}

function remAlert(){
    let alertElement = document.querySelector('.alert');
    if (alertElement) {
        alertElement.remove();
    }
}

function setActive(){
    let navbar = document.getElementById('dashboard-menu');
    let a_tags = narvar.getElementById('a');

    for (i =0; i<a_tags.length; i++ ) {
        let file = a_tags[i].href.split('/').pop();
        let file_name = file.split('.')[0];
        
        if(document.location.href.index(file_name) >= 0){
            a_tags[i].classList.add('active');
        }
    }
}

setActive();

</script>