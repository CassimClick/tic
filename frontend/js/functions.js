//Js obfuscated
(function ($) {
    // Some code here

    $(window).on("load", function () {
        // Code executed after the page is fully loaded
        $(".data-loader").fadeOut();
        $("#preloader").delay(350).fadeOut("slow");
        $(".visible").delay(350).css("display", "block");
    });

    $(".navigation").on("click", function () {
        var $this = $(this);
        $this.toggleClass("active");
        if ($this.hasClass("active")) {
            $(".menu-wrapper").slideDown(350).css({ "overflow": "visible" });
        } else {
            $(".menu-wrapper").slideUp(350);
        }
    });

    $(".nav-item").on("click", function () {
        var $this = $(this);
        $this.addClass("active");
        if ($this.hasClass("has-children")) {
            $this.find(".sub-menu").slideToggle(350);
        }
    });

    $(".portfolio-nav").on("click", function (e) {
        e.preventDefault();
        var $this = $(this);
        $(".filter-active").removeClass("filter-active");
        $this.addClass("filter-active");
        var filterValue = $this.data("filter");
        $(".grid").isotope({ filter: filterValue });
    });

    // More code here...

    function someFunction() {
        // Function implementation
    }

    $(window).on("resize", function () {
        // Code executed on window resize
        someFunction();
    });

    // More code here...
})(window.jQuery);
