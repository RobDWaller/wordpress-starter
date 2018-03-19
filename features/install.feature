Feature: WordPress Install
    In order to install WordPress
    As a website admin
    I need to be able to visit the homepage and be taken through the install process

    Scenario: See Install Page
        Given I am on "/index.php"
        When I press "Continue"
        Then I should see "Welcome"
