<!DOCTYPE html>
<html lang="en">

<head>
  <title>Informasi Ketapang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @include('includes.frontend.style');
  
</head>

<body class="goto-here">

  @include('includes.frontend.navbar');

  @yield('content');

  @include('includes.frontend.footer');


	<!-- loader -->
	    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
	    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
	    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>

      @include('includes.frontend.script');

	<script>
	  window.addEventListener("DOMContentLoaded", function() {
	    var galley = document.getElementById("galley");
	    var viewer = new Viewer(galley, {
	      url: "data-original",
	      toolbar: {
	        oneToOne: true,

	        prev: function() {
	          viewer.prev(true);
	        },

	        play: true,

	        next: function() {
	          viewer.next(true);
	        },

	        download: function() {
	          const a = document.createElement("a");

	          a.href = viewer.image.src;
	          a.download = viewer.image.alt;
	          document.body.appendChild(a);
	          a.click();
	          document.body.removeChild(a);
	        }
	      }
	    });
	  });
	</script>
  @include('sweetalert::alert')
	</body>

	</html>