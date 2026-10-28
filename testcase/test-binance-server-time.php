<?php
require 'binance-test-helper.php';

$result = requestBinance('/api/v3/time');

check($result['status'] === 200, 'HTTP harus 200');
check(isset($result['body']['serverTime']), 'serverTime tidak tersedia');
check(is_int($result['body']['serverTime']), 'serverTime harus integer');

echo "LULUS: Waktu server tersedia\n";