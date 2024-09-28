<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class AIService
{
    protected $httpClient;
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->httpClient = new Client();
        $this->apiKey = env('AI_API_KEY'); // Assuming the API key is stored in the .env file
        $this->apiUrl = env('AI_API_URL'); // Assuming the API URL is stored in the .env file
    }

    /**
     * Generate a new question using the AI API.
     *
     * @param string $subject
     * @return string
     */
    public function generateQuestion($subject)
    {
        try {
            $response = $this->httpClient->post($this->apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'prompt' => "Generate a question for the subject: $subject",
                    'max_tokens' => 150,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            return $data['choices'][0]['text'] ?? 'No question generated';
        } catch (\Exception $e) {
            Log::error('Error generating question: ' . $e->getMessage());
            return 'Error generating question';
        }
    }

    /**
     * Generate an explanation for a given question using the AI API.
     *
     * @param string $question
     * @return string
     */
    public function generateExplanation($question)
    {
        try {
            $response = $this->httpClient->post($this->apiUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'prompt' => "Provide an explanation for the question: $question",
                    'max_tokens' => 300,
                ],
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            return $data['choices'][0]['text'] ?? 'No explanation generated';
        } catch (\Exception $e) {
            Log::error('Error generating explanation: ' . $e->getMessage());
            return 'Error generating explanation';
        }
    }
}

