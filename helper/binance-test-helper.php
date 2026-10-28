<?php

function requestBinance(string $endpoint, array $params = []): array
{
    $url = 'https://data-api.binance.vision' . $endpoint;

    if ($params) {
        $url .= '?' . http_build_query($params);
    }

    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTPHEADER => ['Accept: application/json'],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => 0
    ]);

    $body = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $error = curl_error($curl);
    curl_close($curl);

    if ($body === false) {
        throw new RuntimeException($error);
    }

    return [
        'status' => $status,
        'body' => json_decode($body, true)
    ];
}

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException("GAGAL: $message");
    }
}