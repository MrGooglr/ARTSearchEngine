<?php
$hostname = "localhost"; 
$db_user = "root"; 
$db_password = ""; 
$database = "search";
$db_table = "searchengine"; 

error_reporting(0);

//connect to database
  //mysql_connect('localhost','root','') or die ('Failed To connect to server.');
  //mysql_select_db('search') or die ('Failed to connect to database');
$db = mysql_connect($hostname, $db_user, $db_password);
mysql_select_db($database,$db);
?>
<html>
<head>
<title>Add url to ART</title>
<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
<style type="text/css">

#center p {
	text-align: center;
	font-family: Calibri;
}
#center b {
}
.phising {
	font-family: Calibri;
}
.phising {
	font-family: Calibri;
}
.phisd {
	text-align: center;
	font-family: Calibri;
	font-weight: bold;
	font-size: 18px;
}
.email {
	font-weight: bold;
}
.phisingk {
	font-weight: bold;
}
.ka {
	font-weight: bold;
}
.footer .footer {
	text-align: center;
	font-size: 24px;
}
.footer .footer {
	font-size: 18px;
	font-family: Calibri;
}

.ha {
	font-family: Impact;
	background-image:url("bg.jpg");
}
.ha {
	font-family: Impact;
}
.ga {
	color: #000;
}
.jk {
	color: #F00;
}
.jl {
	font-family: Impact;
	color: #F00;
}
.mds {
	text-align: center;
}
.mds {
	font-family: Impact;
}
a:link {
	color: #000;
}
a:visited {
	color: #000;
}
a:hover {
	color: #000;
}
a:active {
	color: #000;
}
.d {
	color: #00C;
	font-size: 16px;
	font-family: Impact;
}
.ha .ga .ga {
	color: #000;
}
.jk .jl {
	color: #000;
}
.jk {
	color: #000;
}
.JX {
	font-family: Impact;
	text-align: center;
	font-size: 36px;
	color: #B5E61D;
}
.MZ {
	color: #939;
}
.KX {
	color: #7092BE;
}
.MX {
	color: #06F;
}
.KKS {
	color: #A349A4;
}
.XSKS {
	color: #7F7F7F;
}

	
		div#center{
		margin-left:170px;
		margin-right:170px;
		padding-left:10px;
		padding-right:10px;
		
	}
	footer {
	text-align: center;
	border:2px;
}

#menu {
	background-color:#93C;
	height:30px;
	padding-top:4px;
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type="text/javascript">
var count = 6;
var redirect = "list.php";
 
function countDown(){
    var timer = document.getElementById("timer");
	document.getElementById('form1').submit();
    if(count > 0){
        count--;
        timer.innerHTML = "This page will redirect in "+count+" seconds.";
        setTimeout("countDown()", 1000);
    }else{
        window.location.href = redirect;
    }
}
</script>

</head>
<body text="#111010" link="#111010">

  <?php
if (isset($_REQUEST['Submit'])) {
# THIS CODE TELL MYSQL TO INSERT THE DATA FROM THE FORM INTO MYSQL TABLE
$sql = "INSERT INTO $db_table(title,description,url,keywords) values ('".mysql_real_escape_string(stripslashes($_REQUEST['title']))."','".mysql_real_escape_string(stripslashes($_REQUEST['description']))."','".mysql_real_escape_string(stripslashes($_REQUEST['url']))."','".mysql_real_escape_string(stripslashes($_REQUEST['keywords']))."')";
$result = mysql_query($sql, $db);
if($result) {
echo '<span style="margin:auto; display:table; border:none; border-style:inset"><h2 style=color:green;align:center>Thank you</h2>Your information has been entered into our database<br><br> you will be redirected to this page in 7 secs<br><br>Please do not REFRESH</span>';
echo "<script>setTimeout(\"location.href = 'list.php';\",7500);</script>";
} else {
echo " <h2 style=color:red>ERROR:</h2> Sorry can't able to insert it<br>Try another one ";
echo "<script>setTimeout(\"location.href = 'list.php';\",7500);</script>";
}

?>
<?php
}
?>



<h1 class="ha"><center><a href="index.php"><img src="images/art.png" width="517" height="210" border="0"></a></center></h1>
<hr width="90%">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" name='form1' >
<div id="center">
  <p>Title<br><input name="title" type="text" maxlength="30" required>
  </p>
  <p>Description<br>
    <textarea name="description" cols="40" ></textarea>
    <br>
    </p>
  <p>URL<br>
    <input name="url" type="text" id="url" placeholder="don't type http://" required>
  </p>
  <p>Keywords<br>
    <input type="text" name="keywords">
  </p>
  <p><br><br>
    <input name="Submit" type="submit" class="" value="Submit" id="Submit" onClick="countDown();">
  </p>
</div>
</form>


<p class="phisd">Read This Before You Add Any Website</p>
<ol>
  <li class="phising"><span class="phisingk">All phishing, fraud, scam and hacking websites will be reported to the CBI's Cyber-Crime division</span> (INDIA) and SOCA (Serious Organized Crime Agency - UK). We have no problem providing them the contents of your website, registration details, logs and IP addresses so that they can gain intelligence for on-line fraud and criminal activity. </li>
  <li class="phising">You can not go away by putting <span class="ka">any abusive character, or abuse which is against the law</span>.</li>
  <li class="phising">Visit this site for more information <a href="http://aniket.hostfree.pw" target="_blank">CLICK HERE! </a></li>
</ol>
<p>
<div class="footer">
  <p class="footer">  <img src="bg.jpg" width="1000" height="27" class="phisd"><br>
  <a href="#">privacy</a> <a href="#">languages</a> <a href="#">copyrights</a> <a href="#">terms and conditions</a></p></div>
  <style>
  input{
   border:none none solid none;
   border-width:1px;  
    border-style:inset;
   padding:8px;
  }
  </style>
</body>
</html> 
