$(document).ready(function() {
    $("#sidebarCollapse").on("click", function() {
        $("#sidebar").toggleClass("active");
        $("#product-view").toggleClass("marge");
    });
    $.get("http://127.0.0.1:8000/index/panier/size", function(data) {
        $("#nb-prod").html(data);
    });
    $.getJSON("http://127.0.0.1:8000/All/Categories", function(data) {
        var items = [];
        $.each(JSON.parse(data), function(key, val) {
            // $.each(this, function(key, val) {
            items.push(
                "<li class='nav-link btn  categorie-btn' data-id='" +
                val.id +
                "'>" +
                val.name +
                "</li>"
            );
            // });
        });

        $("<ul/>", {
            class: "my-new-list",
            html: items.join(""),
        }).appendTo("#sticky-sidebar");
        $.getJSON("http://127.0.0.1:8000/All/Products/", function(data) {
            var items = [];
            $.each(JSON.parse(data), function(key, val) {
                items.push(
                    "<div style='width:30%;' class='col-xs-3 d-inline-block mr-3' data-toggle='modal' data-target='#product_view' data-id='" +
                    val.id +
                    "'><div class='product-grid'><div class='product-image3'><a href='#'><img class='image' src='" +
                    val.image +
                    "' data-id='" +
                    val.id +
                    "'></a><ul class='social'><li></li><li><a type='button' href='index' class='btn btn-primary' data-id='" +
                    val.id +
                    "' id='quickAddToCart'><i class='fa fa-shopping-cart'></i></a></li></ul><span class='product-new-label'>New</span></div><div class='product-content'><h3 class='title'><a href='#'>" +
                    val.name +
                    "</a></h3><div class='price'>" +
                    val.prix +
                    "</div><ul class='rating'><li class='fa fa-star'></li><li class='fa fa-star'></li><li class='fa fa-star'></li><li class='fa fa-star disable'></li><li class='fa fa-star disable'></li></ul></div></div></div>"
                );
            });

            $("#product-view").html(items);

            $(".categorie-btn").click(function() {
                var idCategorie = $(this).data("id");
                $.getJSON(
                    "http://127.0.0.1:8000/index/categorie/" + idCategorie,
                    function(data) {
                        var items = [];
                        $.each(JSON.parse(data), function(key, val) {
                            items.push(
                                "<div style='width:30%;' class='col-xs-3 d-inline-block mr-3' data-toggle='modal' data-target='#product_view' data-id='" +
                                val.id +
                                "'><div class='product-grid'><div class='product-image3'><a href='#'><img class='image' src='" +
                                val.image +
                                "' data-id='" +
                                val.id +
                                "'></a><ul class='social'><li></li><li><a type='button' href='index' class='btn btn-primary' data-id='" +
                                val.id +
                                "' id='quickAddToCart'><i class='fa fa-shopping-cart'></i></a></li></ul><span class='product-new-label'>New</span></div><div class='product-content'><h3 class='title'><a href='#'>" +
                                val.name +
                                "</a></h3><div class='price'>" +
                                val.prix +
                                "</div><ul class='rating'><li class='fa fa-star'></li><li class='fa fa-star'></li><li class='fa fa-star'></li><li class='fa fa-star disable'></li><li class='fa fa-star disable'></li></ul></div></div></div>"
                            );
                        });

                        $("#product-view").html(items);
                    }
                );
            });
        });
    });
    $(document).on("click", ".image", function(e) {
        var idProduit = $(this).data("id");

        $.getJSON("http://127.0.0.1:8000/index/product/" + idProduit, function(
            data
        ) {
            var items = [];

            items.push(
                "<div class='row'><div class='col-md-6 product-image3 ' ><img style='width:100%' class='image' src='" +
                data[0].image +
                "' class='img-responsive' style='height:90px;'></div><div class='col-md-6 product_content'><div class='rating'><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span>Description</div><p class='desc'>" +
                data[0].description +
                "</p><h3 class='price'><span class='glyphicon glyphicon-usd'></span>" +
                data[0].prix +
                "$</h3><div class='btn-ground'><button type='button' class='btn btn-primary' data-id='" +
                data[0].id +
                "' id='addtocart'><span class='glyphicon glyphicon-shopping-cart'></span> Add To Cart</button></div></div></div>"
            );

            $("#product-viewb").html(items);
        });
    });
});