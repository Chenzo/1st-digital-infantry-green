<?php

//header('Content-type: text/html');

include 'db.php';
print "DataStart=go";




$result = mysql_query ('SELECT * FROM News ORDER BY News_Date DESC');
if ($row = mysql_fetch_array($result)) {
	do {
	print '&newsItem1=This is a test';
		//print "&newsItem1=" . $row["News_Data"] . "<p align='center'><br><br><img src='images/line.jpg' width='250' height='1' align='center'><br></p>";
	} while($row = mysql_fetch_array($result));
} else {
	print "Sorry, no records were found!" ;
}

?>
  