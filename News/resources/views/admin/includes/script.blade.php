<script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="/assets/libs/flot/excanvas.js"></script>
    <script src="/assets/libs/flot/jquery.flot.js"></script>
    <script src="/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="/dist/js/pages/chart/chart-page-init.js"></script>
    {{-- Ckeditor --}}
    <script src="/assets/ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace('content');</script>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="delNow">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thông Báo!!!</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Bạn có muốn xóa <span class="text-danger" id="nameDel"></span>
                    <input type="hidden" id="idDel" name="idDel">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" >Xóa</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Không</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="changePass">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="changeP">
                @csrf
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Đổi Mật Khẩu!!!</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Mât Khẩu Cũ</label>
                        <input
                            type="text"
                            id="oldpass"
                            name="oldpass"
                            class="form-control"
                        />
                    </div>
                    <div class="form-group">
                        <label for="name">Mât Khẩu Mới</label>
                        <input
                            type="text"
                            id="newPass"
                            name="newPass"
                            class="form-control"
                        />
                    </div>
                    <div class="form-group">
                        <label for="name">Nhập Lại Mật Khẩu Mới</label>
                        <input
                            type="text"
                            id="renewpass"
                            name="renewpass"
                            class="form-control"
                        />
                    </div>
                    <input type="hidden" id="idPass" name="idPass">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" >Đổi mật khẩu</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Không</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function ChangeToSlug(){
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("name").value;
        slug = title.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
    function getID(id,name){
        $('#nameDel').text(name)
        $('#idDel').val(id)
    }
    function getIDpass(id,password){
        $('#oldpass').val(password)
        $('#idPass').val(id)
    }
    $(document).ready(function(){
        $('#FormData').on('submit',function(e){
            //chặn load form
            e.preventDefault();
            // lấy dữ liệu form
            const nameModule = '{{$nameModule}}';

            if(nameModule=='user'){

                const password = $('#password').val();
                const cfpassword = $('#cfpassword').val();
                //kiểm tra dữ liệu
                if(password!=cfpassword){
                    alert('Mật khẩu xác nhận không đúng!');
                    return false;
                }
                 //gửi Ajax
                $.ajax({
                    url:'/admin/{{ $nameModule }}/process',
                    method:'POST',
                    data: new FormData(this),
                        contentType:false,
                        processData:false,
                    success: function(results){
                        //console.log(results);
                        //return;
                        if(results.msg =='edit'){
                            window.location.href ='/admin/{{$nameModule}}/edit/'+results.id;
                        }else{
                            if(results.msg == 'fail'){
                                alert(results.error);
                            }else{
                                if(results.msg == 'ok'){
                                        alert('Thêm Thành Viên Thành Công!!!');
                                        //chuyển trang
                                        window.location.href ="/admin/{{$nameModule}}";
                                }
                            }
                        }

                    }
                });
                return false;
            }else   if(nameModule=='category'||nameModule=='post'){
                const contentText = CKEDITOR.instances['content'].getData();
                //gửi Ajax

                $('#content').val(contentText);
                var form = this;
                $.ajax({
                    url:'/admin/{{$nameModule}}/process',
                    method:'POST',
                    data: new FormData(form),
                    contentType:false,
                    processData:false,

                    success: function(results){
                        {{-- console.log(results);
                        return; --}}
                        if(results.msg =='edit'){
                            window.location.href ='/admin/{{$nameModule}}/edit/'+results.id;
                        }else{
                            if(results.msg == 'fail'){
                                alert(results.error);
                            }else{
                            if(results.msg == 'ok'){
                                    alert('Thêm {{$nameModule}} Thành Công!!!');
                                    //chuyển trang
                                    window.location.href ="/admin/{{$nameModule}}";
                            }
                            }
                        }

                    }
                });
                return false;
            }
        })
        $('#delNow').on('submit',function(e){
            //chặn load form
            e.preventDefault();
            const nameModule = '{{$nameModule}}';
            $.ajax({
                    url:'/admin/{{$nameModule}}/delete',
                    method:'POST',
                    data: new FormData(this),
                        contentType:false,
                        processData:false,
                    success: function(results){
                        {{-- console.log(results);
                        return; --}}
                        if(results.msg =='fail'){
                            alert('Bạn không thể tự chính mình!!!');
                            window.location.href ="/admin/{{$nameModule}}";
                        }
                        if(results.msg =='delete'){
                            alert('Xóa Thành Công!!!');
                            //chuyển trang
                            window.location.href ="/admin/{{$nameModule}}";
                        }
                    }
                });
                return false;
        })
        $('#changeP').on('submit',function(e){
            //chặn load form
            e.preventDefault();
            const password = $('#newPass').val();

            $.ajax({
                    url:'/admin/user/changePass',
                    method:'POST',
                    data: $(this).serialize(),
                    success: function(results){
                        if(results.msg =='change'){
                            alert('Đã đổi Mật Khẩu Thành Công!!!');
                            //chuyển trang
                            window.location.href ='/admin/user/edit/'+results.id;
                        }
                    }
                });
                return false;
        })
    })
</script>
