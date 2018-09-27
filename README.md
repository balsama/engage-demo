[![Build Status](https://travis-ci.org/balsama/engage-demo.svg?branch=master)](https://travis-ci.org/balsama/engage-demo)
👉[Development Snapshot Sandbox](http://engagedemon9r8txkdsy.devcloud.acquia-sites.com/AH_VIEW)👈
# Engage Drupal + Lightning Demo site

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

## Demo
The demo script and screenshots can be found in this [Google Doc][demo_script].
        
## Default content
The Umami Demo Content module is installed out of the box so all of the default
content that comes with Umami will be created on install. The Default Content
module along with the Engage Demo Content module
(`docroot/modules/custom/engage_demo_content`) are also installed. Content
exported into that module's `content` directory as JSON using the Default
Content module will also be created.

To export a piece of content you have created, run:

    $ drush dce <ENTITY_TYPE> <ID> --file=modules/custom/engage_demo_content/content/<ENTITY_TYPE>/<UUID>.json
    
See [Default Content's documentation][default_content_documentation] for more information.

The following content is provided and intended to be used by the demo (in
addition to the content provided by the Umami Demo Content Module):

| Type  | Title | nid | Alias | Status|
|-------|-------|-----|-------|-------|
|Landing Page|So Tasty|17|/so-tasty|draft|
|Article|Now with less sugar|55|/article/less-sugar|needs review|
|Recipe|Zucchini Boats|35|<none>|needs review|

[default_content_documentation]: https://www.drupal.org/docs/8/modules/default-content "Documentation on using the Default Content Drupal module"
[demo_script]: https://docs.google.com/document/d/1MxBCYkDar-fAVjm8hOgwmPQpoWchOw-V_yHFeqWD7Ns/edit?usp=sharing "Acquia Engage 2018 Simplicity Demo"
