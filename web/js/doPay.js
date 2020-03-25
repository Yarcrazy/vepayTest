"use strict";

const button2 = $('#submit_btn');

$(document).ready(function () {
  button2.on('click', function (e) {
    e.preventDefault();
    $.post({
      url: '/payment/pay',
      dataType: 'json',
      data: $('#ajax_form').serialize(),
      success: function (response) {
        if (response instanceof Object) {
          response = Object.values(response);
        }
        $('#form_result').text(response);
        if (response === 'Платеж совершен!') {
          location.reload();
        }
        //$('#p0').load('index #w2'); после платежа не работает statusButton.js
      },
    });
  })
});