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


  $(document).on("click", ".add_option", function (e) {

    e.preventDefault();

    let optionContainer = $(`.option_container`);
    let newOption = $(".option_container_wrapper").first().clone();
    newOption.find('input[type=text]').val('');
    newOption.find('input[type=file]').val('');
    newOption.find('input[type=checkbox]').attr('checked', false);
    newOption.find('.error_container').remove();
    newOption.find('.audio_container').remove();
    newOption.appendTo(optionContainer);

    $(".option_container_wrapper").each((index, element) => {

      $(element).attr("id", `option_container_wrapper_${index}`);

      $(element)
        .find(".option_text_en_input")
        .attr("name", `option_en_text_[${index}]`)
        .attr("id", `option_en_text_[${index}]`)
        .siblings('label')
        .attr("for", `option_en_text_[${index}]`);

      $(element)
        .find(".option_audio_en_input")
        .attr("name", `option_en_audio_[${index}]`)
        .attr("id", `option_en_audio_[${index}]`)
        .siblings('label')
        .attr("for", `option_en_audio_[${index}]`);

      $(element)
        .find(".option_text_hi_input")
        .attr("name", `option_hi_text_[${index}]`)
        .attr("id", `option_hi_text_[${index}]`)
        .siblings('label')
        .attr("for", `option_hi_text_[${index}]`);

      $(element)
        .find(".option_audio_hi_input")
        .attr("name", `option_hi_audio_[${index}]`)
        .attr("id", `option_hi_audio_[${index}]`)
        .siblings('label')
        .attr("for", `option_hi_audio_[${index}]`);

      $(element)
        .find(".option_text_mr_input")
        .attr("name", `option_mr_text_[${index}]`)
        .attr("id", `option_mr_text_[${index}]`)
        .siblings('label')
        .attr("for", `option_mr_text_[${index}]`);

      $(element)
        .find(".option_audio_mr_input")
        .attr("name", `option_mr_audio_[${index}]`)
        .attr("id", `option_mr_audio_[${index}]`)
        .siblings('label')
        .attr("for", `option_mr_audio_[${index}]`);

      $(element)
        .find(".option_image_input")
        .attr("name", `option_image_[${index}]`)
        .attr("id", `option_image_[${index}]`)
        .siblings('label')
        .attr("for", `option_image_[${index}]`);

      $(element)
        .find(".option_correct_input")
        .attr("name", `option_correct_[${index}]`)
        .attr("id", `option_correct_[${index}]`)
        .siblings('label')
        .attr("for", `option_correct_[${index}]`);

      initTab(`option_container_wrapper_${index}`);

    });

  });

  $(document).on("click", ".add_pair_match", function (e) {

    e.preventDefault();

    let column = $(this).data('column');
    let wrapperContainer = $(this).parent().parent();
    let optionContainer = wrapperContainer.find(`.option_container`);
    let newOption = wrapperContainer.find(`.option_container_wrapper`).first().clone();
    newOption.find('input[type=text]').val('');
    newOption.find('input[type=file]').val('');
    newOption.find('.error_container').remove();
    newOption.appendTo(optionContainer);

    wrapperContainer.find(".option_container_wrapper").each((index, element) => {

      $(element).attr("id", `option_container_wrapper_${column}_${index}`);

      $(element)
        .find(".option_text_en_input")
        .attr("name", `option_en_text_${column}_[${index}]`)
        .attr("id", `option_en_text_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_en_text_${column}_[${index}]`);

      $(element)
        .find(".option_audio_en_input")
        .attr("name", `option_en_audio_${column}_[${index}]`)
        .attr("id", `option_en_audio_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_en_audio_${column}_[${index}]`);

      $(element)
        .find(".option_text_hi_input")
        .attr("name", `option_hi_text_${column}_[${index}]`)
        .attr("id", `option_hi_text_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_hi_text_${column}_[${index}]`);

      $(element)
        .find(".option_audio_hi_input")
        .attr("name", `option_hi_audio_${column}_[${index}]`)
        .attr("id", `option_hi_audio_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_hi_audio_${column}_[${index}]`);

      $(element)
        .find(".option_text_mr_input")
        .attr("name", `option_mr_text_${column}_[${index}]`)
        .attr("id", `option_mr_text_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_mr_text_${column}_[${index}]`);

      $(element)
        .find(".option_audio_mr_input")
        .attr("name", `option_mr_audio_${column}_[${index}]`)
        .attr("id", `option_mr_audio_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_mr_audio_${column}_[${index}]`);

      $(element)
        .find(".option_image_input")
        .attr("name", `option_image_${column}_[${index}]`)
        .attr("id", `option_image_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_image_${column}_[${index}]`);

      $(element)
        .find(".option_correct_input")
        .attr("name", `option_correct_${column}_[${index}]`)
        .attr("id", `option_correct_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_correct_${column}_[${index}]`);

      initTab(`option_container_wrapper_${column}_${index}`);

    });

  });

  $(document).on('click', '.delete_btn', function (e) {
    e.preventDefault();

    $(this).parent().parent().remove();

    $(".option_container_wrapper").each((index, element) => {

      $(element).attr("id", `option_container_wrapper_${index}`);

      $(element)
        .find(".option_text_en_input")
        .attr("name", `option_en_text_[${index}]`)
        .attr("id", `option_en_text_[${index}]`)
        .siblings('label')
        .attr("for", `option_en_text_[${index}]`);

      $(element)
        .find(".option_audio_en_input")
        .attr("name", `option_en_audio_[${index}]`)
        .attr("id", `option_en_audio_[${index}]`)
        .siblings('label')
        .attr("for", `option_en_audio_[${index}]`);

      $(element)
        .find(".option_text_hi_input")
        .attr("name", `option_hi_text_[${index}]`)
        .attr("id", `option_hi_text_[${index}]`)
        .siblings('label')
        .attr("for", `option_hi_text_[${index}]`);

      $(element)
        .find(".option_audio_hi_input")
        .attr("name", `option_hi_audio_[${index}]`)
        .attr("id", `option_hi_audio_[${index}]`)
        .siblings('label')
        .attr("for", `option_hi_audio_[${index}]`);

      $(element)
        .find(".option_text_mr_input")
        .attr("name", `option_mr_text_[${index}]`)
        .attr("id", `option_mr_text_[${index}]`)
        .siblings('label')
        .attr("for", `option_mr_text_[${index}]`);

      $(element)
        .find(".option_audio_mr_input")
        .attr("name", `option_mr_audio_[${index}]`)
        .attr("id", `option_mr_audio_[${index}]`)
        .siblings('label')
        .attr("for", `option_mr_audio_[${index}]`);

      $(element)
        .find(".option_image_input")
        .attr("name", `option_image_[${index}]`)
        .attr("id", `option_image_[${index}]`)
        .siblings('label')
        .attr("for", `option_image_[${index}]`);

      $(element)
        .find(".option_correct_input")
        .attr("name", `option_correct_[${index}]`)
        .attr("id", `option_correct_[${index}]`)
        .siblings('label')
        .attr("for", `option_correct_[${index}]`);


      initTab(`option_container_wrapper_${index}`);

    });
  });

  $(document).on('click', '.delete_pair_matching', function (e) {
    e.preventDefault();
    let column = $(this).data('column');
    let divContainer = (column === 'l') ? 'left_items' : 'right_items';
    let wrapperContainer = $(this).closest('#' + divContainer);
    $(this).parent().parent().remove();
    wrapperContainer.find(".option_container_wrapper").each((index, element) => {
      $(element).attr("id", `option_container_wrapper_${index}`);
      $(element)
        .find(".option_text_en_input")
        .attr("name", `option_en_text_${column}_[${index}]`)
        .attr("id", `option_en_text_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_en_text_${column}_[${index}]`);
      $(element)
        .find(".option_audio_en_input")
        .attr("name", `option_en_audio_${column}_[${index}]`)
        .attr("id", `option_en_audio_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_en_audio_${column}_[${index}]`);
      $(element)
        .find(".option_text_hi_input")
        .attr("name", `option_hi_text_${column}_[${index}]`)
        .attr("id", `option_hi_text_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_hi_text_${column}_[${index}]`);
      $(element)
        .find(".option_audio_hi_input")
        .attr("name", `option_hi_audio_${column}_[${index}]`)
        .attr("id", `option_hi_audio_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_hi_audio_${column}_[${index}]`);
      $(element)
        .find(".option_text_mr_input")
        .attr("name", `option_mr_text_${column}_[${index}]`)
        .attr("id", `option_mr_text_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_mr_text_${column}_[${index}]`);
      $(element)
        .find(".option_audio_mr_input")
        .attr("name", `option_mr_audio_${column}_[${index}]`)
        .attr("id", `option_mr_audio_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_mr_audio_${column}_[${index}]`);
      $(element)
        .find(".option_image_input")
        .attr("name", `option_image_${column}_[${index}]`)
        .attr("id", `option_image_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_image_${column}_[${index}]`);
      $(element)
        .find(".option_correct_input")
        .attr("name", `option_correct_${column}_[${index}]`)
        .attr("id", `option_correct_${column}_[${index}]`)
        .siblings('label')
        .attr("for", `option_correct_${column}_[${index}]`);

      initTab(`option_container_wrapper_${column}_${index}`);
    });
  });

  $("#add_edit_question_form").on("submit", function (e) {

    e.preventDefault();

    let actionUrl = $(this).attr('action');
    let formData = new FormData(this);
    let csrfToken = formData.get('_token');
    const form = $(this);
    form.find(".error_container").remove();

    $.ajax({
      type: "post",
      url: actionUrl,
      data: formData,
      processData: false,
      contentType: false,
      headers: {
        'X-CSRF-TOKEN': csrfToken
      },
      success: function (data) {

      },
      error: function (error) {
        if (error.responseJSON.errors) {
          $.each(error.responseJSON.errors, (fieldName, messages) => {
            let input = form.find(`#${fieldName}`);
            let container = input.closest(".input_container");

            if (fieldName.includes('.')) {
              const [parentField, index] = fieldName.split('.');
              input = form.find(`[name='${parentField}[${index}]']`);
              container = input.closest(".input_container");
            }

            if (input.length) {
              container.append(`<span class="text-red-600 font-bold text-sm error_container">
                ${messages.join("<br/>")}</span>`);
            }
          });
        }
      }
    });

  });

  //question type
  $("#question_type").on("change", function (e) {

    e.preventDefault();

    let queType = $(this).val();

    $.ajax({
      type: "get",
      url: `/admin/subview/ajax/question/${queType}`,
      success: function (data) {
        $("#subview").html(data);
      },
      complete: function (data) {
        switch (queType) {
          case "select_image":
          case "select_text":
            initTab("question_container");
            initTab("option_container_wrapper_0");
            break;
          case "fill_blanks":
            initTab("question_container_fib");
            initTab("option_container_wrapper_fib");
            break;
          case "pair_matching":
            initTab("option_container_wrapper_l_0");
            initTab("option_container_wrapper_r_0");
            break;
          case "audio_to_text":
            initTab("question_container_att");
            initTab("option_container_wrapper_att");
            break;
          case "audio_to_audio":
            initTab("question_container_ata");
            break;
        }
      }
    });
  });


  initTab("question_container");
  //initTab("option_container_wrapper_0");

  initTab("question_container_fib");
  initTab("option_container_wrapper_fib");

  initTab("option_container_wrapper_l_0");
  initTab("option_container_wrapper_r_0");

  initTab("question_container_att");
  initTab("option_container_wrapper_att");

  initTab("question_container_ata");

  $(".option_container_wrapper").each((index, element) => {

    $(element).attr("id", `option_container_wrapper_${index}`);

    $(element)
      .find(".option_text_en_input")
      .attr("name", `option_en_text_[${index}]`)
      .attr("id", `option_en_text_[${index}]`)
      .siblings('label')
      .attr("for", `option_en_text_[${index}]`);

    $(element)
      .find(".option_audio_en_input")
      .attr("name", `option_en_audio_[${index}]`)
      .attr("id", `option_en_audio_[${index}]`)
      .siblings('label')
      .attr("for", `option_en_audio_[${index}]`);

    $(element)
      .find(".option_text_hi_input")
      .attr("name", `option_hi_text_[${index}]`)
      .attr("id", `option_hi_text_[${index}]`)
      .siblings('label')
      .attr("for", `option_hi_text_[${index}]`);

    $(element)
      .find(".option_audio_hi_input")
      .attr("name", `option_hi_audio_[${index}]`)
      .attr("id", `option_hi_audio_[${index}]`)
      .siblings('label')
      .attr("for", `option_hi_audio_[${index}]`);

    $(element)
      .find(".option_text_mr_input")
      .attr("name", `option_mr_text_[${index}]`)
      .attr("id", `option_mr_text_[${index}]`)
      .siblings('label')
      .attr("for", `option_mr_text_[${index}]`);

    $(element)
      .find(".option_audio_mr_input")
      .attr("name", `option_mr_audio_[${index}]`)
      .attr("id", `option_mr_audio_[${index}]`)
      .siblings('label')
      .attr("for", `option_mr_audio_[${index}]`);

    $(element)
      .find(".option_image_input")
      .attr("name", `option_image_[${index}]`)
      .attr("id", `option_image_[${index}]`)
      .siblings('label')
      .attr("for", `option_image_[${index}]`);

    $(element)
      .find(".option_correct_input")
      .attr("name", `option_correct_[${index}]`)
      .attr("id", `option_correct_[${index}]`)
      .siblings('label')
      .attr("for", `option_correct_[${index}]`);

    initTab(`option_container_wrapper_${index}`);

  });

});

function initTab(container) {

  let wrapper = jQuery(`#${container}`);

  wrapper.find(".tab-hindi, .tab-marathi").hide();

  wrapper.find(".tab-english").show();

  wrapper.find("[data-tab='tab-english']").addClass("border-b-2 dark:border-gray-500 dark:text-gray-800");

  wrapper.find(".tab").on('click', function (e) {

    e.preventDefault();

    wrapper.find(".tab-hindi, .tab-marathi, .tab-english").hide();

    let tab = jQuery(this).data('tab');

    wrapper.find("[data-tab='tab-english']").removeClass("border-b-2 dark:border-gray-500 dark:text-gray-800");
    wrapper.find("[data-tab='tab-hindi']").removeClass("border-b-2 dark:border-gray-500 dark:text-gray-800");
    wrapper.find("[data-tab='tab-marathi']").removeClass("border-b-2 dark:border-gray-500 dark:text-gray-800");

    //jQuery("#tab-hindi,#tab-marathi, #tab-english").removeClass("dark:border-gray-500 dark:text-gray-800");
    wrapper.find("[data-tab='" + tab + "']").addClass("border-b-2 dark:border-gray-500 dark:text-gray-800");


    wrapper.find("." + tab).show();

  });
}