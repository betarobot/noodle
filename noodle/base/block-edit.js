// $Id$

Drupal.behaviors.block_edit = function (context) {

  var regexp = new RegExp(/block-(.+?)-(.+?)/mi);
  var checkp = new RegExp(/block-[^views].*?-.+/mi);

  $("div.block").mouseover(function() {
    var block_id = $(this).attr('id');
    if (block_id.match(checkp)) {
      block_id = block_id.replace(regexp, '$1_$2');
      $('div#block-edit-link-' + block_id).css('display', 'block');
    }
  });

  $("div.block").mouseout(function() {
    var block_id = $(this).attr('id');
    if (block_id.match(checkp)) {
      block_id = block_id.replace(regexp, '$1_$2');
      $('div#block-edit-link-' + block_id).css('display', 'none');
    }
  });
};
