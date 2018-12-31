<?php

use YifyAPI\YifyAPI;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$api = new YifyAPI();

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 50;

$response = $api->listMovies([
    'sort_by' => 'seeds',
    'order_by' => 'desc',
    'page' => $page,
    'limit' => $limit,
]);

$movie_count = $response->movie_count;
$movies = $response->movies;

echo '<table border=1 style="width: 100%">';
echo '<tr>
<th>Title</th>
<th>Year</th>
<th>Rating</th>
<th>Torrents</th>
</tr>';
foreach ($movies as $movie) {
    echo '<tr>';
    echo '<td>'.$movie->title_long.'</td>';
    echo '<td>'.$movie->year.'</td>';
    echo '<td>'.$movie->rating.'</td>';
    echo '<td>';
    $torrents = [];
    foreach ($movie->torrents as $torrent) {
        $torrents[] = "<a href='{$torrent->url}'>{$torrent->type} ({$torrent->quality})</a>";
    }
    echo implode(', ', $torrents);
    echo '</td>';
    echo '</tr>';
}
echo '</table>';

for ($i = 1; $i < (int) (($movie_count / $limit) + 1); $i++) {
    echo "<a href='?page={$i}'>{$i}</a> ";
}