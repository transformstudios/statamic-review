Review allows you to share unpublished entries or revisions with collaborators without having to create a User for them.

For example, you can create a draft `About Us` page and give folks a URL to view that draft content. You can also share a working copy, if you're using revisions.

Configuration:
* publish the config via `php artisan vendor:publish --tag=review-config`
* add the handles of the collections you'd like to have reviewed

**Two ways to get that URL:**

1. The entry listing via the entry's Open Review action: ![screenshot of review action](https://github.com/transformstudios/statamic-review/raw/main/img/Open%20Review%20Action.png "Review Action")
2. The Review fieldtype; I'd recommend adding to the top of the sidebar of any entry blueprint: ![screenshot of copy review url button](https://github.com/transformstudios/statamic-review/raw/main/img/Copy%20URL%20Button.png "Copy Review URL Button")

**Please note:**

* Button will only work if the site is served via `https`.
* URLs are public, anyone can view them.
* Once the content is published, visiting that URL redirects to the actual content, unless there is a working copy.
