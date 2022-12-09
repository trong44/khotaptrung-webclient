<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title>Tin tức</title>
        <link><![CDATA[ {{\Request::server ("HTTP_HOST")}}/rss-article ]]></link>
        <language>vn</language>
        <description>{{ setting('sys_description') }}</description>
        <pubDate>{{ now() }}</pubDate>

        <image>
            <url>{{setting('sys_og_image')}}</url>
            <title>{{setting('sys_title')}}</title>
            <link>{{\Request::server ("HTTP_HOST")}}</link>
        </image>
        <pubDate>{{ now() }}</pubDate>
        <button-play>{{\Request::server ("HTTP_HOST")}}</button-play>
        <link>{{\Request::server ("HTTP_HOST")}}</link>

        @include('frontend.pages.rss.widget.__article')

    </channel>
</rss>
