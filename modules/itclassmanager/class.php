<?php

$identifier = $Params['Identifier'];

$class = NULL;

if( !empty($identifier) ) {
    $class = eZContentClass::fetchByIdentifier( $identifier );
}


header('Content-Type: application/json');
echo json_encode( $class );
eZExecution::cleanExit();