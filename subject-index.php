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
    $title_tag = "Subject Index";
    $meta_description = "Market Detail meta description";
    include 'components/page-head/page-head.php';
  ?>
  <!-- ===== END container: HEAD ===== -->
</head>
<body>
  <!-- ===== START container: PAGE ===== -->
  <div id="ebscoSite" class="page_market market_academic-libraries">

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

    <!-- ===== START container: Market Hero ===== -->
    <section class="container container_subject-hero">
        <div class="inner">
          <div class="image_header-icon icon-corporate content content-flush size1of10 size1of12 size1of14 size1of16">
            <?php include 'components/header-icon/header_icon.php'; ?>
          </div>
            <main role="main" aria-labelledby="ariaPageTitle" class="content size4of6 size9of10 size8of12 size10of14 size10of16">
              <h1 id="ariaPageTitle">Academic Subjects</h1>
            </main>
          </div>
      </section>

    <!-- ===== START container: Subject List ===== -->
    <section class="container container_subject-list">
      <div class="inner">
        <div class="content size1of1 shift1of12 size10of12 shift1of14 size12of14 shift1of16 size14of16">
          <ul>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
            <li><a href="#">List Item Subject Name</a></li>
          </ul>
        </div>
      </div>
    </section>

    <section class="container container_school-segments">
      <div class="inner">
        <div class="content size1of1 size0of9 size4of9 shift1of10 size4of10 shift0of12 size4of12 shift1of16 size4of16">
          <div class="btn btn-hollow">
            <a href="{preload-schools-path}/high-schools" class="btn-target">High Schools</a>
          </div>
        </div>
        <div class="content size1of1 shift1of9 size4of9 shift0of10 size4of10 shift0of12 size4of12 shift1of16 size4of16">
          <div class="btn btn-hollow">
            <a href="{preload-schools-path}/middle-schools" class="btn-target">Middle Schools</a>
          </div>
        </div>
        <div class="content size1of1 size0of9 size4of9 shift1of10 size4of10 shift0of12 size4of12 shift1of16 size4of16">
          <div class="btn btn-hollow">
            <a href="{preload-schools-path}/elementary-schools" class="btn-target">Elementary Schools</a>
          </div>
        </div>
        <div class="content size1of1 shift1of9 size4of9 shift0of10 size4of10 shift0of12 size4of12 shift1of16 size4of16">
          <div class="btn btn-hollow">
            <a href="{preload-schools-path}/canada-schools" class="btn-target">Canada Schools</a>
          </div>
        </div>
        <div class="content size1of1 size0of9 size4of9 shift1of10 size4of10 shift0of12 size4of12 shift1of16 size4of16">
          <div class="btn btn-hollow">
            <a href="{preload-schools-path}/australia-new-zealand-schools" class="btn-target">Australia &amp; New Zealand Schools</a>
          </div>
        </div>
        <div class="content size1of1 shift1of9 size4of9 shift0of10 size4of10 shift0of12 size4of12 shift1of16 size4of16">
          <div class="btn btn-hollow">
            <a href="{preload-schools-path}/uk-ireland-schools" class="btn-target">UK &amp; Ireland Schools</a>
          </div>
        </div>
      </div>
    </section>

    <section class="container container_newsletter-signup">
        <div class="inner">
          <div class="content content-icon size1of1 shift1of9 size7of9 shift1of10 size8of10 shift1of12 size10of12 shift1of14 size12of14 shift1of16 size14of16">
            <div class="image_header-icon">
              <?php include 'components/header-icon/header_icon.php'; ?>
            </div>
          </div>
          <div class="content size1of1 shift2of9 size5of9 shift2of10 size6of10 shift3of12 size6of12 shift4of14 size6of14 shift5of16 size6of16">
            <form action="https://www.ebsco.com/" id="eisCustom" class="form-behavior">
              <h2>Get Our Academic Newsletter</h2>
              <input type="hidden" name="prefACADAcadInsightsOptin" value="on" />
              <div class="field">
                <input type="email" placeholder="Email Address" required="required" />
              </div>
              <div class="field select">
                <select class="required" name="Country">
                  <option value="">Country*</option>
                  <optgroup label="Quick List">
                    <option value="Australia">Australia</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Canada" data-state="CA">Canada</option>
                    <option value="China">China</option>
                    <option value="Germany">Germany</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Spain">Spain</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States" data-state="US">United States</option>
                  </optgroup>
                  <optgroup label="Full List">
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antarctica">Antarctica</option>
                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire, Saint Eustatius and Saba">Bonaire, Saint Eustatius and Saba</option>
                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada" data-state="CA">Canada</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo, Democratic Republic">Congo, Democratic Republic</option>
                    <option value="Congo, Republic of the">Congo, Republic of the</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                    <option value="Croatia/Hrvatska">Croatia/Hrvatska</option>
                    <option value="Curaçao">Curaçao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guernsey">Guernsey</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea, Republic of">Korea, Republic of</option>
                    <option value="Kosovo">Kosovo</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Micronesia, Federal State of">Micronesia, Federal State of</option>
                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Micronesia, Federal State of">Micronesia, Federal State of</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Netherlands Antilles (Deprecated)">Netherlands Antilles (Deprecated)</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Reunion Island">Reunion Island</option>
                    <option value="Romania">Romania</option>
                    <option value="Russian Federation">Russian Federation</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Saint Helena">Saint Helena</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome">Sao Tome</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Sint Maarten">Sint Maarten</option>
                    <option value="Slovak Republic">Slovak Republic</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="State of Palestine">State of Palestine</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States" data-state="US">United States</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                  </optgroup>
                </select>
              </div>

              <div class="field checkboxes">
                  <p class="fnTrigger"><span class="trigger-icon">+</span>Additional Newsletters</p>
                  <div class="field nl-field checkbox">
                      <input class="nl-input" id="newsletter1" type="checkbox" name="prefCORPCorpInsightsOptin">
                      <label class="nl-label" for="newsletter1"><span></span> Corporate Insights</label>
                  </div>
                  <div class="field nl-field checkbox">
                      <input class="nl-input" id="newsletter2" type="checkbox" name="prefMEDHealthInsightsOptin">
                      <label class="nl-label" for="newsletter2"><span></span> Health Insights</label>
                  </div>
                  <div class="field nl-field checkbox">
                      <input class="nl-input" id="newsletter3" type="checkbox" name="prefPUBK12K12InsightsOptin">
                      <label class="nl-label" for="newsletter3"><span></span> Schools Insights</label>
                  </div>
                  <div class="field nl-field checkbox">
                      <input class="nl-input" id="newsletter4" type="checkbox" name="prefPUBK12PubInsightsOptin">
                      <label class="nl-label" for="newsletter4"><span></span> Public Libraries Insights</label>
                  </div>
              </div>
              <div class="field btn btn-submit">
                <input class="btn-target" type="submit" value="Submit" />
              </div>
            </form>
          </div>
        </div>
    </section>


    <!-- ===== START container: Footer ===== -->
    <?php include 'components/footer/footer.php' ?>
  </div>
  <script src="js/main_ep.js"></script>
</body>
</html>
