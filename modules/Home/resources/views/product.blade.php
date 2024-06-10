<div class="tab-content">
    <div id="tab-1" class="tab-pane fade show p-0 active">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4 product-list">
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        const btnCategory = document.querySelectorAll(".btn-category");
        btnCategory.forEach(function(btn) {
            btn.addEventListener("click", function() {
                const categoryId = this.getAttribute("data-category");
                renderListProduct(categoryId)
            });
        });
        async function renderListProduct(categoryId) {
            data = await fetchProduct(categoryId);
            listProductArray = Object.entries(data.data);
            if (listProductArray) {
                let listProductHTML = '';
                listProductArray.forEach(([key, value]) => {
                    const {
                        image,
                        name,
                        price,
                        id
                    } = value;
                    listProductHTML += `
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="${image}" class="img-fluid w-100 rounded-top"
                                            alt="${name}" >
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">Fruits</div>
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4>${name}</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                            incididunt</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">${price} / kg</p>
                                            <a data-product-id="${id}"
                                                class="btn border border-secondary rounded-pill px-3 text-primary add_to_cart"><i
                                                    class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    `
                });
                document.querySelector('.product-list').innerHTML = listProductHTML;

                document.querySelectorAll('.add_to_cart').forEach(function(button) {
                    addToCart(button);
                });
            }

        }
        renderListProduct(999)
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
    </script>
@endsection
