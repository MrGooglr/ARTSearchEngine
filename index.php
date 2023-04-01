
<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>
<?php phpAlert(   "Welcome to ART\\n\\nBefore you proceed further please read these instructions carefully... \\n\\n 1.Your 'QUERY' must be precise and atmost 7 word long.\\n\\n 2. Do not type any 'single letter' query (such as 'a' or '2' etc.)\\n\\n 3. violating these will cause 'UNUSUAL BEHAVIOUR' of the search engine.\\n\\nIf you have understand it then now you can click 'OK'  "   );  ?>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ART Search Engine || FYP</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/>
<!--<script type="text/javascript" language="javascript">
function enter() {
window.open('greet.html','','height=420,width=700,resizable=yes');
}</script>-->

<script type="text/javascript">
function fun() {
var value = documnet.getElementsById('WARNING').value;
if (value.length === 0)
 {
   alert  ("This Function is Under construction, Please return to TEXT SEARCH ONLY");
   return;
 }
}
</script>

<!--AutoComplete Script Begins-->

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [
      "ActionScript","AppleScript","Asp","BASIC","C","C++","Clojure","COBOL","ColdFusion","Erlang","Fortran","Groovy","Haskell","Java","JavaScript","Lisp","Perl","PHP","Python","Ruby","Scala","Scheme","Aniket","Google","Orkut","Computer","Fashion","Microsoft","What is Smurfs","Get well soon",
	  
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>

<!--AutoComplete Script Ends-->
	
    
	<style>
	*{margin:0px;
	padding:0px;
	}

	#menu {
	height:38px;
	padding-top:0px;
	background-image:url("bg.jpg");
	}
	
	.photo {
		position:relative;
		font-family:arial;	
		overflow:hidden;
		border:0px;
		width:811px;
		height:98px;
		margin-left:250px;
	}	
	
		.photo .heading, .photo .caption {
	position:absolute;
	background:#000;
	height:50px;
	width:816px;
	opacity:0.6;
		}
		
		.photo .heading { 
			top:-50px;
		}

		.photo .caption {
	bottom:-42px;
	left:3px;
		}
		
		.photo .heading span {
			color:#26c3e5;	
			top:-50px;
			font-weight:bold;
			display:block;
			padding:5px 0 0 10px;
		}
		
		.photo .caption span{
			color:#FF0;
			font-size:16px;
			display:block;
			padding:5px 10px 0 10px;
		}
		
	.footer {
	font-family: Calibri;
	font-size: 18px;
	color: #000;
	background-image:url("bg.jpg");
}
    head {
	text-align: center;
}
    menu1 {
	text-align: center;
}
    .footer a {
	text-align: center;
}
    .menuhead {
	font-family: Calibri;
}
    .menuhead {
	font-size: 24px;
}
    .menuhead {
	font-size: 18px;
}
    .footer1 {
	text-align: center;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 18px;
	color: #000;
}
     .place{
	 text-align:left;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 20px;
	color:green;
	 }
	 
	 .top{
		 background-color:yellow;
		 text-align:center;
		 width:10px;
	 }
    </style>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
</head>
<body background-image:url("bge.gif") onload="enter()">
<div id="menu"><ul id="MenuBar1" class="MenuBarHorizontal">
</ul></div>	
	<p><center>
	  <p class="menuhead"><br>
	  </p>
	  <br>
  	</center>
    
</div>

<!--DATE AND TIME SLOT-->
<?php
$ani=date("h:i");
date_default_timezone_set("asia/kolkata");

echo "<span style=font-size:30;color:red;>&nbsp;&nbsp;&nbsp;&nbsp;The time is&nbsp;&nbsp;</span>"."<span style=margin-right:20;font-size:30;color:Green>" .date("h:i")."</span>";			
echo "<span style=font-size:30;margin-left:70;color:red>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The date is&nbsp;&nbsp;</span>"."<span style=margin-left:20;font-size:30;color:Green>" .date("d/m/y")."</span>";
?>
<!--DATE AND TIME SLOT CLOSED-->

<!--Corrector-->

<?php
require "phpspellcheck/include.php"   ;

$seachText = isset($_GET['tags'])?$_GET['tags']:"Helo";
 

function suggestionslink ($input){
	if((trim($input))==""){return "";}

	$spellcheckObject = new PHPSpellCheck();
	$spellcheckObject -> LicenceKey = "TRIAL";
	$spellcheckObject -> DictionaryPath = ("phpspellcheck/dictionaries/");
	$spellcheckObject -> LoadDictionary("English (International)") ;  //OPTIONAL//
	$spellcheckObject -> LoadCustomDictionary("custom.txt");
    $suggestionText = $spellcheckObject ->didYouMean($input);

	if($suggestionText==""){return "";}

	return "<a href='".$_SERVER["SCRIPT_NAME"]."?tags=".htmlentities($suggestionText)."'>".$suggestionText."</a>";

}

?>

<!--Corrector ends-->

<center>
<img src="images/art.png" width="490" height="190">
</center>
<form action="search.php" method='GET'>
    	
  <center> 
   	<p><br>
    </p>
   	<p>&nbsp;</p>
   	<p>
   	  <input id="tags" name='search' type='text' class="place" class="awesomplete" size='50' placeholder='Input Query' required></font></p>
   	<p>&nbsp;</p>
	<!--<p>Did You Means : <?php echo suggestionslink($seachText) ;?></p>-->
  </center>
            

<p class="footer1"><center>
  <input name='submit' type='submit' class="footer1" value='Text Search'>
  </center>
</p>
</form>
<p class="footer1">&nbsp;</p>
<div id="menu">
  <ul id="MenuBar1" class="MenuBarHorizontal"> <center>   
	  <li><a href="index.php" onclick="return alert(' This link is Under construction, Please return to TEXT SEARCH ')"  >Image Search</a>      </li>
	  <li><a href="index.php" onclick="return alert(' DEVELOPER :: Aniket Narayan \n\n UNDER GUIDENCE OF :: Mr. Kapil Kumar Pandey \n\n FINAL YEAR PROJECT \n\n **A BEST MATCH 25 ALGO Based Search Tool** ')" >About Project</a></li>
	  <li><a href="wcart/index.php"><b>CRAWLER</b></a></li>
      <!--<li><a href="http://aniket.hostfree.pw/" target="_blank">About Me</a></li>-->
      <li><a href="list.php">Submit URL</a></li>
   </center></ul>
</div>

<p class="footer1">&nbsp;</p>
<p class="footer1">&nbsp;</p>
<!--<p class="footer1">&nbsp;</p>-->
<p class="footer1">Made By || Aniket Narayan || </p>
<p class="footer1"> **Best Match 25 Algo** BASED SEARCH ENGINE</p>
<p class="footer1">
<center>



<!-- Render Call -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</center>
</p>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>