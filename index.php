<?php ini_set('session.use_cookies', '0'); ?>
<!doctype html>
<html>
<head>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
<!-- jidenticon JS -->
<script src="//cdn.jsdelivr.net/jdenticon/1.3.2/jdenticon.min.js" async></script>
<title>container-info</title>
</head>
<body>
<?php
//  error_log("[ERROR]: testing die() function...", 0);
//  die();
?>
<div class="container">
<div class="row">
<div class="col s2">&nbsp;</div>
<div class="col s8">


<!-- -------------------------- -->
<!-- !!! CHANGE COLOR BELOW !!! -->

<div class="card purple">

<!-- !!! CHANGE COLOR ABOVE !!! -->
<!-- -------------------------- -->


<div class="card-content white-text">
<div class="card-title">container-info</div>
</div>
<div class="card-content white">
<table class="bordered">
  <tbody>
        <tr>
          <td>Country</td>
          <td>
		<?php
			$url = "http://ipinfo.io/country";  
			$ch = curl_init();  

			// set URL and other appropriate options  
			curl_setopt($ch, CURLOPT_URL, $url);  
			curl_setopt($ch, CURLOPT_HEADER, 0);  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  

			// grab URL and pass it to the browser  

			$country_code = curl_exec($ch);  

			echo "<img height='50%' src='images/".$country_code.".png' />";

			// close curl resource, and free up system resources  
			curl_close($ch);  
		?>
	  </td>
        </tr>
        <tr>
          <td>Hostname</td>
          <td><?php echo gethostname(); ?></td>
        </tr>
        <tr>
          <td>IP</td>
          <td><?php echo $_SERVER['SERVER_ADDR']; ?></td>
        </tr>
        <tr>
          <td>Organization</td>
          <td>
                <?php
                        $url = "http://ipinfo.io/org";
                        $ch = curl_init();

                        // set URL and other appropriate options
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                        // grab URL and pass it to the browser

                        $org = curl_exec($ch);

			if (strpos($org, 'Cronos') !== false) {
			    echo "<img height='50px' src='images/org-cronos.png' />"; 
			}
			else if (strpos($org, 'Amazon') !== false) {
			    echo "<img height='50px' src='images/org-aws.png' />"; 
			}
			else if (strpos($org, 'Mobistar') !== false) {
			    echo "<img height='50px' src='images/org-orange.png' />"; 
			}
                        else {
			    echo $org;
                        }

                        // close curl resource, and free up system resources
                        curl_close($ch);
                ?>
          </td>
        </tr>
	<tr>
          <canvas width="150" height="150" data-jdenticon-hash="<?php echo hash('sha256', gethostname()); ?>"></canvas> 
	</tr>
  </tbody>
</table>
</div>
</div>
<div class="col s2">&nbsp;</div>
</div>
</div>
</html>
