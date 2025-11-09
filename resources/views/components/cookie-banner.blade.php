<!-- resources/views/components/cookie-banner.blade.php -->
@if(!Cookie::get('accept_cookies'))
<div id="cookie-banner" style="position: fixed; bottom:0; left:0; right:0; background:#111; color:#fff; padding:15px; text-align:center; z-index:9999;">
    We use cookies to improve your experience on our website. By continuing, you agree to our use of cookies. 
    <button id="accept-cookies" style="background:#00ffc6; border:none; padding:5px 15px; cursor:pointer;">Accept</button>
</div>

<script>
document.getElementById('accept-cookies').addEventListener('click', function() {
    fetch("{{ route('cookies.accept') }}")
    .then(() => {
        document.getElementById('cookie-banner').style.display = 'none';
    });
});
</script>
@endif
