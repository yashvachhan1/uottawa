(function () {
  'use strict';

  /* ---- Mobile menu ---------------------------------------------------- */
  var header = document.getElementById('site-header');
  var toggle = document.getElementById('nav-toggle');

  if (toggle) {
    toggle.addEventListener('click', function () {
      var open = header.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(open));
    });
  }

  /* ---- FAQ accordion --------------------------------------------------- */
  var OPEN   = '▼'; /* triangle down  */
  var CLOSED = '►'; /* triangle right */

  function setOpen(item, open) {
    var btn    = item.querySelector('.faq-item__q');
    var marker = item.querySelector('.faq-item__marker');
    item.classList.toggle('is-open', open);
    if (btn) btn.setAttribute('aria-expanded', String(open));
    if (marker) marker.textContent = open ? OPEN : CLOSED;
  }

  var items = document.querySelectorAll('.faq-item');
  Array.prototype.forEach.call(items, function (item) {
    var btn = item.querySelector('.faq-item__q');
    if (!btn) return;

    btn.addEventListener('click', function () {
      var open = !item.classList.contains('is-open');

      // One open at a time. Opening one closes whichever of its siblings was
      // open, so a group never ends up as a wall of text.
      if (open && item.parentElement) {
        Array.prototype.forEach.call(
          item.parentElement.children,
          function (other) {
            if (other !== item && other.classList.contains('is-open')) {
              setOpen(other, false);
            }
          }
        );
      }

      setOpen(item, open);
    });
  });
})();
