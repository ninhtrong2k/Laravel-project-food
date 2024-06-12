@extends('layouts.clients')
@section('content')
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <h1 class="mb-4">Fresh fruits shop</h1>
            <div id="content-search" class="alert alert-success" style="display:none"></div>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input id="search-keyword" type="search" class="form-control p-3" name="keyword"
                                    placeholder="keywords" aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Filter:</label>
                                <select id="filter" name="filter" class="border-0 form-select-sm bg-light me-3"
                                    form="fruitform">
                                    <option value="0">Vui lòng chọn</option>
                                    <option value="1">Oldest Products</option>
                                    <option value="2">Latest Products</option>
                                    <option value="3">Highest Price Products</option>
                                    <option value="4">Lowest Price Products</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <h4>Categories</h4> <button id="rest-filter" class="btn btn-danger btn-sm">Rest
                                                Filter</button>
                                        </div>
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
                                            min="0" max="1000" value="0"
                                            oninput="amount1.value=priceInput1.value">
                                        <output id="amount1" name="amount1" min-velue="0" max-value="1000"
                                            for="priceInput1">0</output>
                                    </div>
                                    <div class="mb-3">
                                        <input id="priceInput2" type="range" class="form-range w-100" name="priceInput2"
                                            min="0" max="1000" value="0"
                                            oninput="amount2.value=priceInput2.value">
                                        <output id="amount2" name="amount2" min-velue="0" max-value="1000"
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
    @if ($categories)
        <script>
            // Create an object to hold category information
            const categories = {
                @foreach ($categories as $category)
                    {{ $category->id }}: "{{ $category->name }}",
                @endforeach
            };

            function nameCategory(id) {
                return categories[id] || "Unknown Category";
            }
        </script>
    @endif
@endsection
@section('scripts')
    <script>
        const productsContainer = document.getElementById('products-container');
        const paginationContainer = document.getElementById('pagination-container');
        const keywordInputs = document.getElementById('search-keyword');
        const categoryInputs = document.querySelectorAll('input[name="category_id"]');
        const priceInput1 = document.getElementById('priceInput1');
        const priceInput2 = document.getElementById('priceInput2');
        const selectFilter = document.getElementById('filter');
        const restFilter = document.getElementById('rest-filter');
        const contentSearch = document.getElementById('content-search');

        document.addEventListener('DOMContentLoaded', () => {
            let debounceTimer;
            productsContainer.innerHTML = `<div class="spinner-grow" role="status"></div>`;

            fetchProductsData = () => {
                fetchProducts('http://localhost:8000/data/products/products', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(getSearchData())
                });
            }
            logValues = () => {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    fetchProductsData();
                    checkFilterPriceProduct();
                }, 300);
            }

            categoryInputs.forEach(input => {
                input.addEventListener('change', logValues);
            });
            priceInput1.addEventListener('input', logValues);
            priceInput2.addEventListener('input', logValues);
            keywordInputs.addEventListener('input', logValues);
            selectFilter.addEventListener('input', logValues);

            restFilter.addEventListener('click', function() {
                priceInput1.value = '0';
                priceInput2.value = '0';

                document.querySelectorAll('input[name="category_id"]').forEach(radio => {
                    radio.checked = false;
                });

                const defaultCategory = document.querySelector('input[name="category_id"][value="999"]');
                if (defaultCategory) {
                    defaultCategory.checked = true;
                }

                keywordInputs.value = '';
                selectFilter.value = '0';
                logValues();
                contentSearch.style.display = 'none';
            });

            logValues(); // Fetch initial data on page load
            paginationContainer.addEventListener('click', event => {
                event.preventDefault();
                if (event.target.tagName === 'A') {
                    const url = event.target.getAttribute('href');
                    fetchProducts(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(getSearchData())
                    });
                }
            });
        });

        itemProduct = (product) => {
            // Display items list product 
            return `<div class="col-md-6 col-lg-6 col-xl-4">
                <div class="rounded position-relative fruite-item">
                    <div class="fruite-img">
                        <a href="/shop-detail/${product.id}/${product.slug}">
                            <img src="${product.image}" class="img-fluid w-100 rounded-top" alt="${product.name}">
                        </a>
                    </div>
                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">${product.categories.name}</div>
                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                    <a href="/shop-detail/${product.id}/${product.slug}">
                        <h4>${product.name}</h4>
                    </a>
                        <p class="line-clamp" >${product.description}</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">$${product.price} / kg</p>
                            <a data-product-id="${product.id}" class="btn border border-secondary rounded-pill px-3 text-primary add_to_cart"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>`
        }

        getSearchData = () => {
            const selectedCategory = document.querySelector('input[name="category_id"]:checked');
            const categoryValue = selectedCategory ? selectedCategory.value : '999';
            return {
                selectedCategory: categoryValue,
                priceInput1: priceInput1.value,
                priceInput2: priceInput2.value,
                selectFilter: selectFilter.value,
                keywordInputs: keywordInputs.value
            };
        }

        checkFilterPriceProduct = () => {
            const searchData = getSearchData();
            if (searchData.priceInput1 > 0 || searchData.priceInput2 > 0) {
                if (searchData.selectFilter === '3' || searchData.selectFilter === '4') {
                    // searchData.selectFilter = '0';
                    Toastify({
                        text: `You are selecting by price, please scroll to 0 to use this function or select reset`,
                        duration: 5000,
                        newWindow: true,
                        close: true,
                        gravity: "bottom",
                        position: "right",
                        stopOnFocus: true,
                        style: {
                            background: "red",
                        },
                        onClick: function() {}
                    }).showToast();
                    // Reset = 0 if have price input
                    selectFilter.value = '0';
                    fetchProductsData();

                }
            }
        }

        showContentSearch = (data) => {
            if (data) {
                contentSearch.style.display = 'block';
                contentSearch.innerHTML =
                    `<b>You search => ${data} </b>`;
            } else {
                contentSearch.style.display = 'none';
            }
        }

        async function fetchProducts(url, options) {
            try {
                const response = await fetch(url, options);
                const data = await response.json();
                productsContainer.innerHTML =
                    `<div class="spinner-grow" role="status"><span class="visually-hidden">Loading...</span></div>`;
                // Create a hidden element to preload an image before displaying it.
                const hiddenContainer = document.createElement('div');
                hiddenContainer.style.display = 'none';
                document.body.appendChild(hiddenContainer);
                let productsHTML = '';
                let imagesLoaded = 0;

                function checkImagesLoaded() {
                    if (imagesLoaded === data.products.length) {
                        productsContainer.innerHTML = productsHTML;
                        document.body.removeChild(hiddenContainer);
                    }
                }
                data.products.forEach(async product => {
                    const img = document.createElement('img');
                    img.src = product.image;
                    img.alt = product.name;

                    // Create a new Promise that will resolve when the image loads and reject if there's an error
                    try {
                        await new Promise((resolve, reject) => {
                            img.onload = resolve;
                            img.onerror = reject;
                            hiddenContainer.appendChild(img);
                        });
                        // increment the count loaed image
                        imagesLoaded++;
                        // Check all image have finished loading
                        checkImagesLoaded();
                    } catch (error) {
                        //still increment the count of loaded images
                        imagesLoaded++;
                        // Check if all images have finished loading, even if there was an error
                        checkImagesLoaded();
                    }
                    productsHTML += itemProduct(product);
                });

                setTimeout(() => {
                    // Display Product and Pagination Template
                    productsContainer.innerHTML = productsHTML;
                    paginationContainer.innerHTML = data.links;

                    handleAddCart();

                    // Animations for displaying the product
                    animationProductList()
                    showContentSearch(data.search);

                }, 1000);
            } catch (error) {
                // console.error('Error fetching products:', error);
                productsContainer.innerHTML =
                    '<p class="text-danger text-center">Error loading products. Please try again later.</p>';
            }
        }
    </script>
@endsection
