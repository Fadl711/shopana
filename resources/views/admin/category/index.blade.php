@extends('layouts.admin')

@section('content')
    <div class="row">
        <style>
            /* Add borders to table, table header, and table cells */
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: right;
            }

            /* Style the table header row */
            th {
                background-color: #f2f2f2;
            }

            /* RTL specific styles */
            .float-right {
                float: left !important;
            }
            body {
                direction: rtl;
            }
            .pagination {
                float: left !important;
            }
        </style>

        <div class="col-md-12">
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif

            <div class="card-header">
                <h4>{{ __('messages.manage_categories') }}
                    <a href="{{route('category.create')}}" class="btn btn-primary btn-sm float-right">
                        {{ __('messages.add_category') }}
                    </a>
                </h4>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="card-body table-responsive p-2">
                                    <table class="datatable table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('messages.id') }}</th>
                                                <th>{{ __('messages.name') }}</th>
                                                <th>{{ __('messages.status') }}</th>
                                                <th>{{ __('messages.picture') }}</th>
                                                <th>{{ __('messages.action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->status == '1' ? __('messages.active') : __('messages.inactive')}}</td>
                                                <td>
                                                    @if($category->image)
                                                    <img src="{{$category->image}}"
                                                        style="width: 80px; height:80px;"
                                                        alt="{{ __('messages.no_image') }}"/>
                                                    @else
                                                        <h5>{{ __('messages.no_image') }}</h5>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('admin/category/'.$category->id.'/edit')}}"
                                                        class="btn btn-success btn-sm text-white">{{ __('messages.edit') }}</a>
                                                    &nbsp;
                                                    <a href="{{url('admin/category/'.$category->id.'/delete')}}"
                                                        class="btn btn-danger btn-sm text-white">{{ __('messages.delete') }}</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <div class="pagination">{{$categories->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
