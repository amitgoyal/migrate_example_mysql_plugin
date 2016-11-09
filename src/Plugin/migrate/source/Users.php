<?php
namespace Drupal\migrate_example_mysql_plugin\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for the movies.
 *
 * @MigrateSource(
 *   id = "users"
 * )
 */
class Users extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    $query = $this->select('users', 'u')
      ->fields('u', ['uid', 'username', 'password', 'email', 'created']);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'uid' => $this->t('User ID'),
      'username' => $this->t('User Name'),
      'password' => $this->t('Password'),
      'email' => $this->t('Email'),
      'created' => $this->t('Created'),
    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'uid' => [
        'type' => 'integer',
        'alias' => 'u',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareRow(Row $row) {
    // Perform extra pre-processing for keywords terms, if needed.
    return parent::prepareRow($row);
  }
}
