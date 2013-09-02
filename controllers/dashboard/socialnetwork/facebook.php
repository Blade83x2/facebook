<?php
defined('C5_EXECUTE') or die(_("Access Denied."));
class DashboardSocialnetworkFacebookController extends Controller
{
    protected
        $form,
        $html,
        $view,
        $config;

    public function on_start()
    {
        $this->html = Loader::helper('html');
        $this->addFooterItem($this->html->css('style.css', 'connect_facebook'));
        $this->form = Loader::helper('form');
        $this->set('form', $this->form);
        $this->config = new Config();
        $this->config->setPackageObject(Package::getByHandle('connect_facebook'));
    }

    public function view()
    {
        $this->set('APPID',     $this->config->get('SOCIALNETWORK_FACEBOOK_APPID'));
        $this->set('ACTIVE',    $this->config->get('SOCIALNETWORK_FACEBOOK_ACTIVE')==1?true:false);
        $this->set('LANG',      $this->config->get('SOCIALNETWORK_FACEBOOK_LANGUAGE'));
    }

    public function save_facebook_config()
    {
        if($this->isPost() && $this->post('SUBMIT'))
        {
            $appId = $this->post('APPID');
            if(is_numeric($appId)&&$appId!=''&&$appId>0&&strlen($appId)>14)
            {
                $this->config->save('SOCIALNETWORK_FACEBOOK_APPID', $appId);
                $this->config->save('SOCIALNETWORK_FACEBOOK_ACTIVE', $this->post('ACTIVE')==1?1:0);
                $this->config->save('SOCIALNETWORK_FACEBOOK_LANGUAGE', (preg_match("/^[a-z]{2}_[A-Z]{2}+$/", $this->post('LANG')) ) ? $this->post('LANG') : 'en_EN');
                Events::fire('on_after_change_facebook_appid', $this);
                $this->redirect('/dashboard');
            }
            else
            {
                $this->set('message', t('APP ID is invalid! Please type in a valid Application ID and try it again.'));
            }
        }
        elseif($this->isPost() && $this->post('DELETE'))
        {
            $this->config->save('SOCIALNETWORK_FACEBOOK_APPID', '');
            $this->config->save('SOCIALNETWORK_FACEBOOK_ACTIVE', 0);
            $this->config->save('SOCIALNETWORK_FACEBOOK_LANGUAGE', '');
            $this->redirect('/dashboard/socialnetwork/facebook/delete_facebook_config');
        }
    }

    public function delete_facebook_config()
    {
        $this->set('message', t('Application ID was removed! All Plugins are now invisible for visitors.'));
        Events::fire('on_after_delete_facebook_appid', $this);
    }
}
?>