<ul >
    @foreach($data??[] as $item)
        @if ($item->parent_id == 0)
            @if($item->url == "/tin-tuc")
                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')

                    <li class="li_button">
                        <a href="{{ setting('sys_zip_shop') }}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                    </li>
                @else
                    <li class="li_button">
                        <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                    </li>
                @endif
            @elseif($item->url == '/nap-the' || $item->url =='/recharge-atm')

                @if(!App\Library\AuthCustom::check())
                    <li class="li_button">
                        <a href="#" data-toggle="modal" data-target="#modalLogin" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                    </li>
                @else
                    <li class="li_button">
                        <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                    </li>
                @endif
            @else
                <li class="li_button ">
                    <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                </li>
            @endif
        @endif
    @endforeach


    <li class="box-login-mobile">

    </li>
</ul>
