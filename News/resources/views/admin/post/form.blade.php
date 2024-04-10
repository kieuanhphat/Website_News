<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <form id="FormData" enctype="multipart/form-data">
            @csrf
                <div class="card-body" >
                    <input type="hidden" id="id" name="id" value="{{ isset($row) ? $row->id:'';}}">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ isset($row) ? $row->name:'';}}"
                            onchange="ChangeToSlug()"
                            onkeyup="ChangeToSlug()"
                            class="form-control"
                        />
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input
                            type="text"
                            id="slug"
                            name="slug"
                            value="{{ isset($row) ? $row->slug:'';}}"
                            class="form-control"
                        />
                    </div>
                    <div class="form-group">
                        <label for="image">Hình Ảnh</label>
                        <input type="file" name="image" class="form-control" id="image" value=""  placeholder="">
                        @if(isset($row))
                                <img width="25%" src="{{asset('public/img/'.$row -> image)}}">
                        @endif
                    </div>
                    <div class="form-group">
                          <label for="cate_id">Danh Mục</label>
                          <select class="form-control" name="cate_id" id="cate_id">
                           <option value="{{ isset($row) ? $row->category->id:'';}}">{{ isset($row) ? $row->category->name:'--Chọn--';}}</option>
                          @foreach($category as $key => $cate)
                                <option value="{{$cate->id}}"> {{$cate->name}} </option>
                          @endforeach

                          </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng Thái</label>
                        <select class="form-control" name="status" id="status">
                         @if(isset($row))
                            @if($row->status==1)
                                <option value="1">Hiện</option>
                                <option value="0">Ẩn</option>
                            @else
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                            @endif
                         @endif
                         @if(!isset($row))
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                         @endif
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Mô Tả</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ isset($row) ? $row->description:'';}}</textarea>
                    </div>
                     <div class="form-group">
                        <label for="content">Nội Dung</label>
                        <textarea class="form-control" name="content" id="content" rows="3">{{ isset($row) ? $row->content:'';}}</textarea>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success text-white">
                            Lưu Lại
                        </button>
                        <a href="/admin/{{$nameModule}}" class="btn btn-danger text-white">
                            Thoát
                        </a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
