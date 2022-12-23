@foreach($data??[] as $service)
    @foreach ($service  ??[] as $item)
        <item>
            <title>{{$item->seo_title}}</title>
            <description>
                <![CDATA[
                <a href="{{Request::root()}}{{'/dich-vu/'. $item->slug }}">
                    <img src="{{$item->image}}" >
                </a>
                </br>{{$item->seo_description??''}} ]]>
            </description>
            <pubDate>>{{  Carbon\Carbon::parse($item->created_at)->tz('UTC')->toAtomString() }}</pubDate>
            <link>{{Request::root()}}{{'/dich-vu/'. $item->slug }}</link>
            <guid>{{Request::root()}}{{'/dich-vu/'. $item->slug }}</guid>
        </item>
    @endforeach
@endforeach

