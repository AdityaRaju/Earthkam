<html>
<head>
   <title>index</title>
   </head>
<body bgcolor="green">
<h1 align="center">EarthKam Image Quiz & 3D Model</h1>
<form method="post" action="check.php">
<?php
require('Panoramio.php');

$panoramioClass = new panoramioAPI();
$localImages = $panoramioClass->getPanoramioImages();

if (!empty($localImages)) {
$imageTemplate = file_get_contents('show_image.phtml');
foreach($localImages as $localImage) {
$imageDisplay = str_replace('{image_url}', $localImage->photo_file_url, $imageTemplate);
$imageDisplay = str_replace('{photo_url}', $localImage->photo_url, $imageDisplay);	
$imageDisplay = str_replace('{photo_title}', $localImage->photo_title, $imageDisplay);	
echo $imageDisplay;	
echo '<h2>can u guess the location where it is?';
echo '<input type="text" name="ans">';
echo '<input type="submit" value="Check"></h2>';

}
}
?>



</form>
</body>



