<?php

/**
 * Script to clean up unused fields in page or file content files
 * Compares fields present in the content file
 * with fields defined in the blueprint
 * and removes all undefined fields
 */

require __DIR__ . '/kirby/bootstrap.php';

$kirby = new Kirby;

// Authenticate as almighty
$kirby->impersonate('kirby');

// Define your collection;
$models = $kirby->models();

// set the fields to be ignored
$ignore = ['uuid', 'title', 'slug', 'template', 'sort', 'focus'];

foreach ($models as $model) {
    // call the script for all languages if multilang
    if ($kirby->multilang() === true) {
            $languages = $kirby->languages();
            foreach ($languages as $language) {
                    cleanUp($model, $ignore, $language->code());
            }
    } else {
            cleanUp($model, $ignore);
    }
}


function cleanUp($model, $ignore = null, string $lang = null) {
            // get all fields in the content file
            $contentFields = $model->content($lang)->fields();

            // unset all fields in the `$ignore` array
            foreach ($ignore as $field) {
                    if (array_key_exists($field, $contentFields) === true) {
                            unset($contentFields[$field]);
                    }
            }

            // get the keys
            $contentFields = array_keys($contentFields);

            // get all field keys from blueprint
            $blueprintFields = array_keys($model->blueprint()->fields());

            // get all field keys that are in $contentFields but not in $blueprintFields
            $fieldsToBeDeleted = array_diff($contentFields, $blueprintFields);

            // update page only if there are any fields to be deleted
            if (count($fieldsToBeDeleted) > 0) {

                    // flip keys and values and set new values to null
                    $data = array_map(fn ($value) => null, array_flip($fieldsToBeDeleted));

                    // try to update the page with the data
                    try {
                            $model->update($data, $lang);
                            echo Html::tag('p', 'The content file for ' . $model->id() . ' was updated');
                    } catch (Exception $e) {
                            echo Html::tag('p', $model->id() . ': ' .$e->getMessage());
                    }
            } else {
                    echo Html::tag('p', 'Nothing to clean up in ' . $model->id());
            }
}