<?php
/**
 * 
 */

$http = eZHTTPTool::instance();
$tpl = eZTemplate::factory();

$Result['content'] = $tpl->fetch( "design:itclassmanager/classdiff.tpl" );
$Result['path'] = array( array( 'url' => '/',
                                    'text' => 'Home' ) ,
                             array( 'url' => false,
                                    'text' => ezpI18n::tr( 'itclassmanager/classdiff', 'Classes Differences' ) ) );