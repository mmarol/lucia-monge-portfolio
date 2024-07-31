<?php

return function ($page) {

  $limit          = 12;
  $projects       = $page->children()->listed()->paginate($limit);
  $pagination     = $projects->pagination();
  $more           = $pagination->hasNextPage();

  return [
      'projects'      => $projects,
      'more'          => $more,
      'html'          => '',
      'json'          => [],
    ];
};