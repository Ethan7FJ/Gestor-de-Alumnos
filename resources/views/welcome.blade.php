<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-center">Listado de Alumnos de la clase 1A</h1>

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Apellidos</th>
                    <th class="py-3 px-4 text-left">Edad</th>
                    <th class="py-3 px-4 text-left">Género</th>
                    <th class="py-3 px-4 text-left">Correo</th>
                    <th class="py-3 px-4 text-left">Dirección</th>
                    <th class="py-3 px-4 text-left">Examen</th>
                    <th class="py-3 px-4 text-center">Añadir Examen</th>
                    <th class="py-3 px-4 text-center">Editar</th>
                    <th class="py-3 px-4 text-center">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-2 px-4">{{ $alumno->nombres }}</td>
                        <td class="py-2 px-4">{{ $alumno->apellidos }}</td>
                        <td class="py-2 px-4">{{ $alumno->edad }}</td>
                        <td class="py-2 px-4">{{ optional($alumno->genero)->genero ?? 'Sin género' }}</td>
                        <td class="py-2 px-4">{{ $alumno->correo }}</td>
                        <td class="py-2 px-4">{{ $alumno->direccion }}</td>
                        <td class="py-2 px-4">{{ optional($alumno->examen)->nombre ?? 'Sin examen' }}</td>
                        <td class="py-2 px-4 text-center">
                            <a href="{{ route('adjuntar', $alumno->id) }}" class="text-blue-600 hover:underline">Añadir</a>
                        </td>
                        <td class="py-2 px-4 text-center">
                            <a href="{{ route('editar', $alumno->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                        </td>
                        <td class="py-2 px-4 text-center">
                            <form action="{{ route('alumno.eliminar', $alumno->id) }}" method="POST"
                                  onsubmit="return confirm('¿Estas seguro de querer eliminar al estudiante {{ $alumno->nombres }} {{ $alumno->apellidos }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-between mt-8">
            <a href="{{ route('crear.examen') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Crear Examen
            </a>

            <a href="{{ route('alumno.crear') }}"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                Añadir Alumno
            </a>
        </div>
    </div>
</body>

</html>
