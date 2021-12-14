<?php
$limited = 0;
if(isset($_GET["r"])){
$x = file_get_contents("https://www.reddit.com/r/".$_GET["r"]."/.json?&show=all&limit=100");
} else {
$x = file_get_contents("https://www.reddit.com/r/dankmemes/.json?&show=all&limit=100");
}
$decoded = json_decode($x);
$randhaxx = rand(0, 101);

if(isset($_GET["n"])){
$randh = $_GET["n"];
} else {
$randh = strval($randhaxx);
}
$resurl = $decoded->data->children[$randh]->data->url;
$title = $decoded->data->children[$randh]->data->title;
$author = $decoded->data->children[$randh]->data->author;
$self = $decoded->data->children[$randh]->data->selftext;
$type = substr($resurl, -3);
if($type == "jpg" || $type == "png" || $type == "gif" ||  $type == "ico" || $type == "bmp" || $type == "peg" || $limited == 0){
echo "<title>" . $title . " (". $author . ")</title> <meta name='description' content='" . $self . "...'><meta name='og:image' content='" . $resurl . "'> <h1>". $title . " (". $author . ")</h1>" . $self ."<br><img style='max-width: 50%; max-height: 50%;' src='" . $resurl . "'>";
} else {
echo "An error occurred and our system had selected a post without an image. Please try again!";
}
?>