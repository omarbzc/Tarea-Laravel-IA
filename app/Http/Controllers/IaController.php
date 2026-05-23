<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class IaController extends Controller
{

    // 1. Define el contexto fijo para la IA, como por ejemplo resumir textos o traducirlos a un idioma específico
    private string $contexto = "";


    public function mostrarFormulario()
    {
        return view('ia.formulario', [
            'contexto' => $this->contexto
        ]);
    }

    public function procesarIa(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|min:3',
        ]);

        $prompt = $request->input('prompt');

        // 2. Configurar el cliente manualmente para asegurar que usa el endpoint local
        $baseUrl = env('');
        $apiKey = env('');

        $client = OpenAI::factory()
            ->withApiKey($apiKey)
            ->withBaseUri($baseUrl)
            ->make();

        try {
            // 3. Definid el modelo a usar
            $response = $client->chat()->create([
                'model' => '',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => $this->contexto
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ],
                ],
                'temperature' => 0.7,
            ]);

            $resultado = $response->choices[0]->message->content;
        } catch (\Exception $e) {
            $resultado = "Error de conexión: " . $e->getMessage() . ". Asegúrate de que Ollama esté corriendo y configurado correctamente en tu .env (Base URL: {$baseUrl})";
        }

        // 4. Devolver a la vista con el resultado, el prompt y el contexto
        return view('ia.formulario', [
            'resultado' => $resultado,
            'prompt' => $prompt,
            'contexto' => $this->contexto
        ]);
    }
}
