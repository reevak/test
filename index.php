<?php
header('Content-Type: text/html; charset=UTF-8');
echo '<pre>';

//LIST OF RSS FEEDS
$news= ['Expansion' => [['TMT','http://expansion.feedsportal.com/rss/empresastmt.xml'],
                        ['Digitech', 'http://expansion.feedsportal.com/rss/empresasdigitech.xml'],
                        ['Economia','http://expansion.feedsportal.com/rss/economia.xml']],
        'Invertia' => [['Portada','http://www.invertia.com/rss/rss-portada-invertia.asp'],
                        ['Noticias', 'http://www.invertia.com/rss/rss-portada-noticias-invertia.asp']]];

//ARRAY THAT WILL CONTAIN ONLY TITLES AND LINKS OF EACH RSS


//THE FUNCTION CAN RUN FOR BOTH NEWSPAPERS
function convert_xml ($feed) {
  //TURN XML INTO PHP OBJECT AND ARRAYS
  $rss = json_decode(json_encode(simplexml_load_file($feed)));

  foreach ($rss->channel->item as $key=>$value) {
    //MAKE CUSTOM ARRAY READY FOR DATABASE TAKING LINKS AND TITLES ONLY
    $output[$key]= [$rss->channel->item[$key]->title,$rss->channel->item[$key]->link,$rss->channel->pubDate];
  }
  return $output;
}

//ITERATE THROUGH THE NEWSPAPERS
foreach ($news as $key => $value) {
  //ITERATE THROUGH THE RSS
  foreach ($news[$key] as $val) {
    $clean_rss[$key] = convert_xml($val[1]);
  }
}

var_dump($clean_rss);
echo '</pre>';
?>
