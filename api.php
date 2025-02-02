<?php
header('Content-Type: application/json');

if (!isset($_GET['url'])) {
    echo json_encode(['error' => 'No URL provided']);
    exit;
}

$url = $_GET['url'];

function getHttpStatusCode($url) {
    $ch = curl_init();

    // 检查URL合法性
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return ['error' => 'Invalid URL'];
    }

    // 随机选择一个User-Agent
    $userAgents = [
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
        'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.1 Safari/605.1.15',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0'
    ];
    $userAgent = $userAgents[array_rand($userAgents)];

    // 设置CURL选项
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // 自动跟随重定向
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); // 设置随机User-Agent
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 忽略SSL验证错误
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8',
        'Accept-Language: en-US,en;q=0.5',
        'Connection: keep-alive',
        'Cache-Control: max-age=0'
    ]);
    curl_setopt($ch, CURLOPT_COOKIEFILE, ''); // 使用临时Cookie处理

    // 执行请求
    curl_exec($ch);

    // 检查是否发生错误
    if (curl_errno($ch)) {
        $error = curl_error($ch);
        curl_close($ch);
        return ['error' => 'cURL error: ' . $error];
    }

    // 获取HTTP状态码
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    return ['status_code' => $httpCode];
}

// 获取状态码
$response = getHttpStatusCode($url);

// 输出结果
echo json_encode(['url' => $url] + $response);
?>
