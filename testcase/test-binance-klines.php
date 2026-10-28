<?php
require 'binance-test-helper.php';

$result = requestBinance('/api/v3/klines', [
    'symbol' => 'BTCUSDT',
    'interval' => '1h',
    'limit' => 5
]);

check($result['status'] === 200, 'HTTP harus 200');
check(count($result['body']) === 5, 'Harus terdapat 5 candlestick');

foreach ($result['body'] as $candle) {
    check(count($candle) >= 12, 'Struktur candlestick tidak lengkap');
}

echo "LULUS: Data candlestick tersedia\n";