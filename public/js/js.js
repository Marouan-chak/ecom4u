$(document).ready(function () {
    var i = 0;
    console.log("Hello!  8");
    $.get("http://127.0.0.1:8000/index/panier/size", function (data) {
        $("#nb-prod").html(data);
    });
    $(document).on("click", "#history", function (e) {
        $.get("http://127.0.0.1:8000/commande", function (data) {
            var items = [];
            console.log(data);
            var string = '-';
            $.each(JSON.parse(data), function (key, val) {
                val.produits.forEach(element => {
                    string = string.concat(element)
                    string = string.concat("<br> ")

                });

                items.push(
                    "<tr> <td>" +
                    val.id +
                    "</td><td>" +
                    val.statut +
                    "$</td><td>" +
                    string +
                    "</td><td>" +
                    val.date +
                    "</td><td> " +
                    val.address +
                    "</td></tr>"

                );

                string = '';
            });
            $(".commande-list").html(items);

        });
    });
    $("form.cart").on("submit", function () {
        //  $.get("http://127.0.0.1:8000/index/panier/valid", function (data) {
        var that = $(this),
            url = "http://127.0.0.1:8000/index/panier/valid"
        type = that.attr('method'),
            data = {};
        data["address"] = that.find('[name]').val();
        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function (response) {
                console.log(response);

            }

        })


    });



    $(document).on("click", "#remove", function (e) {
        var idProduit = $(this).data("id");
        console.log(idProduit);
        $(this)
            .closest("tr")
            .remove();

        $.get(
            "http://127.0.0.1:8000/index/panier/remove/" + idProduit,
            function () { }
        );

        $.get("http://127.0.0.1:8000/total", function (data) {
            $("#total").html(data + "$");
        });
        $.get("http://127.0.0.1:8000/index/panier/size", function (data) {
            $("#nb-prod").html(data);
        });
    });

    $(document).on("click", "#addtocart", function (e) {
        var items = [];
        var idProduit = $(this).data("id");
        $.get("http://127.0.0.1:8000/index/panier/add/" + idProduit, function (data) { });
        $.get("http://127.0.0.1:8000/index/panier/size", function (data) {
            $("#nb-prod").html(data);
        });
    });

    $(document).on("click", "#carte", function (e) {
        $.getJSON("http://127.0.0.1:8000/index/panier", function (data) {
            var items = [];

            $.each(JSON.parse(data), function (key, val) {
                // $.each(this, function(key, val) {
                items.push(
                    "<tr> <td>" +
                    val.name +
                    "</td><td>" +
                    val.prix +
                    "$</td><td>" +
                    val.quantity +
                    "</td><td><button  data-id='" +
                    val.product +
                    "' id='remove'><i   class='fas fa-trash'></i></button></td></tr> "
                );
            });
            $(".cart-list").html(items);

            $.get("http://127.0.0.1:8000/total", function (data) {
                $("#total").html(data + "$");
            });
        });
    });

    $(document).on("click", ".image", function (e) {
        var idProduit = $(this).data("id");

        $.getJSON("http://127.0.0.1:8000/index/product/" + idProduit, function (
            data
        ) {
            var items = [];

            items.push(
                "<div class='row'><div class='col-md-6 product-image3' ><img class='image' src='" +
                data[0].image +
                "' class='img-responsive' style='height:90px;'></div><div class='col-md-6 product_content'><div class='rating'><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span>(10 reviews)</div><p class='desc'>" +
                data[0].description +
                "</p><h3 class='price'><span class='glyphicon glyphicon-usd'></span>" +
                data[0].prix +
                "</h3><div class='row'><div class='col-md-4 col-sm-6 col-xs-12'><select class='form-control' name='select'><option value=' selected='>Color</option><option value='black'>Black</option><option value='white'>White</option><option value='gold'>Gold</option><option value='rose gold'>Rose Gold</option></select></div><!-- end col --><div class='col-md-4 col-sm-6 col-xs-12'><select class='form-control' name='select'><option value=''>Capacity</option><option value=''>16GB</option><option value=''>32GB</option><option value=''>64GB</option><option value=''>128GB</option></select></div><!-- end col --><div class='col-md-4 col-sm-12'><select class='form-control' name='select'><option value='' selected='''>QTY</option><option value=''>1</option><option value=''>2</option><option value=''>3</option></select></div><!-- end col --></div><div class='space-ten'></div><div class='btn-ground'><button type='button' class='btn btn-primary' data-id='" +
                data[0].id +
                "' id='addtocart'><span class='glyphicon glyphicon-shopping-cart'></span> Add To Cart</button><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-heart'></span> Add To Wishlist</button></div></div></div>"
            );

            $("#product-viewb").html(items);
        });
    });
    $.getJSON("http://127.0.0.1:8000/All/Categories", function (data) {
        var items = [];
        $.each(JSON.parse(data), function (key, val) {
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
            html: items.join("")
        }).appendTo("#sticky-sidebar");
        $.getJSON("http://127.0.0.1:8000/All/Products/", function (data) {
            var items = [];
            $.each(JSON.parse(data), function (key, val) {
                items.push(
                    "<div class='col-md-3 col-sm-6 ' data-toggle='modal' data-target='#product_view' data-id='" +
                    val.id +
                    "'><div class='product-grid'><div class='product-image3'><a href='#'><img class='image' src='" +
                    val.image +
                    "' data-id='" +
                    val.id +
                    "'></a><ul class='social'><li></li><li><a href='#'><i class='fa fa-shopping-cart'></i></a></li></ul><span class='product-new-label'>New</span></div><div class='product-content'><h3 class='title'><a href='#'>" +
                    val.name +
                    "</a></h3><div class='price'>" +
                    val.prix +
                    "</div><ul class='rating'><li class='fa fa-star'></li><li class='fa fa-star'></li><li class='fa fa-star'></li><li class='fa fa-star disable'></li><li class='fa fa-star disable'></li></ul></div></div></div>"
                );
            });

            $("#product-view").html(items);
            $(".categorie-btn").click(function () {
                var idCategorie = $(this).data("id");
                $.getJSON(
                    "http://127.0.0.1:8000/index/categorie/" + idCategorie,
                    function (data) {
                        var items = [];
                        $.each(JSON.parse(data), function (key, val) {
                            items.push(
                                "<div class='col-md-3 col-sm-6 ' data-toggle='modal' data-target='#product_view' data-id='" +
                                val.id +
                                "'><div class='product-grid'><div class='product-image3'><a href='#'><img class='image' src='" +
                                val.image +
                                "' data-id='" +
                                val.id +
                                "'></a><ul class='social'><li></li><li><a href='#'><i class='fa fa-shopping-cart'></i></a></li></ul><span class='product-new-label'>New</span></div><div class='product-content'><h3 class='title'><a href='#'>" +
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
});