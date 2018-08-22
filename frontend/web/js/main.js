$(document).ready(function () {

    var  currency = $('#currency').attr('value');    
    var flag= $('#'+currency).find('span').attr('class') ;    
    $('#currency-flag').attr('class', flag);

    $('.dropdown-menu a').on('click', function (e) {
        
        $('#currency-flag').attr('class', $(this).find('span').attr('class'));
        var currency= $(this).attr('id')        
        $.ajax({
            method: "POST",
            url: '/site/change-currency',
            data: {currency:currency},
        })
            .done(function( data ) {
              if (currency != $('#currency').attr('value'))  location.reload();                
            });



        // location.href = 'google.com';
    });

    $('.add-cart').on('click', function (e) {
        e.preventDefault();
        var id=$(this).data('id');
        $.ajax({
            url : '/excel/add-cart',
            data: {id:id},
            type: 'GET',
            success: function (res) {
                console.log(res);
            },
            error :function () {
                alert('Error!')
            }

        }


        )

    })




});