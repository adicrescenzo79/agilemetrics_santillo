<div id="cookies" class="container">

  <div class="cookies d-flex justify-content-center align-items-baseline pt-3 pb-3">
    <p>Questo sito utilizza i cookies per offrire un'esperienza migliore all'utente. </p>
    <button class="cookieButton btn btn-primary ml-3" type="button" name="button">Consenti i cookies</button>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

  $('.cookieButton').click(function(){
    document.cookie = "cookieConsent=true";
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
