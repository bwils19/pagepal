## Book Club App

I will try to add elements of the google doc to this markdown file over time (about app, TODOs, general ideas, table structure).



### Notes and Lingering Questions/TODOs

- I have found supabase to host our database: https://supabase.com. We are given a postgres db instance. A lot of it looks to be set up to use JS primarily, so I am looking into ways we can connect using php.
- It looks like we will need at the minimum php and composer installed: https://getcomposer.org/
- Setting environemt variables up both locally and on GitHub (Actions) 
- Looking more into Laravel framework, probably too much for this project time frame but good for inspiration/package usage.
- Connecting to remote database locally (using WAMP, XAMPP, etc. to run php code that will then connect to supabase db). How does this change when we are hosting on GitHub?
- Keeping PHP database connection open while user is on the site. I think calling pg_connect() in each given php script will be fine but worth keeping this in mind.

