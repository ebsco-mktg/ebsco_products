<script>
    	function toggleSiteMap() { //this code is largely stolen from something Mike did for top navigaion
    		var henrySiteMap = document.getElementById('henrySiteMap');
    		var henryHotspotIndicator1 = document.getElementById('henry-hotspot-indicator1');
    		var henryHotspotIndicator2 = document.getElementById('henry-hotspot-indicator2');
    		var isOpen = ((' ' + henrySiteMap.className + ' ').indexOf('open') > -1 ) ? 0 : 1;

    		if (isOpen) {
    			henrySiteMap.className += ' open';
    			henryHotspotIndicator1.className = 'henry_indicator_hide';
    			henryHotspotIndicator2.className = 'henry_indicator_show';
    		} else {
    			henrySiteMap.className = henrySiteMap.className.replace(/(?:^|\s)open(?!\S)/g, '');
    			henryHotspotIndicator1.className = 'henry_indicator_show';
    			henryHotspotIndicator2.className = 'henry_indicator_hide';
    		}
    	}
</script>
<style>
    #henry_nav, #henry_hr, #henry_sitemap {background-color: #ffffff;}
    #xhenry_nav .content > .inner, #henry_sitemap .content > .inner, #henry_hr .content > .inner { padding: 0 10px; }

    #henry_nav .content, #henry_hr .content, #henry_sitemap .content { padding: 0; } /* Fix for Clarke -- Clarke adds padding to .content, but footer was designed without it */

    #xhenry_nav, #henry_sitemap, #henry_sitemap li {perspective-origin: 0 0; transform-origin: 0 0; font-family: "myriad-pro", sans-serif; font-weight: normal; font-size: 14px; line-height: 1.3; color: #454545;}
    #xhenry_nav a, #henry_sitemap a {text-decoration: none; border: 0px solid transparent; background-position: 0% 0%; font-style: normal;}
    #xhenry_nav a:hover, #henry_sitemap a:hover {text-decoration: underline;}

    #xhenry_nav a, #xhenry_nav a:hover, #xhenry_nav a:active, #xhenry_nav a:visited {color: #454545;}
    #xhenry_nav1 a, #xhenry_nav1 a:hover, #xhenry_nav1 a:active, #xhenry_nav1 a:visited {font-weight: normal; color: #454545;}

    #henry_sitemap a, #henry_sitemap a:hover, #henry_sitemap a:active, #henry_sitemap a:visited {color: #004a9b;}

    #xhenry_nav > .inner { perspective-origin: 0 0; transform-origin: 0 0; margin-top: 20px; margin-bottom: 20px;}
    #xhenry_nav > .inner > .content {perspective-origin: 0 0; transform-origin: 0 0; }
    #xhenry_nav > .inner > .content > .inner {perspective-origin: 0 0; transform-origin: 0 0; text-align: center; line-height: 40px;}
    #xhenry_nav > .inner > .content:first-child img {perspective-origin: 0 0; display: block; transform-origin: 0 0; margin: 12px auto;}

    #henry_hr hr { border: 1px solid #dddddd; margin: 8px 0px 20px 0px; height: 0px; width: auto;}

    #henry_sitemap h3 { line-height: 1.3; margin: 15px 0px 20px 0px; padding: 0px 0px 0px 0px; font-weight: normal; font-size: 18px; }
    #henry_sitemap h4 { line-height: 1.3; margin: 15px 0px 13px 0px; padding: 0px 0px 0px 0px; font-weight: normal; font-size: 14px; color: #5f6061; }
    #henry_sitemap ul { list-style-type: none; margin: 0px 0px 30px 0px; padding: 0px 0px 0px 0px; }
    #henry_sitemap ul > li { list-style-type: none; margin: 13px 0px 13px 0px; padding: 0px 0px 0px 0px; }

    #henry_sitemap ul > li, #henry_sitemap h3, #henry_sitemap h4 {text-align: center;}

    #henry_sitemap_interact h3 { margin-top: 0px; }
    #henry_sitemap_interact img { vertical-align: middle; }
    #henry_sitemap_interact > div > div { padding: 15px 0px 1px 25px; background-color: #f4f4f4; }

    #henrySiteMap {
    	overflow: hidden;
    	max-height: 0px;

    	transition: max-height .5s ease-in-out;
        -moz-transition: max-height .5s ease-in-out;
        -webkit-transition: max-height .5s ease-in-out;
        -ms-transition: max-height .5s ease-in-out;
        -o-transition: max-height .5s ease-in-out;


    }
    #henrySiteMap.open {
    	max-height: 5000px; /* if user opens it at smallest size */
    }

    #henry-hotspot {
    	cursor: pointer;
    	font-size: 22px;
    	padding: 0 0 20px 10px;
    	text-align: center;
    }
    .henry_indicator_hide {display: none;}
    .henry_indicator_show {display: inline;}



    #footer-bottom {
        /*font-family: Arial, Helvetica, sans-serif;*/
        font-size:12px;
        /*font-size:1.2rem;*/
        line-height:45px;
        /*line-height:5rem;*/
    	position: relative;
    	display: block;
    	width: 100%;
    	/*height: 43px;*/
    	margin: 0;
    	padding: 0;
    	/* border-top: 1px solid rgb(228,228,228);*/


    	background-color: #eeeeee;

    	/*background: rgb(238,238,238);*/


    	color: rgb(70,70,70);
    	z-index: 9;
    }

    #footer-bottom > .inner {
    	/*width: 1024px;*/
    	margin: 0 auto;
    	padding: 1px 0 0 0;
    	background: rgb(238,238,238);
    	line-height: 42px;
    }

    #footer-bottom a, #henry_copyright a {
        float: left;
        margin: 0;
        padding:0 35px 0 13px;
        text-decoration: none;
    	line-height: 42px;
        color: #4477aa;
    }

    #footer-bottom a:hover, #henry_copyright a:hover {
        border: 0;
        padding:0 35px 0 13px;
        text-decoration: underline;
    }

    #footer-bottom p, #henry_copyright p {
        display: inline;
        font-size: 14px;
        font-weight: normal;
        line-height: 42px;
    }

    #henry_copyright a {
    	float: none;
    }

    #footer-social {
        float: right;
        /*height: 50px;*/
        margin: 6px 12px 0 0;
        padding: 0;
    }

    #footer-social li {
        float: left;
        width: 29px;
        height: 29px;
        margin: 0 0 0 7px;
        list-style: none;
        overflow: hidden;
    }

    #footer-social li a {
        position: relative;
        display: block;
        width: 29px;
        height: 29px;
        overflow: hidden;
    }

    .lt-ie8 #footer-social li a {
        padding: 0px;
    }

    #footer-social li a div {
        position: absolute;
        top: 0;
        left: 0;
        width: 29px;
        height: 29px;
        text-indent:100%;
        overflow: hidden;
        white-space: nowrap;
        clip: rect(29px, 29px, 29px, 0px);
        cursor: pointer;

        transition:clip .2s ease-in-out;
        -moz-transition:clip .2s ease-in-out;
        -webkit-transition:clip .2s ease-in-out;
        -ms-transition:clip .2s ease-in-out;
        -o-transition:clip .2s ease-in-out;
    }

    #footer-social li a:hover div {
        clip: rect(0px, 29px, 29px, 0px);
    }

    #footer-social a { background: url('//www.ebsco.com/apps/portal/img/social-sprite.png') 0px 0px no-repeat #bebebe; };

    #footer-social .facebook a { background-position: 0px 0px; }
    #footer-social .twitter a { background-position: 0px -29px; }
    #footer-social .google a { background-position: 0px -59px; }
    #footer-social .linkedin a { background-position: 0px -90px; }
    #footer-social .youtube a { background-position: 0px -122px; }
    #footer-social .pinterest a { background-position: 0px -149px; }
    #footer-social .tumblr a { background-position: 0px -177px; }

    #footer-social div { background:url('//www.ebsco.com/apps/portal/img/social-sprite.png') -30px 0px no-repeat #537ab0; }

    #footer-social .facebook div { background-position: -30px 0px; }
    #footer-social .twitter div { background-position: -30px -29px; }
    #footer-social .google div { background-position: -30px -59px; }
    #footer-social .linkedin div { background-position: -30px -90px; }
    #footer-social .youtube div { background-position: -30px -122px; }
    #footer-social .pinterest div { background-position: -30px -149px; }
    #footer-social .tumblr div { background-position: -30px -177px; }



    #henry_copyright { clear: both; }


    /* language dropdown */
    #languageSwitcher {
        /*background: rgb( 255, 255, 255 );*/
        /*margin: 4em 0 0;*/

    	float: left;
    	width: 250px;
    	margin: 5px 0 5px 0;
    	background-color: transparent;
    }
    #languageSwitcher > .inner > .content { padding: 0; } /* quick-fix for a small conflict with Clarke */
    #languageSwitcher label {
        background: url(/e/files/img/icon_language.png) 0 -3px no-repeat transparent;
        color: rgb(255,255,255);
        display: block;
        float: left;
        /*height: 40px;*/
        width: 40px;

    	height: 30px;
    }
    #languageSwitcher select {
    	font-size: 16px;
        display: block;
        margin-left: 40px;
        max-width: 200px;
    }
    #languageChange.inner {
        padding: 0;
    	margin: 0;

    	/*added*/
    	/*width: 250px;
    	margin: 0 auto;*/
    }

    @media screen and (max-width: 720px) {
    /*center the footer-bottom stuff at smaller widths*/
    	#footer-bottom > .inner {
    	}
    	#languageSwitcher {
    		display: block;
    		float: none;
    		width: 100%;
    		/*border: 1px solid green;*/
    	}
    	#languageChange {
    		text-align: center;
    	}
    	#languageSwitcher label, #languageSwitcher select {
    		display: inline-block;
    		float: none;
    		margin: 0;
    	}
    	#footer-social {
    		display: block;
    		margin: 6px 0;
    		float: none;
    		/*border: 1px solid red;*/
    		text-align: center;
    	}
    	#footer-social > li {
    		display: inline-block;
    		float: none;
    		/*border: 1px solid blue;*/
    	}
    	#henry_copyright > .inner, p#henry_copyright {text-align: center;}
    	p#henry_copyright {text-align: center; display: block;}
    	#henry_copyright > .inner > p {overflow: hidden;}
    }


    @media screen and (min-width: 481px) {
    	#henrySiteMap, #henrySiteMap.open {
    		max-height: 5000px; /* always open after this breakpoint */
    	}
    	#henry_sitemap_interact > div { padding-right: 10px; }
    	#henry-hotspot { display: none; }
    	#henry_sitemap ul > li, #henry_sitemap h3, #henry_sitemap h4 {text-align: left;}
    }


    @media screen and (min-width: 721px) {
    	#xhenry_nav > .inner > .content {width: 19%}
    	#xhenry_nav > .inner > .content:first-child {width: 10%;}
    	#xhenry_nav > .inner > .content:last-child {width: 14%;}
    	#xhenry_nav > .inner > .content:first-child > .inner {text-align: left;}
    	#xhenry_nav > .inner > .content:first-child > .inner img {margin: 12px 0px;}
    	#xhenry_nav > .inner > .content:last-child > .inner {text-align: right;}

    	/*added*/
    	/* #languageChange.inner{margin: 0;} */
    }


    </style>


    <style>
    #henry_nav { position: relative; }
    #henry_nav > .inner { max-width: 1280px; min-width: 240px; margin: auto; }
    #henry_nav .content {float:left;}
    #henry_nav .content > .inner { padding: 0 10px; }
    #henry_nav .content > .inner *:first-child { margin-top: 0; }

    .group, #henry_nav .container > .inner, #henry_nav .content > .inner { *zoom: 1; }
    .group:before, .group:after, #henry_nav .container > .inner:before, #henry_nav .container > .inner:after, #henry_nav .content > .inner:before, #henry_nav .content > .inner:after { display: table; content: " "; }
    .group:after, #henry_nav .container > .inner:after, #henry_nav .content > .inner:after { clear: both; }

    #henry_nav { padding-top: 20px; font-size:14px; /*font-size:1.4rem;*/ line-height:14px; /*line-height:1.4rem;*/ background: #fff; }
    #henry_nav .logo {display:inline;}
    #henry_nav .logo img { float: left; max-width: 100%; padding: 45px 0 27px; }
    #henry_nav .logo:hover { border: 0; }
    #henry_nav ul { width: 100%; margin: 0; padding: 0; text-align: center; }
    #henry_nav li { display: block; float: left; line-height: 14px; }
    #henry_nav li.last { text-align: right; padding-right: 0; }
    #henry_nav li a { display: block; margin: 0 auto; /* used for 720px breakpoint */ padding: 45px 0 27px; color: #454545; text-decoration: none; border: none; }
    #henry_nav li a:hover { color: #454545; border:none; text-decoration: underline; }

    #henry_nav .f1 { width: 12.765957%; }
    #henry_nav .f2 { width: 19.148936%; }
    #henry_nav .f3 { width: 17.553191%; }
    #henry_nav .f4 { width: 15.425531%; }
    #henry_nav .f5 { width: 22.127659%; }
    #henry_nav .f6 { width: 12.765957%; }

    @media only screen and (max-width: 720px) {
        #henry_nav ul{ margin: 0 0 10px; }
        #henry_nav li { width: 100% !important; }
        #henry_nav .f1 { margin: 0 0 5px; padding: 0 0 5px; xborder-bottom: 1px solid #E4E4E4; }
        #henry_nav li.last { text-align: center; }
        #henry_nav li a { width: 100%; padding: 0; line-height: 40px;}
        #henry_nav .logo img {float: none; padding: 0; }
    }
    </style>

<footer id="henry_nav" class="container group">
            <div class="inner">
                <div class="content size1of1">
                    <div class="inner">
                        <ul class="group">
                            <li class="f1">


    								<a class="logo" href="//www.ebsco.com">

                        				<img src="//www.ebscohost.com/files/ebscohost_footer/images/ebsco_footer_logo.png" alt="EBSCO" />
                       				</a>


                            </li>
                            <li class="f2">


                                	<a href="//www.ebsco.com/about">About EBSCO</a>


                            </li>
                            <li class="f3">


                                	<a href="https://www.ebsco.com/contact">Contact Us</a>


                            </li>
                            <li class="f4">
                                <a href="http://www.ebscohost.com/careers">Careers</a>
                            </li>
                            <li class="f5">
                                <a href="http://help.ebsco.com/">Support &amp; Training</a>
                            </li>
                            <li class="f6 last">


                                	<a href="https://www.ebsco.com/news-center/press-releases">Newsroom</a>


                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </footer>

    <section class="container" id="henry_hr">
    	<div class="inner">
    		<div class="content size1of1">
    			<div class="inner">
    				<hr />
    			</div>
    		</div>
    	</div>
    </section>
    <section class="container" id="henry_sitemap">
    	<div id="henry-hotspot" class="xhide8 xhide10 xhide12 xhide16" onclick="toggleSiteMap();">
    		Other EBSCO Sites
    		<span id="henry-hotspot-indicator1" class="henry_indicator_show">+</span><span id="henry-hotspot-indicator2" class="henry_indicator_hide">&ndash;</span>
    	</div>
    	<div class="inner" id="henrySiteMap">
    		<div class="content size1of1 size4of8 size6of12 size8of16">
    			<div class="content size1of1 size8of8 size6of12 size8of16">

    				<div class="inner">
    					<h3>Technology &amp; Services</h3>
    					<h4>Discovery &amp; Services</h4>
    					<ul>
    						<li><a href="https://www.ebscohost.com/discovery" target="_blank">EBSCO Discovery Service</a></li>
    						<li><a href="https://cloud.ebsco.com/" target="_blank">Apps &amp; Cloud Services</a></li>
    						<li><a href="http://www.stacksdiscovery.com/" target="_blank">Stacks</a></li>

    					</ul>
    					<h4>Publisher Services</h4>
    					<ul>
    						<li><a href="http://www.ppfebsco.com/" target="_blank">ppf Subscription Fulfillment</a></li>
    					</ul>
    				</div>

    			</div>
    			<div class="content size1of1 size8of8 size6of12 size8of16">

    				<div class="inner">
    					<h3>Content</h3>
    					<h4>Research Databases</h4>
    					<ul>
    						<li><a href="https://www.ebscohost.com/archives" target="_blank">Digital Archives</a></li>
    						<li><a href="https://www.ebscohost.com/">EBSCOhost Research Databases</a></li>
    					</ul>
    					<h4>Magazines, Books &amp; Journals</h4>
    					<ul>
    						<li><a href="https://www.ebscohost.com/ebooks" target="_blank">EBSCO eBooks &amp; Audiobooks</a></li>
    						<li><a href="https://flipster.ebsco.com/" target="_blank">Flipster Digital Magazines</a></li>
    						<li><a href="https://journals.ebsco.com/" target="_blank">Journals &amp; e-Packages</a></li>
    						<li><a href="https://gobi.ebsco.com" target="_blank">GOBI Library Solutions</a></li>
    					</ul>
    					<h4>Readers' Advisory</h4>
    					<ul>
    						<li><a href="https://www.ebscohost.com/novelist" target="_blank">NoveList</a></li>
    					</ul>
    				</div>

    			</div>
    		</div>
    		<div class="content size1of1 size4of8 size6of12 size8of16">
    			<div class="content size1of1 size8of8 size6of12 size8of16">

    				<div class="inner">
    					<h3>Medical Resources</h3>
    					<ul>
    						<li><a href="https://health.ebsco.com/" target="_blank">EBSCO Health</a></li>
    						<li><a href="http://www.dynamed.com" target="_blank">DynaMed Plus</a></li>
    						<li><a href="https://www.ebscohost.com/nursing" target="_blank">Nursing Resources</a></li>
    					</ul>
    					<h3>Skills Development</h3>
    					<ul>
    						<li><a href="https://www.ebscohost.com/learning-resources" target="_blank">Organizational Learning &amp; Training</a></li>
    						<li><a href="http://www.learningexpresshub.com/corporate" target="_blank">LearningExpress Test Prep</a></li>
    					</ul>
    				</div>

    			</div>
    			<div class="content size1of1 size8of8 size6of12 size8of16" id="henry_sitemap_interact">

    				<div class="">
    					<div class="">
    						<h3><img src="https://www.ebscohost.com/files/slideshow/slideshow_2015/images/interact_footer_icon.png" /> Interact</h3>
    						<h4>Blogs</h4>
    						<ul>
    							<li><a href="https://www.ebsco.com/blog" target="_blank">EBSCOpost</a></li>
    							<li><a href="https://discovery.ebsco.com/pulse" target="_blank">Discovery Pulse</a></li>
    							<li><a href="//www.ebscohost.com/novelist-the-latest" target="_blank">NoveList Blog</a></li>

    						</ul>
    						<h4>Logins</h4>
    						<ul>
    							<li><a href="https://www.ebsconet.com/" target="_blank">EBSCONET</a></li>
    							<li><a href="http://eadmin.ebscohost.com/EAdmin/login.aspx" target="_blank">EBSCOadmin</a></li>
    							<li><a href="https://ecm.ebscohost.com/User/Login" target="_blank">EBSCOhost Collection Manager</a></li>
    							<li><a href="http://www.gobi3.com/Pages/Login.aspx" target="_blank">GOBI</a></li>
    						</ul>
    					</div>
    				</div>

    			</div>
    		</div>
    	</div>
    </section>


    <section class="container" id="footer-bottom">
    	<div class="inner">


    	<section id="languageSwitcher" class="container">
      <div class="inner">
    	<div class="content size1of1">
    	  <form id="languageChange" class="inner">
    		<label for="langDrop"></label>
    		<select id="langDrop">
    		  <option value="de-at" >Austria</option><option value="cs-cz" >čeština</option><option value="de-de" >Deutsch</option><option value="en" selected="selected">English</option><option value="latam" >Español - LatAm</option><option value="fr-fr" >Français</option><option value="it-it" >Italiano</option><option value="nl-nl" >Nederlands</option><option value="pl-pl" >Polskie</option><option value="pt-br" >Portuguese</option><option value="tr-tr" >Türkçe</option><option value="zh-cn" >简体中文</option><option value="zh-tw" >繁體中文</option>
    		  <option value="http://www.ebsco.co.jp/">日本人</option>
    		  <option value="https://www.ebsco.com/no">norsk</option>
    		</select>
    	  </form>
    	</div>
      </div>
    </section>




    		<ul id="footer-social" class="group">

    			<li class="facebook">


    					<a href="https://www.facebook.com/EBSCOInfoServices" target="_blank" class="ga" data-ga='{ "category" : "Social", "action" : "click", "label" : "Facebook"}'><div>like us on facebook</div></a>


    			</li>
    			<li class="twitter">


    					<a  href="https://twitter.com/EBSCO" target="_blank" class="ga" data-ga='{ "category" : "Social", "action" : "click", "label" : "Twitter"}'><div>follow us on twitter</div></a>


    			</li>
    			<li class="google">


    					<a href="https://plus.google.com/+ebscohostcom/posts" target="_blank" class="ga" data-ga='{ "category" : "Social", "action" : "click", "label" : "Google Plus"}'><div>add us to your google+ circle</div></a>


    			</li>
    			<li class="linkedin">


    					<a href="https://www.linkedin.com/company/7777?trk=tyah" target="_blank" class="ga" data-ga='{ "category" : "Social", "action" : "click", "label" : "LinkedIn"}'><div>connect with us on linkedin</div></a>


    			</li>
    			<li class="youtube">


    					<a href="https://www.youtube.com/user/ebscopublishing" target="_blank" class="ga" data-ga='{ "category" : "Social", "action" : "click", "label" : "YouTube"}'><div>see what we're up to on youtube</div></a>


    			</li>
    			<li class="pinterest">


    					<a href="https://pinterest.com/ebsco" target="_blank" class="ga" data-ga='{ "category" : "Social", "action" : "click", "label" : "pinterest"}'><div>follow us on pinterest</div></a>


    			</li>




    		</ul>
    	</div>
    </section>



    <section class="container" id="henry_copyright">
    	<div class="inner">
    		<p class="">
    			<a href="https://www.ebsco.com/company/privacy-policy">Privacy Policy</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    			<nobr>&copy; 2017 EBSCO Industries, Inc. All rights reserved</nobr>
    		</p>
    	</div>
    </section>


    <script type="text/javascript">
        var footLinks = document.getElementById('henry_nav').getElementsByTagName('a'),
            currDomain = window.location.hostname;
        for (i=0; i<footLinks.length; i++) {
            var thisHref = footLinks[i].getAttribute('href'),
                thisPath = (thisHref.split('//'))[1],
                thisDomain = (thisPath.split('/'))[0];
            if ( thisDomain !== currDomain  ) {footLinks[i].setAttribute('target','_blank');}
        }
    </script>




    <style>
    	#inCompatMode {
        	border-bottom: 1px solid rgb( 233, 233, 233 );
            display: block;
            padding: 32px;
        	position: relative;
        }
        #inCompatMode .close-btn {
        	float: right;
        }
        .skin_fallback {
        	background: rgb( 255, 255, 255 );
            border-bottom: 1px solid rgb( 233, 233, 233 );
        }
    </style>

    <script>

      if ( typeof docCookies === 'undefined' ) {
        /*\
        |*|
        |*|  :: cookies.js ::
        |*|
        |*|  A complete cookies reader/writer framework with full unicode support.
        |*|
        |*|  https://developer.mozilla.org/en-US/docs/DOM/document.cookie
        |*|
        |*|  This framework is released under the GNU Public License, version 3 or later.
        |*|  http://www.gnu.org/licenses/gpl-3.0-standalone.html
        |*|
        |*|  Syntaxes:
        |*|
        |*|  * docCookies.setItem(name, value[, end[, path[, domain[, secure]]]])
        |*|  * docCookies.getItem(name)
        |*|  * docCookies.removeItem(name[, path], domain)
        |*|  * docCookies.hasItem(name)
        |*|  * docCookies.keys()
        |*|
        \*/
        var docCookies = {
          getItem: function (sKey) {
            return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
          },
          setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
            if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) { return false; }
            var sExpires = "";
            if (vEnd) {
              switch (vEnd.constructor) {
                case Number:
                  sExpires = vEnd === Infinity ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + vEnd;
                  break;
                case String:
                  sExpires = "; expires=" + vEnd;
                  break;
                case Date:
                  sExpires = "; expires=" + vEnd.toUTCString();
                  break;
              }
            }
            document.cookie = encodeURIComponent(sKey) + "=" + encodeURIComponent(sValue) + sExpires + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "") + (bSecure ? "; secure" : "");
            return true;
          },
          removeItem: function (sKey, sPath, sDomain) {
            if (!sKey || !this.hasItem(sKey)) { return false; }
            document.cookie = encodeURIComponent(sKey) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + ( sDomain ? "; domain=" + sDomain : "") + ( sPath ? "; path=" + sPath : "");
            return true;
          },
          hasItem: function (sKey) {
            return (new RegExp("(?:^|;\\s*)" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie);
          },
          keys: /* optional method: you can safely remove it! */ function () {
            var aKeys = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/);
            for (var nIdx = 0; nIdx < aKeys.length; nIdx++) { aKeys[nIdx] = decodeURIComponent(aKeys[nIdx]); }
            return aKeys;
          }
        };

      }

      var agentStr = navigator.userAgent,
          isInCompatMode = false,
          hasCookie = false;

    // Production steps of ECMA-262, Edition 5, 15.4.4.21
    // Reference: http://es5.github.io/#x15.4.4.21
    if (!Array.prototype.reduce) {
      Array.prototype.reduce = function(callback /*, initialValue*/) {
        'use strict';
        if (this == null) {
          throw new TypeError('Array.prototype.reduce called on null or undefined');
        }
        if (typeof callback !== 'function') {
          throw new TypeError(callback + ' is not a function');
        }
        var t = Object(this), len = t.length >>> 0, k = 0, value;
        if (arguments.length == 2) {
          value = arguments[1];
        } else {
          while (k < len && !(k in t)) {k++;}
          if (k >= len) {
            throw new TypeError('Reduce of empty array with no initial value');
          }
          value = t[k++];
        }
        for (; k < len; k++) {
          if (k in t) {
            value = callback(value, t[k], k, t);
          }
        }
        return value;
      };
    }

      if ( ( agentStr.indexOf("Trident/7.0") > -1 ) || ( agentStr.indexOf("Trident/6.0") > -1 ) || ( agentStr.indexOf("Trident/5.0") > -1 ) || ( agentStr.indexOf("Trident/4.0") > -1 ) ) {
          if (agentStr.indexOf("MSIE 7.0") > -1) {
              isInCompatMode = true;
          }
      }

      if ( docCookies.hasItem( 'eis-runcompat') ) {
      	hasCookie = true;
      }

      if ( isInCompatMode && !hasCookie ) {
          var d = document,
              bodyElem = d.getElementsByTagName( 'body' ),
              topElem = bodyElem.item(0).firstChild;
              msgDiv = d.createElement( 'div' ),
              msgHTML = '<p>It looks like you are browsing in Internet Explorer compatibility mode. Please turn off compatibility mode, or <a href="http://browsehappy.com" target="_blank">use a different browser</a>. <a href="" id="fnCloseAlert" class="button button-inline close-btn skin_cta2">Continue Anyway</a></p>';
          try {
    	  stylesRules = [].slice.call(document.styleSheets)
              				.reduce(function (prev, styleSheet) {
                              if (styleSheet.cssRules) {
                                return prev + [].slice.call(styleSheet.cssRules)
                                .reduce(function (prev, cssRule) {
                                  return prev + cssRule.cssText;
                                });
                              } else {
                                return prev;
                              }
              });
              if ( stylesRules.indexOf( '.skin_s1' ) !== -1 ) {
                  msgDiv.className = 'skin_s1';
              } else {
                  msgDiv.className = 'skin_p1';
              }
          } catch(e) {
          	window.console && console.error(e);
            msgDiv.className = 'skin_fallback';
          }

          msgDiv.id = 'inCompatMode';


          msgDiv.innerHTML = msgHTML;

          bodyElem.item(0).insertBefore( msgDiv, topElem );

          var closeBtn = d.getElementById( 'fnCloseAlert' )

          if ( closeBtn.addEventListener ) {
    		  closeBtn.addEventListener( 'click', function(evt) {
    			  evt.preventDefault();
    			  msgDiv.style.display = 'none';
                  // set cookie for 1 week
    			  docCookies.setItem( 'eis-runcompat', 'on', 604800 );
    			  return false;
    		  }, false );
    	  } else if ( closeBtn.attachEvent ) {
    		  closeBtn.attachEvent( 'onclick', function() {
              	  event.preventDefault ? event.preventDefault() : event.returnValue = false;
    			  // evt.preventDefault();
    			  msgDiv.style.display = 'none';
                  // set cookie for 1 week
    			  docCookies.setItem( 'eis-runcompat', 'on', 604800 );
    			  return false;
    		  } );
    	  }

    	  /*
          closeBtn.addEventListener( 'click', function(evt) {
              evt.preventDefault();
              msgDiv.style.display = 'none';
              docCookies.setItem( 'eis-runcompat');
              return false;
          }, false );
    	  */

      }
    </script>
