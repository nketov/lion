$(document).ready(function ($) {

    var currency = $('#currency').attr('value');
    var flag = $('#' + currency).find('span').attr('class');
    $('#currency-flag').attr('class', flag);

    $('.m-langLink').on('click', function (e) {
        $('.dropdown').addClass('open');
    });

    $('.dropdown-menu a').on('click', function (e) {

        $('#currency-flag').attr('class', $(this).find('span').attr('class'));
        var currency = $(this).attr('id')
        $.ajax({
            method: "POST",
            url: '/site/change-currency',
            data: {currency: currency},
        })
            .done(function (data) {
                if (currency != $('#currency').attr('value'))
                    location.reload();
            });


        // location.href = 'google.com';
    });


    $('.img-responsive').on('click', function (e) {
        window.open($(this).attr("src"),'_blank');
    });


    $('.add-cart').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var qty = $(this).data('qty');
        $('#cart-modal').modal('show');
        $('#cart-modal').find('input').val(1);
        $('#cart-modal').find('input').data('id', id);
        $('#cart-modal').find('input').attr('max', qty);

    })


    $('#modal-add').on('click', function (e) {
        e.preventDefault();
        var id = $('#cart-modal').find('input').data('id');
        var qty = $('#cart-modal').find('input').val();
        $('#cart-modal').modal('hide');
        $.ajax({
                url: '/excel/add-cart',
                data: {id: id, qty: qty},
                type: 'GET',
                success: function (res) {
                    $('.cart-counter').css('opacity','1');
                    var count = 1+ parseInt($('.cart-counter').text());
                    $('.cart-counter').text(count++);
                    alert('Товар добавлен в корзину!')
                },
                error: function () {
                    alert('Error!')
                }
            }
        )
    })

    $('.cart-view').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        window.location.href = "/excel/view?id=" + id;
    })

    $('.cart-delete').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        window.location.href = "/excel/delete-cart?id=" + id;
    })


    $('.phone-change').on('click', function (e) {
        e.preventDefault();
        $('#phone-modal').modal('show');
    })

    if($('.cart-counter').text() >0){
        $('.cart-counter').css('opacity','1');
    }

});