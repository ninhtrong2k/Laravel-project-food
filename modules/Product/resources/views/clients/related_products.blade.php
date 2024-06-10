<h1 class="fw-bold mb-0">Related products</h1>
<div class="vesitable">
    <div class="owl-carousel vegetable-carousel justify-content-center">
        @if ($relatedProduct)
            @foreach ($relatedProduct as $product)
            <div class="border border-primary rounded position-relative vesitable-item">
                <div class="vesitable-img">
                    <img src="{{$product->image}}" class="img-fluid w-100 rounded-top" alt="">
                </div>
                <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                    style="top: 10px; right: 10px;">{{$product->categories->name}}</div>
                <div class="p-4 pb-0 rounded-bottom">
                    <h4>{{$product->name}} </h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                    <div class="d-flex justify-content-between flex-lg-wrap">
                        <p class="text-dark fs-5 fw-bold">{{$product->price}} / kg</p>
                        <a data-product-id="{{ $product->id }}"
                            class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary  add_to_cart"><i
                                class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>