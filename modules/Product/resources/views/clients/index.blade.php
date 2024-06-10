@extends('layouts.clients')
@section('content')
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Fresh fruits shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" name="keyword" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="volvo">Nothing</option>
                                    <option value="saab">Popularity</option>
                                    <option value="opel">Organic</option>
                                    <option value="audi">Fantastic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a><i class="fas fa-apple-alt me-2"></i>Tất Cả</a>
                                                    <span><input id="" type="radio" name="category_id"
                                                            value="999" checked></span>
                                                </div>
                                            </li>
                                            @if ($categories)
                                                @foreach ($categories as $category)
                                                    <li>
                                                        <div class="d-flex justify-content-between fruite-name">
                                                            <a><i
                                                                    class="fas fa-apple-alt me-2"></i>{{ $category->name }}</a>
                                                            <span><input id="" type="radio" name="category_id"
                                                                    value="{{ $category->id }}"></span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Price</h4>
                                        <input id="priceInput1" type="range" class="form-range w-100" name="priceInput1"
                                            min="0" max="500" value="0"
                                            oninput="amount1.value=priceInput1.value">
                                        <output id="amount1" name="amount1" min-velue="0" max-value="500"
                                            for="priceInput1">0</output>
                                    </div>
                                    <div class="mb-3">
                                        <input id="priceInput2" type="range" class="form-range w-100" name="priceInput2"
                                            min="0" max="500" value="0"
                                            oninput="amount2.value=priceInput2.value">
                                        <output id="amount2" name="amount2" min-velue="0" max-value="500"
                                            for="priceInput2">0</output>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Additional</h4>
                                        <div class="mb-2">
                                            <input id="Categories-1" type="radio" class="me-2" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-1"> Organic</label>
                                        </div>
                                        <div class="mb-2">
                                            <input id="Categories-2" type="radio" class="me-2" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-2"> Fresh</label>
                                        </div>
                                        <div class="mb-2">
                                            <input id="Categories-3" type="radio" class="me-2" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-3"> Sales</label>
                                        </div>
                                        <div class="mb-2">
                                            <input id="Categories-4" type="radio" class="me-2" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-4"> Discount</label>
                                        </div>
                                        <div class="mb-2">
                                            <input id="Categories-5" type="radio" class="me-2" name="Categories-1"
                                                value="Beverages">
                                            <label for="Categories-5"> Expired</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="mb-3">Featured products</h4>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                                            <img src="{{ asset('clients/img/featur-1.jpg') }}" class="img-fluid rounded"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">Big Banana</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">2.99 $</h5>
                                                <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                                            <img src="{{ asset('clients/img/featur-2.jpg') }}" class="img-fluid rounded"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">Big Banana</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">2.99 $</h5>
                                                <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="rounded me-4" style="width: 100px; height: 100px;">
                                            <img src="{{ asset('clients/img/featur-3.jpg') }}" class="img-fluid rounded"
                                                alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">Big Banana</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">2.99 $</h5>
                                                <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center my-4">
                                        <a href="#"
                                            class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew
                                            More</a>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="position-relative">
                                        <img src="{{ asset('clients/img/banner-fruits.jpg') }}"
                                            class="img-fluid w-100 rounded" alt="">
                                        <div class="position-absolute"
                                            style="top: 50%; right: 10px; transform: translateY(-50%);">
                                            <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div id="products-container" class="row g-4 justify-content-center">
                            </div>
                            <div id="pagination-container">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection

@section('stylesheet')
    <style>
        .fruite-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s, transform 0.5s;
        }

        .fruite-item.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
@endsection
@section('scripts')
    <script>
        // public/js/custom.js
        const productsContainer = document.getElementById('products-container');
        const paginationContainer = document.getElementById('pagination-container');

        function fetchProducts(url) {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    productsContainer.innerHTML =
                        `<div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div>`;

                    // Container ẩn để tải ảnh
                    const hiddenContainer = document.createElement('div');
                    hiddenContainer.style.display = 'none';
                    document.body.appendChild(hiddenContainer);
                    let productsHTML = ''; // Biến tạm để lưu HTML của sản phẩm
                    let imagesLoaded = 0; // Số lượng ảnh đã tải

                    function checkImagesLoaded() {
                        if (imagesLoaded === data.products.length) {
                            // Hiển thị sản phẩm và xóa spinner
                            productsContainer.innerHTML = productsHTML;
                            // Hiển thị pagination
                            // paginationContainer.innerHTML = data.links;
                            // Xóa container ẩn
                            document.body.removeChild(hiddenContainer);
                        }
                    }
                    // Hiển thị sản phẩm
                    data.products.forEach(product => {
                        const img = document.createElement('img');
                        img.src = product.image;
                        img.alt = product.name;
                        // link ảnh oke 
                        img.onload = () => {
                            imagesLoaded++;
                            checkImagesLoaded();
                            // console.log(imagesLoaded)
                        };
                        // ví dụ link ảnh bị hỏng
                        img.onerror = () => {
                            imagesLoaded++;
                            checkImagesLoaded();
                        };
                        hiddenContainer.appendChild(img);

                        productsHTML += `
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="rounded position-relative fruite-item">
                                <div class="fruite-img">
                                    <img src="${product.image}" class="img-fluid w-100 rounded-top" alt="${product.name}">
                                </div>
                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">${product.name}</div>
                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                    <h4>${product.name}</h4>
                                    <p class="line-clamp" >${product.description}</p>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold mb-0">$${product.price} / kg</p>
                                        <a data-product-id="${product.id}" class="btn border border-secondary rounded-pill px-3 text-primary add_to_cart"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    });

                    setTimeout(() => {
                        // Render sản phẩm và xóa spinner
                        productsContainer.innerHTML = productsHTML;

                        if (paginationContainer.innerHTML !== data.links) {
                            paginationContainer.innerHTML = data.links;
                        }
                        // Gán sự kiện click cho các nút 'Add to cart'
                        document.querySelectorAll('.add_to_cart').forEach(function(button) {
                            addToCart(button);
                        });

                        // Hiển thị pagination
                        // productsContainer.innerHTML += data.links;
                        // Hiển thị pagination nếu có sự thay đổi


                        const items = document.querySelectorAll('.fruite-item');
                        items.forEach(function(item, index) {
                            setTimeout(function() {
                                    item.classList.add('show');
                                }, index *
                                100); //
                        });
                    }, 1000);
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                    // Hiển thị thông báo lỗi
                    productsContainer.innerHTML =
                        '<p class="text-danger">Error loading products. Please try again later.</p>';
                });
        }
        // Fetch sản phẩm khi trang được tải
        document.addEventListener('DOMContentLoaded', () => {
            productsContainer.innerHTML =
                `<div class="spinner-grow" role="status"></div>`;
            fetchProducts('http://localhost:8000/data/products/products');



            const categoryInputs = document.querySelectorAll('input[name="category_id"]');
            const keywordInputs = document.querySelectorAll('input[name="keyword"]');
            const priceInput1 = document.getElementById('priceInput1');
            const priceInput2 = document.getElementById('priceInput2');

            let debounceTimer;

            function logValues() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    const selectedCategory = document.querySelector('input[name="category_id"]:checked');
                    const categoryValue = selectedCategory ? selectedCategory.value : 'None';
                    console.log(`Selected Category: ${categoryValue}`);
                    console.log(`Price Input 1: ${priceInput1.value}`);
                    console.log(`Price Input 2: ${priceInput2.value}`);
                    const keywordValues = Array.from(keywordInputs).map(input => input.value);
                    console.log(`Keyword Inputs: ${keywordValues.join(', ')}`);

                }, 300); // Thời gian debounce là 300ms
            }

            categoryInputs.forEach(input => {
                input.addEventListener('change', logValues);
            });
            keywordInputs.forEach(input => {
                input.addEventListener('input', logValues);
            });
            priceInput1.addEventListener('input', logValues);
            priceInput2.addEventListener('input', logValues);

        });
        // Xử lý sự kiện khi nhấp vào liên kết phân trang
        paginationContainer.addEventListener('click', event => {
            event.preventDefault();
            if (event.target.tagName === 'A') {
                const url = event.target.getAttribute('href');
                fetchProducts(url);
            }
        });
    </script>
@endsection
