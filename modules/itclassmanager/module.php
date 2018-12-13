<?php

$Module = array( 'name' => 'itclassmanager' );

$ViewList = array();

$ViewList['classlist'] = array(
    'script'			=>      'classlist.php',
    'params'			=> 	array(),
    'unordered_params'		=> 	array(),
    'single_post_actions'	=> 	array(),
    'post_action_parameters'	=> 	array()
);

$ViewList['classdiff'] = array(
    'script'			=>      'classdiff.php',
    'params'			=> 	array(),
    'unordered_params'		=> 	array(),
    'single_post_actions'	=> 	array(),
    'post_action_parameters'	=> 	array()
);

$ViewList['class'] = array(
    'script'			=>      'class.php',
    'params'			=> 	array('Identifier'),
    'unordered_params'		=> 	array(),
    'single_post_actions'	=> 	array(),
    'post_action_parameters'	=> 	array()
);

$ViewList['classusage'] = array(
    'script'			=>      'classusage.php',
    'params'			=> 	array('Identifier'),
    'unordered_params'		=> 	array(),
    'single_post_actions'	=> 	array(),
    'post_action_parameters'	=> 	array()
);

$ViewList['openpa_class'] = array(
    'functions' => array('openpa_class'),
    'script' => 'openpa_class.php',
    'ui_context' => 'edit',
    'default_navigation_part' => 'ezsetupnavigationpart',
    'single_post_actions' => array('SyncButton' => 'Sync',
        'InstallButton' => 'Install'),
    'params' => array('ID'),
    'unordered_params' => array());


$FunctionList = array();
$FunctionList['classlist'] = array();
$FunctionList['classdiff'] = array();
$FunctionList['class'] = array();
$FunctionList['classusage'] = array();
$FunctionList['openpa_class'] = array();