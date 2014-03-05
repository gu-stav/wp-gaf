$(function() {
  $('#menu-default')
    .find('a')
    .on('click', function( e ) {
      var $target = $(e.target),
          toggleClass = 'current_page_item current-menu-item';

      $target.parent().addClass( toggleClass );
      $target
        .parent()
        .siblings()
        .removeClass( toggleClass );
    })
});