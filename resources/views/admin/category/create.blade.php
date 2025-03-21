@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>{{ __('messages.add_category') }}
                    <a href="{{route('category')}}" class="btn btn-primary btn-sm float-left">{{ __('messages.back') }}</a>
                </h4>
            </div>
            <style>
                .card-body {
                    border: 1px solid #ccc;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                /* RTL specific styles */
                body {
                    direction: rtl;
                }
                .float-right {
                    float: left !important;
                }
                .float-left {
                    float: right !important;
                }
                .text-right {
                    text-align: left !important;
                }
                .text-left {
                    text-align: right !important;
                }
            </style>
            <div class="card-body">
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="row">
                        <div class="col-md mb-3">
                            <label>{{ __('messages.name') }}</label>
                            <input type="text" name="name" class="form-control"/>
                            @error('name') 
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md mb-3">
                            <label>{{ __('messages.slug') }}</label>
                            <input type="text" name="slug" class="form-control"/>
                            @error('slug') 
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md mb-3">
                            <label>{{ __('messages.description') }}</label>
                            <textarea style="height:90px; width:100%" name="description" class="form-control"></textarea><br>
                            @error('description') 
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>{{ __('messages.image') }}</label>
                            <input type="file" name="image" class="form-control"/>     
                        </div>
                    </div>    

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>{{ __('messages.category_type') }}</label>
                            <select name="category_type" class="form-control">
                                @foreach(\App\Enums\CategoryType::cases() as $type)
                                    <option value="{{ $type->value }}">{{ $type->label() }}</option>
                                @endforeach
                            </select>
                            @error('category_type') 
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>{{ __('messages.status_toggle') }}</label>
                            <input type="checkbox" name="status" checked/><br><br>
                            <label><i>{{ __('messages.status_note') }}</i></label> 
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary text-white float-end">{{ __('messages.save') }}</button>    
                    </div>
                </form>
            </div>
        </div>
    </div>   
@endsection