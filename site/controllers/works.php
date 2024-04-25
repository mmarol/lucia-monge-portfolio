<?php

return function ($page) {

  // get all articles
  $projects = $page->children()->listed();

  // add pagination
  $projects = $projects->paginate(10);

  // create a shortcut for pagination
  $pagination = $projects->pagination();

  // pass $projects and $pagination to the template
  return [
    'projects' => $projects,
    'pagination' => $pagination
  ];

};