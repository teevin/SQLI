$(function() {
  function after_form_submitted(data) {
    console.log('data',data);
    if (data.status == 'success') {
      $('form#reused_form').hide();
      $('#success_message').show();
      $('#error_message').hide();
    } else {
      $('#error_message').append('<ul></ul>');

      jQuery.each(data.message, function(key, val) {
        $('#error_message ul').append('<li>' + key + ':' + val + '</li>');
      });
      $('#success_message').hide();
      $('#error_message').show();

      //reverse the response on the button
      $('button[type="button"]', $form).each(function() {
        $btn = $(this);
        label = $btn.prop('orig_label');
        if (label) {
          $btn.prop('type', 'submit');
          $btn.text(label);
          $btn.prop('orig_label', '');
        }
      });

    } //else
  }

  $('#reused_form').submit(function(e) {
    e.preventDefault();

    $form = $(this);
    //show some response on the button
    $('button[type="submit"]', $form).each(function() {
      $btn = $(this);
      $btn.prop('type', 'button');
      $btn.prop('orig_label', $btn.text());
      $btn.text('Sending ...');
    });

    $.ajax({
      type: "POST",
      url: 'Webservice/handler.php',
      contentType: 'application/json; charset=utf-8',
      data: JSON.stringify({ data : $form.find('#data').val()}),
      success: after_form_submitted,
      dataType: 'plain'
    });

  });
});
