#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Madrid');
require 'src/whatsprot.class.php';
require 'src/events/MyEvents.php';



//////////////////////////////////////////////////
// #### DO NOT ADD YOUR INFO AND THEN COMMIT THIS FILE! ####
$sender   = 	""; // Number of the bot with country code
$password =   ""; // Password you received from WhatsApp
$time     =   "5"; // Check every ... (in seconds)
//////////////////////////////////////////////////


$presence = null;
// We get on $presence a string (online or offline). $type
function onPresenceAvailable($username, $from)
{
    global $presence;
    $presence = 'available';
    echo "- The user is online\n\n";
}

// We get on $presence a string (online or offline). $type
function onPresenceUnavailable($username, $from, $last)
{
    global $presence;
    $presence = 'unavailable';
    echo "- The user is offline\n\n";
}

function secondsToTime($seconds) {
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    return $dtF->diff($dtT)->format('- Last seen: %a days, %h hours, %i minutes and %s seconds ago');
}


if ($argc < 2) {
	echo "====================================================\n";
	echo "               WhatsApp Tracker v0.2                \n";
	echo "====================================================\n\n";
    echo "USAGE: php ".$_SERVER['argv'][0]." <targetPhone>\nor\nUSAGE: php ".$_SERVER['argv'][0]." <targetPhone> <myNumber>\n\n";
    exit(1);
}

$target = $_SERVER['argv'][1];
$notify = "";
if ($argc == 3){
  $notify = $_SERVER['argv'][2];
}
echo "====================================================\n";
echo "               WhatsApp tracker v0.2                \n";
echo "====================================================\n\n";
if ($sender == "")
{
  echo "\nEdit this file and add your account and password\n";
  exit(0);
}
echo "[*] Logging in as WhatsApp Tracker ($sender)\n";

$wa = new WhatsProt($sender, 'WhatsApp Tracker', FALSE);

$wa->connect();
try {
  $wa->loginWithPassword($password);
} catch (Exception $e) {
  echo "Bad authentication: Bad password or blocked account";
}

$events = new MyEvents($wa);
$wa->eventManager()->bind("onPresenceAvailable", "onPresenceAvailable");
$wa->eventManager()->bind("onPresenceUnavailable", "onPresenceUnavailable");


echo "\n[-] Tracker mode (ON): Waiting the user to get online...\n";
$wa->SendPresenceSubscription($target);
$wa->pollMessage();

if($presence == "available")
	echo "- The user is now online\n\n";
else
	echo "- The user is offline\n\n";

$lastpresence = "";
while(true){
	$wa->pollMessage();
	if(($lastpresence == "available") && ($presence == "unavailable")){

		$timeOffline = date("Y-m-d H:i:s");
		while($presence == "unavailable"){
			$timeDiff = round(strtotime(date("Y-m-d H:i:s")) - strtotime($timeOffline));
			echo secondsToTime($timeDiff)."\n";
			if($notify != "")
				$wa->sendMessage($notify, "($target) ".secondsToTime($timeDiff));
			$wa->pollMessage();
			sleep($time);
		}
	}
$lastpresence = $presence;
sleep($time);
}
