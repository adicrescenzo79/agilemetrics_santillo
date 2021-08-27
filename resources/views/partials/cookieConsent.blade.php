<div id="cookies" class="container">

  <div class="cookies d-flex justify-content-center align-items-baseline pt-3 pb-3">
    <p>Questo sito utilizza i cookies per offrire un'esperienza migliore all'utente. </p>
    <button class="cookieButton btn btn-primary ml-3" type="button" name="button">Consenti i cookies</button>
  </div>
</div>

<script type="text/javascript">

  // alert( document.cookie );

  var d = new Date(2050, 12, 31);

  $('.cookieButton').click(function(){
    document.cookie = "cookieConsent=true; expires=d;";
    location.reload();
  });

  let cookieConsent = getCookie('cookieConsent');
  console.log(cookieConsent);

  if (cookieConsent) {
    $('#cookies').hide();
  }

  function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
  };

</script>
