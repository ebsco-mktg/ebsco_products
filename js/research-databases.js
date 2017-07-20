"use strict";

function isVisible() {
  var lastResultItem = document.querySelector('#finder_result_ul li:last-of-type');
  var rect = lastResultItem.getBoundingClientRect();
  return (rect.top >= 0 && rect.bottom <= window.innerHeight);
}

function checkForPaging(config) {
  var itemIsVisible = isVisible();
  if (!isFetching && morePages === 'true') {
    if (itemIsVisible) {
      addPageAnimation($('#fn_finder-result-list'));
      window.clearTimeout(animTimer);
      animTimer = window.setTimeout(function() {
        finder_result_page++;
        product_finder.run(config);
      }, 250);
    }
  } else {
    window.removeEventListener('scroll', checkForPaging, false);
  }
}

// adds animated fadeout class to passed-in elements
function addPageAnimation(theElems) {
  $(theElems).addClass('thinking');
}
// removes animated fadeout class from all elements
function removePageAnimation() {
  var thinkingElems = $('.thinking');
  $(thinkingElems).removeClass('thinking');
}

///// SET GLOBAL VARIABLE(S):
var animTimer = null;
var finder_result_page = 1;
var isFetching = false;
var morePages = false;
var product_finder = {
  init: function(config) {

    /////	CHECK AN INSTITUTION RADIO-BUTTON BASED ON HASH IF POSSIBLE:
    var hash = location.hash.substring(13).replace('=', ''); // Skip over "#institution=' and remove potentially troublesome character.
    if (hash) {
      $('input[data-market_token=' + hash + ']').attr('checked', true).addClass('current');
    }

    // Bind events:
    $('input.fn_finder-market, input.fn_finder-ft-only').change(function() { // Note: this syntax is deprecated for .click
      addPageAnimation($('.container_product-filter > *'));
      $('.current').removeClass('current');
      if ($(this).hasClass('fn_finder-market')) {
        $(this).addClass('current');
      }
      $('.fnListToggle').removeClass('active');
      scrollUp();
      window.clearTimeout(animTimer);
      animTimer = window.setTimeout(function() {
        finder_result_page = 1;
        product_finder.run(config);
      }, 250);

    });
    $('input.fn_finder-like').keyup(function() {
      if (!isFetching) {
        addPageAnimation($('.container_product-filter .content-sidenav').add('#fn_finder-result-list'));
        animTimer = window.setTimeout(function() {
          finder_result_page = 1;
          product_finder.run(config);
        }, 250);
      }
    });
    // Replace this with something better later
    $('#temp-lazyload-trigger').click(function() {
      finder_result_page++;
      product_finder.run(config);
    });

    // bind clear action on click of 'x' icon in input field
    var searchIconA = document.querySelector('#searchIcon');
    var searchInput = document.querySelector('.search-input');
    searchIconA.addEventListener('click', function(evt) {
      evt.preventDefault();
      addPageAnimation($('.container_product-filter .content-sidenav').add('#fn_finder-result-list'));
      searchInput.value = '';
      window.clearTimeout(animTimer);
      animTimer = window.setTimeout(function() {
        finder_result_page = 1;
        product_finder.run(config);
      }, 250)
      return false;
    }, false);

    // Run on page-load:
    addPageAnimation($('.container_product-filter > *'));
    product_finder.run(config);
  },

  run: function(config) {
    // BASIC VARIABLES
    var base_url = 'https://www.ebsco.com/products_dev/research-databases-finder';
    var querystring = '';

    // SEARCH AND PRESENTATION PARAMETERS
    var market_id = $("input[name=market]:checked").val();
    var market_token = $("input[name=market]:checked").data('market_token');
    var ft_only = $("input[name=ft_only]:checked").val()
      ? 'true'
      : '';
    var like = $("input[name=like]").val();
    var result_title = $("input[name=market]:checked").data('result_title');
    var page = finder_result_page;

    ////////////////////   PLACE THE HASH   /////////////////
    if (market_id) {
      location.hash = 'institution=' + market_token;
      //location.hash += 'query_name=' + query_name;
    } else {
      location.hash = '';
    }

    ////////////////////   CONSTRUCT THE QUERY-URL   ///////////////////
    querystring += (market_id == ''
      ? ''
      : '&market_id=' + market_id);
    querystring += (market_token == ''
      ? ''
      : '&market_token=' + market_token);
    querystring += (ft_only == ''
      ? ''
      : '&ft_only=' + ft_only);
    querystring += (like == ''
      ? ''
      : '&like=' + encodeURI(like));
    querystring += (result_title == ''
      ? ''
      : '&result_title=' + result_title);
    querystring += (page == ''
      ? '1'
      : '&page=' + page);

    // Page-size: a default limit exists in the query-template, but we can override it here:
    querystring += '&limit=20';

    if (querystring.length > 0) {
      querystring = querystring.substring(1);
      querystring = '?' + querystring;
    }

    var query_url = base_url + querystring;

    $('#fn_finder-debug').html(query_url);
    isFetching = true;
    $.ajax({
      url: query_url,
      success: function(result) {
        //$('#fn_finder-results').html(query_url + result);
        product_finder.display(result, config);
      },
      complete: function() {
        // window.console.log( 'fetch done' );
        isFetching = false;
      }
    });

    // window.console.log('product_finder.run triggered');
  },

  display: function(results_json, config) {
    var result_body = document.getElementById(config.result_body_id);

    var results = JSON.parse(results_json);
    var result_title = results['header']['title'];
    var result_market_token = results['header']['market_token'];
    var result_more_pages = results['header']['more_pages'];
    morePages = result_more_pages;
    //	var result_image = results['header']['image'];
    var result_list = results['result_list'];

    var display_header = '';
    //var display_list = '';

    // GET THE EXISTING UL OR CREATE A FRESH ONE:
    if (finder_result_page == 1) { // If this is the first page, destroy any previous list.
      while (result_body.hasChildNodes()) { // Is this the best way to clear it?
        result_body.removeChild(result_body.lastChild);
      }
      var result_ul = document.createElement('ul'); // Then creat a new one
      result_ul.setAttribute('id', 'finder_result_ul');
      result_ul.className = 'result-list';
      if ( result_list === null ) {
        result_body.appendChild( document.createTextNode( 'Sorry, there are no results for your search.' ) );
      } else {
        result_body.appendChild(result_ul);
      }
    } else {
      var result_ul = document.getElementById('finder_result_ul'); // Else prepare to append to the existing one.
    }
    // Note: at this point, result_ul refers to an existing ul node which may or may not be empty.

    // THIS IS WHERE ALL THE MARKUP TAKES PLACE:

    // Result Header:
    document.querySelectorAll('h1')[0].innerText = result_title;
    document.querySelectorAll('.header_sidemenu span')[0].innerText = ': ' + result_title;
    document.querySelectorAll('.image_header-icon')[0].className = 'image_header-icon icon-' + result_market_token + '-white';
    // display_header += '<h1 class="result_header-' + result_market_token + '">' + result_title + '</h1>';
    // display_header += 'more_pages = ' + result_more_pages;
    // $('#' + config.result_header_id).html(display_header);
    // Result Body:
    var result_fragment = document.createDocumentFragment(); // To hold results temporarily so we can write them to the doc all at once.
    var i = 0;
    for (i in result_list) {
      var result_li = document.createElement('li');
      var result_a = document.createElement('a');
      var result_span = document.createElement('span');
      var result_hrDiv = document.createElement('div');

      result_span.className = 'product-label';
      result_span.innerHTML += result_list[i].ft_indicator
        ? '&nbsp;&nbsp;&bull;&nbsp;&nbsp;full text'
        : '';
      result_span.innerHTML += result_list[i].archive_indicator
        ? '&nbsp;&nbsp;&bull;&nbsp;&nbsp;digital archive'
        : '';
      result_a.href = result_list[i].link;
      result_a.target = result_list[i].linkout_indicator
        ? '_blank'
        : '';
      result_a.innerHTML = result_list[i].title;
      if (result_list[i].linkout_indicator) {
        result_a.className = 'extLink';
      }
      result_li.appendChild(result_a);
      result_li.appendChild(result_span);

      result_fragment.appendChild(result_li);

      result_hrDiv.className = 'content-hr';
      result_hrDiv.appendChild(document.createElement('hr'));
      result_fragment.appendChild(result_hrDiv);
    }
    result_ul.appendChild(result_fragment);
    removePageAnimation();
    window.addEventListener('scroll', checkForPaging, false);
    if ( result_list === null ) {
      window.removeEventListener('scroll', checkForPaging, false);
    }
  }
};
//product_finder.init();
//product_finder.run();
