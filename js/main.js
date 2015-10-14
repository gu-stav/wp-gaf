$(function() {
  $('#menu-default')
    .find('a')
    .on('click', function(e) {
      var $target = $(e.target),
          toggleClass = 'current_page_item current-menu-item';

      $target.parent().addClass( toggleClass );
      $target
        .parent()
        .siblings()
        .removeClass( toggleClass );
    });

  $('.mobile-nav-toggle')
    .on('click', function(e) {
      e.preventDefault();

      var $target = $('.menu-default-container');
      $target.toggleClass('menu-default-container--open');
    });
});
