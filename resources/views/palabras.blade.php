@include('header')
<div class="container">
    <div class="informacion">
        Estimado usuario, sus palabras posibles con las letras que ingreso son las siguientes 
    </div>
    <ul>
        @foreach ($palabrasMostrar as $palabra)
            <li>{{ $palabra }}</li>
        @endforeach
    </ul>
    
</div>
