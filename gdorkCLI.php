<?php
# Special for Monkey B Luffy / asu
# coded by UstadCage_48
error_reporting(0);
function wr($cl,$st){
	 $cc .= "\033[" . $cl . "m";
	 $cc .=  $st . "\033[0m";
	 return $cc;
}
function cover(){
	return "   _____ _____   ____  _____  _  __
  / ____|  __ \ / __ \|  __ \| |/ /
 | |  __| |  | | |  | | |__) | ' / 
 | | |_ | |  | | |  | |  _  /|  <  
 | |__| | |__| | |__| | | \ \| . \ 
  \_____|_____/ \____/|_|  \_\_|\_\
                                   
                                   ";
}
function tools(){
	print wr("0;31"," [+]-------------------------[+]\n");
	print wr("0;31","    [1]").wr("0;32"," Google dorker\n");
	print wr("0;31","    [2]").wr("0;32"," Google Mass Dorker\n");
	print wr("0;31","    [0]").wr("0;32"," Exit \n");
	print wr("0;31"," [+]-------------------------[+]\n\n");
}
function curl($url){
	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, $url);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 $output = curl_exec($ch);
	 curl_close($ch);
	 return $output;
}
function sv($site,$ext){
	 $fp = fopen("$ext.txt", 'a');
	 fwrite($fp, "$site\n");
	 fclose($fp);
}
function gdork($query){
    $key = "partner-pub-2698861478625135:3033704849";
    $getoket= curl('https://cse.google.com/cse.js?cx='.$key);
	preg_match('/"cse_token": "(.*?)",/',$getoket,$toke);
	for($i=0;$i<=1000;$i+=10){
    $dorking = curl('https://cse.google.com/cse/element/v1?num=10&hl=en&cx='.$key.'&safe=off&cse_tok='.$toke[1].'&start='.$i.'&q='.$query.'&callback=x');
   preg_match_all('/"unescapedUrl": "(.*?)"/',$dorking,$dork_tete);
  foreach($dork_tete[1] as $url){
  	$pars = parse_url($url);
  	$teteku = wr("0;31"," [=] ").wr("0;32","http://".$pars['host']);
  	$sau = "http://".$pars['host'];
  	sv($sau,"dork");
  	echo $teteku."\n";
  }
  }
  }
  
  function mass_gdork($list){
  	$dork = explode("\n",file_get_contents($list));
  	foreach($dork as $query){
    $key = "partner-pub-2698861478625135:3033704849";
    $getoket= curl('https://cse.google.com/cse.js?cx='.$key);
	preg_match('/"cse_token": "(.*?)",/',$getoket,$toke);
	echo " [=] ".$query."\n";
	for($i=0;$i<=1000;$i+=10){
    $dorking = curl('https://cse.google.com/cse/element/v1?num=10&hl=en&cx='.$key.'&safe=off&cse_tok='.$toke[1].'&start='.$i.'&q='.$query.'&callback=x');
   preg_match_all('/"unescapedUrl": "(.*?)"/',$dorking,$dork_tete);
  foreach($dork_tete[1] as $url){
  	$pars = parse_url($url);
  	$teteku = wr("0;31"," [=] ").wr("0;32","http://".$pars['host']);
  	$sau = "http://".$pars['host'];
  	sv($sau,"dork");
  	echo $teteku."\n";
  }
  }
  }
  }
  
  $no = $argv[1];
  echo "\n".cover()."\n";
  echo tools();
  echo " [+] Select Tools Numb : ";
  $no = trim(fgets(STDIN));
  if($no == 1){
  echo " [=] Your Dork : ";
  $query = trim(fgets(STDIN));
    echo gdork($query);
  }
  if($no == 2){
  echo " [=] Your File cn : (dork.txt)  : ";
  $query = trim(fgets(STDIN));
    echo mass_gdork($query);
  }
