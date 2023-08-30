## About StreamEvents
An application called "Stream Events". This application is aimed at showing streamers a list of events that happened during their stream. 

## Registration:
Users should be able to create an account through your preferred oauth login system, this can be anything from Twitch, Youtube, Facebook, etc..

## Requirements:
- Create the following tables:
  - followers (name)
  - subscribers (name + subscription tier 1/2/3)
  - donations (amount + currency + donation message)
  - merch_sales (item name + amount + price)
- Seed each table with about 300-500 rows of data for each user with creation dates ranging from 3 months ago till now
- Each of these rows should be able to be marked as read / unread by the user
- Aggregate the data from the above three tables 
  - Show it to the user once they log in
  - Use a single list to display this information, format it as a sentence
    - RandomUser1 followed you!
    - RandomUser2 (Tier1) subscribed to you!
    - RandomUser3 donated 50 USD to you!
      "Thank you for being awesome"
    - RandomUser4 bought some fancy pants from you for 30 USD!
  - Only show the first 100 events
  - Load more as they scroll down
- Above the list show three squares with the following information
- Total revenue they made in the past 30 days from Donations, Subscriptions & Merch sales
  - Subscriptions are Tier1: 5$ , Tier2: 10$, Tier3: 15$
- Total amount of followers they have gained in the past 30 days
- Top 3 items that did the best sales wise in the past 30 days

## Technologies Used:
Laravel, npm, MySQL, Socialite, Sanctum, jQuery
