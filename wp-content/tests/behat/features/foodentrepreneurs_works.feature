@joineventmailinglist
Feature: As a visitor I should be able to load foodentrepreneurs on Filling First Name ,
 Last Name and Email after clicking SUBSCRIBE i should see  Thank you for your message. It has been sent. 
Scenario: Home page loads
Given I am on the homepage
When I go to "event-detail/?event=boostyourbrand"
Then I should see "Join Our Events Mailing List"
When I fill in "first-name-event" with "Ravi"
When I fill in "last-name-event" with "kumar"
When I fill in "your-email-event" with "rkcosmo1990@gmail.com"
When press "SUBSCRIBE"
Then I should see text matching "Thank you for your message. It has been sent."
