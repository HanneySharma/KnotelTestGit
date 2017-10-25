@salesforce
Feature: As a visitor I Should come on homepage and subscribe to salesforce
Scenario: Home page loads
Given I am on the homepage

Then I should see "Book a Tour Now"

When I fill in "book_first_name" with "testf"
When I fill in "book_first_last" with "testl"
When I fill in "book_company_name" with "testing"
When I fill in "book_email" with "shanney@teqmavens.com"
When I fill in "book_phone" with "9874563214"
When I fill in "book_size" with "12"
When I fill in "book_location" with "Flatiron"
When press "salesforceBtn"
Then I wait for the message to appear
Then I should see text matching "Thanks! We'll be in touch soon"
