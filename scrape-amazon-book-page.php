<?php
 
// Initialize curl
$ch = curl_init();
 
$myurl = 'https://www.amazon.com/...';

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.21 (KHTML, like Gecko) Chrome/19.0.1042.0 Safari/535.21");
curl_setopt($ch,CURLOPT_ENCODING , "");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

// URL for Scraping
curl_setopt($ch, CURLOPT_URL,$myurl);
 
// Return Transfer True
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
$output = curl_exec($ch);
 
// Closing cURL
curl_close($ch);

echo file_put_contents("/home/xxxxx/amazon-book-page.html",$output);
//echo "$output";
 
?>

