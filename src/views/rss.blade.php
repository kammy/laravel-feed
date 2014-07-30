{{ '<'.'?'.'xml version="1.0" encoding="UTF-8" ?>'."\n" }}
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
        <title><![CDATA[{{ $channel['title'] }}]]></title>
        <link>{{ $channel['link'] }}</link>
        <description>{{ $channel['description'] }}</description>
        <atom:link href="{{ Request::url() }}" rel="self"></atom:link>
        <atom:link rel="hub" href="http://pubsubhubbub.appspot.com" />
        @if (!empty($channel['logo']))
        <image>
            <url>{{ $channel['logo'] }}</url>
            <title>{{ $channel['title'] }}</title>
            <link>{{ $channel['link'] }}</link>
        </image>
        @endif
        <language>{{ $channel['lang'] }}</language>
        <lastBuildDate>{{ date('D, d M Y H:i:s O', strtotime($channel['pubdate'])) }}</lastBuildDate>
        @foreach($items as $item)
        <item>
            <title>{{ $item['title'] }}</title>
            <link>{{ $item['link'] }}</link>
            <guid isPermaLink="true">{{ $item['link'] }}</guid>
            <description>{{ $item['description'] }}</description>
            @if (!empty($item['content']))
            <content:encoded><![CDATA[{{ $item['content'] }}]]></content:encoded>
            @endif
            <dc:creator xmlns:dc="http://purl.org/dc/elements/1.1/">{{ $item['author'] }}</dc:creator>
            <pubDate>{{ date('D, d M Y H:i:s O', strtotime($item['pubdate'])) }}</pubDate>
        </item>
        @endforeach
    </channel>
</rss>
