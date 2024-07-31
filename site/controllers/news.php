<?php

return function ($page) {

  $limit    = 12;
  $articles = $page->children()->listed();

  // add filters
  $upcomingArticles = $articles->filter('date_status', 'upcoming');
  $pastArticles = $articles->filter('date_status', 'past');

  // add pagination tp past articles
  $pastArticlesLimited = $pastArticles->paginate($limit);

  // create a shortcut for pagination
  $pagination = $pastArticlesLimited->pagination();

  // pass variables to the template
  return [
    'limit'               => $limit,
    'articles'            => $articles,
    'upcomingArticles'    => $upcomingArticles,
    'pastArticles'        => $pastArticles,
    'pastArticlesLimited' => $pastArticlesLimited,
    'pagination'          => $pagination
  ];
};
