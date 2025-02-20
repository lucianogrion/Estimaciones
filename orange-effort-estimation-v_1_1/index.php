<?php
/////////////////////////////////////////////////////////////////////////////
// Under GNU do not remove this notice developed by spyros ktens sk.workspace@gmail.com http://www.tecorange.com
//settings
/////////////////////////////////////////////////////////////////////////////
$data_url='http://effort-estimation.gatory.com/server/server.php';//MANDATORY. This is the path for the public database and functions.
//$data_url='http://localhost/effort-estimation/server/server.php';//TESTING DATA URL
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Orange Effort Estimation for Software Development</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">

form input[type=submit] {
    background: #F93;
    display: inline-block;
    padding: 5px 10px 6px;
    color: #fff;
	text-decoration: none;
	font-weight: bold;
    line-height: 1;
    -moz-border-radius: 7px;
    -webkit-border-radius: 7px;
    -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
    -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
    text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
    border-bottom: 1px solid rgba(0,0,0,0.25);
    position: relative;
    cursor: pointer;
    width : 310px;
	height :52px;
	font-size: 22px;
}

form input[type=submit]:hover {
	color : #F00;
}

A{
	text-decoration: none;
	font-weight: bold;
} 

.error_msg{
	font-size: 12px;
	font-family: Verdana, Geneva, sans-serif;
	color: #F00;
}

.warning_msg{
	font-size: 12px;
	font-family: Verdana, Geneva, sans-serif;
	color: #F93;
}
	
.bold {
	font-weight: bold;
	font-family: Verdana, Geneva, sans-serif;
}
.verdana {
	font-family: Verdana, Geneva, sans-serif;
	text-align: left;
}

.verdana_result {
	font-family: Verdana, Geneva, sans-serif;
	text-shadow: 2px 2px #999;
	font-weight: bold;
	color: #03F;
	font-size: 20px;
}

.verdanaboldgreen {
	font-weight: bold;
	color: #090;
	font-size: 24px;
}
.verdanasm {
	font-size: 12px;
	font-family: Verdana, Geneva, sans-serif;
}
.vardanared {
	font-weight: bold;
	color: #F00;
}
.explanationsign {
	color: #F60;
	font-weight: bold;
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 14px;
}
.headerstyle {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 36px;
	font-style: normal;
	font-weight: bold;
	color: #F93;
}
.verdanasm_center {
	text-align: center;
}

.yell {
	color: #FF6;
}
.verdana_white {
	color: #FFF;
	font-weight: bold;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 18px;
}
.verdanasm_center .verdanasm .verdanasm {
	text-align: center;
	color: #666;
}
.vrdana_sm_grey {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	text-align: center;
	color: #666;
}
.verdana_bold {
	font-weight: bold;
}
.verdana_bold {
	font-family: Verdana, Geneva, sans-serif;
}
</style>

<script language="javascript">

function toggle(id) {
var ele = document.getElementById("toggleText"+id);
var text = document.getElementById("displayText"+id);
if(ele.style.display == "block") {
ele.style.display = "none";
text.innerHTML = "?";
}
else {
ele.style.display = "block";
text.innerHTML = "^";
}
} 

function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            cell1.appendChild(element1);
 
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "text";
			element2.name = "wbs_task"+(rowCount)+"_name";
            cell2.appendChild(element2);
			
			var cell3 = row.insertCell(2);
			var element3 = document.createElement("input");
            element3.type = "text";
			element3.name = "wbs_task"+(rowCount)+"_effort1";
			element3.size="5";
            cell3.appendChild(element3);
			
			var cell4 = row.insertCell(3);
			var element4 = document.createElement("input");
            element4.type = "text";
			element4.name = "wbs_task"+(rowCount)+"_effort2";
			element4.size="5";
            cell4.appendChild(element4);
			
			var cell5 = row.insertCell(4);
			var element5 = document.createElement("input");
            element5.type = "text";
			element5.name = "wbs_task"+(rowCount)+"_effort3";
			element5.size="5";
            cell5.appendChild(element5);
			
			document.main_form.wbs_tasks_count.value=rowCount;
  
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
			 
            }catch(e) {
                alert(e);
            }
			rowCount--;
			document.main_form.wbs_tasks_count.value=rowCount;
        }

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}


function waitPreloadPage() { //DOM
if (document.getElementById){
document.getElementById('prepage').style.visibility='hidden';
}else{
if (document.layers){ //NS4
document.prepage.visibility = 'hidden';
}
else { //IE4
document.all.prepage.style.visibility = 'hidden';
}
}
}
// End -->
</script>

</head>

<body onLoad="waitPreloadPage();">

<DIV id="prepage" style="position:absolute; font-family:arial; font-size:18; left:0px; top:0px; margin-top: 0px; background-color:#F90;  height:21px; width:100%;"> 
<center><b><font color="#0066FF">Loading... Please Wait.</font></b><center>
</DIV>
<div id="all">
<div id="explain" style="position:absolute; z-index:2; font-family:arial; font-size:16; left:100px; top:149px;  height:0; width:0;"> </div>
<p><span class="headerstyle">Orange Effort Estimation for Software Development</span>
  <span class="verdanasm"><?php echo version_check()?></span><br /><br />
  
  <?php

/////////////////////////////////////////////////////////////////////////////
//switch
/////////////////////////////////////////////////////////////////////////////
if (isset($_GET["sw"]))  $sw=strip_tags(trim($_GET["sw"])); else $sw='';

switch($sw) {
 case "calc":
 calc();
	break;
	case "chek_mail_id":
 chek_mail_id(); 
	break;
 case "view_edit_estimations":
 view_edit_estimations(); 
	break;
 case "new_calc":
 new_calc(); 
	break;
	 case "feed":
 feed(); 
	break;
case "cme_feed_update":
cme_feed_update(); 
	break;
case "cme_feed_add_new":
cme_feed_add_new(); 
	break;
case "feed_store_actual_effort":
feed_store_actual_effort(); 
	break;	
	case "about":
about(); 
	break;	
 default:
	get_mail_and_id();
	break;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
//functions
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
function version_check()
{

if (@fopen('http://www.tecorange.com/tecorange_software_info.htm','r')) {

$version=1.1;
$chunk= file_get_contents('http://www.tecorange.com/tecorange_software_info.htm');
$pattern = "/#OEE-Latest Version#<strong>(.*?)<\/strong>#Latest Version#/i";
preg_match($pattern, $chunk, $match);
$latest_version=$match[1];

$chunk1= file_get_contents('http://www.tecorange.com/tecorange_software_info.htm');
$pattern1 = "/#OEE-Info URL#<strong>(.*?)<\/strong>#Info URL#/i";
preg_match($pattern1, $chunk1, $match1);
$info_url=$match1[1];

$output="<br><i>Version ".$version." </i>";

if($version==$match[1]) $output=$output."- <font color=\"#009900\">Up to Date</font>";
if($version<$match[1]) $output=$output." - <font color=\"#FF0000\"><b>There is a new version of this tool.</b> <a href='".$info_url."'>Click here for Update Info!</a></font>";

return $output;
}else return '<br>No version info at the momment<br><br><b><font color="#FF0000">It Seems that you do not have internet connection! This tool requires internet connection in order to work!</font></b>';

}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function about()
{?>
<span class="verdana_bold">About  </span></p>
<p><span class="verdana">After years working in IT sector, mainly as PM, I have realized that
</span></p>
<p><span class="verdana">1.	All software development organizations face the challenge of effort estimation
</span></p>
<p><span class="verdana">2.	After searching the web I haven’t found a tool that could offer all the methods for effort estimation
</span></p>
<p><span class="verdana">3.	Some tools available cover just one method and are not web-based and most of them seem to be outdated
</span></p>
<p><span class="verdana">4.	I couldn't find a tool that has the ability to feed itself from community effort estimations and, at the same time, to be able to use organization specific characteristics and data.
</span></p>
<p><span class="verdana">So, I have decided to build this tool trying to cover the above needs. After a lot of reading, research and a few thousands lines of code here is my software development tool.
</span></p>
<p><span class="verdana"><span class="verdana_bold">Basic Tool Design
</span></span></p>
<p><span class="verdana">The tool is web-based, therefore it can be used from anywhere with a web browser. There is a server part and a client side. All calculations and data are performed/stored in one central server/database. The client communicates using SOAP web services.
  The client side code is available, as open source, to everyone to download. 
</span></p>
<p><span class="verdana">The client file has been built with PHP; all code is in one single php file. This makes the tool easy to share and integrate in various CMS or WEB systems.
</span></p>
<p><span class="verdana">Users can modify the client file to give their own feel and look and still have access to calculation file and database.
</span></p>
<p><span class="verdana"><span class="verdana_bold">How it Works
</span></span></p>
<p><span class="verdana">This tool enables software development effort estimation using 5 different methods. All industry standard methods are used.
</span></p>
<ul>
  <li><span class="verdana">COCOMO II
  </span></li>
</ul>
<p><span class="verdana">This is a model for effort estimation. The use of the model enables effort estimation from non-experts (e.g. not developers).
</span></p>
<ul>
  <li><span class="verdana">Work Breakdown Estimation
  </span></li>
</ul>
<p><span class="verdana">This is an effort estimation method based on expert judgment. Two options are available: Delphic Oracle and Three Point Estimation.</span></p>
<ul>
  <li><span class="verdana">Analogy / Comparison Estimation </span></li>
</ul>
<p><span class="verdana">This method tries to find analogies and/or compares the project to be estimated with stored projects.
</span></p>
<ul>
  <li><span class="verdana">Custom modular estimation for WEB and Mobile </span></li>
</ul>
<p><span class="verdana">Finally, I have included a custom modular estimation method.
  Using this method you can use prior efforts estimations for small modules/pieces of work that can be found in most projects in order to create complicated project estimation.
  
</span></p>
<p><span class="verdana">The tool can be feeded with custom modules estimations for use in future project estimations and, also, allow the feeding of data for analogy/comparison effort estimations.
</span></p>
<p><span class="verdana"><span class="verdana_bold">How To use
</span></span></p>
<p><span class="verdana">With you ID you can save and edit your estimations.
  I have added a lot of comments for most fields in order to help you. The tool based on data entered can use all methods and give a combined estimation or use any combination, even just one of them to provide effort estimation.
</span></p>
<p><span class="verdana">Based on the data entered and the findings the tool will use the methods available.
  In addition, some basic suggestions are available in case the actual effort is available to help for better effort estimation.
</span></p>
<p><span class="verdana_bold">Notes</span></p>
<p><span class="verdana">
  Some models have been simplified at some points to make the tool easier to use without compromising flexibility and accuracy, at least not a lot.
</span></p>
<p><span class="verdana">All data are stored in a public database, thus avoiding storing sensitive information, e.g. customer names.
</span></p>
<p><span class="verdana">Well, that's all from me.
You can send your feedback use support forum or contact me from <a href="http://tecorange.com/orange-effort-estimation-tool-software-development" tabindex="1" title="TECOrange" accesskey="d" target="_blank">my website</a>. </span></p>
<p><span class="verdana">Happy effort estimating! </span></p>
<p><a href="http://www.globalbib.com/spyros_ktenas" target="_blank">Spyros Ktenas</a>
  <?php 
  
 echo "<center><span class='verdana'><br><a href='JavaScript:history.back(1)'><b>BACK</b></a></span></center>";
 }

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function top_menu($useremail,$acid,$menu_section)
{
$output='';
if($menu_section=="new_estimation") $output=$output."<p class=\"verdana\"><span class=\"verdanaboldgreen\">New Effort Estimation</span> | 
<a href=\"#\" onclick=\"document.forms['view_estimations'].submit();\">View / Edit Your Estimations</a> | <a href=\"#\" onclick=\"document.forms['feed'].submit();\">Feed The System</a></p>
<form name=\"view_estimations\" id=\"view_estimations\" method=\"post\" action=\"?sw=view_edit_estimations\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" /></form>
  <form name=\"feed\" id=\"feed\" method=\"post\" action=\"?sw=feed&sw2=1\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" /></form>";

if($menu_section=="view_edit_estimations") $output=$output."<p class=\"verdana\"><a href=\"#\" onclick=\"document.forms['new_calc'].submit();\">New Effort Estimation</a></span> | 
<span class=\"verdanaboldgreen\">View / Edit Your Estimations</span> | <a href=\"#\" onclick=\"document.forms['feed'].submit();\">Feed The System</a></p>
<form name=\"new_calc\" id=\"new_calc\" method=\"post\" action=\"?sw=new_calc\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" /></form>
    <form name=\"feed\" id=\"feed\" method=\"post\" action=\"?sw=feed&sw2=1\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" /></form>";

if($menu_section=="view_estimation") $output=$output."<p class=\"verdana\"><a href=\"#\" onclick=\"document.forms['new_calc'].submit();\">New Effort Estimation</a></span> | 
<a href=\"#\" onclick=\"document.forms['view_estimations'].submit();\">View / Edit Your Estimations</a> | <a href=\"#\" onclick=\"document.forms['feed'].submit();\">Feed The System</a></p>
<form name=\"new_calc\" id=\"new_calc\" method=\"post\" action=\"?sw=new_calc\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" /></form>
<form name=\"view_estimations\" id=\"view_estimations\" method=\"post\" action=\"?sw=view_edit_estimations\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" /></form>
  <form name=\"feed\" id=\"feed\" method=\"post\" action=\"?sw=feed&sw2=1\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" /></form>";
 
if($menu_section=="feed") $output=$output."<p class=\"verdana\"><a href=\"#\" onclick=\"document.forms['new_calc'].submit();\">New Effort Estimation</a></span> | 
<a href=\"#\" onclick=\"document.forms['view_estimations'].submit();\">View / Edit Your Estimations</a> | <span class=\"verdanaboldgreen\"> Feed The System </a></p>
<form name=\"new_calc\" id=\"new_calc\" method=\"post\" action=\"?sw=new_calc\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" /></form>
<form name=\"view_estimations\" id=\"view_estimations\" method=\"post\" action=\"?sw=view_edit_estimations\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" /></form>"; 
  
$output=$output."<span class=\"verdanasm\"><span class=\"vardanared\">Notice:</span> Do not store sensitive information. All estimations are saved in a global online database for statistical purposes  and in order to allow users to review and or reuse. E.g. for project title you dont have to add customer name, but just a descriptive title of what this is about e.g. &quot;Social Networking Website&quot; You can add your internal project code in Project Title in order to identify your estimation (e.g. Social Networking Web Site - 0495).<br><br></span>";

return $output;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function get_mail_and_id(){ ?>
</p>
<form name="id_mail" id="id_mail" method="post" action="?sw=chek_mail_id">
  <table width="100%" border="0">
  <tr>
    <td width="11%" class="verdana">Your E-mail:</td>
    <td width="89%"><input type="text" name="useremail" id="useremail" />
    <span class="vardanared">*</span></td>
  </tr>
  <tr>
    <td class="verdana">Your ID:</td>
    <td><input type="text" name="acid" id="acid" />
    <span class="vardanared">*</span></td>
  </tr>
</table>
<span class="verdanasm">(With your ID you can access your own estimations, settings, edit old estimations e.t.c. If you do not have an ID, type one now and use it next time you will use this tool to access estimations and data under this ID.)</span>
<br /><br /><input name="Go" type="submit" value="Go"/>
</form>
<p>
<?php  } 

function chek_mail_id(){ 

//check user e-mail and id
$useremail=strip_tags(trim($_POST['useremail']));
$acid=strip_tags(trim($_POST['acid']));

echo ch_crt_email_acid($useremail,$acid);
if (ch_crt_email_acid($useremail,$acid)!='') die(); else new_calc();  
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function calc() {

$sw2=$useremail=strip_tags(trim($_GET['sw2'])); //check if we are going to update
$est_id=strip_tags(trim($_POST['est_id']));
$useremail=strip_tags(trim($_POST['useremail']));
$acid=strip_tags(trim($_POST['acid']));
$project_title=strip_tags(trim($_POST['project_title']));
$project_description=strip_tags(trim($_POST['project_description']));
$project_type=strip_tags(trim($_POST['project_type']));
$project_size=strip_tags(trim($_POST['project_size']));
$new_code_FP_language=strip_tags(trim($_POST['new_code_FP_language']));
$no_of_ilf=strip_tags(trim($_POST['no_of_ilf']));
$avg_complexity_ilf=strip_tags(trim($_POST['avg_complexity_ilf']));
$no_of_eif=strip_tags(trim($_POST['no_of_eif']));
$avg_complexity_eif=strip_tags(trim($_POST['avg_complexity_eif']));
$no_of_ei=strip_tags(trim($_POST['no_of_ei']));
$avg_complexity_ei=strip_tags(trim($_POST['avg_complexity_ei']));
$no_of_eo=strip_tags(trim($_POST['no_of_eo']));
$avg_complexity_eo=strip_tags(trim($_POST['avg_complexity_eo']));
$no_of_einq=strip_tags(trim($_POST['no_of_einq']));
$avg_complexity_einq=strip_tags(trim($_POST['avg_complexity_einq']));
$adaptedKSLOC=strip_tags(trim($_POST['adaptedKSLOC']));
$adaptedFP=strip_tags(trim($_POST['adaptedFP']));
$adapted_avg_complexityFP=strip_tags(trim($_POST['adapted_avg_complexityFP']));
$adapted_code_FP_language=strip_tags(trim($_POST['adapted_code_FP_language']));
$adapted_SU=strip_tags(trim($_POST['adapted_SU']));
$adapted_AA=strip_tags(trim($_POST['adapted_AA']));
$adapted_UNFM=strip_tags(trim($_POST['adapted_UNFM']));
$adapted_DM=strip_tags(trim($_POST['adapted_DM']));
$adapted_CM=strip_tags(trim($_POST['adapted_CM']));
$adapted_IM=strip_tags(trim($_POST['adapted_IM']));
$reusedKSLOC=strip_tags(trim($_POST['reusedKSLOC']));
$reusedFP=strip_tags(trim($_POST['reusedFP']));
$reused_avg_complexityFP=strip_tags(trim($_POST['reused_avg_complexityFP']));
$reused_code_FP_language=strip_tags(trim($_POST['reused_code_FP_language']));
$reused_AA=strip_tags(trim($_POST['reused_AA']));
$reused_IM=strip_tags(trim($_POST['reused_IM']));
$automated_translation=strip_tags(trim($_POST['automated_translation']));
$ATPRODSLCOC=strip_tags(trim($_POST['ATPRODSLCOC']));
$ATPRODFP=strip_tags(trim($_POST['ATPRODFP']));
$REVL=strip_tags(trim($_POST['REVL']));
$Precedentedness=strip_tags(trim($_POST['Precedentedness']));
$development_flexibility=strip_tags(trim($_POST['development_flexibility']));
$architecture_risk=strip_tags(trim($_POST['architecture_risk']));
$team_cohesion=strip_tags(trim($_POST['team_cohesion']));
$process_maturity=strip_tags(trim($_POST['process_maturity']));
$rely=strip_tags(trim($_POST['rely']));
$data=strip_tags(trim($_POST['data']));
$cplx=strip_tags(trim($_POST['cplx']));
$ruse=strip_tags(trim($_POST['ruse']));
$docu=strip_tags(trim($_POST['docu']));
$time=strip_tags(trim($_POST['time']));
$stor=strip_tags(trim($_POST['stor']));
$pvol=strip_tags(trim($_POST['pvol']));
$acap=strip_tags(trim($_POST['acap']));
$pcap=strip_tags(trim($_POST['pcap']));
$pcon=strip_tags(trim($_POST['pcon']));
$apex=strip_tags(trim($_POST['apex']));
$plex=strip_tags(trim($_POST['plex']));
$ltex=strip_tags(trim($_POST['ltex']));
$tool=strip_tags(trim($_POST['tool']));
$site=strip_tags(trim($_POST['site']));
$sced=strip_tags(trim($_POST['sced']));
$calibration_factor_A=strip_tags(trim($_POST['calibration_factor_A']));

// CME Estimation variables
$cme_tasks_count=strip_tags(trim($_POST['cme_allm_count']));

for($k=1; $k<=$cme_tasks_count; $k++) { 
$cme_efforts[$k]['0']=strip_tags(trim($_POST['cme_m'.$k]));
$cme_efforts[$k]['1']=strip_tags(trim($_POST['cme_m'.$k.'_count'])); 
$cme_efforts[$k]['2']=strip_tags(trim($_POST['cme_m'.$k.'_adjustment']));
}

// Work Breakdown Structure Estimation variables

$wbs_effort_record_method=strip_tags(trim($_POST['wbs_effort_record_method']));
$wbs_tasks_count=strip_tags(trim($_POST['wbs_tasks_count']));

for($k=1; $k<=$wbs_tasks_count; $k++) { 
$wbs_efforts[$k]['0']=strip_tags(trim($_POST['wbs_task'.$k.'_name']));
$wbs_efforts[$k]['1']=strip_tags(trim($_POST['wbs_task'.$k.'_effort1'])); 
$wbs_efforts[$k]['2']=strip_tags(trim($_POST['wbs_task'.$k.'_effort2']));
$wbs_efforts[$k]['3']=strip_tags(trim($_POST['wbs_task'.$k.'_effort3']));  
}

// Analogy / comparison variables

$analogy_comparison_selector=strip_tags(trim($_POST['analogy_comparison_selector']));

$ac_datafiles=strip_tags(trim($_POST['ac_datafiles']));
$ac_data_entry_items=strip_tags(trim($_POST['ac_data_entry_items']));
$ac_data_output_items=strip_tags(trim($_POST['ac_data_output_items']));
$ac_UFP=strip_tags(trim($_POST['ac_UFP']));
$ac_internal_complexity=strip_tags(trim($_POST['ac_internal_complexity']));

$ac_internal_process_per_cent=strip_tags(trim($_POST['ac_internal_process_per_cent']));
$ac_data_entry_per_cent=strip_tags(trim($_POST['ac_data_entry_per_cent']));
$ac_output_form_per_cent=strip_tags(trim($_POST['ac_output_form_per_cent']));
$ac_data_query_per_cent=strip_tags(trim($_POST['ac_data_query_per_cent']));
$ac_printing_per_cent=strip_tags(trim($_POST['ac_printing_per_cent']));

$ac_programming_language=strip_tags(trim($_POST['ac_programming_language']));
$ac_tools_used1=strip_tags(trim($_POST['ac_tools_used1']));
$ac_tools_used2=strip_tags(trim($_POST['ac_tools_used2']));
$ac_tools_used3=strip_tags(trim($_POST['ac_tools_used3']));
$ac_tools_used4=strip_tags(trim($_POST['ac_tools_used4']));
$ac_tools_used5=strip_tags(trim($_POST['ac_tools_used5']));
$ac_experience_in_tool_language=strip_tags(trim($_POST['ac_experience_in_tool_language']));
$ac_experience_in_appl_type=strip_tags(trim($_POST['ac_experience_in_appl_type']));
$ac_avg_team_size=strip_tags(trim($_POST['ac_avg_team_size']));
$ac_dbms1=strip_tags(trim($_POST['ac_dbms1']));
$ac_dbms2=strip_tags(trim($_POST['ac_dbms2']));
$ac_dbms3=strip_tags(trim($_POST['ac_dbms3']));
$ac_dbms4=strip_tags(trim($_POST['ac_dbms4']));
$ac_dbms5=strip_tags(trim($_POST['ac_dbms5']));
$ac_development_methodology=strip_tags(trim($_POST['ac_development_methodology']));
$ac_architecture=strip_tags(trim($_POST['ac_architecture']));
$ac_no_of_templates_screens=strip_tags(trim($_POST['ac_no_of_templates_screens']));
$ac_avg_screens_templates_complexity=strip_tags(trim($_POST['ac_avg_screens_templates_complexity']));
$ac_no_of_content_objects=strip_tags(trim($_POST['ac_no_of_content_objects']));
$ac_no_of_widgets=strip_tags(trim($_POST['ac_no_of_widgets']));
$ac_avg_widgets_complexity=strip_tags(trim($_POST['ac_avg_widgets_complexity']));
$ac_use_of_CMS=strip_tags(trim($_POST['ac_use_of_CMS']));
$ac_extentend_of_code_reuse_to_other_projects=strip_tags(trim($_POST['ac_extentend_of_code_reuse_to_other_projects']));
$ac_extentend_of_code_reuse=strip_tags(trim($_POST['ac_extentend_of_code_reuse']));
$ac_of_api_calls=strip_tags(trim($_POST['ac_of_api_calls']));
$ac_of_external_interfaces=strip_tags(trim($_POST['ac_of_external_interfaces']));

$actual_effort_in_pdays=strip_tags(trim($_POST['actual_effort_in_pdays']));

echo get_effort($sw2,$est_id,$useremail,$acid,$project_title,$project_description,$project_type,$project_size,$new_code_FP_language,$no_of_ilf,$avg_complexity_ilf,$no_of_eif,$avg_complexity_eif,$no_of_ei,$avg_complexity_ei,$no_of_eo,$avg_complexity_eo,$no_of_einq,$avg_complexity_einq,$adaptedKSLOC,$adaptedFP,$adapted_avg_complexityFP,$adapted_code_FP_language,$adapted_SU,$adapted_AA,$adapted_UNFM,$adapted_DM,$adapted_CM,$adapted_IM,$reusedKSLOC,$reusedFP,$reused_avg_complexityFP,$reused_code_FP_language,$reused_AA,$reused_IM,$automated_translation,$ATPRODSLCOC,$ATPRODFP,$REVL,$Precedentedness,$development_flexibility,$architecture_risk,$team_cohesion,$process_maturity,$rely,$data,$cplx,$ruse,$docu,$time,$stor,$pvol,$acap,$pcap,$pcon,$apex,$plex,$ltex,$tool,$site,$sced,$calibration_factor_A,$wbs_effort_record_method,$cme_efforts,$cme_tasks_count,$wbs_efforts,$wbs_tasks_count,$analogy_comparison_selector,$ac_internal_process_per_cent,$ac_data_entry_per_cent,$ac_data_query_per_cent,$ac_printing_per_cent,$ac_internal_complexity,$ac_datafiles,$ac_data_entry_items,$ac_output_form_per_cent,$ac_UFP,$ac_programming_language,$ac_tools_used1,$ac_tools_used2,$ac_tools_used3,$ac_tools_used4,$ac_tools_used5,$ac_experience_in_tool_language,$ac_experience_in_appl_type,$ac_avg_team_size,$ac_dbms1,$ac_dbms2,$ac_dbms3,$ac_dbms4,$ac_dbms5,$ac_development_methodology,$ac_architecture,$ac_no_of_templates_screens,$ac_avg_screens_templates_complexity,$ac_no_of_content_objects,$ac_no_of_widgets,$ac_avg_widgets_complexity,$ac_use_of_CMS,$ac_extentend_of_code_reuse_to_other_projects,$ac_extentend_of_code_reuse,$ac_of_api_calls,$ac_of_external_interfaces,$actual_effort_in_pdays);

}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function feed_store_actual_effort(){
$useremail=strip_tags(trim($_POST['useremail']));
$acid=strip_tags(trim($_POST['acid']));
$records_count=strip_tags(trim($_POST['records_count']));
$feed_store_data=array();

for($k=1; $k<=$records_count; $k++) { 
$feed_store_data[$k]['0']=strip_tags(trim($_POST['actual_effort'.($k-1)]));
$feed_store_data[$k]['1']=strip_tags(trim($_POST['estimation_id'.($k-1)])); 
}

echo do_feed_store_actual_effort($useremail,$acid,$records_count,$feed_store_data);
	
}	

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function cme_feed_update() {

$useremail=strip_tags(trim($_POST['useremail']));
$acid=strip_tags(trim($_POST['acid']));
$task_module_feed_update_count=strip_tags(trim($_POST['task_module_feed_update_count']));
$cme_feed_update_mdata=array();

for($k=1; $k<=$task_module_feed_update_count; $k++) { 
$cme_feed_update_mdata[$k]['0']=strip_tags(trim($_POST['checkbox'.$k]));
$cme_feed_update_mdata[$k]['1']=strip_tags(trim($_POST['task_module_name'.$k])); 
$cme_feed_update_mdata[$k]['2']=strip_tags(trim($_POST['task_module_complexity'.$k]));
$cme_feed_update_mdata[$k]['3']=strip_tags(trim($_POST['task_module_effortpdays'.$k]));
$cme_feed_update_mdata[$k]['4']=strip_tags(trim($_POST['task_module_id'.$k]));
}

echo do_cme_feed_update($useremail,$acid,$task_module_feed_update_count,$cme_feed_update_mdata);
	
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function cme_feed_add_new() {

$useremail=strip_tags(trim($_POST['useremail']));
$acid=strip_tags(trim($_POST['acid']));
$cme_feed_all_count=strip_tags(trim($_POST['cme_feed_all_count']));
$cme_feed_new_mdata=array();

for($k=1; $k<=$cme_feed_all_count; $k++) { 
$cme_feed_new_mdata[$k]['0']=strip_tags(trim($_POST['feed_task_module_name'.$k]));
$cme_feed_new_mdata[$k]['1']=strip_tags(trim($_POST['feed_task_module_complexity'.$k])); 
$cme_feed_new_mdata[$k]['2']=strip_tags(trim($_POST['feed_task_module_effortpdays'.$k]));
}
echo do_cme_feed_add_new($useremail,$acid,$cme_feed_all_count,$cme_feed_new_mdata);
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
//soap functions
/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
function get_own_compa_analogy_estimation($useremail,$acid)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/get_own_compa_analogy_estimation"));
	  
$outcome = $client->get_own_compa_analogy_estimation($useremail,$acid);

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////


function do_feed_store_actual_effort($useremail,$acid,$records_count,$feed_store_data)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/do_feed_store_actual_effort"));
	  
$outcome = $client->do_feed_store_actual_effort($useremail,$acid,$records_count,$feed_store_data);

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function do_cme_feed_add_new($useremail,$acid,$cme_feed_all_count,$cme_feed_new_mdata)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/do_cme_feed_add_new"));
	  
$outcome = $client->do_cme_feed_add_new($useremail,$acid,$cme_feed_all_count,$cme_feed_new_mdata);

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function do_cme_feed_update($useremail,$acid,$task_module_feed_update_count,$cme_feed_update_mdata){
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/do_cme_feed_update"));
	  
$outcome = $client->do_cme_feed_update($useremail,$acid,$task_module_feed_update_count,$cme_feed_update_mdata);

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function get_estimation_details($est_id,$useremail,$acid)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/get_estimation_details"));
	  
$outcome = $client->get_estimation_details($est_id,$useremail,$acid);

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function get_own_estimations($useremail,$acid)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/get_own_estimations"));
	  
$outcome = $client->get_own_estimations($useremail,$acid);

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function explain_msg($explain_msg_id)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/explain_msg"));
	  
$outcome = $client->explain_msg($explain_msg_id);

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function ch_crt_email_acid($useremail,$acid)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/ch_crt_email_acid"));
	  
$outcome = $client->ch_crt_email_acid($useremail,$acid);

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function get_own_modules_tasks_for_editing($useremail,$acid)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/get_own_modules_tasks_for_editing"));
	  
$outcome = $client->get_own_modules_tasks_for_editing($useremail,$acid);

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function get_own_modules_tasks($useremail,$acid)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,

      'uri'      => "urn://effort-estimation/get_own_modules_tasks"));
	  
$outcome = $client->get_own_modules_tasks($useremail,$acid);

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function get_all_modules_tasks()
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/get_all_modules_tasks"));
	  
$outcome = $client->get_all_modules_tasks();

return $outcome;
}

/////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

function general_validations($useremail,$project_title,$project_description)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/general_validations"));
	  
$outcome = $client->general_validations($useremail,$project_title,$project_description);

return $outcome;
}

function get_effort($sw2,$est_id,$useremail,$acid,$project_title,$project_description,$project_type,$project_size,$new_code_FP_language,$no_of_ilf,$avg_complexity_ilf,$no_of_eif,$avg_complexity_eif,$no_of_ei,$avg_complexity_ei,$no_of_eo,$avg_complexity_eo,$no_of_einq,$avg_complexity_einq,$adaptedKSLOC,$adaptedFP,$adapted_avg_complexityFP,$adapted_code_FP_language,$adapted_SU,$adapted_AA,$adapted_UNFM,$adapted_DM,$adapted_CM,$adapted_IM,$reusedKSLOC,$reusedFP,$reused_avg_complexityFP,$reused_code_FP_language,$reused_AA,$reused_IM,$automated_translation,$ATPRODSLCOC,$ATPRODFP,$REVL,$Precedentedness,$development_flexibility,$architecture_risk,$team_cohesion,$process_maturity,$rely,$data,$cplx,$ruse,$docu,$time,$stor,$pvol,$acap,$pcap,$pcon,$apex,$plex,$ltex,$tool,$site,$sced,$calibration_factor_A,$wbs_effort_record_method,$cme_efforts,$cme_tasks_count,$wbs_efforts,$wbs_tasks_count,$analogy_comparison_selector,$ac_internal_process_per_cent,$ac_data_entry_per_cent,$ac_data_query_per_cent,$ac_printing_per_cent,$ac_internal_complexity,$ac_datafiles,$ac_data_entry_items,$ac_output_form_per_cent,$ac_UFP,$ac_programming_language,$ac_tools_used1,$ac_tools_used2,$ac_tools_used3,$ac_tools_used4,$ac_tools_used5,$ac_experience_in_tool_language,$ac_experience_in_appl_type,$ac_avg_team_size,$ac_dbms1,$ac_dbms2,$ac_dbms3,$ac_dbms4,$ac_dbms5,$ac_development_methodology,$ac_architecture,$ac_no_of_templates_screens,$ac_avg_screens_templates_complexity,$ac_no_of_content_objects,$ac_no_of_widgets,$ac_avg_widgets_complexity,$ac_use_of_CMS,$ac_extentend_of_code_reuse_to_other_projects,$ac_extentend_of_code_reuse,$ac_of_api_calls,$ac_of_external_interfaces,$actual_effort_in_pdays)
{
global $data_url;

$client = new SoapClient(null, array(     'location' =>$data_url,
      'uri'      => "urn://effort-estimation/get_effort"));
	  
$outcome = $client->get_effort($sw2,$est_id,$useremail,$acid,$project_title,$project_description,$project_type,$project_size,$new_code_FP_language,$no_of_ilf,$avg_complexity_ilf,$no_of_eif,$avg_complexity_eif,$no_of_ei,$avg_complexity_ei,$no_of_eo,$avg_complexity_eo,$no_of_einq,$avg_complexity_einq,$adaptedKSLOC,$adaptedFP,$adapted_avg_complexityFP,$adapted_code_FP_language,$adapted_SU,$adapted_AA,$adapted_UNFM,$adapted_DM,$adapted_CM,$adapted_IM,$reusedKSLOC,$reusedFP,$reused_avg_complexityFP,$reused_code_FP_language,$reused_AA,$reused_IM,$automated_translation,$ATPRODSLCOC,$ATPRODFP,$REVL,$Precedentedness,$development_flexibility,$architecture_risk,$team_cohesion,$process_maturity,$rely,$data,$cplx,$ruse,$docu,$time,$stor,$pvol,$acap,$pcap,$pcon,$apex,$plex,$ltex,$tool,$site,$sced,$calibration_factor_A,$wbs_effort_record_method,$cme_efforts,$cme_tasks_count,$wbs_efforts,$wbs_tasks_count,$analogy_comparison_selector,$ac_internal_process_per_cent,$ac_data_entry_per_cent,$ac_data_query_per_cent,$ac_printing_per_cent,$ac_internal_complexity,$ac_datafiles,$ac_data_entry_items,$ac_output_form_per_cent,$ac_UFP,$ac_programming_language,$ac_tools_used1,$ac_tools_used2,$ac_tools_used3,$ac_tools_used4,$ac_tools_used5,$ac_experience_in_tool_language,$ac_experience_in_appl_type,$ac_avg_team_size,$ac_dbms1,$ac_dbms2,$ac_dbms3,$ac_dbms4,$ac_dbms5,$ac_development_methodology,$ac_architecture,$ac_no_of_templates_screens,$ac_avg_screens_templates_complexity,$ac_no_of_content_objects,$ac_no_of_widgets,$ac_avg_widgets_complexity,$ac_use_of_CMS,$ac_extentend_of_code_reuse_to_other_projects,$ac_extentend_of_code_reuse,$ac_of_api_calls,$ac_of_external_interfaces,$actual_effort_in_pdays);

return $outcome;
}

//////////////////////////////////////////////////////////////////////////////////
///////// UI Functions
//////////////////////////////////////////////////////////////////////////////////

function feed(){ 

//check user e-mail and id
$useremail=strip_tags(trim($_POST['useremail']));
$acid=strip_tags(trim($_POST['acid']));
$sw2=strip_tags(trim($_GET['sw2']));
if(!isset($sw2) || $sw2!=1 || $sw2!=2) $sw=1;

echo ch_crt_email_acid($useremail,$acid);

echo top_menu($useremail,$acid,"feed");

if($sw2==1) {
echo "<span class=\"verdanasm\"><b>Add Own Modules/Tasks Efforts</b></span> | ";
} else {
echo "<a href=\"#\" onclick=\"document.forms['add_own_modules_tasks'].submit();\"><span class=\"verdanasm\"><b>Add Own Modules/Tasks Efforts</b></span></a> | ";	
}

if($sw2==2) {
echo "<span class=\"verdanasm\"><b>Add Actual Effort on Submited estimations with Analogy/Comparisson Data</b></span";
} else {  
echo "<a href=\"#\" onclick=\"document.forms['add_actual_efforts_compa_analogy'].submit();\"><span class=\"verdanasm\"><b>Add Actual Effort on Submited estimations with Analogy/Comparisson Data</b></span></a>";
}

echo "<form name=\"add_actual_efforts_compa_analogy\" id=\"add_actual_efforts_compa_analogy\" method=\"post\" action=\"?sw=feed&sw2=2\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" />
</form>

<form name=\"add_own_modules_tasks\" id=\"add_own_modules_tasks\" method=\"post\" action=\"?sw=feed&sw2=1\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" />
</form>";

echo"<br>";

echo "<span class='verdanasm'>If you have added or updated tasks/modules <a href='JavaScript:window.location.reload(true);'><b>reload the page</b></a> to update forms data.</span><br><br>";
?>

  <script language="javascript">

function addRow_cme_feed(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            cell1.appendChild(element1);
 
 
            var cell2 = row.insertCell(1);
			var element2 = document.createElement("input");
            element2.type = "text";
			element2.name = "feed_task_module_name"+(rowCount);
			cell2.appendChild(element2);
 		   
            var cell3 = row.insertCell(2);
            var element3 = document.createElement("select");
            element3.type = "select";
			element3.name = "feed_task_module_complexity"+(rowCount);
			var option;
		    option = document.createElement("option");
            option.setAttribute("value", "Low");
            option.innerHTML = "Low";
            element3.appendChild(option);
			option = document.createElement("option");
			option.setAttribute("value", "Average");
			option.setAttribute("selected", "selected");
            option.innerHTML = "Average";
            element3.appendChild(option);
			option = document.createElement("option");		
			option.setAttribute("value", "High");
            option.innerHTML = "High";
            element3.appendChild(option);	 
            cell3.appendChild(element3);
			
			
			var cell4 = row.insertCell(3);
			var element4 = document.createElement("input");
            element4.type = "text";
			element4.name = "feed_task_module_effortpdays"+(rowCount);
            cell4.appendChild(element4);
								
			document.cme_feed_add.cme_feed_all_count.value=rowCount;
  
        }
 
        function deleteRow_cme_feed(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
			 
            }catch(e) {
                alert(e);
            }
			rowCount--;
			document.cme_feed_add.cme_feed_all_count.value=rowCount;
        }
        
        </script>

<?php if($sw2==1) { ?>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td colspan="2" bgcolor="#666666">&nbsp;   </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#666666" class="verdana_white">Add Your Custom Modules / Tasks</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#666666">&nbsp;  </td>
  </tr>
  <tr>
    <td colspan="2"><p>
      <input type="button" value="Add Row" onclick="addRow_cme_feed('cme_feed')" />
      <input type="button" value="Delete Row" onclick="deleteRow_cme_feed('cme_feed')" />
     </p>
     <form name="cme_feed_add" id="cme_feed_add" method="post" action="?sw=cme_feed_add_new">
      <table id="cme_feed" width="59%" border="0">
        <tr>
        <td  class="verdana">Delete</td>
          <td width="33%" nowrap="nowrap" class="verdana">Task Module Name</td>
          <td width="34%" class="verdana">Complexity</td>
          <td width="33%" nowrap="nowrap" class="verdana">Effort in Person Days</td>
        </tr>
        <tr>
        <td><input type="checkbox" name="checf" id="checf" /></td>
          <td><input type="text" name="feed_task_module_name1" id="feed_task_module_name1" /></td>
          <td><select name="feed_task_module_complexity1" id="feed_task_module_complexity1">
            <option value="Low">Low</option>
            <option value="Average"  selected="selectd">Average</option>
            <option value="High">High</option>
           </select></td>
          <td><input name="feed_task_module_effortpdays1" type="text" id="feed_task_module_effortpdays1" /></td>
        </tr>
      </table>
      <p>
        <input name="submit" type="submit" value="Save"/>
      </p>
  <input type="hidden" name="useremail" id="useremail" value="<?php echo $useremail; ?>"/>
  <input type="hidden" name="acid" id="acid" value="<?php echo $acid; ?>" />
 <input type="hidden" name="cme_feed_all_count" id="cme_feed_all_count" value="1">
      </form>
    <p class="bold">&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#666666">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#666666" class="verdana_white">Your Stored Modules Tasks</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#666666">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
    <form name="cme_feed_update" id="cme_feed_update" action="?sw=cme_feed_update" method="post">
    <table width="67%" border="0">
      <tr>
        <td width="16%" class="verdana">Delete</td>
        <td width="29%" nowrap="nowrap" class="verdana">Task Module Name</td>
        <td width="28%" class="verdana">Complexity</td>
        <td width="27%" nowrap="nowrap" class="verdana">Effort in Person Days</td>
      </tr>
      
    <?php 
	
	$own_m_t=get_own_modules_tasks_for_editing($useremail,$acid);
	
	 for ($i=1; $i<=count($own_m_t); $i++){?>
      <tr>
        <td><input type="checkbox" name="checkbox<?php echo $i; ?>" value="1" id="checkbox<?php echo $i; ?>" /></td>
        <td><input type="text" name="task_module_name<?php echo $i; ?>" id="task_module_name<?php echo $i; ?>" value="<?php echo $own_m_t[$i-1][0]; ?>"/></td>
        <td><select name="task_module_complexity<?php echo $i; ?>" id="task_module_complexity<?php echo $i; ?>">
          <option value="<?php echo $own_m_t[$i-1][1]; ?>" selected="selected"><?php echo $own_m_t[$i-1][1]; ?></option>
          <option value="Low">Low</option>
          <option value="Average">Average</option>
          <option value="High">High</option>
         </select></td>
        <td><input name="task_module_effortpdays<?php echo $i; ?>" type="text" id="task_module_effortpdays<?php echo $i; ?>" value="<?php echo $own_m_t[$i-1][2]; ?>"/>
        <input type="hidden" name="task_module_id<?php echo $i; ?>" id="task_module_id<?php echo $i; ?>" value="<?php echo $own_m_t[$i-1][3]; ?>"/>
            </td>
      </tr>
      <?php }?>
    </table> 
      <input type="hidden" name="useremail" id="useremail" value="<?php echo $useremail; ?>"/>
  <input type="hidden" name="acid" id="acid" value="<?php echo $acid; ?>" />
    <input type="hidden" name="task_module_feed_update_count" id="task_module_feed_update_count" value="<?php echo count($own_m_t); ?>"/>
    <br /><input name="submit" type="submit" value="Update"/>

</form>
    </td>
  </tr>
  <tr>
    <td width="36%">&nbsp;</td>
    <td width="64%">&nbsp;  </td>
  </tr>
</table>
 
<?php } 

//start of analogy/comparison actual effort update
if($sw2==2) {

$own_comp_analogy_data=get_own_compa_analogy_estimation($useremail,$acid);

if (count($own_comp_analogy_data)>0){

echo "<form name=\"feed_store_actual_effort\" id=\"feed_store_actual_effort\" method=\"post\" action=\"?sw=feed_store_actual_effort\">"; 

echo "<table><tr><td nowrap='nowrap'><span class='verdana'><b>Project Title</b></span></td><td nowrap='nowrap' bgcolor='#CCCCCC'><span class='verdana' ><b>Analogy Effort (PDAYS)</b></span></td><td nowrap='nowrap'><span class='verdana'><b>Comparison Effort (PDAYS)</b></span></td><td bgcolor='#CCCCCC'><span class='verdana'><b>Add Actual Effort (PDAYS)</b> <br>if you leave this empty it will be ignored. If you change this to empty it will upadate your Effort Estimation and this project will removed from the analogy/comparison datasets database.</span></td></tr>";
	
for ($i=0; $i<count($own_comp_analogy_data); $i++){

echo "<tr>
<td valign=\"top\"><a href=\"#\" onclick=\"document.forms['view_estimation".$i."'].submit();\"><span class=\"verdanasm\">".$own_comp_analogy_data[$i][0]." | <b>".$own_comp_analogy_data[$i][1]."</b></span></a></td>
<td valign=\"top\" align=\"right\" bgcolor=\"#CCCCCC\"><span class=\"verdanasm\">".$own_comp_analogy_data[$i][2]."</td>
<td valign=\"top\" align=\"right\"><span class=\"verdanasm\">".$own_comp_analogy_data[$i][3]."</td>
<td valign=\"top\" align=\"center\" bgcolor=\"#CCCCCC\"><span class=\"verdanasm\"><input type='text' name='actual_effort".$i."' id='actual_effort".$i."' value='".$own_comp_analogy_data[$i][4]."'>
<input type='hidden' name='estimation_id".$i."' id='estimation_id".$i."' value='".$own_comp_analogy_data[$i][0]."'>


</span></td></tr>";
}

echo "</table>
  <input type='hidden' name='useremail' id='useremail' value='".$useremail."'/>
  <input type='hidden' name='acid' id='acid' value='".$acid."' />
<input type='hidden' name='records_count' id='records_count' value='".count($own_comp_analogy_data)."'>
<br><input type=\"submit\" name=\"update\" id=\"update\" value=\"Update/Save Actual Effort\" />
</form>
<form name=\"view_estimation".$i."\" id=\"view_estimation".$i."\" method=\"post\" action=\"?sw=new_calc\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" />
  <input type=\"hidden\" name=\"est_id\" id=\"est_id\" value=\"".$own_comp_analogy_data[$i][0]."\" /></form>";
	
}else{
echo "<span class='verdana'>You have not submited any estimations tha use comparison or analogy. Add a new estimation tha will use these methods and then return here to add actual effort in order to feed our database.<br><br><a href='JavaScript:history.back(1)'><b>BACK</b></a></span>";
}

}//end of analogy/comparison actual effort update

}

//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

function view_edit_estimations(){ 

//check user e-mail and id
$useremail=strip_tags(trim($_POST['useremail']));
$acid=strip_tags(trim($_POST['acid']));

echo ch_crt_email_acid($useremail,$acid);

echo top_menu($useremail,$acid,"view_edit_estimations");

$estimations=get_own_estimations($useremail,$acid);

if (count($estimations)>0){

echo "<table>";

for ($i=0; $i<count($estimations); $i++){

echo "<tr>
<td valign=\"top\"><a href=\"#\" onclick=\"document.forms['view_estimation".$i."'].submit();\"><span class=\"verdanasm\">".$estimations[$i][0]." | <b>".$estimations[$i][5]."</b></span></a></td>
<td valign=\"top\"><span class=\"verdanasm\"><b>Added</b>: ".date("Y-m-d H:i:s",$estimations[$i][1]).", ".$estimations[$i][2]."<br><b>Last Modification</b>: "; if($estimations[$i][3]>0) { echo date("Y-m-d H:i:s",$estimations[$i][3]).", ".$estimations[$i][4]; } echo "</span></td>
<td valign=\"top\"><span class=\"verdanasm\">".$estimations[$i][6]."
<form name=\"view_estimation".$i."\" id=\"view_estimation".$i."\" method=\"post\" action=\"?sw=new_calc\"> 
 <input type=\"hidden\" name=\"useremail\" id=\"useremail\" value=\"".$useremail."\"/>
  <input type=\"hidden\" name=\"acid\" id=\"acid\" value=\"".$acid."\" />
  <input type=\"hidden\" name=\"est_id\" id=\"est_id\" value=\"".$estimations[$i][0]."\" /></form>
  </span></td></tr>";
}
echo "</table>";

}else{
echo "No estimations found under your ID";
}

}

//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

function new_calc(){ 

//check user e-mail and id
$useremail=strip_tags(trim($_POST['useremail']));
$acid=strip_tags(trim($_POST['acid']));

echo ch_crt_email_acid($useremail,$acid);

$all_cme_data=get_all_modules_tasks(); 
$own_data=get_own_modules_tasks($useremail,$acid); 

$est_id=strip_tags(trim($_POST['est_id'])); //if we have an est_id this means that this is not an new estimation
$ve_sw=0;
if(!empty($est_id) AND $est_id!=0) 
{
echo top_menu($useremail,$acid,"view_estimation");
$estimation_details=get_estimation_details($est_id,$useremail,$acid);
if(count($estimation_details)>0) $ve_sw=1;
}else {$est_id=''; echo top_menu($useremail,$acid,"new_estimation");}

?>
  
<script language="javascript">

function addRow_cme(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            cell1.appendChild(element1);
 
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("select");
            element2.type = "select";
			element2.name = "cme_m"+(rowCount);
			var option;
			<?php
			if (count($all_cme_data)>0) {
				
				  for ($i=0; $i<count($all_cme_data); $i++)
					{
			 echo "option = document.createElement(\"option\");
            option.setAttribute(\"value\", \"".$all_cme_data[$i]['0']."-".$all_cme_data[$i]['1']."-".$all_cme_data[$i]['2']."\");
            option.innerHTML = \"".$all_cme_data[$i]['0']."-".$all_cme_data[$i]['1']."-".$all_cme_data[$i]['2']."\";
            element2.appendChild(option);";				 
					}
	             echo "cell2.appendChild(element2);";
			}
	?>
						
			var cell3 = row.insertCell(2);
			var element3 = document.createElement("input");
            element3.type = "text";
			element3.name = "cme_m"+(rowCount)+"_count";
			element3.size="5";
            cell3.appendChild(element3);
			
			var cell4 = row.insertCell(3);
			var element4 = document.createElement("input");
            element4.type = "text";
			element4.name = "cme_m"+(rowCount)+"_adjustment";
			element4.size="5";
            cell4.appendChild(element4);
			
					
			document.main_form.cme_allm_count.value=rowCount;
  
        }
 
        function deleteRow_cme(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
			 
            }catch(e) {
                alert(e);
            }
			rowCount--;
			document.main_form.cme_allm_count.value=rowCount;
        }


function addRow_cme_own(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            cell1.appendChild(element1);
 
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("select");
            element2.type = "select";
			element2.name = "cme_m"+(rowCount);
			var option;
			
			<?php 
			
			if (count($own_data)>0) {
				
				  for ($i=0; $i<count($own_data); $i++)
					{
					 echo "option = document.createElement(\"option\");
            option.setAttribute(\"value\", \"".$own_data[$i]['0']."-".$own_data[$i]['1']."-".$own_data[$i]['2']."\");
            option.innerHTML = \"".$own_data[$i]['0']."-".$own_data[$i]['1']."-".$own_data[$i]['2']."\";
            element2.appendChild(option);";				 
					}
	             echo "cell2.appendChild(element2);";
				 
			}
			
			?>
						
			var cell3 = row.insertCell(2);
			var element3 = document.createElement("input");
            element3.type = "text";
			element3.name = "cme_m"+(rowCount)+"_count";
			element3.size="5";
            cell3.appendChild(element3);
			
			
			var cell4 = row.insertCell(3);
			var element4 = document.createElement("input");
            element4.type = "text";
			element4.name = "cme_m"+(rowCount)+"_adjustment";
			element4.size="5";
            cell4.appendChild(element4);
				
			document.main_form.cme_allm_count.value=rowCount;
  
        }
</script>
  
  <?php if($ve_sw=='1') echo "<spam class='verdana'><b>You are looking at saved estimation/project with ID: <font color='#0000FF'>".$estimation_details[0]."</b></font></span><br><br>"; ?>
  
</p>
<form name="main_form" id="main_form" method="post" action="?sw=calc">
  <input type="hidden" name="useremail" id="useremail" value="<?php echo $useremail ?>"/>
  <input type="hidden" name="acid" id="acid" value="<?php echo $acid ?>" />

<?php if($ve_sw=='1') echo "<input type=\"hidden\" name=\"est_id\" id=\"est_id\" value=\"".$est_id."\" />"; ?> 


<table width="100%" border="0">
  <tr>
    <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="0">
      <tr>
        <td colspan="2" align="left" valign="top" bgcolor="#666666" class="verdana">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top" bgcolor="#666666" class="verdana_white">Project Details</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="top" bgcolor="#666666" class="verdana">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#FFCC66" class="verdana">Project Title:</td>
        <td align="left" valign="top" bgcolor="#FFCC66"><input name="project_title" type="text" id="project_title" size="45" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[6]."\""; ?> />
          <span class="vardanared">*</span></td>
      </tr>
      <tr>
        <td align="left" valign="top" nowrap="nowrap" bgcolor="#FFCC66" class="verdana">Project Description:</td>
        <td align="left" valign="top" bgcolor="#FFCC66"><p>
          <label for="project_description"></label>
          <textarea name="project_description" id="project_description" cols="45" rows="5"><?php if($ve_sw=='1') echo $estimation_details[7]; ?> </textarea>
          <span class="vardanared">*<br /> 
          </span>(briefly describe your project)</p></td>
      </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#FFCC66" class="verdana">Project Type:</td>
        <td align="left" valign="top" bgcolor="#FFCC66"><label for="project_type"></label>
          <select name="project_type" id="project_type">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[8]); echo "<option value=\"".$estimation_details[8]."\" selected=\"selected\">".$svalue[1]."</option>
			value=\"".$estimation_details[6]."\"";} ?>
            <option value="1-Web Site">Web Site</option>
            <option value="2-Mobile Application">Mobile Application</option>
            <option value="3-Desktop Tool">Desktop Tool</option>
            <option value="4-Client Server Application">Client Server Application</option>
          </select>
          <span class="vardanared">*</span></td>
      </tr>
    </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td colspan="2" bgcolor="#666666" class="verdana">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#666666" class="verdana_white">Custom modular estimation for WEB and Mobile</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#666666" class="verdana">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#FFCC66" class="verdana"><p>
            <input type="button" value="Add Row - From Own Tasks/Modules" onclick="addRow_cme_own('cme_mTable')" />
            <input type="button" value="Add Row - From ALL Tasks/Modules" onclick="addRow_cme('cme_mTable')" />
            <input type="button" value="Delete Row" onclick="deleteRow_cme('cme_mTable')" />
          </p>
            <p>Add your Tasks/Modules and Count of items in project  If you do not add count of 1 at least in one module/task this Method Will not Be Used in Effort Estimation. You can Adjust Effort by typing the effort you want for this task. In this case the stored effort will be ignored and your Adjusted effort will be used. Leave empty in order to use stored effort. Effort is in person days.</p>
            <table id="cme_mTable" width="0%" border="0">
              <tr>
                <td class="verdana">Del </td>
                <td > <b>Name-Complexity-Effort(person days)</b></td>
                <td nowrap="nowrap"><b>Count</b></td>
                <td nowrap="nowrap"><b>Adjust(person days)</b></td>
              </tr>
              
<?php if($ve_sw=='1' AND count(explode("#",$estimation_details[65]))>0) {
	
	$svalue=explode("#",$estimation_details[65]);
	 for ($i=0; $i<count($svalue); $i++)
					{
	           echo "<tr>
                <td><input type=\"checkbox\" name=\"chk2\"/></td>
                <td ><select name=\"cme_m".($i+1)."\" id=\"cme_m".($i+1)."\">";
						
	
	$svalue2=explode("-",$svalue[$i]);
	 echo "<option value=\"".$svalue2['0']."-".$svalue2['1']."-".$svalue2['2']."\" selected=\"selected\">".$svalue2['0']."-".$svalue2['1']."-".$svalue2['2']."</option></select>
	 				</td>
                     <td ><input name=\"cme_m".($i+1)."_count\" type=\"text\" id=\"cme_m".($i+1)."_count\" size=\"5\" value=\"".$svalue2['3']."\"/></td>		
				     <td nowrap=\"nowrap\"><input name=\"cme_m".($i+1)."_adjustment\" type=\"text\" id=\"cme_m".($i+1)."_adjustment\" size=\"5\" value=\"".$svalue2['4']."\"/></td></tr>";
					} 
					
}else { echo "<tr>
                <td><input type=\"checkbox\" name=\"chk2\"/></td>
                <td ><select name=\"cme_m1\" id=\"cme_m1\">";
				 for ($i=0; $i<count($all_cme_data); $i++){
	 echo "<option value=\"".$all_cme_data[$i]['0']."-".$all_cme_data[$i]['1']."-".$all_cme_data[$i]['2']."\" >".$all_cme_data[$i]['0']."-".$all_cme_data[$i]['1']."-".$all_cme_data[$i]['2']."</option>";}
	 echo"</select>
	 				</td>
                     <td ><input name=\"cme_m1_count\" type=\"text\" id=\"cme_m1_count\" size=\"5\" /></td>		
				     <td nowrap=\"nowrap\"><input name=\"cme_m1_adjustment\" type=\"text\" id=\"cme_m1_adjustment\" size=\"5\" /></td></tr>";
				 
}
                ?>
            </table>
          <input type="hidden" name="cme_allm_count" id="cme_allm_count" value="<?php if($ve_sw=='1' AND count($svalue)>0) echo count($svalue); else echo "1"; ?>"/></td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#FFCC66" class="verdana">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#666666" class="verdana">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#666666" class="verdana_white">COCOMO II Calculation</td>
        </tr>
        <tr>
        <td colspan="2" bgcolor="#666666" class="verdana">&nbsp;</td>
        </tr>
      <tr class="verdana">
        <td colspan="2" valign="top" bgcolor="#999999" class="bold">Project Size</td>
        </tr>
      <tr class="verdana">
        <td width="30%" valign="top" bgcolor="#CCCCCC">Estimated Size on new code / work:</td>
        <td width="70%" valign="top" bgcolor="#CCCCCC"><p>
          <label class="bold">
          Thousands Single Lines of Code</label>
          <label for="project_size"></label>
            <input type="text" name="project_size" id="project_size"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[9]."\""; ?>/>
            <span class="explanationsign"><a href="javascript:toggle(1);" id="displayText1">?</a>
            </span>          
          <span class="explanationsign">
          <div class="verdanasm" id="toggleText1" style="display: none;"><?php echo explain_msg('1'); ?></div>
          </span>
          <p><span class="explanationsign">            </span>OR / AND</p>
          <p>
            <label class="bold">
              Unajusted Function Points</label>
          </p>
          <p>Select Project Main Language/Tool: 
            <label for="new_code_FP_language"></label>
            <select name="new_code_FP_language" id="new_code_FP_language">
<?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[10]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?>         
<option value="80-PHP">PHP</option>
<option value="60-.NET">.NET</option>
<option value="59-C#">C#</option>
<option value="53-Java">Java</option>
<option value="28-VB.Net">VB.Net</option>
<option value="50-ASP">ASP</option>
<option value="107-C">C</option>
<option value="53-C++">C++</option>
<option value="42-HTML">HTML</option>
<option value="52-Visual Basic">Visual Basic</option>
<option value="57-Perl">Perl</option>
<option value="46-Excel">Excel</option>
<option value="38-Access">Access</option>
<option value="29-Oracle">Oracle</option>
<option value="30-SQL">SQL</option>
<option value="11-SQL Forms">SQL Forms</option>
<option value="203-Assembler">Assembler</option>
            </select>
            <span class="explanationsign"><a href="javascript:toggle('programming_l');" id="displayTextprogramming_l">?</a></span></p>
            <div class="verdanasm" id="toggleTextprogramming_l" style="display: none;"><?php echo explain_msg('programming_l'); ?></div>
          <table width="100%" border="0">
            <tr>
              <td bgcolor="#CCCCCC">&nbsp;</td>
              <td bgcolor="#CCCCCC">Number</td>
              <td bgcolor="#CCCCCC">Avg Complexity</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC">Internal Logical Files <span class="explanationsign"><a href="javascript:toggle(2);" id="displayText2">?</a></span>
                <div class="verdanasm" id="toggleText2" style="display: none;"><?php echo explain_msg('2'); ?></div></td>
              <td bgcolor="#CCCCCC"><label for="no_of_ilf"></label>
<input type="text" name="no_of_ilf" id="no_of_ilf" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[11]."\""; ?>/></td>
              <td bgcolor="#CCCCCC"><label for="avg_complexity_ilf"></label>
<select name="avg_complexity_ilf" id="avg_complexity_ilf">
<?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[12]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?>   
  <option value="7-Low">Low</option>
  <option value="10-Average" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Average</option>
  <option value="15-High">High</option>
</select></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC"> External Interface Files              <span class="explanationsign"><a href="javascript:toggle(3);" id="displayText3">?</a></span>
                <div class="verdanasm" id="toggleText3" style="display: none;"><?php echo explain_msg('3'); ?></div></td>
              <td bgcolor="#CCCCCC"><input type="text" name="no_of_eif" id="no_of_eif" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[13]."\""; ?>/></td>
              <td bgcolor="#CCCCCC"><select name="avg_complexity_eif" id="avg_complexity_eif">
<?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[14]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
<option value="5-Low">Low</option>
<option value="7-Average" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Average</option>
<option value="10-High">High</option>
              </select></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC">External Inputs <span class="explanationsign"><a href="javascript:toggle(4);" id="displayText4">?</a></span>
                <div class="verdanasm" id="toggleText4" style="display: none;"><?php echo explain_msg('4'); ?></div></td>
              <td bgcolor="#CCCCCC"><input type="text" name="no_of_ei" id="no_of_ei" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[15]."\""; ?>/></td>
              <td bgcolor="#CCCCCC"><select name="avg_complexity_ei" id="avg_complexity_ei">
 <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[16]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
<option value="3-Low">Low</option>
<option value="4-Average" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Average</option>
<option value="6-High">High</option>
              </select></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC">
External Outputs
              <span class="explanationsign"><a href="javascript:toggle(5);" id="displayText5">?</a></span>
              <div class="verdanasm" id="toggleText5" style="display: none;"><?php echo explain_msg('5'); ?></div></td>
              <td bgcolor="#CCCCCC"><input type="text" name="no_of_eo" id="no_of_eo" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[17]."\""; ?>/></td>
              <td bgcolor="#CCCCCC"><select name="avg_complexity_eo" id="avg_complexity_eo">
 <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[18]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
<option value="4-Low">Low</option>
<option value="5-Average" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Average</option>
<option value="7-High">High</option>
              </select></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCCC">External Inquiries              <span class="explanationsign"><a href="javascript:toggle(6);" id="displayText6">?</a></span>
                <div class="verdanasm" id="toggleText6" style="display: none;"><?php echo explain_msg('6'); ?></div></td>
              <td bgcolor="#CCCCCC"><input type="text" name="no_of_einq" id="no_of_einq" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[19]."\""; ?>/></td>
              <td bgcolor="#CCCCCC"><select name="avg_complexity_einq" id="avg_complexity_einq">
               <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[20]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
<option value="3-Low">Low</option>
<option value="4-Average" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Average</option>
<option value="6-High">High</option>
              </select></td>
            </tr>
          </table></td>
        </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Reuse of code/components:</td>
        <td bgcolor="#FFCC66" class="verdana"><table width="100%" border="0">
          <tr>
            <td colspan="2" class="bold">Adapted</td>
            </tr>
          <tr>
            <td colspan="2">Thousands Lines of Code:
              <label for="adaptedKSLOC2"></label>
              <input type="text" name="adaptedKSLOC" id="adaptedKSLOC2" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[21]."\""; ?>/>
or/and <br />
Functional Points:
<input type="text" name="adaptedFP" id="adaptedFP" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[22]."\""; ?>/>
of
<select name="adapted_avg_complexityFP" id="adapted_avg_complexityFP">
               <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[23]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
  <option value="3-Low">Low</option>
  <option value="4-Average" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Average</option>
  <option value="6-High">High</option>
</select>
Complexity of Main Language:
<label for="new_code_FP_language"></label>
<select name="adapted_code_FP_language" id="adapted_code_FP_language">
               <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[24]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
<option value="80-PHP">PHP</option>
<option value="60-.NET">.NET</option>
<option value="59-C#">C#</option>
<option value="53-Java">Java</option>
<option value="28-VB.Net">VB.Net</option>
<option value="50-ASP">ASP</option>
<option value="107-C">C</option>
<option value="53-C++">C++</option>
<option value="42-HTML">HTML</option>
<option value="52-Visual Basic">Visual Basic</option>
<option value="57-Perl">Perl</option>
<option value="46-Excel">Excel</option>
<option value="38-Access">Access</option>
<option value="29-Oracle">Oracle</option>
<option value="30-SQL">SQL</option>
<option value="11-SQL Forms">SQL Forms</option>
<option value="203-Assembler">Assembler</option>
</select></td>
            </tr>
          <tr>
            <td>Adapted Software Undertanding:</td>
            <td><select name="adapted_SU" id="adapted_SU">
           <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[25]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
              <option value="50-Very Low">Very Low</option>
              <option value="40-Low">Low</option>
              <option value="30-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
              <option value="20-High">High</option>
              <option value="10-Very High">Very High</option>
              </select>
              <span class="explanationsign"><a href="javascript:toggle('SU');" id="displayTextSU">?</a></span>
              <div class="verdanasm" id="toggleTextSU" style="display: none;"><?php echo explain_msg('SU'); ?></div></td>
            </tr>
          <tr>
            <td>Assessment and Assimilation Effort Scale: </td>
            <td><select name="adapted_AA" id="adapted_AA">
           <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[26]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
              <option value="0-None">None</option>
              <option value="2-Basic module search and documentation">Basic module search and documentation</option>
              <option value="4-Some module Test and Evaluation (TandE), documentation" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Some module Test and Evaluation (TandE), documentation </option>
              <option value="6-Considerable module TandE, documentation">Considerable module TandE, documentation</option>
              <option value="8-Extensive module TandE, documentation">Extensive module TandE, documentation</option>
              </select>
              <span class="explanationsign"><a href="javascript:toggle('AA');" id="displayTextAA">?</a></span>
              <div class="verdanasm" id="toggleTextAA" style="display: none;"><?php echo explain_msg('AA'); ?></div></td>
            </tr>
          <tr>
            <td>Scale for Programmer Unfamiliarity:</td>
            <td><select name="adapted_UNFM" id="adapted_UNFM">
            <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[27]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
              <option value="0.0-Completely familiar">Completely familiar</option>
              <option value="0.2-Mostly familiar">Mostly familiar</option>
              <option value="0.4-Somewhat familiar"  <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Somewhat familiar</option>
              <option value="0.6-Considerably familiar">Considerably familiar</option>
              <option value="0.8-Mostly unfamiliar">Mostly unfamiliar</option>
              <option value="1.0-Completely unfamiliar">Completely unfamiliar</option>
            </select></td>
            </tr>
          <tr>
            <td>Percent Design Modified:</td>
            <td><input name="adapted_DM" type="text" id="adapted_DM" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[28]."\""; else echo "value=\"10\"";?>/>
              % <span class="explanationsign"><a href="javascript:toggle('DM');" id="displayTextDM">?</a></span>
              <div class="verdanasm" id="toggleTextDM" style="display: none;"><?php echo explain_msg('DM'); ?></div></td>
            </tr>
          <tr>
            <td>Percent Code Modified: </td>
            <td><input name="adapted_CM" type="text" id="adapted_CM" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[29]."\""; else echo "value=\"20\"";?> />
              % <span class="explanationsign"><a href="javascript:toggle('CM');" id="displayTextCM">?</a></span>
              <div class="verdanasm" id="toggleTextCM" style="display: none;"><?php echo explain_msg('CM'); ?></div></td>
            </tr>
          <tr>
            <td>Percent of Integration Required for Adapted Software:</td>
            <td><input name="adapted_IM" type="text" id="adapted_IM" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[30]."\""; else echo "value=\"30\"";?> />
% <span class="explanationsign"><a href="javascript:toggle('IM');" id="displayTextIM">?</a></span>
<div class="verdanasm" id="toggleTextIM" style="display: none;"><?php echo explain_msg('IM'); ?></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="bold">Reused</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">Thousands Lines of Code:
              <input type="text" name="reusedKSLOC" id="reusedKSLOC" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[31]."\"";?>/>
or / and<br />
Functional Points:
<input type="text" name="reusedFP" id="reusedFP" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[32]."\"";?>/>
of
<select name="reused_avg_complexityFP" id="reused_avg_complexityFP">
  <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[33]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
  <option value="3-Low">Low</option>
  <option value="4-Average" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Average</option>
  <option value="6-High">High</option>
</select>
Complexity of Main Language:
<label for="reused_code_FP_language"></label>
<select name="reused_code_FP_language" id="reused_code_FP_language">
  <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[34]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
<option value="80-PHP">PHP</option>
<option value="60-.NET">.NET</option>
<option value="59-C#">C#</option>
<option value="53-Java">Java</option>
<option value="28-VB.Net">VB.Net</option>
<option value="50-ASP">ASP</option>
<option value="107-C">C</option>
<option value="53-C++">C++</option>
<option value="42-HTML">HTML</option>
<option value="52-Visual Basic">Visual Basic</option>
<option value="57-Perl">Perl</option>
<option value="46-Excel">Excel</option>
<option value="38-Access">Access</option>
<option value="29-Oracle">Oracle</option>
<option value="30-SQL">SQL</option>
<option value="11-SQL Forms">SQL Forms</option>
<option value="203-Assembler">Assembler</option>
</select></td>
            </tr>
          <tr>
            <td>Assessment and Assimilation Effort Scale:</td>
            <td><select name="reused_AA" id="reused_AA">
              <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[35]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
              <option value="0-None">None</option>
              <option value="2-Basic module search and documentation">Basic module search and documentation</option>
              <option value="4-Some module Test and Evaluation (TandE), documentation" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Some module Test and Evaluation (TandE), documentation </option>
              <option value="6-Considerable module TandE, documentation">Considerable module TandE, documentation</option>
              <option value="8-Extensive module TandE, documentation">Extensive module TandE, documentation</option>
            </select></td>
          </tr>
          <tr>
            <td>Percent of Integration Required for Reused Software:</td>
            <td><input name="reused_IM" type="text" id="reused_IM" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[36]."\""; else echo "value=\"30\"";?>  />
%</td>
          </tr>
      </table></td>
        </tr>
      <tr>
        <td bgcolor="#CCCCCC" class="verdana">Automatic Translated Code as percentage of total code  Adapted+Reused (AT)</td>
        <td bgcolor="#CCCCCC" class="verdana"><label for="automated_translation"></label>
          <input name="automated_translation" type="text" id="automated_translation" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[37]."\""; else echo "value=\"0\"";?>  size="3" maxlength="3" />
          % <span class="explanationsign"><a href="javascript:toggle(7);" id="displayText7">?</a></span>
          <div class="verdanasm" id="toggleText7" style="display: none;"><?php echo explain_msg('7'); ?></div></td>
        </tr>
      <tr>
        <td valign="top" bgcolor="#CCCCCC" class="verdana">Automatic Translation Productivity (ATPROD)</td>
        <td valign="top" bgcolor="#CCCCCC" class="verdana"><p>
          <label for="adaptation"></label>
          Thousands lines of code per man month<br />
          <input type="text" name="ATPRODSLCOC" id="ATPRODSLCOC" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[38]."\"";?> />
          </p>
          <p>OR / AND</p>
          <p>Functional points of average complexity per man month<br />
            <input type="text" name="ATPRODFP" id="ATPRODFP" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[39]."\"";?> />
          </p></td>
        </tr>
      <tr class="verdana">
        <td colspan="2" bgcolor="#FFCC66"><b>Project Requirements Evolution and Volatility (REVL):</b> 
          <label for="REVL"></label>
          <input name="REVL" type="text" id="REVL" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[40]."\""; else echo "value=\"10\"";?>/>
          % <span class="explanationsign"><a href="javascript:toggle('REVL');" id="displayTextREVL">?</a></span>
          <div class="verdanasm" id="toggleTextREVL" style="display: none;"><?php echo explain_msg('REVL'); ?></div></td>
      </tr>
      <tr class="verdana">
        <td colspan="2" bgcolor="#CCCCCC" class="bold">Project Scale Factors</td>
        </tr>
      <tr>
        <td bgcolor="#CCCCCC" class="verdana">Precedentedness</td>
        <td bgcolor="#CCCCCC" class="verdana">
          <label for="Precedentedness"></label>
          <select name="Precedentedness" id="Precedentedness">
              <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[41]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="4.05-Very Low">Very Low</option>
            <option value="3.24-Low">Low</option>
            <option value="2.43-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="1.62-High">High</option>
            <option value="0.81-Very High">Very High</option>
            <option value="0-Extra High">Extra High</option>
          </select> <span class="explanationsign"><a href="javascript:toggle('Precedentedness');" id="displayTextPrecedentedness">?</a></span>
          <div class="verdanasm" id="toggleTextPrecedentedness" style="display: none;"><?php echo explain_msg('Precedentedness'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#CCCCCC" class="verdana">Development Flexibility</td>
        <td bgcolor="#CCCCCC" class="verdana"><label for="adaptation"></label>
          <label for="development_flexibility"></label>
          <select name="development_flexibility" id="development_flexibility">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[42]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="6.07-Very Low">Very Low</option>
            <option value="4.86-Low">Low</option>
            <option value="3.64-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="2.43-High">High</option>
            <option value="1.21-Very High">Very High</option>
            <option value="0-Extra High">Extra High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('development_flexibility');" id="displayTextdevelopment_flexibility">?</a></span>
          <div class="verdanasm" id="toggleTextdevelopment_flexibility" style="display: none;"><?php echo explain_msg('development_flexibility'); ?></div></td>
        </tr>
      <tr>
        <td nowrap="nowrap" bgcolor="#CCCCCC" class="verdana">Architecture / Risk 
          Resolution</td>
        <td bgcolor="#CCCCCC" class="verdana">
          <label for="architecture_risk"></label>
          <select name="architecture_risk" id="architecture_risk">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[43]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="4.22-Very Low">Very Low</option>
            <option value="3.38-Low">Low</option>
            <option value="2.53-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="1.69-High">High</option>
            <option value="0.84-Very High">Very High</option>
            <option value="0-Extra High">Extra High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('architecture_risk');" id="displayTextarchitecture_risk">?</a></span>
          <div class="verdanasm" id="toggleTextarchitecture_risk" style="display: none;"><?php echo explain_msg('architecture_risk'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#CCCCCC" class="verdana">Team Cohesion</td>
        <td bgcolor="#CCCCCC" class="verdana">
          <label for="team_cohesion"></label>
          <select name="team_cohesion" id="team_cohesion">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[44]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="4.94-Very Low">Very Low</option>
            <option value="3.95-Low">Low</option>
            <option value="2.97-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="1.98-High">High</option>
            <option value="0.99-Very High">Very High</option>
            <option value="0-Extra High">Extra High</option>
          </select> <span class="explanationsign"><a href="javascript:toggle('team_cohesion');" id="displayTextteam_cohesion">?</a></span>
          <div class="verdanasm" id="toggleTextteam_cohesion" style="display: none;"><?php echo explain_msg('team_cohesion'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#CCCCCC" class="verdana">Process Maturity</td>
        <td bgcolor="#CCCCCC" class="verdana">
          <label for="process_maturity"></label>
          <select name="process_maturity" id="process_maturity">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[45]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="4.54-Very Low">Very Low</option>
            <option value="3.64-Low">Low</option>
            <option value="2.73-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="1.82-High">High</option>
            <option value="0.91-Very High">Very High</option>
            <option value="0-Extra High">Extra High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('process_maturity');" id="displayTextprocess_maturity">?</a></span>
          <div class="verdanasm" id="toggleTextprocess_maturity" style="display: none;"><?php echo explain_msg('process_maturity'); ?></div></td>
        </tr>
      <tr class="verdana">
        <td colspan="2" bgcolor="#FFCC66" class="bold">Project Cost Factors</td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Required Software Reliability (RELY)</td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="rely"></label>
          <select name="rely" id="rely">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[46]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="0.75-Very Low">Very Low</option>
            <option value="0.88-Low">Low</option>
            <option value="1.00-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="1.15-High">High</option>
            <option value="1.39-Very High">Very High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('rely');" id="displayTextrely">?</a></span>
          <div class="verdanasm" id="toggleTextrely" style="display: none;"><?php echo explain_msg('rely'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Testing Data Base Size (DATA)</td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="data"></label>
          <select name="data" id="data">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[47]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="0.93-Low">Low</option>
            <option value="1-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="1.09-High">High</option>
            <option value="1.19-Very High">Very High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('data');" id="displayTextdata">?</a></span>
          <div class="verdanasm" id="toggleTextdata" style="display: none;"><?php echo explain_msg('data'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Product Complexity (CPLX)</td>
        <td bgcolor="#FFCC66" class="verdana"><label for="adaptation"></label>
          <label for="cplx"></label>
          <select name="cplx" id="cplx">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[48]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="0.75-Very Low">Very Low</option>
            <option value="0.88-Low">Low</option>
            <option value="1.00-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="1.15-High">High</option>
            <option value="1.30-Very High">Very High</option>
            <option value="1.66-Extra High">Extra High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('cplx');" id="displayTextcplx">?</a></span>
          <div class="verdanasm" id="toggleTextcplx" style="display: none;"><?php echo explain_msg('cplx'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Developed for Reusability (RUSE) </td>
        <td bgcolor="#FFCC66" class="verdana"><label for="adaptation"></label>
          <label for="ruse"></label>
          <select name="ruse" id="ruse">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[49]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="0.95-None">None</option>
            <option value="1-Across project" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Across project</option>
            <option value="1.07-Across Program">Across Program</option>
            <option value="1.15-Across Product Line">Across Product Line</option>
            <option value="1.24-Across Multiple Product Lines">Across Multiple Product Lines</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('ruse');" id="displayTextruse">?</a></span>
          <div class="verdanasm" id="toggleTextruse" style="display: none;"><?php echo explain_msg('ruse'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Documentation Match to Life-Cycle Needs (DOCU) </td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="docu"></label>
          <select name="docu" id="docu">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[50]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="0.81-Many lifecycle needs uncovered">Many life-cycle needs uncovered</option>
            <option value="0.91-Some lifecycle needs uncovered">Some life-cycle needs uncovered</option>
            <option value="1-Rightsized to lifecycle needs" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Right-sized to life-cycle needs</option>
            <option value="1.11-Excessive for lifecycle needs">Excessive for life-cycle needs</option>
            <option value="1.23-Very excessive for lifecycle needs">Very excessive for life-cycle needs</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('docu');" id="displayTextdocu">?</a></span>
          <div class="verdanasm" id="toggleTextdocu" style="display: none;"><?php echo explain_msg('docu'); ?></div></td>
      </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Execution Time Constraint (TIME)</td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="time"></label>
          <select name="time" id="time">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[51]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="1.00-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="1.11-High">High</option>
            <option value="1.31-Very High">Very High</option>
            <option value="1.67-Extra High">Extra High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('time');" id="displayTexttime">?</a></span>
          <div class="verdanasm" id="toggleTexttime" style="display: none;"><?php echo explain_msg('time'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Main Storage Constraint (STOR) </td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="stor"></label>
          <select name="stor" id="stor">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[52]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="1.00-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="1.06-High">High</option>
            <option value="1.21-Very High">Very High</option>
            <option value="1.57-Extra High">Extra High</option>
          </select> <span class="explanationsign"><a href="javascript:toggle('stor');" id="displayTextstor">?</a></span>
            <div class="verdanasm" id="toggleTextstor" style="display: none;"><?php echo explain_msg('stor'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Platform Volatility (PVOL)</td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="pvol"></label>
          <select name="pvol" id="pvol">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[53]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="0.87-Major change every 12 months">Major change every 12 months</option>
            <option value="1.00-Major change every 6 months" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Major change every 6 months</option>
            <option value="1.15-Major change every 2 months">Major change every 2 months</option>
            <option value="1.30-Major chaqnge every 2 weeks">Major chaqnge every 2 weeks</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('pvol');" id="displayTextpvol">?</a></span>
          <div class="verdanasm" id="toggleTextpvol" style="display: none;"><?php echo explain_msg('pvol'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Analyst Capability (ACAP)</td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="acap"></label>
          <select name="acap" id="acap">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[54]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="1.50-Very Low">Very Low</option>
            <option value="1.22-Low">Low</option>
            <option value="1.00-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="0.83-High">High</option>
            <option value="0.67-Very High">Very High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('acap');" id="displayTextacap">?</a></span>
          <div class="verdanasm" id="toggleTextacap" style="display: none;"><?php echo explain_msg('acap'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Programmer Capability (PCAP) </td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="pcap"></label>
          <select name="pcap" id="pcap">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[55]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="1.37-Very Low">Very Low</option>
            <option value="1.16-Low">Low</option>
            <option value="1.00-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="0.87-High">High</option>
            <option value="0.74-Very High">Very High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('pcap');" id="displayTextpcap">?</a></span>
          <div class="verdanasm" id="toggleTextpcap" style="display: none;"><?php echo explain_msg('pcap'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Personnel Continuity (PCON)</td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="pcon"></label>
          <select name="pcon" id="pcon">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[56]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="1.24-Very Low">Very Low</option>
            <option value="1.10-Low">Low</option>
            <option value="1.00-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="0.92-High">High</option>
            <option value="0.84-Very High">Very High</option>
          </select>
             <span class="explanationsign"><a href="javascript:toggle('pcon');" id="displayTextpcon">?</a></span>
          <div class="verdanasm" id="toggleTextpcon" style="display: none;"><?php echo explain_msg('pcon'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Applications Experience (APEX)</td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="apex"></label>
          <select name="apex" id="apex">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[57]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="1.22-Less than 2 months">Less than 2 months</option>
            <option value="1.10-6 months">6 months</option>
            <option value="1.00-1 year" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>1 year</option>
            <option value="0.89-3 years">3 years</option>
            <option value="0.81-6 or more years">6 or more years</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('apex');" id="displayTextapex">?</a></span>
          <div class="verdanasm" id="toggleTextapex" style="display: none;"><?php echo explain_msg('apex'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Platform Experience (PLEX)</td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="plex"></label>
          <span class="explanationsign">
<select name="plex" id="plex">
<?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[58]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
  <option value="1.19-Less than 2 months">Less than 2 months</option>
  <option value="1.09-6 months">6 months</option>
  <option value="1.00-1 year" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>1 year</option>
  <option value="0.91-3 years">3 years</option>
  <option value="0.85-6 or more years">6 or more years</option>
</select>
<a href="javascript:toggle('plex');" id="displayTextplex">?</a></span>
          <div class="verdanasm" id="toggleTextplex" style="display: none;"><?php echo explain_msg('plex'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Language and Tool Experience (LTEX)</td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="ltex"></label>
          <span class="explanationsign">
          <select name="ltex" id="ltex">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[59]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="1.19-Less than 2 months">Less than 2 months</option>
            <option value="1.09-6 months">6 months</option>
            <option value="1.00-1 year" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>1 year</option>
            <option value="0.91-3 years">3 years</option>
            <option value="0.85-6 or more years">6 or more years</option>
          </select>
          <a href="javascript:toggle('ltex');" id="displayTextltex">?</a> </span>
          <div class="verdanasm" id="toggleTextltex" style="display: none;"><?php echo explain_msg('ltex'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Use of Software Tools (TOOL)</td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="tool"></label>
          <select name="tool" id="tool">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[60]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="1.17-Very Low">Very Low</option>
            <option value="1.09-Low">Low</option>
            <option value="1.00-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="0.90-High">High</option>
            <option value="0.78-Very High">Very High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('tool');" id="displayTexttool">?</a></span>
          <div class="verdanasm" id="toggleTexttool" style="display: none;"><?php echo explain_msg('tool'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Singlesite Development (SITE) </td>
        <td bgcolor="#FFCC66" class="verdana">
          <label for="site"></label>
          <select name="site" id="site">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[61]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
            <option value="1.22-Very Low">Very Low</option>
            <option value="1.09-Low">Low</option>
            <option value="1.00-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
            <option value="0.93-High">High</option>
            <option value="0.86-Very High">Very High</option>
            <option value="0.80-Extra High">Extra High</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('site');" id="displayTextsite">?</a></span>
          <div class="verdanasm" id="toggleTextsite" style="display: none;"><?php echo explain_msg('site'); ?></div></td>
        </tr>
      <tr>
        <td bgcolor="#FFCC66" class="verdana">Required Development Schedule (SCED)</td>
        <td bgcolor="#FFCC66" class="verdana"><select name="sced" id="sced">
        <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[62]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
          <option value="1.43-Very Low">Very Low</option>
          <option value="1.14-Low">Low</option>
          <option value="1.00-Nominal" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Nominal</option>
          <option value="1.00-High">High</option>
          <option value="1.00-Very High">Very High</option>
        </select>
          <span class="explanationsign"><a href="javascript:toggle('sced');" id="displayTextsced">?</a></span>
          <div class="verdanasm" id="toggleTextsced" style="display: none;"><?php echo explain_msg('sced'); ?></div></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCCC" class="bold">Calibration Factor (A)</td>
        <td bgcolor="#CCCCCC" class="verdana">
          <label for="calibration_factor_A"></label>
          <input name="calibration_factor_A" type="text" id="calibration_factor_A" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[63]."\""; else echo "value=\"2.94\"";?> />
<span class="explanationsign"><a href="javascript:toggle('calibration_factor_A');" id="displayTextcalibration_factor_A">?</a></span> 
          <div class="verdanasm" id="toggleTextcalibration_factor_A" style="display: none;"><?php echo explain_msg('calibration_factor_A'); ?></div></td>
        </tr>
  </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td colspan="8" bgcolor="#666666">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="8" bgcolor="#666666" class="verdana_white">Work Breakdown Structure Estimation</td>
        </tr>
        <tr>
          <td colspan="8" bgcolor="#666666">&nbsp;</td>
        </tr>
        <tr>
          <td width="30%" bgcolor="#FFCC66" class="verdana"><span class="bold">How you are going to record task effort?</span><span class="explanationsign"><a href="javascript:toggle('wbs_add_task');" id="displayTextwbs_add_task"> ?</a></span> 
            <div class="verdanasm" id="toggleTextwbs_add_task" style="display: none;"><?php echo explain_msg('wbs_add_task'); ?></div></span></td>
          <td width="70%" colspan="7" bgcolor="#FFCC66"><select name="wbs_effort_record_method" id="wbs_effort_record_method">
            <?php if($ve_sw=='1') { 
			if ($estimation_details[66]=='1') echo "<option value=\"1\" selected=\"selected\">Three Point (Best Case (effort1)- Most Propable (effort2)- Worst Case (effort3))</option>";
			if ($estimation_details[66]=='2') echo "<option value=\"2\" selected=\"selected\">Delphic Oracle (Three Different Individual Experts (effort1, effort2, effort3)</option>";
			} ?>
            <option value="1" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Three Point (Best Case (effort1)- Most Propable (effort2)- Worst Case (effort3))</option>
            <option value="2">Delphic Oracle (Three Different Individual Experts (effort1, effort2, effort3)</option>
          </select>
          <span class="explanationsign"><a href="javascript:toggle('wbs_how_to_record_effort');" id="displayTextwbs_how_to_record_effort">?</a></span> <div class="verdanasm" id="toggleTextwbs_how_to_record_effort" style="display: none;"><?php echo explain_msg('wbs_how_to_record_effort'); ?></div></td>
        </tr>
        <tr>
          <td valign="top" bgcolor="#FFCC66" class="verdana">
          </td>
          <td colspan="7" bgcolor="#FFCC66">
          <p>
            <INPUT type="button" value="Add Row" onclick="addRow('wbs_taskTable')" />
            
            <INPUT type="button" value="Delete Row" onclick="deleteRow('wbs_taskTable')" />
          </p>
          <p><span class="verdana">Add your Tasks and Effort in Person Days (Every Person Day has 8 Person Hours. You can add decimals upt o one decimal point e.g. 0.1 is a 50 minutes effort). If you do not add a Task This Method Will not Be Used in Effort Estimation</span>.</p>
          <TABLE id="wbs_taskTable" width="0%" border="0">
            <TR>
            <TD class="verdana">Del </TD>
            <TD>  <span class="verdana">Name</span></TD>
 <TD class="verdana">Effort 1<br />
 </TD>
 <TD nowrap="nowrap" class="verdana">Effort 2</TD>
 <TD nowrap="nowrap" class="verdana">Effort 3</TD>
        </TR>
        
        <?php if($ve_sw=='1' AND count(explode("#",$estimation_details[68]))>0) {
	
	$svalue=explode("#",$estimation_details[68]);
	 for ($i=0; $i<count($svalue); $i++)
					{
	           $svalue2=explode("-",$svalue[$i]);
			   echo "<tr>
                <td><input type=\"checkbox\" name=\"chk\"/></td>
                <td >
<input type=\"text\" name=\"wbs_task".($i+1)."_name\" id=\"wbs_task".($i+1)."_name\"  value=\"".$svalue2['0']."\"/>
<TD><input name=\"wbs_task".($i+1)."_effort1\" type=\"text\" id=\"wbs_task".($i+1)."_effort1\" size=\"5\" value=\"".$svalue2['1']."\" /></TD>
 <TD><input name=\"wbs_task".($i+1)."_effort2\" type=\"text\" id=\"wbs_task".($i+1)."_effort1\" size=\"5\" value=\"".$svalue2['2']."\"/></TD>
 <TD><input name=\"wbs_task".($i+1)."_effort3\" type=\"text\" id=\"wbs_task".($i+1)."_effort1\" size=\"5\" value=\"".$svalue2['3']."\"/></TD>
	 </tr>";
					} 
					
}else { echo "<TR>
            <TD><INPUT type=\"checkbox\" name=\"chk\"/></TD>
            <TD><input type=\"text\" name=\"wbs_task1_name\" id=\"wbs_task1_name\" /></TD>
 <TD><input name=\"wbs_task1_effort1\" type=\"text\" id=\"wbs_task1_effort1\" size=\"5\" /></TD>
 <TD><input name=\"wbs_task1_effort2\" type=\"text\" id=\"wbs_task1_effort1\" size=\"5\" /></TD>
 <TD><input name=\"wbs_task1_effort3\" type=\"text\" id=\"wbs_task1_effort1\" size=\"5\" /></TD>
        </TR>";
				 
}
                ?>
            </table>
    <input type="hidden" name="wbs_tasks_count" id="wbs_tasks_count"  value="<?php if($ve_sw=='1' AND count($svalue)>0) echo count($svalue); else echo "1"; ?>"/>
               
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
        <td colspan="8" bgcolor="#666666">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="8" bgcolor="#666666" class="verdana_white">Analogy and/or Comparison Estimation Settings</td>
      </tr>
      <tr>
        <td colspan="8" bgcolor="#666666">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFCC66" class="bold">Select Methods</td>
        <td colspan="7" bgcolor="#FFCC66"><p><span class="error_msg">Do not change this value if you do not want to use Comparison or Analogy. If you dont change this setting all values below will be ignored.</span><br />
<select name="analogy_comparison_selector" id="analogy_comparison_selector">
 <?php if($ve_sw=='1') { 
			if ($estimation_details[69]=='1') echo "<option value=\"1\" selected=\"selected\">Use Analogy and Comparison</option>";
			if ($estimation_details[69]=='2') echo "<option value=\"2\" selected=\"selected\">Use Analogy</option>";
			if ($estimation_details[69]=='3') echo "<option value=\"3\" selected=\"selected\">Use Comparison</option>";
			if ($estimation_details[69]=='10') echo "<option value=\"10\" selected=\"selected\">Do Not Use Comparison or Analogy</option>";
			} ?>

  <option value="1">Use Analogy and Comparison</option>
              <option value="2">Use Analogy</option>
              <option value="3">Use Comparison</option>
              <option value="10" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Do Not Use Comparison or Analogy</option>
          </select>
            <span class="explanationsign"><a href="javascript:toggle('analogy_comparison_selector');" id="displayTextanalogy_comparison_selector">?</a></span> </p>          <div class="verdanasm" id="toggleTextanalogy_comparison_selector" style="display: none;"><?php echo explain_msg('analogy_comparison_selector'); ?></div>
         </td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">&nbsp;</td>
        <td colspan="7" bgcolor="#FFCC66">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="bold">Project Size Group1</td>
        <td colspan="7" bgcolor="#FFCC66" class="error_msg">If you use this group for project sizing, do not complete anything at Group2 </td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Number of Data Files / Database Tables Accessed</td>
        <td colspan="7" bgcolor="#FFCC66"><label for="ac_datafiles"></label>
          <input name="ac_datafiles" type="text" id="ac_datafiles" size="3" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[71]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Number of Data Entry Items</td>
        <td colspan="7" bgcolor="#FFCC66"><input name="ac_data_entry_items" type="text" id="ac_data_entry_items" size="3" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[72]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Number of Data Output Items</td>
        <td colspan="7" bgcolor="#FFCC66"><input name="ac_data_output_items" type="text" id="ac_data_output_items" size="3" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[73]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Number of Unajusted Functional Point Items</td>
        <td colspan="7" bgcolor="#FFCC66"><input name="ac_UFP" type="text" id="ac_UFP" size="3" <?php if($ve_sw=='1') echo "value=\"".$estimation_details[74]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Internal Calculations Complexity</td>
        <td colspan="7" bgcolor="#FFCC66"><label for="ac_internal_complexity"></label>
          <select name="ac_internal_complexity" id="ac_internal_complexity">
           <?php if($ve_sw=='1') { 
			if ($estimation_details[70]=='1') echo "<option value=\"1\" selected=\"selected\">Very Low</option>";
			if ($estimation_details[70]=='2') echo "<option value=\"2\" selected=\"selected\">Low</option>";
			if ($estimation_details[70]=='3') echo "<option value=\"3\" selected=\"selected\">Medium</option>";
			if ($estimation_details[70]=='4') echo "<option value=\"4\" selected=\"selected\">High</option>";
			if ($estimation_details[70]=='5') echo "<option value=\"5\" selected=\"selected\">Very High</option>";
			} ?>
            <option value="1">Very Low</option>
            <option value="2">Low</option>
            <option value="3" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Medium</option>
            <option value="4">High</option>
            <option value="5">Very High</option>
          </select></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">&nbsp;</td>
        <td colspan="7" bgcolor="#FFCC66">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="bold">Project Size Group2</td>
        <td colspan="7" bgcolor="#FFCC66" class="error_msg">If you use this group for project sizing, do not complete anything at Group1 </td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Number of Templates / Screens</td>
        <td colspan="7" bgcolor="#FFCC66"><label for="ac_no_of_templates_screens"></label>
          <input name="ac_no_of_templates_screens" type="text" id="ac_no_of_templates_screens" size="3"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[96]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Average Templates / Screens Complexity</td>
        <td colspan="7" bgcolor="#FFCC66" class="verdana">
          <select name="ac_avg_screens_templates_complexity" id="ac_avg_screens_templates_complexity">
           <?php if($ve_sw=='1') { 
			if ($estimation_details[97]=='1') echo "<option value=\"1\" selected=\"selected\">Very Low</option>";
			if ($estimation_details[97]=='2') echo "<option value=\"2\" selected=\"selected\">Low</option>";
			if ($estimation_details[97]=='3') echo "<option value=\"3\" selected=\"selected\">Medium</option>";
			if ($estimation_details[97]=='4') echo "<option value=\"4\" selected=\"selected\">High</option>";
			if ($estimation_details[97]=='5') echo "<option value=\"5\" selected=\"selected\">Very High</option>";
			} ?>
            <option value="1">Very Low</option>
            <option value="2">Low</option>
            <option value="3" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Medium</option>
            <option value="4">High</option>
            <option value="5">Very High</option>
          </select>
        </td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Number of Content Objects</td>
        <td colspan="7" bgcolor="#FFCC66"><input name="ac_no_of_content_objects" type="text" id="ac_no_of_content_objects" size="3"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[98]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Number of Widgets</td>
        <td colspan="7" bgcolor="#FFCC66"><input name="ac_no_of_widgets" type="text" id="ac_no_of_widgets" size="3"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[99]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Average Widgets Complexity</td>
        <td colspan="7" bgcolor="#FFCC66" class="verdana">
          <select name="ac_avg_widgets_complexity" id="ac_avg_widgets_complexity">
           <?php if($ve_sw=='1') { 
			if ($estimation_details[100]=='1') echo "<option value=\"1\" selected=\"selected\">Very Low</option>";
			if ($estimation_details[100]=='2') echo "<option value=\"2\" selected=\"selected\">Low</option>";
			if ($estimation_details[100]=='3') echo "<option value=\"3\" selected=\"selected\">Medium</option>";
			if ($estimation_details[100]=='4') echo "<option value=\"4\" selected=\"selected\">High</option>";
			if ($estimation_details[100]=='5') echo "<option value=\"5\" selected=\"selected\">Very High</option>";
			} ?>
            <option value="1">Very Low</option>
            <option value="2">Low</option>
            <option value="3" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Medium</option>
            <option value="4">High</option>
            <option value="5">Very High</option>
          </select>
        </td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Number of API Calls</td>
        <td colspan="7" bgcolor="#FFCC66"><input name="ac_of_api_calls" type="text" id="ac_of_api_calls" size="3"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[104]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Number of External Interfaces</td>
        <td colspan="7" bgcolor="#FFCC66"><input name="ac_of_external_interfaces" type="text" id="ac_of_external_interfaces" size="3"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[105]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">&nbsp;</td>
        <td colspan="7" bgcolor="#FFCC66">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="bold">Other Charecteristics</td>
        <td colspan="7" bgcolor="#FFCC66" class="error_msg">Complete any of the details below that are known to you</td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Percentage of Functionality of features or requirements</td>
        <td colspan="7" bgcolor="#FFCC66">
          <label for="ac_internal_process_per_cent"></label>
          <pre class="verdana">Internal process:<input name="ac_internal_process_per_cent" type="text" id="ac_internal_process_per_cent" size="3" maxlength="2"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[75]."\"";?>/>% 
Data entry/ Modification/ Deletion:<input name="ac_data_entry_per_cent" type="text" id="ac_data_entry_per_cent" size="3" maxlength="2"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[76]."\"";?>/>% 
Output form(screen):<input name="ac_output_form_per_cent" type="text" id="ac_output_form_per_cent" size="3" maxlength="2"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[77]."\"";?>/>%
Data query from database/ file:<input name="ac_data_query_per_cent" type="text" id="ac_data_query_per_cent" size="3" maxlength="2"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[78]."\"";?>/>% 
Printing:<input name="ac_printing_per_cent" type="text" id="ac_printing_per_cent" size="3" maxlength="2"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[79]."\"";?>/>%
</pre></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Programming Language </td>
        <td colspan="7" bgcolor="#FFCC66"><select name="ac_programming_language" id="ac_programming_language">
          <?php if($ve_sw=='1') {$svalue=explode("-",$estimation_details[80]); echo "<option value=\"".$svalue['0']."-".$svalue['1']."\" selected=\"selected\">".$svalue['1']."</option>";} ?> 
          <option value="80-PHP">PHP</option>
          <option value="60-.NET">.NET</option>
          <option value="59-C#">C#</option>
          <option value="53-Java">Java</option>
          <option value="28-VB.Net">VB.Net</option>
          <option value="50-ASP">ASP</option>
          <option value="107-C">C</option>
          <option value="53-C++">C++</option>
          <option value="42-HTML">HTML</option>
          <option value="52-Visual Basic">Visual Basic</option>
          <option value="57-Perl">Perl</option>
          <option value="46-Excel">Excel</option>
          <option value="38-Access">Access</option>
          <option value="29-Oracle">Oracle</option>
          <option value="30-SQL">SQL</option>
          <option value="11-SQL Forms">SQL Forms</option>
          <option value="203-Assembler">Assembler</option>
          </select></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Development Tools Used (Add up to five tools you will use)</td>
        <td colspan="7" bgcolor="#FFCC66" class="verdana">1.
          <label for="ac_tools_used1"></label>
          <input name="ac_tools_used1" type="text" id="ac_tools_used1" size="10"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[81]."\"";?>/> 
          2.
          <input name="ac_tools_used2" type="text" id="ac_tools_used2" size="10"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[82]."\"";?>/> 
          3. 
          <input name="ac_tools_used3" type="text" id="ac_tools_used3" size="10"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[83]."\"";?>/> 
          4. 
          <input name="ac_tools_used4" type="text" id="ac_tools_used4" size="10"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[84]."\"";?>/> 
          5.
          <input name="ac_tools_used5" type="text" id="ac_tools_used5" size="10"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[85]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Average Language and Tool Experience</td>
        <td colspan="7" bgcolor="#FFCC66" class="verdana"><select name="ac_experience_in_tool_language" id="ac_experience_in_tool_language">
         <?php if($ve_sw=='1') { 
			if ($estimation_details[86]=='1') echo "<option value=\"1\" selected=\"selected\">Very Low</option>";
			if ($estimation_details[86]=='2') echo "<option value=\"2\" selected=\"selected\">Low</option>";
			if ($estimation_details[86]=='3') echo "<option value=\"3\" selected=\"selected\">Medium</option>";
			if ($estimation_details[86]=='4') echo "<option value=\"4\" selected=\"selected\">High</option>";
			if ($estimation_details[86]=='5') echo "<option value=\"5\" selected=\"selected\">Very High</option>";
			} ?>
          <option value="1">Very Low</option>
          <option value="2">Low</option>
          <option value="3" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Medium</option>
          <option value="4">High</option>
          <option value="5">Very High</option>
        </select></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Experience on this type of Applications</td>
        <td colspan="7" bgcolor="#FFCC66"><select name="ac_experience_in_appl_type" id="ac_experience_in_appl_type">
         <?php if($ve_sw=='1') { 
			if ($estimation_details[87]=='1') echo "<option value=\"1\" selected=\"selected\">Very Low</option>";
			if ($estimation_details[87]=='2') echo "<option value=\"2\" selected=\"selected\">Low</option>";
			if ($estimation_details[87]=='3') echo "<option value=\"3\" selected=\"selected\">Medium</option>";
			if ($estimation_details[87]=='4') echo "<option value=\"4\" selected=\"selected\">High</option>";
			if ($estimation_details[87]=='5') echo "<option value=\"5\" selected=\"selected\">Very High</option>";
			} ?>
          <option value="1">Very Low</option>
          <option value="2">Low</option>
          <option value="3" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Medium</option>
          <option value="4">High</option>
          <option value="5">Very High</option>
        </select></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Average Team Size</td>
        <td colspan="7" bgcolor="#FFCC66" class="verdana">Persons:
<input name="ac_avg_team_size" type="text" id="ac_avg_team_size" size="10"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[88]."\"";?>/></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Database Systems Used</td>
        <td colspan="7" bgcolor="#FFCC66" class="verdana">1.
             <label for="ac_dbms1"></label>
            <select name="ac_dbms1" id="ac_dbms1">
              <?php if($ve_sw=='1' AND $estimation_details[89]!='0') {echo "<option value=\"".$estimation_details[89]."\" selected=\"selected\">".$estimation_details[89]."</option>";} ?> 
             <?php if($ve_sw=='1' AND $estimation_details[89]=='0') {echo "<option value=\"0\" selected=\"selected\">NO DBMS</option>";} ?> 
              <option value="Oracle">Oracle</option>
              <option value="MSSQL">MSSQL</option>
              <option value="MYSQL">MYSQL</option>
              <option value="MSACCESS">MSACCESS</option>
              <option value="XML">XML</option>
              <option value="OtherDBMS">OtherDBMS</option>
              <option value="0" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>NO DBMS</option>
            </select>
2.
<select name="ac_dbms2" id="ac_dbms2">
              <?php if($ve_sw=='1' AND $estimation_details[90]!='0') {echo "<option value=\"".$estimation_details[90]."\" selected=\"selected\">".$estimation_details[90]."</option>";} ?> 
             <?php if($ve_sw=='1' AND $estimation_details[90]=='0') {echo "<option value=\"0\" selected=\"selected\">NO DBMS</option>";} ?> 
  <option value="Oracle">Oracle</option>
  <option value="MSSQL">MSSQL</option>
  <option value="MYSQL">MYSQL</option>
  <option value="MSACCESS">MSACCESS</option>
  <option value="XML">XML</option>
  <option value="OtherDBMS">OtherDBMS</option>
  <option value="0" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>NO DBMS</option>
</select>
3.
<select name="ac_dbms3" id="ac_dbms3">
              <?php if($ve_sw=='1' AND $estimation_details[91]!='0') {echo "<option value=\"".$estimation_details[91]."\" selected=\"selected\">".$estimation_details[91]."</option>";} ?> 
             <?php if($ve_sw=='1' AND $estimation_details[91]=='0') {echo "<option value=\"0\" selected=\"selected\">NO DBMS</option>";} ?> 
  <option value="Oracle">Oracle</option>
  <option value="MSSQL">MSSQL</option>
  <option value="MYSQL">MYSQL</option>
  <option value="MSACCESS">MSACCESS</option>
  <option value="XML">XML</option>
  <option value="OtherDBMS">OtherDBMS</option>
  <option value="0" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>NO DBMS</option>
</select>
4.
<select name="ac_dbms4" id="ac_dbms4">
              <?php if($ve_sw=='1' AND $estimation_details[92]!='0') {echo "<option value=\"".$estimation_details[92]."\" selected=\"selected\">".$estimation_details[92]."</option>";} ?> 
             <?php if($ve_sw=='1' AND $estimation_details[92]=='0') {echo "<option value=\"0\" selected=\"selected\">NO DBMS</option>";} ?> 
  <option value="Oracle">Oracle</option>
  <option value="MSSQL">MSSQL</option>
  <option value="MYSQL">MYSQL</option>
  <option value="MSACCESS">MSACCESS</option>
  <option value="XML">XML</option>
  <option value="OtherDBMS">OtherDBMS</option>
  <option value="0" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>NO DBMS</option>
</select>
5.
<select name="ac_dbms5" id="ac_dbms5">
              <?php if($ve_sw=='1' AND $estimation_details[93]!='0') {echo "<option value=\"".$estimation_details[93]."\" selected=\"selected\">".$estimation_details[93]."</option>";} ?> 
             <?php if($ve_sw=='1' AND $estimation_details[93]=='0') {echo "<option value=\"0\" selected=\"selected\">NO DBMS</option>";} ?> 
  <option value="Oracle">Oracle</option>
  <option value="MSSQL">MSSQL</option>
  <option value="MYSQL">MYSQL</option>
  <option value="MSACCESS">MSACCESS</option>
  <option value="XML">XML</option>
  <option value="OtherDBMS">OtherDBMS</option>
  <option value="0" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>NO DBMS</option>
</select>
        </td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Development Methodology</td>
        <td colspan="7" bgcolor="#FFCC66"><label for="ac_development_methodology"></label>
          <select name="ac_development_methodology" id="ac_development_methodology">
            <?php if($ve_sw=='1' AND $estimation_details[94]!='0') {echo "<option value=\"".$estimation_details[94]."\" selected=\"selected\">".$estimation_details[94]."</option>";} ?> 
             <?php if($ve_sw=='1' AND $estimation_details[94]=='0') {echo "<option value=\"0\" selected=\"selected\">Other</option>";} ?> 
            <option value="OO">OO</option>
            <option value="RAD">RAD</option>
            <option value="SA">SA</option>
            <option value="SD">SD</option>
            <option value="JAD">JAD</option>
            <option value="MVC">MVC</option>
            <option value="AGILE">AGILE</option>
            <option value="WATERFALL">WATERFALL</option>
            <option value="0" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Other</option>
          </select></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">System / Application Architecture</td>
        <td colspan="7" bgcolor="#FFCC66"><select name="ac_architecture" id="ac_architecture">
            <?php if($ve_sw=='1' AND $estimation_details[95]!='0') {echo "<option value=\"".$estimation_details[95]."\" selected=\"selected\">".$estimation_details[95]."</option>";} ?> 
             <?php if($ve_sw=='1' AND $estimation_details[95]=='0') {echo "<option value=\"0\" selected=\"selected\">Other</option>";} ?> 
          <option value="B/S">B/S</option>
          <option value="C/S">C/S</option>
          <option value="BC/S">BC/S</option>
          <option value="Centered">Centered</option>
          <option value="0" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>Other</option>
        </select></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Use of CMS</td>
        <td colspan="7" bgcolor="#FFCC66" class="verdana">
          <select name="ac_use_of_CMS" id="ac_use_of_CMS">
              <?php if($ve_sw=='1' AND $estimation_details[101]!='0') {echo "<option value=\"".$estimation_details[101]."\" selected=\"selected\">".$estimation_details[101]."</option>";} ?> 
             <?php if($ve_sw=='1' AND $estimation_details[101]=='0') {echo "<option value=\"0\" selected=\"selected\">None</option>";} ?> 
            <option value="0" <?php if($ve_sw!='1') echo "selected=\"selected\""; ?>>None</option>
            <option value="Joomla">Joomla</option>
            <option value="Drupal">Drupal</option>
            <option value="DNN">DNN</option>
            <option value="SiteCore">SiteCore</option>
            <option value="WordPress">WordPress</option>
            <option value="ModX">ModX</option>
            <option value="Umbraco">Umbraco</option>
            <option value="TimyCMS">TinyCMS</option>
            <option value="Other">Other</option>
            </select>
          </td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Extentend of Code That should be build in order to be reused in other projects</td>
        <td colspan="7" bgcolor="#FFCC66"><input name="ac_extentend_of_code_reuse_to_other_projects" type="text" id="ac_extentend_of_code_reuse_to_other_projects" size="3"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[102]."\"";?>/>
%</td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFCC66" class="verdana">Extentend of Code Reused From other Projects</td>
        <td colspan="7" bgcolor="#FFCC66"><input name="ac_extentend_of_code_reuse" type="text" id="ac_extentend_of_code_reuse" size="3"  <?php if($ve_sw=='1') echo "value=\"".$estimation_details[103]."\"";?>/>
          %</td>
      </tr>
      <tr>
        <td bgcolor="#006699"></td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#006699" class="verdana_white">Post-Project Details</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#006699"></td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
        <td bgcolor="#006699">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="8" bgcolor="#00FFCC" class="verdana">In this section add information usually known at the end of the project. Add this information for statistical reasons, for your records and in order to get some advice from the tool comparing your actual results with your estimation.</td>
        </tr>
      <tr>
        <td bgcolor="#00FFCC" class="verdana">Actual Project Effort in Person Days</td>
        <td colspan="7" bgcolor="#00FFCC"><input type="text" name="actual_effort_in_pdays" id="actual_effort_in_pdays" /></td>
        </tr>
      <tr>
        <td bgcolor="#00FFCC"></td>
        <td bgcolor="#00FFCC">&nbsp;</td>
        <td bgcolor="#00FFCC">&nbsp;</td>
        <td bgcolor="#00FFCC">&nbsp;</td>
        <td bgcolor="#00FFCC">&nbsp;</td>
        <td bgcolor="#00FFCC">&nbsp;</td>
        <td bgcolor="#00FFCC">&nbsp;</td>
        <td bgcolor="#00FFCC">&nbsp;</td>
      </tr>
  </table>
  
      <p>
      <?php if($ve_sw=='1') echo "<input type=\"submit\" name=\"update\" id=\"update\" value=\"Update Effort\" onclick='this.form.action=\"?sw=calc&sw2=update\";'/> <input type=\"submit\" name=\"save_as_new\" id=\"save_as_new\" value=\"Estimate as New Effort\" />"; else echo "<input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Estimate Effort\" />";
	  
?>

      </p>
</form>

<?php } ?>


<br /><br />
<hr />
<span class="vrdana_sm_grey"><center>This tool is provided “as is” without warranty of any kind, either express or implied, including, but not limited to 
  the implied warranties of merchantability and fitness for a particular purpose. Moreover, we reserve the right to 
revise /modify this tool and to make changes periodically without obligation to notify any person or organization of such revision or changes.</center><br /><center><a href="?sw=about">About Effort Estimation Tool - Literature</a> | <a href="http://tecorange.com">TECOrange</a></center></span>
</div>
</body>
</html>