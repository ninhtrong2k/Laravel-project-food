(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner(0);


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow');
            } else {
                $('.fixed-top').removeClass('shadow');
            }
        } else {
            if ($(this).scrollTop() > 55) {
                $('.fixed-top').addClass('shadow').css('top', -55);
            } else {
                $('.fixed-top').removeClass('shadow').css('top', 0);
            }
        } 
    });
    
    
   // Back to top button
   $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
        $('.back-to-top').fadeIn('slow');
    } else {
        $('.back-to-top').fadeOut('slow');
    }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 2000,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:1
            },
            992:{
                items:2
            },
            1200:{
                items:2
            }
        }
    });


    // vegetable carousel
    $(".vegetable-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: false,
        dots: true,
        loop: true,
        margin: 25,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });


    // Modal Video
    // $(document).ready(function () {
    //     var $videoSrc;
    //     $('.btn-play').click(function () {
    //         $videoSrc = $(this).data("src");
    //     });
    //     console.log($videoSrc);

    //     $('#videoModal').on('shown.bs.modal', function (e) {
    //         $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    //     })

    //     $('#videoModal').on('hide.bs.modal', function (e) {
    //         $("#video").attr('src', $videoSrc);
    //     })
    // });



    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

})(jQuery);


/// JS custom
const cartItems = JSON.parse(localStorage.getItem('cartItems')) || {};
renderCartQuantity = (cartItems) => {
    let totalQuantity = 0;
    for (const productId in cartItems) {
        if (cartItems.hasOwnProperty(productId)) {
            totalQuantity += cartItems[productId].quantity;
        }
    }
    if(totalQuantity === 0){
        document.querySelector('.total-quantity').innerHTML = ``;
    }else{
        document.querySelector('.total-quantity').innerHTML =
            `<span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">${totalQuantity}</span>`;
    }
}
renderCartQuantity(cartItems)

async function renderCartItems(cartItems) {
    if (cartItems) {
        data = await fetchProductDetails(cartItems);
        if (data && data.allPrice) {
            allPrice = data.allPrice;
            cartItemsArray = Object.entries(data.data);
            if (cartItemsArray) {
                let cartListHTML = '';
                cartItemsArray.forEach(([productId, product]) => {
                    const {
                        price,
                        total_price,
                        quantity,
                        name
                    } = product;
                    cartListHTML += `
                    <li class="list-group-item d-flex justify-content-between lh-sm align-items-center">
                        <div>
                            <h6 class="my-0">${name}</h6>
                            <small class="text-body-secondary">$${price} 
                                <button class="decrease-quantity" data-product-id="${productId}">-</button>
                                <input type="text" value="${quantity}" readonly style="width: 40px; text-align: center;"/>
                                <button class="increase-quantity" data-product-id="${productId}">+</button>
                            </small>
                        </div>
                        <div>
                            <span class="text-body-secondary">$${total_price}</span>
                            <button class="remove-item" data-product-id="${productId}"><i class="fa-solid fa-circle-xmark"></i></button>
                        <div>
                    </li>`;
                });
                document.querySelector('.cart-list').innerHTML = cartListHTML;
                document.querySelector('.cart-list').innerHTML += `
                <li class="list-group-item d-flex justify-content-between">
                    <span class="fw-bold">Total (USD)</span>
                    <strong>$${allPrice}</strong>
                </li>`;
                // Thêm sự kiện click cho các nút tăng và giảm số lượng
                document.querySelectorAll('.decrease-quantity').forEach(button => {
                    button.addEventListener('click', async function() {
                        const productId = this.getAttribute('data-product-id');
                        if (cartItems[productId] && cartItems[productId].quantity > 1) {
                            cartItems[productId].quantity -= 1;
                        } else {
                            delete cartItems[productId];
                        }
                        localStorage.setItem('cartItems', JSON.stringify(cartItems));
                        renderCartQuantity(cartItems)
                        await renderCartItems(cartItems)
                    });
                });

                document.querySelectorAll('.increase-quantity').forEach(button => {
                    button.addEventListener('click', async function() {
                        const productId = this.getAttribute('data-product-id');
                        if (cartItems[productId]) {
                            cartItems[productId].quantity += 1;
                        }
                        localStorage.setItem('cartItems', JSON.stringify(cartItems));
                        renderCartQuantity(cartItems)
                        await renderCartItems(cartItems)
                    });
                });

                document.querySelectorAll('.remove-item').forEach(button => {
                    button.addEventListener('click', async function() {
                        const productId = this.getAttribute('data-product-id');
                        if (cartItems[productId]) {
                            delete cartItems[productId];
                        }
                        localStorage.setItem('cartItems', JSON.stringify(cartItems));
                        renderCartQuantity(cartItems)
                        await renderCartItems(cartItems)
                    });
                });
            }
        } else {
            document.querySelector('.cart-list').innerHTML =
                '<li class="list-group-item">Cart data is invalid or empty</li>';
        }
    }
}
renderCartItems(cartItems)
async function fetchProductDetails(cartItems) {
    try {
        const response = await fetch(`http://localhost:8000/data`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(cartItems)
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching product details:', error);
        return null;
    }
}
async function fetchProductName(productId) {
    try {
        const response = await fetch(`http://localhost:8000/dataName`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({"id":productId})
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching product details:', error);
        return null;
    }
}