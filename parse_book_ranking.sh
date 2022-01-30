#!/bin/bash
# 
# reads local html book page that has been scraped from amazon
# and parses out book rankings in categories
#
# Most commonly written to file so that php can read and import into DB
# /parse_book_ranking.sh > /home/xxxxx/todays_amazon_ranking.csv
#

date_yymmdd=$(date '+%F %H:%M:%S')

webfile=/home/xxxxxx/amazon-book-page.html
[ -f $webfile ] || { echo "ERROR locally scraped book page $webfile does not exist"; exit 1; }

# ranking is all found on one line
ranking_line=$(grep -P "Best Sellers Rank:" $webfile)

top_rank=$(echo $ranking_line | grep -Po "#\K([^ ]*)(?= in Books \()" | tr -d ,)
echo "$date_yymmdd,$top_rank,Books"
while read -r line; do
  echo "$date_yymmdd,$line"
done < <(echo $ranking_line | grep -Po "#\K([^ ]*)(?= in <a href='.*?'>)(.*?)(?=</a>)" | sed 's/ in <a href=.*.>/;/' | tr -d , | sed 's/;/,/')
