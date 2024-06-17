<?php

return function ($page) {

  $limit    = 8;
  $articles = $page->children()->listed();

  // add filters
  $upcomingArticles = $articles->filter('date_status', 'upcoming');
  $pastArticles = $articles->filter('date_status', 'past');

  // add pagination tp past articles
  $pastArticles = $pastArticles->paginate($limit);

  // create a shortcut for pagination
  $pagination = $pastArticles->pagination();

  // pass variables to the template
  return [
    'limit'             => $limit,
    'articles'          => $articles,
    'upcomingArticles'  => $upcomingArticles,
    'pastArticles'      => $pastArticles,
    'pagination'        => $pagination
  ];
};
