<!DOCTYPE html>
<html>
    <head>
    <title>Uule Kodu Hesaplayıcı</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>

        body {
            background-image: url(https://images.pexels.com/photos/3137052/pexels-photo-3137052.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>

    <h1>Uule Kodu Hesaplayıcı</h1>
    <form method="POST" id="form">
        <label for="city">Şehir:</label>
        <input type="text"  class="form-control" id="city" value="istanbul,istanbul,türkiye" name="city" required/><br><br>
        <label for="searchname">Arama Cümlesi</label>
        <input type="text" class="form-control" id="searchkelime"  name="searchkelime" required/><br><br>
        <button type="submit">UUİD Hazırla</button>
    </form>


</body>
</html>

<?php
if (isset($_POST["city"])) {
    // Ebubekir Bastama https://www.ebubekirbastama.com
    $ch = curl_init();
    $Veri = htmlspecialchars($_POST["city"]);
    $searchkelime = htmlspecialchars($_POST["searchkelime"]);

    // Ebubekir Bastama 
    curl_setopt($ch, CURLOPT_URL, 'https://site-analyzer.pro/pages/services-seo/uule/search.php?city=' . $Veri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Accept: */*';
    $headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Cache-Control: no-cache';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Pragma: no-cache';
    $headers[] = 'Referer: https://site-analyzer.pro/services-seo/uule/';
    $headers[] = 'Sec-Fetch-Dest: empty';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    $headers[] = 'X-Requested-With: XMLHttpRequest';
    $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"110\", \"Not(A:Brand\";v=\"8\", \"Chromium\";v=\"110\"';
    $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
    $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    curl_close($ch);
    echo '<br>';
    echo ' <p id="result"><a target="_blank" href="https://www.google.com/search?q=' . urldecode($searchkelime) . '&uule=' . json_decode($result)->json->ct . '">https://www.google.com/search?q=' . urldecode($searchkelime) . '&uule=' . json_decode($result)->json->ct . '</a></p>';
}
?>
    
