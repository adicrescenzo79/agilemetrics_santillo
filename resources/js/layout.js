window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}

$toast = $('.toast');
if ($toast) {
  $toast.css('opacity', 1);

  setTimeout(() => {
    $toast.css('opacity', 0);
  }, 2000);
}
