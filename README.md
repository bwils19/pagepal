## Book Club App

I will try to add elements of the google doc to this markdown file over time (about app, TODOs, general ideas, table structure).

WEB APP: https://infinite-beyond-05850-58f77000e905.herokuapp.com/index.html

* I need to have the Heroku dyno up and running to try this
* REF: https://devcenter.heroku.com/articles/getting-started-with-php
* You may need to create your own dyno (and Procfile) to work with this

### Running Heroku App

I can't keep my own dyno up at all times due to usage costs, I will try to keep it running more often when we are closer to the due date. I would start with just reviewing this article to get it up and running on your own dyno: https://devcenter.heroku.com/articles/getting-started-with-php. I am not sure how necessary this is as we may be fine with GitHub pages.

I have moved a lot of the code to public/ so it matches up with the `Procfile` deployment path (i.e. index.html needs to be in public/).

After pushing code to your branch (or main) run:

```term
git push heroku main
```

or 

```term
git push heroku <branch name>:main
```

then run 

```term
heroku open
```

then enter the URL:

`https://infinite-beyond-05850-58f77000e905.herokuapp.com/index.html`


I was able to login and register with how the app is currently set up in `script.js` in terms of the path. I still need to experiment with if the PHP paths would work with the GitHub pages url vs the heroku url. Something like: `https://ConorMeade.github.io/CS120-Book-Club/register.php`

### Notes and Lingering Questions/TODOs

- I have found supabase to host our database: https://supabase.com. We are given a postgres db instance. A lot of it looks to be set up to use JS primarily, so I am looking into ways we can connect using php.
- It looks like we will need at the minimum php and composer installed: https://getcomposer.org/
- Setting environemt variables up both locally and on GitHub (Actions)
- Looking more into Laravel framework, probably too much for this project time frame but good for inspiration/package usage.
- Connecting to remote database locally (using WAMP, XAMPP, etc. to run php code that will then connect to supabase db). How does this change when we are hosting on GitHub?
- Keeping PHP database connection open while user is on the site. I think calling pg_connect() in each given php script will be fine but worth keeping this in mind.
