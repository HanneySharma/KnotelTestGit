@press
Feature: Check all pages load successfully
Scenario: All page load successfully
Given I am on the homepage
Then I should see "Spaces We Offer"
When I go to "press/"
Then I should see text matching "Knotel in the News"
When I go to "about-us/"
Then I should see text matching "About us"
When I go to "terms/"
Then I should see text matching "Terms"
When I go to "tenant-reps/"
Then I should see text matching "TENANT REPRESENTATIVES"
When I go to "broker-terms/"
Then I should see text matching "BROKER PARTNERSHIP PROGRAM"


When I go to "plaza/"
Then I should see text matching "PLAZA DISTRICT"

When I go to "grand-central/"
Then I should see text matching "Madison Ave & 47th ST"

When I go to "times-square/"
Then I should see text matching "TIMES SQUARE"

When I go to "bryant/"
Then I should see text matching "22 W 38TH ST"

When I go to "herald-square/"
Then I should see text matching "875 6TH AVE"

When I go to "chelsea/"
Then I should see text matching "114 W 26TH ST"


When I go to "madison/"
Then I should see text matching "25 WEST 26TH ST"

When I go to "park-ave-south/"
Then I should see text matching "475 PARK AVE S"

When I go to "qlabs/"
Then I should see text matching "16 W 22ND ST"


When I go to "meatpacking/"
Then I should see text matching "MEATPACKING"


When I go to "union-sq-1/"
Then I should see text matching "33 W 17TH ST"

When I go to "union-sq-2/"
Then I should see text matching "50 W 17TH ST"

When I go to "cooper-square/"
Then I should see text matching "30 COOPER SQ"


When I go to "houston/"
Then I should see text matching "116 W HOUSTON ST"


When I go to "bedford/"
Then I should see text matching "209 North 8TH ST"


When I go to "lower-east-side/"
Then I should see text matching "LOWER EAST SIDE"

When I go to "fidi/"
Then I should see text matching "FINANCIAL DISTRICT"

When I go to "battery/"
Then I should see text matching "1 STATE ST"

When I go to "dumbo/"
Then I should see text matching "68 JAY ST"

When I go to "gowanus/"
Then I should see text matching "473 PRESIDENT ST"
