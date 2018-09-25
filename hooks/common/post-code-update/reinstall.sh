#!/bin/sh

site="$1"
target_env="$2"

# Fresh install of the Lightning Demo.
/usr/local/bin/drush9 @$site.$target_env site-install config_installer --account-pass=admin --yes
/usr/local/bin/drush9 @$site.$target_env pm:uninstall demo_umami_content
/usr/local/bin/drush9 @$site.$target_env pm:enable demo_umami_content
