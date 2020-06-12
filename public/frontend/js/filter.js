/*----------------------------------------
		Isotope Masonry
	------------------------------------------*/
function isotopeMasonry() {
  $(".isotope-gutter").isotope({
    itemSelector: '[class^="col-"]',
    percentPosition: true
  });
  $(".isotope-no-gutter").isotope({
    itemSelector: '[class^="col-"]',
    percentPosition: true,
    masonry: {
      columnWidth: 1
    }
  });

  $(".filter a").on("click", function() {
    $(".filter a").removeClass("active");
    $(this).addClass("active");
    // portfolio fiter
    var selector = $(this).attr("data-filter");
    $(".isotope-gutter").isotope({
      filter: selector,
      animationOptions: {
        duration: 750,
        easing: "linear",
        queue: false
      }
    });
    return false;
  });
}
