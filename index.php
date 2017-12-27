<?php 

ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)'); 

$context = stream_context_create(array('https' => array('timeout' => 5)));

$url = file_get_contents('https://mac-torrent-download.net'.htmlspecialchars($_GET['page']), 0, $context);

$dom = new DOMDocument();

libxml_use_internal_errors(true);

$dom->loadHTML($url);

$xpath = new DOMXPath($dom);

$div1 = $xpath->query('//section');
$sourcecode = $dom->saveHTML($div1[0]);
$sourcecode=str_replace('<dt onmousedown="return false;" onselectstart="return false" oncontextmenu="return false;">','<dt>', $sourcecode);
$sourcecode=str_replace('href="https://mac-torrent-download.net/page', 'target="_SELF" href="index.php?page=/page', $sourcecode);
$sourcecode=str_replace('href="https://mac-torrent-download.net', 'href="single.php?page=', $sourcecode);
$sourcecode=str_replace('target="_blank"','target="_self"', $sourcecode);

$div2 = $xpath->query('//div[@id="pagination"]');
$paginacionID = $dom->saveHTML($div2[0]);
//pagina 1 en paginacion
$cadena =  '<a href='.$_SERVER['PHP_SELF'].' class="inactive">1</a>' ;
$paginacionID=str_replace('<a href="https://mac-torrent-download.net/" class="inactive">1</a>',$cadena , $paginacionID);
$paginacionID=str_replace('href="https://mac-torrent-download.net/page', 'target="_SELF" href="index.php?page=/page', $paginacionID);


$div3 = $xpath->query('//div[@class="pagination"]');
$paginacionClass = $dom->saveHTML($div3[0]);

$paginacionClass=str_replace('href="https://mac-torrent-download.net', 'target="_SELF" href="index.php?page=', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/os/page', 'target="_SELF" href="index.php?page=/category/os/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/game/page', 'target="_SELF" href="index.php?page=/category/game/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/design-assets/page', 'target="_SELF" href="index.php?page=/category/design-assets/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/design-assets/fonts/page', 'target="_SELF" href="index.php?page=/category/design-assets/fonts/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/apple/page', 'target="_SELF" href="index.php?page=/category/application/apple/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/video/page', 'target="_SELF" href="index.php?page=/category/application/video/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/music/page', 'target="_SELF" href="index.php?page=/category/application/music/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/photography/page', 'target="_SELF" href="index.php?page=/category/application/photography/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/graphics-design/page', 'target="_SELF" href="index.php?page=/category/application/graphics-design/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/productivity/page', 'target="_SELF" href="index.php?page=/category/application/productivity/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/utilities/page', 'target="_SELF" href="index.php?page=/category/application/utilities/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/business/page', 'target="_SELF" href="index.php?page=/category/application/business/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/developer-tools/page', 'target="_SELF" href="index.php?page=/category/application/developers-tools/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/editor/page', 'target="_SELF" href="index.php?page=/category/application/editor/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/education/page', 'target="_SELF" href="index.php?page=/category/application/education/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/entertainment/page', 'target="_SELF" href="index.php?page=/category/application/entertainment/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/health-fitness/page', 'target="_SELF" href="index.php?page=/category/application/health-fitness/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/lifestyle/page', 'target="_SELF" href="index.php?page=/category/application/lifestyle/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/news/page', 'target="_SELF" href="index.php?page=/category/application/news/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/office/page', 'target="_SELF" href="index.php?page=/category/application/office/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/reference/page', 'target="_SELF" href="index.php?page=/category/application/reference/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/social-network/page', 'target="_SELF" href="index.php?page=/category/application/social-network/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/weather/page', 'target="_SELF" href="index.php?page=/category/application/weather/page', $paginacionClass);
$paginacionClass=str_replace('href="https://mac-torrent-download.net/category/application/travel/page', 'target="_SELF" href="index.php?page=/category/application/traves/page', $paginacionClass);

?>

<?php include 'includes/header.php';?>


<div style="margin-bottom:20px;">
<?php echo $paginacionClass;?>
<br/>
<br/>
</div>
<div style="width:100%; display:block;">
    <br/>
<br/>
<?php echo $sourcecode;?>
</div>

<div style="margin-bottom:20px;">
<?php echo $paginacionClass;?>
<br/>
<br/>
</div>
<?php include 'includes/footer.php';?>


