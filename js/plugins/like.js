function utf8_to_b64( str )
{
    return window.btoa(unescape(encodeURIComponent( str )));
}
function b64_to_utf8( str )
{
    return decodeURIComponent(escape(window.atob( str )));
}
function likebuttonLoad(targetId)
{

    var iframe = document.getElementById('likebuttondemo');
    iframe.src = $('#iframesrc').val()+'?LANG='+utf8_to_b64($('#lang').val())+'&APPID='+utf8_to_b64($('#appid').val())+'&URL='+utf8_to_b64($('#url').val())+'&WIDTH='+utf8_to_b64($('#width').val())+'&LAYOUTS='+utf8_to_b64($('#likeLayout').val())+'&BTNTYPE='+utf8_to_b64($('#likeButtonType').val())+'&SCHEMA='+utf8_to_b64($('#likeScheme').val())+'&SHOWFACES='+utf8_to_b64($('#likeShowFaces').val())+'&SENDBTN='+utf8_to_b64($('#likeSendButton').val());
}
