# wpnetwork-migrate
a php script for updating the domain when migrating a WordPress multisite installation

## Warnings!
- This has only been tested (once) on a multisite installation with subfolders
- This was created to set up a local clone. It will get WP-generated links & dashboards working. 
- It does not fix (yet):
  - media links
  - links in the post content
  - serialized urls in options & elsewhere

## Requests
* Please comment/fork/email: melissa@fieldandpostbk.com

## How to use this script
- Change the variables in the script 
- Run it
- Check the SQL output
- If it looks good, run it (you can copy it, paste it as a SQL query in phpMyAdmin)

More details on all the other stuff you have to do:
http://melissahsiung.com/cloning-wordpress-multisite/


## Future plans
- Make a form for the vars
- Connect/modify the db
- Clean up content/media links

## Log
* v.0.1: It worked! Twice!
