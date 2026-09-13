<?php

//header('Content-type: text/html');

include 'db.php';
print "DataStart=go";
$dehCount = 1;


$result = mysql_query ('SELECT * FROM Members LEFT JOIN Ranks ON Members.rank_id=Ranks.rank_id where Members.Active_Status_ID = 1 ORDER BY Members.Rank_ID DESC');

//$result = mysql_query ('SELECT * FROM Members where Active_Status_ID = 1 ORDER BY Rank_ID DESC');
if ($row = mysql_fetch_array($result)) {
	do {
	print "&memberName" . $dehCount . "=" . $row["Name"];
	print "&memberTitle" . $dehCount . "=" . $row["Rank_Name"];
	$dehCount++;
	} while($row = mysql_fetch_array($result));
} else {
	print "Sorry, no records were found!" ;
}
$dehCount--;
print "&totalNumberOfMembers=" . $dehCount;
print "&junkData=something";
?>
  