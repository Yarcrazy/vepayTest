"use strict";

const button = $('.status-button');

$(document).ready(function () {
  button.on('click', (e) => {
    e.preventDefault();
    const id = e.target.getAttribute('data-id');
    $.post({
      url: '/user/active' + '?id=' + id,
      success: function (response) {
        e.target.textContent = response ? 'активен' : 'заблокирован';
      }
    })
  });
});