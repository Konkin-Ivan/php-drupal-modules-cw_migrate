<?php

namespace Drupal\cw_migrate\Plugin\migrate\source;
use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * @MigrateSource(
 *   id = "cw_node_products",
 *   source_module = "cw_migrate",
 * )
 */

/**
 * The join options between the node and the sql table.
 */

class CwProducts extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Source data is queried from 'catalog_product_entity_varchar' table.
    $query = \Drupal::database()->select('catalog_product_entity_varchar', 'cpev');
		$query = \Drupal::database()->select('catalog_product_flat_1', 'cpf1');
		$query->join('catalog_product_flat_1', 'cpf1', 'cpf1.value = cpev.value');
		$query
			->fields('cpev', [
        'value_id',
        'entity_type_id',
        'attribute_id',
        'store_id',
        'entity_id',
        'value',
      ])
      //->fields('g', [
        //'',
        //'',
        //]);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    //
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    //
  }


}
