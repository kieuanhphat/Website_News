 <?php
    $asideLists = [
        [
            'name' => 'Bảng Điều Khiển',
            'link' => 'dashboard',
            'icon' => 'view-dashboard'
        ],
        [
            'name' => 'Danh Mục',
            'link' => 'category',
            'icon' => 'format-line-weight'
        ],
        [
            'name' => 'Bài Viết',
            'link' => 'post',
            'icon' => 'pencil'
        ],
        [
            'name' => 'Thành Viên',
            'link' => 'user',
            'icon' => 'account-plus'
        ],
        [
            'name' => 'Liên Hệ',
            'link' => 'mess',
            'icon' => 'phone'
        ]
    ];
?>
 <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
            @foreach($asideLists as $asideList)
                    <li class="sidebar-item {{$asideList['link']==$nameModule ? 'selected':'';}}">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/admin/{{$asideList['link']}}"
                  aria-expanded="false"
                ><i class="mdi mdi-{{$asideList['icon']}}"></i><span class="hide-menu">{{$asideList['name']}}</span>
                </a>
              </li>
            @endforeach
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
