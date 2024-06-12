@extends('layouts.clients')
@section('content')
    @include('parts.clients.breadcrumb')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Billing details</h1>
            <form action="#">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-item w-100">
                                <label class="form-label my-3">First Name && Last Name<sup>*</sup></label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Company Name<sup>*</sup></label>
                            <input type="text" name="company" class="form-control">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Address <sup>*</sup></label>
                            <input type="text" name="address" class="form-control" placeholder="House Number Street Name">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Town/City<sup>*</sup></label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Country<sup>*</sup></label>
                            <input type="text" name="country" class="form-control">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                            <input type="text" name="zip" class="form-control">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Mobile<sup>*</sup></label>
                            <input type="tel" name="phone" class="form-control">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Email Address<sup>*</sup></label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Note</label>
                            <textarea name="text" name="note" class="form-control" spellcheck="false" cols="30" rows="11"
                                placeholder="Oreder Notes (Optional)"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="cart-check-out-page">
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="img/vegetable-item-2.jpg" class="img-fluid rounded-circle"
                                                    style="width: 90px; height: 90px;" alt="">
                                            </div>
                                        </th>
                                        <td class="py-5">Awesome Brocoli</td>
                                        <td class="py-5">$69.00</td>
                                        <td class="py-5">2</td>
                                        <td class="py-5">$138.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">$135.00</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input id="Payments-1" type="radio" class="form-check-input bg-primary border-0"
                                        name="payment_methods" value="Payments">
                                    <label class="form-check-label" for="Payments-1">Check Payments</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input id="Delivery-1" type="radio" class="form-check-input bg-primary border-0"
                                        name="payment_methods" value="Delivery">
                                    <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input id="Paypal-1" type="radio" class="form-check-input bg-primary border-0"
                                        name="payment_methods" value="Paypal">
                                    <label class="form-check-label" for="Paypal-1">Paypal</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="button"
                                class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        async function renderCheckOutItems(cartItems) {
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
                        let CheckOutListHTML = '';
                        cartItemsArray.forEach(([productId, product]) => {
                            const {
                                price,
                                total_price,
                                quantity,
                                name,
                                image,
                                id,
                            } = product;
                            CheckOutListHTML += `
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="${image}" class="img-fluid rounded-circle"
                                                    style="width: 90px; height: 90px;" alt="">
                                            </div>
                                        </th>
                                        <td class="py-5">${name}</td>
                                        <td class="py-5">$${price}</td>
                                        <td class="py-5">${quantity}</td>
                                        <td class="py-5">$${quantity * price}</td>
                                    </tr>
                    `;
                        });
                        document.querySelector('.cart-check-out-page').innerHTML = CheckOutListHTML;
                        document.querySelector('.cart-check-out-page').innerHTML +=
                            `
                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">$${totalPrice}</p>
                                            </div>
                                        </td>
                                    </tr>
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
                                await renderCheckOutItems(cartItemsNew)
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
                                await renderCheckOutItems(cartItemsNew)
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
                                await renderCheckOutItems(cartItemsNew)
                            });
                        });
                    }
                } else {
                    document.querySelector('.cart-check-out-page').innerHTML =
                        `<tr><p class="mt-2 text-danger"> Cart data is invalid or empty</p></tr>`;
                    localStorage.removeItem("cartItems");
                }
            }
        }
        const cartPageItems = JSON.parse(localStorage.getItem('cartItems')) || {};
        renderCheckOutItems(cartPageItems)
    </script>
@endsection
