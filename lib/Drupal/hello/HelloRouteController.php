<?php
 
/**
 * @file
 * Contains of lib\Drupal\hello\HelloRouteController.php
 */
 
namespace Drupal\hello;
 
/**
 * Returns responses for User module routes.
 */
class HelloRouteController {
 
  /**
   * Returns the route content.
   *
   * @return array
   *   A renderable array containing the page content.
   */
  public function index() {
    return array('#markup' => 'Hello workd page text (from controller) !');
  }
 
}
 
