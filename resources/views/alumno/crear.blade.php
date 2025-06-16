<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir Alumno</title>
</head>

<body class="bg-gray-100 text-gray-800">
    <main class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-xl">
            <h1 class="text-2xl font-bold mb-6 text-center">Añadir Alumno</h1>

            <form action="{{ route('anadir.alumno.crear') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1">Nombres del alumno:</label>
                    <input type="text" name="nombres" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Apellidos del alumno:</label>
                    <input type="text" name="apellidos" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Edad del alumno:</label>
                    <input type="number" name="edad" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <p class="text-sm font-medium mb-2">Selecciona el género:</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($generos as $genero)
                            <label class="inline-flex items-center space-x-2">
                                <input type="radio" name="genero_id" value="{{ $genero->id }}"
                                    class="text-blue-600 focus:ring-blue-500">
                                <span>{{ $genero->genero }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Correo del alumno:</label>
                    <input type="email" name="correo" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Dirección del alumno:</label>
                    <input type="text" name="direccion" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('index.alumnos') }}" class="text-sm text-gray-600 hover:underline">
                        ← Volver
                    </a>
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition">
                        Añadir Alumno
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>