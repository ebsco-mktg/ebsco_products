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
    $title_tag = "Product Detail";
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

    <section class="container container_multi-hero">
      <section class="container product-hero">
          <div class="inner">
              <main role="main" aria-labelledby="ariaPageTitle" class="content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                  <?php include 'components/header/header.php'; ?>
                  <div class="btn btn-center">
                      <a class="btn-target" href="#free-trial">Free Trial</a>
                  </div>
              </main>
          </div>
      </section>
      <!-- ===== START container: Hero ===== -->
      <section class="container at-a-glance">
        <div class="inner">
          <div class="image_header-icon icon-glance content content-flush hide4 hide6 hide9 size1of10 size1of12 size1of14 shift3of16 size1of16">
            <?php include 'components/header-icon/header_icon.php'; ?>
          </div>
          <div role="main" class="content size1of1 size8of10 size11of12 size12of14 size12of16">
            <h2>At a Glance</h2>
            <p class="full-text-status">Full Text</p>
            <div class="glance-box">
              <p>
                <span class="label">Subject Area:</span>
                <span class="value">Subject 1, Subject 2, Subject 3</span>
              </p>
              <p>
                <span class="label">Ideal For:</span>
                <span class="value">Group 1, Group 2, Group 3</span>
              </p>
            </div>
            <div class="glance-box">
              <p class="title">Title Lists:</p>
              <p>
                <span class="label">Coverage List:</span>
                <span class="value">
                  <!-- <a href="#pdf">PDF</a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
                  <a href="#xls">Excel</a><span class="pipe">|</span>
                  <a href="#html">HTML</a>
                </span>
              </p>
              <p>
                <span class="label">Subject Title List:</span>
                <span class="value">
                  <!-- <a href="#pdf">PDF</a>&nbsp;&nbsp;|&nbsp;&nbsp; -->
                  <a href="#xls">Excel</a><span class="pipe">|</span>
                  <a href="#html">HTML</a>
                </span>
              </p>
            </div>
          </div>

        </div>
      </section>
    </section>

    <section class="container container_list-matrix">
        <div class="inner">
            <div class="content-lists content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                <h2>Content Includes:</h2>
                <ul>
                    <li>With bullete points. Cras eu enim condimentum urna semper accumsan.</li>
                    <li>Proin imperdiet diam eget sodales lacinia. Cras eu enim condimentum urna semper accumsan. Curabitur aliquam lacus vel odio molestie, sed imperdiet leo fringilla.</li>
                    <li>Curabitur aliquam lacus vel odio molestie, sed imperdiet leo fringilla</li>
                </ul>
                <h2>Subjects Include:</h2>
                <ul class="content-list fnExpander closed" data-collapse-text="show less" data-expand-text="show more" data-show-count="5">
                	<li>Animal science</li>
                	<li>Anthropology</li>
                	<li>Astronomy</li>
                	<li>Biology</li>
                	<li>Chemistry</li>
                	<li>Engineering</li>
                  <li>Ethnic and multicultural studies</li>
                	<li>General science</li>
                	<li>Geography</li>
                	<li>Geology</li>
                	<li>Law</li>
                	<li>Mathematics</li>
                	<li>Music</li>
                	<li>Pharmaceutical sciences</li>
                	<li>Physics</li>
                	<li>Psychology</li>
                	<li>Religion and philosophy</li>
                	<li>Science and technology</li>
                	<li>Veterinary science</li>
                	<li>Women's studies</li>
                	<li>Zoology</li>
                </ul>

                <h2>Customer Success, Access Now, Product Video:</h2>
                <p><a href="#">Applied Science & Technology Source supports wide range of academic programs at N.H. community college</a></p>
                <p><a href="#">GreenInfoOnline.com</a></p>
                <p><a href="#">Product Tutorial</a></p>

            </div>
            <div class="content-quote content size1of1 shift1of12 size10of12 shift1of14 size12of14 shift1of16 size14of16">
                <blockquote class="quote">
                    <p class="quote-text">This database…. Excels in the variety of data it offers on the current status and history of geographic regions, including research with extensive surveys, graphs, diagrams, and images.</p>
                    <p class="quote-attribution">CHOICE Magazine</p>
                </blockquote>
            </div>

        </div>
    </section>

        <section class="container container_sample-content">
            <div class="inner">
                <div class="content-video content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                    <h2>Video with Header</h2>
                    <div class="wrapper">
                      <iframe src="//player.vimeo.com/video/120981813" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                    </div>
                </div>

                <div class="content-slideshow content size1of1 shift1of9 size7of9 shift2of10 size6of10 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                    <?php include 'components/image-slideshow/image-slideshow.php'; ?>
                </div>

                <div class="content-imagelist content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                  <?php include 'components/image-list/image-list.php'; ?>
                </div>

                <div class="content-charts content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                    <?php include 'components/chart-list/chart-list.php'; ?>
                </div>
            </div>
        </section>

        <section class="container container_secondary-description fnReadMore opened">
            <div class="inner">
                <div class="rm-container content-carousel content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                    <h2>Header in most cases</h2>
                    <p>
                        Paragraphs can go here. Pellentesque dapibus velit quis ipsum tincidunt porta. Donec pulvinar luctus velit, quis ultricies lacus ultricies at. Fusce maximus leo et sollicitudin pellentesque. Integer ac aliquam lacus, sit amet rutrum nunc. Aliquam vitae sagittis justo. Cras ultrices nulla a purus viverra, non varius purus vehicula. Donec imperdiet sem nec diurna lectus at tellus. Mauris quis erat quam. Orci varius natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus.
                    </p>
                    <p>
                        Paragraphs can go here. Pellentesque dapibus velit quis ipsum tincidunt porta. Donec pulvinar luctus velit, quis ultricies lacus ultricies at. Fusce maximus leo et sollicitudin pellentesque. Integer ac aliquam lacus, sit amet rutrum nunc. Aliquam vitae sagittis justo. Cras ultrices nulla a purus viverra, non varius purus vehicula. Donec imperdiet sem nec diurna lectus at tellus. Mauris quis erat quam. Orci varius natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus.
                    </p>
                    <p>
                        Paragraphs can go here. Pellentesque dapibus velit quis ipsum tincidunt porta. Donec pulvinar luctus velit, quis ultricies lacus ultricies at. Fusce maximus leo et sollicitudin pellentesque. Integer ac aliquam lacus, sit amet rutrum nunc. Aliquam vitae sagittis justo. Cras ultrices nulla a purus viverra, non varius purus vehicula. Donec imperdiet sem nec diurna lectus at tellus. Mauris quis erat quam. Orci varius natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus.
                    </p>
                    <p>
                        Paragraphs can go here. Pellentesque dapibus velit quis ipsum tincidunt porta. Donec pulvinar luctus velit, quis ultricies lacus ultricies at. Fusce maximus leo et sollicitudin pellentesque. Integer ac aliquam lacus, sit amet rutrum nunc. Aliquam vitae sagittis justo. Cras ultrices nulla a purus viverra, non varius purus vehicula. Donec imperdiet sem nec diurna lectus at tellus. Mauris quis erat quam. Orci varius natoque penatibus et magnis dis parturient montes,
                        nascetur ridiculus mus.
                    </p>
                </div>
                <div class="readMore-holder content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                  <span class="readMore-icon"></span>

                </div>
            </div>
        </section>

        <section class="container additional-materials">
            <div class="inner">
                <div class="content-carousel content content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                    <h1>What can be in Additional Materials:</h1>
                    <h2>Header for Additional Materials:</h2>
                    <p><a href="#">Link to Screenshots</a></p>
                    <p><a href="#">Link to Charts</a></p>
                    <p><a href="#">Link to Flyers</a></p>
                </div>
            </div>
        </section>

        <section class="container container_sample-content">
            <div class="inner">
                <div class="content-video content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                    <h2>Video with Header</h2>
                    <p>[ video ]</p>
                </div>

                <div class="content-slideshow content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                    <h2>Image Slideshow</h2>
                    <p>[ image slideshow ]</p>
                </div>

                <div class="content-imagelist content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                    <h2>Image List (ex: sample content):</h2>
                    <p>[ image list ]</p>
                </div>

                <div class="content-charts content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                    <h2>Charts with Header</h2>
                    <p>[ charts ]</p>
                </div>
            </div>
        </section>

        <section class="container container_related-topics">
            <div class="inner">
                <div class="image_header-icon">
                  <?php include 'components/header-icon/header_icon.php'; ?>
                </div>
                <div class="content size1of1 shift2of12 size8of12 shift2of14 size10of14 shift3of16 size10of16">
                    <h2>You may also be interested in:</h2>
                </div>
                <div class="content size1of1 size3of9 shift1of10 size3of10 shift1of12 size3of12 shift1of14 size4of14 shift2of16 size4of16 itt itt_stacked featured-products product-list">
                  <div class="itt_img-wrapper">
                      <img src="http://placekitten.com/300/120" alt="image description">
                  </div>
                  <div class="itt_title-wrapper">
                      <a href="#product">Product Name</a>
                  </div>
                </div>
                <div class="content size1of1 size3of9 size3of10 size3of12 size4of14 size4of16 itt itt_stacked featured-products product-list">
                  <div class="itt_img-wrapper">
                      <img src="http://placekitten.com/300/120" alt="image description">
                  </div>
                  <div class="itt_title-wrapper">
                      <a href="#product">Product Name</a>
                  </div>
                </div>
                <div class="content size1of1 size3of9 size3of10 size3of12 size4of14 size4of16 itt itt_stacked featured-products product-list">
                  <div class="itt_img-wrapper">
                      <img src="http://placekitten.com/300/120" alt="image description">
                  </div>
                  <div class="itt_title-wrapper">
                      <a href="#product">Product Name</a>
                  </div>
                </div>
            </div>
        </section>

        <!-- ===== START container: Footer ===== -->
        <?php include 'components/footer/footer.php' ?>
    </div>
    <script src="js/main_ep.js"></script>


</body>
</html>
