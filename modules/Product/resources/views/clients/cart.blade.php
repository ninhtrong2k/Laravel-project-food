@extends('layouts.clients')
@section('content')
    @include('parts.clients.breadcrumb')
    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                        <tbody class="cart-list-page">
                        </tbody>
                </table>
                <div class="inf-cart row"></div>
        </div>
    </div>
    <!-- Cart Page End -->
@endsection
@section('scripts')
    <script>
        async function renderPageCartItems(cartItems) {
            if (cartItems) {
                data = await fetchListCart(cartItems);
                console.log(data);
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
                        let pageCartListHTML = '';
                        cartItemsArray.forEach(([productId, product]) => {
                            const {
                                price,
                                total_price,
                                quantity,
                                name,
                                image,
                                id
                            } = product;
                            pageCartListHTML += `
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="${image}" class="img-fluid me-5 rounded-circle"
                                                style="width: 80px; height: 80px;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">${name}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">$${price} </p>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button data-product-id="${productId}" class="btn btn-sm btn-minus rounded-circle bg-light border decrease-quantity">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input  type="text" class="form-control form-control-sm text-center border-0"
                                                value="${quantity}">
                                            <div class="input-group-btn">
                                                <button data-product-id="${productId}" class="btn btn-sm btn-plus rounded-circle bg-light border increase-quantity">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">${price}$</p>
                                    </td>
                                    <td>
                                        <button data-product-id="${productId}" class="btn btn-md rounded-circle bg-light border mt-4 remove-item" >
                                            <i class="fa fa-times text-danger"></i>
                                        </button>
                                    </td>

                                </tr>
                    `;
                        });
                        document.querySelector('.cart-list-page').innerHTML = pageCartListHTML;
                        document.querySelector('.inf-cart').innerHTML =
                            `
                                <div class="col-lg-4 col-md-12 mb-2">
                                    <input type="text" class="border-0 border-bottom rounded me-5 py-3" placeholder="Coupon Code">
                                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>    
                                </div>
                                <div class="col-lg-4 col-md-12 mb-2 d-flex justify-content-center">
                                    <span class="mb-0 mt-4 ">Toatal :  $${totalPrice}</span>
                                </div>
                                <div class="col-lg-4 col-md-12 mb-2 px-5  d-flex justify-content-end">
                                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase" type="button">Proceed Checkout</button>
                                </div>
                        `;
                        document.querySelectorAll('.decrease-quantity').forEach(button => {
                            button.addEventListener('click', async function() {
                                const productId = this.getAttribute('data-product-id');
                                if (cartItemsNew[productId] && cartItemsNew[productId].quantity >
                                    1) {
                                    cartItemsNew[productId].quantity -= 1;
                                } else {
                                    delete cartItemsNew[productId];
                                }
                                localStorage.setItem('cartItems', JSON.stringify(cartItemsNew));
                                renderCartQuantity(cartItemsNew)
                                await renderPageCartItems(cartItemsNew)
                            });
                        });

                        document.querySelectorAll('.increase-quantity').forEach(button => {
                            button.addEventListener('click', async function() {
                                const productId = this.getAttribute('data-product-id');
                                if (cartItemsNew[productId]) {
                                    cartItemsNew[productId].quantity += 1;
                                }
                                localStorage.setItem('cartItems', JSON.stringify(cartItemsNew));
                                renderCartQuantity(cartItemsNew)
                                await renderPageCartItems(cartItemsNew)
                            });
                        });

                        document.querySelectorAll('.remove-item').forEach(button => {
                            button.addEventListener('click', async function() {
                                const productId = this.getAttribute('data-product-id');
                                if (cartItemsNew[productId]) {
                                    delete cartItemsNew[productId];
                                }
                                localStorage.setItem('cartItems', JSON.stringify(cartItemsNew));
                                renderCartQuantity(cartItemsNew)
                                await renderPageCartItems(cartItemsNew)
                            });
                        });
                    }
                } else {
                    document.querySelector('.cart-list-page').innerHTML =
                        `<tr><p class="mt-2 text-danger"> Cart data is invalid or empty</p></tr>`;
                    localStorage.removeItem("cartItems");
                }
            }
        }
        const cartPageItems = JSON.parse(localStorage.getItem('cartItems')) || {};
        renderPageCartItems(cartPageItems)
    </script>
@endsection
