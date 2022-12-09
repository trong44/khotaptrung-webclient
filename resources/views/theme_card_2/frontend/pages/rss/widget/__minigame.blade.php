    @foreach ($data  ??[] as $item)
        <item>
            <title>{{$item->seo_title}}</title>
            <description>
                <![CDATA[
                <a href="{{Request::root()}}{{'/minigame-'. $item->slug }}">
                    <img src="{{$item->image}}" >
                </a>
                </br>{{$item->seo_description}} ]]>
            </description>
            <pubDate>>{{ now() }}</pubDate>
            <link>{{Request::root()}}{{'/minigame-'. $item->slug }}</link>
            <guid>{{Request::root()}}{{'/minigame-'. $item->slug }}</guid>
        </item>
    @endforeach
