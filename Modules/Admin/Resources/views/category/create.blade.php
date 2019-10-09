@extends('admin::layouts.master')

@section('content')

<div class="table-responsive">
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.category')}}">Danh mục</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </nav>
    </div>
    <div>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control" id="email" placeholder="Tên danh mục" value="{{ old('name')}}" name="name">
                @if($errors->has('name'))
                    <div class="error-text">
                        {{$errors->first('name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Icon</label>
                <input type="text" class="form-control" id="email" placeholder="fa fa-home"  name="icon" value="{{ old('name')}}">
                @if($errors->has('icon'))
                    <div class="error-text">
                        {{$errors->first('icon')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="email" placeholder="Title" value="{{ old('c_title_seo')}}" name="c_title_seo">
                @if($errors->has('c_title_seo'))
                    <div class="error-text">
                        {{$errors->first('c_title_seo')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <input type="text" class="form-control" id="email" placeholder="Meta description" value="{{ old('c_description_seo')}}" name="c_description_seo">
                @if($errors->has('c_description_seo'))
                    <div class="error-text">
                        {{$errors->first('c_description_seo')}}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label><input type="checkbox" name="hot">Nổi bật</label>
            </div>
            <button type="submit" class="btn btn-success">Lưu thông tin</button>
            <div class="form-group">

            </div>

            
        </form>
    </div>
    @stop