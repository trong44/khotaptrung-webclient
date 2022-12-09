@foreach($data_menu_transaction as $items)
    <li><a href="{{$items->url ? $items->url : $items->slug}}">{{$items->title}}</a></li>
@endforeach
