<? 

function parseRank($rankFile, $rankFile2, $unfriendlyTitleArray, $titleTypeArray, $friendlyTitleArray, $timeFile) { 

ini_set("user_agent","GameSpyHTTP/1.0"); 
	
$rankData = file($rankFile);
$rankData2 = file($rankFile2); 
	
if (substr($rankData[4],2,2) == "-1") { exit("No account could be found.\n"); } 
	
	echo "<xml version=\"1.0\" encoding=\"UTF-8\">\n\n<root>\n"; 

	for($i=1;$i<4;$i+=2) {
		$rankHeadingLine = str_replace($badSymbols, '', explode("\t",$rankData[$i]));
		$rankDataLine = explode("\t",$rankData[$i+1]);
		for($k=1;$k<count($rankHeadingLine);$k++) {
			$headingData = makeFriendlyHeading($rankHeadingLine[$k], $unfriendlyTitleArray, $titleTypeArray, $friendlyTitleArray);
			$contentData = makeFriendlyContent($rankHeadingLine[$k], $unfriendlyTitleArray, $rankDataLine[$k], $titleTypeArray);
			echo "  <".$rankHeadingLine[$k]." friendly=\"".$headingData."\">".$contentData."</".$rankHeadingLine[$k].">\n";
		}
	} 


	for($i=1;$i<4;$i+=2) {
		$rankHeadingLine = str_replace($badSymbols, '', explode("\t",$rankData2[$i]));
		$rankDataLine = explode("\t",$rankData2[$i+1]);
		for($k=1;$k<count($rankHeadingLine);$k++) {
			$headingData = makeFriendlyHeading($rankHeadingLine[$k], $unfriendlyTitleArray, $titleTypeArray, $friendlyTitleArray);
			$contentData = makeFriendlyContent($rankHeadingLine[$k], $unfriendlyTitleArray, $rankDataLine[$k], $titleTypeArray);
			if ($rankHeadingLine[$k] == 'playerrank') {
				echo "  <".$rankHeadingLine[$k]." friendly=\"".$headingData."\">".$contentData."</".$rankHeadingLine[$k].">\n";
			} elseif ($rankHeadingLine[$k] == 'n') {
				echo "  <globalrank friendly=\"".$headingData."\">".$contentData."</globalrank>\n";
			} elseif (substr($rankHeadingLine[$k], 0, 11) == 'countrycode') {
				echo "  <countrycode friendly=\"".$headingData."\">".$contentData."</countrycode>\n";
			} elseif ($rankHeadingLine[$k] == 'size') {
				echo "  <totalplayers friendly=\"".$headingData."\">".$contentData."</totalplayers>\n";
			}

			
		} 
			
	} 
	
} 


function parseAwards($awardsFile, $timeFile) { 
	$awardsData = file($awardsFile);
	$timeData = file($timeFile);
	$theAwardCount=0;
	$ribboncount=0;
	$medalcount=0;
	$badgecount=0;
	foreach ($awardsData as $line_num => $awardsData) {
		if ($line_num > 3) {
			$awardleveldate = explode("\t",$awardsData);
			if ($awardleveldate[0] == "D") {
				$theAwardCount++;
				echo"  <award-" . $theAwardCount . " friendly=\"award-". $theAwardCount ."\">"  . $awardleveldate[1]."-".$awardleveldate[2]."-".$awardleveldate[3]."-".$awardleveldate[4].  "</award-" . $theAwardCount . ">\n";
				echo"  <a-". $awardleveldate[1]."-".$awardleveldate[2] ." friendly=\"". $awardleveldate[1]."-".$awardleveldate[2]. "\">"  . $awardleveldate[1]."-".$awardleveldate[2]."-".$awardleveldate[3]."-".$awardleveldate[4].  "</a-" . $awardleveldate[1]."-".$awardleveldate[2]. ">\n";
				if (substr($awardleveldate[1], 0, 1) == 1) {
					$badgecount++;
				} elseif (substr($awardleveldate[1], 0, 1) == 2) {
					$medalcount++;
				} elseif (substr($awardleveldate[1], 0, 1) == 3) {
					$ribboncount++;
				}
			}
		}
	}
	echo"  <badgecount friendly=\"badgecount\">".$badgecount."</badgecount>\n";
	echo"  <medalcount friendly=\"medalcount\">".$medalcount."</medalcount>\n";
	echo"  <ribboncount friendly=\"ribboncount\">".$ribboncount."</ribboncount>\n";
	echo "</root>\n";
	
	foreach ($timeData as $line_num => $timeData) {
		if ($line_num == 4) {
			$timeDataThing = explode("\t",$timeData);
			$TimeTemp = trim(makeFriendlyElapsedTime($timeDataThing[3]));
			echo "  <tsqm friendly=\"Time as Squad Member\">".$TimeTemp."</tsqm>\n";
			$TimeTemp = trim(makeFriendlyElapsedTime($timeDataThing[4]));
			echo "  <tsql friendly=\"Time as Squad Leader\">".$TimeTemp."</tsql>\n";
			$TimeTemp = trim(makeFriendlyElapsedTime($timeDataThing[5]));
			echo "  <tlwf friendly=\"Time as Lone Wolf\">".$TimeTemp."</tlwf>\n";
			echo "  <mvns friendly=\"victimname\">".$timeDataThing[6]."</mvns>\n";
			echo "  <mvrs friendly=\"victimrank\">".$timeDataThing[7]."</mvrs>\n";
			echo "  <mvks friendly=\"victimkills\">".$timeDataThing[8]."</mvks>\n";
			echo "  <vmns friendly=\"opponentname\">".$timeDataThing[9]."</vmns>\n";
			echo "  <vmrs friendly=\"opponentrank\">".$timeDataThing[10]."</vmrs>\n";
			echo "  <vmks friendly=\"opponentkills\">".trim($timeDataThing[11])."</vmks>\n";
		}
	}
	
	
}


function makeFriendlyHeading($rawContent, $unfriendlyTitleArray, $titleTypeArray, $friendlyTitleArray) {
    for($j=0;$j<count($unfriendlyTitleArray);$j++) {
        if(trim($rawContent) == trim($unfriendlyTitleArray[$j])) {
            return(trim($friendlyTitleArray[$j]));
            exit();
        }
    }
    return(trim($rawContent));
} 


function makeFriendlyContent($headingContent, $unfriendlyTitleArray, $rawContent, $titleTypeArray) {
    for($l=0;$l<count($unfriendlyTitleArray);$l++) {
        if(trim($headingContent) == trim($unfriendlyTitleArray[$l])) {
            if(trim($titleTypeArray[$l]) == "T") {
                return(trim(date("Y-m-d", $rawContent)));
            } else if(trim($titleTypeArray[$l]) == "E") {
                return(trim(makeFriendlyElapsedTime($rawContent)));
            } else if(trim($titleTypeArray[$l]) == "%") {
                return(trim($rawContent."%"));
            }
        }
    }
    return(trim($rawContent));
}


function makeFriendlyElapsedTime($time = 0) {
    $hours    = (int)floor($time/3600);
    $minutes  = (int)floor($time/60)%60;
    $seconds  = (int)$time%60;
    if ($hours > 0 && $hours < 10) {
        $txt = "0".$hours.":";
    } else if ($hours >= 10) {
        $txt = $hours.":";
    } else {
        $txt = "00:";
    }
    if ($minutes > 0 && $minutes < 10) {
        $txt .= "0".$minutes.":";
    } else if ($minutes >= 10) {
        $txt .= $minutes.":";
    } else {
        $txt .= "00:";
    }
    if ($seconds>0 && $seconds < 10) {
        $txt .= "0".$seconds;
    } else if ($seconds >= 10) {
        $txt .= $seconds;
    } else {
        $txt .= "00";
    }
    return($txt);
} 


$titleFile = "titles";
$titleFileDelimiter = ",";

if(file_exists($titleFile)) {
    $titleData = file($titleFile);
    $titleArrayCounter = 0;
    for($a=0;$a<count($titleData);$a++) {
        $titleArrayTemp = explode($titleFileDelimiter,$titleData[$a]);
        $unfriendlyTitleArray[$titleArrayCounter] = $titleArrayTemp[0];
        $titleTypeArray[$titleArrayCounter] = $titleArrayTemp[1];
        $friendlyTitleArray[$titleArrayCounter] = $titleArrayTemp[2];
        $titleArrayCounter++;
    }
} else {
    exit("The file containing rank feed heading definitions was not found (".$titleFile.").");
} 




if(isset($_GET['accountName'])) {
    $badSymbols = array("\n", "\r", "?", "&");
    $accountName = str_replace($badSymbols, '', trim($_GET['accountName']));
    if($accountName <> trim($_GET['accountName'])) {
        exit("The account name you entered was malformed. Please check it and try again.");
    }            
    $rankURL = "http://bf2web.gamespy.com/ASP/getplayerinfo.aspx?nick=".$accountName."&info=&debug=tx&nocache=".rand(500, 32768) * rand(500, 32768);
    $rankURL2 = "http://bf2web.gamespy.com/ASP/getleaderboard.aspx?type=score&id=overall&nick=".$accountName."&nocache=".rand(500, 32768) * rand(500, 32768);
	$awards = "http://bf2web.gamespy.com/ASP/getawardsinfo.aspx?&nick=".$accountName."&nocache=".rand(500, 32768) * rand(500, 32768);
	$times = "http://bf2web.gamespy.com/ASP/getplayerinfo.aspx?nick=".$accountName."&info=tsqm,tsql,tlwf,mvns,mvrs,mvks,vmns,vmrs,vmks&debug=tx&nocache=".rand(500, 32768) * rand(500, 32768);
    parseRank($rankURL, $rankURL2, $unfriendlyTitleArray, $titleTypeArray, $friendlyTitleArray, $allowLocalRankFile, $allowXMLSave);
	parseAwards($awards, $times);
} else {
	exit("Make sure you entered an account name.");
} 



?>

