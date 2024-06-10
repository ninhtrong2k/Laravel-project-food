<div class="col-md-6 col-lg-6 col-xl-4">
    <div class="rounded position-relative fruite-item">
        <div class="fruite-img">
            <img src="${product.image}" class="img-fluid w-100 rounded-top"
                alt="${product.name}">
        </div>
        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
            style="top: 10px; left: 10px;">${product.name}</div>
        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
            <h4>Grapes</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do
                eiusmod te
                incididunt</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
                <p class="text-dark fs-5 fw-bold mb-0">$${product.price} / kg
                </p>
                <a data-product-id="${product.id}"
                    class="btn border border-secondary rounded-pill px-3 text-primary add_to_cart"><i
                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                    cart</a>
            </div>
        </div>
    </div>
</div>