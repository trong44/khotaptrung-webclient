<header id="heading" class="@hide('theme_5_route-name-header') inactive @endhide">
    <nav class="heading">

        @if(setting('sys_theme_ver_page_build'))
            @php
                $data = explode(',',setting('sys_theme_ver_page_build'));
                $data_title = null;
                $data_widget = null;
                foreach($data as $key => $item){
                    if ($key == 0){
                        $data_title = explode('|',$item);
                    }else{
                        $data_widget = explode('|',$item);
                    }
                }
            @endphp
            @foreach($data_widget as $key => $value)
                @if($value == '__header__home__v2' || $value == '__header__home__v1' )
                    @include('frontend.widget.header.'.$value.'',with(['title'=>$data_title[$key]]))
                @endif
            @endforeach

        @else
            @include('frontend.widget.header.__header__home__v1')


        @endif
    </nav>
</header>
<form id="logout-form" action="{{ url('/ajax/logout') }}" method="POST" class="d-none">
    @csrf
</form>
