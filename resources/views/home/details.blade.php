<!DOCTYPE html>
<html lang="ar">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative,">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amity Collection </title>

    <!-- خط جوجل -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- أنماط CSS -->
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}" type="text/css">
    <!-- ExZoom CSS -->
    <link href="{{asset('assets/exzoom/jquery.exzoom.css')}}" rel="stylesheet">

    <style>
        /* أنماط لقسم تفاصيل المنتج */
        .hero_area {
            background-image: url('home/images/your-background-image.jpg'); /* أضف رابط صورة الخلفية هنا */
            background-size: cover;
            background-position: center;
            padding: 80px 0;
        }

        .product-details {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        .product-image img {
            max-width: 100%; /* لضمان أن الصورة لا تتجاوز عرض الحاوية */
            max-height: 100%; /* تعيين الحد الأقصى للارتفاع للصورة */
            display: block; /* إزالة المسافة الزائدة أسفل الصور المدمجة */
            margin: 0 auto; /* تمركز الصورة أفقيًا */
        }

        .product-title {
            color: black;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 18px;
            color: blue;
        }

        .original-price {
            text-decoration: line-through;
            color: red;
        }

        .product-category {
            font-size: 16px;
        }

        .product-description {
            font-size: 16px;
            margin-top: 20px;
        }

        .product-quantity {
            font-size: 16px;
            margin-top: 20px;
        }

        .add-to-cart-btn {
            margin-top: 20px;
        }

        .product {
            position: relative;
        }

        .product-hover {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
        }

        .product-image:hover .product-hover {
            display: block;
        }

        .details-button {
            background: #ff5722;
            color: #fff;
            padding: 5px 10px;
            text-align: center;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }

        .similar-products-heading {
            font-size: 28px; /* تعديل حجم الخط حسب الحاجة */
            color: #333; /* تغيير اللون حسب الرغبة */
            text-align: center; /* تمركز النص */
            margin-top: 20px; /* إضافة مسافة من الأعلى للتباعد */
            font-weight: bold; /* جعل النص عريضًا إذا رغبت */
        }
    </style>
</head>

<body>
    <!-- صفحة تحميل -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- قسم الهيدر -->
    @include('home.header')
    <!-- نهاية الهيدر -->


    <div class="hero_area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-image">
                        {{-- صورة المنتج --}}
                        @if($product->productImage)
                        {{-- <img src="{{asset($product->productImage[0]->image)}}"  alt="Product Image"> --}}
                        <div class="exzoom" id="exzoom">
                            <!-- الصور -->
                            <div class="exzoom_img_box">
                              <ul class='exzoom_img_ul'>
                                @foreach ($product->productImage as $images)
                                    <li><img src="{{asset($images->image)}}"/></li>
                                @endforeach
                              </ul>
                            </div>
                            <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                            <div class="exzoom_nav"></div>
                            <!-- أزرار التنقل -->
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                        </div>

                        @else
                            لا توجد صورة مضافة
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <form
                            action="{{url('product/'.$product->id.'/cart')}}"
                            method="get" enctype="multipart/form-data">
                            @csrf
                            {{-- المستخدم --}}
                            @auth
                                <input name="user_id" value="{{auth()->user()->id}}" style="display: none;">
                            @endauth
                            <input type="text" name="url" value="{{url()->previous()}}" style="display: none;">
                            
                            {{-- عنوان المنتج --}}
                            <div class="custom-box" style="background-color: #f5f5f5; padding: 10px; border-radius: 5px;">
                                <b><h3 class="text-primary">اسم المنتج: {{$product->name}}</h3></b>
                            </div>

                            {{-- سعر المنتج --}}
                            <div class="custom-box" style="background-color: #f5f5f5; padding: 10px; border-radius: 5px; margin-top: 10px;">
                                <h4 class="text-info">
                                    @if($product->discounted_price != null)
                                    {{-- عرض السعر المخفض --}}
                                    <span class="original-price">السعر الأصلي: $ {{$product->price}}</span><br>
                                    السعر المخفض: $ {{$product->discounted_price}}
                                    @else
                                    {{-- عرض السعر الأصلي --}}
                                    السعر: $ {{$product->price}}
                                    @endif
                                </h4>
                            </div>

                            {{-- فئة المنتج --}}
                            <div class="custom-box" style="background-color: #f5f5f5; padding: 10px; border-radius: 5px; margin-top: 10px;">
                                <p class="text-muted">الفئة: {{$product->category->name}}</p>
                            </div>

                            {{-- وصف المنتج --}}
                            <div class="custom-box" style="background-color: #f5f5f5; padding: 10px; border-radius: 5px; margin-top: 10px;">
                                <p>{{$product->description}}</p>
                            </div>

                            {{-- الكمية وأزرار الإضافة إلى السلة --}}
                            <div class="custom-box" style="background-color: #f5f5f5; padding: 10px; border-radius: 5px; margin-top: 10px;">
                                <p class="text-secondary">الكمية المتاحة: {{$product->quantity}}</p>
                                @if(session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                {{-- قائمة الحجم --}}
                                @if($product->sizes->isNotEmpty())
                                    <div class="size">
                                        <label for="sizeDropdown">الحجم المتاح:</label>
                                        <select id="sizeDropdown" name="selectedSize" required>
                                            <option value="" disabled selected>اختر الحجم</option>
                                            @foreach ($product->sizes as $size)
                                                <option value="{{$size->id}}">{{$size->size}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" name="quantity" value="1" min="1" value="{{$product->quantity}}" style="width: 100px;" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="submit" class="btn btn-danger" style="background-color: red;" value="أضف إلى السلة">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- قسم المنتجات المشابهة -->
    <div class="container">
        <div class="row">
            @if(count($relatedProducts) > 0)
            <div class="col-md-12">
                <h2 class="similar-products-heading">منتجات مشابهة</h2>
            </div>
            @endif
        </div>
        <div class="row">
            @foreach($relatedProducts as $relatedProduct)
                <div class="col-md-3">
                    <div class="product">
                        <a href="{{ route('product_details', ['id' => $relatedProduct->id]) }}">
                            <div class="product-image">
                                @if($relatedProduct->productImage->isNotEmpty())
                                <img src="{{ asset($relatedProduct->productImage[0]->image) }}" alt="Product Image">
                                @else
                                <img src="img/NoImage.jpg" alt="Alternative Text" >
                                @endif
                                <div class="product-hover">
                                    <a href="{{ route('product_details', ['id' => $relatedProduct->id]) }}" class="details-button">التفاصيل</a>
                                </div>
                            </div>
                            <a href="{{ route('product_details', ['id' => $relatedProduct->id]) }}" class="product-title">
                                {{ $relatedProduct->name }}
                            </a>
                            <div class="product-price">
                                @if($relatedProduct->discounted_price != null)
                                    <div class="original-price">
                                    السعر الأصلي: $ {{$relatedProduct->price}}
                                    </div>
                                    سعر العرض: $ {{ $relatedProduct->discounted_price }}
                                @else
                                    السعر: $ {{ $relatedProduct->price }}
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- قسم الفوتر -->
    @include('home.footer')
    <!-- نهاية الفوتر -->

    <!-- البحث -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="ابحث هنا.....">
            </form>
        </div>
    </div>

    <!-- السكربتات -->
    <script src="{{asset('home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('home/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('home/js/mixitup.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.nicescroll.min.js')}}"></script>
    <!-- ExZoom JavaScript -->
    <script src="{{asset('assets/exzoom/jquery.exzoom.js')}}"></script>

    <script>
        $(function(){

                  $("#exzoom").exzoom({

                  "navWidth": 60,
                  "navHeight": 60,
                  "navItemNum": 5,
                  "navItemMargin": 7,
                  "navBorder": 1,

                  // التشغيل التلقائي
                  "autoPlay": false,

                  // فترة التشغيل التلقائي بالمللي ثانية
                  "autoPlayTimeout": 2000

                  });

                });

                $(window).on('load', function() {
                    // إخفاء المحمل عند اكتمال تحميل الصفحة
                    $('#preloder').fadeOut();
                });
    </script>

</body>

</html>
