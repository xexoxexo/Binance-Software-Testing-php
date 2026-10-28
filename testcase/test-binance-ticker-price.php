<?php
require 'binance-test-helper.php';

$result = requestBinance('/api/v3/ticker/price', [
    'symbol' => 'BTCUSDT'
]);

check($result['status'] === 200, 'HTTP harus 200');
check($result['body']['symbol'] === 'BTCUSDT', 'Simbol tidak sesuai');
check((float) $result['body']['price'] > 0, 'Harga harus lebih dari 0');

echo "LULUS: Harga BTCUSDT tersedia\n";