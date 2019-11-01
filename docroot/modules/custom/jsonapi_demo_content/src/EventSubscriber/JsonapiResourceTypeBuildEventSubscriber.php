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
      $field_overrides = static::$resourceTypeWhiteList[$event->getResourceTypeName()];
      $fields = $event->getFields();
      $disabled_fields = array_diff_key($fields, array_filter($field_overrides));
      foreach ($disabled_fields as $disabled_field) {
        $event->disableField($disabled_field);
      }
      $aliased_fields = array_intersect_key($fields, array_filter($field_overrides, 'is_string'));
      foreach ($aliased_fields as $aliased_field) {
        $event->setPublicFieldName($aliased_field, $field_overrides[$aliased_field->getInternalName()]);
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
      'created' => TRUE,
      'changed' => TRUE,
      'published' => TRUE,
      'title' => TRUE,
      'body' => TRUE,
      'path' => TRUE,
      'type' => 'bundle',
      'uid' => 'author',
      'field_tags' => 'tags',
    ],
    'node--page' => [
      'created' => TRUE,
      'changed' => TRUE,
      'published' => TRUE,
      'title' => TRUE,
      'body' => TRUE,
      'path' => TRUE,
      'type' => 'bundle',
      'uid' => 'author',
    ],
    'node_type--node_type' => [
      'name' => TRUE,
      'type' => TRUE,
      'description' => TRUE,
    ],
    'taxonomy_term--tags' => [
      'name' => TRUE,
      'path' => TRUE,
      'parent' => TRUE,
    ],
    'user--user' => [
      'display_name' => 'displayName',
    ],
  ];

}
