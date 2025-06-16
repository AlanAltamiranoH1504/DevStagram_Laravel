<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Prohibido</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600,800" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-300 flex items-center justify-center min-h-screen p-4">
<div class="bg-white shadow-2xl rounded-3xl p-10 max-w-md text-center border border-gray-200">
    <div class="text-red-500">
        <svg class="mx-auto h-20 w-20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2.25M12 15h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
        </svg>
    </div>
    <h1 class="text-5xl font-extrabold text-gray-800 mt-4 mb-2">403</h1>
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Acceso Denegado</h2>
    <p class="text-gray-500 mb-6">No tienes permiso para acceder a esta sección.</p>
    <a href="{{ route("home-devStagram") }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition">
        Volver al inicio
    </a>
</div>
</body>
</html>
