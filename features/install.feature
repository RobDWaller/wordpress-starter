Feature: WordPress Install
    In order to install WordPress
    As a website admin
    I need to be able to visit the homepage and be taken through the install process

    Scenario: See Install Page
        Given I am on "/index.php"
        Then I am on "/wordpress/wp-admin/install.php"
        And I should see "Continue"
