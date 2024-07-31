<?php

foreach($projects as $project) {

  $html .= snippet('projects-grid-item', ['item' => $project], true);

}

$json['html'] = $html;
$json['more'] = $more;

echo json_encode($json);