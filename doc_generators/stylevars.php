<?php
require_once('./config/config.php');
require_once('./includes/database.php');
require_once('./includes/template.php');
require_once('./includes/functions.php');

// Misc. Settings. These probably do not need to be changed.
$templateTokens=['~title~','~title_slug~','~date~','~group~','~version~','~content~'];
$contentTokens=['~title','~image~','~description~','~help~','~additionalinfo~','~varname~','~type~','~defaultvalue~'];
$imageTokens=['~imageurl~','~caption~'];

// Setup Necessary Queries.
$query =[
    'version' => "select value from setting where varname='templateversion'",
    'groups' => "select distinct(stylevargroup) from stylevardfn;",
    'settings' => "SELECT p.text AS title, p2.text AS 'description', s.varname, s.defaultvalue, s.datatype, s.displayorder FROM setting AS S 
        LEFT JOIN settinggroup AS sg ON (s.grouptitle = sg.grouptitle)
        LEFT JOIN phrase AS p ON (p.varname LIKE CONCAT('setting_', s.varname, '_title')) 
        LEFT JOIN phrase AS p2 ON (p2.varname LIKE CONCAT('setting_', s.varname, '_desc')) 
        WHERE s.grouptitle=? ORDER BY s.displayorder",
];

$dbConnect = new Database($dbHost,$dbName,$dbUser,$dbPass);

if (!empty($dbConnect)) {
    echo "Database Connection Successful\n\r";
}

$clean = true;
$version = $dbConnect->run_query($query['version']);
$curVersion = $version->fetchColumn();
$now=date('n/d/Y h:ia');

$groups = $dbConnect->run_query($query['groups']);

$itemReplace=[];
$currentItem='';

foreach ($groups as $group) {
    echo $group['title'] . "\n\r";
    $settings = $dbConnect->run_query($query['settings'],[$group['grouptitle']]);
    $content='';
    foreach ($settings as $setting) {
        echo "\t\t". $setting['title'] ."\n\r";
        $itemReplace=[$setting['title'],'',$setting['description'],'','',$setting['varname'],$setting['datatype'],$setting['defaultvalue']];
        $currentItem = new Template('settingItem.inc');
        $content.=$currentItem->parse($contentTokens,$itemReplace);
    }
    $groupDir = $outDir . $separator . $group['displayorder'] . '.' . $group['grouptitle'];
    create_directory($groupDir);
    $templateReplace=[$group['title'], slugify($group['title']), $now, $group['grouptitle'], $curVersion, $content];

    $settingPage = new Template('settingPage.inc');
    $page=$settingPage->parse($templateTokens,$templateReplace);
    file_put_contents($groupDir . $separator . 'article.md', $page);
}

