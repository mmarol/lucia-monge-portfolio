<?php

foreach($pastArticles as $article) {

  $html .= snippet('news-grid-item', ['item' => $article], true);

}
$json['html'] = $html;
$json['more'] = $more;

echo json_encode($json);