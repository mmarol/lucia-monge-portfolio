<?php

foreach($pastArticles as $article) {

  $html .= snippet('news-list-item', ['article' => $article], true);

}
$json['html'] = $html;
$json['more'] = $more;

echo json_encode($json);