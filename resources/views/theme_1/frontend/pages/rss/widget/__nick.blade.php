@foreach ($data??[] as $item)
    <item>
        <title>{{$item->seo_title}}</title>
        <description>
            <![CDATA[
            <a href="{{Request::root()}}{{'/mua-acc/'. $item->slug }}">
                <img src="{{$item->image}}" >
            </a>
            </br>{{$item->seo_description??''}} ]]>
        </description>
        <pubDate>>{{  Carbon\Carbon::parse($item->created_at)->tz('UTC')->toAtomString() }}</pubDate>
        <link>{{Request::root()}}{{'/mua-acc/'. $item->slug }}</link>
        <guid>{{Request::root()}}{{'/mua-acc/'. $item->slug }}</guid>
    </item>
@endforeach


