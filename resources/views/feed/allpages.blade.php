{!! '<'.'?xml version="1.0"?>' !!}
<rss version="2.0">
    <channel>
        <title><![CDATA[ SoujournPlanet ]]></title>
        <link><![CDATA[{{  env('APP_URL') }}/feed/general ]]></link>
        <description><![CDATA[ Blog ]]></description>
        <language>en</language>
        <pubDate>{{ now()->toDayDateTimeString('Europe/Madrid') }}</pubDate>

        @foreach($pages as $page)
            <item>
                <title><![CDATA[{!! $page->name !!}]]></title>
                  <description> <![CDATA[<img src="{{ asset('public/storage/pages/'.$page->image) }}" width="100" height="50"/>]]> </description>
                <link>{{ env('APP_URL') }}/sites/pages/{{ $page->slug }}</link>


                <date>{{ $page->created_at->toRssString() }}</date>
            </item>
        @endforeach
    </channel>
</rss>
