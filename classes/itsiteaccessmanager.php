<?php

/**
 * Class ITSiteaccessManager
 *
 * @author Stefano Ziller
 */
class ITSiteaccessManager
{
    const SETTINGS_SITEACCESS = '/settings/siteaccess';

    private $current_dir;
    private $siteaccess_list = array();
    private $siteurl_list = array();


    /**
     * Trova l'url del sito di un determinato siteaccess
     *
     * @param type $siteaccess
     * @return array
     */
    private function getSiteUrl( $siteaccess )
    {
        $siteUrl = '';
        $rootDIR = $this->current_dir . self::SETTINGS_SITEACCESS . '/' . $siteaccess;

        $siteINI = eZINI::instance('site.ini.append.php', $rootDIR);
        $siteINI->parseFile($rootDIR . '/site.ini.append.php');

        if( $siteINI instanceof eZINI ){
            if( $siteINI->hasVariable('SiteSettings', 'SiteURL') ){
                $siteUrl = $siteINI->variable('SiteSettings', 'SiteURL');
            }
        }

        return $siteUrl;
    }

    /**
     * ITSiteaccessManager constructor.
     */
    public function __construct()
    {
        $this->current_dir = getcwd();

        $dir_list = scandir( $this->current_dir . self::SETTINGS_SITEACCESS);

        foreach($dir_list as $dir){
            if( is_dir( $this->current_dir . self::SETTINGS_SITEACCESS . '/' . $dir ) ) {
                // Assumo che il nome dei siteaccess sia numerico di 3 cifre
                if (strlen($dir) === 3 && is_numeric($dir)) {
                    $this->siteaccess_list[] = $dir;

                    $this->siteurl_list[] = $this->getSiteUrl($dir);
                }
            }
        }

    }

    /**
     * @return array
     */
    public function getSiteaccessList()
    {
        return $this->siteaccess_list;
    }

    /**
     * @return array
     */
    public function getSiteurlList()
    {
        return $this->siteurl_list;
    }



}