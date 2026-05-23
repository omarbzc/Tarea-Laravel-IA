<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IA Local</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold mb-6 text-blue-600">Consulta a la IA Local</h1>
        
        <div class="mb-6 p-4 bg-gray-50 border-l-4 border-blue-500 text-sm text-gray-600">
            <p><strong>Contexto fijo:</strong> {{$contexto}}</p>

        </div>

        <form action="{{ route('ia.procesar') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="prompt" class="block text-sm font-medium text-gray-700 font-bold mb-2">Texto a procesar:</label>
                <textarea name="prompt" id="prompt" rows="8" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 border p-3" 
                    required>{{ $prompt ?? '' }}</textarea>
                @error('prompt')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                    class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Generar Resultado
                </button>
            </div>
        </form>

        @isset($resultado)
            <div class="mt-8 p-6 bg-blue-50 border border-blue-200 rounded-lg shadow-inner">
                <h3 class="text-lg font-semibold text-blue-800 mb-3 underline">Resultado de la IA:</h3>
                <div class="prose max-w-none text-gray-700 whitespace-pre-wrap leading-relaxed">{{ $resultado }}</div>
            </div>
        @endisset

        <div class="mt-8 pt-6 border-t border-gray-200 text-xs text-gray-400 text-center">
            <p>Tarea AE-6.10: Integración de Laravel con Modelos de IA Locales</p>
        </div>
    </div>
</body>
</html>
