# Phrase Strings In-Context Editor for Symfony

**phrase-in-context-editor-symfony** is the official adapter for integrating the [Phrase Strings In-Context Editor](https://support.phrase.com/hc/en-us/articles/5784095916188-In-Context-Editor-Strings) with your Symfony application.

## :scroll: Documentation

### Prerequisites

To use the In-Context Editor with your application you have to:

* Sign up for a Phrase account: [https://app.phrase.com/signup](https://app.phrase.com/signup)
* Use the [Symfony](https://symfony.com/) framework for PHP

**Note:** Version 2.0.0 supports Symfony 5 and up, along with a new version of the ICE. If you are using Symfony 2, 3, 4, please [check out to version 1.0.0 and follow the README there](https://github.com/phrase/phrase-in-context-editor-symfony/blob/v1.0.0/README.md).

### Demo

You can find a demo project in the `demo` folder, just follow [the README.md in that folder](https://github.com/phrase/phrase-in-context-editor-symfony/tree/master/demo) to start up the app and try out the In-Context Editor for Symfony. Feel free to check out the sample code too!

### Installation

Follow these steps to integrate the In-Context Editor with your Symfony application.

1. Copy `PhraseStringsInContextEditor` and its contents from this repository into your repository's `/src/Service` folder or wherever you would like to place it. Make sure to adjust the namespace accordingly if you decide to place it somewhere else.

2. Adjust `config/services.yaml` to decorate the `translator` service with our adapter:
   ```yaml
   services:
       ...
       App\Service\PhraseStringsInContextEditor\Translator:
           decorates: translator
   ```

3. Add this JavaScript snippet to your base or layout Twig template between the `{% block javascripts %}` so the In-Context Editor can read the webpage:
   ```js
   <script>
       window.PHRASEAPP_CONFIG = {
           accountId: '0bed59e5',
           projectId: '00000000000000004158e0858d2fa45c',
           datacenter: 'eu',
           origin: 'phrase-symfony',
       };
       (function() {
           var phrasejs = document.createElement('script');
           phrasejs.type = 'module';
           phrasejs.async = true;
           phrasejs.src = 'https://d2bgdldl6xit7z.cloudfront.net/latest/ice/index.js'
           var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(phrasejs, s);
       })();
   </script>
   ```

    You can find your Project-ID and Account-ID in the Phrase Translation Center.

4. Your application is now connected to the In-Context Editor. Reload your application and login with your Phrase credentials to start the translation process directly on your webpage!

### Development

#### Translate in Symfony with ICE
As our adapter is now decorating the translator service, you wTranslate as you would normally would in Symfony:

1. Through the `translator` service's `trans` method, e.g. translating from inside a controller:
   ```php
   $translated = $translate->trans('key_name');
   ```

2. Through the `trans` filter in a twig template:
   ```
   {{ 'key_name'|trans }}
   ```

See [Symfony docs on translations](https://symfony.com/doc/current/translation.html) for more details on how to handle translations.

#### Using the old version of ICE
 To use the old version of ICE, add the option `useOldICE: true` to your config in the JavaScript snippet:
 ```js
 window.PHRASEAPP_CONFIG = {
    accountId: '0bed59e5',
    projectId: '00000000000000004158e0858d2fa45c',
    datacenter: 'eu',
    origin: 'phrase-symfony',
    useOldICE: true,
 };
 ```

#### Using the US Datacenter with ICE
In addition to the settings in your config, set the US datacenter to enable it working with the US endpoints.
```js
    datacenter: 'us',
```

#### Setting the ICE for a Different Environment
If you want the ICE running on a different environment instead of `dev`, change the env on Line 12 in the Translator file:
```php
# PhraseStringsInContextEditor\Translator.php

#[When(env: 'dev')]
```

## :white_check_mark: Commits & Pull Requests

We welcome anyone who wants to contribute to our codebase, so if you notice something, feel free to open a Pull Request! However, we ask that you please use the [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/) specification for your commit messages and titles when opening a Pull Request.

Example: `chore: Update README`

## :question: Issues, Questions, Support

Please use [GitHub issues](https://github.com/phrase/Flask-Phrase/issues) to share your problem, and we will do our best to answer any questions or to support you in finding a solution.

## :books: Resources

* [Installing & Setting Up the Symfony Framework](https://symfony.com/doc/current/setup.html)
* [Localization Guides and Software Translation Best Practices](http://phrase.com/blog/)
* [Phrase Help Center](https://support.phrase.com/)
* [Contact Phrase Team](https://phrase.com/contact)
