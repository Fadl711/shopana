@include('home.header')

<div class="container">
    <style>
        /* Normal state styles */
a.hover-button {
    background-color: transparent;
    border: 2px solid #CA1515;
    color: #CA1515;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

/* Hover state styles */
a.hover-button:hover {
    background-color: #CA1515;
    color: white;
}
h6.bold-and-big {
    /* font-weight: bold; */
    font-family: 'Cookie', cursive;
    font-size: 50px; /* You can adjust the size as needed */
}
    </style>
    <h6 class="bold-and-big">{{ __('messages.cart') }}</h6>

@if(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-2">
                        <table class="datatable table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('messages.image') }}</th>
                                        <th>{{ __('messages.products') }}</th>
                                        <th>{{ __('messages.size') }}</th>
                                        <th>{{ __('messages.rate') }}</th>
                                        <th>{{ __('messages.quantity') }}</th>
                                        <th>{{ __('messages.price') }}</th>
                                        <th>{{ __('messages.action') }}</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @php
                                $counter = 1;
                                $totalAmount = 0;
                                @endphp
                                @foreach($cart as $cart)
                                @if((auth()->user()->id) == ($cart->user_id))
                                <tr>
                                    <td>{{ $counter }}</td>
                                    <td>
                                        @if($cart->productImage->isNotEmpty())
                                        <img
                                        src="{{ asset($cart->productImage[0]->image) }}"
                                        style="height:90px; width:90px"
                                            alt="{{ __('messages.no_image') }}" />
                                        @else
                                         {{ __('messages.no_image') }}
                                        @endif
                                    </td>
                                    <td>{{$cart->product->name}}</td>
                                    <td>
                                        @if ($cart->sizes)
                                            {{ $cart->sizes->size }}
                                        @else
                                            {{ __('messages.no_size_available') }}
                                        @endif
                                    </td>

                                    <td>{{$cart->rate}}</td>
                                    <td>{{$cart->quantity}}</td>
                                    <td>{{$cart->price}}</td>

                                    <td>
                                        <a
                                        href="{{url('cart/'.$cart->id.'/delete')}}"
                                        class="btn btn-danger btn-sm text-white">{{ __('messages.remove') }}</a>
                                    </td>
                                </tr>
                                @php
                                $counter++;
                                $totalAmount += $cart->price;
                                @endphp
                                @else
                                @endif
                                @endforeach
                                <tr>
                                    <td colspan="7">
                                        @if ($counter == 1)
                                        <h1>{{ __('messages.no_products_added') }}</h1>
                                        <br>
                                        <a href="{{url('/products')}}" class="hover-button">
                                            {{ __('messages.shop_items') }}
                                        </a>
                                        @else
                                            @if (session('url'))
                                            <a href="{{session('url')}}" class="hover-button float-left">
                                                {{ __('messages.continue_shopping') }}
                                            </a>
                                            @else
                                            <a href="{{url('/products')}}" class="hover-button float-left">
                                                {{ __('messages.continue_shopping') }}
                                            </a>

                                            @endif
{{--
                                            <a href="{{url('/products')}}" class="hover-button float-left">
                                                {{ __('messages.continue_shopping') }}
                                            </a>
                                            @endif --}}
                                            <div class="text-right" style="padding-right:70px;">
                                                <strong>{{ __('messages.total_amount') }}:</strong>  {{$totalAmount}} ريال
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($totalAmount > 0)
                    <div class="row text-left mt-4">
                        <div>
                        <h6 class="bold-and-big">{{ __('messages.proceed_to_order') }}</h6>
                        </div>

                        <div style="margin-left: 40px; margin-top:8px">
                        <a href="{{route('address', ['totalAmount' => $totalAmount])}}" class="btn btn-primary" style="height: 40px;">{{ __('messages.proceed') }}</a>
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('home.footer')
