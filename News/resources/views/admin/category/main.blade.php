<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">
                        <a href="/admin/{{$nameModule}}/add" class="btn btn-outline-info">
                        <i class="mdi mdi-plus"></i>
                        Thêm Dữ Liệu
                        </a>
                    </h5>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Tên</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Tên Người Tạo</th>
                        <th scope="col">Trạng Thái</th>
                        <th scope="col">Chức Năng</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->slug}}</td>
                                <td class="">{{$data->user->name}}</td>
                                <td>
                                    @if($data->status==1) Hiện @else Ẩn @endif
                                </td>
                                <td>
                                    <a href="/admin/{{$nameModule}}/edit/{{$data->id}}" class="btn btn-outline-info">
                                    <i class="mdi mdi-pencil"></i>
                                    Sửa
                                    </a>
                                    <button type="button"
                                        class="btn btn-outline-danger"
                                        onclick="getID({{ $data->id }},'{{ $data->name }}')"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal">
                                    <i class="mdi mdi-delete"></i>
                                    Xóa
                                    </button>
                                </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
