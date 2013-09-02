<?php
defined('C5_EXECUTE') or die(t("Access Denied."));
$c = Page::getCurrentPage();
if ($c->isEditMode())
{
    if($pluginStatusOk != true)
    {
        echo '<div style="color:#ff0000;">'.t('The Like Button is disabled in Dashboard!').'</div>';
    }
    else
    {
        echo '<div style="color:#ff0000;">'.t('The Like Button is not visible in edit mode!').'</div>';
    }
}
else
{
    if(isset($likeCode) && $pluginStatusOk==true)
    {
        echo $likeCode;
    }
}
?>



