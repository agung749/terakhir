<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">
	<title>SMK PLUS ASHABULYAMIN</title>
	<link rel="icon" href="/images/logo" type="image/png">
	<meta name="keywords" content="SMK PLUS ASHABULYAMIN">
	<meta name="description" content="SMK PLUS ASHABULYAMIN adalah sekolah berbasikan agama namun tetap up to date dalam dunia Informatika . Menciptakan lulusan-lulusan unggul dalam dunia IT">
	<link
		href='http://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,400italic,600,300italic,300|Oswald:400,300,700'
		rel='stylesheet' type='text/css'>
	<!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link href="/css/owl.carousel.css" rel="stylesheet">
	<link href="/css/owl.theme.css" rel="stylesheet">
	<link href="/css/owl.transitions.css" rel="stylesheet">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <link href='js/main.css' rel='stylesheet' />
    <script src='js/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>

    <script>
        // fungsi initialize untuk mempersiapkan peta
        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-6.8266726,107.1477404),
            zoom:9,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        }

        // event jendela di-load  
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="/js/html5shiv.min.js"></script>
		<script src="/js/respond.min.js"></script>
		<![endif]-->
</head>

<body data-spy="scroll" data-target=".main-nav">
	<style>
		/*
 * Sept - Free Bootstrap 3 Theme/Landing page
 * Author: CantoThemes
 * Author URL: https://www.cantothemes.com/
 * License: Attribution-NonCommercial CC BY-NC 
 * License URL: https://creativecommons.org/licenses/by-nc/4.0/
 * 
 * -------------------------------------------------------------------
 * This theme under "Attribution-NonCommercial CC BY-NC". You can't remove footer credit link.
 */
body {
  font-family: "Open Sans";
  color: #808080;
  font-weight: 400;
  font-size: 14px;
  line-height: 26px;
  word-spacing: 2px;
  -webkit-font-smoothing: antialiased;
}
p {
  margin-bottom: 26px;
}
a {
  color: #668866;
  text-decoration: none !important;
  -webkit-transition: color 0.3s;
          transition: color 0.3s;
}
a:hover {
  color: #4c4c4c;
}
h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Oswald";
  color: #4c4c4c;
  letter-spacing: 1px;
  font-weight: 400;
}
.form-control {
  border-radius: 2px !important;
  padding: 15px 20px !important;
  height: auto;
  border-color: #e5e5e5 !important;
  box-shadow: none !important;
}
.form-control:focus {
  border-color: #668866 !important;
}
.mb250 {
  margin-bottom: 250px !important;
}
.mb245 {
  margin-bottom: 245px !important;
}
.mb240 {
  margin-bottom: 240px !important;
}
.mb235 {
  margin-bottom: 235px !important;
}
.mb230 {
  margin-bottom: 230px !important;
}
.mb225 {
  margin-bottom: 225px !important;
}
.mb220 {
  margin-bottom: 220px !important;
}
.mb215 {
  margin-bottom: 215px !important;
}
.mb210 {
  margin-bottom: 210px !important;
}
.mb205 {
  margin-bottom: 205px !important;
}
.mb200 {
  margin-bottom: 200px !important;
}
.mb195 {
  margin-bottom: 195px !important;
}
.mb190 {
  margin-bottom: 190px !important;
}
.mb185 {
  margin-bottom: 185px !important;
}
.mb180 {
  margin-bottom: 180px !important;
}
.mb175 {
  margin-bottom: 175px !important;
}
.mb170 {
  margin-bottom: 170px !important;
}
.mb165 {
  margin-bottom: 165px !important;
}
.mb160 {
  margin-bottom: 160px !important;
}
.mb155 {
  margin-bottom: 155px !important;
}
.mb150 {
  margin-bottom: 150px !important;
}
.mb145 {
  margin-bottom: 145px !important;
}
.mb140 {
  margin-bottom: 140px !important;
}
.mb135 {
  margin-bottom: 135px !important;
}
.mb130 {
  margin-bottom: 130px !important;
}
.mb125 {
  margin-bottom: 125px !important;
}
.mb120 {
  margin-bottom: 120px !important;
}
.mb115 {
  margin-bottom: 115px !important;
}
.mb110 {
  margin-bottom: 110px !important;
}
.mb105 {
  margin-bottom: 105px !important;
}
.mb100 {
  margin-bottom: 100px !important;
}
.mb95 {
  margin-bottom: 95px !important;
}
.mb90 {
  margin-bottom: 90px !important;
}
.mb85 {
  margin-bottom: 85px !important;
}
.mb80 {
  margin-bottom: 80px !important;
}
.mb75 {
  margin-bottom: 75px !important;
}
.mb70 {
  margin-bottom: 70px !important;
}
.mb65 {
  margin-bottom: 65px !important;
}
.mb60 {
  margin-bottom: 60px !important;
}
.mb55 {
  margin-bottom: 55px !important;
}
.mb50 {
  margin-bottom: 50px !important;
}
.mb45 {
  margin-bottom: 45px !important;
}
.mb40 {
  margin-bottom: 40px !important;
}
.mb35 {
  margin-bottom: 35px !important;
}
.mb30 {
  margin-bottom: 30px !important;
}
.mb25 {
  margin-bottom: 25px !important;
}
.mb20 {
  margin-bottom: 20px !important;
}
.mb15 {
  margin-bottom: 15px !important;
}
.mb10 {
  margin-bottom: 10px !important;
}
.mb5 {
  margin-bottom: 5px !important;
}
.no-padding {
  padding: 0 !important;
}
.float-nan {
  float: none;
}
.img-responsive {
  display: inline-block;
  *display: inline;
  *zoom: 1;
}
.btn {
  font-family: "Oswald";
  font-size: 16px;
  letter-spacing: 1px;
  border-radius: 40px;
  padding: 8px 30px;
  margin-bottom: 5px;
  -webkit-transition: color 0.3s, background-color 0.3s, border-color 0.3s;
          transition: color 0.3s, background-color 0.3s, border-color 0.3s;
}
.btn.btn-lg {
  padding: 10px 35px;
  letter-spacing: 2px;
  font-size: 21px;
}
.btn.btn-sm {
  padding: 7px 20px;
  font-size: 14px;
}
.btn.btn-xs {
  padding: 5px 15px;
  font-size: 12px;
}
.btn-default {
  color: #676767;
  border-color: #e5e5e5;
}
.btn-default:hover {
  color: #fff;
  background-color: #668866;
  border-color: #668866;
}
.btn-default-o {
  color: #f2f2f2;
  border-color: #f2f2f2;
  background-color: transparent;
}
.btn-default-o:hover {
  color: #668866;
  background-color: #fff;
  border-color: #fff;
}
.btn-main-o {
  color: #668866;
  border-color: #668866;
  background-color: transparent;
}
.btn-main-o:hover {
  color: #fff;
  background-color: #668866;
  border-color: #668866;
}
.btn-dark-o {
  color: #4c4c4c;
  border-color: #4c4c4c;
  background-color: transparent;
}
.btn-dark-o:hover {
  color: #fff;
  background-color: #4c4c4c;
  border-color: #4c4c4c;
}
.btn-dark {
  color: #fff;
  background-color: #4c4c4c;
  border-color: #4c4c4c;
}
.btn-dark:hover,
.btn-dark:focus,
.btn-dark:active {
  background-color: #333333;
  border-color: #333333;
  color: #fff;
}
.btn-main {
  color: #fff;
  background-color: #668866;
  border-color: #668866;
}
.btn-main:hover,
.btn-main:focus,
.btn-main:active {
  background-color: #33b5ac;
  border-color: #33b5ac;
  color: #fff;
}
.btn-link {
  font-weight: 400;
  color: #668866;
}
.btn-link:hover,
.btn-link:focus,
.btn-link:active {
  color: #4c4c4c;
  text-decoration: none;
}
.section-title {
  margin-bottom: 70px;
}
.section-title h3 {
  font-family: "Oswald";
  text-transform: uppercase;
  color: #4c4c4c;
  font-weight: 400;
  letter-spacing: 2px;
  font-size: 28px;
  line-height: 48px;
  display: inline-block;
  *display: inline;
  *zoom: 1;
  clear: both;
  position: relative;
  padding: 0 10px;
}
.section-title p {
  font-family: "Oswald";
  text-transform: uppercase;
  color: #668866;
  font-size: 38px;
  line-height: 58px;
  font-weight: 700;
  letter-spacing: 3px;
}
.section-title.st-center {
  text-align: center;
}
.section-title.st-center:before {
  margin: auto;
}
.section-title:before {
  content: "";
  display: block;
  width: 150px;
  height: 51px;
  background-image: url(../images/title-top.png);
  background-repeat: no-repeat;
}
.bottom-line {
  margin-bottom: 20px;
}
.bottom-line:after {
  content: "";
  display: block;
  width: 50px;
  height: 2px;
  background-color: #668866;
  margin-top: 5px;
}
.tooltip.top .tooltip-arrow {
  bottom: 1px;
}
.tac {
  text-align: center;
}
.nicescroll-rails {
  background: rgba(0, 0, 0, 0.1);
  width: 5px;
  z-index: 9999 !important;
}
.nicescroll-rails:hover {
  opacity: 1 !important;
}
.nicescroll-rails > div {
  background: #668866 !important;
}
/* ---------------------------------------------- /*
 * Mouse animate icon
/* ---------------------------------------------- */
.mouse-icon {
  position: absolute;
  left: 50%;
  bottom: 40px;
  border: 2px solid #fff;
  border-radius: 16px;
  height: 40px;
  width: 24px;
  margin-left: -15px;
  display: block;
  z-index: 10;
  opacity: 0.7;
}
.mouse-icon .wheel {
  -webkit-animation-name: drop;
  -webkit-animation-duration: 1s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-delay: 0s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-play-state: running;
  -webkit-animation-name: drop;
          animation-name: drop;
  -webkit-animation-duration: 1s;
          animation-duration: 1s;
  -webkit-animation-timing-function: linear;
          animation-timing-function: linear;
  -webkit-animation-delay: 0s;
          animation-delay: 0s;
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-play-state: running;
          animation-play-state: running;
}
.mouse-icon .wheel {
  position: relative;
  border-radius: 10px;
  background: #fff;
  width: 2px;
  height: 6px;
  top: 4px;
  margin-left: auto;
  margin-right: auto;
}
@-webkit-keyframes drop {
  0% {
    top: 5px;
    opacity: 0;
  }
  30% {
    top: 10px;
    opacity: 1;
  }
  100% {
    top: 25px;
    opacity: 0;
  }
}
@keyframes drop {
  0% {
    top: 5px;
    opacity: 0;
  }
  30% {
    top: 10px;
    opacity: 1;
  }
  100% {
    top: 25px;
    opacity: 0;
  }
}
.home {
  background-image: url(../images/kmpsB.png);
  background-position: top center;
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-size: cover;
  background-color: #000;
  padding: 100px 0;
  position: relative
  /* Temp CSS */
  /* Temp CSS End */
}
.home .st-brand {
  text-align: center;
  margin-bottom: 50px;
}
.home .st-home-unit {
  position: relative;
}
.home .hero-txt {
  color: #fff;
  text-align: center;
}
.home .hero-txt .hero-title {
  font-family: "Oswald";
  color: #fff;
  text-transform: uppercase;
  font-size: 70px;
  line-height: 85px;
  font-weight: 400;
  letter-spacing: 8px;
  word-spacing: 4px;
  margin-bottom: 15px;
  margin-top: 5px;
  padding: 20px 10px;
}
.home .hero-txt .hero-work {
  font-family: "Oswald";
  font-weight: 300;
  letter-spacing: 2px;
  margin-bottom: 0;
}
.home .hero-txt .hero-work:after {
  content: "";
  display: block;
  width: 200px;
  height: 4px;
  margin: 20px auto 0;
  background-color: transparent;
  border-width: 1px 0;
  border-style: solid;
  border-color: rgba(255, 255, 255, 0.3);
}
.home .hero-txt a.btn {
  text-transform: uppercase;
}
.home .hero-txt a.btn.left-btn {
  margin-right: 20px !important;
}
.home .hero-txt .hero-sub-title {
  font-family: "Oswald";
  font-size: 30px;
  letter-spacing: 5px;
  font-weight: 300;
  margin-bottom: 70px;
}
.home .hero-txt .hero-img {
  margin-top: 80px;
}
.st-highlight {
  color: #668866;
}
.navbar-default {
  background-color: transparent;
  border-width: 0;
  margin-bottom: 0 !important;
  height: 102px;
  -webkit-transition: background-color 0.3s, height 0.3s;
          transition: background-color 0.3s, height 0.3s;
}
.st-navbar-mini .navbar-default {
  background-color: rgba(40, 40, 40, 0.95);
  height: 60px;
}
.st-navbar-mini .navbar-default .navbar-brand {
  padding: 15px 15px;
}
.st-navbar-mini .navbar-default .navbar-brand img {
  height: 30px;
}
.st-navbar-mini .navbar-default .navbar-nav > li.active > a,
.st-navbar-mini .navbar-default .navbar-nav > li.active a:hover,
.st-navbar-mini .navbar-default .navbar-nav > li.active a:focus,
.st-navbar-mini .navbar-default .navbar-nav > li.active a:active {
  background-color: rgba(0, 0, 0, 0);
}
.navbar-brand {
  height: auto;
  padding: 27px 15px;
  -webkit-transition: padding 0.3s;
          transition: padding 0.3s;
}
.navbar-brand img {
  height: 48px;
  -webkit-transition: height 0.3s;
          transition: height 0.3s;
}
.navbar-nav > li > a {
  font-family: "Oswald";
  font-size: 15px;
  font-weight: 300;
  letter-spacing: 1px;
  padding-left: 20px;
  padding-right: 20px;
  color: #fff;
 
  -webkit-transition: color 0.3s, background-color 0.3s, padding 0.3s;
          transition: color 0.3s, background-color 0.3s, padding 0.3s;
}
.navbar-nav > li > a:hover,
.navbar-nav > li > a:focus,
.navbar-nav > li > a:active {
 
  color: #668866;
  outline-width: 0;
}
.navbar-nav > li.active > a,
.navbar-nav > li.active a:hover,
.navbar-nav > li.active a:focus,
.navbar-nav > li.active a:active {
  color: #237523;
}
@media  only screen and (min-width:901px) {
  .navbar-default .navbar-nav > li  {
  background: transparent;
  }
  .grid figure {
  position: relative;
  float: left;
  overflow: hidden;
  background: #000;
  text-align: center;
  cursor: pointer;
  width: 33.33333333%;
  box-sizing: border-box;
}
.grid figure img {
  position: relative;
  display: block;
  min-height: 100%;
  max-width: 100%;
  opacity: 1;
  -webkit-transition: opacity 0.3s, -webkit-transform 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
          transition: opacity 0.3s, transform 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
}
.grid figure figcaption {
  color: #fff;
  text-transform: uppercase;
  font-size: 1.25em;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
}
.grid figure figcaption > a {
  z-index: 1000;
  position: absolute;
  right: 50%;
  bottom: 50px;
  margin-right: -67px;
  opacity: 0;
  -webkit-transform: translate3d(0, 60px, 0);
          transform: translate3d(0, 60px, 0);
  -webkit-transition: -webkit-transform 0.35s, opacity 0.35s;
          transition: transform 0.35s, opacity 0.35s;
}
.grid 
}
@media  only screen and (max-width:900px) {
  .navbar-default .navbar-nav > li  {
  background: rgba(40, 40, 40, 0.95);
  }
  .grid figure {
  position: relative;
  float: left;
  overflow: hidden;
  background: #000;
  text-align: center;
  cursor: pointer;
  width: 50%;
  box-sizing: border-box;
}
.grid figure img {
  position: relative;
  display: block;
  min-height: 100%;
  max-width: 100%;
  opacity: 1;
  -webkit-transition: opacity 0.3s, -webkit-transform 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
          transition: opacity 0.3s, transform 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
}
.grid figure figcaption {
  color: #fff;
  text-transform: uppercase;
  font-size: 1.25em;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
}
.grid figure figcaption h2 {
  color: #fff;
  text-transform: uppercase;
  font-size: 10px;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
}
.grid figure figcaption > a {
  z-index: 1000;
  position: absolute;
  right: 50%;
  bottom: 50px;
  margin-right: -67px;
  opacity: 0;
  -webkit-transform: translate3d(0, 60px, 0);
          transform: translate3d(0, 60px, 0);
  -webkit-transition: -webkit-transform 0.35s, opacity 0.35s;
          transition: transform 0.35s, opacity 0.35s;
}
.grid 
  .home .hero-txt .hero-title {
    font-family: "Oswald";
    color: #fff;
    text-transform: uppercase;
    font-size: 20px;
    line-height: 85px;
    font-weight: 400;
    letter-spacing: 8px;
    word-spacing: 4px;
    margin-bottom: 15px;
    margin-top: 5px;
    padding: 20px 10px;
  }
  h3{
    font-size:16px
  }
  .col-xs-3{
    margin: 3%;
  }
}
.navbar-default .navbar-nav > li > a {
  
  color: #fff;
}
.navbar-default .navbar-nav > li.active > a,
.navbar-default .navbar-nav > li.active a:hover,
.navbar-default .navbar-nav > li.active a:focus,
.navbar-default .navbar-nav > li.active a:active {
  color: #668866;
  background-color: rgba(0, 0, 0, 0.4);
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  background-color: #000;
  color: #668866;
}
.page-header {
  background-image: url(../images/hero-img14.png);
  background-position: top center;
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-size: cover;
  background-color: #000;
  padding: 150px 0 100px;
  margin: 0;
  border-width: 0;
}
.page-header .page-title {
  color: #fff;
  text-transform: uppercase;
  font-size: 35px;
  line-height: 55px;
  letter-spacing: 5px;
  word-spacing: 4px;
}
.page-breadcrumb {
  background-color: #f7f7f7;
  background-color: #668866;
  color: #fff;
  box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.01);
  border-botom: 1px solid #f2f2f2;
  padding: 20px 0;
}
.page-breadcrumb .breadcrumb {
  background-color: transparent;
  border-width: 0;
  border-radius: 0;
  margin-bottom: 0;
  color: #fff;
}
.page-breadcrumb .breadcrumb .active,
.page-breadcrumb .breadcrumb > li + li:before {
  color: #fff;
}
.page-breadcrumb .breadcrumb a {
  color: #fff;
}
.page-content {
  padding: 120px 0;
}
.about {
  padding: 100px 0 0;
}
.st-member {
  position: relative;
  overflow: hidden;
}
.st-member .st-member-info {
  width: 100%;
  height: 100%;
  padding: 70px 35px;
  position: absolute;
  top: 0;
  left: 0;
  text-align: center;
  background-color: rgba(254, 254, 254, 0.95);
  opacity: 0;
  -webkit-transform: scale(1);
      -ms-transform: scale(1);
          transform: scale(1);
  -webkit-transition: opacity 0.5s, -webkit-transform 0.5s;
          transition: opacity 0.5s, transform 0.5s;
}
.st-member .st-member-info .progress-bar {
  -webkit-transform-origin: left;
      -ms-transform-origin: left;
          transform-origin: left;
  -webkit-transform: scaleX(0);
      -ms-transform: scaleX(0);
          transform: scaleX(0);
  -webkit-transition: -webkit-transform 0.5s ease 0.2s;
          transition: transform 0.5s ease 0.2s;
}
.st-member .st-member-info .st-member-name {
  font-family: "Oswald";
  display: block;
  color: #4c4c4c;
  font-size: 30px;
  line-height: 50px;
  font-weight: 400;
  letter-spacing: 3px;
  margin-bottom: 20px;
}
.st-member .st-member-info .st-member-name:after {
  content: '';
  display: block;
  height: 2px;
  width: 35px;
  background-color: #668866;
  margin: 0 auto;
}
.st-member .st-member-info .st-member-pos {
  display: block;
  font-family: "Oswald";
  font-size: 20px;
  line-height: 18px;
  font-weight: 300;
  letter-spacing: 3px;
  font-style: italic;
  margin-bottom: 40px;
}
.st-member .st-member-info .st-member-social {
  position: absolute;
  width: 100%;
  left: 0;
  bottom: 70px;
}
.st-member .st-member-info .st-member-social ul {
  margin: 0;
  padding: 0;
}
.st-member .st-member-info .st-member-social ul li {
  display: inline-block;
  *display: inline;
  *zoom: 1;
  margin: 0;
  padding: 0;
}
.st-member .st-member-info .st-member-social ul li a {
  display: block;
  width: 70px;
  line-height: 40px;
  text-align: center;
  font-size: 20px;
  color: #fff;
  border-radius: 30px;
  background-color: rgba(0, 0, 0, 0.7);
  opacity: 0;
  -webkit-transform: translateY(100px);
      -ms-transform: translateY(100px);
          transform: translateY(100px);
  -webkit-transition: background-color 0.3s, opacity 0.3s ease, -webkit-transform 0.5s ease;
          transition: background-color 0.3s, opacity 0.3s ease, transform 0.5s ease;
}
.st-member .st-member-info .st-member-social ul li a.facebook:hover {
  background-color: #3c5b9b;
}
.st-member .st-member-info .st-member-social ul li a.twitter:hover {
  background-color: #2daae1;
}
.st-member .st-member-info .st-member-social ul li a.dribbble:hover {
  background-color: #ea4c88;
}
.st-member:hover {
  cursor: pointer;
}
.st-member:hover .st-member-info {
  opacity: 1;
  -webkit-transform: scale(1);
      -ms-transform: scale(1);
          transform: scale(1);
}
.st-member:hover .st-member-info .st-member-social ul li a {
  opacity: 1;
  -webkit-transform: translateY(0);
      -ms-transform: translateY(0);
          transform: translateY(0);
}
.st-member:hover .st-member-info .st-member-social ul li a.facebook {
  -webkit-transition: background-color 0.3s, opacity 0.3s ease 0.2s, -webkit-transform 0.5s ease 0.2s;
          transition: background-color 0.3s, opacity 0.3s ease 0.2s, transform 0.5s ease 0.2s;
}
.st-member:hover .st-member-info .st-member-social ul li a.facebook:hover {
  background-color: #3c5b9b;
}
.st-member:hover .st-member-info .st-member-social ul li a.twitter {
  -webkit-transition: background-color 0.3s, opacity 0.3s ease 0.3s, -webkit-transform 0.5s ease 0.3s;
          transition: background-color 0.3s, opacity 0.3s ease 0.3s, transform 0.5s ease 0.3s;
}
.st-member:hover .st-member-info .st-member-social ul li a.twitter:hover {
  background-color: #2daae1;
}
.st-member:hover .st-member-info .st-member-social ul li a.dribbble {
  -webkit-transition: background-color 0.3s, opacity 0.3s ease 0.4s, -webkit-transform 0.5s ease 0.4s;
          transition: background-color 0.3s, opacity 0.3s ease 0.4s, transform 0.5s ease 0.4s;
}
.st-member:hover .st-member-info .st-member-social ul li a.dribbble:hover {
  background-color: #ea4c88;
}
.st-member:hover .st-member-info .skills .skill:nth-child(2) .progress-bar {
  -webkit-transition-delay: 0.3s;
          transition-delay: 0.3s;
}
.st-member:hover .st-member-info .skills .skill:nth-child(3) .progress-bar {
  -webkit-transition-delay: 0.4s;
          transition-delay: 0.4s;
}
.st-member:hover .st-member-info .skills .skill:nth-child(4) .progress-bar {
  -webkit-transition-delay: 0.5s;
          transition-delay: 0.5s;
}
.st-member:hover .st-member-info .skills .skill:nth-child(5) .progress-bar {
  -webkit-transition-delay: 0.6s;
          transition-delay: 0.6s;
}
.st-member:hover .progress-bar {
  -webkit-transform: scaleX(1);
      -ms-transform: scaleX(1);
          transform: scaleX(1);
}
.skill {
  text-align: left;
}
.skill strong {
  font-weight: 400;
}
.skill span {
  float: right;
}
.progress {
  height: 11px;
  padding: 0 3px;
  background-color: transparent;
  border: 1px solid #ededed;
  border-radius: 6px;
  box-shadow: none;
}
.progress-bar {
  height: 3px;
  margin-top: 3px;
  border-radius: 2px;
  position: relative;
  box-shadow: none;
  -webkit-transform-origin: left;
      -ms-transform-origin: left;
          transform-origin: left;
  -webkit-animation-name: process;
          animation-name: process;
  -webkit-animation-duration: 1s;
          animation-duration: 1s;
  -webkit-animation-timing-function: linear;
          animation-timing-function: linear;
  -webkit-animation-delay: 0.2s;
          animation-delay: 0.2s;
}
.progress-bar-sept {
  background-color: #668866;
}
@-webkit-keyframes process {
  0% {
    -webkit-transform: scaleX(0);
            transform: scaleX(0);
  }
  100% {
    -webkit-transform: scaleX(1);
            transform: scaleX(1);
  }
}
@keyframes process {
  0% {
    -webkit-transform: scaleX(0);
            transform: scaleX(0);
  }
  100% {
    -webkit-transform: scaleX(1);
            transform: scaleX(1);
  }
}
.funfacts {
  background-image: url(../images/guru.png);
  background-color: #000;
  background-position: center center;
  background-attachment: fixed;
  background-size: cover;
  padding: 100px 0;
}
.funfacts .funfact {
  font-family: "Oswald";
  text-align: center;
  color: #fff;
}
.funfacts .funfact .st-funfact-icon {
  font-size: 42px;
  line-height: 90px;
}
.funfacts .funfact .st-funfact-counter {
  font-size: 48px;
  line-height: 68px;
  letter-spacing: 3px;
}
.funfacts .funfact .funfact-title {
  font-size: 20px;
  line-height: 40px;
  letter-spacing: 1px;
  font-weight: 300;
}
.funfacts .funfact:after {
  content: '';
  display: block;
  width: 35px;
  height: 2px;
  background-color: #668866;
  margin: 0 auto;
}
.service {
  padding: 100px 0;
}
.st-feature {
  text-align: center;
}
.st-feature .st-feature-icon {
  width: 102px;
  line-height: 100px;
  font-size: 42px;
  color: #fff;
  margin: 0 auto 20px;
  background-color: #668866;
  border-radius: 50%;
  position: relative;
  -webkit-transform: rotate(0) scale(1);
      -ms-transform: rotate(0) scale(1);
          transform: rotate(0) scale(1);
  -webkit-transition: color 0.3s, border-color 0.3s, background-color 0.3s, -webkit-transform 0.3s;
          transition: color 0.3s, border-color 0.3s, background-color 0.3s, transform 0.3s;
}
.st-feature .st-feature-title {
  display: block;
  font-family: "Oswald";
  font-size: 25px;
  line-height: 45px;
  letter-spacing: 1px;
  font-weight: 400;
  color: #4c4c4c;
  margin-bottom: 10px;
}
.st-feature:hover .st-feature-icon {
  color: #668866;
  border-color: #668866;
  background-color: transparent;
  -webkit-transform: rotate(360deg) scale(1.8);
      -ms-transform: rotate(360deg) scale(1.8);
          transform: rotate(360deg) scale(1.8);
}
.features-desc {
  padding: 100px 0;
  background-color: #fcfcfc;
}
ul.styled-list li {
  list-style: none;
  padding-left: 0;
}
ul.styled-list li:before {
  content: '\f00c';
  font-family: 'FontAwesome';
  display: inline-block;
  margin-left: -1.5em;
  width: 1.5em;
  color: #668866;
}
ul.styled-list.list-caret li:before {
  content: '\f0da';
}
ul.styled-list.list-hand li:before {
  content: '\f0a4';
}
ul.styled-list.list-chevron li:before {
  content: '\f054';
}
ul.styled-list.list-times li:before {
  content: '\f00d';
}
ul.styled-list.list-star li:before {
  content: '\f006';
}
.call-2-acction {
  padding: 100px 0;
  background-image: url(../images/c2a.png);
  background-attachment: fixed;
  background-color: #000;
}
.c2a {
  max-width: 700px;
  margin: 0 auto;
  text-align: center;
  color: #fff !important;
}
.c2a h2 {
  color: #fff;
  font-size: 35px;
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: 3px;
}
.c2a h2:after {
  content: '';
  display: block;
  width: 80px;
  height: 1px;
  background-color: #668866;
  margin: 15px auto 20px;
}
.c2a p {
  margin-bottom: 40px;
}
.portfolio {
  padding: 100px 0 0;
}
.filter {
  text-align: center;
}
.filter .btn {
  font-weight: 400;
}
.filter input[type="radio"] {
  display: none;
}
.grid {
  width: 100%;
  padding: 0;
}
figure h2 {
  color: #fff;
  font-weight: 300;
  margin: 0;
  position: absolute;
  right: 30px;
  left: 30px;
  padding: 10px 0;
  top: 30px;
  opacity: 0;
  -webkit-transition: -webkit-transform 0.35s, opacity 0.35s;
          transition: transform 0.35s, opacity 0.35s;
  -webkit-transform: translate3d(0, 20px, 0);
          transform: translate3d(0, 20px, 0);
}
.grid figure h2::after {
  position: absolute;
  top: 100%;
  left: 50%;
  width: 80px;
  margin-left: -40px;
  height: 1px;
  background: #668866;
  content: '';
  -webkit-transform: translate3d(0, 40px, 0);
          transform: translate3d(0, 40px, 0);
  opacity: 0;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
          transition: opacity 0.35s, transform 0.35s;
}
.grid figure h2 span {
  font-weight: 800;
}
.grid figure p {
  letter-spacing: 1px;
  font-size: 68.5%;
  margin: 0;
  position: absolute;
  right: 30px;
  left: 30px;
  padding: 10px 0;
  top: 100px;
  line-height: 1.5;
  -webkit-transform: translate3d(0, 50px, 0);
          transform: translate3d(0, 50px, 0);
  opacity: 0;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
          transition: opacity 0.35s, transform 0.35s;
}
.grid figure:hover h2 {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}
.grid figure:hover h2::after {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}
.grid figure:hover img {
  opacity: 0.3;
  -webkit-transform: scale(1.2);
      -ms-transform: scale(1.2);
          transform: scale(1.2);
}
.grid figure:hover p {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}
.grid figure:hover figcaption > a {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}
.clients {
  padding: 100px 0;
}
.clients-carousel {
  margin: 0;
  padding: 0;
  list-style: none;
}
.clients-carousel li {
  padding: 0 20px;
  opacity: 0.8;
  -webkit-transition: opacity 0.3s;
          transition: opacity 0.3s;
}
.clients-carousel li:hover {
  opacity: 1;
}
.testimonials {
  padding: 100px 0;
  background-image: url(../images/testimonials.png);
  background-size: cover;
  background-attachment: fixed;
  background-color: #000;
  color: #fff;
}
.testimonial .testimonial-img {
  float: left;
  margin-right: 30px;
  position: relative;
}
.testimonial .testimonial-img:after {
  content: '';
  display: block;
  width: 40px;
  height: 40px;
  border-radius: 40px;
  background-color: #668866;
  position: absolute;
  bottom: 5%;
  left: 5%;
}
.testimonial .testimonial-img:before {
  font-family: "Oswald";
  content: '\201C';
  font-size: 40px;
  position: absolute;
  bottom: 1%;
  left: 12%;
  z-index: 99;
}
.testimonial .testimonial-img img {
  border-radius: 50%;
}
.testimonial blockquote {
  border-width: 0;
}
.testimonial blockquote p {
  font-style: italic;
  font-weight: 300;
}
.testimonial blockquote footer,
.testimonial blockquote small,
.testimonial blockquote .small {
  color: #fff;
}
.testimonials-carousel {
  max-width: 800px;
  margin: 0 auto;
}
.testimonials-carousel ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.testimonials-carousel ul li {
  margin: 0;
  padding: 0;
  display: block;
}
.pricing {
  padding: 100px 0;
}
.pricing-table {
  border: 1px solid #f2f2f2;
  border-radius: 5px;
  background-color: #fff;
}
.pricing-table .pricing-header .pt-price {
  font-family: "Oswald";
  color: #4c4c4c;
  font-size: 40px;
  line-height: 70px;
  font-weight: 400;
  text-align: center;
  padding: 10px 40px;
}
.pricing-table .pricing-header .pt-price small {
  font-size: 13px;
  color: #9a9a9a;
  font-weight: 300;
}
.pricing-table .pricing-header .pt-name {
  font-family: "Oswald";
  padding: 10px 40px;
  text-align: center;
  font-weight: 300;
  font-size: 24px;
  line-height: 40px;
  color: #4c4c4c;
  border-top: 1px solid #f2f2f2;
  border-bottom: 1px solid #f2f2f2;
}
.pricing-table .pricing-body ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.pricing-table .pricing-body ul li {
  padding: 8px 25px;
  margin: 0;
}
.pricing-table .pricing-body ul li:nth-child(even) {
  background-color: #fafafa;
}
.pricing-table .pricing-body ul li .fa-times {
  color: #ff6666;
}
.pricing-table .pricing-body ul li .fa-check {
  color: #668866;
}
.pricing-table .pricing-footer {
  text-align: center;
  padding: 15px 40px;
  border-top: 1px solid #f2f2f2;
}
.pricing-table.featured .pricing-header {
  position: relative;
  overflow: hidden;
}
.pricing-table.featured .pricing-header .pt-price {
  color: #668866;
}
.pricing-table.featured .pricing-header .pt-price small {
  color: #668866;
}
.pricing-table.featured .pricing-header .pt-name {
  color: #668866;
}
.pricing-table.featured .pricing-header .featured-text {
  font-family: "Oswald";
  font-size: 13px;
  line-height: 15px;
  letter-spacing: 1px;
  font-weight: 300;
  text-transform: uppercase;
  text-align: center;
  background-color: #668866;
  color: #fff;
  position: absolute;
  top: 22px;
  left: -28px;
  padding: 5px 0;
  width: 126px;
  -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
          transform: rotate(-45deg);
}
.faq-sec {
  padding: 100px 0 50px;
  background-color: #fcfcfc;
}
.faq {
  margin-bottom: 50px;
}
.faq h3 {
  margin-bottom: 15px;
}
.faq h3 i {
  color: #668866;
}
.call-us {
  padding: 50px 0;
  background-color: #668866;
  text-align: center;
}
.call-us h3 {
  display: inline-block;
  *display: inline;
  *zoom: 1;
  color: #fff;
  text-transform: uppercase;
  font-size: 30px;
  line-height: 45px;
  vertical-align: middle;
  margin: 0 30px 0 0;
  letter-spacing: 2px;
  word-spacing: 5px;
}
.blog {
  padding: 100px 0;
}
.blog-post {
  border-bottom: 1px dotted #f2f2f2;
  margin-bottom: 60px;
}
.blog-post .author img {
  border-radius: 50%;
}
.blog-post .post-meta {
  margin-bottom: 10px;
  font-size: 13px;
}
.blog-post .post-meta a {
  font-weight: bold;
  color: #4c4c4c;
}
.blog-post .post-meta a:hover {
  color: #668866;
}
.blog-post .post-meta strong {
  color: #4c4c4c;
}
.blog-post .post-title {
  margin-top: 0;
  margin-bottom: 20px;
}
.blog-post .post-thumb {
  margin-bottom: 40px;
}
.blog-post .post-thumb img {
  border-radius: 10px;
}
.widgets {
  padding-left: 50px;
}
.widget {
  margin-bottom: 60px;
}
.widget ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.widget ul li {
  border-bottom: 1px solid #f2f2f2;
}
.widget ul li a {
  display: block;
  -webkit-transition: text-indent 0.3s, color 0.3s;
          transition: text-indent 0.3s, color 0.3s;
  padding: 5px 0;
}
.widget ul li a:hover {
  text-indent: 20px;
}
.widget ul li a:hover .badge {
  text-indent: 0;
  background-color: #4c4c4c;
}
.widget ul li .recent-post {
  padding: 10px 0;
}
.widget ul li .recent-post .post-thumb {
  display: block;
  float: left;
  margin-right: 15px;
}
.widget ul li .recent-post .post-thumb img {
  border-radius: 10px;
}
.widget ul li .recent-post .post-title {
  font-family: "Open Sans";
  font-weight: 600;
  letter-spacing: 0;
  font-size: 15px;
  margin: 0 0 5px;
}
.widget ul li .recent-post .post-title a {
  display: inline;
}
.widget ul li .recent-post .post-meta {
  font-size: 12px;
}
.widget ul li .recent-post .post-meta a {
  font-weight: bold;
  color: #4c4c4c;
}
.widget ul li .recent-post .post-meta a:hover {
  color: #668866;
}
.widget ul li .recent-post a {
  display: inline-block;
  *display: inline;
  *zoom: 1;
  padding: 0;
}
.widget ul li .recent-post a:hover {
  text-indent: 0;
}
.widget ul li .badge {
  font-size: 10px;
  font-weight: 300;
  vertical-align: middle;
  margin-top: 5px;
  text-indent: 0;
  background-color: #668866;
  -webkit-transition: background-color 0.3s;
          transition: background-color 0.3s;
}
.widget .widget-title {
  font-weight: 300;
  font-size: 28px;
  letter-spacing: 2px;
  text-transform: uppercase;
  margin-bottom: 20px;
}
.widget .tagcloud a {
  font-size: 13px;
  border-radius: 40px;
  color: #737373;
  display: inline-block;
  *display: inline;
  *zoom: 1;
  padding: 3px 20px;
  border-color: #e5e5e5;
  border-width: 1px;
  border-style: solid;
  margin-bottom: 6px;
  -webkit-transition: color 0.3s, background-color 0.3s, border-color 0.3s;
          transition: color 0.3s, background-color 0.3s, border-color 0.3s;
}
.widget .tagcloud a:hover {
  border-color: #668866;
  background-color: #668866;
  color: #fff;
}
.subscribe {
  padding: 120px 0;
  background-image: url(../images/kmpsB.png);
  background-size: cover;
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-position: top center;
  background-color: #000;
}
.subscribe .subscribe-title {
  text-align: center;
  color: #fff;
  margin-bottom: 50px;
  font-size: 32px;
  text-transform: uppercase;
  font-weight: 300;
}
.subscribe .subscribe-or {
  font-family: "Oswald";
  color: #fff;
  text-align: center;
  font-size: 20px;
  padding: 30px 0;
  margin: 0;
  text-transform: uppercase;
}
.subscribe .subscribe-social {
  padding: 0;
  margin: 0;
  list-style: none;
  text-align: center;
}
.subscribe .subscribe-social li {
  padding: 0;
  margin: 0;
  margin-right: 5px;
  display: inline-block;
  *display: inline;
  *zoom: 1;
}
.subscribe-form {
  max-width: 500px;
  margin: 0 auto;
}
.subscribe-form .form-control {
  border-radius: 30px 2px 2px 30px !important;
  padding: 14px 20px 14px 30px !important;
}
.input-group .form-control {
  border-radius: 30px 2px 2px 30px !important;
  padding: 14px 20px 14px 30px !important;
}
a.social {
  font-family: "Oswald";
  letter-spacing: 1px;
  display: inline-block;
  background-color: #668866;
  color: #fff;
  padding: 8px 20px 8px 65px;
  border-radius: 50px;
  position: relative;
  overflow: hidden;
  -webkit-transition: background-color 0.3s, text-indent 0.3s, padding 0.3s;
          transition: background-color 0.3s, text-indent 0.3s, padding 0.3s;
}
a.social i {
  display: block;
  background-color: #31ada4;
  width: 50px;
  height: 42px;
  line-height: 42px;
  font-size: 17px;
  border-radius: 50px 0 0 50px;
  position: absolute;
  left: 0;
  top: 0;
  text-indent: 10px;
  -webkit-transition: text-indent 0.3s;
          transition: text-indent 0.3s;
}
a.social:hover {
  background-color: #31ada4;
  text-indent: -10px;
  padding: 8px 30px 8px 65px;
}
a.social:hover i {
  text-indent: 29px;
}
a.social.twitter {
  background-color: #2daae1;
}
a.social.twitter i {
  background-color: #1a87b7;
}
a.social.twitter:hover {
  background-color: #1a87b7;
}
a.social.facebook {
  background-color: #3c5b9b;
}
a.social.facebook i {
  background-color: #2b416f;
}
a.social.facebook:hover {
  background-color: #2b416f;
}
a.social.rss {
  background-color: #fca73a;
}
a.social.rss i {
  background-color: #f58b04;
}
a.social.rss:hover {
  background-color: #f58b04;
}
@media screen and (-webkit-min-device-pixel-ratio: 0) {
  a.social:hover {
    padding: 8px 20px 8px 65px;
  }
}
.contact {
  padding: 120px 0;
}
.contact form input,
.contact form textarea {
  margin-bottom: 30px;
}
input[type="text"].formFieldError,
input[type="email"].formFieldError,
textarea.formFieldError {
  border-color: #e34444 !important;
}
footer.site-footer {
  background-color: #fcfcfc;
  padding: 10px 0;
  color: #9f9f9f;
  font-size: 13px;
  text-align: center;
}
footer.site-footer a {
  color: #808080;
}
footer.site-footer a:hover {
  color: #668866;
}

@media (min-width: 768px) {
  .navbar-nav > li > a {
    padding-top: 41px;
    padding-bottom: 41px;
  }
  .st-navbar-mini .navbar-default .navbar-nav > li > a {
    padding-top: 20px;
    padding-bottom: 20px;
  }
}
@media (min-width: 1440px) {
  .grid {
    width: 100%;
    padding: 0;
  }
  .grid figure {
    position: relative;
    float: left;
    overflow: hidden;
    background: #000;
    text-align: center;
    cursor: pointer;
    width: 25%;
  }
}
	.judul > h1{
		color:white;		
	}
	
		#timestamp{
			color:white;

		}
		.post-thumb{
			text-align: center;
		}
	
		@media only screen and (max-width:600px){
		
		
		.box{
    border-radius: 14px;
background: #ffffff;
box-shadow:  20px 20px 40px #cec7cf,
             -20px -20px 60px #ffffff;
}
		.card-4 {
			padding: 2%;
			
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
		.content{
			min-height: 700px;
			padding-top: 15%;
			background:#fefe
			font-size: 14px;
		}
		tr{
			margin: 10px
		}
		.img-thumb{
			
			height:100px;
		}
		.rekom{
			margin-bottom:1%; 
			border-bottom:0.5px solid black;
		}
	}
	@media only screen and (min-width:601px){
		.content{
			min-height: 700px;
			padding-top: 5%;
			background:#fefe
			font-size: 14px;
		}
		.img-thumb{
			
			height:200px;
		}
		.box{
    border-radius: 14px;
background: #ffffff;
box-shadow:  20px 20px 40px #cec7cf,
             -20px -20px 60px #ffffff;
}
		.row1{
			margin-top: 10%;
		}
		.card-4 {
		
			height: 250px;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
	
		.tulisan{
			font-size: 13px;
		}
		
	
	}

	</style>
	<header class="st-navbar">
		<nav class="navbar navbar-default navbar-fixed-top clearfix" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sept-main-nav">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="/images/logo.png" width="200px" height="150px" class="img-responsive"></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse main-nav" id="sept-main-nav">
					<ul class="nav navbar-nav navbar-right">
						<li class="i"><a href="/#home"> Beranda</a></li>
                        <li><a href="/pendaftaran">Pendaftaran</a></li>
						<li><a href="/berkas-data">berkas</a></li>
						<li><a href="/berita">Berita</a></li>
						<li><a href="/spw">SPW Bos Ku</a></li>
						<li><a href="/staff">Data Staff</a></li>
						
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</header>
    @yield('isi')
    <footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					&copy; <a href="https://www.cantothemes.com">CantoThemes</a> 2015.
					<!-- Don't Remove/Edit this. If you remove this you don't have permission to use this template. -->
					Designed by <a href="https://www.cantothemes.com">CantoThemes</a>
					<!-- So Please don't remove this -->
				</div>
				<div class="col-md-12">
					Distributed by <a href="https://themewagon.com/">Themewagon</a>

				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/js/jquery.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery.easing.min.js"></script>
	<script src="/js/jquery.stellar.js"></script>
	<script src="/js/jquery.appear.js"></script>
	<script src="/js/jquery.nicescroll.min.js"></script>
	<script src="/js/jquery.countTo.js"></script>
	<script src="/js/jquery.shuffle.modernizr.js"></script>
	<script src="/js/jquery.shuffle.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="/js/owl.carousel.js"></script>
	<script src="/js/jquery.ajaxchimp.min.js"></script>
	<script>
		// Function ini dijalankan ketika Halaman ini dibuka pada browser
		$(function(){
		setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
		});
		 
		//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
		function timestamp() {
		$.ajax({
		url: '/jam',
		success: function(data) {
		$('#timestamp').html(data);
		},
		});
		}
		</script>
	<script src="/js/script.js"></script>
    @yield('script')
</body>

</html>
