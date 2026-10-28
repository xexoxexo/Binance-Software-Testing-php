<?php
require 'binance-test-helper.php';

$result = requestBinance('/api/v3/depth', [
    'symbol' => 'BTCUSDT',
    'limit' => 5
]);

check($result['status'] === 200, 'HTTP harus 200');
check(isset($result['body']['lastUpdateId']), 'lastUpdateId tidak tersedia');
check(count($result['body']['bids']) <= 5, 'Bids melebihi batas');
check(count($result['body']['asks']) <= 5, 'Asks melebihi batas');

echo "LULUS: Order book tersedia\n";