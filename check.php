<html>
<head>
   <title>Home</title>
   <script src="//www.google.com/jsapi?key=ABQIAAAA5El50zA4PeDTEMlv-sXFfRSsTL4WIgxhMZ0ZK_kHjwHeQuOD4xTdBhxbkZWuzyYTVeclkwYHpb17ZQ"></script>
   <script type="text/javascript">
      var ge;      
      google.load("earth", "1");

      function init() {
         google.earth.createInstance('map3d', initCB, failureCB);
      }

      function initCB(instance) {

         ge = instance;
         ge.getWindow().setVisibility(true);
         ge.getNavigationControl().setVisibility(ge.VISIBILITY_SHOW);

         placemark = ge.createPlacemark('');
         var point = ge.createPoint('');
         point.setLatitude(-33);
         point.setLongitude(151);
         placemark.setGeometry(point);
         placemark.setDescription('This is a feature balloon, '
                                  + 'showing the feature\'s description. '
                                  + 'To show the HTML string balloon when '
                                  + 'this feature is clicked, see '
                                  + '<a href="/apis/earth/documentation/'
                                  + 'balloons.html#appear_when_clicked">'
                                  + 'Making your HTML balloon appear when '
                                  + 'a feature is clicked</a>.'); 
         ge.getFeatures().appendChild(placemark);

         // Show an HTML string balloon, overriding the feature's
			// description when showing a balloon with setBalloon.
         var balloon = ge.createHtmlStringBalloon('');
         balloon.setFeature(placemark); // optional
         balloon.setContentString('Sydney Opera House');
         balloon.setBackgroundColor('#999999');
         ge.setBalloon(balloon);

         // Move the camera.
         var la = ge.createLookAt('');
         la.set(12.345, 54.321, 0, ge.ALTITUDE_RELATIVE_TO_GROUND, -8.541, 66.213, 10000);
         ge.getView().setAbstractView(la);

      }

      function failureCB(errorCode) {
      }

      google.setOnLoadCallback(init);
   </script>
   

</head>
<body bgcolor="green">

   <div id="map3d" style="height:400px; width:600px;">
  <?php
require('Panoramio.php');

$panoramioClass = new panoramioAPI();
$localImages = $panoramioClass->getPanoramioImages();

if (!empty($localImages)) {
$imageTemplate = file_get_contents('show_image1.phtml');
foreach($localImages as $localImage) {
$imageDisplay = str_replace('{image_url}', $localImage->photo_file_url, $imageTemplate);
$imageDisplay = str_replace('{photo_url}', $localImage->photo_url, $imageDisplay);	
$imageDisplay = str_replace('{photo_title}', $localImage->photo_title, $imageDisplay);	
echo $imageDisplay;	
}
}

if ($_POST['ans']==$localImage->photo_title)
{
echo '<h1>Ohh!you are correct.The Exact Location is as below<h1>';

}
else { echo '<h1>Sorry You are wrong.The Exact Location is as below.<h1>';

}
?>
</div>

</body>
</html>