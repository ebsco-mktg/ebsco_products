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
    $title_tag = "Subject Detail";
    $meta_description = "Subject Detail meta description";
    include 'components/page-head/page-head.php';
  ?>
  <!-- ===== END container: HEAD ===== -->
</head>
<body>
  <!-- ===== START container: PAGE ===== -->
  <div id="ebscoSite" class="page_subject">

    <!-- ===== START container: NAVIGATION ===== -->
    <header id="siteHeader" class="special-container">
      <div class="inner">
        <?php include 'components/site-logo/site-logo.php'; ?>
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

    <!-- ===== START container: Hero ===== -->
    <section class="container container_hero">
      <div class="inner">
        <div class="image_header-icon icon-corporate content content-flush hide4 hide6 hide9 size1of10 size1of12 size1of14 size1of16">
          <?php include 'components/header-icon/header_icon.php'; ?>
        </div>
        <main role="main" aria-labelledby="ariaPageTitle" class="content size1of1 size9of10 size10of12 size10of14 size10of16">
          <?php include 'components/header/header.php'; ?>
          <?php include 'components/buttons/video-button.php'; ?>
        </main>
      </div>
    </section>

    <!-- ===== START container: Featured Databases ===== -->
    <section class="container container_featured-db">
      <div class="inner">
        <div class="content size1of1 shift1of10 size8of10 shift1of12 size10of12 shift1of14 size12of14 shift1of16 size14of16">
          <h2>Featured Databases</h2>
        </div>
        <div class="content size1of1 size3of9 shift1of10 size3of10 shift1of12 size3of12 shift1of14 size4of14 shift1of16 size4of16 itt itt_stacked featured-products product-list">
          <div class="itt_img-wrapper">
              <a href="#"><img src="http://placekitten.com/300/120" alt="image description"></a>
          </div>
          <div class="itt_title-wrapper">
              <a href="#product">Product Name</a>
          </div>
        </div>
        <div class="content size1of1 size3of9 size3of10 size3of12 size4of14 size4of16 itt itt_stacked featured-products product-list">
          <div class="itt_img-wrapper">
              <a href="#"><img src="http://placekitten.com/300/120" alt="image description"></a>
          </div>
          <div class="itt_title-wrapper">
              <a href="#product">Product Name</a>
          </div>
        </div>
        <div class="content size1of1 size3of9 size3of10 size3of12 size4of14 size4of16 itt itt_stacked featured-products product-list">
          <div class="itt_img-wrapper">
              <a href="#"><img src="http://placekitten.com/300/120" alt="image description"></a>
          </div>
          <div class="itt_title-wrapper">
              <a href="#product">Product Name</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== START container: Product Index List ===== -->
    <section class="container container_product-index">
      <div class="inner">
        <div class="content size1of1 shift1of10 size8of10 shift1of12 size10of12 shift1of14 size12of14 shift1of16 size14of16">
          <h2>Research Databases</h2>
          <dl class="product-list">
            <?php
              /*
              Variables:
                $loopCount
              */
              $loopCount = 10;
              include 'components/product-list/product-list.php';
            ?>
          </dl>
        </div>

        <div class="content content-hr size1of1 shift1of10 size6of10 shift1of12 size6of12 shift1of14 size6of14 shift1of16 size6of16">
          <hr />
        </div>

        <!-- ===== START container: Digital Archive Index List ===== -->
        <div class="content size1of1 shift1of10 size8of10 shift1of12 size10of12 shift1of14 size12of14 shift1of16 size14of16">
          <h2>Historical Digital Archives</h2>
          <dl class="product-list">
            <?php
              /*
              Variables:
                $loopCount
              */
              $loopCount = 3;
              include 'components/product-list/product-list.php';
            ?>
          </dl>
        </div>

      </div>
    </section>

    <!-- ===== START container: Footer ===== -->
    <?php include 'components/footer/footer.php' ?>
  </div>
  <script src="js/main_ep.js"></script>
</body>
</html>
