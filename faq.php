<?php 
	isset($_GET['from']) ? $back = $_GET['from'] : $back = "index.php";
	if($back != 'index.php' and substr($back, 0, 14) != 'multiplier.php' and substr($back, 0, 10) != 'result.php' and substr($back, 0, 12) != 'mahlowat.php'){
		$back = "index.php";
	}
	
	$answerstring = '';
	if(isset($_POST['ans'])){
		$answerstring = $_POST['ans'];
	}
	
	$count = 'undefined';
	if(isset($_POST['count'])){
		$count = $_POST['count'];
	}
    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Elect-o-matic Canada 2015 - FAQs</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta content="">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
  
  <script src="js/jquery-2.0.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/mahlowat.js"></script>
  
  <div class="container" style="margin-top: 20px;">
      <img src="img/mahlowat_logo.png" title="Elect-o-matic Canada 2015 Logo" class="pull-right" onclick="changeText()"/>
	<p id="spruch" class="pull-right"></p>
      <div class="bottom-buffer top-buffer">
    
    <h1>FAQs</h1>

    <h4>Who created the Elect-o-matic Canada 2015?</h4>
    <p><a href="http://github.com/pc-coholic/" target="_blank">Some guy</a> from Germany who didn't know, that there was already the <a href="http://www.boussoleelectorale.com/" target="_blank">Boussole électorale</a> around. Oh well...</p>
    
    <h4>Who created the theses?</h4>
    <p>They are taken from the <a href="https://www.facebook.com/faitsobjectifs/" target="_blank">Unbiased Facts / Faits objectifs</a>-Facebook page.</p>
    
    <h4>Which election are we even talking about?</h4>
    <p><a href="https://en.wikipedia.org/wiki/Canadian_federal_election,_2015" target="_blank">That one</a>.</p>
    
    <h4>Who wrote the code for this app?</h4>
    <p>That other guy, <a href="http://hszemi.de" title="hszemi.de" target="_blank">Sven</a>. He know how to do that kind of stuff.</p>
    
    <h4>How are the points calculated?</h4>
    <p>Your answeres are being compared to the ones of the political parties.</p>
    <ul>
      <li>If you selected the same answer, the party gets 2 points;</li>
      <li>If your answer is only slightly off (Approval/Neutral or Neutral/Disapproval), the party gets 1 point;</li>
      <li>If the answer is completly different of if a party hasn't answered, it gets no points at all.</li>
    </ul>
    <p>Questions you skip are not taken into consideration. This just results in less points.</p>
    <p>Questions you deem important to you get double the points (0/2/4). This results in a higher total of points.</p>
    
    <div id='log'>
    <h4>Are my answers beeing saved?</h4>
    <p>Bevore calculating your results, you are beeing asked if we can save your selection.<br>
    If you select "Yes", your answeres are beeing saved with an ID, that is calculated from your IP-address and a daily changing value. The next day, no one can tell what you answered.<br>
    If you select "No", we will just increment a counter by 1.</p>
    <p></p>
    
    <h4>But I don't want to counted at all!</h4>
    <p>Our webserver is creating a log-entry every time someone access a page on this server. This entry contains the time, the IP-address and the accessed page. So it would be dishonest to pretend, that you accessing this website is not bing logged. But please be assured, that the Elect-o-matic has been built in such a way, that we cannot tell what answers you have selected by looking at the logfiles. We really can only see this data, if you agree to it at the end of the interview.</p>
    </div>
    
    <h4>I found a mistake!</h4>
    <p>That's great! Oh wait... No, it's not... But it also kinda is... Please <a href="mailto:martin@pc-coholic.de">tell us about it</a>!</p>

    <a class="btn btn-primary" href="<?php echo $back; ?>" onclick="callPage(event, '<?php echo $back; ?>')" title="Back to the Elect-o-matic Canada 2015">Back to the Elect-o-matic Canada 2015</a>
  </div>
  </div>


  <script type="text/javascript">
	$( document ).ready( function(){
		if(window.location.hash == '#log'){
			setTimeout(function() {
				$('#log').css("background-color","#ffff55");
			}, 1000);
		}
	} );
  
      function callPage(evt, action){
		evt.preventDefault();
		var html = "<input name='ans' value='<?php echo $answerstring;?>'/><input name='count' value='<?php echo $count; ?>'/>";
		$('<form style="display: none;" method="post"/>').attr('action', action).html(html).appendTo('body').submit();
	}
  </script>

  
  </body>
</html>
