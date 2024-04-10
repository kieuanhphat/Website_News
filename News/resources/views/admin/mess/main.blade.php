<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                </div>
                <table class="table">
                    <thead>
                    <tr class="alert alert-warning">
                        <th scope="col">Tên Người Gửi</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nội Dung</th>
                        <th scope="col">Thành Viên</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                                <td>{{$data->name}}</td>
                                <td >{{$data->email}}</td>
                                <td>{{$data->message}}</td>
                                <td>
                                    @if($data->status==1)
                                       <span class="label label-info">Đã Đăng Ký</span>
                                    @else
                                        <span class="label label-danger">Chưa Đăng Ký</span>
                                    @endif
                                </td>


                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
