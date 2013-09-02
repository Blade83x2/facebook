<?php
defined('C5_EXECUTE') or die(t("Access Denied."));
class ConnectFacebookPackage extends Package
{
    protected
        $pkgHandle              = 'connect_facebook',
        $appVersionRequired     = '5.6.0',
        $pkgVersion             = '0.1.9';

    public function getPackageDescription()
    {
        return t("This Package includes the complete Facebook Social Plugin collection and display it in Blocks.");
    }

    public function getPackageName()
    {
        return t("Facebook Social Plugin Manager");
    }

    public function install()
    {
        $pkg = parent::install();
        $this->installDashboard($pkg);
        $this->installBtLike($pkg);
    }

    public function uninstall()
    {
        $this->uninstallDashboard();
        $this->uninstallBtLike();
        return parent::uninstall();
    }

    // BLOCK LIKE //

    private function installBtLike($pkg)
    {
        // install blocks
        BlockType::installBlockTypeFromPackage('like', $pkg);
    }

    private function uninstallBtLike()
    {
        // Delete Tables
        $db = Loader::db();
        $db->query("DROP TABLE IF EXISTS btFacebookLike");
        // Delete all instances of blocktypes
        $db->query("DELETE FROM BlockTypes WHERE btHandle='like'");
    }

    // DASHBOARD //

    private function installDashboard($pkg)
    {
        // install single_pages
        Loader::model('single_page');
        $sp = SinglePage::add('/dashboard/socialnetwork/facebook', $pkg);
        // install dashboard config values
        $config = new Config();
        $config->setPackageObject(Package::getByHandle($this->pkgHandle));
        $config->save('SOCIALNETWORK_FACEBOOK_ACTIVE', 0);
        $config->save('SOCIALNETWORK_FACEBOOK_APPID', '');
        $config->save('SOCIALNETWORK_FACEBOOK_LANGUAGE', '');
    }

    private function uninstallDashboard()
    {
        // Delete single_pages
        Loader::model('page');
        $p = Page::getByPath('/dashboard/socialnetwork/facebook'); $p->delete();
        // remove config values
        $config = new Config();
        $config->setPackageObject(Package::getByHandle($this->pkgHandle));
        $config->clear('SOCIALNETWORK_FACEBOOK_ACTIVE');
        $config->clear('SOCIALNETWORK_FACEBOOK_APPID');
        $config->clear('SOCIALNETWORK_FACEBOOK_LANGUAGE');
        Cache::flush();
    }
}
?>