<? 
$theplayername = $_GET['playerName'];

$startimg = 'sigbg.png'; // Our starting image
$source = 'http://www.1stdigitalinfantry.com/dynamicsig/dynamicsig4.php?accountName='.$theplayername; // The site to get the total score from. 

//Define the Ribbons
$ribbonname[3190105] = "Aerial Service";
$ribbonname[3040109] = "Air Defense";
$ribbonname[3240102] = "Airborne";
$ribbonname[3190118] = "Armored Service";
$ribbonname[3240301] = "Combat Action Ribbon";
$ribbonname[3190318] = "Crew Service Ribbon";
$ribbonname[3190409] = "Distinguished Service Ribbon";
$ribbonname[3190605] = "Far East Service Ribbon";
$ribbonname[3240703] = "Good Conduct Ribbon";
$ribbonname[3040718] = "Ground Defense Ribbon";
$ribbonname[3190803] = "Helicopter Service Ribbon";
$ribbonname[3150914] = "Infantry Officer Ribbon";
$ribbonname[3241213] = "Legion of Merit Ribbon";
$ribbonname[3211305] = "Meritorious Unit Ribbon";
$ribbonname[3191305] = "Middle East Service Ribbon";
$ribbonname[3151920] = "Staff Officer Ribbon";
$ribbonname[3212201] = "Valorous Merit Ribbon";
$ribbonname[3242303] = "War College Ribbon";
//Define The Medals
$medalname[2190309] = "Air Combat";     
$medalname[2051902] = "Bronze Star "; 
$medalname[2190303] = "Combat Action Medal";
$medalname[2190318] = "Armor Combat"; 
$medalname[2020903] = "Combat Infantry Medal"; 
$medalname[2020419] = "Distinguished Service Medal"; 
$medalname[2051907] = "Gold Star"; 
$medalname[2020719] = "Golden Scimitar"; 
$medalname[2190308] = "Helicopter Medal"; 
$medalname[2190703] = "Good Conduct Medal"; 
$medalname[2020913] = "Marksman Infantry Medal"; 
$medalname[2021322] = "Medal of Valor"; 
$medalname[2191319] = "Meritorious Service Medal"; 
$medalname[2021403] = "Navy Cross"; 
$medalname[2021613] = "People's Medallion"; 
$medalname[2191608] = "Purple Heart"; 
$medalname[2020919] = "Sharpshooter Infantry Medal"; 
$medalname[2051919] = "Silver Star"; 
//Define the Badges
$badgename[1220104] = "Air Defense";   
$badgename[1031120] = "Anti-tank Combat";   
$badgename[1220118] = "Armor";   
$badgename[1031119] = "Assault Combat";   
$badgename[1220122] = "Aviator";   
$badgename[1190304] = "Command";   
$badgename[1031105] = "Engineer Combat";   
$badgename[1190507] = "Engineer";   
$badgename[1032415] = "Explosive Ordinance";   
$badgename[1190601] = "First Aid";   
$badgename[1031923] = "Ground Defense";   
$badgename[1220803] = "Helicopter";   
$badgename[1031406] = "Knife Combat";   
$badgename[1031113] = "Medic Combat";   
$badgename[1031619] = "Pistol Combat";   
$badgename[1191819] = "Resupply";   
$badgename[1031109] = "Sniper Combat";   
$badgename[1031115] = "Spec-Ops Combat";   
$badgename[1031121] = "Support Combat";   
$badgename[1222016] = "Transport";   
//Define the maps
$mapname[0]="Kubra Dam"; 
$mapname[1]="Mashtuur City"; 
$mapname[2]="Operation Clean Sweep"; 
$mapname[3]="Zatar Wetlands";  
$mapname[4]="Strike at Karkand"; 
$mapname[5]="Sharqi Peninsula"; 
$mapname[6]="Gulf Of Oman"; 
$mapname[100]="Daqing Oilfields"; 
$mapname[101]="Dalian Plant"; 
$mapname[102]="Dragon Valley";   
$mapname[103]="FuShe Pass";   
$mapname[104]="Hingan Hills";  
$mapname[105]="Songhua Stalemate"; 
//Define the vechiles
$vehicleName[0] = "Armor"; 
$vehicleName[1] = "Aviator"; 
$vehicleName[2] = "Air Defense"; 
$vehicleName[3] = "Helicopter"; 
$vehicleName[4] = "Transport"; 
$vehicleName[5] = "Artillery"; 
$vehicleName[6] = "Ground-defense"; 



$ranks = array("Private","Private First Class","Lance Corporal","Corporal","Sergeant","Staff Sergeant","Master Sergeant","First Sergeant","Master Gunnery Sergeant","Sergeant Major","Sergeant Major of the Corps");
$kits = array("Anti-Tank","Assault","Engineer","Medic","Spec Ops","Support","Sniper");
$weps = array("Assault Rifle","Grenade Launcher","Carbine","Light Machine Gun","Sniper Rifle","Pistol","Anti-Tank","Sub Machine Gun","Shotgun","Knife","Defribrillator","Explosives","Hand Grenade"); 


 $lines = implode("",file($source)); 

function getRank($rankName, $lines) {
    $val = substr(substr(substr($lines,strpos($lines,"<".$rankName)),strpos(substr($lines,strpos($lines,"<".$rankName)),">") + 1),0,strpos(substr(substr($lines,strpos($lines,"<".$rankName)),strpos(substr($lines,strpos($lines,"<".$rankName)),">") + 1), "<"));
    return($val);
} 



$title = $ranks[getRank("playerrank",$lines)];
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



$TotalTimes = explode(":", $time_played);
//ArmyTimes
$TotalUSATimes = explode(":", getRank("atm-0",$lines));
$TotalMECTimes = explode(":", getRank("atm-1",$lines));
$TotalCHINATimes = explode(":", getRank("atm-2",$lines));
//KitTimes
$AntiTankTimes = explode(":", getRank("ktm-0",$lines));
$AssaultTimes = explode(":", getRank("ktm-1",$lines));
$EngineerTimes = explode(":", getRank("ktm-2",$lines));
$MedicTimes = explode(":", getRank("ktm-3",$lines));
$SpecOpsTimes = explode(":", getRank("ktm-4",$lines));
$SupportTimes = explode(":", getRank("ktm-5",$lines));
$SniperTimes = explode(":", getRank("ktm-6",$lines));
//Vehicle Times
$ArmorTimes = explode(":", getRank("vtm-0",$lines));
$AviatorTimes = explode(":", getRank("vtm-1",$lines));
$AirDefenceTimes = explode(":", getRank("vtm-2",$lines));
$HelicopterTimes = explode(":", getRank("vtm-3",$lines));
$TransportTimes = explode(":", getRank("vtm-4",$lines));
$ArtilleryTimes = explode(":", getRank("vtm-5",$lines));
$GroundDefTimes = explode(":", getRank("vtm-6",$lines));
//Weapon Times
$RifleTimes = explode(":", getRank("wtm-0",$lines));
$NadeLauncherTimes = explode(":", getRank("wtm-1",$lines));
$CarbineTimes = explode(":", getRank("wtm-2",$lines));
$LMGTimes = explode(":", getRank("wtm-3",$lines));
$SniperRifleTimes = explode(":", getRank("wtm-4",$lines));
$PistolsTimes = explode(":", getRank("wtm-5",$lines));
$ATAATimes = explode(":", getRank("wtm-6",$lines));
$SubMGTimes = explode(":", getRank("wtm-7",$lines));
$ShotgunTimes = explode(":", getRank("wtm-8",$lines));
$KnifeTimes = explode(":", getRank("wtm-9",$lines));
$DefibrillatorTimes = explode(":", getRank("wtm-10",$lines));
$ExplosivesTimes = explode(":", getRank("wtm-11",$lines));
$NadesTimes = explode(":", getRank("wtm-12",$lines));
//Mode Times
$CommanderTimes = explode(":", getRank("tcdr",$lines));
$SquadLeaderTimes = explode(":", getRank("tsql",$lines));
$SquadMemberTimes = explode(":", getRank("tsqm",$lines));
$LoneWolfTimes = explode(":", getRank("tlwf",$lines));

//Map Times
$KubraTimes = explode(":", getRank("mtm-0",$lines));
$MashtuurTimes = explode(":", getRank("mtm-1",$lines));
$CleanSweepTimes = explode(":", getRank("mtm-2",$lines));
$ZatarTimes = explode(":", getRank("mtm-3",$lines));
$KarkandTimes = explode(":", getRank("mtm-4",$lines));
$SharqiTimes = explode(":", getRank("mtm-5",$lines));
$OmanTimes = explode(":", getRank("mtm-6",$lines));
$DaqingTimes = explode(":", getRank("mtm-100",$lines));
$DalianTimes = explode(":", getRank("mtm-101",$lines));
$DragonTimes = explode(":", getRank("mtm-102",$lines));
$FueSheTimes = explode(":", getRank("mtm-103",$lines));
$HinganTimes = explode(":", getRank("mtm-104",$lines));
$SonghuaTimes = explode(":", getRank("mtm-105",$lines));

//Dates
$DateJoined = explode("-", getRank("jond",$lines));
$LastPlayed = explode("-", getRank("asof",$lines));

//Medal Display Function
function MedalHTML($equas, $medalNumber, $medalName, $medalDesc) { 
			if (trim($equas) <> "") {
				$awardaction = explode("-",$equas);
				echo "<img src=\"awards/medals/".$medalNumber."_0.gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>" . $medalName . "</strong><br>".date("m.d.y - g:i a", $awardaction[2])."</center>')\" onmouseout=\"hideTip()\">";
			} else {
				echo "<img src=\"awards/medals/gray_".$medalNumber."_0.gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>" . $medalName . "</strong><br>" . $medalDesc . "</center>')\" onmouseout=\"hideTip()\">";
			}
			
}

//Badge Display Function
function BadgeHTML($Show, $Display, $when, $badgeName, $badgeDesc){
	if ($Show <> 0) {
		echo "<img src=\"awards/badges/". $Display .".gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>" . $badgeName . "</strong><br>".date("m.d.y - g:i a", $when)."<br>" . $badgeDesc . "</center>')\" onmouseout=\"hideTip()\">";
	} else {
		echo "<img src=\"awards/badges/gray_" . $Display . ".gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>" . $badgeName . "</strong><br>" . $badgeDesc . "</center>')\" onmouseout=\"hideTip()\">";
	}
}


//Ribbon Display Function
function RibbonHTML($Show, $Display, $when, $ribbonName, $ribbomDesc) {
	if ($Show <> 0) {
		echo "<img src=\"awards/ribbons/" . $Display . ".gif\" width=\"128\" height=\"59\" onmouseover=\"doTooltip(event, '<strong><center>" . $ribbonName . "</strong><br>".date("m.d.y - g:i a", $when)."<br>" . $ribbomDesc . "</center>')\" onmouseout=\"hideTip()\">";
	} else {
		echo "<img src=\"awards/ribbons/gray_" . $Display . ".gif\" width=\"128\" height=\"59\" onmouseover=\"doTooltip(event, '<strong><center>" . $ribbonName . "</strong><br>" . $ribbomDesc . "</center>')\" onmouseout=\"hideTip()\">";
	}
}

//CheckStuff Function
function CheckStuff ($required, $current) {
	$check = $required - $current;
		if ($check <= 0) {
			$check = 0;
		} 
		return $check;
}

//Cech For Badge
function CheckBadge ($badgerNumber, $type) {
	if (trim($badgerNumber,$lines) <> "") {
		$awardaction = explode("-",$badgerNumber);
		if ($awardaction[1] >= $type) {
			$recieved = "Earned";
		} else {
			$recieved = "Required";
		}	
	} else {
		$recieved = "Required";
	}	
	return $recieved;
}



//GetNextRank
if ($score_glbl < 500) {
	$nextRank = "Private First Class (PFC)";
	$rankDistance = floor((($score_glbl - 0)/(500 - 0))*100);
	$rankPercent = $rankDistance . "%";
	$nextRankNumber = 500;
	$nextRankImageNumber = 1;
} elseif ($score_glbl > 500 & $score_glbl < 1000) {
	$nextRank = "Lance Corporal (LCpl)";
	$rankDistance = floor((($score_glbl - 500)/(1000 - 500))*100);
	$rankPercent = $rankDistance . "%";
	$nextRankNumber = 1000;
	$nextRankImageNumber = 2;
} elseif ($score_glbl > 1000 & $score_glbl < 10500) {
	$nextRank = "Corporal (Cpl)";
	$rankDistance = floor((($score_glbl - 1000)/(10500 - 1000))*100);
	$rankPercent = $rankDistance . "%";
	$nextRankNumber = 10500;
	$nextRankImageNumber = 3;
} elseif ($score_glbl > 10500 & $score_glbl < 25000) {
	$nextRank = "Sergeant (Sgt)";
	$rankDistance = floor((($score_glbl - 10500)/(25000 - 10500))*100);
	$rankPercent = $rankDistance . "%";
	$nextRankNumber = 25000;
	$nextRankImageNumber = 4;
} elseif ($score_glbl > 25000 & $score_glbl < 50000) {
	$nextRank = "Staff Sergeant (SSgt)";
	$rankDistance = floor((($score_glbl - 25000)/(50000 - 25000))*100);
	$rankPercent = $rankDistance . "%";
	$nextRankNumber = 50000;
	$nextRankImageNumber = 5;
} elseif ($score_glbl > 50000 & $score_glbl < 75000) {
	$nextRank = "Gunnery Sergeant (GySgt)";
	$rankDistance = floor((($score_glbl - 50000)/(75000 - 50000))*100);
	$rankPercent = $rankDistance . "%";
	$nextRankNumber = 75000;
	$nextRankImageNumber = 6;
} elseif ($score_glbl > 75000 & $score_glbl < 150000) {
	$nextRank = "Master Sergeant (MSgt)";
	$rankDistance = floor((($score_glbl - 75000)/(150000 - 75000))*100);
	$rankPercent = $rankDistance . "%";
	$nextRankNumber = 150000;
	$nextRankImageNumber = 8;
} elseif ($score_glbl > 150000 & $score_glbl < 250000) {
	$nextRank = "Master Gunnery Sergeant (MgySgt)";
	$rankDistance = floor((($score_glbl - 150000)/(250000 - 150000))*100);
	$rankPercent = $rankDistance . "%";
	$nextRankNumber = 250000;
	$nextRankImageNumber = 10;
} elseif ($score_glbl > 250000 & $score_glbl < 2500000) {
	$nextRank = "Sergeant Major of the Corps (SgtMajC)";
	$rankDistance = floor((($score_glbl - 250000)/(2500000 - 250000))*100);
	$rankPercent = $rankDistance . "%";
	$nextRankNumber = 2500000;
	$nextRankImageNumber = 11;
}

?>

<html><head><title><? echo $theplayername; ?>'s Stats Provided By 1st Digital Infantry</title>

<style type="text/css">

.padding {
padding: 0px 7px;
}


body {
	background-color: #023702;
	background-image:  url(background.gif);
}
</style>
<style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9pt;
}
.style6 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
	font-size: 12pt;
}
.style13 {
	font-size: 10pt;
	font-weight: bold;
	color: #000000;
}
.style14 {font-size: 10pt; color: #000000; }
.style15 {font-size: 12pt}
.style17 {font-size: 10pt; color: #000000; font-style: italic; }
.style18 {font-size: 7pt}

/* This is where you can customize the appearance of the tooltip */
div#tipDiv {
  position:absolute; visibility:hidden; left:0; top:0; z-index:10000;
  background-color:#000000; border:1px solid #009900; 
  width:250px; padding:4px;
  color:#000; font-size:11px; line-height:1.2;
}
/* These are optional. They demonstrate how you can individually format tooltip content  */
div.tp1 { font-size:12px; color:#FFFFFF; font-style:normal }
div.tp2 { font-weight:bolder; color:#009900; padding-top:4px }
a:link {
	color: #FFCC00;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFCC00;
}
a:hover {
	text-decoration: underline;
	color: #FFCC00;
}
a:active {
	text-decoration: none;
	color: #FFCC00;
}

-->
</style>

<script src="js/dw_event.js" type="text/javascript"></script>
<script src="js/dw_viewport.js" type="text/javascript"></script>
<script src="js/dw_tooltip2.js" type="text/javascript"></script>
<script type="text/javascript">
function doTooltip(e, stuff) {

	msg = '<div class="tp1">' + stuff + '</div>';
  if ( typeof Tooltip == "undefined" || !Tooltip.ready ) return;
  Tooltip.show(e, msg);
}

function hideTip() {
  if ( typeof Tooltip == "undefined" || !Tooltip.ready ) return;
  Tooltip.hide();
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body onload="Tooltip.init()">
<div align="center">
  <table width="900" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="190" valign="top"><table width="100%" height="3800"  border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
        <tr>
          <td valign="top" bgcolor="#000000"><p>&nbsp;</p>
            <p align="center">BF2 Stats Provided By:<br>
              1st Digital Infantry
</p>
            <form action="http://www.1stdigitalinfantry.com/dynamicsig/DisplayBF2Stats.php" method="get"><table width="95%"  border="0" align="center" cellpadding="0" cellspacing="2">
              <tr>
                <td><div align="center">Player Name:</div></td>
              </tr>
              <tr>
                <td><div align="center">
                  <input name="playerName" type="text" id="playerName">
                </div></td>
              </tr>
              <tr>
                <td><div align="center">
                  <input type="submit" name="Submit" value="Get BF2 Stats">
                </div></td>
              </tr>
            </table>
			</form>
			            <p align="center">&nbsp;            </p></td>
        </tr>
      </table></td>
      <td width="710" valign="top">
        <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
          <tr>
            <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
                <tr bgcolor="#000000">
                  <td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="55%"><? echo "<img src=\"ranks/".getRank("playerrank",$lines).".gif\" width=\"83\" height=\"83\" align=\"absmiddle\">"; ?><span class="style6"><? echo $theplayername; ?>, <? echo $title; ?></span> </td>
                        <td width="45%"><table  border="0" align="center" cellpadding="0" cellspacing="10">
                            <tr>
                              <td><img src="kits/kit_<? echo $kit_fav ?>.jpg" width="64" height="64" onmouseover="doTooltip(event, '<center>Most Played Kit: <b><? echo $kits[$kit_fav]; ?></b></center>')" onmouseout="hideTip()"></td>
                              <td><img src="maps/map_<? echo getRank("fmap",$lines); ?>.jpg" width="64" height="64" onmouseover="doTooltip(event, '<center>Most Played Map: <b><? echo $mapname[getRank("fmap",$lines)]; ?></b></center>')" onmouseout="hideTip()"></td>
                              <td><img src="vehicles/vehicles_<? echo getRank("fveh",$lines); ?>.jpg" width="64" height="64" onmouseover="doTooltip(event, '<center>Most Used Vehicle: <b><? echo $vehicleName[getRank("fveh",$lines)]; ?></b></center>')" onmouseout="hideTip()"></td>
                              <td><img src="weapons/weapon_<? echo $wep_fav ?>.jpg" width="64" height="64" onmouseover="doTooltip(event, '<center>Most Used Weapon: <b><? echo $weps[$wep_fav]; ?></b></center>')" onmouseout="hideTip()"></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td width="334" bgcolor="#000000" class="style15"><strong>Global Score: </strong><? echo $score_glbl; ?> </td>
                  <td width="350" bgcolor="#000000" class="style15"><strong>Global Rank: </strong><? echo getRank("globalrank",$lines); ?> <span class="style18">out of <? echo getRank("totalplayers",$lines); ?></span></td>
                </tr>
                <tr bgcolor="#222222">
                  <td bgcolor="#222222" class="style15">Account ID: <? echo getRank("pid",$lines); ?> </td>
                  <td class="style15">Date Joined: <? echo $DateJoined[1].".".$DateJoined[2].".".$DateJoined[0]; ?></td>
                </tr>
                <tr>
                  <td bgcolor="#000000" class="style15">Wins: <? echo getRank("wins",$lines); ?></td>
                  <td bgcolor="#000000" class="style15">Losses: <? echo getRank("loss",$lines); ?> </td>
                </tr>
                <tr bgcolor="#222222">
                  <td class="style15">Score per Minute: <? echo getRank("ospm",$lines); ?></td>
                  <td class="style15">Last Played: <? echo $LastPlayed[1].".".$LastPlayed[2].".".$LastPlayed[0]; ?></td>
                </tr>
                <tr bgcolor="#000000">
                  <td class="style15">Total Rounds Played: <? echo getRank("mode0",$lines); ?></td>
                  <td class="style15">Overall Small-Arms Accuracy: <? echo getRank("osaa",$lines); ?></td>
                </tr>
                <tr bgcolor="#222222">
                  <td colspan="2" class="style15"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="46%" class="style15"><div align="left">Next Rank: <? echo $nextRank ?></div></td>
                        <td width="30%" valign="middle"><div align="center">
                            <table width="206" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="3"><img src="ranks/rankprogressends.gif" width="3" height="14"></td>
                                <td width="200" align="left" bgcolor="#021D00"><div align="left"><img src="ranks/rankprogress.gif" width="<? $rankDistance = $rankDistance * 2; echo $rankDistance; ?>" height="14"></div></td>
                                <td width="3"><img src="ranks/rankprogressends.gif" width="3" height="14"></td>
                              </tr>
                            </table>
                        </div></td>
                        <td width="4%"><div align="center"><img src="ranks/rank_small_<? echo $nextRankImageNumber; ?>.gif" width="16" height="16"></div></td>
                        <td width="20%" class="style15"><? echo $rankPercent ?> (<? echo $nextRankNumber ?>) </td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
        </table>
        <br />
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
        <tr>
          <td width="350" colspan="4" background="headinggradient.gif" bgcolor="#009900"><span class="style13">TIME: </span><span class="style14"><? echo $TotalTimes[0]; ?>h <? echo $TotalTimes[1]; ?>m <? echo $TotalTimes[2]; ?>s </span></td>
        </tr>
        <tr>
          <td width="350" bgcolor="#000000"><div align="right"><strong>Commander:</strong></div></td>
          <td width="350" bgcolor="#000000"><? echo $CommanderTimes[0]; ?>h <? echo $CommanderTimes[1]; ?>m <? echo $CommanderTimes[2]; ?>s</td>
          <td width="350" bgcolor="#000000"><div align="right"><strong>Squad Leader: </strong></div></td>
          <td width="350" bgcolor="#000000"><? echo $SquadLeaderTimes[0]; ?>h <? echo $SquadLeaderTimes[1]; ?>m <? echo $SquadLeaderTimes[2]; ?>s</td>
        </tr>
        <tr bgcolor="#222222">
          <td><div align="right"><strong>Squad Member: </strong></div></td>
          <td><? echo $SquadMemberTimes[0]; ?>h <? echo $SquadMemberTimes[1]; ?>m <? echo $SquadMemberTimes[2]; ?>s</td>
          <td><div align="right"><strong>Lone Wolf: </strong></div></td>
          <td><? echo $LoneWolfTimes[0]; ?>h <? echo $LoneWolfTimes[1]; ?>m <? echo $LoneWolfTimes[2]; ?>s</td>
        </tr>
      </table></td>
    </tr>
  </table>
  <br />
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
        <tr>
          <td colspan="6" background="headinggradient.gif" bgcolor="#009900"><span class="style14"><strong>COMBAT SCORE:</strong> <? echo $score_cmb; ?> <em>(K:D - ?:?) </em></span></td>
        </tr>
        <tr>
          <td colspan="6" background="headinggradient2.gif" bgcolor="#000000"><strong>Kills:</strong> <? echo getRank("kill",$lines); ?></td>
        </tr>
        <tr>
          <td width="149" bgcolor="#000000"><div align="right"><strong>Kills per Minute:</strong></div></td>
          <td width="71" bgcolor="#000000"><? echo getRank("klpm",$lines); ?></td>
          <td width="126" bgcolor="#000000"><div align="right"><strong>Kills Per Round:</strong></div></td>
          <td width="79" bgcolor="#000000"><? echo getRank("klpr",$lines); ?></td>
          <td width="111" bgcolor="#000000"><div align="right"><strong>Kill Streak:</strong></div></td>
          <td width="100" bgcolor="#000000"><? echo getRank("bksk",$lines); ?></td>
        </tr>
        <tr>
          <td colspan="6" background="headinggradient2.gif" bgcolor="#000000"><strong>Deaths:</strong> <? echo getRank("deth",$lines); ?></td>
        </tr>
        <tr>
          <td bgcolor="#000000"><div align="right"><strong>Deaths per Minute:</strong></div></td>
          <td bgcolor="#000000"><? echo getRank("dtpm",$lines); ?></td>
          <td bgcolor="#000000"><div align="right"><strong>Deaths Per Round:</strong></div></td>
          <td bgcolor="#000000"><? echo getRank("dtpr",$lines); ?></td>
          <td bgcolor="#000000"><div align="right"><strong>Death Streak:</strong></div></td>
          <td bgcolor="#000000"><? echo getRank("wdsk",$lines); ?></td>
        </tr>
        <tr>
          <td bgcolor="#000000"><div align="right"><strong>Suicides:</strong></div></td>
          <td bgcolor="#000000"><? echo getRank("suic",$lines); ?></td>
          <td colspan="4" bgcolor="#222222">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br />
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr>
            <td colspan="6" background="headinggradient.gif" bgcolor="#009900"><span class="style14"><strong>TEAMWORK SCORE:</strong> <? echo $score_tmwk; ?></span></td>
          </tr>
          <tr>
            <td width="130" bgcolor="#000000"><div align="right"><strong>Captured CP:</strong></div></td>
            <td width="86" bgcolor="#000000"><? echo getRank("cpcp",$lines); ?></td>
            <td width="116" bgcolor="#000000"><div align="right"><strong>Ca[ture Assist: </strong></div></td>
            <td width="67" bgcolor="#000000"><? echo getRank("cacp",$lines); ?></td>
            <td width="144" bgcolor="#000000"><div align="right"><strong>Defended CP: </strong></div></td>
            <td width="93" bgcolor="#000000"><? echo getRank("dfcp",$lines); ?></td>
          </tr>
          <tr bgcolor="#222222">
            <td colspan="6"><hr align="center" width="90%" size="1" /></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="right"><strong>Kill Assist:</strong></div></td>
            <td bgcolor="#000000"><? echo getRank("kila",$lines); ?></td>
            <td bgcolor="#000000"><div align="right"><strong>Heal:</strong></div></td>
            <td bgcolor="#000000"> <? echo $score_heals; ?></td>
            <td bgcolor="#000000"><div align="right"><strong>Revive:</strong></div></td>
            <td bgcolor="#000000"><? echo $score_revives; ?></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="right"><strong>Support (Resupply):</strong></div></td>
            <td bgcolor="#000000"><? echo $score_resupplies; ?></td>
            <td bgcolor="#000000"><div align="right"><strong>Repair:</strong></div></td>
            <td bgcolor="#000000"><? echo $score_repairs; ?></td>
            <td bgcolor="#000000"><div align="right"><strong>Driver Special Ability:</strong></div></td>
            <td bgcolor="#000000"><? echo getRank("dsab",$lines); ?></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br />
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr>
            <td width="2100" background="headinggradient.gif" bgcolor="#009900"><span class="style14"><strong>COMMANDER SCORE:</strong> <? echo $score_cmnd; ?></span></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br />
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr bgcolor="#009900">
            <td colspan="6" background="headinggradient.gif"><span class="style13">AMRY </span><span class="style17">(Most Played Army: USA) </span></td>
          </tr>
          <tr>
            <td width="170" bgcolor="#000000"><div align="left"><strong>Army</strong></div></td>
            <td width="154" bgcolor="#000000"><div align="right"><strong>Time</strong></div></td>
            <td width="68" bgcolor="#000000"><div align="right"><strong>Wins</strong></div></td>
            <td width="68" bgcolor="#000000"><div align="right"><strong>Losses</strong></div></td>
            <td width="87" bgcolor="#000000"><div align="right"><strong>Best Round </strong></div></td>
            <td width="89" bgcolor="#000000"><div align="right"><strong>Worst Round </strong></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left">USA</div></td>
            <td><div align="right"><? echo $TotalUSATimes[0]; ?>h <? echo $TotalUSATimes[1]; ?>m <? echo $TotalUSATimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("awn-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("alo-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("abr-0",$lines); ?></div></td>
            <td><div align="right">0</div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left">MEC</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $TotalMECTimes[0]; ?>h <? echo $TotalMECTimes[1]; ?>m <? echo $TotalMECTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("awn-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("alo-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("abr-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right">0</div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left">CHINA</div></td>
            <td><div align="right"><? echo $TotalCHINATimes[0]; ?>h <? echo $TotalCHINATimes[1]; ?>m <? echo $TotalCHINATimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("awn-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("alo-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("abr-2",$lines); ?></div></td>
            <td><div align="right">0</div></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br />
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr bgcolor="#009900">
            <td colspan="7" background="headinggradient.gif"><span class="style13">MAPS</span><span class="style17"> (Most Played Map: <? echo $mapname[getRank("fmap",$lines)] ?>) </span></td>
          </tr>
          <tr>
            <td width="174" bgcolor="#000000"><div align="left"><strong>Map</strong></div></td>
            <td width="107" bgcolor="#000000"><div align="right"><strong>Time</strong></div></td>
            <td width="71" bgcolor="#000000"><div align="right"><strong>Wins</strong></div></td>
            <td width="52" bgcolor="#000000"><div align="right"><strong>Losses</strong></div></td>
            <td width="82" bgcolor="#000000"><div align="right"><strong>Best Round </strong></div></td>
            <td width="68" bgcolor="#000000"><div align="right"><strong>Completed</strong></div></td>
            <td width="72" bgcolor="#000000"><div align="right"><strong>Incomplete</strong></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Kubra Dam </div></td>
            <td><div align="right"><? echo $KubraTimes[0]; ?>h <? echo $KubraTimes[1]; ?>m <? echo $KubraTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("mwn-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mls-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mbr-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mcm-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mic-0",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Mashtuur City </div></td>
            <td bgcolor="#000000"><div align="right"><? echo $MashtuurTimes[0]; ?>h <? echo $MashtuurTimes[1]; ?>m <? echo $MashtuurTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mwn-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mls-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mbr-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mcm-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mic-1",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Operation Clean Sweep </div></td>
            <td><div align="right"><? echo $CleanSweepTimes[0]; ?>h <? echo $CleanSweepTimes[1]; ?>m <? echo $CleanSweepTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("mwn-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mls-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mbr-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mcm-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mic-2",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Zatar Wetlands
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $ZatarTimes[0]; ?>h <? echo $ZatarTimes[1]; ?>m <? echo $ZatarTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mwn-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mls-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mbr-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mcm-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mic-3",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Strike at Karkand
  
</div></td>
            <td><div align="right"><? echo $KarkandTimes[0]; ?>h <? echo $KarkandTimes[1]; ?>m <? echo $KarkandTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("mwn-4",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mls-4",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mbr-4",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mcm-4",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mic-4",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Sharqi Peninsula
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $SharqiTimes[0]; ?>h <? echo $SharqiTimes[1]; ?>m <? echo $SharqiTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mwn-5",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mls-5",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mbr-5",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mcm-5",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mic-5",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Gulf of Oman
  
</div></td>
            <td><div align="right"><? echo $OmanTimes[0]; ?>h <? echo $OmanTimes[1]; ?>m <? echo $OmanTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("mwn-6",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mls-6",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mbr-6",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mcm-6",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mic-6",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Daqing Oilfields
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $DaqingTimes[0]; ?>h <? echo $DaqingTimes[1]; ?>m <? echo $DaqingTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mwn-100",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mls-100",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mbr-100",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mcm-100",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mic-100",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Dalian Plant
  
</div></td>
            <td><div align="right"><? echo $DalianTimes[0]; ?>h <? echo $DalianTimes[1]; ?>m <? echo $DalianTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("mwn-101",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mls-101",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mbr-101",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mcm-101",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mic-101",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Dragon Valley
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $DragonTimes[0]; ?>h <? echo $DragonTimes[1]; ?>m <? echo $DragonTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mwn-102",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mls-102",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mbr-102",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mcm-102",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mic-102",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> FuShe Pass
  
</div></td>
            <td><div align="right"><? echo $FueSheTimes[0]; ?>h <? echo $FueSheTimes[1]; ?>m <? echo $FueSheTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("mwn-103",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mls-103",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mbr-103",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mcm-103",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("mic-103",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Songhua Stalemate
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $SonghuaTimes[0]; ?>h <? echo $SonghuaTimes[1]; ?>m <? echo $SonghuaTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mwn-105",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mls-105",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mbr-105",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mcm-105",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("mic-105",$lines); ?></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br />
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr bgcolor="#009900">
            <td colspan="6" background="headinggradient.gif"><span class="style13">VEHICLES </span><span class="style17">(Most Used Vehicle: <? echo $vehicleName[getRank("fveh",$lines)] ?>) </span></td>
          </tr>
          <tr>
            <td width="206" bgcolor="#000000"><div align="left"><strong>Vehicle</strong></div></td>
            <td width="114" bgcolor="#000000"><div align="right"><strong>Time</strong></div></td>
            <td width="72" bgcolor="#000000"><div align="right"><strong>Kills</strong></div></td>
            <td width="77" bgcolor="#000000"><div align="right"><strong>Deaths</strong></div></td>
            <td width="81" bgcolor="#000000"><div align="right"><strong>Accuracy</strong></div></td>
            <td width="86" bgcolor="#000000"><div align="right"><strong>Road Kills</strong></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Armor
  
</div></td>
            <td><div align="right"><? echo $ArmorTimes[0]; ?>h <? echo $ArmorTimes[1]; ?>m <? echo $ArmorTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("vkl-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vdt-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vac-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vkr-0",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Aviator
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $AviatorTimes[0]; ?>h <? echo $AviatorTimes[1]; ?>m <? echo $AviatorTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vkl-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vdt-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vac-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vkr-1",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Air Defense
  
</div></td>
            <td><div align="right"><? echo $AirDefenceTimes[0]; ?>h <? echo $AirDefenceTimes[1]; ?>m <? echo $AirDefenceTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("vkl-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vdt-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vac-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vkr-2",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Helicopter
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $HelicopterTimes[0]; ?>h <? echo $HelicopterTimes[1]; ?>m <? echo $HelicopterTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vkl-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vdt-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vac-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vkr-3",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Transport
  
</div></td>
            <td><div align="right"><? echo $TransportTimes[0]; ?>h <? echo $TransportTimes[1]; ?>m <? echo $TransportTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("vkl-4",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vdt-4",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vac-4",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vkr-4",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Artillery
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $ArtilleryTimes[0]; ?>h <? echo $ArtilleryTimes[1]; ?>m <? echo $ArtilleryTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vkl-5",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vdt-5",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vac-5",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("vkr-5",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Ground Defense
  
</div></td>
            <td><div align="right"><? echo $GroundDefTimes[0]; ?>h <? echo $GroundDefTimes[1]; ?>m <? echo $GroundDefTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("vkl-6",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vdt-6",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vac-6",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("vkr-6",$lines); ?></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br />
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr bgcolor="#009900">
            <td colspan="5" background="headinggradient.gif"><span class="style13">KITS </span><span class="style17">(Most Used Kit: <? echo $kits[$kit_fav]; ?>) </span></td>
          </tr>
          <tr>
            <td width="234" bgcolor="#000000"><div align="left"><strong>Kit</strong></div></td>
            <td width="130" bgcolor="#000000"><div align="right"><strong>Time</strong></div></td>
            <td width="97" bgcolor="#000000"><div align="right"><strong>Kills</strong></div></td>
            <td width="85" bgcolor="#000000"><div align="right"><strong>Deaths</strong></div></td>
            <td width="100" bgcolor="#000000"><div align="right"><strong>Ratio</strong></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Anti-tank
  
</div></td>
            <td><div align="right"><? echo $AntiTankTimes[0]; ?>h <? echo $AntiTankTimes[1]; ?>m <? echo $AntiTankTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("kkl-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("kdt-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("kkd-0",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Assault
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $AssaultTimes[0]; ?>h <? echo $AssaultTimes[1]; ?>m <? echo $AssaultTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("kkl-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("kdt-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("kkd-1",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Engineer
  
</div></td>
            <td><div align="right"><? echo $EngineerTimes[0]; ?>h <? echo $EngineerTimes[1]; ?>m <? echo $EngineerTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("kkl-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("kdt-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("kkd-2",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Medic
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $MedicTimes[0]; ?>h <? echo $MedicTimes[1]; ?>m <? echo $MedicTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("kkl-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("kdt-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("kkd-3",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td>Special Ops </td>
            <td><div align="right"><? echo $SpecOpsTimes[0]; ?>h <? echo $SpecOpsTimes[1]; ?>m <? echo $SpecOpsTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("kkl-4",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("kdt-4",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("kkd-4",$lines); ?></td>
          </tr>
          <tr bgcolor="#000000">
            <td><div align="left"> Support
  
</div></td>
            <td><div align="right"><? echo $SupportTimes[0]; ?>h <? echo $SupportTimes[1]; ?>m <? echo $SupportTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("kkl-5",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("kdt-5",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("kkd-5",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Sniper</div></td>
            <td><div align="right"><? echo $SniperTimes[0]; ?>h <? echo $SniperTimes[1]; ?>m <? echo $SniperTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("kkl-6",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("kdt-6",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("kkd-6",$lines); ?></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br />
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr bgcolor="#009900">
            <td colspan="6" background="headinggradient.gif"><span class="style13">WEAPON </span><span class="style17">(Most Used Weapon: <? echo $weps[$wep_fav]; ?>) </span></td>
          </tr>
          <tr>
            <td width="195" bgcolor="#000000"><div align="left"><strong>Weapon</strong></div></td>
            <td width="108" bgcolor="#000000"><div align="right"><strong>Time</strong></div></td>
            <td width="92" bgcolor="#000000"><div align="right"><strong>Kills</strong></div></td>
            <td width="80" bgcolor="#000000"><div align="right"><strong>Deaths</strong></div></td>
            <td width="81" bgcolor="#000000"><div align="right"><strong>Ratio</strong></div></td>
            <td width="80" bgcolor="#000000"><div align="right"><strong>Accuracy</strong></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Assault Rifles
  
</div></td>
            <td><div align="right"><? echo $RifleTimes[0]; ?>h <? echo $RifleTimes[1]; ?>m <? echo $RifleTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("wkl-0",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("wdt-0",$lines); ?></div></td>
            <td><div align="right"> - </div></td>
            <td><div align="right"><? echo getRank("wac-0",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Grenade Launcher</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $NadeLauncherTimes[0]; ?>h <? echo $NadeLauncherTimes[1]; ?>m <? echo $NadeLauncherTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wkl-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wdt-1",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"> - </div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wac-1",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Carbines
  
</div></td>
            <td><div align="right"><? echo $CarbineTimes[0]; ?>h <? echo $CarbineTimes[1]; ?>m <? echo $CarbineTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("wkl-2",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("wdt-2",$lines); ?></div></td>
            <td><div align="right"> - </div></td>
            <td><div align="right"><? echo getRank("wac-2",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Light Machine Guns
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $LMGTimes[0]; ?>h <? echo $LMGTimes[1]; ?>m <? echo $LMGTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wkl-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wdt-3",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"> - </div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wac-3",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Sniper Rifles
  
</div></td>
            <td><div align="right"><? echo $SniperRifleTimes[0]; ?>h <? echo $SniperRifleTimes[1]; ?>m <? echo $SniperRifleTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("wkl-4",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("wdt-4",$lines); ?></div></td>
            <td><div align="right"> - </div></td>
            <td><div align="right"><? echo getRank("wac-4",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Pistols
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $PistolsTimes[0]; ?>h <? echo $PistolsTimes[1]; ?>m <? echo $PistolsTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wkl-5",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wdt-5",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"> - </div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wac-5",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> AT/AA
  
</div></td>
            <td><div align="right"><? echo $ATAATimes[0]; ?>h <? echo $ATAATimes[1]; ?>m <? echo $ATAATimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("wkl-6",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("wdt-6",$lines); ?></div></td>
            <td><div align="right"> - </div></td>
            <td><div align="right"><? echo getRank("wac-6",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Submachine Guns
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $SubMGTimes[0]; ?>h <? echo $SubMGTimes[1]; ?>m <? echo $SubMGTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wkl-7",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wdt-7",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"> - </div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wac-7",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Shotguns
  
</div></td>
            <td><div align="right"><? echo $ShotgunTimes[0]; ?>h <? echo $ShotgunTimes[1]; ?>m <? echo $ShotgunTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("wkl-8",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("wdt-8",$lines); ?></div></td>
            <td><div align="right"> - </div></td>
            <td><div align="right"><? echo getRank("wac-8",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Knife
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $KnifeTimes[0]; ?>h <? echo $KnifeTimes[1]; ?>m <? echo $KnifeTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wkl-9",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wdt-9",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"> - </div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wac-9",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Defibrillator
  
</div></td>
            <td><div align="right"><? echo $DefibrillatorTimes[0]; ?>h <? echo $DefibrillatorTimes[1]; ?>m <? echo $DefibrillatorTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("wkl-10",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("wdt-10",$lines); ?></div></td>
            <td><div align="right"> - </div></td>
            <td><div align="right"><? echo getRank("wac-10",$lines); ?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="left"> Explosives
  
</div></td>
            <td bgcolor="#000000"><div align="right"><? echo $ExplosivesTimes[0]; ?>h <? echo $ExplosivesTimes[1]; ?>m <? echo $ExplosivesTimes[2]; ?>s</div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wkl-11",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wdt-11",$lines); ?></div></td>
            <td bgcolor="#000000"><div align="right"> - </div></td>
            <td bgcolor="#000000"><div align="right"><? echo getRank("wac-11",$lines); ?></div></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="left"> Hand Grenade
  
</div></td>
            <td><div align="right"><? echo $NadesTimes[0]; ?>h <? echo $NadesTimes[1]; ?>m <? echo $NadesTimes[2]; ?>s</div></td>
            <td><div align="right"><? echo getRank("wkl-12",$lines); ?></div></td>
            <td><div align="right"><? echo getRank("wdt-12",$lines); ?></div></td>
            <td><div align="right"> - </div></td>
            <td><div align="right"><? echo getRank("wac-12",$lines); ?></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br>
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr>
            <td width="350" colspan="4" background="headinggradient.gif" bgcolor="#009900"><span class="style13">OTHER STATISTICS </span><span class="style14"></span></td>
          </tr>
          <tr>
            <td width="350" bgcolor="#000000"><div align="right"><strong>Number Times Kicked: </strong></div></td>
            <td width="350" bgcolor="#000000"><? echo getRank("kick",$lines); ?></td>
            <td width="350" bgcolor="#000000"><div align="right"><strong>Number of Times Banned: </strong></div></td>
            <td width="350" bgcolor="#000000"><? echo getRank("ban",$lines); ?></td>
          </tr>
          <tr bgcolor="#222222">
            <td><div align="right"><strong>Top Victim in 1 Round:</strong></div></td>
            <td><a href="http://www.1stdigitalinfantry.com/dynamicsig/DisplayBF2Stats.php?playerName=<? echo getRank("mvns",$lines); ?>"><? echo getRank("mvns",$lines); ?></a> (<? echo getRank("mvks",$lines); ?>)</td>
            <td><div align="right"><strong>Top Opponent in 1 Round: </strong></div></td>
            <td><a href="http://www.1stdigitalinfantry.com/dynamicsig/DisplayBF2Stats.php?playerName=<? echo getRank("vmns",$lines); ?>"><? echo getRank("vmns",$lines); ?></a> (<? echo getRank("vmks",$lines); ?>)</td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br>
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr>
            <td colspan="5" background="headinggradient.gif" bgcolor="#009900"><span class="style13">MEDALS</span><span class="style14"></span></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="center">
			<?
			if (trim(getRank("a-2051907",$lines)) <> "") {
				$awardaction = explode("-",getRank("a-2051907",$lines));
				echo "<img src=\"awards/medals/2051907.gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>". $medalname[$awardaction[0]] ."</strong> (x ". $awardaction[1] . ")<br>".date("m.d.y - g:i a", $awardaction[2])."<br><font size=1>first received on <br>".date("m.d.y - g:i a", $awardaction[3])."</font></center>')\" onmouseout=\"hideTip()\">";
			} else {
				echo "<img src=\"awards/medals/gray_2051907.gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>Gold Star</strong><br>Place 1st overall in a server at the end of the round.')\" onmouseout=\"hideTip()\">";
			}
			?>
			</div></td>
            <td bgcolor="#000000"><div align="center"><?
			if (trim(getRank("a-2051919",$lines)) <> "") {
				$awardaction = explode("-",getRank("a-2051919",$lines));
				echo "<img src=\"awards/medals/2051919.gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>". $medalname[$awardaction[0]] ."</strong> (x ". $awardaction[1] . ")<br>".date("m.d.y - g:i a", $awardaction[2])."<br><font size=1>first received on <br>".date("m.d.y - g:i a", $awardaction[3])."</font></center>')\" onmouseout=\"hideTip()\">";
			} else {
				echo "<img src=\"awards/medals/gray_2051919.gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>Silver Star</strong><br>Place 2nd overall in a server at the end of the round.')\" onmouseout=\"hideTip()\">";
			}
			?></div></td>
            <td bgcolor="#000000"><div align="center"><?
			if (trim(getRank("a-2051902",$lines)) <> "") {
				$awardaction = explode("-",getRank("a-2051902",$lines));
				echo "<img src=\"awards/medals/2051902.gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>". $medalname[$awardaction[0]] ."</strong> (x ". $awardaction[1] . ")<br>".date("m.d.y - g:i a", $awardaction[2])."<br><font size=1>first received on <br>".date("m.d.y - g:i a", $awardaction[3])."</font></center>')\" onmouseout=\"hideTip()\">";
			} else {
				echo "<img src=\"awards/medals/gray_2051902.gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>Bronze Star</strong><br>Place 3rd overall in a server at the end of the round.')\" onmouseout=\"hideTip()\">";
			}
			?></div></td>
            <td bgcolor="#000000"><div align="center"><?
			if (trim(getRank("a-2191608",$lines)) <> "") {
				$awardaction = explode("-",getRank("a-2191608",$lines));
				echo "<img src=\"awards/medals/2191608_1.gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>Purple Heart</strong><br>".date("m.d.y - g:i a", $awardaction[2])."</center>')\" onmouseout=\"hideTip()\">";
			} else {
				echo "<img src=\"awards/medals/gray_2191608_1.gif\" width=\"128\" height=\"128\" onmouseover=\"doTooltip(event, '<strong><center>Purple Heart</strong><br>Get a 1:4 Kill to Death Ratio.<br><font size=1>(Don\'t get it.)</font>')\" onmouseout=\"hideTip()\">";
			}
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(1000, $TotalTimes[0]);
			$Required = "· You need <b>" .$check . "</b> More Global Hours in Total";
			$check = CheckStuff(50000, getRank("heal",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Global Heals";
			 $check = CheckStuff(25000, getRank("rpar",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Global Repairs";
			$check = CheckStuff(25000, getRank("rsup",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Global Repairs";
			MedalHTML(getRank("a-2191319",$lines), 2191319, "Meritorious Service Medal", $Required); 
			?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(3000, $TotalTimes[0]);
			$Required = "· <b>" .$check . "</b> More Global Hours Played";
			$check = CheckStuff(25000, getRank("kill",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Global Kills";
			 $check = CheckStuff(25, getRank("bksk",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> Kills (Kill Streak)";
			$Required = $Required . "<br>· Playing for 33 minutes in a server.";
			MedalHTML(getRank("a-2190303",$lines), 2190303, "Combat Action Medal", $Required); 
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(3000, $AviatorTimes[0]);
			$Required = "· <b>" .$check . "</b> More Global Hours in an Airplane";
			$check = CheckStuff(10000, getRank("vkl-1",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Global Kills in an Airplane";
			$Required = $Required . "<br>· 25 Kills in an Airplane in 1 round";
			MedalHTML(getRank("a-2190309",$lines), 2190309, "Air Combat Medal", $Required); 
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(3000, $ArmorTimes[0]);
			$Required = "· <b>" .$check . "</b> More Global Hours in an Airplane";
			$check = CheckStuff(10000, getRank("vkl-0",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Global Kills in an Armor Vehicle";
			$Required = $Required . "<br>· 25 Vehicle Kills in an Armor Vehicle in 1 round";
			MedalHTML(getRank("a-2190318",$lines), 2190318, "Armor Combat Medal", $Required); 
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(3000, $HelicopterTimes[0]);
			$Required = "· <b>" .$check . "</b> More Global Hours in a Helicopter";
			$check = CheckStuff(25000, getRank("vkl-3",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Global Kills in a Helicopter";
			$Required = $Required . "<br>· 30 Kills in a Helicopter in 1 round";
			MedalHTML(getRank("a-2190308",$lines), 2190308, "Helicopter Combat Medal", $Required); 
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(4000, $TotalTimes[0]);
			$Required = "· <b>" .$check . "</b> More Global Hours in Total";
			$Required = $Required . "<br>· 27 Kills in 1 Round";
			$Required = $Required . "<br>· No Team Kills in same round";
			$Required = $Required . "<br>· No Team Damage in same round";
			$Required = $Required . "<br>· No Team Vehicle Damage in same round";
			MedalHTML(getRank("a-2190703",$lines), 2190703, "Good Conduct Medal", $Required); 
			?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(500, $TotalTimes[0]);
			$Required = "· <b>" .$check . "</b> More Global Hours in Total";
			$check = CheckBadge(getRank("a-1031406",$lines), 1);
			$Required = $Required . "<br>· Basic Knife Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031619",$lines), 1);
			$Required = $Required . "<br>· Basic Pistol Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031119",$lines), 1);
			$Required = $Required . "<br>· Basic Assualt Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031120",$lines), 1);
			$Required = $Required . "<br>· Basic Anti-Tank Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031109",$lines), 1);
			$Required = $Required . "<br>· Basic Sniper Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031121",$lines), 1);
			$Required = $Required . "<br>· Basic Support Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031105",$lines), 1);
			$Required = $Required . "<br>· Basic Engineer Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031113",$lines), 1);
			$Required = $Required . "<br>· Basic Medic Combat: <b>" .$check . "</b> ";
			$Required = $Required . "<br>· Playing for 34 minutes in a server ";
			MedalHTML(getRank("a-2020903",$lines), 2020903, "Combat Infantry Medal", $Required); 			
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			if (trim(getRank("a-2020903",$lines)) <> "") {
				$Required = "Comabat Infantry Medal: <b>Earned</b>";
			} else {
				$Required = "Comabat Infantry Medal: <b>Required</b>";
			}
			
			$check = CheckBadge(getRank("a-1031406",$lines), 2);
			$Required = $Required . "<br>· Veteran Knife Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031619",$lines), 2);
			$Required = $Required . "<br>· Veteran Pistol Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031119",$lines), 2);
			$Required = $Required . "<br>· Veteran Assualt Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031120",$lines), 2);
			$Required = $Required . "<br>· Veteran Anti-Tank Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031109",$lines), 2);
			$Required = $Required . "<br>· Veteran Sniper Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031121",$lines), 2);
			$Required = $Required . "<br>· Veteran Support Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031105",$lines), 2);
			$Required = $Required . "<br>· Veteran Engineer Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031113",$lines), 2);
			$Required = $Required . "<br>· Veteran Medic Combat: <b>" .$check . "</b> ";
			$Required = $Required . "<br>· Playing for 34 minutes in a server ";
			MedalHTML(getRank("a-2020913",$lines), 2020913, "Marksman Infantry Medal", $Required); 			
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			if (trim(getRank("a-2020913",$lines)) <> "") {
				$Required = "Marksman Infantry Medal: <b>Earned</b>";
			} else {
				$Required = "Marksman Infantry Medal: <b>Required</b>";
			}
			$check = CheckBadge(getRank("a-1031406",$lines), 3);
			$Required = $Required . "<br>· Expert Knife Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031619",$lines), 3);
			$Required = $Required . "<br>· Expert Pistol Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031119",$lines), 3);
			$Required = $Required . "<br>· Expert Assualt Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031120",$lines), 3);
			$Required = $Required . "<br>· Expert Anti-Tank Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031109",$lines), 3);
			$Required = $Required . "<br>· Expert Sniper Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031121",$lines), 3);
			$Required = $Required . "<br>· Expert Support Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031105",$lines), 3);
			$Required = $Required . "<br>· Expert Engineer Combat: <b>" .$check . "</b> ";
			$check = CheckBadge(getRank("a-1031113",$lines), 3);
			$Required = $Required . "<br>· Expert Medic Combat: <b>" .$check . "</b> ";
			$Required = $Required . "<br>· Playing for 34 minutes in a server";
			MedalHTML(getRank("a-2020919",$lines), 2020919, "Sharpshooter Infantry Medal", $Required); 			
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(6000, $TotalTimes[0]);
			$Required = "· <b>" .$check . "</b> More Global Hours Played";
			$check = CheckStuff(50000, getRank("dsab",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Driver Special Ability Points";
			$check = CheckStuff(10000, getRank("dfcp",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Global Ammount of Times defending a CP";
			$check = CheckStuff(250000, $score_tmwk);
			$Required = $Required . "<br>· <b>" .$check . "</b> More Global Teamwork Score";
			$Required = $Required . "<br>· Playing for 33 minutes in a server";
			MedalHTML(getRank("a-2021322",$lines), 2021322, "Medal of Valor", $Required); 
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(3000, $CommanderTimes[0]);
			$Required = "· <b>" .$check . "</b> More Hours as a Commander";
			$check = CheckStuff(2000, $SquadLeaderTimes[0]);
			$Required = $Required . "<br>· <b>" .$check . "</b> More Hours as a Squad Leader";
			$check = CheckStuff(2000, $SquadMemberTimes[0]);
			$Required = $Required . "<br>· <b>" .$check . "</b> More Hours as a Squad Member";
			$Required = $Required . "<br>· Team score of 53 in 1 Game<br><font size=1>(Revives, Re-supplying, Repairing or Capturing, Capture ASsist Flag Points.)</font>";
			MedalHTML(getRank("a-2020419",$lines), 2020419, "Distinguished Service Medal", $Required); 
			?></div></td>
          </tr>
          <tr>
            <td bgcolor="#222222"><div align="center"></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(4500, $TotalUSATimes[0]);
			$Required = "· <b>" .$check . "</b> More Hours Played as USA";
			$check = getRank("abr-0",$lines);
			if ($check >= 100) {
				$Required = $Required . "<br>· Best Round Score as USA > 100: <b>Completed</b>";
			} else {
				$Required = $Required . "<br>· Best Round Score as USA > 100: <b>InComplete</b>";
			}
			$check = CheckStuff(500, getRank("awn-0",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Rounds Won Playing as USA";
			MedalHTML(getRank("a-2021403",$lines), 2021403, "Navy Cross", $Required); 
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(4500, $TotalMECTimes[0]);
			$Required = "· <b>" .$check . "</b> More Hours Played as MEC";
			$check = getRank("abr-1",$lines);
			if ($check >= 100) {
				$Required = $Required . "<br>· Best Round Score as MEC > 100: <b>Completed</b>";
			} else {
				$Required = $Required . "<br>· Best Round Score as MEC > 100: <b>InComplete</b>";
			}
			$check = CheckStuff(500, getRank("awn-1",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Rounds Won Playing as MEC";
			MedalHTML(getRank("a-2020719",$lines), 2020719, "Golden Scimitar", $Required); 
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? 
			$check = CheckStuff(4500, $TotalCHINATimes[0]);
			$Required = "· <b>" .$check . "</b> More Hours Played as CHINA";
			$check = getRank("abr-2",$lines);
			if ($check >= 100) {
				$Required = $Required . "<br>· Best Round Score as CHINA > 100: <b>Completed</b>";
			} else {
				$Required = $Required . "<br>· Best Round Score as CHINA > 100: <b>InComplete</b>";
			}
			$check = CheckStuff(500, getRank("awn-2",$lines));
			$Required = $Required . "<br>· <b>" .$check . "</b> More Rounds Won Playing as CHINA";
			MedalHTML(getRank("a-2021613",$lines), 2021613, "People\'s Medallion", $Required); 
			?></div></td>
            <td bgcolor="#222222"><div align="center"></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br>
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr>
            <td colspan="5" background="headinggradient.gif" bgcolor="#009900"><span class="style13">BADGES</span><span class="style14"></span></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="center">
			<? $WeaponNumber = 1031406;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreKills = 50 - getRank("wkl-9",$lines);
					if ($MoreKills < 0) {
						$MoreKills = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreKills . " More Global Knife Kills.<br>7 Knife Kills in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreKills = 100 - getRank("wkl-9",$lines);
					if ($MoreKills < 0) {
						$MoreKills = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreKills . " More Global Knife Kills.<br>18 Knife Kills in 1 Round";	
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "7 Knife Kills in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Knife Combat", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center">
			<? $WeaponNumber = 1031619;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreKills = 50 - getRank("wkl-5",$lines);
					if ($MoreKills < 0) {
						$MoreKills = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreKills . " More Global Pistol Kills.<br>7 Pistol Kills in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreKills = 100 - getRank("wkl-5",$lines);
					if ($MoreKills < 0) {
						$MoreKills = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreKills . " More Global Pistol Kills.<br>18 Pistol Kills in 1 Round";	
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "7 Pistol Kills in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Pistol Combat", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center">
			<? $WeaponNumber = 1031119;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$FoundOne = 1;
				$CheckForIt = getRank("a-".$WeaponNumber."-2",$lines);
			}
			if (trim($CheckForIt) <> "") {
				$FoundOne = 2;
				$CheckForIt = getRank("a-".$WeaponNumber."-3",$lines);
			}
			if (trim($CheckForIt) <> "") {
				$FoundOne = 3;
			} else {
				$CheckForIt = getRank("a-".$WeaponNumber."-2",$lines);
			}
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 250 - $RifleTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours as Assault Class.<br>20 Kills in 1 Round as Assualt Class";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreTime = 1000 - $RifleTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours as Assault Class.<br>40 Kills in 1 Round as Assualt Class";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "10 Kills in 1 Round as Assault Class";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Assualt Combat", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center">
			<? $WeaponNumber = 1031120;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 250 - $AntiTankTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours as Anti-Tank Class.<br>20 Kills in 1 Round as Anti-Tank Class";	
				} elseif ($type == 2) {			
					$TheName = "Veteran";
					$MoreTime = 1000 - $AntiTankTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours as Anti-Tank Class.<br>40 Kills in 1 Round as Anti-Tank Class";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "10 Kills in 1 Round as Anti-Tank Class";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Anti-Tank Combat", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center">
			<? $WeaponNumber = 1031109;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 250 - $SniperTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours as Sniper Class.<br>20 Kills in 1 Round as Sniper Class";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreTime = 1000 - $SniperTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours as Sniper Class.<br>35 Kills in 1 Round as Sniper Class";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "10 Kills in 1 Round as Sniper Class";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Sniper Combat", $Requirement);
			?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1031115;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 250 - $SpecOpsTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours as Spec-Ops Class.<br>15 Kills in 1 Round as Spec-Ops Class";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreTime = 1000 - $SpecOpsTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours as Spec-Ops Class.<br>40 Kills in 1 Round as Spec-Ops Class";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "10 Kills in 1 Round as Spec-Ops Class";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Spec-Ops Combat", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1031121;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 250 - $SupportTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours as Support Class.<br>20 Kills in 1 Round as Support Class";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreTime = 1000 - $SupportTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours as Support Class.<br>40 Kills in 1 Round as Support Class";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "10 Kills in 1 Round as Support Class";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Support Combat", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1031105;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 250 - $EngineerTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours as Engineer Class.<br>20 Kills in 1 Round as Engineer Class";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreTime = 1000 - $EngineerTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours as Engineer Class.<br>40 Kills in 1 Round as Engineer Class";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "10 Kills in 1 Round as Engineer Class";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Engineer Combat", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1031113;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 250 - $MedicTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours as Medic Class.<br>20 Kills in 1 Round as Medic Class";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreTime = 1000 - $MedicTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours as Medic Class.<br>40 Kills in 1 Round as Medic Class";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "10 Kills in 1 Round as Medic Class";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Medic Combat", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1031923;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 200 - $GroundDefTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours in TOW or Mounted Machine Gun.<br>12 Kills in 1 Round in TOW or Mounted Machine Gun";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreTime = 750 - $GroundDefTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours in TOW or Mounted Machine Gun.<br>24 Kills in 1 Round in TOW or Mounted Machine Gun";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "5 minutes in TOW or Mounted Machine Gun in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Ground Defense", $Requirement);
			?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1032415;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreKills = 500 - getRank("wkl-11",$lines);
					if ($MoreKills < 0) {
						$MoreKills = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreKills . " More Global Kills with Mines, Claymores, or C4.<br>23 Kills with Mines, Calymores or C4 in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreKills = 1000 - getRank("wkl-11",$lines);
					if ($MoreKills < 0) {
						$MoreKills = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreKills . " More Global Kills with Mines, Claymores, or C4.<br>24 Kills in 1 Round in TOW or Mounted Machine Gun";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "13 Kills with Mines, Calymores or C4 in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Explosives Ordinance", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1190601;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 500 - $MedicTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours as Medic Class.<br>10 Heal points in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreTime = 1000 - $MedicTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$MoreHeals = 500 - getRank("heal".$WeaponNumber,$lines);
					if ($MoreHeals < 0) {
						$MoreHeals = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours as Medic Class.<br>". $MoreHeals . " More Global Healing Points.<br>25 Heal points in 1 Round";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "5 Heal points in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." First Aid", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1190507;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 500 - $EngineerTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours as Engineer Class.<br>15 Repair Points in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreTime = 1000 - $EngineerTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$MoreHeals = 1000 - getRank("rpar".$WeaponNumber,$lines);
					if ($MoreHeals < 0) {
						$MoreHeals = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours as Engineer Class.<br>". $MoreHeals . " More Global Repair Points.<br>25 Repair points in 1 Round";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "5 Repair Points in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Engineer", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1191819;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreTime = 500 - $SupportTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreTime . " More Global Hours as Resupply Class.<br>10 Resupply Points in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreTime = 1000 - $SupportTimes[0];
					if ($MoreTime < 0) {
						$MoreTime = 0;
					}
					$MoreHeals = 1000 - getRank("rsup".$WeaponNumber,$lines);
					if ($MoreHeals < 0) {
						$MoreHeals = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreTime . " More Global Hours as Resupply Class.<br>". $MoreHeals . " More Global Resupply Points.<br>25 Resupply points in 1 Round";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "5 Resupply Points in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Resupply", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1190304;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MorePoints = 15000 - $score_cmnd;
					if ($MorePoints < 0) {
						$MorePoints = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MorePoints . " More Global Commander Points.<br>33 Minutes as Commander in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MorePoints = 150000 - $score_cmnd;
					if ($MorePoints < 0) {
						$MorePoints = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MorePoints . " More Global Commander Points.<br>33 Minutes as Commander in 1 Round";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "40 Commander Points in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Command", $Requirement);
			?></div></td>
          </tr>
          <tr>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1220118;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreHours = 100 - $ArmorTimes[0];
					if ($MoreHours < 0) {
						$MoreHours = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreHours . " More Global Hours in an Armor Vehicle.<br>12 Kills of an Armor Vehicle while in an Armor Vehicle in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreHours = 1000 - $ArmorTimes[0];
					if ($MoreHours < 0) {
						$MoreHours = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreHours . " More Global Hours in an Armor Vehicle.<br>24 Kills of an Armor Vehicle while in an Armor Vehicle in 1 Round";		
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "10 Minutes in an Armored Vehicle in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Armor", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1222016;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreHours = 100 - $TransportTimes[0];
					if ($MoreHours < 0) {
						$MoreHours = 0;
					}
					$MorePoints = 2000 - getRank("dsab",$lines);
					if ($MorePoints < 0) {
						$MorePoints = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreHours . " More Global Transport Hours.<br>" . $MorePoints. " More Driver Points.<br>5 Road Kills in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreHours = 1000 - $TransportTimes[0];
					if ($MoreHours < 0) {
						$MoreHours = 0;
					}
					$MorePoints = 50000 - getRank("dsab",$lines);
					if ($MorePoints < 0) {
						$MorePoints = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreHours . " More Global Transport Hours.<br>" . $MorePoints. " More Driver Points.<br>11 Road Kills in 1 Round";
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "10 Minutes in a Transport in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Transport", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1220803;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreHours = 100 - $HelicopterTimes[0];
					if ($MoreHours < 0) {
						$MoreHours = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreHours . " More Global Helicopter Hours.<br>12 Kills in a Helicopter in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreHours = 1000 - $HelicopterTimes[0];
					if ($MoreHours < 0) {
						$MoreHours = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreHours . " More Global Helicopter Hours.<br>24 Kills in a Helicopter in 1 Round";
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "15 Minutes in a Helicopter in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Helicopter", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1220122;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreHours = 500 - $AviatorTimes[0];
					if ($MoreHours < 0) {
						$MoreHours = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreHours . " More Global Hours in an Airplane.<br>12 Kills in an Airplane in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreHours = 1500 - $AviatorTimes[0];
					if ($MoreHours < 0) {
						$MoreHours = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreHours . " More Global Hours in an Airplane.<br>24 Kills in an Airplane in 1 Round";
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "10 Minutes in an Airplane in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Aviator", $Requirement);
			?></div></td>
            <td bgcolor="#000000"><div align="center"><? $WeaponNumber = 1220104;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$Show = 1;
				$TheBadge = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheBadge[1];
				$Display = $TheBadge[0]."_".$TheBadge[1];
				$TheWhen = $TheBadge[2];
				if ($type == 1) {
					$TheName = "Basic";
					$MoreHours = 250 - $AirDefenceTimes[0];
					if ($MoreHours < 0) {
						$MoreHours = 0;
					}
					$Requirement = "<i>To Veteran</i>: ". $MoreHours . " More Global Hours in Air Defense.<br>12 Kills with an AA Vehicle or a Stinger in 1 Round";	
				} elseif ($type == 2) {
					$TheName = "Veteran";
					$MoreHours = 750 - $AirDefenceTimes[0];
					if ($MoreHours < 0) {
						$MoreHours = 0;
					}
					$Requirement = "<i>To Expert</i>: ". $MoreHours . " More Global Hours in Air Defense.<br>24 Kills with an AA Vehicle or a Stinger in 1 Round";
				} elseif ($type == 3) {
					$TheName = "Expert";				
					$Requirement = "";	
				}
			} else {
				$Show = 0;
				$Display = $WeaponNumber."_2";
				$TheName = "Basic";	
				$Requirement = "5 Minutes in Air Defense in 1 Round";		
			}
			BadgeHTML($Show, $Display, $TheWhen, $TheName." Air Defense", $Requirement);
			?></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
  <br>
  <table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#00CC00">
    <tr>
      <td><table width="700" border="0" cellpadding="3" cellspacing="4" bordercolor="#00CC00">
          <tr>
            <td colspan="5" background="headinggradient.gif" bgcolor="#009900"><span class="style13">RIBBONS</span><span class="style14"></span></td>
          </tr>
          <tr bgcolor="#000000">
            <td>
			<? $WeaponNumber = 3190105;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Requirement = "15 Minutes in an Airplane in 1 Round.<br>19 Kills in an Airplane in that same round";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Aerial Service Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3240102;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Requirement = "10 Seconds in a Parachute.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Airborne Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3040109;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Requirement = "3 Minutes in a Stinger or AA Vehicle,<br>11 Kills in a Stinger or AA Vehicle both in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Air Defense Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3190118;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Requirement = "20 Minutes in an Armor Vehicle,<br>19 Kills in an Armor Vehicle both in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Armored Service Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3240301;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Requirement = "10 Kill Streak,<br>18 Kills both in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Combat Action Ribbon", $Requirement);
			?></td>
          </tr>
          <tr bgcolor="#000000">
            <td><? $WeaponNumber = 3190318;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Requirement = "13 Driver Kill Assists,<br>5 Kills both in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Crew Service Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3190409;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$SMtime = 10 - $SquadMemberTimes[0];
				if ($SMtime < 0) {
					$SMtime = 0;
				}
				$SLtime = 10 - $SquadLeaderTimes[0];
				if ($SLtime < 0) {
					$SLtime = 0;
				}
				$Ctime = 10 - $CommanderTimes[0];
				if ($Ctime < 0) {
					$Ctime = 0;
				}			
				
				$Requirement = $SMtime . " More Global Hours as a Squad Member.<br>" . $SLtime . " More Global Hours as a Squad Leader.<br>" . $Ctime . " More Global Hours as a Commander.<br>Team Score of 15 in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Distinguished Service Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3190605;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$TTime = 250 - $TotalTimes[0];
				if ($TTime < 0) {
					$TTime = 0;
				}	
				$Requirement = $TTime . " More Global Hours Total.<br>1 Full Round on the Chinese Side.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Far East Service Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3240703;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$TTime = 250 - $TotalTimes[0];
				if ($TTime < 0) {
					$TTime = 0;
				}	
				$Requirement = $TTime . " More Global Hours Total.<br>14 Kills in 1 Round,<br>No TKs in that Round,<br>No Team Damage in that Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Good Conduct Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3040718;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Requirement = "13 Minutes in a TOW/MMG,<br>5 Kills with TOW/MMG in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Ground Defense Ribbon", $Requirement);
			?></td>
          </tr>
          <tr bgcolor="#000000">
            <td><? $WeaponNumber = 3190803;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Requirement = "15 Minutes in a Helicopter,<br>19 Kills with a Helicopter in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Helicopter Service Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3150914;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$TWPoints = 250 - score_tmwk;
				if ($TWPoints < 0) {
					$TWPoints = 0;
				}	
				$Requirement = $TWPoints . " More Global Teamwork Points.<br>25 Minutes as Squad Leader in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Infantry Officer Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3241213;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$TTime = 400 - $TotalTimes[0];
				if ($TTime < 0) {
					$TTime = 0;
				}	
				$KSscore = getRank("bksk",$lines);
				if ($KSscore > 10) {
					$KSscore = "";
				} else {
					$KSscore = "Best Kill Streak of 10 or Greater.<br>";
				}
				$DStreak =getRank("wdsk",$lines);
				if ($DStreak > 8) {
					$DStreak = "";
				} else {
					$DStreak = "Worst Death Streak of 8 or Greater.<br>";
				}
				$Requirement = $TTime . " More Global Hours Total.<br>" . $KSscore . $DStreak . "Team Score of 50 in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Legion of Merit Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3211305;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Requirement = "26 Minutes in a Squad,<br>Team Score of 40 in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Meritorious Unit Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3191305;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$TTime = 250 - $TotalTimes[0];
				if ($TTime < 0) {
					$TTime = 0;
				}	
				$Requirement = $TTime . " More Global Hours Total.<br>1 Full Round on the MEC Side.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Mid-East Service Ribbon", $Requirement);
			?></td>
          </tr>
          <tr bgcolor="#000000">
            <td bgcolor="#222222">&nbsp;</td>
            <td><? $WeaponNumber = 3151920;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Requirement = "28 Minutes as Commander,<br>Commander Score of 50 in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Staff Officer Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3212201;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$SMtime = 25 - $SquadMemberTimes[0];
				if ($SMtime < 0) {
					$SMtime = 0;
				}
				$SLtime = 25 - $SquadLeaderTimes[0];
				if ($SLtime < 0) {
					$SLtime = 0;
				}				
				$Requirement = $SMtime . " More Global Hours as a Squad Member.<br>" . $SLtime . " More Global Hours as a Squad Leader.<br>Team Score of 55 in 1 Round.";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "Valorous Unit Ribbon", $Requirement);
			?></td>
            <td><? $WeaponNumber = 3242303;
			$CheckForIt = getRank("a-".$WeaponNumber,$lines);
			if (trim($CheckForIt) <> "") {
				$show = 1;
				$TheRibbon = explode("-",getRank("a-".$WeaponNumber,$lines));
				$type = $TheRibbon[1];
				$Display = $TheRibbon[0]."_".$TheRibbon[1];
				$TheWhen = $TheRibbon[2];
				$Requirement = "";	
			} else {
				$show =0;
				$Display = $WeaponNumber."_0";
				$Ctime = 50 - $CommanderTimes[0];
				if ($Ctime < 0) {
					$Ctime = 0;
				}			
				$Winss = getRank("wins",$lines);
				$Losss = getRank("loss",$lines);
				$WLRatio = round($Winss/$Losss, 4);
				
				
				
				$Requirement = $Ctime . " More Global Hours as Commander.<br>Commander Score of 45 in 1 Round.<br>Global Win to Loss Ratio Must be Greater than 3 (You have a ".$WLRatio .").";	
			} 
			RibbonHTML($show, $Display, $TheWhen, "War College Ribbon", $Requirement);
			?></td>
            <td bgcolor="#222222">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
  </table>  </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
</body></html>