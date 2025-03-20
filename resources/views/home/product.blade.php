<section class="product spad">
    <style>
/* CSS to hide the "Details" button by default */
.details-button {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ff5722;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

/* CSS to show the "Details" button on hover */
.product__item:hover .details-button {
    display: block;
    opacity: 1;
}

/* Style the "Details" button (you can customize this further) */
.details-button a {
    text-decoration: none;
    color: inherit;
}

/* Default button styles */
.btn-primary {
    background-color: transparent;
    border: 2px solid #007bff;
    color: #000;
    border-radius: 20px;
    margin-left: 12px;
    transition: background-color 0.3s, color 0.3s;
}

/* Button styles on hover */
.btn-primary:hover {
    background-color: #007bff;
    color: #fff;
}

/* Product filtering styles */
.mix {
    display: block;
    transition: all 0.3s ease;
}

.mix.show {
    display: block;
}

.filter__controls li {
    cursor: pointer;
    padding: 5px 10px;
    margin: 0 5px;
    transition: all 0.3s ease;
}

.filter__controls li.active {
    color: #007bff;
    font-weight: bold;
}

/* Hide category name but keep it accessible for filtering */
.product-category {
    display: none;
}
            .custom-row{
    margin-right: 0 !important;
    margin-left: 0 !important;
            }
            img{
                margin: auto;
                    width: 100%; /* عرض ثابت */
    aspect-ratio: 1 / 1; /* نسبة العرض إلى الارتفاع (مربع) */
    object-fit: cover;
            }

    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <ul id="categories-list" class="filter__controls">
                    <li class="{{ $selectedCategory === 'All' ? 'active' : '' }}" data-category="all">الكل</li>
                    @foreach($categories->take(5) as $category)
                        <li class="{{ $selectedCategory === $category->name ? 'active' : '' }}" data-category="{{ $category->name }}">{{ $category->name }}</li>
                    @endforeach
                    @if($categories->count() > 4)
                        <button id="show-more">المزيد</button>
                        <ul id="remaining-categories" style="display: none;">
                            @foreach($categories->slice(5) as $category)
                                <li class="{{ $selectedCategory === $category->name ? 'active' : '' }}" data-category="{{ $category->name }}">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                </ul>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="search-bar" style="text-align: right;">
                    <form action="{{ route('search_products') }}" method="GET">
                        @csrf
                        <div class="input-group" style="max-width: 300px; margin: 0 auto;">
                            <input type="text" class="form-control" name="query" placeholder="البحث عن منتج" style="border-radius: 20px;">

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="border-radius: 20px; margin-left:12px;">
                                    <i class="mdi mdi-magnify menu-icon"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><br>

            <div class="row property__gallery custom-row">
                @foreach($product as $products)
                <div class="col-lg-3 col-md-4 col-sm-6 mix" data-category="{{ $products->category->name }}">
                    <div class="product__item">

                        @if($products->productImage->isNotEmpty())
                            <div class="product__item__pic set-bg" data-setbg="uploads/products/{{$products->productImage[0]->image}}">
                                <img src="{{ asset($products->productImage[0]->image) }}" alt="Product Image">
                                <!-- <div class="label stockout">out of stock</div> -->
                                <!-- <div class="label">Sale</div> -->
                                <!-- <div class="label new">New</div> -->

                                <!-- Details button (hidden by default) -->
                                <a href="{{route('product_details',$products->id)}}" class="details-button">عرض</a>
                                <!-- <div class="details-button">Details</div> -->
                            </div>
                        @else
                            <div class="product__item__pic set-bg" data-setbg="img/NoImage.jpg">
                                <img src="img/NoImage.jpg" alt="Alternative Text"
                                >

                                <a href="{{route('product_details',$products->id)}}" class="details-button">عرض</a>
                            </div>
                        @endif


                        <div class="product__item__text">
                            <h6><a href="{{route('product_details',$products->id)}}">{{$products->name}}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>

                            @if($products->discounted_price)
                                <div class="product__price"><s>{{$products->price}} ريال يمني</s> {{$products->discounted_price}} ريال يمني</div>
                            @else
                                <div class="product__price"> {{$products->price}} ريال يمني</div>
                            @endif

                            <p class="product-category">{{$products->category->name}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div  class="pagination" style="float: right;">
                {{$product->links()}}
            </div>

        </div>

    </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Show more categories functionality
        $('#show-more').click(function() {
            $('#remaining-categories').slideDown();
            $(this).hide();
        });

        // Category filtering functionality
        $('.filter__controls li').click(function() {
            // Remove active class from all items
            $('.filter__controls li').removeClass('active');
            // Add active class to clicked item
            $(this).addClass('active');

            var selectedCategory = $(this).attr('data-category');

            // Show/hide products based on category
            if (selectedCategory === 'all') {
                $('.property__gallery .mix').fadeIn();
            } else {
                $('.property__gallery .mix').each(function() {
                    if ($(this).attr('data-category') === selectedCategory) {
                        $(this).fadeIn();
                    } else {
                        $(this).fadeOut();
                    }
                });
            }
        });

        // Initially show all products
        $('.property__gallery .mix').show();
    });
</script>
