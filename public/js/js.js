$(document).ready(function() {
    $(document).on("click", "#addtocart", function(e) {
        var items = [];
        var idProduit = $(this).data("id");
        console.log(idProduit);
        $.get("http://127.0.0.1:8000/index/panier/add/" + idProduit, function() {});
    });

    $(document).on("click", "#carte", function(e) {
        $.getJSON("http://127.0.0.1:8000/index/panier", function(data) {
            var items = [];

            $.each(JSON.parse(data), function(key, val) {
                // $.each(this, function(key, val) {
                // console.log(key);
                console.log(val);
                items.push(
                    "<tr> <td>" +
                    val.name +
                    "</td><td>" +
                    val.prix +
                    "$</td><td>" +
                    val.quantity +
                    "</td><td></td></tr> "
                );
            });
            $(".cart-list").html(items);

            $.get("http://127.0.0.1:8000/total", function(data) {
                $("#total").html(data + "$");
            });
        });
    });
    $(document).on("click", ".cart", function(e) {
        var items = [];
        console.log("sfs");
        $.getJSON("http://127.0.0.1:8000/index/product/4", function(data) {
            console.log("zab");

            items.push(
                "<tr><th scope='row' class='border-0'><div class='p-2'><img src='" +
                data.pic1 +
                "' alt='' width='70' class='img-fluid rounded shadow-sm'><div class='ml-3 d-inline-block align-middle'><h5 class='mb-0'> <a href='' class='text-dark d-inline-block align-middle'>" +
                data.name +
                "</a></h5></div></div></th><td class='border-0 align-middle'><strong>" +
                data.prix +
                "</strong></td><td class='border-0 align-middle'><strong></strong></td><td class='border-0 align-middle rm'><a href='#' class='text-dark '><i class='fa fa-trash'></i></a></td></tr>"
            );

            $(".cart-list").html(items);
        });
    });
    $(document).on("click", ".image", function(e) {
        var idProduit = $(this).data("id");
        console.log(idProduit);
        $.getJSON("http://127.0.0.1:8000/index/product/" + idProduit, function(
            data
        ) {
            var items = [];
            console.log("anaa");
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
            console.log(items);
            $("#product-viewb").html(items);
        });
    });
    $.getJSON("http://127.0.0.1:8000/All/Categories", function(data) {
        var items = [];
        // console.log(data);
        $.each(JSON.parse(data), function(key, val) {
            // $.each(this, function(key, val) {
            // console.log(key);
            console.log(val);
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
        $.getJSON("http://127.0.0.1:8000/All/Products/", function(data) {
            var items = [];
            $.each(JSON.parse(data), function(key, val) {
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
            $(".categorie-btn").click(function() {
                var idCategorie = $(this).data("id");
                $.getJSON(
                    "http://127.0.0.1:8000/index/categorie/" + idCategorie,
                    function(data) {
                        var items = [];
                        $.each(JSON.parse(data), function(key, val) {
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