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

  var items = document.querySelectorAll('.faq-item');
  Array.prototype.forEach.call(items, function (item) {
    var btn    = item.querySelector('.faq-item__q');
    var marker = item.querySelector('.faq-item__marker');
    if (!btn) return;

    btn.addEventListener('click', function () {
      var open = item.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', String(open));
      marker.textContent = open ? OPEN : CLOSED;
    });
  });
})();
