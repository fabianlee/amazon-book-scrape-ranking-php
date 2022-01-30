** Used to insert amazon book ranking into mysql database


*** Enabling scrape on Wordpress host

put into cron, executed in this order at least 10 minutes apart:

/usr/bin/php5 /home/xxxxxx/scrape-amazon-book-page.php
/home/xxxxxx/parse_book_ranking.sh
/usr/bin/php5 /home/xxxxxx/insert-ranking-into-mysql.php

do not put these files into public_html, they go into home directory where they cannot be executed by end users.


*** Displaying Charts in WordPress

Wordpress plugin "SQL Chart Builder" by Guaven Labs can create graph for multiple category rankings:

sql:
select thedate,ranking from book_ranking where category="Category1" order by thedate asc;
select thedate,ranking from book_ranking where category="Category2" order by thedate asc;

label for x: thedate
sql for x: thedate
label for y: category1,category2
sql for y: ranking

paste shortcode to chart into Post/Page
