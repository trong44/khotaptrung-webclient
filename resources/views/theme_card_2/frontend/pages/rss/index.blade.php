<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title>{{setting('sys_title')}}</title>
        <link><![CDATA[ {{\Request::server ("HTTP_HOST")}}/rss ]]></link>
        <language>vn</language>
        <description>{{ setting('sys_description') }}</description>
        <pubDate>{{ now() }}</pubDate>

        <image>
            <url>{{setting('sys_og_image')}}</url>
            <title>{{setting('sys_title')}}</title>
            <link>{{\Request::server ("HTTP_HOST")}}</link>
        </image>
        <pubDate>{{ now() }}</pubDate>
        <generator>{{\Request::server ("HTTP_HOST")}}</generator>
        <link>{{\Request::server ("HTTP_HOST")}}</link>

        @include('frontend.pages.rss.widget.__article')
        @include('frontend.pages.rss.widget.__minigame')
        @include('frontend.pages.rss.widget.__nick')
        @include('frontend.pages.rss.widget.__service')
    </channel>
</rss>
