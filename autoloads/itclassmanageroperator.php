<?php


/**
 * Classe per l'operatore di template
 * 
 * @author Stefano Ziller
 */
class ITClassManagerOperator{
    public $Operators;
    
    /** 
     * Nome dell'operatore
     * 
     * @param string $name
     */
    public function __construct( ){
        $this->Operators = array(
            'classes',
            'class_by_identifier',);
    }
    
    /**
     * Elenco degli operatori
     * 
     * @return array
     */
    function operatorList(){
        return $this->Operators;
    }
    
    /**
     * Vero se la lista dei parametri esiste per operatore
     * 
     * @return boolean
     */
    public function namedParameterPerOperator(){
        return true;
    }
    
    /**
     * Parametri da assegnare agli operatori
     * 
     * @return type
     */
    public function namedParameterList(){
        return array(
            'classes' => array(
                'result_type' => array(
                    'type' => 'string',
                    'required' => true,
                    'default' => 'remote_list' )
            ),
            'class_by_identifier' => array(
                'identifier' => array(
                    'type'     => 'string',
                    'required' => true )
            )
        );
    }

    /**
     * Switch sui possibili operatori
     * 
     * @param type $tpl
     * @param type $operatorName
     * @param type $operatorParameters
     * @param type $rootNamespace
     * @param type $currentNamespace
     * @param type $operatorValue
     * @param type $namedParameters
     */
    public function modify( $tpl, $operatorName, $operatorParameters,  $rootNamespace, $currentNamespace, &$operatorValue, $namedParameters  ){

        switch ( $operatorName )
        {
            case 'classes':
                {
                    $operatorValue = ITClassManager::fetchRemoteClassList();
                    break;
                }
            case 'class_by_identifier':
                {
                    $identifier = $namedParameters['identifier'];
                    $operatorValue = eZContentClass::fetchByIdentifier( $identifier );

                    break;
                }

        }

    }
    
}

