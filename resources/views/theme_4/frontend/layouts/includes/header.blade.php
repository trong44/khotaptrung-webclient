<header>

    <nav class="navbar navbar-default navbar-top  navbar-expand-lg navbar-light  fixed-top">
        <div class="container justify-content-between">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="/">
                <img class="navbar-brand " src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" height="50px" alt="logo">
            </a>
            <div class="span-search d-lg-none">
                <a  href="#" id="btn-search" ><i class="fas fa-search"></i></a>
            </div>

            <div class="account-profile account-profile-mobile d-lg-none">
                <div class="span-account login box-account-mobile box-account-mobile_data">

                </div>
                <div class="box-loading btn-loading" >
                    <div class="loading">
                        <div class="loading-child"></div>
                    </div>
                </div>

            </div>

            <form id="form-search" action="" class=" d-lg-none" style="display: none">
                <div class="input-group mb-3">
                    <input type="text" id="input-search"  name="query" placeholder="Tìm kiếm..." value="" class="form-control" autocomplete="off" >
                    <div class="input-group-append">
                        <span class="input-group-text"><button class="btn-submit"><i class="fas fa-search"></i></button></span>
                    </div>
                </div>
            </form>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                @include('frontend.widget.__menu_category_desktop')

                {{--                    Chưa đang nhập--}}
                <div class="text-center box-logined box-logined_data"  style="border: 1px solid #cccccc;border-radius: 5px;padding: 10px 19px;">

                </div>
                {{--                    Đã đăng nhập--}}
                <div class="box-account box-account_data">

                </div>

                <div class="box-loading btn-loading" >
                    <div class="loading">
                        <div class="loading-child"></div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<form id="logout-form" action="{{ url('/ajax/logout') }}" method="POST" class="d-none">
    @csrf
</form>
