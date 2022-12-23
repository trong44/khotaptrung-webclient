@foreach($data??[] as $article)
    @foreach ($article  ??[] as $item)
        <item>
            <title>{{$item->seo_title}}</title>
            <description>
                <![CDATA[
                <a href="{{Request::root()}}{{'/tin-tuc/'. $item->slug }}">
                    <img src="{{$item->image}}" >
                </a>
                </br>{{$item->seo_title}} ]]>
            </description>
            <pubDate>>{{  Carbon\Carbon::parse($item->created_at)->tz('UTC')->toAtomString() }}</pubDate>
            <link>{{Request::root()}}{{'/tin-tuc/'. $item->slug }}</link>
            <guid>{{Request::root()}}{{'/tin-tuc/'. $item->slug }}</guid>
        </item>


    @endforeach
@endforeach
