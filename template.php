<?php
// $Id: template.php,v 1.1.2.3 2009/11/05 03:32:15 sociotech Exp $

/**
 * Changed breadcrumb separator
 */
function acquia_prosper_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' &rarr; ', $breadcrumb) .'</div>';
  }
}

function uc_stock_skus($nid) {
  $node = node_load($nid);
  if (is_null($node->model)) {
    return FALSE;
  }

  $skus = array($node->model);

  if (module_exists('uc_attribute')) {
    $models = db_query("SELECT model FROM {uc_product_adjustments} WHERE nid = %d", $node->nid);
    while ($model = db_fetch_object($models)) {
      if (!in_array($model->model, $skus)) {
        $skus[] = $model->model;
      }
    }
  }

  return $skus;
}
