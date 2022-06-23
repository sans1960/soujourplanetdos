{!! '<'.'?xml version="1.0"?>' !!}
<rss version="2.0">
    <channel>
        <title><![CDATA[ SoujournPlanet ]]></title>
        <link><![CDATA[{{  env('APP_URL') }}/feed/centralasia ]]></link>
        <description><![CDATA[ Blog ]]></description>
        <language>en</language>
        <pubDate>{{ now()->toDayDateTimeString('Europe/Madrid') }}</pubDate>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{!! $post->title !!}]]></title>
                  <description> <![CDATA[<img src="{{ asset('public/storage/photos/'.$post->photo->image) }}" width="100" height="50"/>]]> </description>
                <link>{{ env('APP_URL') }}/post/{{ $post->slug }}</link>


                <date>{{ $post->created_at->toRssString() }}</date>
            </item>
        @endforeach
    </channel>
</rss>
