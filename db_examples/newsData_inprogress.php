<? 

echo "newsItem1=";

mysql_connect('localhost', 'REDACTED', 'REDACTED');
mysql_select_db ('diadmin_ClanBase');


$result = mysql_query ('SELECT * FROM News ORDER BY News_Date DESC');

if ($row = @mysql_fetch_array($result)) {
do {
//Set Vars
$News_ID =  $row["News_ID"];
$News_Data = $row["News_Data"];
$News_Date = $row["News_Date"];

echo $News_Data;
echo "<p align='center'><br><br><img src='images/line.jpg' width='250' height='1' align='center'><br></p>";

} while($row = mysql_fetch_array($result));
} else {
$Clan_ID =  "No Match Found";
}





?>




