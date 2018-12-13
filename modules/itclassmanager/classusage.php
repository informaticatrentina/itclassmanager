<?php

$module = $Params['Module'];
$identifier = $Params['Identifier'];

$tpl = eZTemplate::factory();

try
{
    $siteaccessManager = new ITSiteaccessManager();
    $class = eZContentClass::fetchByIdentifier( $identifier );

    $tpl->setVariable('class', $class);
    $tpl->setVariable('siteAccessList', $siteaccessManager->getSiteaccessList());
    $tpl->setVariable('siteUrlList', $siteaccessManager->getSiteurlList());

} catch (Exception $ex) {
    $tpl->setVariable('error', $ex->getMessage());
}

$Result = array();
$Result['content'] = $tpl->fetch( 'design:itclassmanager/classusage.tpl' );
