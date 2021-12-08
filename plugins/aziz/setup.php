<?php
/* setup.php 
If you need more info, see this page:
https://github.com/pluginsGLPI/example/wiki/How-to-setup
*/

function plugin_init_aziz()
{
  global $PLUGIN_HOOKS;
  $PLUGIN_HOOKS['item_add']['aziz'] = array("Ticket" => 'plugin_item_add_aziz');
  $PLUGIN_HOOKS['item_add']['aziz'] = array("tickettask" => 'plugin_item_add_aziz');
  $PLUGIN_HOOKS['csrf_compliant']['aziz'] = true;
  
}

function plugin_version_aziz()
{
  return [ 'name'           => 'aziz',
           'version'        => '1.0',
           'author'         => 'laroussi_aziz',
           'license'        => 'GPLv2+',
           'homepage'       => '',
           'requirements'   => [
              'glpi' => [
                 'min' => '9.3',
                 'dev' => true
              ]
           ]
         ];
}

function plugin_aziz_check_prerequisites() { return true; }
function plugin_aziz_check_config() { return true; }



?>