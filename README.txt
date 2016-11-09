Introduction:
  This module provides sample code to migrate data from non-drupal mysql database
  to Drupal 8 database.

  Steps for that are mentioned below:

  Step-1:
    Go to material folder and import database on your system. You can import it
    using PHPMyadmin or similar tools.
    Database name will be "migrate-source"
    It contains one table "pages" with related data.

  Step-2:
    Now enable "migrate_example_mysql_setup" module.
    This provides basic required fields for page content type.
    drush en migrate_example_mysql_setup

  Step-3:
    Now enable "migrate_example_mysql" module.

  Step-4:
    Update your settings.php file so that it tries to connect to other mysql
    (source) database.
    Add below snippet:

    $databases['db_migration_plugin']['default'] = array(
      'database' => 'migrate-source-multi-table',
      'username' => 'username_here',
      'password' => 'password_here',
      'prefix' => '',
      'host' => 'localhost',
      'port' => '3306',
      'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
      'driver' => 'mysql',
    );

    User name and password may vary as per your mysql's settings.

  Step-5:
    Go to terminal and your project (Drupal8) folder.
    Run command "drush migrate-status"
    It should list migration related to "Demo" group.
    If connection is successful it should show below output.

    Group: MySql Demo imports (plugin_demo)  Status  Total  Imported  Unprocessed  Last imported
    pages                                    Idle    2      0         2
    users                                    Idle    2      0         2


  Step-6:
    Run migrate import command.
    drush mi --group=plugin_demo

  Step-7:
    Visit admin/content on your drupal 8 site and you should see migrated content.




