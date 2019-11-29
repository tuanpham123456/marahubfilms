<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên bài viết </label>
        <input type="text" class="form-control" id="email" placeholder="Tên danh mục" value="{{ old('a_name',isset($article->c_a_name) ? $article->c_a_name : '' )}}" name="a_name">
        @if($errors->has('a_name'))
        <div class="error-text">
            {{$errors->first('a_name')}}
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="name">Mô tả</label>
        <input type="text" class="form-control" id="email" placeholder="Mô tả bài viết" value="{{ old('a_description',isset($article->a_description) ? $article->a_description : '')}}" name="a_description">
        @if($errors->has('a_description'))
        <div class="error-text">
            {{$errors->first('a_description')}}
        </div>
        @endif
    </div>
    <div class="form-group">
      <label for="name">Nội dung</label>
      <input type="text" class="form-control" id="email" placeholder="Nội dung" value="{{ old('a_content',isset($article->a_content) ? $article->a_content : '')}}" name="a_content">
      @if($errors->has('a_content'))
      <div class="error-text">
          {{$errors->first('a_content')}}
      </div>
      @endif
  </div>
    <div class="form-group">
        <label for="name">Meta Title</label>
        <input type="text" class="form-control" id="email" placeholder="Meta title" value="{{ old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '')}}" name="a_title_seo">
        @if($errors->has('a_title_seo'))
        <div class="error-text">
            {{$errors->first('a_title_seo')}}
        </div>
        @endif
    </div>
    <div class="form-group">
      <label for="name">Meta description</label>
      <input type="text" class="form-control" id="email" placeholder="Meta description" value="{{ old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '')}}" name="a_description_seo">
      @if($errors->has('a_description_seo'))
      <div class="error-text">
          {{$errors->first('a_description_seo')}}
      </div>
      @endif
  </div>


    <button type="submit" class="btn btn-success">Lưu thông tin</button>
    <div class="form-group">

    </div>


</form>
