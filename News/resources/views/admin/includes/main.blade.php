 <?php
    $asideLists = [
        [
            'name' => 'Danh Mục',
            'link' => 'category',
            'icon' => 'format-line-weight',
            'color' => 'cyan'
        ],
        [
            'name' => 'Bài Viết',
            'link' => 'post',
            'icon' => 'pencil',
            'color' => 'warning'
        ],
        [
            'name' => 'Thành Viên',
            'link' => 'user',
            'icon' => 'account-plus',
            'color' => 'danger'
        ],
        [
            'name' => 'Liên Hệ',
            'link' => 'mess',
            'icon' => 'phone',
            'color' => 'info'
        ]
    ];
?>
<div class="container-fluid">
    <div class="row">
        @foreach($asideLists as $asideList)
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href ="/admin/{{$asideList['link']}}">
                    <div class="card card-hover">
                        <div class="box bg-{{$asideList['color']}} text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-{{$asideList['icon']}}"></i>
                            </h1>
                            <h6 class="text-white">{{$asideList['name']}}</h6>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
