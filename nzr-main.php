<?php
/**
 * Plugin Name: Custom WP MP3 player
 * Plugin URI: https://github.com/XoMka17/wp_mp3_player
 * Description: Wordpress MP3 player by Nazar Kalian
 * Version: 1.0
 * Text Domain: wp_mp3_player
 * Author: Nazar Kalian
 * Author URI: https://www.facebook.com/profile.php?id=100005095004749
 */


wp_register_style( 'nzr-player.css', plugin_dir_url( __FILE__ ) . 'css/nzr-player.css', array(), '1.0' );
wp_enqueue_style( 'nzr-player.css');
wp_register_style( 'nzr-bootstrap.css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array());
wp_enqueue_style( 'nzr-bootstrap.css');
wp_register_style( 'nzr-font-awesome.css', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array());
wp_enqueue_style( 'nzr-font-awesome.css');
wp_register_style( 'jcarousel.responsive.css', plugin_dir_url( __FILE__ ) . 'css/jcarousel.responsive.css', array());
wp_enqueue_style( 'jcarousel.responsive.css');


wp_register_script( 'nzr.jquery.jcarousel.min.js', plugin_dir_url( __FILE__ ) . 'js/nzr.jquery.jcarousel.min.js', array('jquery'), '1.0', true);
wp_enqueue_script( 'nzr.jquery.jcarousel.min.js');

wp_register_script( 'nzr-custom-jcarousel.js', plugin_dir_url( __FILE__ ) . 'js/nzr-custom-jcarousel.js', array('jquery'), '1.0', true);
wp_enqueue_script( 'nzr-custom-jcarousel.js' );


function nzr_custom_player($atts) {

    $link_array = explode('/',$atts['file']);
    $mp3_file = end($link_array);

    var_dump($mp3_file);


    $content = '
<div role="main" class="container-fluid">
    <!-- rss overlay, hidden initially -->
    <div class="dark-overlay" id="rss-overlay">
        <a class="close-overlay"></a>
        <div class="lightbox-inset">
            <div class="row rss-row" style="width:88%;margin-left:5%;">
                <div class="jcarousel col-lg-12 col-sm-12 col-md-12" data-jcarousel="true">
                    <ul style="left: 0px; top: 0px;">
                        <li>
                            <a class="resource-button-link" id="website_button" href="' . site_url() . '" target="_blank">
                                <img class="resource-button img-responsive" src="//static.libsyn.com/p/assets/platform/customplayer/images/website.png" style="display:block;margin-left:auto;margin-right:auto;">
                            </a>
                        </li>
                        <li>
                            <a class="resource-button-link" id="itunes_button" href="' . $atts['itunes_url'] . '" target="_blank">
                                <img class="resource-button img-responsive" src="//static.libsyn.com/p/assets/platform/customplayer/images/itunes.png" style="display:block;margin-left:auto;margin-right:auto;">
                            </a>
                        </li>
                        
                        <!--
                        <li>
                            <a class="resource-button-link" id="tunein_button" href="https://tunein.com/radio/Financial-Residency--The-money-lessons-you-never-received-in-medical-school-p1036939/" target="_blank">
                                <img class="resource-button img-responsive" src="//static.libsyn.com/p/assets/platform/customplayer/images/tunein.png" style="display:block;margin-left:auto;margin-right:auto;">
                            </a>
                        </li>
                        -->
                        
                        <!--
                        <li>
                            <a class="resource-button-link" id="stitcher_button" href="https://www.stitcher.com/podcast/financial-residency-the-money-lessons-you-never-received-in" target="_blank">
                                <img class="resource-button img-responsive" src="//static.libsyn.com/p/assets/platform/customplayer/images/stitcher.png" style="display:block;margin-left:auto;margin-right:auto;">
                            </a>
                        </li>
                        -->
                        
                        <!--
                        <li>
                            <a class="resource-button-link" id="google_podcasts_button" href="https://podcasts.google.com/?feed=aHR0cDovL2ZpbmFuY2lhbHJlc2lkZW5jeS5saWJzeW4uY29tL3Jzcw%3D%3D&amp;hl=en" target="_blank">
                                <img class="resource-button img-responsive" src="//static.libsyn.com/p/assets/platform/customplayer/images/google_podcasts.png" style="display:block;margin-left:auto;margin-right:auto;">
                            </a>
                        </li>
                        -->
                        
                        <li>
                            <a class="resource-button-link" id="spotify_button" href="' . $atts['spotify_url'] . '" target="_blank">
                                <img class="resource-button img-responsive" src="//static.libsyn.com/p/assets/platform/customplayer/images/spotify.png" style="display:block;margin-left:auto;margin-right:auto;">
                            </a>
                        </li>
                        
                        <!--
                        <li>
                            <a class="resource-button-link" id="deezer_button" href="https://www.deezer.com/show/2065662" target="_blank">
                                <img class="resource-button img-responsive" src="//static.libsyn.com/p/assets/platform/customplayer/images/deezer.png" style="display:block;margin-left:auto;margin-right:auto;">
                            </a>
                        </li>
                        -->
                        
                        <!--
                        <li>
                            <a class="resource-button-link" id="rss_button" href="http://financialresidency.libsyn.com/rss" target="_blank">
                                <img class="resource-button img-responsive" src="//static.libsyn.com/p/assets/platform/customplayer/images/rss.png" style="display:block;margin-left:auto;margin-right:auto;">
                            </a>
                        </li>
                        -->
                    </ul>
                </div>

                <a href="#" class="jcarousel-control-prev inactive" data-jcarouselcontrol="true">‹</a>
                <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true">›</a>
                <p class="jcarousel-pagination"></p>
            </div>
        </div>
    </div>
    <!-- access denied overlay, hidden initially -->
    <div class="dark-overlay" id="denied-overlay">
        <div class="lightbox-inset">
            <div class="row">
                <div class="col-xs-1">
                    <img src="//static.libsyn.com/p/assets/platform/customplayer/images/lock-black.svg" style="height:100% !important;width:auto;">
                </div>
                <div class="col-xs-11">
                    This content requires a premium subscription. <br>
                    Please <a target="_blank" href="https://my.libsyn.com/auth/login/show_id/103692"> log in </a> or <a target="_blank" href="https://my.libsyn.com/show/view/id/103692"> subscribe </a> to continue.
                </div>
            </div>
        </div>
    </div>
    
    <!-- embed overlay, hidden initially -->
    <!-- 
    <div class="dark-overlay" id="embed-overlay">
        <a class="close-overlay"></a>
        <div class="lightbox-inset">
            <textarea id="embed-code-display" onclick="this.focus();this.select()" readonly="readonly">&lt;iframe style="border: none" src="//html5-player.libsyn.com/embed/episode/id/5892401/height/90/theme/custom/thumbnail/yes/direction/backward/render-playlist/no/custom-color/337598/" height="90" width="100%" scrolling="no"  allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen&gt;&lt;/iframe&gt;</textarea>
        </div>
    </div>
    -->

    <!-- share overlay, hidden initially -->
    <div class="dark-overlay" id="share-overlay">
  	    <a class="close-overlay"></a>
        <div class="lightbox-inset">
            <div class="sharethis-inline-share-buttons" data-url="http://financialresidency.libsyn.com/why-you-need-to-have-joint-accounts-with-catherine-alford" data-title="Why You Need to Have Joint Accounts" data-image="' . $atts['img'] . '"></div>
        </div>
    </div>

    <div class="nzr-player">
        <!-- thumbnail -->
        <div class="nzr-player__img">
            <img src="' . $atts['img'] . '" class="thumbnail-image" alt="' . $atts['title'] . '">
            <!--
            <video id="video" preload="none" poster="https://assets.libsyn.com/secure/content/57225074/?height=90&amp;width=90" style="display:none;"></video>
            -->
        </div>
    
        <!-- right controls -->
        <div class="nzr-player__main">
            <div class="nzr-player__main-top">
                <div class="nzr-player__main-top-play">
                    <!-- load -->
                    <div class="loading">
                        <div class="sk-rect sk-rect1" style="color:#337598;"></div>
                        <div class="sk-rect sk-rect2"></div>
                        <div class="sk-rect sk-rect3"></div>
                        <div class="sk-rect sk-rect4"></div>
                        <div class="sk-rect sk-rect5"></div>
                    </div>
                    <!-- play -->
                    <a href="javascript:void[0];" id="play-player" role="button" tabindex="0" title="Play Episode">
                        <svg class="play img-responsive center-block" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;color:" xml:space="preserve"><path d="M10,5.251v39.497L43.572,25L10,5.251z"></path></svg>
                    </a>
                    <!-- pause -->
                    <a href="javascript:void[0];" id="pause-player" role="button" tabindex="0" title="Pause Episode">
                        <svg class="pause img-responsive" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="100px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;display:none;" xml:space="preserve"><g><path d="M12,42h10V8H12V42z"></path><path d="M28,8v34h10V8H28z"></path></g></svg>
                    </a>
                </div>
                <div class="nzr-player__seek">
                    <div class="col-lg-12 col-xs-12 podcast-title nopadding">
                        ' . $atts['author'] . ' 
                        <p class="full-screen pull-right" style="position:absolute;top:2px;right:3px;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" style="width:80% !important;height:80%!important;margin-top:2px;float:left;" viewBox="0 0 26 26" enable-background="new 0 0 26 26" xml:space="preserve"><path fill="#337598" d="M16.234,8.154c-0.221-0.223-0.221-0.584,0-0.806l7.055-7.053c0.221-0.223,0.582-0.223,0.805,0l1.61,1.611  c0.222,0.222,0.222,0.583,0,0.805L18.65,9.767c-0.221,0.221-0.584,0.221-0.805-0.001L16.234,8.154z" style="top:50%;left:50%;margin-right:-50%;"></path><path fill="#337598" d="M25.191,0h-7.244C17.62,0,17.325,0.196,17.2,0.499c-0.125,0.302-0.056,0.649,0.175,0.881l7.245,7.245  c0.155,0.154,0.36,0.236,0.571,0.236c0.104,0,0.209-0.02,0.31-0.062C25.803,8.675,26,8.38,26,8.053V0.809  C26,0.361,25.639,0,25.191,0z"></path><path fill="#337598" d="M8.154,9.766c-0.223,0.221-0.584,0.221-0.806,0L0.296,2.711c-0.223-0.221-0.223-0.582,0-0.805l1.611-1.61  c0.222-0.222,0.583-0.222,0.805,0L9.767,7.35C9.987,7.57,9.987,7.934,9.766,8.154L8.154,9.766z"></path><path fill="#337598" d="M0,0.809v7.244C0,8.38,0.196,8.675,0.499,8.8C0.801,8.925,1.148,8.855,1.38,8.625L8.625,1.38  c0.154-0.155,0.236-0.36,0.236-0.571c0-0.104-0.02-0.209-0.062-0.31C8.675,0.197,8.38,0,8.053,0H0.809C0.361,0,0,0.361,0,0.809z"></path><path fill="#337598" d="M9.765,17.846c0.222,0.223,0.222,0.584,0,0.806l-7.054,7.053c-0.221,0.223-0.583,0.223-0.805,0l-1.61-1.611  c-0.222-0.222-0.222-0.583,0-0.805l7.053-7.055c0.221-0.221,0.584-0.221,0.806,0.001L9.765,17.846z"></path><path fill="#337598" d="M0.809,26h7.244c0.327,0,0.622-0.196,0.747-0.499c0.125-0.302,0.056-0.649-0.175-0.881L1.38,17.375  c-0.155-0.154-0.361-0.236-0.571-0.236c-0.104,0-0.209,0.02-0.31,0.062C0.197,17.325,0,17.62,0,17.947v7.244  C0,25.639,0.362,26,0.809,26z"></path><path fill="#337598" d="M17.846,16.234c0.223-0.221,0.584-0.221,0.806,0l7.053,7.055c0.223,0.221,0.223,0.582,0,0.805l-1.611,1.61  c-0.222,0.222-0.583,0.222-0.805,0l-7.055-7.054c-0.221-0.221-0.221-0.584,0.001-0.805L17.846,16.234z"></path><path fill="#337598" d="M26,25.191v-7.244c0-0.327-0.196-0.622-0.499-0.747c-0.302-0.125-0.649-0.056-0.881,0.175l-7.245,7.245  c-0.154,0.155-0.236,0.36-0.236,0.571c0,0.104,0.02,0.209,0.062,0.31C17.325,25.803,17.62,26,17.947,26h7.244  C25.639,26,26,25.639,26,25.191z"></path></svg>
                        </p>
                    </div>
                    <div class="col-lg-12 col-xs-12 episode-title nopadding">' . $atts['title'] . '</div>
                    <div class="nzr-player__seek-bar col-lg-12 col-xs-12 seek-bar nopadding">   
                        <div class="play-bar" tabindex="0" role="slider" aria-label="Seek slider" aria-valuetext="00:00:00 of ' . $atts['duration'] . '" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1741"></div>             
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 right-side-bottom nopadding">
                <div class="row nopadding">
                    <div class="col-xs-3 bottom-controls duration nopadding">
                        <div class="row nopadding">
                            <div class="col-xs-4 nopadding prev-thirty center-block nzr-player__button-prev">
                                <a href="javascript:void[0];" id="back-thirty-player" role="button" tabindex="0" title="Rewind 30 Seconds" aria-label="Rewind 30 Seconds">
                                    30
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve" style="height:11px;width:auto;margin-top:1px;"><polyline fill="none" stroke="#337598" stroke-width="5" stroke-linecap="round" stroke-miterlimit="10" points="17.442,24.945 7.499,15 17.443,5.055 "></polyline><path fill="none" stroke="#337598" stroke-width="5" stroke-linecap="round" stroke-miterlimit="10" d="M38,44 c0,0,2.943-5.346,2.943-14c0-8.756-5.645-15-18-15C13.266,15,8,15,8,15"></path></svg>
                                </a>
                            </div>
                            <div class="col-xs-4 nopadding text-center">
                                <span class="elapsed">00:00:00</span> <span class="static-duration">/ ' . $atts['duration'] . '</span>
                            </div>
                            <div class="col-xs-4 nopadding skip-thirty center-block nzr-player__button-next">
                                <a href="javascript:void[0];" id="skip-thirty-player" role="button" tabindex="0" title="Skip Ahead 30 Seconds" aria-label="Skip Ahead 30 Seconds">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve" style="height:11px;width:auto;margin-top:1px;"><polyline fill="none" stroke="#337598" stroke-width="5" stroke-linecap="round" stroke-miterlimit="10" points="33,25 42.891,15 33,5 "></polyline><path fill="none" stroke="#337598" stroke-width="5" stroke-linecap="round" stroke-miterlimit="10" d="M12,44c0,0-3-5.346-3-14c0-8.756,5.644-15,18-15c9.677,0,14,0,14,0"></path></svg>
                                    30
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 bottom-controls connections nopadding">
                        <div class="col-xs-3 nopadding share" id="rss" data-div-open="rss-overlay">
                            <a href="javascript:void[0];" id="rss-player" role="button" tabindex="0" title="Subscribe to This Show">
                                <img src="//static.libsyn.com/p/assets/platform/customplayer/images/rss-sm.png" class="share-img" style="height:15px !important;" alt="Subscribe to This Show">
                            </a>
                        </div>
                        <div class="col-xs-3 nopadding share" id="download" style="opacity: 1;">
                            <a href="' . $atts['file'] . '" role="button" tabindex="0" title="Download This Episode" download="' . $mp3_file . '" target="_blank" onclick="event.stopPropagation();">
                                <img src="//static.libsyn.com/p/assets/platform/customplayer/images/download.png" class="share-img" alt="Download This Episode">
                            </a>
                        </div>
                        <div class="col-xs-3 nopadding share" id="embed" data-div-open="embed-overlay">
                            <a href="javascript:void[0];" id="embed-player" role="button" tabindex="0" title="Embed This Player">
                                <img src="//static.libsyn.com/p/assets/platform/customplayer/images/embed.png" class="share-img" alt="Embed This Player">
                            </a>
                        </div>
                        <div class="col-xs-3 nopadding share" id="share" data-div-open="share-overlay">
                            <a href="javascript:void[0];" id="share-player" role="button" tabindex="0" title="Share This Episode">
                                <img src="//static.libsyn.com/p/assets/platform/customplayer/images/share.png" class="share-img" style="max-height:22px !important;" alt="Share This Episode">
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-2 bottom-controls logo nopadding">
                        <a href="https://www.facebook.com/profile.php?id=100005095004749">Designed by Nazar Kalian</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';


    $content .= '
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/jquery@2.1.3/dist/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript" src="//cdn.embed.ly/player-0.0.12.min.js"></script>


<script>

var debug = false;
var ua = navigator.userAgent;
var isIosRequest = ((ua.indexOf(\'iPhone\') != -1 || ua.indexOf(\'iPad\') != -1 || ua.indexOf(\'iPod\') != -1));
var userHasPremiumAccess = false;
var premiumDownloadEnabled = false;
var useThumbnail = true;
var category = "";
var renderPlaylist = false;
var buttonColSize = 2;

var isEdge = window.navigator.userAgent.indexOf("Edge") > -1;
var isIE = window.navigator.userAgent.indexOf("MSIE ") > -1 || window.navigator.userAgent.indexOf("Trident") > -1;
if(debug) console.log("Edge: "+ isEdge +" / IE: "+ isIE);


var mode = "audio";
if(mode == "video"){
    var player = document.getElementById("video");
    if(!renderPlaylist){
        renderVideoMode();
    }
} else {
    var audioPlayer;
    var player = audioPlayer = new Audio();
}
player.preload = "none";

/***** BEGIN UTILITIES ***/

function convertTimeToSeconds(hms){
    var a = hms.split(\':\');
    var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]);
    return seconds;
}

function returnWidthPercent(elem){
    var pa= elem.offsetParent || elem;
    return ((elem.offsetWidth/pa.offsetWidth)*100).toFixed(2)+\'%\';
}

function returnSecondsToHms(d) {
    d = Number(d);
    var h = Math.floor(d / 3600);
    var m = Math.floor(d % 3600 / 60);
    var s = Math.floor(d % 3600 % 60);
    return (h < 10 ? "0" : "") + h + ":" + (m < 10 ? "0" : "") + m + ":" + (s < 10 ? "0" : "") + s;
}

//get items, add to playlist
function retrieveItems(){
//    $.ajax({
//      url: \'/embed/list/id/553385/offset/\' + offset + \'/size/\' + totalTracksToFillPlaylist + \'/sort_by_field/release_date/sort_by_direction/\' + sort + \'/category/\'+category + \'/no-cache/false\',
//      async: false,
//      success: function(data) {
//        if(data == false){
//            $(".nano").unbind("scrollend");
//        } else {
//            for(var i = 0; i < data.length; i++) {
//                if(origItem != data[i].item_id){
//                    data[i].duration_seconds = convertTimeToSeconds(data[i].duration);
//
//                    //need to do one quick ping for IOS, ping request will be deleted after one ping
//                    if(isIosRequest && !data[i].is_free && data[i].media_url != data[i].media_url_libsyn){
//                        data[i].prepend_ping = data[i].media_url.replace(\'libsyn.com/\', \'libsyn.com/libsyn-ping-only/true/\');
//                        data[i].media_url = data[i].media_url_libsyn;
//                    }
//
//                    addToPlaylist(data[i]);
//                }
//            }
//        }
//    }
//  });
//
//  offset = offset + totalTracksToFillPlaylist;
}

jQuery.fn.scrollTo = function(elem, speed) {
    if(renderPlaylist){
        $(this).animate({
          scrollTop:  $(this).scrollTop() - $(this).offset().top + $(elem).offset().top 
        }, speed == undefined ? 1000 : speed); 
      return this;
    }

};
/***** END UTILITIES ***/

/*** BEGIN INITALIZE PLAYER ***/  
var premium_access = false;
var currentTrack = 0;
var currentTimeStart = 0;

//stupid IE
var ua = window.navigator.userAgent;
var msie = ua.indexOf("MSIE ");
if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
    player.addEventListener(\'loadeddata\', function() {
        player.currentTime = 0;
        if(debug) console.log("Player to start at " + currentTimeStart + " seconds");
        player.removeEventListener(\'loadeddata\', arguments.callee);
    }, false);
} else {
    player.currentTime = 0;
}



if(debug) console.log("Player set to start at " + player.currentTime + " seconds");
var offset = 0;
var totalTracksToFillPlaylist = 10;
var sort = "DESC";
var playList = new Array();
var category = "";
var origItem = 5892401;
/*** END INITALIZE PLAYER ***/ 



function renderVideoMode(){
    mode = "video";
    $("#video").css({"width":"100%", "height":"100%"}).show();
  $(".player").css("height","100% !important");
  winHeight = window.innerHeight - 92;
  $(".thumbnail").css({"width":"100%","max-width":"100%","background":"#000"}).height(winHeight);
  $(".thumbnail-image").hide();
  $(".right-side").css("width","100%");
  $(".full-screen, .reset-view").show();
  $(".playlist").hide();
  document.querySelector(\'style\').textContent += "@media only screen and (max-width:1106px) { .right-side { width: 100%; }}";
  document.querySelector(\'style\').textContent += "@media only screen and (max-width: 410px) { .thumbnail { display:block; }}";
}

function renderAudioMode(){
    mode = "audio";
    $("#video, .full-screen, .reset-view").hide();
    $(".right-side").css("width","calc(100% - 90px)");
    $(".right-side").removeClass("col-xs-12").addClass("col-xs-11");
    $(".thumbnail").css({"height":"90px","max-width":"100%", "width":"90px"});
  $(".thumbnail").removeClass("col-xs-12").addClass("col-xs-1");     
  $(".thumbnail-image").show();
  $(".playlist").slideDown();
  document.querySelector("style").textContent += "@media only screen and (max-width: 410px) { .thumbnail { display:none; }}";
}

function updateDynamicContent(embedCode,download_link){

    //update embed code
    $("#embed-code-display").val(embedCode);

    //update download link
    if(playList[currentTrack].is_free || (!playList[currentTrack].is_free && userHasPremiumAccess && premiumDownloadEnabled)) {
        //free to download
        $("#download").css(\'opacity\',\'1\').unbind().on("click", function() {
            window.open(download_link,"_blank");
            return false;
        });

    } else {
        //item is premium, lock it down
        $("#download").unbind().on("click", function() {
            return false;
        });
        $("#download").unbind().css(\'opacity\',\'.30\');
    }
}

function updatePlayer(trackChanged){

    if(debug) console.log("Updating player to track " + currentTrack);

    var isVideo = playList[currentTrack].is_video;
    if(isVideo && mode == "audio"){
        player = document.getElementById("video");
        player.poster = playList[currentTrack].thumbnail_url;
    }
    else if(!isVideo && mode == "video"){
        player = audioPlayer;
    }

    if(!isEdge && !isIE){
        player.src = "' . $atts['file'] . '";
        if(debug) console.log("media loaded");
    }


    //if(debug) console.log(playList[currentTrack].media_url);
    currentDuration = playList[currentTrack].duration_seconds;

    if(trackChanged){
        //stupid IE
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            player.addEventListener(\'loadeddata\', function() {
                player.currentTime = 0;
                if(debug) console.log("Player to start at 0 seconds");
                player.removeEventListener(\'loadeddata\', arguments.callee);
            }, false);
        } else {
            player.currentTime = 0;
        }

      $(".sharethis-inline-share-buttons").attr({
          \'data-url\': "' . $atts['title'] . '",
          \'data-image\': playList[currentTrack].thumbnail_url,
          \'data-title\': "' . $atts['title'] . '"
      });


      //change the resource/subscribe buttons
      var subscribeButtons = playList[currentTrack].buttons;
      if(subscribeButtons !== undefined){
          for (var key in subscribeButtons) {

              if(subscribeButtons[key] !== null){
                  //if button has an href, update it or add it
                  if($("#"+key+"_button").length !== 0){
                      $("#"+key+"_button").attr(\'href\', subscribeButtons[key]);
                  } else {
                      var btnHtml = \'<div class="col-xs-\' + buttonColSize + \' text-center rss-col">\';
                      btnHtml += \'<a class="resource-button-link" id="\'+ key +\'_button" href="\' + subscribeButtons[key] + \'" target="_blank">\';
                      btnHtml += \'<img class="resource-button img-responsive" src="//static.libsyn.com/p/assets/platform/customplayer/images/\' + key +\'.png"></a>\';
                      btnHtml += \'</div>\';
                      $(".rss-row").append(btnHtml);

                  }
              } else {
                  //button is null, if the button is there, remove it
                  if($("#"+key+"_button").length !== 0){
                      $("#"+key+"_button").parent().remove();
                  }
              }
          }
      }

      /*

      <div class="col-xs-2 text-center rss-col">
            <a class="resource-button-link" id="rss_button" href="http://financialresidency.libsyn.com/rss" target="_blank"><img class="resource-button img-responsive" src="//static.libsyn.com/p/assets/platform/customplayer/images/rss.png"></a>
          </div>

      */

      if(debug) console.log("Resetting player to start at 0 seconds");
    } else {
        //player.currentTime = currentTimeStart;
        player.addEventListener(\'loadeddata\', function() {
            player.currentTime = currentTimeStart;
            if(debug) console.log("Player to start at " + currentTimeStart + " seconds");
            player.removeEventListener(\'loadeddata\', arguments.callee);
        }, false);

    }



    $(".thumbnail-image").attr("src", playList[currentTrack].thumbnail_url);
    $(".episode-title").html(playList[currentTrack].item_title);
    $(".static-duration").html("/ " + playList[currentTrack].duration);

    //move playlist along
    $(\'.playlist-item.current\').removeClass("current");
    itemTrack = $("#track"+currentTrack);
    itemTrack.addClass("current");
    $(".playlist-content").scrollTo(itemTrack, 1000);

    //update dynamic controls if we need to
    if(playList[currentTrack].embed_code == null || playList[currentTrack].permalink_url == null){

        var itemId = playList[currentTrack].item_id;
        $.ajax({
          url: \'/embed/getitemdetails\',
          type: "GET",
          data : {
            item_id : itemId,
            height : "90",
            direction : "backward",
            thumbnail : "1",
            theme : "custom",
            customcolor : "337598",
            renderplaylist : "false"
          },
          success: function(data) {
            //update the embed code
            
            data.download_link = "' . $mp3_file . '"
            updateDynamicContent(data.embed_code,data.download_link);
        }
      });

    } else {
        playList[currentTrack].download_link = "' . $mp3_file . '"
        updateDynamicContent(playList[currentTrack].embed_code,playList[currentTrack].download_link);
    }
}

function playPlayer(trackChanged){
    //remove overlay
    $(".dark-overlay").fadeOut();

    if(!playList[currentTrack]){
        currentTrack = 0;
    }

    if(player.src == ""){
        player.src = playList[currentTrack].media_url;
        if(debug) console.log("media loaded");
    }

    //if track has changed
    if(trackChanged){

        //pause the player
        pausePlayer();

        //check for premium
        if(!playList[currentTrack].is_free && !premium_access){
            //denied
            $("#denied-overlay").slideDown("fast");
            return false;
        }

        //update the player
        updatePlayer(trackChanged);

    }

    var isVideo = playList[currentTrack].is_video;
    if(isVideo && mode == "audio"){
        renderVideoMode();
    }
    else if(!isVideo && mode == "video"){
        renderAudioMode();
    }

    //play track
    player.play();
    $(".play").hide();
    $(".pause").show();
}

function pausePlayer() {
    currentTimeStart = player.currentTime;
    player.pause();
    $(".pause").hide();
    $(".play").show();
}

function addToPlaylist(item){
    if ( item.show_id == 255407 ) {
        item.thumbnail_url = \'https://ssl-static.libsyn.com/p/assets/9/f/8/a/9f8a8fc0cc940cd4/height_90_width_90_Podcast_Corona-update_VK.jpg\';
    }

    totalTracks = playList.length;
    newIndex = totalTracks;
    playList[newIndex] = item;
    var html = \'<div class="playlist-item \'+ (currentTrack == newIndex ? "current" : "") +\'" id="track\'+newIndex+\'" data-index="\'+newIndex+\'">\';
    html += \'<div class="playlist-item-thumb">\';
    html += \'<img src="\'+ item.thumbnail_url +\'"></div>\';
    if(!item.is_free && !premium_access){
        html += \'<div class="playlist-item-status denied"></div>\';
    } else {
        html += \'<div class="playlist-item-status standby"></div>\';
    }

    html += \'<div class="playlist-item-info">\';
    html += \'<div class="playlist-item-title">\'+item.item_title+\'</div>\';
    html += \'<div class="playlist-item-duration">\'+item.duration +\'</div>\';
    html += \'<div class="playlist-item-date">\'+item.release_date;
    html += \'<div class="playlist-item-info-link" data-item-id="\'+item.item_id +\'">\';
    html += \'</div></div></div></div>\';
    html += \'<div id="desc-\'+item.item_id+\'" class="playlist-item-desc">No description found</div>\';

    $(".playlist-content").append(html);
}

$(function() {

    window.parent.postMessage(JSON.stringify({ 
    src: window.location.toString(), 
    context: \'iframe.resize\', 
    height: 90 // pixels
  }), \'*\')
  
  /***** ADD INITAL TRACK ***********/
  var playlistItem = {"item_id":5892401,"item_title":"' . $atts['title'] . '","item_subtitle":"","duration":"' . $atts['duration'] . '","media_url":"' . $atts['file'] . '","media_url_libsyn":"' . $atts['file'] . '","download_link":"' . $mp3_file . '","permalink_url":"' . $atts['file'] . '","embed_code":"<iframe style=\"border: none\" src=\"\/\/html5-player.libsyn.com\/embed\/episode\/id\/5892401\/height\/90\/theme\/custom\/thumbnail\/yes\/direction\/backward\/render-playlist\/no\/custom-color\/337598\/\" height=\"90\" width=\"100%\" scrolling=\"no\"  allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen><\/iframe>","media_type":"mp3","release_date":"Oct 30, 2017","thumbnail_url":"' . $atts['img'] . '","is_video":false,"is_free":true};
  // have to add duration in seconds
  playlistItem.duration_seconds = convertTimeToSeconds("' . $atts['duration'] . '");
  currentDuration = playlistItem.duration_seconds;
  addToPlaylist(playlistItem);
  updatePlayer(false);
  /***** END ADD INITAL TRACK ***********/


  /***** BEGIN EVENT LISTENERS ***********/
  $(".play").on("click", function() {
      playPlayer(false);
      $("#pause-player").focus();
  });

  $(".pause").on("click", function() {
      pausePlayer(false);
      $("#play-player").focus();
  });

  $(".seek-bar").on("click", function(e) {

      // to get part of width of progress bar clicked
      var widthclicked = e.pageX - $(this).offset().left.toFixed();
      var curSeekWidth = $(this).width();
      var seekPercentage = ((widthclicked / curSeekWidth) * 100).toFixed();
      var curDuration = playList[currentTrack].duration_seconds;
      var audioSeekInSeconds = ((seekPercentage / 100) * curDuration).toFixed();

      $(".play-bar").width(seekPercentage + "%");
      currentTimeStart = audioSeekInSeconds;
      player.currentTime = currentTimeStart;
      playPlayer(false);
      if(debug) console.log("seek bar clicked");
  });

  $(".skip-thirty").on("click", function(e) {
      var curTime = player.currentTime;
      currentTimeStart = curTime + 30;
      player.currentTime = currentTimeStart;
      playPlayer(false);
  });

  $(".prev-thirty").on("click", function(e) {
      var curTime = player.currentTime;
      currentTimeStart = curTime - 30;
      player.currentTime = currentTimeStart;
      playPlayer(false);
  });

  $(".skip").on("click", function(e) {
      currentTrack = currentTrack + 1;
      playPlayer(true);
  });

  $(".prev").on("click", function(e) {
      currentTrack = currentTrack - 1;
      playPlayer(true);
  });

  $(".full-screen").on("click", function() {
      if (player.requestFullscreen) {
          player.requestFullscreen();
      } else if (player.mozRequestFullScreen) {
          player.mozRequestFullScreen();
      } else if (player.webkitRequestFullscreen) {
          player.webkitRequestFullscreen();
      } else if (player.webkitEnterFullScreen) {
          player.webkitEnterFullScreen();
      }
  });

  $(".reset-view").on("click", function() {
      pausePlayer();
      renderAudioMode();
  });

  player.onwaiting = function() {
      $(".loading").show();
      if(debug) console.log("waiting");
  };

  player.onplaying = function() {
      $(".loading").hide();
      if(debug) console.log("playing");
  };
  player.onpause = function(event) {
      event.preventDefault();
      pausePlayer();
      if(debug) console.log("paused");
  };
  player.onseeking = function() {
      $(".loading").show();
      if(debug) console.log("seeking");
  };
  player.onseeked = function() {
      $(".loading").hide();
      if(debug) console.log("done seeking");
  };
  player.ontimeupdate = function() {
      var curTime = Math.ceil(this.currentTime);
      var seekPercentage = ((curTime / currentDuration) * 100);
      //if(debug) console.log(curTime + " / " +currentDuration+ " = "+ seekPercentage);
      $(".play-bar").width(seekPercentage + "%");
      $(".play-bar").attr(\'aria-valuenow\',Math.ceil(curTime));
      var timeElapsed = returnSecondsToHms(Math.ceil(curTime));
      $(".play-bar").attr(\'aria-valuetext\',timeElapsed + " of ' . $atts['duration'] . '");
      $(".elapsed").html(timeElapsed);
      parent.postMessage(timeElapsed,\'*\');
  };

  player.onended = function() {
      if(renderPlaylist){
          currentTrack = currentTrack + 1;
          playPlayer(true);
      }
  };

  $("#video").on("timeupdate", function(e) {
      var curTime = Math.ceil(this.currentTime);
      var seekPercentage = ((curTime / currentDuration) * 100);
      //console.log(curTime + " / " +currentDuration+ " = "+ seekPercentage);
      $(".play-bar").width(seekPercentage + "%");
      $(".play-bar").attr(\'aria-valuenow\',Math.ceil(curTime));
      var timeElapsed = returnSecondsToHms(Math.ceil(curTime));
      $(".play-bar").attr(\'aria-valuetext\',timeElapsed + " of ' . $atts['duration'] . '");
      $(".elapsed").html(timeElapsed);
  });

  $("#video").on("click", function(e) {
      if(debug) console.log("video clicked");
      if(this.paused) {
          if(debug) console.log("video WAS paused");
          $(".play").trigger("click");
          if(debug) console.log("video now playing");
      } else {
          if(debug) console.log("video WAS playing");
          $(".pause").trigger("click");
          if(debug) console.log("video now paused");
      }
  });


  /****** END EVENT LISTENERS ***********/

 /***** BEGIN OVERLAYS/POPUPS LISTENERS ***********/
 $(".close-overlay").on( "click", function() {
     $(".dark-overlay").slideUp();
 });

  var shareThisLoaded = false;
  var carouselLoaded = false;
  $("#share, #rss, #embed").on("click", function() {

      button = $(this);

      var shareThisLoaded = false;
      if(button.attr("id") == "share"){
          if(!shareThisLoaded){
              var stscript = document.createElement(\'script\');
              stscript.setAttribute(\'type\', \'text/javascript\');
              stscript.setAttribute(\'src\', \'//platform-api.sharethis.com/js/sharethis.js#property=59cd45ccfeebe0001600e94e&product=inline-share-buttons\');
              document.head.appendChild(stscript);
              shareThisLoaded = true;
          }
      }



      var overlayDiv = $(this).data(\'div-open\');
      $("#"+overlayDiv).slideDown(200, function() {
          if(button.attr("id") == "rss"){
              $(\'.jcarousel\').jcarousel(\'reload\', {
              animation: \'fast\'
          });
        }
      });
  });


  /***** END OVERLAYS/POPUPS LISTENERS ***********/

  /**************PLAYLIST ACTIONS *********/
  
  if(renderPlaylist){

      var playListHeight = $(".playlist").height();
      var trackHeight = 50;
      totalTracksToFillPlaylist = Math.ceil(playListHeight/trackHeight) + 1;

      //add initial media into playlist
      retrieveItems();

      //add playlist event listeners
      $(document.body).on(\'click\', \'.playlist-item-info-link\' ,function(){
          var itemId = $(this).data(\'item-id\');
          //load description if necessary
          var curDesc = $("#desc-"+itemId).html();
          if(curDesc == "No description found"){
              $.ajax({
          url: \'/embed/getitemdetails\',
          type: "GET",
          data : {
                  item_id : itemId
          },
          success: function(data) {
                  if (data.item_body != \'\') {
                      var itemDesc = data.item_body.replace("<p></p>", "");
                      $("#desc-"+itemId).html(itemDesc).find(\'a\').each(function(){
                          $(this).attr("target", "_blank");
                      });
                  }
              }
        });
      }
          $(this).toggleClass("active");
          $("#desc-"+itemId).slideToggle("fast");
          $(".playlist-content").scrollTo($(this), 1000);
      });

      $(document.body).on(\'click\', \'.playlist-item-thumb, .playlist-item-status, .playlist-item-title\' ,function(){
          var itemTrack = $(this).closest(\'.playlist-item\');
          var selectedTrackIndex = itemTrack.data(\'index\');
          currentTrack = selectedTrackIndex;
          playPlayer(true);
      });

      $(".nano").on("scrollend", function(e){
          $(".spinner").fadeIn();
          retrieveItems();
          $(".spinner").fadeOut();
      });
  }
  /**************************************/

  $(".resource-button-link").on("click", function(event) {
      event.preventDefault();
      var href = $(this).attr("href");
      window.open(href);
  });  
});

if(renderPlaylist){
    $(window).load(function(){
        $(".nano").nanoScroller({ alwaysVisible: true, preventPageScrolling: true});
  });
}

$(document).keydown(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == \'13\' || keycode == \'32\'){
        var activeElementId = $(document.activeElement).context.id;
        switch(activeElementId){
            case "play-player":
                playPlayer();
                $("#pause-player").focus();
                break;
            case "pause-player":
                pausePlayer();
                $("#play-player").focus();
                break;
            case "back-player":
                $(".prev").trigger("click");
                break;
            case "skip-player":
                $(".skip").trigger("click");
                break;
            case "back-thirty-player":
                $(".prev-thirty").trigger("click");
                break;
            case "skip-thirty-player":
                $(".skip-thirty").trigger("click");
                break;
            default:
                // spacebar to play/pause when not on specific control
                if(keycode == \'32\'){
                    if(player.paused){
                        playPlayer();
                    } else {
                        pausePlayer();
                    }
                }
        }

        // prevent the autoscroll thing some browsers do. this is a player.
        if(keycode == \'32\'){
            event.preventDefault();
        }
    }
});

/*embed.ly reciever */
if( typeof playerjs != "undefined" ) {
    var adapter = playerjs.HTML5Adapter(player);
    adapter.ready();
}

/*time elapsed request*/
function receiveMessage(e) {
    if(e.data == "player_status_request"){
        var curTime = Math.ceil(player.currentTime);
        var timeElapsed = returnSecondsToHms(Math.ceil(curTime));
        var playerDataArr = {\'elapsed\':timeElapsed};
    e.source.postMessage(JSON.stringify(playerDataArr), \'*\');
  }
}

window.addEventListener(\'message\', receiveMessage);
</script>';

    return $content;
}

add_shortcode('nzr_player', 'nzr_custom_player');