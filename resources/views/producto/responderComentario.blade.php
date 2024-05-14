<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios del Producto</title>
    <!-- Estilos CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .comentario {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }

        .comentario p {
            margin: 0;
        }

        .comentario p.texto {
            font-size: 16px;
            line-height: 1.6;
        }

        .formulario {
            margin-top: 30px;
        }

        .formulario textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: none;
        }

        .formulario button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .formulario button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        @if ($comentarios->isEmpty())
            <p>No hay comentarios que responder para este producto.</p>
        @else
            @foreach ($comentarios as $comentario)
                <div class="comentario">
                    @if ($comentario->tipo === 'pregunta')
                        <p class="tipo">Pregunta del cliente {{ $nombres_compradores[$comentario->comprador_id] }}:</p>
                    @elseif ($comentario->tipo === 'respuesta')
                        <p class="tipo">Respuesta del vendedor {{ $nombres_compradores[$comentario->comprador_id] }}:</p>
                    @endif
                    <p class="texto">{{ $comentario->texto }}</p>
                </div>
            @endforeach
        @endif


        </section>
        <!--Agregar comentario-->
        <form action="{{ route('comentario') }}" method="post">
            @csrf
            <input type="hidden" name="id_producto" value="{{ $productos->id }}">
            <input type="hidden" name="comprador_id" value="{{ auth()->id() }}">
            <!-- Cambiar 'text' a 'textarea' y asegurarse de que el atributo sea 'name' -->
            <textarea name="texto" placeholder="Responde a la pregunta aqui" rows="4" cols="50"></textarea>
            <!-- Agregar campo oculto para el tipo con valor por defecto 'pregunta' -->
            <input type="hidden" name="tipo" value="respuesta">
            <button type="submit">Enviar respuesta</button>
        </form>
        <a href="/vistasVendedor/verProducto"><button>Regresar</button></a>
        
        
        
    </div>
</body>
</html>