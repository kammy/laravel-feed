<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
    <channel>
        <title><?php echo $channel['title'] ?></title>
        <link><?php echo $channel['link'] ?></link>
        <description><?php echo $channel['description'] ?></description>
        <atom:link href="<?php echo $channel['link'] ?>" rel="self"></atom:link>
        <language><?php echo Config::get('application.language') ?></language>
        <lastBuildDate><?php echo date('D, d M Y H:i:s P', strtotime($channel['pubdate'])) ?></lastBuildDate>
        <?php foreach($items as $item): ?>
        <item>
            <title><?php echo $item['title'] ?></title>
            <link><?php echo $item['link'] ?></link>
            <description><?php echo $item['description'] ?></description>
            <dc:creator xmlns:dc="http://purl.org/dc/elements/1.1/"><?php echo $item['author'] ?>></dc:creator>
            <pubDate><?php echo date('D, d M Y H:i:s P', strtotime($item['pubdate'])) ?></pubDate>
        </item>
        <?php endforeach; ?>
    </channel>
</rss>