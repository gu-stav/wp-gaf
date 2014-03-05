$(function() {
  $('#menu-default')
    .find('a')
    .on('click', function( e ) {
      var $target = $(e.target);

      $target.parent().addClass('current-menu-item');
      $target
        .parent()
        .siblings()
        .removeClass('current-menu-item')
    })
});