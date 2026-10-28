<?php
require 'binance-test-helper.php';

$result = requestBinance('/api/v3/exchangeInfo', [
    'symbol' => 'BTCUSDT'
]);

check($result['status'] === 200, 'HTTP harus 200');
check(!empty($result['body']['symbols']), 'Data simbol kosong');
check(
    $result['body']['symbols'][0]['symbol'] === 'BTCUSDT',
    'Simbol harus BTCUSDT'
);

echo "LULUS: Informasi BTCUSDT tersedia\n";