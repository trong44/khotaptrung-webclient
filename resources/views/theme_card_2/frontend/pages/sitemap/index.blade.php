<?php /*echo '<?xml version="1.0" encoding="UTF-8"?>';  */?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->



    <url>
        <loc>{{Request::root()}}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>


{{--    @foreach ($menu??[] as $item)--}}
{{--        <url>--}}
{{--            <loc>{{Request::root()}}{{'/'. $item->slug }}</loc>--}}
{{--            <lastmod>{{ $item->created_at->tz('UTC')->toAtomString() }}</lastmod>--}}
{{--            <changefreq>weekly</changefreq>--}}
{{--            <priority>0.9</priority>--}}
{{--        </url>--}}
{{--    @endforeach--}}
    @foreach ($mini_game??[] as $item)
        <url>
            <loc>{{Request::root()}}{{'/'. $item->slug }}</loc>
            <lastmod>{{ \Carbon\Carbon::now()->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
    <url>
        <loc>{{Request::root()}}{{'/mua-acc/'}}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->tz('UTC')->toAtomString() }}</lastmod>

        {{--        <lastmod>{{ $item->created_at->tz('UTC')->toAtomString() }}</lastmod>--}}
        <changefreq>weekly</changefreq>
        <priority>0.65</priority>
    </url>
    @foreach ($acc??[] as $item)
        <url>
            <loc>{{Request::root()}}{{'/mua-acc/'. $item->slug }}</loc>
            <lastmod>{{ Carbon\Carbon::parse($item->created_at)->tz('UTC')->toAtomString()}}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach

    @foreach ($article_category??[] as $item)


            <url>
                <loc>{{Request::root()}}{{'/tin-tuc/'. $item->slug }}</loc>
                <lastmod>{{ \Carbon\Carbon::now()->tz('UTC')->toAtomString() }}</lastmod>
                {{--                <lastmod>{{ $item->created_at}}</lastmod>--}}
                <changefreq>weekly</changefreq>
                <priority>0.8</priority>
            </url>

    @endforeach

    @foreach($arrArticle??[] as $article)
        @foreach ($article  ??[] as $item)
            <url>
                <loc>{{Request::root()}}{{'/tin-tuc/'. $item->slug }}</loc>
                <lastmod>{{  Carbon\Carbon::parse($item->created_at)->tz('UTC')->toAtomString() }}</lastmod>

                {{--                <lastmod>{{ $item->created_at }}</lastmod>--}}
                <changefreq>weekly</changefreq>
                <priority>0.65</priority>
            </url>
        @endforeach
    @endforeach
    <url>
        <loc>{{Request::root()}}{{'/dich-vu/'}}</loc>
        <lastmod>{{  Carbon\Carbon::parse($item->created_at)->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.65</priority>
    </url>
    @foreach($arrService??[] as $service)
        @foreach ($service  ??[] as $item)
            <url>
                <loc>{{Request::root()}}{{'/dich-vu/'. $item->slug }}</loc>
                <lastmod>{{  Carbon\Carbon::parse($item->created_at)->tz('UTC')->toAtomString() }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.65</priority>
            </url>
        @endforeach
    @endforeach
</urlset>

