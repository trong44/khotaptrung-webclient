@if(isset($data))
<ul class="content-banner-card-top">
    @foreach($data as $index => $item)
        <li>

            <p>{{$index+1}}</p>
            <span>{{$item->fullname ? $item->fullname : $item->username}}</span>
            <label >
                {{str_replace(',','.',number_format($item->amount))}}
               <sup>đ</sup>
            </label>
        </li>
    @endforeach

</ul>
@endif

