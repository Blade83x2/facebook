<?php
defined('C5_EXECUTE') or die(t("Access Denied."));
class FacebookScripts
{
    private static $instance;
    private
        $APPID              = '',
        $ACTIVE             = 0,
        $LANG               = '',
        $script             = '',
        $parentController   = NULL,
        $configIsComplete   = false,
        $scriptTransfered   = false,
        $htmlTransfered     = false;

    public static function getInstance()
    {
        if(!self::$instance instanceof self)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function pluginIsReady(BlockController $parentController)
    {
        $this->parentController = $parentController;
        $this->APPID            = Config::get('SOCIALNETWORK_FACEBOOK_APPID');
        $this->ACTIVE           = Config::get('SOCIALNETWORK_FACEBOOK_ACTIVE');
        $this->LANG             = Config::get('SOCIALNETWORK_FACEBOOK_LANGUAGE');
        if($this->ACTIVE=='1' && $this->LANG!='' && $this->APPID!='')
        {
            $this->prepareScript();
            $this->configIsComplete = true;
            return $this->configIsComplete;
        }
        return false;
    }

    private function prepareScript()
    {
        $this->script = '<script> $( document ).ready(function() { (function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/'.$this->LANG.'/all.js#xfbml=1&appId='.$this->APPID.'";fjs.parentNode.insertBefore(js,fjs);}(document,\'script\',\'facebook-jssdk\')); }); </script>';
    }

    public function sendScript()
    {
        $this->parentController->addFooterItem($this->script);
        $this->scriptTransfered = true;
        return $this;
    }

    public function sendHTML()
    {
        $this->parentController->addFooterItem('<div id="fb-root"></div>');
        $this->htmlTransfered = true;
    }

    public function transferComplete()
    {
        return ($this->configIsComplete==true && $this->scriptTransfered==true && $this->htmlTransfered==true)?true:false;
    }
}
?>