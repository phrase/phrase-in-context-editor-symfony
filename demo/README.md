# Demo Symfony Application with Phrase Strings In-Context Editor

This demo application uses Symfony version 6.3.10.

## Prerequisites
* PHP 8.2 or higher
* Symfony CLI

See [Symfony docs re: technical requirements](https://symfony.com/doc/current/setup.html#technical-requirements)

## Installation
1. Git clone the base repository and cd into this folder
   ```bash
   git clone git@github.com:phrase/phrase-symfony2.git
   cd phrase-symfony/demo
   ```

2. Install dependencies
   ```bash
   symfony composer install
   ```

3. Start up the server
   ```bash
    symfony server:start
   ```

4. Go to [http://localhost:8000](http://localhost:8000) to see the application
   
5. Login using your trial account.

6. Start playing around with the In-Context Editor to translate directly on the webpage!

### Set up with your Phrase trial account

This demo requires a [Phrase](https://phrase.com) trial account. To use this demo:

1. Sign up for a free trial at [https://eu.phrase.com/](https://eu.phrase.com/)
2. After creating your trial account, note your **Account ID** and **Project ID**
3. Update the `projectId` and `accountId` values in the demo configuration to match your trial account credentials

These IDs can be found in your Phrase account settings after you've created a project.