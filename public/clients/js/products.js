// Total list card
renderCartQuantity = (cartItems) => {
    let totalQuantity = 0;
    for (const productId in cartItems) {
        if (cartItems.hasOwnProperty(productId)) {
            totalQuantity += cartItems[productId].quantity;
        }
    }
    if (totalQuantity === 0) {
        document.querySelector('.total-quantity').innerHTML = ``;
    } else {
        document.querySelector('.total-quantity').innerHTML =
            `<span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">${totalQuantity}</span>`;
    }
}

// Action click add Cart
async function addToCart(button) {
    button.addEventListener('click', async function (event) {
        event.preventDefault();
        const productId = this.getAttribute('data-product-id');
        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || {};

        if (cartItems[productId]) {
            cartItems[productId].quantity += 1;
        } else {
            cartItems[productId] = {
                id: productId,
                quantity: 1
            };
        }
        localStorage.setItem('cartItems', JSON.stringify(cartItems));

        await renderCartItems(cartItems);
        renderCartQuantity(cartItems);
        const data = await fetchProductName(productId);
        Toastify({
            text: `You have now added ${data.data} to the cart.`,
            duration: 3000,
            destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "bottom",
            position: "right",
            stopOnFocus: true,
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            onClick: function () { }
        }).showToast();
    });
}

// Render list cart
async function renderCartItems(cartItems) {
    if (cartItems) {
        data = await fetchListCart(cartItems);
        if (data.data.newListCard === undefined) {
            localStorage.removeItem('cartItems');
        } else {
            localStorage.setItem('cartItems', JSON.stringify(data.data.newListCard));
        }
        const cartItemsNew = JSON.parse(localStorage.getItem('cartItems')) || {};
        if (data.data.listCart && data.data.totalPrice) {
            renderCartQuantity(cartItemsNew)
            totalPrice = data.data.totalPrice;
            cartItemsArray = Object.entries(data.data.listCart);
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
                    <strong>$${totalPrice}</strong>
                </li>`;
                document.querySelectorAll('.decrease-quantity').forEach(button => {
                    button.addEventListener('click', async function () {
                        const productId = this.getAttribute('data-product-id');
                        if (cartItemsNew[productId] && cartItemsNew[productId].quantity > 1) {
                            cartItemsNew[productId].quantity -= 1;
                        } else {
                            delete cartItemsNew[productId];
                        }
                        localStorage.setItem('cartItems', JSON.stringify(cartItemsNew));
                        renderCartQuantity(cartItemsNew)
                        await renderCartItems(cartItemsNew)
                    });
                });

                document.querySelectorAll('.increase-quantity').forEach(button => {
                    button.addEventListener('click', async function () {
                        const productId = this.getAttribute('data-product-id');
                        if (cartItemsNew[productId]) {
                            cartItemsNew[productId].quantity += 1;
                        }
                        localStorage.setItem('cartItems', JSON.stringify(cartItemsNew));
                        renderCartQuantity(cartItemsNew)
                        await renderCartItems(cartItemsNew)
                    });
                });

                document.querySelectorAll('.remove-item').forEach(button => {
                    button.addEventListener('click', async function () {
                        const productId = this.getAttribute('data-product-id');
                        if (cartItemsNew[productId]) {
                            delete cartItemsNew[productId];
                        }
                        localStorage.setItem('cartItems', JSON.stringify(cartItemsNew));
                        renderCartQuantity(cartItemsNew)
                        await renderCartItems(cartItemsNew)
                    });
                });
            }
        } else {
            document.querySelector('.cart-list').innerHTML =
                '<li class="list-group-item">Cart data is invalid or empty</li>';
            localStorage.removeItem("cartItems");
        }
    }
}
async function fetchListCart(cartItems) {
    try {
        const response = await fetch(`http://localhost:8000/data/products/list-cart`, {
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
        const response = await fetch(`http://localhost:8000/data/products/name`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ "id": productId })
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
async function fetchProduct(categoryId) {
    try {
        const response = await fetch(`http://localhost:8000/data/products/list-products`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                "categoryId": categoryId
            })
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
// ================== Shop ===================

// ================== END ===================
// Global functions
handleAddCart = () => {
    document.querySelectorAll('.add_to_cart').forEach(function (button) {
        addToCart(button);
    });
}
animationProductList = () => {
    const itemProduct = document.querySelectorAll('.fruite-item');
    itemProduct.forEach(function (item, index) {
        setTimeout(function () {
            item.classList.add('show');
        }, index * 100);
    });
}
