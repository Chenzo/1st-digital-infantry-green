<? 

$startimg = 'sigbg.png'; // Our starting image
//$source = 'dynamicsig2.php?accountName=<1>Chenzo'; // The site to get the total score from. 

$source = 'http://www.1stdigitalinfantry.com/dynamicsig/dynamicsig2.php?accountName=<1>Chenzo'; // The site to get the total score from. 



$ranks = array("Private","Private First Class","Lance Corporal","Corporal","Sergeant","Staff Sergeant","Master Sergeant","First Sergeant","Master Gunnery Sergeant","Sergeant Major","Sergeant Major of the Corps");
$kits = array("Anti-Tank","Assault","Engineer","Medic","Spec Ops","Support","Sniper");
$weps = array("Assault Rifle","Grenade Launcher","Carbine","Light Machine Gun","Sniper Rifle","Pistol","Anti-Tank","Sub Machine Gun","Shotgun","Knife","Defribrillator","Explosives","Hand Grenade"); 


 $lines = implode("",file($source)); 

function getRank($rankName, $lines) {
    $val = substr(substr(substr($lines,strpos($lines,"<".$rankName)),strpos(substr($lines,strpos($lines,"<".$rankName)),">") + 1),0,strpos(substr(substr($lines,strpos($lines,"<".$rankName)),strpos(substr($lines,strpos($lines,"<".$rankName)),">") + 1), "<"));
    return($val);
} 



$title = $ranks[getRank("playerrank",$lines)]." ".getRank("nick",$lines);
$time_played =  getRank("time",$lines);
$score_cmb = getRank("cmsc",$lines);
$score_tmwk = getRank("twsc",$lines);
$score_glbl = getRank("scor",$lines);
$score_cmnd = getRank("cdsc",$lines);
$score_heals = getRank("heal",$lines);
$score_revives = getRank("rviv",$lines);
$score_resupplies = getRank("rsup",$lines);
$score_repairs = getRank("rpar",$lines);
$score_flags = getRank("cpcp",$lines);
$score_assists = getrank("cacp",$lines); 

$kit_fav = getRank("fkit",$lines);
$kit_time = getRank("ktm-".$kit_fav,$lines);
$kit_kills = getRank("kkl-".$kit_fav,$lines);
$kit_deaths = getRank("kdt-".$kit_fav,$lines);
$kit_ratio = getRank("kkd-".$kit_fav,$lines);
$wep_fav = getRank("fwea",$lines); 



echo "Global Score: ";
echo $score_glbl;
echo "br";

echo "Rank: ";
$title;

echo "Time Played: ";
$time_played;

echo "Combat Score: ";
$score_cmb;

echo "TeamWork Score: ";
$score_tmwk;

echo "Comand Score: ";
$score_cmnd;

echo "Heals Score: ";
$score_heals;

echo "Revives Score: ";
$score_revives;

echo "Resupplies Score: ";
$score_resupplies;

echo "Repairs Score: ";
$score_repairs;

echo "Flags Score: ";
$score_flags;

echo "Kill Assists Score: ";
$score_assists; 

$kit_fav = getRank("fkit",$lines);
$kit_time = getRank("ktm-".$kit_fav,$lines);
$kit_kills = getRank("kkl-".$kit_fav,$lines);
$kit_deaths = getRank("kdt-".$kit_fav,$lines);
$kit_ratio = getRank("kkd-".$kit_fav,$lines);
$wep_fav = getRank("fwea",$lines); 



 $hourmod = 0;
if (date("H") != 23) { $hourmod = 1; }
$expire[] = date("D, d M Y");
$expire[] = date("H") + $hourmod . date(":i:s T");
Header("Expires: $expire[0] $expire[1]"); 


?>

