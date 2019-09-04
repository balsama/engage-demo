#!/bin/sh

site="$1"
target_env="$2"

# Fresh install of the Lightning Demo.
/usr/local/bin/drush9 @$site.$target_env site-install --existing-config --yes
/usr/local/bin/drush9 @$site.$target_env pm:uninstall jsonapi_demo_content
/usr/local/bin/drush9 @$site.$target_env pm:enable jsonapi_demo_content
