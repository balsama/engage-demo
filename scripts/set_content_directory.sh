#!/bin/bash

chmod +w docroot/sites/default/settings.php
echo "\$config['content_directory'] = 'modules/custom/engage_demo_content/content';" >> docroot/sites/default/settings.php