// external links
document.querySelectorAll('a').forEach(function(element) {
    if (element.href.indexOf(document.location.host) == -1) {
      element.target = '_blank'
    }
  })
  
  
  // list menu
  !function () {
    var prevList, menu, lists
    var wrapper = document.querySelector('[data-list-wrapper]')
  
    if (wrapper) {
      window.addEventListener('scroll', debounce(scrollChecker))
      window.addEventListener('resize', debounce(init))
  
      try {
        document.fonts.ready.then(init)
      } catch (e) {
        setTimeout(init, 1000)
      }
    }
  
    function getElementBounding(el) {
      var base = el.getBoundingClientRect()
      return {
        top: base.top + window.scrollY,
        bottom: Math.floor((base.top + window.scrollY) + base.height),
        height: Math.floor(base.height),
      }
    }
  
    function init() {
      menu = function () {
        var el = document.querySelector('[data-list-menu]')
        var item = el.querySelector('[data-list-menu-item]')
        return {
          el: el,
          itemHeight: getElementBounding(item).height,
          top: getElementBounding(wrapper).top,
        }
      }()
  
      lists = [].map.call(document.querySelectorAll('[data-list]'), function(el) {
        return {
          el: el,
          bottom: getElementBounding(el).bottom,
          height: getElementBounding(el).height,
          menuItemEl: menu.el.querySelector('[href="#' + el.id + '"]'),
        }
      })
  
      scrollChecker()
      requestAnimationFrame(function () {
        menu.el.classList.add('script-enable')
      })
    }
  
    function scrollChecker(event) {
      var nextListIndex = lists.findIndex(function (list) {
        return (list.bottom - 50) > window.scrollY
      })
  
      var nextList = lists[nextListIndex]
  
      var menuFixed = menu.top <= window.scrollY;
  
      menu.el.classList.toggle('fixed', menuFixed)
      if (menuFixed) {
        menu.el.style.top = (-menu.itemHeight * nextListIndex) + 'px'
      } else {
        menu.el.style.top = null
      }
  
      if (event && nextList === prevList) return
  
      if (event) {
        var scrollY = window.scrollY
        window.location.hash = nextList.el.id
        window.scrollTo(0, scrollY)
      }
  
      prevList && prevList.menuItemEl.classList.remove('active')
      nextList.menuItemEl.classList.add('active')
  
      prevList = nextList
    }
  
    function debounce(fn) {
      var waiting, args
  
      function later() {
        if (args) {
          fn.apply(null, args)
          args = null
          waiting = requestAnimationFrame(later)
        } else {
          waiting = null
        }
      }
  
      return function () {
        args = arguments
        !waiting && later()
      }
    }


    jQuery('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = jQuery(this.hash);
        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
         jQuery('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = jQuery(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
      }
    });









  }()
  
