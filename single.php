<?php
//chekeamos si es la pagina de buscar (y pillamos el parametro del post)

ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)'); 


if ((htmlspecialchars($_POST["q"])) != "")
{
    $postdata = http_build_query(
        array(
            'q' => htmlspecialchars($_POST["q"])
        )
    );

    $opts = array('https' =>
                  array(
                      'method'  => 'POST',
                      'header'  => 'Content-type: application/x-www-form-urlencoded',
                      'content' => $postdata
                  )
                 );

    $context  = stream_context_create($opts);	
}
else $context = stream_context_create(array('https' => array('timeout' => 5))); 

echo htmlspecialchars($_POST["q"]);



$url = file_get_contents('https://mac-torrent-download.net'.htmlspecialchars($_GET['page']), 0, $context);

$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($url);
$xpath = new DOMXPath($dom);


$div = $xpath->query('//section');
$sourcecode = $dom->saveHTML($div[0]);
$sourcecode=str_replace('<a href="#">Inicio','<a href="index.php">Inicio', $sourcecode);
$sourcecode=str_replace('https://mac-torrent-download.net/download.php','download.php', $sourcecode);
$sourcecode=str_replace('target="_blank"','target="_self"', $sourcecode);
$sourcecode=str_replace('href="https://mac-torrent-download.net/', 'target="_SELF" href="single.php?page=', $sourcecode);
$sourcecode=str_replace('href="mac-torrent-download.net/', 'target="_SELF" href="single.php?page=', $sourcecode);




include 'includes/header.php'; ?>

<div style="width:100%; margin-bottom: 20px;">
    <br/>
<br/>
<?php echo $sourcecode;?>
</div>




<?php include 'includes/footer.php'; ?>