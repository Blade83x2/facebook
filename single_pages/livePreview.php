<!DOCTYPE html>
<html>
	<head>
		<title>Like Button config</title>
        <meta charset="utf-8">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <style type="text/css">
            .center {
                float: none;
                margin-left: auto;
                margin-right: auto;
                text-align: center !important;
            }
            .fb-like {
                float: none;
                margin-top: 45px;
            }
        </style>
	</head>
	<body>
		<div id="fb-root"></div>
		<?php
		if(isset($_GET['APPID']) && isset($_GET['LANG']) && isset($_GET['WIDTH']) && isset($_GET['LAYOUTS']) && isset($_GET['BTNTYPE']) && isset($_GET['SCHEMA']) && isset($_GET['SHOWFACES']) && isset($_GET['SENDBTN']))
		{
			$LANG 		= base64_decode($_GET['LANG']);
            $LANG       = (preg_match("/^[a-z]{2}_[A-Z]{2}+$/", $LANG) ) ? $LANG : 'en_EN';
			$APPID 		= base64_decode($_GET['APPID']);
            $APPID      = (is_numeric($APPID))?$APPID:'';
			$URL 		= base64_decode($_GET['URL']);
            if( filter_var($URL, FILTER_VALIDATE_URL) != true) $URL = '';
			$WIDTH 		= base64_decode($_GET['WIDTH']);
            $WIDTH      = (is_numeric($WIDTH))?$WIDTH:300;
			$SCHEMA		= base64_decode($_GET['SCHEMA']);
            $SCHEMA     = ($SCHEMA!='light'&&$SCHEMA!='dark')?'light':$SCHEMA;
            $LAYOUTS	= base64_decode($_GET['LAYOUTS']);
            if($LAYOUTS != 'button_count' && $LAYOUTS!='box_count') $LAYOUTS='standard';
            $BTNTYPE    = (base64_decode($_GET['BTNTYPE']) <> 'like')?'recommend':'like';
			$SHOWFACES  = ((base64_decode($_GET['SHOWFACES'])=='1')?'true':'false');
			$SENDBTN  	= ((base64_decode($_GET['SENDBTN'])=='1')?'true':'false');
            echo '<div class="center">';
			$link 	= array();
			$link[] = '<div class="fb-like"';
			$link[] = ' data-href="';
			$link[] = $URL;
			$link[] = '" data-width="';
			$link[] = $WIDTH;
			$link[] = '" data-layout="';
			$link[] = $LAYOUTS;
			$link[] = '" data-action="';
			$link[] = $BTNTYPE;
			$link[] = '" data-colorscheme="'; 
			$link[] = $SCHEMA;
			$link[] = '" data-show-faces="';
			$link[] = $SHOWFACES;
			$link[] = '" data-send="';
			$link[] = $SENDBTN;
			$link[] = '"></div>';
			echo implode($link, '');
            echo '</div>';
			echo '<script> (function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/'.$LANG.'/all.js#xfbml=1&appId='.$APPID.'";fjs.parentNode.insertBefore(js,fjs);}(document,\'script\',\'facebook-jssdk\')); </script>';
		}
		?>
	</body>
</html>