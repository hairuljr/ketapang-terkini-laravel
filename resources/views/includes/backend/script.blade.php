  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('backend') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ url('backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('backend') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('backend') }}/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="{{ url('backend') }}/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level plugins -->
  <script src="{{ url('backend') }}/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ url('backend') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('backend') }}/js/demo/datatables-demo.js"></script>
  <script src="{{ url('frontend')}}/js/viewer.js"></script>
  <script src="{{ url('backend') }}/js/img-uploader/dist/image-uploader.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
    $('.input-images-cover').imageUploaderCover();
    $('.input-images-all').imageUploaderAll();
    $('.input-images').imageUploader();
  </script>
  <script>
    $(document).ready(function() {
      $('.select2').select2();
    });
  </script>
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