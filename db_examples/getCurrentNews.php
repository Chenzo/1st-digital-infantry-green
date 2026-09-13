<?
include("security.php");



$News_Data = urldecode ("newsItem1=");

//$News_Data = urldecode ("newsItem1=<font face='smallFont' size='8' color='#CCCCCC'>");


echo $News_Data;


$result = mysql_query ("SELECT * FROM `News` ORDER by News_Date DESC");


if ($row = mysql_fetch_array($result)) {
do {

$News_Data = urldecode ($row["News_Data"]);
$News_Data = str_replace("\\", "", $News_Data);


echo $News_Data . " ";
//echo urldecode ("<p><br><br><img src='images/line.jpg' width='250' height='1' align='center'><br></p>");

//echo "<p><br><br><img src='images/line.jpg' width='250' height='1' align='center'><br></p>";
//echo "<p><a href=\"editOneNewsItem.php?News_ID=" . $row["News_ID"] . "\">" . $row["News_ID"] . " (" .  $row["News_Date"] . ")</a><br>";
//echo "<textarea name=\"textarea\" cols=\"100\" rows=\"15\">" . $News_Data . "</textarea></p>";
	


} while($row = mysql_fetch_array($result));




} else {print "Sorry, no records were found!" ;}



echo urldecode ("</font>");


?>