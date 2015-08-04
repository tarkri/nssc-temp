(function ($) {
  Drupal.behaviors.commerce_fancy_attributes = {
    attach: function (context, settings) {
      $('.form-type-commerce-fancy-attributes').addClass('form-type-commerce-fancy-attributes-ajax');
      $('.form-type-commerce-fancy-attributes input[type=radio]').hide();
      $('.form-type-commerce-fancy-attributes label.option').hide();

      $('.form-type-commerce-fancy-attributes-ajax .description').click(function() {
        var parent = $(this).parent();
        $('input[type=radio]', parent).click();
        $('input[type=radio]', parent).change();
      });
    }
  };
}) (jQuery);
;
(function ($) {

  // Add a spinner on quantity widget.
  Drupal.behaviors.quantityWidgetSpinner = {
    attach: function ( context, settings ) {
      $('.form-item-quantity input').spinner({
        min: 1,
        max: 9999,
        increment: 'fast'
      });
    }
  }

  // Add 'read more' link on description.
  Drupal.behaviors.bodyReadMore = {
    attach: function ( context, settings ) {
      var readmore = Drupal.t('read more');
      var readless = Drupal.t('read less');
      $('.node-product-type .field-name-body .field-item').expander({
        slicePoint: 200,
        expandPrefix: '...<br />',
        expandText: readmore,
        userCollapseText: readless,
        expandEffect: 'fadeIn',
        expandSpeed: 250,
        collapseEffect: 'fadeOut',
        collapseSpeed: 200
      });
    }
  }
  // Handle cloud zoom on small devices.
  Drupal.behaviors.cloud_zoom = {
    attach: function(context, settings) {
      $('body').bind('responsivelayout', function(e, d) {
        if($(this).hasClass("responsive-layout-mobile")) {
          $('.cloud-zoom-big, .cloud-zoom-lens').hide();
          $('.cloud-zoom-big, .mousetrap, .cloud-zoom-lens').css('display','none');
        }
        else {
          if ($('.cloud-zoom').length) {
            $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
            $('body').unbind('responsivelayout');
          }
        }
      });
    }
  }
})(jQuery);
;
