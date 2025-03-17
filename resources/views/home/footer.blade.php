<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                    <p>صنعاء - شارع الرباط - مقابل جامعة الرازي للعلوم الطبية, Sanaa, Yemen</p>
                    <!-- <div class="footer__payment">
                        <a href="#"><img src="img/payment/payment-1.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-2.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-3.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-4.png" alt=""></a>
                        <a href="#"><img src="img/payment/payment-5.png" alt=""></a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>روابط سريعة</h6>
                    <ul>
                        <li><a href="{{route('aboutus')}}">من نحن</a></li>
                        <li><a href="{{route('view_product')}}">المنتجات</a></li>
                        <!-- <li><a href="#">اتصل بنا</a></li> -->
                        <li><a href="{{url('/')}}">الرئيسية</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>الحساب</h6>
                    <ul>
                        <li><a href="{{route('login')}}">تسجيل الدخول</a></li>
                        <li><a href="{{route('register')}}">تسجيل</a></li>
                        <li><a href="{{route('profile.edit')}}">ملفي</a></li>
                        <li><a href="{{url('/cart')}}">عربة التسوق</a></li>
                        <li><a href="{{url('/orders')}}">تتبع الطلبات</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6>تواصل معنا</h6>
                    <!-- <form action="#">
                        <input type="text" placeholder="البريد الإلكتروني">
                        <button type="submit" class="site-btn">اشتراك</button>
                    </form> -->
                    <div class="footer__social">
                        <a href="https://www.facebook.com/share/18YPvqY6AR/" target="_blank"><i class="fa fa-facebook"></i></a>
{{--                         <a href="#"><i class="fa fa-twitter"></i></a> --}}
{{--                         <a href="#"><i class="fa fa-youtube-play"></i></a>
 --}}                        <a href="https://www.instagram.com/alyaser_shopp?igsh=cTdzZWJyZGtxNGw3"><i class="fa fa-instagram"></i></a>
     {{--                    <a href="#"><i class="fa fa-pinterest"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- لا يمكن إزالة الرابط الخاص بـ Colorlib. القالب مرخص بموجب CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>حقوق النشر &copy; <script>document.write(new Date().getFullYear());</script> جميع الحقوق محفوظة لشركة الياسر للتجارة <i class="fa fa-heart" aria-hidden="true"></i> </p>
                </div>
                <!-- لا يمكن إزالة الرابط الخاص بـ Colorlib. القالب مرخص بموجب CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
