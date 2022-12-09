<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title>Dịch vụ</title>
        <link><![CDATA[ {{\Request::root()}}/rss-service ]]></link>
        <language>vn</language>
        <description>{{ setting('sys_description') }}</description>
        <pubDate>{{ now() }}</pubDate>

        <image>
            <url>{{setting('sys_og_image')}}</url>
            <title>{{setting('sys_title')}}</title>
            <link>{{\Request::root()}}</link>
        </image>
        <pubDate>{{ now() }}</pubDate>
        <generator>VnExpress</generator>
        <link>{{\Request::root()}}</link>

        @include('frontend.pages.rss.widget.__service')

    </channel>
</rss>
