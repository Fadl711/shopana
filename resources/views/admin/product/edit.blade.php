@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 ">
            <div class="card-header">
                <h4> تعديل المنتج / {{$product->name}}
                    <a href="{{route('product')}}" class="btn btn-primary btn-sm float-right">رجوع</a>
                </h4>
            </div>
            <style>
                .card-body {
                    border: 1px solid #ccc; /* إضافة إطار حول الـ div */
                    padding: 20px; /* إضافة مساحة داخل الـ div */
                    border-radius: 5px; /* زوايا مدورة لمظهر صندوقي */
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* إضافة ظل لإعطاء عمق */
                }
                                label{
                    display: block;
                     text-align: right;
                }
            </style>
            <div class="card-body">
                <form action="{{url('admin/product/'.$product->id.'/update')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md mb-3">
                            <label>الاسم</label>
                            <input type="text" name="name" class="form-control" value="{{$product->name}}"/>
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md mb-3">
                            <label>الكمية</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{$product->quantity}}"/>
                            @error('quantity')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <br>
                                        <div id="sizes">
                            @foreach($product->sizes as $index => $size)
                                <input type="text" name="sizes[{{ $index }}]" placeholder="اسم الحجم" value="{{ $size->size }}">
                            @endforeach
                        </div>

    <!-- زر إضافة حجم جديد -->
                            <button type="button" onclick="addSize()">اضافة حجم </button>

{{--                     <div style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 15px;">
                        <label style="display: inline-block; width: 100px;">حجم مخصص:</label>
                        <input type="text" name="custom_size_name" id="customSizeName"
                            value="{{$product->custom_size_name}}"
                            class="form-control"
                            style="width: 150px; display: inline-block; margin-right: 15px;"
                            placeholder="اسم الحجم"/>
                        <label style="display: inline-block; width: 80px;">الكمية:</label>
                        <input type="number" name="custom_size_quantity"
                            value="{{$product->custom_size_quantity}}"
                            id="customSizeQuantity"
                            class="form-control"
                            style="width: 100px; display: inline-block;"
                            min="1" step="1"
                            oninput="validateTotal()"
                            placeholder="الكمية"/>
                    </div> --}}
                    {{--  --}}
            {{--         <div class="row">
                        <div class="col-md mb-3">
                            <div class="row">
                                <div class="row" style="float: right; margin-left: 10px;">
                                    <div>
                                        <label>الأحجام المتاحة</label><br><br>
                                        <label>صغير :</label>
                                        <input type="checkbox" name="size[]" value="small" id="enableInput"  onchange="toggleInputFields()"  {{$product->small!= Null ? 'checked': ''}} />&emsp;&emsp;&emsp;&emsp;
                                        <label>متوسط :</label>
                                        <input type="checkbox" name="size[]" value="medium" id="enablemedium" onchange="toggleInputFieldsmedium()" {{$product->medium != Null ? 'checked': ''}} />&emsp;&emsp;&emsp;&emsp;&emsp;
                                        <label>كبير :</label>
                                        <input type="checkbox" name="size[]" value="large" id="enablelarge" onchange="toggleInputFieldslarge()" {{$product->large != Null ? 'checked': ''}}/>&emsp;&emsp;&emsp;&emsp;&emsp;
                                        <label>XL :</label>
                                        <input type="checkbox" name="size[]" value="xl"  id="enableXL" onchange="toggleInputFieldsXL()" {{$product->xl != Null ? 'checked': ''}}/>&emsp;&emsp;&emsp; &emsp;
                                        <label>XXL :</label>
                                        <input type="checkbox" name="size[]" value="xxl" id="enableXXL" onchange="toggleInputFieldsXXL()" {{$product->xxl != Null ? 'checked': ''}} /> &emsp;&emsp;&emsp;
                                    </div>
                                    <br>
                                </div>&nbsp;&nbsp;&nbsp;
                                <br><br><br>
                            </div>
                        </div>
                    </div> --}}

                    {{--  --}}
       {{--              <div class="row">
                        <div class="col-md mb-3">
                            <div class="row" style="float: right; width: 900px; margin-left: 10px;">
                                <label for="small">صغير:</label><br>
                                <input type="number" name="small" id="small" class="form-control" style="width: 100px;" oninput="validateTotal()"  min="1" step="1" value="{{$product->small}}" readonly/>
                                <br>
                                <label for="medium">متوسط:</label><br>
                                <input type="number" name="medium" id="medium" class="form-control" style="width: 100px;" oninput="validateTotal()" min="1" step="1" value="{{$product->medium}}" readonly/>
                                <br>
                                <label for="large">كبير:</label><br>
                                <input type="number" name="large" id="large" class="form-control"  style="width: 100px;" oninput="validateTotal()" min="1" step="1" value="{{$product->large}}" readonly/>
                                <br>
                                <label for="xl">XL:</label><br>
                                <input type="number" name="xl" id="xl" class="form-control"  style="width: 100px;"oninput="validateTotal()" min="1" step="1" value="{{$product->xl}}" readonly/>
                                <br>
                                <label for="xxl">XXL:</label><br>
                                <input type="number" name="xxl" id="xxl" class="form-control" style="width: 100px;" oninput="validateTotal()" min="1" step="1" value="{{$product->xxl}}" readonly/>

                                <div id="error-message" style="color: red;"></div>
                                <br>
                                <br><br>
                            </div>
                        </div>
                    </div> --}}
                    <br>

                    <div class="row">
                        <div class="col-md mb-3">
                            <label>السعر</label>
                            <input type="number" name="price" class="form-control" value="{{$product->price}}"/>
                            @error('price')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md mb-3">
                            <label>السعر بعد الخصم</label>
                            <input type="number" name="dis_price" class="form-control" value="{{$product->discounted_price}}"/>
                            @error('dis_price')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- الفئة --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">الفئة</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="">اختر الفئة</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md mb-3">
                            <label>اللون</label>
                            <input type="text" name="color" class="form-control" value="{{$product->color}}"/>
                            @error('color')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md mb-3">
                            <label>الوصف</label>
                            <textarea  style="height:90px; width:543px"
                            name="description" class="form-control">{{$product->description}}</textarea>
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md mb-3">
                            <label>العلامات</label>
                            <input type="text" name="tags" class="form-control" value="{{$product->tags}}"/>
                            @error('tags')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>الصورة</label>
                        <input type="file" name="image[]" multiple class="form-control" /><br>
                        <div class="row">
                            @if($prodImage)
                                @foreach($prodImage as $image)
                                    <div class="col-md-2">
                                        <img src="{{asset($image->image)}}" style="width:80px; height:80px;"
                                        class="me-4 border" alt="Image">
                                        <a href="{{url('admin/productimage/'.$image->id.'/delete')}}" class="d-block">إزالة</a>
                                    </div>
                                @endforeach
                            @else
                                <h5>لا توجد صور مضافة</h5>
                            @endif
                        </div>
                        @error('image')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary text-white float-end">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
{{--     <script>
        function toggleInputFields() {
            var enableInputCheckbox = document.getElementById("enableInput");
            var inputFields = document.querySelectorAll("#small");

            for (var i = 0; i < inputFields.length; i++) {
                inputFields[i].readOnly = !enableInputCheckbox.checked;
                if (!enableInputCheckbox.checked) {
                    inputFields[i].value = '';
                }
            }
        }

        function toggleInputFieldsmedium(){
            var enableInputCheckbox = document.getElementById("enablemedium");
            var inputFields = document.querySelectorAll("#medium");

            for (var i = 0; i < inputFields.length; i++) {
                inputFields[i].readOnly = !enableInputCheckbox.checked;
                if (!enableInputCheckbox.checked) {
                    inputFields[i].value = '';
                }
            }
        }

        function toggleInputFieldslarge(){
            var enableInputCheckbox = document.getElementById("enablelarge");
            var inputFields = document.querySelectorAll("#large");

            for (var i = 0; i < inputFields.length; i++) {
                inputFields[i].readOnly = !enableInputCheckbox.checked;
                if (!enableInputCheckbox.checked) {
                    inputFields[i].value = '';
                }
            }
        }

        function toggleInputFieldsXL(){
            var enableInputCheckbox = document.getElementById("enableXL");
            var inputFields = document.querySelectorAll("#xl");

            for (var i = 0; i < inputFields.length; i++) {
                inputFields[i].readOnly = !enableInputCheckbox.checked;
                if (!enableInputCheckbox.checked) {
                    inputFields[i].value = '';
                }
            }
        }

        function toggleInputFieldsXXL(){
            var enableInputCheckbox = document.getElementById("enableXXL");
            var inputFields = document.querySelectorAll("#xxl");

            for (var i = 0; i < inputFields.length; i++) {
                inputFields[i].readOnly = !enableInputCheckbox.checked;
                if (!enableInputCheckbox.checked) {
                    inputFields[i].value = '';
                }
            }
        }
    </script> --}}

{{--     <script>
        function validateTotal() {
            const input1 = parseInt(document.getElementById("small").value) || 0;
            const input2 = parseInt(document.getElementById("medium").value) || 0;
            const input3 = parseInt(document.getElementById("large").value) || 0;
            const input4 = parseInt(document.getElementById("xl").value) || 0;
            const input5 = parseInt(document.getElementById("xxl").value) || 0;
            const total = parseInt(document.getElementById("quantity").value) || 0;

            if (input1 + input2 + input3 + input4 + input5 !== total) {
                document.getElementById("error-message").textContent = "خطأ: يرجى التحقق من الكمية!";
            } else {
                document.getElementById("error-message").textContent = "";
            }
        }
    </script> --}}

    <script>
       /*  function validateTotal() {
            var smallValue = parseInt(document.getElementById("small").value) || 0;
            var mediumValue = parseInt(document.getElementById("medium").value) || 0;
            var largeValue = parseInt(document.getElementById("large").value) || 0;
            var xlValue = parseInt(document.getElementById("xl").value) || 0;
            var xxlValue = parseInt(document.getElementById("xxl").value) || 0;

            var total = smallValue + mediumValue + largeValue + xlValue + xxlValue;
            document.getElementById("quantity").value = total;
        } */
            function addSize() {
        const sizesDiv = document.getElementById('sizes');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'sizes[]'; // اسم الحقل كمصفوفة
        input.placeholder = 'اسم الحجم';
        sizesDiv.appendChild(input);
    }
    </script>

@endsection
