<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir Examen</title>
</head>

<body class="bg-gray-100 text-gray-800">
    <main class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Adjuntar Examen</h1>

            <form action="{{ route('anadir.examen', $alumno->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium mb-2">Selecciona el examen a adjuntar:</label>
                    <select name="examen_id" required
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option disabled selected>Selecciona el examen</option>
                        @foreach ($examenes as $examen)
                            <option value="{{ $examen->id }}" {{ $alumno->examen_id == $examen->id ? 'selected' : '' }}>
                                {{ $examen->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('index.alumnos') }}" class="text-sm text-gray-600 hover:underline">
                        ← Volver
                    </a>

                    <button type="submit"
                            class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
