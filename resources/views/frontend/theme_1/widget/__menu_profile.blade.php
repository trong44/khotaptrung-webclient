
@foreach($data_menu_profile as $item)
    @if ($item->parent_id == 0)
        <div class="col-6 col-sm-6 col-xl-6 col-lg-12 col-xl-12 ">
            <div class="account_sidebar_menu_title">
                <p>{{$item->title}}</p>
            </div>
            <div class="account_sidebar_menu_nav">
                <ul>
                    @foreach ($data_menu_profile as $key_child => $child_item)
                        @if ($item->id == $child_item->parent_id)
                            <li>
                                <a  href="{{$child_item->url?$child_item->url:$child_item->slug}}" class="\">{{$child_item->title}}</a>
                            </li>
                        @endif
                    @endforeach


                </ul>
            </div>
        </div>

    @endif
@endforeach
