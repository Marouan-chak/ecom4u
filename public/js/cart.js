$(document).ready(function() {
    $(document).on("click", "#history", function(e) {
        $.get("http://127.0.0.1:8000/commande", function(data) {
            var items = [];
            console.log(data);
            var string = "-";
            $.each(JSON.parse(data), function(key, val) {
                val.produits.forEach((element) => {
                    string = string.concat(element);
                    string = string.concat("<br> ");
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

                string = "";
            });
            $(".commande-list").html(items);
        });
    });
    $("form.cart-handle").on("submit", function() {
        //  $.get("http://127.0.0.1:8000/index/panier/valid", function (data) {
        var that = $(this),
            url = "http://127.0.0.1:8000/index/panier/valid";
        (type = that.attr("method")), (data = {});
        data["address"] = that.find("[name]").val();
        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function(response) {
                console.log(response);
            },
        });
    });

    $(document).on("click", "#remove", function(e) {
        var idProduit = $(this).data("id");

        $.get("http://127.0.0.1:8000/index/panier/remove/" + idProduit, function(
            data
        ) {
            console.log("row will be deleted ? : " + data);
            if (data) {
                $(this).closest("tr").remove();
            }
            $.get("http://127.0.0.1:8000/index/panier/size", function(data) {
                $("#nb-prod").html(data);
            });
            $.getJSON("http://127.0.0.1:8000/index/panier", function(data) {
                var items = [];

                $.each(JSON.parse(data), function(key, val) {
                    // $.each(this, function(key, val) {
                    items.push(
                        "<tr> <td>" +
                        val.name +
                        "</td><td>" +
                        val.prix +
                        "$</td><td id='quantity'>" +
                        val.quantity +
                        "</td><td><button  data-id='" +
                        val.product +
                        "' id='remove'><i   class='fas fa-trash'></i></button></td></tr> "
                    );
                });
                $(".cart-list").html(items);

                $.get("http://127.0.0.1:8000/total", function(data) {
                    $("#total").html(data + "$");
                });
            });
        });
    });
    $(document).on("click", "#quickAddToCart", function(e) {
        var items = [];
        var idProduit = $(this).data("id");
        $.get(
            "http://127.0.0.1:8000/index/panier/add/" + idProduit,
            function() {}
        );
        $.get("http://127.0.0.1:8000/index/panier/size", function(data) {
            $("#nb-prod").html(data);
        });
    });
    $(document).on("click", "#addtocart", function(e) {
        var items = [];
        var idProduit = $(this).data("id");
        $.get("http://127.0.0.1:8000/index/panier/add/" + idProduit, function(
            data
        ) {});
        $.get("http://127.0.0.1:8000/index/panier/size", function(data) {
            $("#nb-prod").html(data);
        });
    });

    $(document).on("click", "#carte", function(e) {
        $.getJSON("http://127.0.0.1:8000/index/panier", function(data) {
            var items = [];

            $.each(JSON.parse(data), function(key, val) {
                // $.each(this, function(key, val) {
                items.push(
                    "<tr> <td>" +
                    val.name +
                    "</td><td>" +
                    val.prix +
                    "$</td><td id='quantity'>" +
                    val.quantity +
                    "</td><td><button  data-id='" +
                    val.product +
                    "' id='remove'><i   class='fas fa-trash'></i></button></td></tr> "
                );
            });
            $(".cart-list").html(items);

            $.get("http://127.0.0.1:8000/total", function(data) {
                $("#total").html(data + "$");
            });
        });
    });
});