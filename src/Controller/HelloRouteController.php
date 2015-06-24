<?php
 
/**
 * @file
 * Contains of \Drupal\hello\Controller\HelloRouteController.php
 */
 
namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
 
/**
 * Returns responses for User module routes.
 */
class HelloRouteController extends ControllerBase {
 
  /**
   * Returns the route content.
   *
   * @return array
   *   A renderable array containing the page content.
   */
  public function index() {
//    return array('#markup' => 'Hello world page text (from controller) !');
    /*return [
        '#type' => 'markup',
        '#markup' => $this->t('Hello world page text (from controller) !')
    ];*/

    return ['#theme' => 'hello_text', 
            '#text' => \Drupal::config('hello.settings')->get('hello_value')
    ];

  }
 
}
 
