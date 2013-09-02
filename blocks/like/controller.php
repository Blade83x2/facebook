<?php
###########################################################################
#######                                                             #######
#######https://developers.facebook.com/docs/reference/plugins/like/ #######
#######                                                             #######
###########################################################################
defined('C5_EXECUTE') or die(t("Access Denied."));
class LikeBlockController extends BlockController
{
    protected
        $btInterfaceWidth   = 600,
        $btInterfaceHeight  = 450,
        $btTable            = 'btFacebookLike',
        $html,
        $form,
        $htmlCode,
        $likeUrl,
        $likeLayout,
        $likeScheme,
        $likeWidth,
        $likeFont,
        $likeButtonType,
        $likeSendButton,
        $likeShowFaces;

    public function on_start()
    {
        $this->loadElements();
        Loader::library('FacebookScripts', 'connect_facebook');
        $fb = FacebookScripts::getInstance();
        if($fb->pluginIsReady($this))
        {
            $this->set('pluginStatusOk', true);
            if(!$fb->transferComplete())
            {
                $fb->sendScript()->sendHTML();
            }
        }
    }

    public function view()
    {
        $this->set('likeCode', $this->htmlCode);
    }

    public function edit(){}
    public function add(){
        // TODO live preview funktioniert nicht beim ersten addden da noch nix geladen ist
        // TODO nach dem ersten speichern die seite refreshen damit das script geladen wird (controller->task()=='add'!)
        // TODO http://static.wpgpl.com/wp-content/uploads/2010/01/facebook-plugin-300x299.jpg
        // TODO http://store.shopware.de/images/articles/bf5e9c3582cdb2a6f0f314bd455a1e0d_5.jpg

    }

    public function save($args)
    {
        $args['likeWidth']  = 300; // make editable
        $args['likeUrl']    = NavigationHelper::getLinkToCollection(Page::getCurrentPage(), true);
        $link 	= array();
        $link[] = '<div class="fb-like"';
        $link[] = ' data-href="';
        $link[] = $args['likeUrl'];
        $link[] = '" data-width="';
        $link[] = $args['likeWidth'];
        $link[] = '" data-layout="';
        $link[] = $args['likeFont'];
        $link[] = '" data-action="';
        $link[] = $args['likeButtonType'];
        $link[] = '" data-colorscheme="';
        $link[] = $args['likeScheme'];
        $link[] = '" data-show-faces="';
        $link[] = (($args['likeShowFaces']==1)?'true':'false');
        $link[] = '" data-send="';
        $link[] = (($args['likeSendButton']==1)?'true':'false');
        $link[] = '"></div>';
        $args['htmlCode'] = implode($link, '');
        parent::save($args);
    }

    public function validate($args)
    {
        $e = Loader::helper('validation/error');
        if($args['likeLayout']!='standard' && $args['likeLayout']!='button_count'&& $args['likeLayout']!='box_count')
        {
            $e->add(t('The returned value for "Layout" is wrong!'));
        }
        if($args['likeScheme']!='light' && $args['likeScheme']!='dark')
        {
            $e->add(t('The returned value for "Color Schemes" is wrong!'));
        }
        if($args['likeFont']!='arial' && $args['likeFont']!='lucida grande'
        && $args['likeFont']!='segoe ui' && $args['likeFont']!='tahoma'
        && $args['likeFont']!='trebuchet ms' && $args['likeFont']!='verdana')
        {
            $e->add(t('The returned value for "Font Familye" is wrong!'));
        }
        if($args['likeButtonType']!='like' && $args['likeButtonType']!='recommend')
        {
            $e->add(t('The returned value for "Button Type" is wrong!'));
        }
        if($args['likeSendButton']!=1 && $args['likeSendButton']!=0)
        {
            $e->add(t('The returned value for "Display the Send Button" is wrong!'));
        }
        if($args['likeShowFaces']!=1 && $args['likeShowFaces']!=0)
        {
            $e->add(t('The returned value for "Show faces" is wrong!'));
        }
        return $e;
    }

    private function loadElements()
    {
        $this->html = Loader::helper('html');
        $this->addFooterItem($this->html->javascript('plugins/like.js', 'connect_facebook'));
        $this->addFooterItem($this->html->javascript('pluginLoader.js', 'connect_facebook'));
        $this->addFooterItem($this->html->css('plugins/like.css', 'connect_facebook'));
        $this->form = Loader::helper('form');
        $this->set('form', $this->form);
        $this->set('currentUrl',  NavigationHelper::getLinkToCollection(Page::getCurrentPage(), true) );
    }

    public function getBlockTypeDescription()
    {
        return t('The Like button lets users share pages from your site back to their Facebook profile with one click.');
    }

    public function getBlockTypeName()
    {
        return t('Facebook Like Button');
    }
}
?>