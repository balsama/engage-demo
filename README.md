# Engage Drupal + Lightning Demo site

### 👉[Development Snapshot](http://engagedemon9r8txkdsy.devcloud.acquia-sites.com/AH_VIEW)👈

This is used to create an install of the site used in the Lightning + Drupal
demo for Acquia Engage Austin 2018.

## Dev Builds
This repo is built out to Acquia Cloud on each commit to master. This site lives
at http://engagedemon9r8txkdsy.devcloud.acquia-sites.com and the User 1
credentials are admin/admin.  

## Local Installation
To install the demo site locally and open a browser:

1. Clone this repo

        git clone git@github.com:balsama/engage-demo.git && cd engage-demo

2. Run

        composer quick-start
        
## Default content
The Umami Demo Content module is insalled out of the box so all of the default
content that comes with Umami will be created on install. The Default Content
module along with the Engage Demo Content module
(`docroot/modules/custom/engage_demo_content`) are also installed. Content
exported into that module's `content` directory as JSON using the Default
Content module will also be created.

To export a piece of content you have created, run:

    $ drush dce <ENTITY_TYPE> <ID> --file=modules/custom/engage_demo_content/content/<ENTITY_TYPE>/<UUID>.json
    
See [Default Content's documentation][default_content_documentation] for more information.

As of the time of this commit, there is a single Landing Page content type
created on install at `/node/17` aliased to `so-tasty`.

[default_content_documentation]: https://www.drupal.org/docs/8/modules/default-content "Documentation on using the Default Content Drupal module"
