<?php
header('Content-Type: text/html; charset=UTF-8');

$rss = simplexml_load_file('http://expansion.feedsportal.com/rss/empresastmt.xml');
$feed1 = json_encode($rss);
$feed2 = json_decode($feed1);
$output = [];

foreach ($feed2->channel->item as $key=>$value) {
  //Make an array with title and links
  $output[$key]= [$feed2->channel->item[$key]->title,$feed2->channel->item[$key]->link];
}

  //var_dump($feed2['channel']['item'][$key]);


//echo $feed2->channel->item[1]->link;
echo '----<pre>';
//var_dump($feed2->channel->item[0]->link);
var_dump($output);
//INTERESANTE PARA VER ESTRUCTURA ENTERA
//var_dump($feed2);
//print_r($feed2->channel->item[0]->link);
echo '</pre>';

?>
