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
var FL = (function () {
	var pub = {};
	// use requestAnimationFrame or use setTimeout as a fallback
	var loop = (function(){
		return window.requestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		window.oRequestAnimationFrame ||
		window.msRequestAnimationFrame ||
		function(callback, element){
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
	var winPos = ( (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop ) + window.innerHeight;
	return winPos;
}

function isShowing(aElem, tolerance) {
	var viewTop = window.scrollY !== undefined ? window.scrollY : window.pageYOffset;
	var aElemTop = aElem.offsetTop;
	if ( tolerance === undefined) {
		var tolerance = 0;
	}
	var topMeasurement = viewTop+tolerance;
	aElem.style.top = topMeasurement+'px';
}

function positionElem( aElem ) {
	// is display is desktop width, push video down 50px from top; if not (mobile) then don't push - start at 0 from top
	isShowing( aElem, 50 );

	if ( !isShowing ) {
		// make showing
	}
}

// scrolls window to 0,0 position
function scrollUp() {
	var currPos = getPosition();
	var	winHeight = window.innerHeight;
	if ( currPos > winHeight ) {
		window.scrollTo( 0, currPos-winHeight-25 );
		FL.eachFrame( scrollUp );
	}
}

// helper function to add a class name to an element
function setClass( elem, aClass ) {
	var thisElem = elem;
	if( thisElem === null ) {
		window.console.log( 'WARNING: element is null', elem, aClass );
	}
	if( document.documentElement.classList ) {
		elem.classList.add( aClass );
	} else {
		try {
			if ( (thisElem.className).indexOf(aClass) === -1 ) {
				if ( thisElem.className === '' ) {
					thisElem.className = aClass;
				} else {
					thisElem.className = thisElem.className + ' ' + aClass;
				}
			}
		} catch(err) {
			window.console.warn();(elem, err);
		}
	}
	// return false;
}

// helper function to remove a class name from an element
function removeClass( elem, aClass ) {
	if( document.documentElement.classList ) {
		elem.classList.remove( aClass );
	} else {
		try {
			if ( elem.className === aClass ) {
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
EIS.loadOnce( 'jQuery', function() {

	var $topNav = 			$('.toolbar_nav > ul'),
		$itemsWithDrop = 	$( '.has-submenu' ),
		$dropItems = 		$itemsWithDrop.find( 'li' ),
		$mobileBtn = 		$( '.toolbar_menu-btn' ),
		$navOverlay = 		$('#navOverlay'),
		strAnimClass = 		'isOpen';


	// ========== desktop event bindings ==========//

		// on hover of nav item with drop down, change the aria-expanded attr (css handles dropdown)
		$itemsWithDrop.on( {
			mouseenter : 	function() { $(this).find('a[aria-haspopup]').attr( 'aria-expanded', 'true'); },
			mouseleave : 	function() { $(this).find('a[aria-haspopup]').attr( 'aria-expanded', 'false'); }
		});

		// when user tabs into nav item with drop down, trigger hover events
		$itemsWithDrop.on( {
			focusin : 	function() { $(this).trigger( 'mouseenter' ); },
			focusout : 	function() { $(this).trigger( 'mouseleave' ); }
		});

		// when user tabs through drop down menu items, add a class to the parent (css will keep dropdown open)
		$dropItems.on( {
			focusin : 	function() { $(this).closest( '.has-submenu' ).trigger( 'mouseenter' ).addClass( strAnimClass ); },
			focusout : 	function() { $(this).closest( '.has-submenu' ).trigger( 'mouseleave' ).removeClass( strAnimClass ); }
		});


	// ========== mobile event bindings ==========//

		// when user clicks or tabs the mobile icon, add a class (css handles dropdown)
		$mobileBtn.on( {
			click : 		function() { return false; },
			mousedown : 	function(evt) {
								evt.preventDefault();
								if ( $topNav.hasClass( strAnimClass ) ) {
									$topNav.removeClass( strAnimClass );
									$mobileBtn.attr( 'aria-expanded', 'false');
									$navOverlay.fadeOut('150');
								} else {
									$navOverlay.fadeIn( '150' );
									$topNav.addClass( strAnimClass );
									$mobileBtn.attr( 'aria-expanded', 'true');
								}
							},
			focusin : 		function() {
								$topNav.addClass( strAnimClass );
								$mobileBtn.attr( 'aria-expanded', 'true');
								$navOverlay.fadeIn('150');
						  	}
		});

		// when user clicks off from the nav, hide nav
		$navOverlay.on( 'click', function() {
			if ( $topNav.hasClass( strAnimClass ) ) {
				$mobileBtn.trigger( 'mousedown' );
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
var hasPictureElem = doc.querySelectorAll( 'picture' ).length > 0 ? true : false;
var picturefillSrc = 'https://www.ebsco.com/apps/global/vendor/picturefill.min.js';

if ( hasPictureElem ) {
	EIS.loadScript( picturefillSrc, function() {
		win.console.log( 'picturefill loaded' );
	} );
}



/*
    ========================================
        ::Expander Lists
    ========================================
*/

var expanderElem = null;
var hasExpanderElem = doc.querySelectorAll( '.fnExpander' ).length > 0 ? true : false;

// add controller for expanders (if not set)
function setupExpanderCtrl(aElem, aConfig) {
	EIS.loadOnce( 'jQuery', function() {
		var expandCtrl= "<a href=\"Javascript:void(0);\" class=\"expandCtrl\"><span class='expand-icon'></span></a>";
		$(aElem).after(expandCtrl).data("config", aConfig);

		$(aElem).next( '.expandCtrl' ).on( 'click', function() {
			if( $(aElem)[0].className.indexOf('closed') !== -1 ) {
				$(aElem).children('.isOverflow').slideDown( 500 );
				$(aElem).removeClass('closed').addClass('opened');
			} else {
				$(aElem).children('.isOverflow').slideUp( 500 );
				$(aElem).removeClass('opened').addClass('closed');
			}
			return false;
		});

		/*
		// bind click event to show more link
		$(aElem).next('.expandCtrl').toggle(function () {
			//$(this).prev('.fnExpander').children('.isOverflow').slideToggle();
			$(aElem).children('.isOverflow').slideToggle();
			var collapseText = $(aElem).data("config").collapseText;
			$(this).html("<span class='arrow'><span class='arrow-up'></span></span>" + collapseText);
		}, function () {
			$(aElem).children('.isOverflow').slideToggle();
			var expandText = $(aElem).data("config").expandText;
			$(this).html("<span class='arrow'><span class='arrow-down'></span></span>" + expandText);
		});
		*/
	});
}

function setupExpanderList(aElem) {
	// setup default options
	var aConfig = {
		showCount: 5,						// # of list items to show when collapsed
		expandText: "click to show more",	// text of the control when list is collapsed
		collapseText: "click to show less"	// text of the control when list is expanded
	};
	var hasOverflow = false;				// bool to tell if the list has more items than the showCount setting
	var theChildren = aElem.children;


	// check for config overrides === data-show-count="#" or data-expand-text="expand text" or data-collapse-text="collapse text"
	if ( aElem.hasAttribute( 'data-showCount' ) ) {
		aConfig.showCount = aElem.getAttribute( 'data-showCount' );
	}
	if ( aElem.hasAttribute( 'data-expandText' ) ) {
		aConfig.showCount = aElem.getAttribute( 'data-expandText' );
	}
	if ( aElem.hasAttribute( 'data-collapseText' ) ) {
		aConfig.showCount = aElem.getAttribute( 'data-collapseText' );
	}

	// loop through and for every item > threshhold add hide class
	for( var i=0; i<theChildren.length; i++ ) {
		if ( i > ( aConfig.showCount - 1 ) ) {
			setClass( theChildren[i], 'isOverflow' );
			// $(this).addClass('isOverflow');
			hasOverflow = true;
		}
	}

	// add show more text link
	if (hasOverflow) {
		setupExpanderCtrl(aElem, aConfig);
	}
} // setupExpander



if ( hasExpanderElem ) {
	expanderElem = doc.querySelectorAll( '.fnExpander' );
	for ( var i=0; i<expanderElem.length; i++ ) {
		setupExpanderList( expanderElem[i] );
	}
}


/*
    ========================================
        ::List Toggle
    ========================================
*/
var listToggleElem = null;
var hasListToggle = doc.querySelectorAll( '.fnListToggle' ).length > 0 ? true : false;

if ( hasListToggle ) {
	listToggleElem = doc.querySelectorAll( '.fnListToggle' );
	// window.console.log( listToggleElem[0] );
	for ( var i=0; i< listToggleElem.length; i++ ) {
		listToggleElem[i].addEventListener( 'click',
			function(evt) {
				window.console.log( this );
				evt.preventDefault();
				if ( this.className.indexOf('active') === -1 ) {
					setClass( this, 'active' );
				} else {
					removeClass( this, 'active' );
				}
				return false;
			}, false );
	};
}


/*
    ========================================
        ::Read More
    ========================================
*/

var readMoreElem = null;
var hasReadMoreElem = doc.querySelectorAll( '.fnReadMore' ).length > 0 ? true : false;

function setupReadMore( aElem ) {
	/*
	// window.console.log( 'aElem', aElem );
	// add toggle trigger
	var triggerElem = document.createElement( 'a' );
	var triggerIcon = document.createElement( 'span' );
	triggerElem.className = 'readMore-holder';
	// window.console.log( triggerElem );
	triggerIcon.className = 'readMore-icon';
	// window.console.log( triggerElem, triggerIcon, aElem );
	// triggerElem.appendChild( triggerIcon );
	var lastContent = aElem.querySelector( '.content:last-child' );
	// lastContent.appendChild( triggerElem );
	// lastContent.parentNode.insertBefore( triggerElem, lastContent.nextSibling );
	*/
	// bind trigger event
	var thisTrigger = aElem.querySelector( '.readMore-holder' );

	thisTrigger.addEventListener( 'click',
		function( evt ) {
			evt.preventDefault();
			if( aElem.className.indexOf('closed') !== -1 ) {
				setClass( aElem, 'opened' );
				removeClass( aElem, 'closed' );
			} else {
				setClass( aElem, 'closed' );
				removeClass( aElem, 'opened' );
			}
			return false;
		}, false );
}

if ( hasReadMoreElem ) {
	readMoreElem = doc.querySelectorAll( '.fnReadMore' );
	for ( var i=0; i<readMoreElem.length; i++ ) {
		setupReadMore( readMoreElem[i] );
	}
}


/*
    ========================================
        ::Image Slideshow
    ========================================
*/
var issElem = null;
var hasIss = doc.querySelectorAll( '.image-slideshow' ).length > 0 ? true : false;

function getNextItemNumber( figureLeft, pagingDirection ) {
	return ( Math.abs( ( figureLeft + pagingDirection ) / 100) ) + 1;
}

function updateCtrls( currItem ) {
	if ( currItem === 1 ) {
		issCtrlPrev.style.visibility = 'hidden';
	} else {
		issCtrlPrev.style.visibility = 'visible';
	}
	if ( currItem === imageCount ) {
		issCtrlNext.style.visibility = 'hidden';
	} else {
		issCtrlNext.style.visibility = 'visible';
	}
}

if ( hasIss ) {
	issElem = doc.querySelectorAll( '.image-slideshow' )[0];
	var issCtrlPrev = issElem.querySelector( '.ctrl-prev' );
	var issCtrlNext = issElem.querySelector( '.ctrl-next' );
	var issSlider = doc.getElementById( 'slider' );
	var figure = issSlider.querySelector( 'figure' );
	var images = issSlider.querySelectorAll( 'img' );
	var ctrlCountElem = issElem.querySelector( '.total-count' );
	var ctrlCurrentElem = issElem.querySelector( '.current-count' );
	var imageCount = images.length;
	// set the image count display
	ctrlCountElem.innerText = imageCount;
	// set the left/right controls display */
	updateCtrls( 1 );


	// slider width should be item count times 100
	var sliderWidth = imageCount * 100;
	figure.style.width = sliderWidth + '%';
	// each image width is then 1 / imageCount
	var imageWidth = (1/imageCount)*100;

	for( var i = 0; i < imageCount; i++ ) {
		images[i].style.width = imageWidth + '%';
	}

	issCtrlPrev.addEventListener( 'click',
		function( evt ) {
			evt.preventDefault();
			var figureStyle = figure.style.left !== '' ? figure.style.left : '0';
			var figureLeft = parseFloat( figureStyle );
			if ( figureLeft < 0 ) {
				figure.style.left = figureLeft + 100 + '%';
				var currItem = getNextItemNumber( figureLeft, +100 );
				ctrlCurrentElem.innerText = currItem;
				updateCtrls( currItem );
			}
			return false;
	});
	issCtrlNext.addEventListener( 'click',
		function( evt ) {
			evt.preventDefault();
			var figureStyle = figure.style.left !== '' ? figure.style.left : '0';
			var figureLeft = parseFloat( figureStyle );
			if ( Math.abs(figureLeft) < sliderWidth-100 ) {
				figure.style.left = figureLeft - 100 + '%';
				var currItem = getNextItemNumber( figureLeft, -100 );
				ctrlCurrentElem.innerText = currItem;
				updateCtrls( currItem );
		}
			return false;
		});
}


/*
    ========================================
        ::Modal Display of Anchor Targets
    ========================================
*/
var modalLink = null;
var hasModal = doc.querySelectorAll( '.fnModal' ).length > 0 ? true : false;

function createElem( aClass, elemType, theBody ) {
	var thisElem = doc.createElement( elemType );
	thisElem.className = aClass;
	theBody.appendChild( thisElem );
	return thisElem;
}
function handleKeyupClose(evt) {
	window.console.log( 'keyup', evt.code );
	if (evt.preventDefaulted) {
		return; // Do nothing if event already handled
	}
	if ( evt.code === 'Escape' ) {
		closeOverlay();
	}
	evt.preventDefault();

}
function showContent( aUrl ) {
	var theBody = doc.querySelector( 'body' );
	if ( theBody.querySelector( '.overlay' ) !== null ) {
		var theOverlay = theBody.querySelector( '.overlay' ) !== null ? theBody.querySelector( '.overlay' ) : createElem( 'overlay', 'div', theBody );
		var modal_content = theBody.querySelector( '.modal_content' ) !== null ? theBody.querySelector( '.modal_content' ) : createElem( 'modal_content', 'div', theBody );
		var modal_player = theBody.querySelector( '.modal_player' ) !== null ? theBody.querySelector( '.modal_player' ) : createElem( 'modal_player', 'div', theBody );
		var modal_wrapper = theBody.querySelector( '.modal_wrapper' ) !== null ? theBody.querySelector( '.modal_wrapper' ) : createElem( 'modal_wrapper', 'div', theBody );
		var modal_img = theBody.querySelector( '.modal_img' ) !== null ? theBody.querySelector( '.modal_img' ) : createElem( 'modal_img', 'img', theBody );
		var modal_close = theBody.querySelector( '.fnClose' ) !== null ? theBody.querySelector( '.fnClose' ) : createElem( 'fnClose', 'a', theBody );
	} else {
		var theOverlay = theBody.querySelector( '.overlay' ) !== null ? theBody.querySelector( '.overlay' ) : createElem( 'overlay', 'div', theBody );
		var modal_content = theBody.querySelector( '.modal_content' ) !== null ? theBody.querySelector( '.modal_content' ) : createElem( 'modal_content', 'div', theBody );
		var modal_player = theBody.querySelector( '.modal_player' ) !== null ? theBody.querySelector( '.modal_player' ) : createElem( 'modal_player', 'div', theBody );
		var modal_wrapper = theBody.querySelector( '.modal_wrapper' ) !== null ? theBody.querySelector( '.modal_wrapper' ) : createElem( 'modal_wrapper', 'div', theBody );
		var modal_img = theBody.querySelector( '.modal_img' ) !== null ? theBody.querySelector( '.modal_img' ) : createElem( 'modal_img', 'img', theBody );
		var modal_close = theBody.querySelector( '.fnClose' ) !== null ? theBody.querySelector( '.fnClose' ) : createElem( 'fnClose', 'a', theBody );
		modal_close.innerText = 'close';
		modal_wrapper.appendChild( modal_close );
		modal_wrapper.appendChild( modal_img );
		modal_player.appendChild( modal_wrapper );
		modal_content.appendChild( modal_player );
	}
	modal_img.src = aUrl;
	setClass( theOverlay, 'active' );
	setClass( modal_content, 'active' );
	positionElem( modal_content );

	// bind close modal evt
	theOverlay.addEventListener( 'click', closeOverlay, false );
	modal_close.addEventListener( 'click', closeOverlay, false );
	window.addEventListener( 'keyup', handleKeyupClose, true );
}

function closeOverlay(evt) {
	var theBody = doc.querySelector( 'body' );
	var theOverlay = theBody.querySelector( '.overlay' );
	var modal_content = theBody.querySelector( '.modal_content' );
	modal_content.style.top = '-100%';
	removeClass( theOverlay, 'active' );
	// removeClass( modal_content, 'active' );
	window.removeEventListener( 'keyup', handleKeyupClose, true );
}

if ( hasModal ) {
	modalLink = doc.querySelectorAll( '.fnModal' );
	for ( var i=0; i < modalLink.length; i++ ) {
		modalLink[i].addEventListener( 'click',
			function( evt ) {
				evt.preventDefault();
				var thisTarget = this.href;
				// window.console.log( 'href', thisTarget );
				showContent( thisTarget );
				return false;
			}
		);
	}
}
