<?php
require 'binance-test-helper.php';

$result = requestBinance('/api/v3/trades', [
    'symbol' => 'BTCUSDT',
    'limit' => 5
]);

check($result['status'] === 200, 'HTTP harus 200');
check(count($result['body']) === 5, 'Harus terdapat 5 transaksi');

foreach ($result['body'] as $trade) {
    check(isset($trade['id']), 'ID transaksi tidak tersedia');
    check((float) $trade['price'] > 0, 'Harga transaksi tidak valid');
    check((float) $trade['qty'] > 0, 'Jumlah transaksi tidak valid');
}

echo "LULUS: Transaksi terbaru tersedia\n";