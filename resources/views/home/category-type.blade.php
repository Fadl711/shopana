@include('home.header')

<section class="product spad">
    <style>
        /* Hide "Details" button by default */
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

        /* Show the "Details" button on hover */
        .product__item:hover .details-button {
            display: block;
            opacity: 1;
        }

        /* Style the "Details" button */
        .details-button a {
            text-decoration: none;
            color: inherit;
        }

        /* Style for default button */
        .btn-primary {
            background-color: transparent;
            border: 2px solid #007bff; /* Blue border color */
            color: #000; /* Black text color */
            border-radius: 20px;
            margin-left: 12px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Button styles on hover */
        .btn-primary:hover {
            background-color: #007bff; /* Blue background color */
            color: #fff; /* White text color */
        }

        /* Style for product items */
        .product__item {
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .product__item__pic {
            position: relative;
            padding-top: 100%;
            background-color: #f5f5f5;
            background-size: cover;
            background-position: center;
            transition: all 0.3s ease;
        }

        .product__item__pic img {
            width: 100%;
            height: auto;
        }

        /* Responsive styles */
        .product__item h1 {
            font-size: 1.2rem;
            margin-top: 15px;
            text-align: center;
        }

        @media (max-width: 767px) {
            .product__item h1 {
                font-size: 1rem;
            }
        }

    </style>

    <div class="container">
        <div class="row property__gallery">

            @foreach($categories1 as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $category->name }}">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('uploads/category/' . $category->image) }}">
                            <ul class="product__hover">
                                <img src="{{ asset('uploads/category/' . $category->image) }}" alt="{{ $category->name }}">
                            </ul>
                            <!-- Details button (hidden by default) -->
                            <a href="{{ route('category_filter', ['category' => $category->name]) }}" class="details-button">عرض</a>
                        </div>
                        <h1>{{ $category->name }}</h1>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination (Optional) --}}
        {{-- <div class="pagination" style="float: right;">
            {{ $categories->links() }}
        </div> --}}
    </div>
</section>

@include('home.footer')
