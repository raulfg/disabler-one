<?php
include 'includes/header.php';
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
    $user_agent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36';
	curl_setopt($ch, CURLOPT_USERAGENT,$user_agent);
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$url = get_data('https://mac-torrent-download.net/download.php?'.$_SERVER['QUERY_STRING']);

$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($url);
$xpath = new DOMXPath($dom);

$div1 = $xpath->query('//div[@class="img-center"]');
$sourcecode = $dom->saveHTML($div1[0]);
$sourcecode=str_replace('target="_blank"','target="_self"', $sourcecode);
$sourcecode=str_replace('href="https://mac-torrent-download.net/', 'target="_SELF" href="single.php?page=/', $sourcecode);

echo $sourcecode;


include 'includes/footer.php';
?>