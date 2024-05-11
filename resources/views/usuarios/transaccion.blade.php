<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .form-container {
        max-width: 400px;
        margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="file"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('procesar.transaccion') }}" enctype="multipart/form-data" class="form-container">
        @csrf
    
        <div class="form-group">
            <label for="voucher">Voucher Bancario:</label>
            <input type="file" id="voucher" name="voucher" accept="image/*,.pdf" class="form-control">
            @error('voucher')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="calificacion">Calificación (1-5):</label>
            <input type="number" id="calificacion" name="calificacion" placeholder="Ingrese la calificación" min="1" max="5" class="form-control">
            @error('calificacion')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <input type="hidden" name="producto_id" value="{{ $productos->id }}">
        <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
    
        <button type="submit" class="btn-submit">Enviar</button>
    </form>
</body>
</html>
