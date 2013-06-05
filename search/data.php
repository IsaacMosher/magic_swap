<?php

if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

require_once('classes/CMySQL.php');

$sParam = $GLOBALS['MySQL']->escape($_GET['q']); // escaping external data
if (! $sParam) exit;

switch ($_GET['mode']) {
    case 'sql': // using database as source of data
        $sRequest = "SELECT DISTINCT `Nname` FROM `cards1` WHERE `Nname` LIKE '%{$sParam}%'";
        if (strlen($sRequest) > 0) {
            $bacon = "SELECT `Nid` FROM `cards1` WHERE `Nid` IN `$sRequest`";
        };
        $aItemInfo = $GLOBALS['MySQL']->getAll($sRequest);
        foreach ($aItemInfo as $aValues) {
            echo $aValues['Nname'] . "\n";
        }
        break;
}

?>





