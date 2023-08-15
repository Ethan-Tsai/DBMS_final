<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("output.xml");

$x=$xmlDoc->getElementsByTagName('item');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('course_name');
    // $z=$x->item($i)->getElementsByTagName('course_name');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        // if ($hint=="") {
        //   $hint="<a href='" .
        //   $z->item(0)->childNodes->item(0)->nodeValue .
        //   "' target='_blank'>" .
        //   $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        // } else {
        //   $hint=$hint . "<br /><a href='" .
        //   $z->item(0)->childNodes->item(0)->nodeValue .
        //   "' target='_blank'>" .
        //   $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        // }
        // <button onclick="rela_cou('a')">新增</button>
        if ($hint=="") {
          $b=$y->item(0)->childNodes->item(0)->nodeValue;
          $b="'$b'";
          $hint="<a onclick=\"rela_cou(".
          $b .
          ")\">" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a><hr>";
    
        } else {
          $c=$y->item(0)->childNodes->item(0)->nodeValue;
          $c="'$c'";
          $hint=$hint . "<a onclick=\"rela_cou(" .
          $c .
          ")\">" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a><hr>";
        }

      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>
