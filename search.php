<?php

// Turn off all error reporting
        error_reporting(0);
//get data
$button = $_GET['submit'];
$search = $_GET['search'];


$s = $_GET['s'];
if (!$s)
$s = 0;


$e = 10; //results per page


//$next = $s + $e;
//$prev = $s - $e;




  
  //connect to database
  mysql_connect('localhost','root','') or die ('Failed To connect to server.');
  mysql_select_db('search') or die ('Failed to connect to database');
   
   //explode out search term
   $search_exploded = explode(" ",$search);
   
   foreach($search_exploded as $search_each)
   {
   
        //construct query
    $x++;
    if ($x==1)
     $construct .= "keywords LIKE '%$search_each%'";
    else
     $construct .= " OR keywords LIKE '%$search_each%'";
   
   }
   
  //echo outconstruct
  $constructx = "SELECT * FROM searchengine WHERE $construct";
  
  $construct = "SELECT * FROM searchengine WHERE $construct LIMIT $s,$e";
  $run = mysql_query($constructx);
  
  $foundnum = mysql_num_rows($run);


  $run_two = mysql_query("$construct");
  
  if ($foundnum==0)
   echo "<p><font color='#000000'>
   <br>
   <br>
   <center><font face='Segoe UI' size=3'>No Results Found for :&nbsp;&nbsp;<b style=font-size:25;color:red>$search</b></center> <br><br><span style=font-size:18;color:green>Read Suggestions For more information.<br><br></span> 
   
   1. Try to <b style=font-size:15;color:grey>search for more specific words</b>.
   <br>
   2. Make sure your<b style=font-size:15;color:grey> query doesn't contain more than 3 terms </b>.
   <br>
   3. If any of these suggestions isn't working, then it <b style=font-size:15;color:grey>may not be present in our database</b>.</font> 
   <br>
   <br>
   <br>
   </font>
 </p>";
  else
  {
   echo "<br><br><div align='right'><table bgcolor='#0000FF' width='100%' height='1px'
<br /></table><table bgcolor='white' width='100%' height='10px'><tr><td><div align='center'><font face='Segoe UI' color='green' size='3'>Showing <b>$foundnum</b> result for : &nbsp;&nbsp;<b style=font-size:20;color:red>$search</b></font></div></td></tr></table><p></div>
<div align='center'>

<script type='text/javascript'>
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</div>

<div align='center'><script type='text/javascript'><!--
google_ad_client = 'ca-pub-3065697484983289';
/* banner */
google_ad_slot = '3788847361';
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type='text/javascript'
src=''>
</script></div>";
   
//echo 
"  
	<div id='right'><script type='text/javascript'><!--
google_ad_client = 'ca-pub-3065697484983289';

google_ad_slot = '1027451647';
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type='text/javascript'
src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
</script></div>
	
   <div id='left'><font face='Calibri'>
    <script type='text/javascript'><!--
google_ad_client = 'ca-pub-3065697484983289';
/* blank */
google_ad_slot = '9384647153';
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type='text/javascript'
src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
</script>
   </div>
   
   " 
   
;
   
   while ($runrows = mysql_fetch_assoc($run_two))
    while ($runrows = mysql_fetch_assoc($run_two))
   {
    //get data
   $title = $runrows['title'];
   $desc = $runrows['description'];
   $url = $runrows['url'];
   echo "
   <div id='center'>
   		<h5>
		<div id='results'>
   		<a href='http://$url'>
   		<font face='Segoe UI' color='blue'>$title</font></a>
   		<font face='Segoe UI' color='#000000'><br>
   		$desc<br>
   		<br><font face='Segoe UI' color='darkblue'>$url</font></table></div></h5>
		</div>

   ";
   
   
   }
?>

<html>
<title>Results || ART</title>

<head>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'>
<style type="text/css">
*{margin:0px;
padding:0px;
}
.searchtext {	font-size: 18px;
}

.container {
    position: absolute;
}
.topright {
    position: absolute;
    top: 8px;
    right: 16px;
    font-size: 18px;
}
.menuheader {
	color: #000;
	font-family: "Calibri";
}
a:link {
	color: #03F;
}
a:visited {
	color:#C0C;
}
a:hover {
	color: #09F;
}
a:active {
	color: #03F;
}

.feedback{ color:black;
font-size:20px;
a:link{color:black;}
a:hover:{color:red; font-size:30px;}
a:visited{color:blue;}
}

	#menu {
	height:25px;
	padding-top:4px;
	background-image:url(/images/header.png)
	}

	div#left{
		width:170px;
		float:left;
		padding-left:10px;
		padding-top:30px;
		border-right:2px;
	}
		div#center{
		margin-left:170px;
		margin-right:170px;
		padding-left:10px;
		padding-right:50px;
		padding-left:20px;
		padding-top:30px;
		
	}
	

	div#header{
		background-color:#FFF;
		height:80px;
	}
	
	div#right{
		width:170px;
		float:right;
		padding-right:10px;
		padding-left:60px;
		padding-top:30px;
	}
	
	div#footer{
		background-color:#192;
		height:50px;
	
	}
	
	div#results{
		padding: 10px 10px 10px 10px;
	    border: 1px outset #ff0000;
    -webkit-animation: mymove 5s infinite; /* Chrome, Safari, Opera */
    animation: mymove 5s infinite;
	}
	
/* Chrome, Safari, Opera */
@-webkit-keyframes mymove {
    50% {border: 1px solid red;}
}

/* Standard syntax */
@keyframes mymove {
    50% {border: 1px solid #00ff00;}
}

	
</style>

</head>
<body>
<div align="center">
<p><a class='feedback' href="poll/index.php"><font size=2 color=grey><br><br><br><br>Provide Manual Feedback</font></a></p>
</div>
<div align="center">
<?php
if (!$s<=0)

 echo "
 <font face='Segoe UI Light'><a href='search.php?search=$search&s=$prev'></a></font>";

$i =1; 
for ($x=0;$x<$foundnum;$x=$x+$e)
{


 echo " <a href='search.php?search=$search&s=$x'>$i</a> ";


$i++;


}

if ($s<$foundnum-$e)
  echo "<a href='search.php?search=$search&s=$next'></a>";

	}



?>

<!--Query Expansion-->
<?php
require "phpspellcheck/include.php"   ;

$seachText = isset($_GET['search'])?$_GET['search']:"Hello wosrld";
 

function suggestionslink ($input){
	if((trim($input))==""){return "";}

	$spellcheckObject = new PHPSpellCheck();
	$spellcheckObject -> LicenceKey = "TRIAL";
	$spellcheckObject -> DictionaryPath = ("phpspellcheck/dictionaries/");
	$spellcheckObject -> LoadDictionary("English (International)") ;  //OPTIONAL//
	$spellcheckObject -> LoadCustomDictionary("custom.txt");
    $suggestionText = $spellcheckObject ->didYouMean($input);

	if($suggestionText==""){return "";}

	return "<a href='".$_SERVER["SCRIPT_NAME"]."?search=".htmlentities($suggestionText)."'>".$suggestionText."</a>";

}

?>
<!--Query Expansion Ends-->
<div class="container"><div align="center"><h2><p style=color:purple;>Did You Mean : <?php echo suggestionslink($seachText) ;?></p>
</h2></div></div>
</div>
<div>
<center><font face="Calibri" size="+1"><p><img src="bge.gif" width="1000" height="27"><br>
</p></font></center></div>
</body>
</html>