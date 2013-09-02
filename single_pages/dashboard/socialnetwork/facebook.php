<?php
defined('C5_EXECUTE') or die(t("Access Denied."));
echo Loader::helper('concrete/dashboard')->getDashboardPaneHeaderWrapper(t('Socialnetwork - Facebook Plugin Manager'), t('Navigate to the Facebook %s APP Center %s and create a new App. After the App was createt, click on "advanced" and search for "Auth > AppType". Be sure that "Web" is selected and disable the Sandbox mode. Now click on "Settings" and you will find your App ID.','<a href="https://developers.facebook.com/apps" target="_blank">','</a>'));
?>
<form method="post" action="<?php echo $this->action('save_facebook_config'); ?>">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <td colspan="2" style="height:40px;text-align:center"><h3><?php echo t('Here you can type in your Facebook- Application ID. If you don´t have an ID, click on Help!') ?></h3></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width:350px;"><?php echo $form->label('ACTIVE', t('Enable Facebook Plugins for Blocks'), array('style'=>'cursor:pointer;'))?></td>
                <td><?php echo $form->checkbox('ACTIVE', 1, $ACTIVE, array('style' => 'outline:none;'))?></td>
            </tr>
            <tr>
                <td><?php echo $form->label('APPID', t('Facebook Application ID'), array('style'=>'cursor:pointer;'))?></td>
                <td><?php echo $form->text('APPID', $APPID, array('style'=>'width:95%;outline:none;'))?></td>
            </tr>
            <tr>
                <td><?php echo $form->label('LANG', t('Default language'), array('style'=>'cursor:pointer;'))?></td>
                <td>
                    <select name="LANG" id="LANG" style="width:97%;outline:none;cursor: pointer">
                        <option value="en_EN"<?php echo (($LANG=='en_EN')?' selected="selected"':'')?>><?php echo t('English')?></option>
                        <option value="en_GB"<?php echo (($LANG=='en_GB')?' selected="selected"':'')?>><?php echo t('English (UK)')?></option>
                        <option value="en_PI"<?php echo (($LANG=='en_PI')?' selected="selected"':'')?>><?php echo t('English (Pirate)')?></option>
                        <option value="en_UD"<?php echo (($LANG=='en_UD')?' selected="selected"':'')?>><?php echo t('English (Upside Down)')?></option>
                        <option value="en_US"<?php echo (($LANG=='en_US')?' selected="selected"':'')?>><?php echo t('English (US)')?></option>
                        <option value="de_DE"<?php echo (($LANG=='de_DE')?' selected="selected"':'')?>><?php echo t('German')?></option>
                        <option value="af_ZA"<?php echo (($LANG=='af_ZA')?' selected="selected"':'')?>><?php echo t('Afrikaans')?></option>
                        <option value="ar_AR"<?php echo (($LANG=='ar_AR')?' selected="selected"':'')?>><?php echo t('Arabic')?></option>
                        <option value="az_AZ"<?php echo (($LANG=='az_AZ')?' selected="selected"':'')?>><?php echo t('Azerbaijani')?></option>
                        <option value="be_BY"<?php echo (($LANG=='be_BY')?' selected="selected"':'')?>><?php echo t('Belarusian')?></option>
                        <option value="bg_BG"<?php echo (($LANG=='bg_BG')?' selected="selected"':'')?>><?php echo t('Bulgarian')?></option>
                        <option value="bn_IN"<?php echo (($LANG=='bn_IN')?' selected="selected"':'')?>><?php echo t('Bengali')?></option>
                        <option value="bs_BA"<?php echo (($LANG=='bs_BA')?' selected="selected"':'')?>><?php echo t('Bosnian')?></option>
                        <option value="ca_ES"<?php echo (($LANG=='ca_ES')?' selected="selected"':'')?>><?php echo t('Catalan')?></option>
                        <option value="cs_CZ"<?php echo (($LANG=='cs_CZ')?' selected="selected"':'')?>><?php echo t('Czech')?></option>
                        <option value="cy_GB"<?php echo (($LANG=='cy_GB')?' selected="selected"':'')?>><?php echo t('Welsh')?></option>
                        <option value="da_DK"<?php echo (($LANG=='da_DK')?' selected="selected"':'')?>><?php echo t('Danish')?></option>
                        <option value="el_GR"<?php echo (($LANG=='el_GR')?' selected="selected"':'')?>><?php echo t('Greek')?></option>
                        <option value="eo_EO"<?php echo (($LANG=='eo_EO')?' selected="selected"':'')?>><?php echo t('Esperanto')?></option>
                        <option value="es_ES"<?php echo (($LANG=='es_ES')?' selected="selected"':'')?>><?php echo t('Spanish (Spain)')?></option>
                        <option value="es_LA"<?php echo (($LANG=='es_LA')?' selected="selected"':'')?>><?php echo t('Spanish')?></option>
                        <option value="et_EE"<?php echo (($LANG=='et_EE')?' selected="selected"':'')?>><?php echo t('Estonian')?></option>
                        <option value="eu_ES"<?php echo (($LANG=='eu_ES')?' selected="selected"':'')?>><?php echo t('Basque')?></option>
                        <option value="fa_IR"<?php echo (($LANG=='fa_IR')?' selected="selected"':'')?>><?php echo t('Persian')?></option>
                        <option value="fb_LT"<?php echo (($LANG=='fb_LT')?' selected="selected"':'')?>><?php echo t('Leet Speak')?></option>
                        <option value="fi_FI"<?php echo (($LANG=='fi_FI')?' selected="selected"':'')?>><?php echo t('Finnish')?></option>
                        <option value="fo_FO"<?php echo (($LANG=='fo_FO')?' selected="selected"':'')?>><?php echo t('Faroese')?></option>
                        <option value="fr_CA"<?php echo (($LANG=='fr_CA')?' selected="selected"':'')?>><?php echo t('French (Canada)')?></option>
                        <option value="fr_FR"<?php echo (($LANG=='fr_FR')?' selected="selected"':'')?>><?php echo t('French (France)')?></option>
                        <option value="fy_NL"<?php echo (($LANG=='fy_NL')?' selected="selected"':'')?>><?php echo t('Frisian')?></option>
                        <option value="ga_IE"<?php echo (($LANG=='ga_IE')?' selected="selected"':'')?>><?php echo t('Irish')?></option>
                        <option value="gl_ES"<?php echo (($LANG=='gl_ES')?' selected="selected"':'')?>><?php echo t('Galician')?></option>
                        <option value="he_IL"<?php echo (($LANG=='he_IL')?' selected="selected"':'')?>><?php echo t('Hebrew')?></option>
                        <option value="hi_IN"<?php echo (($LANG=='hi_IN')?' selected="selected"':'')?>><?php echo t('Hindi')?></option>
                        <option value="hr_HR"<?php echo (($LANG=='hr_HR')?' selected="selected"':'')?>><?php echo t('Croatian')?></option>
                        <option value="hu_HU"<?php echo (($LANG=='hu_HU')?' selected="selected"':'')?>><?php echo t('Hungarian')?></option>
                        <option value="hy_AM"<?php echo (($LANG=='hy_AM')?' selected="selected"':'')?>><?php echo t('Armenian')?></option>
                        <option value="id_ID"<?php echo (($LANG=='id_ID')?' selected="selected"':'')?>><?php echo t('Indonesian')?></option>
                        <option value="is_IS"<?php echo (($LANG=='is_IS')?' selected="selected"':'')?>><?php echo t('Icelandic')?></option>
                        <option value="it_IT"<?php echo (($LANG=='it_IT')?' selected="selected"':'')?>><?php echo t('Italian')?></option>
                        <option value="ja_JP"<?php echo (($LANG=='ja_JP')?' selected="selected"':'')?>><?php echo t('Japanese')?></option>
                        <option value="ka_GE"<?php echo (($LANG=='ka_GE')?' selected="selected"':'')?>><?php echo t('Georgian')?></option>
                        <option value="km_KH"<?php echo (($LANG=='km_KH')?' selected="selected"':'')?>><?php echo t('Khmer')?></option>
                        <option value="ko_KR"<?php echo (($LANG=='ko_KR')?' selected="selected"':'')?>><?php echo t('Korean')?></option>
                        <option value="ku_TR"<?php echo (($LANG=='ku_TR')?' selected="selected"':'')?>><?php echo t('Kurdish')?></option>
                        <option value="la_VA"<?php echo (($LANG=='la_VA')?' selected="selected"':'')?>><?php echo t('Latin')?></option>
                        <option value="lt_LT"<?php echo (($LANG=='lt_LT')?' selected="selected"':'')?>><?php echo t('Lithuanian')?></option>
                        <option value="lv_LV"<?php echo (($LANG=='lv_LV')?' selected="selected"':'')?>><?php echo t('Latvian')?></option>
                        <option value="mk_MK"<?php echo (($LANG=='mk_MK')?' selected="selected"':'')?>><?php echo t('Macedonian')?></option>
                        <option value="ml_IN"<?php echo (($LANG=='ml_IN')?' selected="selected"':'')?>><?php echo t('Malayalam')?></option>
                        <option value="ms_MY"<?php echo (($LANG=='ms_MY')?' selected="selected"':'')?>><?php echo t('Malay')?></option>
                        <option value="nb_NO"<?php echo (($LANG=='nb_NO')?' selected="selected"':'')?>><?php echo t('Norwegian (bokmal)')?></option>
                        <option value="ne_NP"<?php echo (($LANG=='ne_NP')?' selected="selected"':'')?>><?php echo t('Nepali')?></option>
                        <option value="nl_NL"<?php echo (($LANG=='nl_NL')?' selected="selected"':'')?>><?php echo t('Dutch')?></option>
                        <option value="nn_NO"<?php echo (($LANG=='nn_NO')?' selected="selected"':'')?>><?php echo t('Norwegian (nynorsk)')?></option>
                        <option value="pa_IN"<?php echo (($LANG=='pa_IN')?' selected="selected"':'')?>><?php echo t('Punjabi')?></option>
                        <option value="pl_PL"<?php echo (($LANG=='pl_PL')?' selected="selected"':'')?>><?php echo t('Polish')?></option>
                        <option value="ps_AF"<?php echo (($LANG=='ps_AF')?' selected="selected"':'')?>><?php echo t('Pashto')?></option>
                        <option value="pt_BR"<?php echo (($LANG=='pt_BR')?' selected="selected"':'')?>><?php echo t('Portuguese (Brazil)')?></option>
                        <option value="pt_PT"<?php echo (($LANG=='pt_PT')?' selected="selected"':'')?>><?php echo t('Portuguese (Portugal)')?></option>
                        <option value="ro_RO"<?php echo (($LANG=='ro_RO')?' selected="selected"':'')?>><?php echo t('Romanian')?></option>
                        <option value="ru_RU"<?php echo (($LANG=='ru_RU')?' selected="selected"':'')?>><?php echo t('Russian')?></option>
                        <option value="sk_SK"<?php echo (($LANG=='sk_SK')?' selected="selected"':'')?>><?php echo t('Slovak')?></option>
                        <option value="sl_SI"<?php echo (($LANG=='sl_SI')?' selected="selected"':'')?>><?php echo t('Slovenian')?></option>
                        <option value="sq_AL"<?php echo (($LANG=='sq_AL')?' selected="selected"':'')?>><?php echo t('Albanian')?></option>
                        <option value="sr_RS"<?php echo (($LANG=='sr_RS')?' selected="selected"':'')?>><?php echo t('Serbian')?></option>
                        <option value="sv_SE"<?php echo (($LANG=='sv_SE')?' selected="selected"':'')?>><?php echo t('Swedish')?></option>
                        <option value="sw_KE"<?php echo (($LANG=='sw_KE')?' selected="selected"':'')?>><?php echo t('Swahili')?></option>
                        <option value="ta_IN"<?php echo (($LANG=='ta_IN')?' selected="selected"':'')?>><?php echo t('Tamil')?></option>
                        <option value="te_IN"<?php echo (($LANG=='te_IN')?' selected="selected"':'')?>><?php echo t('Telugu')?></option>
                        <option value="th_TH"<?php echo (($LANG=='th_TH')?' selected="selected"':'')?>><?php echo t('Thai')?></option>
                        <option value="tl_PH"<?php echo (($LANG=='tl_PH')?' selected="selected"':'')?>><?php echo t('Filipino')?></option>
                        <option value="tr_TR"<?php echo (($LANG=='tr_TR')?' selected="selected"':'')?>><?php echo t('Turkish')?></option>
                        <option value="uk_UA"<?php echo (($LANG=='uk_UA')?' selected="selected"':'')?>><?php echo t('Ukrainian')?></option>
                        <option value="vi_VN"<?php echo (($LANG=='vi_VN')?' selected="selected"':'')?>><?php echo t('Vietnamese')?></option>
                        <option value="zh_CN"<?php echo (($LANG=='zh_CN')?' selected="selected"':'')?>><?php echo t('Simplified Chinese (China)')?></option>
                        <option value="zh_HK"<?php echo (($LANG=='zh_HK')?' selected="selected"':'')?>><?php echo t('Traditional Chinese (Hong Kong)')?></option>
                        <option value="zh_TW"<?php echo (($LANG=='zh_TW')?' selected="selected"':'')?>><?php echo t('Traditional Chinese (Taiwan)')?></option>








<!-- http://www.facebook.com/translations/FacebookLocales.xml -->




                    </select>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->submit('SUBMIT', t('Save'), array('class'=>'btn-primary','style'=>'outline:none;'))?>
                    <?php echo $form->submit('DELETE', t('Reset'), array('class'=>'btn-primary','style'=>'outline:none;'))?>
                </td>
            </tr>
        </tfoot>
    </table>
</form>
<?php echo Loader::helper('concrete/dashboard')->getDashboardPaneFooterWrapper(false); ?>