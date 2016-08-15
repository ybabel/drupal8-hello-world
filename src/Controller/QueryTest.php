<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class QueryTest.
 *
 * @package Drupal\hello\Controller
 */
class QueryTest extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function get_last_articles() {
    $nids = \Drupal::entityQuery('node')
      ->condition('type', 'article', '=')
      ->range(0, 25)
     ->execute();
    $storage = \Drupal::entityManager()->getStorage('node');
    $nodes = $storage->loadMultiple($nids);
    $result = '';
    foreach ($nodes as $node) {
      $result .= $node->title->value . '<br>';
    }
    return [
      '#type' => 'markup',
      '#markup' => $result 
    ];
  }

}
