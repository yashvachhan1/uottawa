(function () {
  'use strict';

  /* ---- Mobile menu ---------------------------------------------------- */
  var header = document.getElementById('site-header');
  var toggle = document.getElementById('nav-toggle');

  if (toggle) {
    toggle.addEventListener('click', function () {
      var open = header.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(open));

      // Closing the panel puts every dropdown back, so opening it again
      // starts from the menu rather than from wherever it was left.
      if (!open) {
        Array.prototype.forEach.call(
          header.querySelectorAll('.nav .is-open'),
          function (li) { closeSub(li); }
        );
      }
    });
  }

  /* ---- Dropdowns inside the collapsed menu ----------------------------- */
  /* On a wide screen a dropdown opens under the pointer and needs nothing
     here. Collapsed there is nothing to hover, and leaving the children
     showing turns the menu into a list of everything at once - so the parent
     gets a button beside it and holds them until it is asked. */

  function closeSub(li) {
    var btn = li.querySelector(':scope > .nav-sub-toggle');
    li.classList.remove('is-open');
    if (btn) btn.setAttribute('aria-expanded', 'false');
  }

  Array.prototype.forEach.call(
    document.querySelectorAll('.nav .menu-item-has-children'),
    function (li) {
      var link = li.querySelector(':scope > a');
      var sub  = li.querySelector(':scope > .sub-menu');

      if (!link || !sub) return;

      var btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'nav-sub-toggle';
      btn.setAttribute('aria-expanded', 'false');
      btn.setAttribute('aria-label', link.textContent.trim());
      btn.innerHTML = '<span aria-hidden="true"></span>';

      btn.addEventListener('click', function (e) {
        e.preventDefault();
        var open = !li.classList.contains('is-open');

        // One at a time, so the panel never runs away down the page.
        Array.prototype.forEach.call(
          document.querySelectorAll('.nav .menu-item-has-children.is-open'),
          function (other) { if (other !== li) closeSub(other); }
        );

        li.classList.toggle('is-open', open);
        btn.setAttribute('aria-expanded', String(open));
      });

      link.insertAdjacentElement('afterend', btn);
    }
  );

  /* ---- Article filter --------------------------------------------------- */
  /* The cards are already on the page, so narrowing them is a matter of
     hiding the ones that do not match rather than going back to the server.
     It answers as you type, and the whole row is there again the moment the
     box is cleared. */

  var filter = document.querySelector('[data-filter]');

  if (filter) {
    var category = filter.querySelector('[data-filter-category]');
    var topic    = filter.querySelector('[data-filter-topic]');
    var grid     = filter.parentElement.querySelector('.articles-grid');
    var empty    = filter.parentElement.querySelector('[data-filter-empty]');
    var cards    = grid ? grid.querySelectorAll('.article-card') : [];

    var apply = function () {
      var want = category ? category.value : '';
      var term = topic ? topic.value.trim().toLowerCase() : '';
      var shown = 0;

      Array.prototype.forEach.call(cards, function (card) {
        var terms = (card.getAttribute('data-terms') || '').split(',');
        var text  = (card.getAttribute('data-text') || '').toLowerCase();

        var ok = (!want || terms.indexOf(want) !== -1)
              && (!term || text.indexOf(term) !== -1);

        card.hidden = !ok;
        if (ok) shown++;
      });

      if (empty) empty.hidden = shown !== 0;
    };

    if (category) category.addEventListener('change', apply);
    if (topic) {
      topic.addEventListener('input', apply);
      // Enter would submit a form if one is ever wrapped round this, and
      // there is nothing to submit to.
      topic.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') e.preventDefault();
      });
    }
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
