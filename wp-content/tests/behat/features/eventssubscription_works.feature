@eventsubscription
Feature: As a visitor I Should come on homepage and subscribe to events
Scenario: Home page loads
Given I am on the homepage
Then I should see "Stay in the know about Knotel events and news"
When I fill in "first-name-sub" with "Hanney"
When I fill in "last-name-sub" with "Sharma"
When I fill in "your-email-sub" with "shanney@teqmavens.com"
When press "SUBSCRIBE"

Then I should see text matching "Thanks! We'll be in touch soon"
