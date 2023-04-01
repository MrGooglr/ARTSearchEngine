<html>
 <head>
  <title>Web Crawler for ART || BLACKIE</title>
  <link rel='shortcut icon' href='../favicon.ico' type='image/x-icon'/>
 </head>
 <body>
  <div id="content" style="margin-top:10px;height:100%;">
   <center><h1 style=color:purple;>BLACKIE || Web Crawler for ART Search Engine</h1>
   </center>
   <br/><br/>
   <form style=margin-left:30%; action="index.php" method="POST">
    <b style=color:purple;>Enter a VALID URL : </b><input name="url" size="35" placeholder="http://aniket.hostfree.pw"/>
    <input type="submit" name="submit" value="Start Crawling"/>
   </form>
   <br/>
   <b style=margin-left:40%;>The URL's you submit for crawling are recorded.</b><br/><br/><span style=margin-left:43%;>See All Recorded Crawled URL's <a href="url-crawled.html">here</a>.</span><br/><span style=margin-left:45%;><a href="../index.php">Return to ART Search Engine</a>.</span>
   <?php
   
   // Turn off all error reporting
        error_reporting(0);
   
   include("simple_html_dom.php");
   $crawled_urls=array();
   $found_urls=array();
   function rel2abs($rel, $base){
    if (parse_url($rel, PHP_URL_SCHEME) != '') return $rel;
    if ($rel[0]=='#' || $rel[0]=='?') return $base.$rel;
    extract(parse_url($base));
    $path = preg_replace('#/[^/]*$#', '', $path);
    if ($rel[0] == '/') $path = '';
    $abs = "$host$path/$rel";
    $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
    for($n=1; $n>0;$abs=preg_replace($re,'/', $abs,-1,$n)){}
    $abs=str_replace("../","",$abs);
    return $scheme.'://'.$abs;
   }
   function perfect_url($u,$b){
    $bp=parse_url($b);
    if(($bp['path']!="/" && $bp['path']!="") || $bp['path']==''){
     if($bp['scheme']==""){$scheme="http";}else{$scheme=$bp['scheme'];}
     $b=$scheme."://".$bp['host']."/";
    }
    if(substr($u,0,2)=="//"){
     $u="http:".$u;
    }
    if(substr($u,0,4)!="http"){
     $u=rel2abs($u,$b);
    }
    return $u;
   }
   function crawl_site($u){
    global $crawled_urls;
    $uen=urlencode($u);
    if((array_key_exists($uen,$crawled_urls)==0 || $crawled_urls[$uen] < date("YmdHis",strtotime('-25 seconds', time())))){
     $html = file_get_html($u);
     $crawled_urls[$uen]=date("YmdHis");
     foreach($html->find("a") as $li){
      $url=perfect_url($li->href,$u);
      $enurl=urlencode($url);
      if($url!='' && substr($url,0,4)!="mail" && substr($url,0,4)!="java" && array_key_exists($enurl,$found_urls)==0){
       $found_urls[$enurl]=1;
       echo "<li><a target='_blank' href='".$url."'>".$url."</a></li>";
      }
     }
    }
   }
   if(isset($_POST['submit'])){
    $url=$_POST['url'];
   
   if (!filter_var($url, FILTER_VALIDATE_URL) === true) {
    echo("<br><h3><style='text-align:center'>$url is not a valid URL </h3>. <br>Please enter a valid URL as seen in text-box");
    }
	/*if($url==''){
     echo "<h2>A valid URL please.</h2>";
    }*/
	else{
     $f=fopen("url-crawled.html","a+");
     fwrite($f,"<div><a href='$url'>$url</a> - ".date("Y-m-d H:i:s")."</div>");
     fclose($f);
     echo "<h2>Result - URL's Found</h2><ul style='word-wrap: break-word;width: 400px;line-height: 25px;'>";
     crawl_site($url);
     echo "</ul>";
    }
   }
   ?>
  </div>
  <style>
  input{
   border:none none solid none;
   border-width:1px;  
    border-style:inset;
   padding:8px;
  }
  a{font-size:15px;}
  a:hover{background-color: #DBF9F4;
  color:blue;
  font-size:15px;
  transition:smooth;
  underline:none;
  font-weight:bolder;}
  </style>
 </body>
</html>
