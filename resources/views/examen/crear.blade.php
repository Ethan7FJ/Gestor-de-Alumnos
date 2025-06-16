<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Examen</title>
</head>

<body class="bg-gray-100 text-gray-800">
    <main class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Crear Examen</h1>

            <form action="{{ route('examen.anadir') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-2">Título del examen:</label>
                    <input type="text" name="nombre" required
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <p class="text-sm font-semibold mb-2">Selecciona las preguntas:</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 max-h-64 overflow-y-auto border border-gray-200 rounded p-3">
                        @foreach ($preguntas as $pregunta)
                            <label class="flex items-center space-x-2 text-sm">
                                <input type="checkbox" name="pregunta_id[]" value="{{ $pregunta->id }}"
                                       class="accent-blue-600">
                                <span>{{ $pregunta->pregunta }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-between items-center">

                    <a href="{{ route('index.alumnos') }}" class="text-sm text-gray-600 hover:underline">
                        ← Volver
                    </a>

                    <button type="submit"
                            class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                        Crear Examen
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
