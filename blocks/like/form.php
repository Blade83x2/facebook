<?php defined('C5_EXECUTE') or die(t("Access Denied."));?>
<div class="tabbable">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#Settingst" data-toggle="tab" onclick="getElementById('likebuttondemo').src = 'about:blank';"><?php echo t('Plugin Settings');?></a></li>
        <li><a href="#Previewt" data-toggle="tab" onclick="loadFacebookPlugin('likebutton', '#LikeButtonDemo');"><?php echo t('Live Preview');?></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane  active" id="Settingst">
            <table class="table table-bordered">
                <tr>
                    <td><h4><?php echo t('Content and Style options');?></h4></td>
                </tr>
                <?php if($pluginStatusOk!=true){?>
                <tr>
                    <td style="text-align: center"><b style="color: #ff0000;"><?php echo t('Facebook Plugins are disabled in Dashboard!');?></b></td>
                </tr>
                <?php } ?>
                <tr>
                    <td style="text-align: center">
                        <div class="input-prepend">
                            <span class="add-on" style="width: 200px;"><?php echo t('Layout Style');?></span>
                            <select id="likeLayout" name="likeLayout" style="outline:none;" class="span5">
                                <option value="standard"<?php echo ((isset($likeLayout)&&$likeLayout=='standard')?' selected="selected"':'');?>><?php echo t('Standard');?></option>
                                <option value="button_count"<?php echo ((isset($likeLayout)&&$likeLayout=='button_count')?' selected="selected"':'');?>><?php echo t('Button count (disable Faces)');?></option>
                                <option value="box_count"<?php echo ((isset($likeLayout)&&$likeLayout=='box_count')?' selected="selected"':'');?>><?php echo t('Box count');?></option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <div class="input-prepend">
                            <span class="add-on" style="width: 200px;"><?php echo t('Color Scheme');?></span>
                            <select id="likeScheme" name="likeScheme" style="outline:none;" class="span5">
                                <option value="light"<?php echo ((isset($likeScheme)&&$likeScheme=='light')?' selected="selected"':'');?>><?php echo t('Light');?></option>
                                <option value="dark"<?php echo ((isset($likeScheme)&&$likeScheme=='dark')?' selected="selected"':'');?>><?php echo t('Dark');?></option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <div class="input-prepend">
                            <span class="add-on" style="width: 200px;"><?php echo t('Font Family');?></span>
                            <select id="likeFont" name="likeFont" style="outline:none;" class="span5">
                                <option value="arial"<?php echo ((isset($likeFont)&&$likeFont=='arial')?' selected="selected"':'');?>><?php echo t('Arial');?></option>
                                <option value="lucida grande"<?php echo ((isset($likeFont)&&$likeFont=='lucida grande')?' selected="selected"':'');?>><?php echo t('Lucida grande');?></option>
                                <option value="segoe ui"<?php echo ((isset($likeFont)&&$likeFont=='segoe ui')?' selected="selected"':'');?>><?php echo t('Segoe ui');?></option>
                                <option value="tahoma"<?php echo ((isset($likeFont)&&$likeFont=='tahoma')?' selected="selected"':'');?>><?php echo t('Tahoma');?></option>
                                <option value="trebuchet ms"<?php echo ((isset($likeFont)&&$likeFont=='trebuchet ms')?' selected="selected"':'');?>><?php echo t('Trebuchet ms');?></option>
                                <option value="verdana"<?php echo ((isset($likeFont)&&$likeFont=='verdana')?' selected="selected"':'');?>><?php echo t('Verdana');?></option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <div class="input-prepend">
                            <span class="add-on" style="width: 200px;"><?php echo t('Verb to display');?></span>
                            <select id="likeButtonType" name="likeButtonType" style="outline:none;" class="span5">
                                <option value="like"<?php echo ((isset($likeButtonType)&&$likeButtonType=='like')?' selected="selected"':'');?>><?php echo t('Like Button');?></option>
                                <option value="recommend"<?php echo ((isset($likeButtonType)&&$likeButtonType=='recommend')?' selected="selected"':'');?>><?php echo t('Recommend Button');?></option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <div class="input-prepend">
                            <span class="add-on" style="width: 200px;"><?php echo t('Display the Send Button');?></span>
                            <select id="likeSendButton" name="likeSendButton" style="outline:none;" class="span5">
                                <option value="1"<?php echo ((isset($likeSendButton)&&$likeSendButton=='1')?' selected="selected"':'');?>><?php echo t('Yes');?></option>
                                <option value="0"<?php echo ((isset($likeSendButton)&&$likeSendButton=='0')?' selected="selected"':'');?>><?php echo t('No');?></option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <div class="input-prepend">
                            <span class="add-on" style="width: 200px;"><?php echo t('Show faces');?></span>
                            <select id="likeShowFaces" name="likeShowFaces" style="outline:none;" class="span5">
                                <option value="1"<?php echo ((isset($likeShowFaces)&&$likeShowFaces=='1')?' selected="selected"':'');?>><?php echo t('Yes');?></option>
                                <option value="0"<?php echo ((isset($likeShowFaces)&&$likeShowFaces=='0')?' selected="selected"':'');?>><?php echo t('No');?></option>
                            </select>
                        </div>
                    </td>
                </tr>
            </table>
            <?php echo $form->hidden('appid', Config::get('SOCIALNETWORK_FACEBOOK_APPID'))?>
            <?php echo $form->hidden('lang', Config::get('SOCIALNETWORK_FACEBOOK_LANGUAGE'))?>
            <?php echo $form->hidden('width', $likeWidth)?>
            <?php echo $form->hidden('url', $currentUrl)?>
            <?php echo $form->hidden('iframesrc', BASE_URL.REL_DIR_PACKAGES.'/connect_facebook/'.DIRNAME_PAGES .'/livePreview.php')?>
        </div>
        <div class="tab-pane" id="Previewt">
            <table class="table table-bordered">
                <tr>
                    <td><h4><?php echo t('Live preview');?></h4></td>
                </tr>
                <?php if($pluginStatusOk!=true){?>
                    <tr>
                        <td style="text-align: center"><b style="color: #ff0000;"><?php echo t('Facebook Plugins are disabled in Dashboard!');?></b></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td style="height: 300px;">

                        <iframe id="likebuttondemo" name="likebuttondemo" src="" style="width:98%;height: 90%;" border="0" frameborder="0"></iframe>

                    </td>
                </tr>
            </table>

        </div>
    </div>
</div>
<!-- statistik facebook.com/insights -->