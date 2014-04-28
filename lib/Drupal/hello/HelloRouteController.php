<?php
 
/**
 * @file
 * Contains of lib\Drupal\hello\HelloRouteController.php
 */
 
namespace Drupal\hello;
 
class HelloRouteController {
 
  public function index() {
    return array('#markup' => 'Hello world page text (from controller) !');
  }
 
}
 
