@extends('layouts.admin')

@section('content')
 
<style>
    .box-link {
        text-decoration: none !important;
        color: white;
    }

    .box-bg {
        background-color: #fff;
        border-radius: 10px;
        padding: 5px;
        text-align: center;
        transition: background-color 0.3s ease-in-out;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box-content {
        border-radius: 10px;
        padding: 20px;
        text-align: center;
    }

    .orders-box {
        background-color: #f0ad4e;
    }

    .products-box {
        background-color: #5bc0de;
    }

    .category-box {
        background-color: #489a68;
    }

    .box-bg:hover {
        background-color: #e0a7a7;
    }

    .menu-icon {
        font-size: 36px;
        margin-bottom: 10px;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    p {
        font-size: 18px;
    }
    .col-md-4{
        width: 50px;
    }
    .user-box {
        background-color: #b959a4;
    }
    .processing-box{
        background-color: #3b5ca9;
    }
    .delivered-box{
        background-color: #3dc436;
    }
    .cancelled-box{
        background-color: #ec482b;
    }
    .totalrevenue-box{
        background-color: #9daf22;
    }
    body {
        direction: rtl;
    }
</style>

<div>
    @if(session('message'))
        <h2 class="alert alert-success">{{session('message')}}</h2>    
    @endif
</div>
<div class="row">
    <div class="col-md-4">
        <a href="{{ url('admin/order') }}" class="box-link">
            <div class="box-bg orders-box">
                <div class="box-content">
                    <i class="mdi mdi-shopping menu-icon"></i>
                    <h2>{{ $order }}</h2>
                    <p>{{ __('messages.total_orders') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ url('admin/product') }}" class="box-link">
            <div class="box-bg products-box">
                <div class="box-content">
                    <i class="mdi mdi-package-variant-closed menu-icon"></i>
                    <h2>{{ $product }}</h2>
                    <p>{{ __('messages.total_products') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ url('admin/category') }}" class="box-link">
            <div class="box-bg category-box">
                <div class="box-content">
                    <i class="mdi mdi-view-list menu-icon"></i>
                    <h2>{{ $category }}</h2>
                    <p>{{ __('messages.total_categories') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4" style="padding-top:20px;">
        <a href="{{url('admin/userview')}}" class="box-link">
            <div class="box-bg user-box">
                <div class="box-content">
                    <i class="mdi mdi-account-multiple menu-icon"></i>
                    <h2>{{ $user }}</h2>
                    <p>{{ __('messages.users') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4" style="padding-top:20px;">
        <a href="" class="box-link">
            <div class="box-bg processing-box">
                <div class="box-content">
                    <i class="mdi mdi-clock menu-icon"></i>
                    <h2>{{ $processing }}</h2>
                    <p>{{ __('messages.processing_orders') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4" style="padding-top:20px;">
        <a href="" class="box-link">
            <div class="box-bg delivered-box">
                <div class="box-content">
                    <i class="mdi mdi-account-check menu-icon"></i>
                    <h2>{{ $delivered }}</h2>
                    <p>{{ __('messages.delivered_orders') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4" style="padding-top:20px;">
        <a href="" class="box-link">
            <div class="box-bg cancelled-box">
                <div class="box-content">
                    <i class="mdi mdi-account-remove menu-icon"></i>
                    <h2>{{ $cancelled }}</h2>
                    <p>{{ __('messages.cancelled_orders') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4" style="padding-top:20px;">
        <a href="" class="box-link">
            <div class="box-bg totalrevenue-box">
                <div class="box-content">
                    <i class="mdi mdi-cash-usd menu-icon"></i>
                    <h2>$ {{ $totalrevenue }}</h2>
                    <p>{{ __('messages.total_revenue') }}</p>
                </div>
            </div>
        </a>
    </div>
</div>

<br><br>
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<h3><b>{{ __('messages.order_statistics') }}</b></h3><br>
<div class="row">
    <div class="col-md-6">
        <canvas id="combinedChart" width="300" height="300"></canvas>
    </div>
</div>

<!-- JavaScript script for creating a combined pie chart -->
<script>
    // Data for pie chart
    var processingData = {{ $processing }};
    var deliveredData = {{ $delivered }};
    var cancelledData = {{ $cancelled }};

    // Get the canvas element
    var ctx = document.getElementById('combinedChart').getContext('2d');

    // Create the pie chart
    var combinedChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['{{ __("messages.processing") }}', '{{ __("messages.delivered") }}', '{{ __("messages.cancelled") }}'],
            datasets: [{
                data: [processingData, deliveredData, cancelledData],
                backgroundColor: ['#3b5ca9', '#3dc436', '#ec482b'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
