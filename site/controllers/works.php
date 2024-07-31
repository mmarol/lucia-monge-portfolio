<?php

return function ($page) {

  $limit    = 12;

  // get all articles
  $projects = $page->children()->listed();

  // add pagination
  $projectsLimited = $projects->paginate($limit);

  // create a shortcut for pagination
  $pagination = $projectsLimited->pagination();

  // pass $projects and $pagination to the template
  return [
    'limit'               => $limit,
    'projects'            => $projects,
    'projectsLimited'     => $projectsLimited,
    'pagination'          => $pagination
  ];

};