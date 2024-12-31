import jQuery from "jquery";

jQuery(function ($) {

  $('.p-check').on('change', function () {
    if ($(this).is(":checked")) {
      $('.c-check').each(function () {
        $(this).attr('checked', true);
      });
    } else {
      $('.c-check').each(function () {
        $(this).attr('checked', false);
      });
    }
  });

  $('.c-check').on('change', function () {
    let total_check = $('.c-check').length;
    let checked_check = $('.c-check:checked').length;

    if (total_check == checked_check) {
      $('.p-check').attr("checked", true);
    } else {
      $('.p-check').attr("checked", false);
    }

  });

});