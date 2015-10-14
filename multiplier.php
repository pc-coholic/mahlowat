<?php    
    include 'includes/functions.php';
    include 'includes/elements.php';
    #include 'includes/theses.php';
    
    $data_content = file_get_contents("config/data.json");
    if(!$data_content){
	echo "ERROR READING CONFIG";
    } else {
    $data = json_decode($data_content, true);
    
    
    $css = Array();
	$css[0] = "bootstrap.min.css";
	$css[1] = "cerulean.min.css";
	$css[2] = "cosmo.min.css";
	$css[3] = "cyborg.min.css";
	$css[4] = "darkly.min.css";
	$css[5] = "flatly.min.css";
	$css[6] = "journal.min.css";
	$css[7] = "lumen.min.css";
	$css[8] = "paper.min.css";
	$css[9] = "readable.min.css";
	$css[10] = "sandstone.min.css";
	$css[11] = "simplex.min.css";
	$css[12] = "slate.min.css";
	$css[13] = "spacelab.min.css";
	$css[14] = "superhero.min.css";
	$css[15] = "united.min.css";
	$css[16] = "yeti.min.css";
	$css_id = 9;
	if(isset($_GET['css'])){
		$css_id = intval($_GET['css']);
		if($css_id < 0 || $css_id > 16){
			$css_id = 0;
		}
	}
    
    //$theses = get_theses_array();
    $theses = $data['theses'];
    
    $theses_count = sizeof($theses);
    
    $ans = Array();
    $emph = Array();
    $answerstring = '';
    $warning = false;
    $count = 'undefined';
    
    if(isset($_POST['count'])){
		$count = $_POST['count'];
    }
    
    if(isset($_POST['ans'])){
		$answerstring = $_POST['ans'];
		$retval = result_from_string($answerstring, $theses_count);
		$ans = $retval[0];
		$emph = $retval[1];
    } elseif(isset($_GET['ans'])){
		$answerstring = $_GET['ans'];
		$retval = result_from_string($answerstring, $theses_count);
		$ans = $retval[0];
		$emph = $retval[1];
    } else {
		$warning = true;
		for($i = 0; $i < $theses_count; $i++){
			$ans[$i] = 'skip';
			$emph[$i] = 1;
		}
    }
    
    }
    
    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Elect-o-matic Canada 2015 - Results</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta content="">
    <!--<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">-->
    <link href="css/<?php echo $css[$css_id];?>" rel="stylesheet" media="screen">
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
  
  <script src="js/jquery-2.0.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/mahlowat.js"></script>
  
    <?php if($warning){ ?>      
	<div id="warning" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Hoppla...</h4>
				</div>
				<div class="modal-body">
					<p><strong>Apparently you didn't answer any theses.</strong><br />
                  Either you accessed this page directly, or you really haven't answered any theses yet.</p> 
                  <p>If the latter is the case, we would like to invite you, to do it now.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<a href="mahlowat.php" class="btn btn-primary">Edit theses</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
      
      <script type="text/javascript">
      $(document).ready(function() {
            setTimeout(function(){
                  $('#warning').modal('show');
            }, 500);
      });
      </script>
     <?php } ?>
  
  <div class="container mow-container" style="margin-top: 20px;">
      <img src="img/mahlowat_logo.png" title="Mahlowat Logo" class="pull-right" onclick="changeText()"/>
	<p id="spruch" class="pull-right"></p>
	
      <div class="bottom-buffer top-buffer">
    
    <h1>Results</h1>
    <p>Click on the titel to show the corresponding thesis.</p>
      <table class="table table-bordered">
            <tr><th style="width: 320px;">Your choice</th><th>Importance</th>
            <?php 
            
      
            
            for($i = 0; $i < sizeof($ans); $i = $i + 1){
                  ($emph[$i] == 2) ? $active = "btn-info active" : $active = "btn-default";
                  ($emph[$i] == 2) ? $multbutton = "This is important to me" : $multbutton = "This is important to you";
                  $btnclass = code_to_btnclass(char_to_value($ans[$i]));
                  $labelclass = code_to_labelclass($ans[$i]);
                  echo "<tr>";
                  echo "<td><a id='thesis$i' class='btn $btnclass btn-block' onclick='toggleNext(this)'>".$theses[$i]['s']."</a></td>
                  <td><button id='thesis$i-multiply' class='btn btn-block weight $active' data-toggle='button'>$multbutton</button></td>";
                  echo "</tr>\n";
                  echo "<tr class='multheseslong'><td class='mtl' colspan='2'><!--<span class='label $labelclass'>These ".($i+1).": ".$theses[$i]['s']."</span><br>--> ".$theses[$i]['l']."</td></tr>";
            }
            
            ?>     
      </table>
      <button id="commit" class="btn btn-primary">Recalculate result</button>
    
    <div class="text-right">
    <hr />
      <small>You can 
      <a href="index.php" title="restart the interview">restart the interview</a>
      or
      <a href="mahlowat.php" onclick="callPage(event, 'mahlowat.php', array2str(getResultArray()), <?php echo "'$count'"; ?>)" title="change your answers">change your answers</a>.<br />
      There is also a collection of <a href="faq.php?from=multiplier.php" onclick="callPage(event, 'faq.php?from=multiplier.php', array2str(getResultArray()), <?php echo "'$count'"; ?>)" title="frequently asked questions">FAQs</a>.
      </small>
    </div>
    </div>
  </div>
  
  <script type="text/javascript">
	$('#commit').click(function(){
		resultArray = getResultArray();
		gotoResultPage(resultArray);
	});
	$('.multheseslong').hide();
	$('.tt').tooltip();
	
	$('.weight').click(function(){
		$(this).toggleClass('btn-default');
		$(this).toggleClass('btn-info');
		if($(this).text() == 'This is important to me'){
			$(this).text('This is important to you');
		} else {
			$(this).text('This is important to me');
		}
	});
	
	function getResultArray(){
		multipliers = $('.weight');
		resultArray = resultStringToArray("<?php echo $answerstring;?>", multipliers.length);
		for(i = 0; i < multipliers.length; i++){
			if(multipliers.eq(i).hasClass('btn-info')){
				resultArray[i] = result2letter(resultArray[i], true);
			} else {
				resultArray[i] = result2letter(resultArray[i], false);
			}
		}
		return resultArray;
	}
	
	function toggleNext(caller){
		$(caller).parent().parent().next().toggle();
	}
	
	function gotoResultPage(resultArray){
		count = '<?php echo $count; ?>';
		if(count == 'true') {
			callResult(resultArray, true);
		} else {
			callResult(resultArray, false);
		}
	}
	
	function callResult(resultArray, count){
		ans = array2str(resultArray);
		if(count){
			url = "count.php?ans=" + ans;
			jQuery.get(url,function( data ) {
				callPage(null, 'result.php', ans, 'true');
			});
		} else {
			jQuery.get("count.php?false",function( data ) {
				callPage(null, 'result.php', ans, 'false');
			});
		}
	}
  </script>
  </body>
</html>
