<form action="{{ route('products.comment', $product->id) }}" method="post">
    <h4 class="mb-5 fw-bold">Leave a Reply</h4>
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="border-bottom rounded">
                <input type="text" name="name" class="form-control border-0 me-4"
                    placeholder="Yur Name *">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="border-bottom rounded">
                <input type="email" name="email" class="form-control border-0"
                    placeholder="Your Email *">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="border-bottom rounded my-4">
                <textarea id="" name="content" class="form-control border-0" cols="30" rows="8"
                    placeholder="Your Review *" spellcheck="false"></textarea>
            </div>
        </div>
        <style>
            .star-rating input[type="radio"] {
                display: none;
            }
        </style>
        <div class="col-lg-12">
            <div class="d-flex justify-content-between py-3 mb-5">
                <div class="d-flex align-items-center">
                    <p class="mb-0 me-3">Please rate:</p>
                    <div class="star-rating d-flex align-items-center" style="font-size: 12px;">
                        <label>
                            <input type="radio" name="rating" value="1">
                            <i class="fa fa-star text-muted star-comment" data-value="1"></i>
                        </label>
                        <label>
                            <input type="radio" name="rating" value="2">
                            <i class="fa fa-star text-muted star-comment" data-value="2"></i>
                        </label>
                        <label>
                            <input type="radio" name="rating" value="3">
                            <i class="fa fa-star text-muted star-comment" data-value="3"></i>
                        </label>
                        <label>
                            <input type="radio" name="rating" value="4">
                            <i class="fa fa-star text-muted star-comment" data-value="4"></i>
                        </label>
                        <label>
                            <input type="radio" name="rating" value="5">
                            <i class="fa fa-star text-muted star-comment" data-value="5"></i>
                        </label>
                    </div>
                </div>
                <button class="btn border border-secondary text-primary rounded-pill px-4 py-3"
                    type="submit">PostComment</button>
            </div>
        </div>
    </div>
    @csrf
</form>