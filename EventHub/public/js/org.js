$(document).ready(function () {
  // Get the current URL path
  var path = window.location.pathname;
  console.log('Current path:', path);

  // Find the corresponding navbar link and add the 'active' class
  $('#activenavbar a').each(function () {
      var href = $(this).attr('href');
      console.log('Current href:', href);

      // Correct the if condition by removing the extra parenthesis
      if (('http://127.0.0.1:8000' + path) === href || ('http://localhost:8000' + path) === href) {
          $(this).addClass('active');
      }
  });
});
