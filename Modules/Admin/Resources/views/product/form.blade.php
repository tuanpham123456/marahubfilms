<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="name">Tên phim:</label>
                <input type="text" class="form-control" id="email" placeholder="Tên phim" value="{{ old('name',isset($category->c_name) ? $category->c_name : '' )}}" name="name">
                @if($errors->has('name'))
                <div class="error-text">
                    {{$errors->first('name')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Mô tả:</label>
                <textarea name="" class="form-control" id="" cols="30" rows="3" placeholder="Mô tả ngắn phim "></textarea>
            </div>
            <div class="form-group">
                <label for="name">Nội dung:</label>
                <textarea name="" class="form-control" id="" cols="30" rows="3" placeholder="Mô tả nội dung "></textarea>
            </div>
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="email" placeholder="Title" value="{{ old('c_title_seo',isset($category->c_title_seo) ? $category->c_title_seo : '')}}" name="c_title_seo">
                @if($errors->has('c_title_seo'))
                <div class="error-text">
                    {{$errors->first('c_title_seo')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <input type="text" class="form-control" id="email" placeholder="Meta description" value="{{ old('c_description_seo',isset($category->c_description_seo) ? $category->c_description_seo : '')}}" name="c_description_seo">
                @if($errors->has('c_description_seo'))
                <div class="error-text">
                    {{$errors->first('c_description_seo')}}
                </div>
                @endif
            </div>


        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Loại phim</label>
                <select name="" id="" class="form-control">
                    <option value="">---Chọn Thể Loại Phim---</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Giá phim :</label>
                <input type="number" placeholder="Giá phim "class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Avatar:</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="hot">Nổi bật</label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>



</form>