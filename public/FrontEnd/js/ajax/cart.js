$(document).ready(function() {
    // Đặt các route từ thẻ meta hoặc từ chính mã Blade trước đó
    let updateQuantityRoute = $('meta[name="update-quantity-route"]').attr('content');
    let clearCartRoute = $('meta[name="clear-cart-route"]').attr('content');
    let removeCartItemUrl = $('meta[name="remove-cart-item-url"]').attr('content');
    let addCartItemUrl = $('meta[name="add-cart-item-url"]').attr('content');

    // Ajax update quantity cart
    $(document).on('click', '.qtybtn', function() {
        let quantityInput = $(this).siblings('.cart-quantity');
        let rowid = quantityInput.data('rowid');
        let product = quantityInput.data('product');
        let quantity = parseInt(quantityInput.val());
    
        if (!isNaN(quantity) && quantity > 0) {
            $.ajax({
                url: updateQuantityRoute,
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    rowid: rowid,
                    quantity: quantity,
                    product: product
                },
                success: function(response) {
                    if (response.success) {

                    $('.cart-quantity[data-rowid="' + rowid + '"]').val(quantity);
                    $('.total-all').text(response.total + ' VND');
                    $('#subtotal-' + rowid).text(response.subtotal.toLocaleString('en-US') + ' VND');
                    }else if (response.error){
                        showToast('Insufficient product quantity !', {
                            gravity: 'top',
                            position: 'right',
                            duration: 5000,
                            close: true,
                            backgroundColor: '#ffcc00'
                        });
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Hiển thị lỗi nếu có
                   
                }
            });
        }
    });
    
    // Ajax clear cart
    $('.cart-clear').on('click', function(event) {
        event.preventDefault();
        $.ajax({
            url: clearCartRoute,
            method: 'GET',
            data: {},
            success: function(response) {
                if (response.success) {
                    $('.cart-items').empty();
                    $('.cart-count').remove();
                    $('.total-all').text('0 VND');
                    $('.cart-controller').html(`<tr class="cart-items"><td colspan="6"><p class="text-center text-primary">NOT PRODUCT</p></td></tr>`);
                }
            },
            error: function(xhr) {
                alert("An error occurred while clearing the cart.");
            }
        });
    });

    // Ajax remove cart product
    $(document).on('click','.remove-cart-product', function(e) {
        e.preventDefault();
        let rowid = $(this).data('rowid');
        // alert(rowid);
        $.ajax({
            url: removeCartItemUrl + '/' + rowid,
            method: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                rowid: rowid,
            },
            success: function(response) {
                if (response.success) {
                    if(response.count!=0){
                        $('.cart-count').text(response.count);
                    }else{
                        $('.cart-count').remove();
                    }
                    $('.cart-item-remove-' + rowid).remove();
                    $('.total-all').text(response.newTotal + ' VND');
                } else {
                    alert("An error occurred. Please try again.");
                }
            },
            error: function(xhr) {
                alert("An error occurred while removing the product.");
            }
        });
    });

    $(document).on('click', '.add-cart-item', function(e) {
        e.preventDefault();
        var product_id = $(this).data('product-id');
        let quantity=1;
        $.ajax({
            url: addCartItemUrl,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: product_id,
                quantity: quantity
            },
            success: function(response) {
                // if (response.redirect) {
                    // window.location.href = response.redirect;
                    showToast('Added to cart successfully', {
                        gravity: 'top',
                        position: 'right',
                        duration: 5000,
                        close: false,
                        backgroundColor: '#28a745'
                    });
                // }
                        },
            error: function(xhr) {
                // alert("An error occurred while removing the product.");
            }
        });
    });
    
});