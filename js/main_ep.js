"use strict";
var doc = document;
var win = window;

/*
    ========================================
        :: Helper Functions
    ========================================
*/
/*
	frame-loop used for page scroll animation
	usage: FL.eachFrame( your_function )
*/
var FL = (function() {
  var pub = {};
  // use requestAnimationFrame or use setTimeout as a fallback
  var loop = (function() {
    return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback, element) {
      window.setTimeout(callback, 1000 / 60);
    };
  })();
  pub.eachFrame = function(callback) {
    if (callback && typeof(callback) === "function") {
      loop(callback);
    }
  };
  return pub;
}(FL || {}));

// returns current window position (height)
function getPosition() {
  /*
	 * if the browser understands window.pageYOffset, use that for the winPos
	 * otherwise, set winPos to documentElement.scrollTop,
	 * 			or body.parentNode.scrollTop,
	 * 			or body.scrollTop
	 * 			adding in the view height
	 */
  var winPos = ((window.pageYOffset !== undefined)
    ? window.pageYOffset
    : (document.documentElement || document.body.parentNode || document.body).scrollTop) + window.innerHeight;
  return winPos;
}

function isShowing(aElem, tolerance) {
  var viewTop = window.scrollY !== undefined
    ? window.scrollY
    : window.pageYOffset;
  var aElemTop = aElem.offsetTop;
  if (tolerance === undefined) {
    var tolerance = 0;
  }
  var topMeasurement = viewTop + tolerance;
  aElem.style.top = topMeasurement + 'px';
}

// position an element 50px from the viewTop
function positionElem(aElem) {
  isShowing(aElem, 50);
}

// scrolls window to 0,0 position
function scrollUp() {
  var currPos = getPosition();
  var winHeight = window.innerHeight;
  var scrollAmt = currPos > (winHeight * 1.8) ? 100 : 25;
  if (currPos > winHeight) {
    window.scrollTo(0, currPos - winHeight - scrollAmt);
    FL.eachFrame(scrollUp);
  }
}

// helper function to add a class name to an element
function setClass(elem, aClass) {
  var thisElem = elem;
  if (thisElem === null) {
    window.console.log('WARNING: element is null', elem, aClass);
  }
  if (document.documentElement.classList) {
    elem.classList.add(aClass);
  } else {
    try {
      if ((thisElem.className).indexOf(aClass) === -1) {
        if (thisElem.className === '') {
          thisElem.className = aClass;
        } else {
          thisElem.className = thisElem.className + ' ' + aClass;
        }
      }
    } catch (err) {
      window.console.warn(elem, err);
    }
  }
  // return false;
}

// helper function to remove a class name from an element
function removeClass(elem, aClass) {
  if (document.documentElement.classList) {
    elem.classList.remove(aClass);
  } else {
    try {
      if (elem.className === aClass) {
        elem.removeAttribute('class');
      } else {
        elem.className = (elem.className).replace(' ' + aClass, '');
      }
    } catch (err) {
      window.console.warn(elem, err);
    }
  }
  // return false;
}

/*
    ========================================
        ::Site Main Navigation
    ========================================

    USAGE
    ========================================
    Pattern for each site's main header and main navigation sections

    The below markup is assumed to be used; changing class names, ids, or aria properties will impact css and js functionality

    EIS Framework required


    MARKUP:
    ========================================
    <header id="siteHeader" class="special-container">
        <div class="inner">

            <div class="site-id" itemscope itemtype="http://schema.org/Organization">
                <a class="site-id_logo" href="{site_root}" itemprop="url">
                    <img src="{site_logo}" alt="{site_name}" itemprop="logo" />
                </a>
            </div>

            <div class="toolbar group">

                <nav class="toolbar_nav" aria-label="Primary Navigation" role="navigation">
                    <a class="toolbar_menu-btn" href="" aria-haspopup="true" aria-expanded="false">show menu</a>
                    <ul>

                        <!-- ### level 1 items ### -->
                        <li  class="has-submenu">
                            <a href="{level-1_link}" aria-haspopup="true" aria-expanded="false">{level-1_name}</a>
                            <ul>
                                <li><a href="{level-2_link}">{level-2_name}</a></li>
                                <li><a href="{level-2_link}">{level-2_name}</a></li>
                                <li><a href="{level-2_link}">{level-2_name}</a></li>
                            </ul>
                        </li>
                        <li><a href="{level-1_link}">{level-1_name}</a></li>

                        <!-- ### utility items ### -->
                        <li class="utility-link"><a href="{utility-link}">{utility_name}</a></li>
                        <li class="utility-link"><a href="{utility-link}">{utility_name}</a></li>

                        <!-- ### cta item ### -->
                        <li class="toolbar_cta"><a href="{cta_link}">{cta_name}</a></li>
                    </ul>
                </nav>

                <div class="toolbar_utility">
                    <ul class="toolbar_links">
                        <!-- ### utility items ### -->
                        <li class="utility-link"><a href="{utility_link}">{utility_name}</a></li>
                        <li class="utility-link"><a href="{utility_link}">{utility_name}</a></li>
                    </ul>
                </div>

                <a class="toolbar_search" href="{search_link}">{search_name}</a>

            </div>
        </div>
    </header>
    <div id="navOverlay"></div>


    NOTES:
    ========================================

*/
EIS.loadOnce('jQuery', function() {

  var $topNav = $('.toolbar_nav > ul'),
    $itemsWithDrop = $('.has-submenu'),
    $dropItems = $itemsWithDrop.find('li'),
    $mobileBtn = $('.toolbar_menu-btn'),
    $navOverlay = $('#navOverlay'),
    strAnimClass = 'isOpen';

  // ========== desktop event bindings ==========//

  // on hover of nav item with drop down, change the aria-expanded attr (css handles dropdown)
  $itemsWithDrop.on({
    mouseenter: function() {
      $(this).find('a[aria-haspopup]').attr('aria-expanded', 'true');
    },
    mouseleave: function() {
      $(this).find('a[aria-haspopup]').attr('aria-expanded', 'false');
    }
  });

  // when user tabs into nav item with drop down, trigger hover events
  $itemsWithDrop.on({
    focusin: function() {
      $(this).trigger('mouseenter');
    },
    focusout: function() {
      $(this).trigger('mouseleave');
    }
  });

  // when user tabs through drop down menu items, add a class to the parent (css will keep dropdown open)
  $dropItems.on({
    focusin: function() {
      $(this).closest('.has-submenu').trigger('mouseenter').addClass(strAnimClass);
    },
    focusout: function() {
      $(this).closest('.has-submenu').trigger('mouseleave').removeClass(strAnimClass);
    }
  });

  // ========== mobile event bindings ==========//

  // when user clicks or tabs the mobile icon, add a class (css handles dropdown)
  $mobileBtn.on({
    click: function() {
      return false;
    },
    mousedown: function(evt) {
      evt.preventDefault();
      if ($topNav.hasClass(strAnimClass)) {
        $topNav.removeClass(strAnimClass);
        $mobileBtn.attr('aria-expanded', 'false');
        $navOverlay.fadeOut('150');
      } else {
        $navOverlay.fadeIn('150');
        $topNav.addClass(strAnimClass);
        $mobileBtn.attr('aria-expanded', 'true');
      }
    },
    focusin: function() {
      $topNav.addClass(strAnimClass);
      $mobileBtn.attr('aria-expanded', 'true');
      $navOverlay.fadeIn('150');
    }
  });

  // when user clicks off from the nav, hide nav
  $navOverlay.on('click', function() {
    if ($topNav.hasClass(strAnimClass)) {
      $mobileBtn.trigger('mousedown');
    }
  });

});
/* ===== END ::Site Main Navigation ===== */

/*
    ========================================
        ::Responsive Images
    ========================================

    USAGE
    ========================================
    Pattern for scaling images to the width of it's parent regardless of image actual size

    The below markup is assumed to be used; changing class names, ids, or aria properties will impact css and js functionality

    Framework is not required


    MARKUP:
    ========================================
    <picture class="fluid-image">
        <source media="(min-width: 800px)" srcset="http://placekitten.com/1200/200">
        <source media="(min-width: 600px)" srcset="http://placekitten.com/800/400">
        <img alt="Example of responsive image" class="img" src="http://placekitten.com/600/300">
        <p class="caption">This is an example of a responsive image using the <code>&lt;picture&gt; element</p>
    </picture>


    VARIATIONS:
    ========================================


    NOTES:
    ========================================
    Does not use framework grid system (assumes parent has complete control over width)

    The addition of the .caption text is optional


*/
/* removed jQuery dependency */
var hasPictureElem = doc.querySelectorAll('picture').length > 0
  ? true
  : false;
var picturefillSrc = 'https://www.ebsco.com/apps/global/vendor/picturefill.min.js';

if (hasPictureElem) {
  EIS.loadScript(picturefillSrc, function() {
    win.console.log('picturefill loaded');
  });
}

/*
    ========================================
        ::Expander Lists
    ========================================
*/

var expanderElem = null;
var hasExpanderElem = doc.querySelectorAll('.fnExpander').length > 0
  ? true
  : false;

// add controller for expanders (if not set)
function setupExpanderCtrl(aElem, aConfig) {
  EIS.loadOnce('jQuery', function() {
    var expandCtrl = "<a href=\"Javascript:void(0);\" class=\"expandCtrl\"><span class='expand-icon'></span></a>";
    $(aElem).after(expandCtrl).data("config", aConfig);
    $(aElem).addClass('closed');

    $(aElem).next('.expandCtrl').on('click', function() {
      if ($(aElem)[0].className.indexOf('closed') !== -1) {
        $(aElem).children('.isOverflow').slideDown(500);
        $(aElem).removeClass('closed').addClass('opened');
      } else {
        $(aElem).children('.isOverflow').slideUp(500);
        $(aElem).removeClass('opened').addClass('closed');
      }
      return false;
    });
  });
}

function setupExpanderList(aElem) {
  // setup default options
  var aConfig = {
    showCount: 5, // # of list items to show when collapsed
    expandText: "click to show more", // text of the control when list is collapsed
    collapseText: "click to show less" // text of the control when list is expanded
  };
  var hasOverflow = false; // bool to tell if the list has more items than the showCount setting
  var theChildren = aElem.children;

  // check for config overrides === data-show-count="#" or data-expand-text="expand text" or data-collapse-text="collapse text"
  if (aElem.hasAttribute('data-showCount')) {
    aConfig.showCount = aElem.getAttribute('data-showCount');
  }
  if (aElem.hasAttribute('data-expandText')) {
    aConfig.showCount = aElem.getAttribute('data-expandText');
  }
  if (aElem.hasAttribute('data-collapseText')) {
    aConfig.showCount = aElem.getAttribute('data-collapseText');
  }

  // loop through and for every item > threshhold add hide class
  for (var i = 0; i < theChildren.length; i++) {
    if (i > (aConfig.showCount - 1)) {
      setClass(theChildren[i], 'isOverflow');
      // $(this).addClass('isOverflow');
      hasOverflow = true;
    }
  }

  // add show more text link
  if (hasOverflow) {
    setupExpanderCtrl(aElem, aConfig);
  }
} // setupExpander

if (hasExpanderElem) {
  expanderElem = doc.querySelectorAll('.fnExpander');
  for (var i = 0; i < expanderElem.length; i++) {
    setupExpanderList(expanderElem[i]);
  }
}

/*
    ========================================
        ::List Toggle
    ========================================
*/
var listToggleElem = null;
var hasListToggle = doc.querySelectorAll('.fnListToggle').length > 0
  ? true
  : false;

if (hasListToggle) {
  listToggleElem = doc.querySelectorAll('.fnListToggle');
  for (var i = 0; i < listToggleElem.length; i++) {
    listToggleElem[i].addEventListener('click', function(evt) {
      evt.preventDefault();
      if (this.className.indexOf('active') === -1) {
        setClass(this, 'active');
      } else {
        removeClass(this, 'active');
      }
      return false;
    }, false);
  };
}

/*
    ========================================
        ::Read More
    ========================================
*/

/*
    Dino's addition for review
    Checks the height of fnReadMore section, if < 300 remove closed class
    add opened to stay expanded, add hide for +- animation (can it be chained?)

    Else go on with what you were doing before
*/

/* !!! need to check for EXISTENCE of fnReadMore otherwise pages will error */
/* code being re-inserted
var fnreadmore = document.querySelector(".fnReadMore");
var readmoreholder = document.querySelector(".readMore-holder");
    if (fnreadmore.offsetHeight < 300) {
        removeClass(fnreadmore, 'closed');
        setClass(fnreadmore, 'opened');
        setClass(readmoreholder, 'hide');
    } else {

var readMoreElem = null;
var hasReadMoreElem = doc.querySelectorAll('.fnReadMore').length > 0
  ? true
  : false;
}
*/

var readMoreElem = null;
var readMoreHolder = null;
var hasReadMoreElem = doc.querySelectorAll('.fnReadMore').length > 0
  ? true
  : false;


// bind trigger event
function setupReadMore(aElem, anOffset) {
  var thisTrigger = aElem.querySelector('.readMore-holder');
  thisTrigger.addEventListener('click', function(evt) {
    window.console.log( 'click' );
    evt.preventDefault();
    if (aElem.className.indexOf('closed') !== -1) {
      setClass(aElem, 'opened');
      removeClass(aElem, 'closed');
      aElem.querySelector( '.content' ).style.height = anOffset+'px';
    } else {
      setClass(aElem, 'closed');
      removeClass(aElem, 'opened');
      aElem.querySelector( '.content' ).style.height = '175px';
    }
    return false;
  }, false);
}

document.onreadystatechange = function () {
  if (document.readyState === "complete") {
    if (hasReadMoreElem) {
      readMoreElem = doc.querySelectorAll('.fnReadMore');
      readMoreHolder = doc.querySelectorAll(".readMore-holder");
      for (var i = 0; i < readMoreElem.length; i++) {
        window.console.log( 'readMoreElem[i].offsetHeight', readMoreElem[i].offsetHeight );
        var theOffset = readMoreElem[i].offsetHeight;
        if ( theOffset > 300 ) {
          removeClass( readMoreElem[i], 'opened' );
          setClass( readMoreElem[i], 'closed' );
          readMoreElem[i].querySelector( '.content' ).style.height = '175px';
        } else {
          setClass( readMoreHolder[i], 'hide' );
          readMoreElem[i].querySelector( '.content' ).style.height = theOffset+'px';
        }
        // readMoreElem[i].querySelector( '.content' ).style.height = theOffset+'px';
        setupReadMore(readMoreElem[i], theOffset );
      }
    }
  }
}


/*
    ========================================
        ::Image Slideshow
    ========================================
*/
var issElem = null;
var hasIss = doc.querySelectorAll('.image-slideshow').length > 0
  ? true
  : false;

function getNextItemNumber(figureLeft, pagingDirection) {
  return (Math.abs((figureLeft + pagingDirection) / 100)) + 1;
}

// updates controls visibility based on current item
function updateCtrls(currItem) {
  if (currItem === 1) {
    issCtrlPrev.style.visibility = 'hidden';
  } else {
    issCtrlPrev.style.visibility = 'visible';
  }
  if (currItem === imageCount) {
    issCtrlNext.style.visibility = 'hidden';
  } else {
    issCtrlNext.style.visibility = 'visible';
  }
}

if (hasIss) {
  issElem = doc.querySelectorAll('.image-slideshow')[0];
  var issCtrlPrev = issElem.querySelector('.ctrl-prev');
  var issCtrlNext = issElem.querySelector('.ctrl-next');
  var issSlider = doc.getElementById('slider');
  var figure = issSlider.querySelector('figure');
  var images = issSlider.querySelectorAll('img');
  var ctrlCountElem = issElem.querySelector('.total-count');
  var ctrlCurrentElem = issElem.querySelector('.current-count');
  var imageCount = images.length;
  // set the image count display
  ctrlCountElem.innerText = imageCount;
  // set the left/right controls display to the first item */
  updateCtrls(1);
  // slider width should be item count times 100
  var sliderWidth = imageCount * 100;
  figure.style.width = sliderWidth + '%';
  // each image width is then 1 / imageCount
  var imageWidth = (1 / imageCount) * 100;
  // set each img element width
  for (var i = 0; i < imageCount; i++) {
    images[i].style.width = imageWidth + '%';
  }
  // bind click handlers on controls
  issCtrlPrev.addEventListener('click', function(evt) {
    evt.preventDefault();
    var figureStyle = figure.style.left !== ''
      ? figure.style.left
      : '0';
    var figureLeft = parseFloat(figureStyle);
    if (figureLeft < 0) {
      figure.style.left = figureLeft + 100 + '%';
      var currItem = getNextItemNumber(figureLeft, + 100);
      ctrlCurrentElem.innerText = currItem;
      updateCtrls(currItem);
    }
    return false;
  });
  issCtrlNext.addEventListener('click', function(evt) {
    evt.preventDefault();
    var figureStyle = figure.style.left !== ''
      ? figure.style.left
      : '0';
    var figureLeft = parseFloat(figureStyle);
    if (Math.abs(figureLeft) < sliderWidth - 100) {
      figure.style.left = figureLeft - 100 + '%';
      var currItem = getNextItemNumber(figureLeft, -100);
      ctrlCurrentElem.innerText = currItem;
      updateCtrls(currItem);
    }
    return false;
  });
}

/*
    ========================================
        ::Modal Display of Anchor Targets
    ========================================
*/
var theBody = doc.querySelector('body');
var modalLink = null;
var hasModal = doc.querySelectorAll('.fnModal').length > 0
  ? true
  : false;
var hasForm = doc.querySelectorAll('.fnFormModal').length > 0
  ? true
  : false;
var hasVideo = doc.querySelectorAll('.fnOpen').length > 0
  ? true
  : false;
var player = null;

// returns the overlay element; will create element if it doesn't exist
function getOverlayElem() {
  return theBody.querySelector('.overlay') !== null
    ? theBody.querySelector('.overlay')
    : createElem('overlay', 'div', theBody);
}

// creates an element with provided classname and node type
function createElem(aClass, elemType, theBody) {
  var thisElem = doc.createElement(elemType);
  thisElem.className = aClass;
  theBody.appendChild(thisElem);
  return thisElem;
}

// will create or change existing modal structure based on provided modal content element node type
// does NOT set the src value of the modal content (this fn only sets up the structure to the content type needed/passed-in)
function setupModal(contentType) {
  var hasOverlay = doc.querySelectorAll('.overlay').length > 0
    ? true
    : false;
  var theOverlay = getOverlayElem();
  var modal = theBody.querySelector('.modal') !== null
    ? theBody.querySelector('.modal')
    : createElem('modal', 'div', theBody);
  var modal_player = theBody.querySelector('.modal_player') !== null
    ? theBody.querySelector('.modal_player')
    : createElem('modal_player', 'div', theBody);
  var modal_wrapper = theBody.querySelector('.modal_wrapper') !== null
    ? theBody.querySelector('.modal_wrapper')
    : createElem('modal_wrapper', 'div', theBody);
  var modal_content = doc.getElementById('modalContent') !== null
    ? doc.getElementById('modalContent')
    : createElem('modal_content', contentType, theBody);
  var modal_close = theBody.querySelector('.fnClose') !== null
    ? theBody.querySelector('.fnClose')
    : createElem('fnClose', 'a', theBody);

  // if no modal elements, assemble the elements
  if (!hasOverlay) {
    modal_close.innerText = 'close';
    modal_content.id = 'modalContent';
    modal_wrapper.appendChild(modal_close);
    modal_wrapper.appendChild(modal_content);
    modal_player.appendChild(modal_wrapper);
    modal.appendChild(modal_player);
  }

  // if content type is video, set up vimeo api
  if (contentType === 'iframe') {
    EIS.loadOnce('$f', function() {});
  }
}

// user presses Escape key triggers close
function handleKeyupClose(evt) {
  if (evt.preventDefaulted) {
    return; // Do nothing if event already handled
  }
  if (evt.code === 'Escape') {
    closeOverlay();
  }
  evt.preventDefault();
}
// inits vimeo froogaloop api
function setupVimeoVideo(iframeID, autoPlay) {
  var iframe = doc.getElementById(iframeID);
  // the froogaloop ($f) reference to the video served from vimeo
  var player = $f(iframe);

  autoPlay = true;

  function onPause(id) {}

  function onPlay(id) {
    window.console.log('video playing');
  }

  function onFinish(id) {
    $f(id).api('seekTo', 0);
  }

  function onPlayProgress(data, id) {}

  // When the player is ready, add listeners for pause, finish, and playProgress
  player.addEvent('ready', function() {
    player.addEvent('pause', onPause);
    player.addEvent('play', onPlay);
    player.addEvent('finish', onFinish);
    player.addEvent('playProgress', onPlayProgress);

    // if autoPlay is true, call froogaloop play method
    if (autoPlay) {
      // set the timecode to zero as no need to show the 'display' frame if we're autoplaying
      // *** removed this code as it breaks in IE 9 *** //
      //player.api('seekTo', 0);

      // delay playing the video so it doesn't feel so choppy
      var thisTicker = setTimeout(function() {
        player.api('play');
        clearTimeout(thisTicker);
        thisTicker = null;
      }, 1000);
    }
  });
  return player;
}

// sets modal content to provided node type and source url
// sets classes on modal to active
// binds event listeners for closing modal
function showContent(aUrl, contentType) {
  var theOverlay = getOverlayElem();
  var modal = theBody.querySelector('.modal');
  var modal_wrapper = theBody.querySelector('.modal_wrapper');
  var modal_content = doc.getElementById('modalContent');
  var modal_close = theBody.querySelector('.fnClose');
  var modalClassCurr = 'modal-type_' + modal_content.nodeName;
  var modalClass = 'modal-type_' + contentType;

  // if the existing modal content node type does not match the provided type, change the node type to the provided type
  if (modal_content.nodeName !== contentType) {
    // remove existing node type class
    removeClass(modal, modalClassCurr);
    modal_wrapper.replaceChild(createElem('modal_content', contentType, theBody), modal_content);
    modal_content = theBody.querySelector('.modal_content');
    // set the new node type class
    setClass(modal, modalClass);
    modal_content.id = 'modalContent';
  }

  if (contentType === 'form') {
      var thisElem = doc.querySelector( aUrl );
      modal_content.appendChild ( thisElem );

  } else {
      modal_content.src = aUrl;
  }
  setClass(theOverlay, 'active');
  setClass(modal, 'active');
  // sets the position of the modal 50px from the viewTop
  positionElem(modal);

  // bind close modal evt
  theOverlay.addEventListener('click', closeOverlay, false);
  modal_close.addEventListener('click', closeOverlay, false);
  window.addEventListener('keyup', handleKeyupClose, true);

  // if the content type is video, add in vimeo event handling
  if (contentType === 'iframe') {
    modal_content.onload = function() {
      var thisIframeID = 'modalContent';
      var autoPlay = false;
      player = setupVimeoVideo(thisIframeID, autoPlay);
      player.api('play');
    }
  }
}

// removes active classes from modal
// removes Escape key event handler
function closeOverlay(evt) {
  var theOverlay = theBody.querySelector('.overlay');
  var modal = theBody.querySelector('.modal');
  if (player !== null) {
    player.api('pause');
  }
  modal.style.top = '-100%';
  removeClass(theOverlay, 'active');
  removeClass(modal, 'active');
  window.removeEventListener('keyup', handleKeyupClose, true);
}

// runtime - if page has modal call for an img type setup modal and add event listeners
if (hasModal) {
  setupModal('img');
  modalLink = doc.querySelectorAll('.fnModal');
  for (var i = 0; i < modalLink.length; i++) {
    modalLink[i].addEventListener('click', function(evt) {
      evt.preventDefault();
      var thisTarget = this.href;
      showContent(thisTarget, 'img');
      return false;
    });
  }
}

if ( hasForm ) {
  setupModal( 'form' );

  if (document.cookie.indexOf("ebsco=corp_newsletter") == -1 ) {
      showContent( '.fnFormModal', 'form' );
      document.cookie = "ebsco=corp_newsletter;path=/;expires=Tue, 19 Jan 2038 03:14:07 GMT";
    }
     else {
         document.querySelector(".modal_newsletter-signup").style = "display: none;";
     }
}

// runtime - if page has modal call for an iframe(video) type setup modal and add event listeners
if (hasVideo) {
  setupModal('iframe');
  // var player = setupVideo();
  modalLink = doc.querySelectorAll('.fnOpen');
  for (var i = 0; i < modalLink.length; i++) {
    modalLink[i].addEventListener('click', function(evt) {
      evt.preventDefault();
      var thisTarget = this.href;
      showContent(thisTarget, 'iframe');
      return false;
    });
  }
}


/*
    ========================================
        ::Corp Modal Newsletter Signup Marketo
    ========================================
*/
/* thanks response for Marketo form submission */
var tyHTML = '<h2>Thank You!</h2>' +
'<p style="text-align:center;">You have subscribed to the EBSCO Insights - Corporations Newsletter.</p>';

EIS.loadOnce('VALIDATE', function() {
  VALIDATE.init(false);
});

/* using custom form with Rest API */
EIS.loadOnce('jQuery', function() {
  var customForm = document.getElementById('eisCorpModal');
  var $onlyFields = $('#email-id').add('#country-id');
  var currentErrors = 0;

  $(customForm).on('submit', function() {
    // get count of form errors
    currentErrors = VALIDATE.testfields($onlyFields);
    if (currentErrors > 0) {
      window.console.log('Fields appear in error');
    } else {
      var formStr = $(customForm).serialize();
      $(customForm).css('opacity', '0.3');
      $('body').css('cursor', 'wait');
      var jqxhr = $.ajax({url: 'https://www.ebsco.com/apps/marketo/api/ebscoeis.php', method: "POST", data: formStr}).fail(function(err) {
        // fail logic
        // window.console.error( 'error retrieving data', err );
      }).done(function(data) {
        customForm.innerHTML = tyHTML;
        $(customForm).css('opacity', '1');
        $('body').css('cursor', 'default');
                GOOGLE.callGaEvent( $(customForm), false );
      });
    }
    return false;
  });
});

/*
    ========================================
        ::Bing Search
    ========================================
*/

/* Bing Search */
EIS.loadScript( '//www.ebsco.com/apps/global/clarke/js/source/mod_search-bing.js', function() {
		var searchCfg = {
				'site' : 'www.ebsco.com'
		};
		SEARCH.init( searchCfg );
} );

/*
    ========================================
        ::Newsletter Show Other checkboxes
    ========================================
*/
var hasNLCheckboxes = doc.querySelectorAll('.checkboxes').length > 0
  ? true
  : false;

if (hasNLCheckboxes) {
  var checkboxContainer = doc.querySelector('.checkboxes');
  var checkboxTrigger = checkboxContainer.querySelector('.fnTrigger');
  var checkboxItems = checkboxContainer.querySelectorAll('.checkbox');
  var checkboxCount = checkboxItems.length;

  // on click
  checkboxTrigger.addEventListener('click', function() {
    if (checkboxContainer.className.indexOf('active') > -1) {
      removeClass(checkboxContainer, 'active');
    } else {
      setClass(checkboxContainer, 'active');
    }
  }, false);
}

/*
    ========================================
        ::Newsletter Show Other checkboxes
    ========================================
*/
var hasNLCheckboxes = doc.querySelectorAll('.checkboxes').length > 0
  ? true
  : false;

if (hasNLCheckboxes) {
  var checkboxContainer = doc.querySelector('.checkboxes');
  var checkboxTrigger = checkboxContainer.querySelector('.fnTrigger');
  var checkboxItems = checkboxContainer.querySelectorAll('.checkbox');
  var checkboxCount = checkboxItems.length;

  // on click
  checkboxTrigger.addEventListener('click', function() {
    if (checkboxContainer.className.indexOf('active') > -1) {
      removeClass(checkboxContainer, 'active');
    } else {
      setClass(checkboxContainer, 'active');
    }
  }, false);
}

/*
    ========================================
        ::Newsletter Signup Marketo
    ========================================
*/
/* thanks response for Marketo form submission */
var thisForm = document.getElementById('mktoForm_15');
var tyHTML = '<h2>Thank You!</h2>' +
'<p style="text-align:center;">You have subscribed to the selected newsletter(s).</p>';

EIS.loadOnce('VALIDATE', function() {
  VALIDATE.init(false);
});

/* using custom form with Rest API */
EIS.loadOnce('jQuery', function() {
  var customForm = document.getElementById('eisCustom');
  var currentErrors = 0;

  $(customForm).on('submit', function() {
    // get count of form errors
    currentErrors = VALIDATE.testfields();
    if (currentErrors > 0) {
      window.console.log('Fields appear in error');
    } else {
      var formStr = $(customForm).serialize();
      $(customForm).css('opacity', '0.3');
      $('body').css('cursor', 'wait');
      var jqxhr = $.ajax({url: 'https://www.ebsco.com/apps/marketo/api/ebscoeis.php', method: "POST", data: formStr}).fail(function(err) {
        // fail logic
        // window.console.error( 'error retrieving data', err );
      }).done(function(data) {
        customForm.innerHTML = tyHTML;
        $(customForm).css('opacity', '1');
        $('body').css('cursor', 'default');
				GOOGLE.callGaEvent( $(customForm), false );
      });
    }
    return false;
  });
});

/*
    ========================================
        ::Back to Top
    ========================================
*/
var hasBackToTop = doc.querySelectorAll('#fnBackToTop').length > 0
  ? true
  : false;
if (hasBackToTop) {
  EIS.loadOnce('jQuery', function() {

    var backToTopElem = $('#fnBackToTop');
    // on scroll check if element should appear
    window.onscroll = function() {

      var listHeight = $('.content-filter').height(),
        screenPos = getPosition(),
        winHeight = $(window).height(),
        docHeight = $(document).height();

      var topSpace = $('.content-filter').offset().top;
      var diff = screenPos - topSpace - 100;
      if (screenPos - topSpace < listHeight) {
        backToTopElem.css('position', 'absolute').css('top', diff + 'px');
      }
      if (getPosition() > topSpace + winHeight) {
        $(backToTopElem).fadeIn(500);
      } else {
        $(backToTopElem).fadeOut(500);
      }
    };

    $(backToTopElem).on('click', function() {
      scrollUp();
      return false;
    });
  });
}

/*
    ========================================
        ::RUNTIME
    ========================================
*/
/* set-up google profiles */
EIS.loadOnce('GOOGLE', function() {
  GOOGLE.init('UA-45931439-1');
});
/* enable cross-domain lead tracking */
EIS.loadOnce('LEAD');
