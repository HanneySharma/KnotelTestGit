@pagesnotfound
Feature: As a visitor I Should come on homepage and subscribe to events
Scenario: Home page loads

Given I am on the homepage
Then I should see text matching "Our Locations"
Then I should not see text matching "Oops, looks like there's nothing here."

When I go to "event-detail/?event=foodentrepreneurs"
Then I should see text matching "Use the RSVP button."
Then I should not see text matching "Oops, looks like there's nothing here."

When I go to "about-us/"
Then I should see text matching "About us"
Then I should not see text matching "Oops, looks like there's nothing here."

When I go to "tttttttt/"
Then I should not see text matching "Oops, looks like there's nothing here."








