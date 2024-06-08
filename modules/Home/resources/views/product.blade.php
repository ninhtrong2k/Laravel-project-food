<div class="tab-content">
    <div id="tab-1" class="tab-pane fade show p-0 active">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    @if ($products)
                        @foreach ($products as $product)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="{{ $product->image }}" class="img-fluid w-100 rounded-top"
                                            alt="{{ $product->name }}">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">Fruits</div>
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4>{{ $product->name }}</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                            incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            <a data-product-id="{{ $product->id }}"
                                                class="btn border border-secondary rounded-pill px-3 text-primary add_to_cart"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div id="tab-2" class="tab-pane fade show p-0">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{ asset('clients/img/fruite-item-5.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Fruits</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Grapes</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt
                                </p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{ asset('clients/img/fruite-item-2.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Fruits</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Raspberries</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt
                                </p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-3" class="tab-pane fade show p-0">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{ asset('clients/img/fruite-item-1.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Fruits</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Oranges</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt
                                </p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{ asset('clients/img/fruite-item-6.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Fruits</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Apple</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt
                                </p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-4" class="tab-pane fade show p-0">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{ asset('clients/img/fruite-item-5.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Fruits</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Grapes</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt
                                </p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{ asset('clients/img/fruite-item-4.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Fruits</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Apricots</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt
                                </p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab-5" class="tab-pane fade show p-0">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{ asset('clients/img/fruite-item-3.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Fruits</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Banana</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt
                                </p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{ asset('clients/img/fruite-item-2.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Fruits</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Raspberries</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt
                                </p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <img src="{{ asset('clients/img/fruite-item-1.jpg') }}"
                                    class="img-fluid w-100 rounded-top" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px;">Fruits</div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4>Oranges</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt
                                </p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                    <a href="#"
                                        class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        document.querySelectorAll('.add_to_cart').forEach(function(button) {
            button.addEventListener('click', async function(event) {
                event.preventDefault();
                const productId = this.getAttribute('data-product-id');
                const cartItems = JSON.parse(localStorage.getItem('cartItems')) || {};

                if (cartItems[productId]) {
                    cartItems[productId].quantity += 1;
                } else {
                    // Lưu ID sản phẩm cùng với thông tin giỏ hàng
                    cartItems[productId] = {
                        id: productId, // Lưu ID sản phẩm
                        quantity: 1
                    };
                }
                localStorage.setItem('cartItems', JSON.stringify(cartItems));

                // render quantity cart
                await renderCartItems(cartItems)
                renderCartQuantity(cartItems)
                data = await fetchProductName(productId)
                Toastify({
                    text: `You have now added ${data.data} to the cart.`,
                    duration: 3000,
                    destination: "https://github.com/apvarun/toastify-js",
                    newWindow: true,
                    close: true,
                    gravity: "bottom", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                    onClick: function() {} // Callback after click
                }).showToast();
            });
        });
    </script>
@endsection
