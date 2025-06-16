<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Alumno</title>
</head>

<body class="bg-gray-100 text-gray-800">
    <main class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-xl">
            <h1 class="text-2xl font-bold mb-6 text-center">Editar Alumno</h1>

            <form action="{{ route('alumno.actualizar', $alumno->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium mb-1">Nombres del alumno</label>
                    <input type="text" name="nombres" value="{{ old('nombres', $alumno->nombres) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Apellidos del alumno</label>
                    <input type="text" name="apellidos" value="{{ old('apellidos', $alumno->apellidos) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Edad</label>
                    <input type="number" name="edad" value="{{ old('edad', $alumno->edad) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Género</label>
                    <select name="genero_id"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option disabled>Selecciona el género del alumno</option>
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->id }}" {{ $alumno->genero_id == $genero->id ? 'selected' : '' }}>
                                {{ $genero->genero }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Correo electrónico</label>
                    <input type="email" name="correo" value="{{ old('correo', $alumno->correo) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Dirección</label>
                    <input type="text" name="direccion" value="{{ old('direccion', $alumno->direccion) }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('index.alumnos') }}" class="text-gray-600 hover:underline text-sm">← Volver</a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition duration-200">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
