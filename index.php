<?php
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$baseurl = "http://" . $_SERVER['SERVER_NAME'] . $uri_parts[0];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Elect-o-matic Canada 2015</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta content="Elect-o-matic Canada 2015">
    
    <meta name="image_src" content="img/mahlowat_logo.png"/>
    <meta name="description" content="Elect-o-matic Canada 2105 helps you compare select thesis of political parties in Canada."/>
    
    <meta property="og:title" content="Elect-o-matic Canada 2015"/>
    <meta property="og:type"  content="website"/>
    <meta property="og:image" content="img/mahlowat_logo.png"/>
    <meta property="og:url"   content=""/>
    <meta property="og:site-name" content="canada2015.bundesnerdrichtendienst.de"/>
    <meta property="og:description" content="Elect-o-matic Canada 2105 helps you compare select thesis of political parties in Canada."/>
    
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <link href="shariff/shariff.min.css" rel="stylesheet">
    
    <script src="js/jquery-2.0.2.min.js"></script>
    
  </head>
  <body>
  
  <div class="container mow-container" style="margin-top:20px;">
  
  <div class="text-center">
  
    <img src="img/mahlowat_logo.png" title="Elect-o-matic logo"/>
    
    <h1><small>The</small> Elect-o-matic</h1>
  </div>
    <p>Elect-o-matic Canada 2105 helps you compare select thesis of political parties in Canada.</p>
    
    <p>Of course, this is just a stupid machine with no brain. As such, it cannot give you any recommandations who to vote for.</p>
    
    <p>All information presented on this page is provided without any guarentee regarding correctness.</p>
    
    <p class="text-center"><a class="btn btn-large btn-primary" href="mahlowat.php" title="Start the Elect-o-matic">Start the interview!</a></p>
    
    <p class="text-center"><a href="faq.php" title="Fragen und Antworten"><small>FAQ</small></a></p>
    
    
    
<!--    <div class="shariff" data-url="<?php echo $baseurl; ?>" data-referrer-track=null></div>
    <script src="shariff/shariff.min.js"></script>-->
  </div>
  
  </body>
</html>
