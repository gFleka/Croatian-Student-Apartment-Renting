##The Crawler Part

#####Crawler Setup
- In config.php set the url's of the sites you would like to crawl
- Make sure all of the files are in the same folder
- Set a cron job to run the crawler.php script on a time period you feel is fitting for your need (we use 2 day period)

#####API Setup
API for crawler is used to store the crawled data into MySQL database

API usage:
- Show phone numbers: GET /api/show

Description  | HTTP Method  | URL
------------- | ------------- | -------------
Show phone numbers  | GET | /api/show
Show insert syntax  | GET | /api/create
Save phone number  | POST | /api?telefon={number}
Save email adress | POST | /api?email={email}
Query for phone/email  | GET | /api/usporedi=telefon={number}&email={email}
