## Insert amazon book ranking into MySQL database for WordPress

These various scripts would be used on a shared VPS running Wordpress to:
  * Scrape an Amazon book page
  * Parse out its rankings
  * Insert these rankings into the Wordpress MySQL database
  * Present these ranking as a chart using a WordPress Plugin

### Enabling scrape on Wordpress host

put these into cron, executed in this order at least 10 minutes apart:

	/usr/bin/php5 /home/xxxxxx/scrape-amazon-book-page.php
	/home/xxxxxx/parse_book_ranking.sh > /home/xxxxxx/todays_amazon_ranking.csv
	/usr/bin/php5 /home/xxxxxx/insert-ranking-into-mysql.php

Do not put these files into public_html, they go into home directory where they cannot be executed by end users.
Replace the references to '/home/xxxxx' with your actual home directory.
Place the DB credentials into insert-ranking-into-mysql.php.


### Displaying Charts in WordPress

Wordpress plugin [SQL Chart Builder](https://wordpress.org/plugins/sql-chart-builder/) by Guaven Labs can create graph for multiple category rankings:

	sql:
	select thedate,ranking from book_ranking where category="Category1" order by thedate asc;
	select thedate,ranking from book_ranking where category="Category2" order by thedate asc;

	label for x: thedate
	sql for x: thedate
	label for y: category1,category2
	sql for y: ranking

paste shortcode to chart into Post/Page
