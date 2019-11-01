<?php declare(strict_type = 1);

namespace Drupal\jsonapi_demo_content\EventSubscriber;

use Drupal\jsonapi\ResourceType\ResourceTypeBuildEvent;
use Drupal\jsonapi\ResourceType\ResourceTypeBuildEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Customized JSON:API to simplify the demo.
 */
final class JsonapiResourceTypeBuildEventSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [ResourceTypeBuildEvents::BUILD => 'customize'];
  }

  /**
   * Customizes JSON:API resources.
   *
   * Simplifies JSON:API's default resource type and field exposure.
   *
   * @param ResourceTypeBuildEvent $event
   */
  public function customize(ResourceTypeBuildEvent $event) {
    if (!isset(static::$resourceTypeWhiteList[$event->getResourceTypeName()])) {
      $event->disableResourceType();
    }
    else {
      $disabled_fields = array_diff_key($event->getFields(), array_flip(static::$resourceTypeWhiteList[$event->getResourceTypeName()]));
      foreach ($disabled_fields as $disabled_field) {
        $event->disableField($disabled_field);
      }
    }
  }

  /**
   * A resource type and field whitelist.
   *
   * @var array
   */
  protected static $resourceTypeWhiteList = [
    'node--article' => [
      'nid',
      'created',
      'changed',
      'published',
      'title',
      'body',
      'path',
      'node_type--node_type',
      'uid',
      'field_tags',
    ],
    'node--page' => [
      'nid',
      'created',
      'changed',
      'published',
      'title',
      'body',
      'path',
      'node_type--node_type',
      'uid',
    ],
    'node_type--node_type' => [
      'name',
      'type',
      'description',
    ],
    'taxonomy_term--tags' => [
      'name',
      'path',
      'parent',
    ],
    'user--user' => [
      'display_name',
    ],
  ];

}
