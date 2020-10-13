@extends('layouts.front')
@section('title', 'Preguntas frecuentes')
@section('content')
<div class="questions-wrapper">
    <h2>Preguntas frecuentes</h2>
    <div class="frequent-questions">
        <div class="question-item">
            <div class="header">
                <span class="fa fa-question-circle left-icon"></span>
                <p>¿Cuánto cuesta?</p>
                <span class="collapse-btn fa fa-angle-down"></span>
            </div>
            <div class="collapse-body">
                <p>La inversión depende del precio establecido del curso que has elegido, todos incluyen IGV.</p>
            </div>
        </div>

        <div class="question-item">
            <div class="header">
                <span class="fa fa-question-circle left-icon"></span>
                <p>¿Podré hacer preguntas y tener soporte?</p>
                <span class="collapse-btn fa fa-angle-down"></span>
            </div>
            <div class="collapse-body">
                <p>Claro que sí, las clases tienen activadas un foro para lanzar preguntas que la docente responde de lunes a viernes. La escuela también cuenta con un área de tutoría, que podrá atenderte a través del correo <a href="mailto:tutoria@escueladeproyectistas.com">tutoria@escueladeproyectistas.com</a> </p>
            </div>
        </div>
        <div class="question-item">
            <div class="header">
                <span class="fa fa-question-circle left-icon"></span>
                <p>¿Está ya todo el contenido y clases subidos a la Escuela?</p>
                <span class="collapse-btn fa fa-angle-down"></span>
            </div>
            <div class="collapse-body">
                <p>En la Escuela encontrarás ya todas las clases que ves en el temario de esta página, y lo puedes ver y consultar todo cuando desees. </p>
            </div>
        </div>

        <div class="question-item">
            <div class="header">
                <span class="fa fa-question-circle left-icon"></span>
                <p>¿Cómo recibiré mi boleta o factura?</p>
                <span class="collapse-btn fa fa-angle-down"></span>
            </div>
            <div class="collapse-body">
                <p>Recibirás tu boleta o factura directamente por email al día siguiente de realizada la compra. </p>
            </div>
        </div>

        <div class="question-item">
            <div class="header">
                <span class="fa fa-question-circle left-icon"></span>
                <p>¿Hay devolución del dinero?</p>
                <span class="collapse-btn fa fa-angle-down"></span>
            </div>
            <div class="collapse-body">
                <p>No ofrecemos devolución de dinero. Hemos creado la Escuela con mucho contenido de alta calidad y muy práctico a un precio realmente asequible, pues nuestro objetivo es que todos se puedan formar con calidad. </p>
            </div>
        </div>

        <div class="question-item">
            <div class="header">
                <span class="fa fa-question-circle left-icon"></span>
                <p>¿Puedo ver las clases desde el teléfono o la tablet?</p>
                <span class="collapse-btn fa fa-angle-down"></span>
            </div>
            <div class="collapse-body">
                <p>Sí, puedes ver las clases desde la computadora, el smartphone o tu tablet. Utilizamos 2 plataformas: ZOOM y MOODILE y ambas puedes verlas desde la web en cualquier aparato. Debes tener conexión a Internet suficientemente buena para poder reproducir vídeos.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

    let collapsesBtn = document.getElementsByClassName("collapse-btn");

    for (let i = 0; i < collapsesBtn.length; i++) {

        collapsesBtn[i].addEventListener("click", function() {
            
            let currentBodyCollapse = this.parentElement.nextElementSibling;

            for (let elementCollapse of document.getElementsByClassName("collapse-body")){
                
                if(elementCollapse != currentBodyCollapse) elementCollapse.style.display = "none";
                
            }

            if (currentBodyCollapse.style.display === "block") {

                currentBodyCollapse.style.display = "none";

            } else {

                currentBodyCollapse.style.display = "block";

            }
        });
    }
</script>
@endsection