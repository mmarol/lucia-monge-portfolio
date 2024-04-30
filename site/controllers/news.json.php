<?php

return function ($page) {

  $limit          = 2;
  $pastArticles   = $page->children()->listed()->filter('date_status', 'past')->paginate($limit);
  $pagination     = $pastArticles->pagination();
  $more           = $pagination->hasNextPage();

  return [
      'pastArticles'  => $pastArticles,
      'more'          => $more,
      'html'          => '',
      'json'          => [],
    ];
};