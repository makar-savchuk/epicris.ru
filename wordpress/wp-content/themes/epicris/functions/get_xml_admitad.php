<?php

$url = 'https://export.admitad.com/ru/webmaster/websites/1060502/coupons/export/?website=1060502&code=5c209c135e&keyword=&language=&region=RU&only_my=on&user=SmallBull&format=xml&v=1';

define('BASEPATH', str_replace('\\', '/', dirname(__FILE__)) . '/'); # путь до каталога с исполняемым файлом
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); # файл, который надо получить с удаленного сервера
curl_setopt($ch, CURLOPT_TIMEOUT, 300);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$st = curl_exec($ch);
$fd = @fopen(BASEPATH . '/xmls/cupons.xml', "w"); # название файла на этом сервере
fwrite($fd, $st);
@fclose($fd);
echo 'XML выгрузка с купонами получена и загружена на сайт';
curl_close($ch);

?>