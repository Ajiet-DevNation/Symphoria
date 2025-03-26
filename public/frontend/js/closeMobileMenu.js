if ($(".mobile-menu").length != null) {
    $(".section-wrapper").on("click", function () {
        if ($(".mobile-menu").hasClass("active"))
            $(".hamburger-menu").trigger("click");
    });
}
