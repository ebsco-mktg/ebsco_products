<!DOCTYPE html>
<!--[if ltIE 8 ]><html lang="en-US" class="ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en-US" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-US" class=""> <!--<![endif]-->
<head prefix="og: http://ogp.me/ns# article: http://ogp.me/ns/article#">
<!-- ===== START container: HEAD ===== -->
  <?php
    /*
    Variables:
      $title_tag
      $meta_description
    */
    $title_tag = "Product Filter";
    $meta_description = "Product Detail meta description";
    include 'components/page-head/page-head.php';
  ?>
  <!-- ===== END container: HEAD ===== -->
</head>
<body>
  <div id="ebscoSite" class="page_product">
    <header id="siteHeader" class="special-container">
      <div class="inner">
        <?php include 'components/site-logo/site-logo.php'; ?>

        <!-- ===== START container: NAVIGATION ===== -->
        <div class="toolbar group">
          <?php include 'components/site-navigation/site-navigation.php'; ?>
          <?php include 'components/site-navigation/utility-links.php'; ?>
        </div>
      </div>
    </header>
    <div id="navOverlay"></div>

    <!-- ===== START container: Breadcrumb ===== -->
    <section class="container">
      <div class="inner">
        <div class="content breadcrumb-content size1of1">
            <?php include 'components/breadcrumbs/breadcrumb.php'; ?>
        </div>
      </div>
    </section>

    <!-- ===== START container: Page ===== -->
    <section class="container container_product-filter">
      <div class="inner">

        <div class="content size1of1 shift5of12 size7of12 shift5of14 size9of14 shift6of16 size10of16">
          <div class="image_header-icon icon-academic-white">
            <?php include 'components/header-icon/header_icon.php'; ?>
          </div>
          <h1>Academic Databases</h1>
        </div>

        <div class="content content-sidenav size1of1 size9of10 size4of12 size4of14 size4of16">
          <!-- Filter Navigation Component -->
          <?php include "components/side-navigation/side-navigation.php"; ?>
        </div>

        <div class="content content-filter size1of1 size9of10 shift1of12 size7of12 shift1of14 size9of14 shift2of16 size10of16">
          <!-- filter results -->
          <div class="field">
            <input required="required" id="fn_finder-like" name="like" value="" class="search-input fn_finder-like" type="text" onkeypress="if (event.keyCode == 13) { return false; }" placeholder="Find a Database" />
            <a id="searchIcon" href="#icon"></a>
          </div>

          <div class="fulltext-switch">
            <span>Full Text Only</span>
            <?php include 'components/forms/checkbox-toggle.php'; ?>
          </div>

          <div id="fn_finder-result-list">
            <ul id="finder_result_ul" class="result-list">
              <li>No results found</li>
            </ul>
          </div>
          <img id="fnLoading" src="img/ProductLoading.svg" />
          <a id="fnBackToTop" href="#back-to-top"><img src="img/BacktoTop.jpg" /></a>

        </div>
      </div>
    </section>
        <!-- ===== START container: Footer ===== -->
        <?php include 'components/footer/footer.php' ?>
    </div>
    <script src="js/main_ep.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/research-databases.js"></script>
    <script>
      product_finder_config = {
      	result_header_id: 'fn_finder-result-header',
      	result_body_id: 'fn_finder-result-list'
      };
      product_finder.init(product_finder_config); // bind events when the page is loaded
    </script>
</body>
</html>
