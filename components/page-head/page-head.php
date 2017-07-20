<?php
/* variables assumed passed in:
Variables:
  $title_tag
  $meta_description

*/
?>



<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1">

<!--No Follow- REMOVE WHEN GOING LIVE -->
<meta name="robots" content="noindex, nofollow" />

<!--Page Data-->
<title><?php echo $title_tag ?></title>
<meta name="description" content="<?php echo $meta_description ?>"/>
<meta name="author" content="EBSCO Information Services, Inc."/>

<!-- when using OG make certain to include the prefix property in the HEAD tag
     reference: http://ogp.me/
-->
<!-- NOTE: if this is a blog post or a news item, use the following:
    <head prefix="og: http://ogp.me/ns#" article: http://ogp.me/ns/article#">
        ...
        <meta property="og:type" content="article" />
-->
<meta property="og:site_name"   content="EBSCO Engineering Blog: Insights and News From E"/>
<meta property="og:title"       content="page title"/>
<meta property="og:description" content="description goes here"/>
<meta property="og:url"         content="page url" />
<meta property="og:image"       content="link_to_image">
<meta property="og:image:width" content="300" /> <!-- width of the above image -->
<meta property="og:image:height" content="300" /> <!-- height of above image; add both width and height so FIRST user to share can see image in post -->
<meta property="og:type"        content="article">
<meta name="twitter:title"      content="page title" />
<meta name="twitter:url"        content="page url" />
<meta name="twitter:image"      content="link_to_image" />

<!--link to anchor of copyright-->
<link rel="copyright" href="#henry_copyright"/>

<!--For Google Search-->
<!--
<PageMap>
 <DataObject type="thumbnail">
    <Attribute name="src" value="http://www.example.com/papers/sic.png" />
    <Attribute name="width" value="627" />
    <Attribute name="height" value="167" />
 </DataObject>
</PageMap>
-->

<!--typekit-->
<script type="text/javascript" src="//use.typekit.net/kpa3nbi.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<!--framework-->
<script src="https://www.ebsco.com/apps/global/clarke/js/source/eis.js"></script>

<!--site styles-->
<link rel="stylesheet" href="css/main_ep.css" />

<!--favicon if needed-->
<link rel="shortcut icon" href="https://www.ebsco.com/favicon.ico" />

<!-- enhancements, fallbacks-->
<script src="https://www.ebsco.com/apps/global/vendor/modernizr-2.6.2.min.js"></script>
<!--[if lt IE 9]><script type="text/javascript" src="https://www.ebsco.com/apps/global/vendor/css3-mediaqueries.js"></script><![endif]-->
