# Phrase In-Context Editor for Symfony2

The Symfony2 adapter lets you to connect the [Phrase In-Context Editor](https://help.phrase.com/translate-website-and-app-content/use-in-context-editor-to-translate/translate-directly-on-your-website) to your Symfony2 application.

For more information, read the [documentation](https://help.phrase.com/).

## Installation ##

We recommend creating a new environment in which the In-Context Editor is available. Let's call the new environment "translation":

Start by creating a new configuration file:

    # app/config/config_translation.yml
    imports:
        - { resource: config.yml }
    parameters:
        translator.class: Acme\YourBundle\Translation\PhraseTranslator

The environment should be accessible in the browser, so we should create a front controller for it:

    # web/app_translation.php
    <?php

    require_once __DIR__.'/../app/bootstrap.php.cache';
    require_once __DIR__.'/../app/AppKernel.php';

    use Symfony\Component\HttpFoundation\Request;

    $kernel = new AppKernel('translation', false);
    $kernel->handle(Request::createFromGlobals())->send();

Add the "PhraseTranslator" class to your bundle. It will override the standard translation method to expose the translation keys to the In-Context Editor.

When everything is in place, add the JavaScript snippet to your layout:

    # Acme/YourBundle/Resources/views/layout.html.twig
    {% if app.environment == 'translation' %}
    <script>
    window.PHRASEAPP_CONFIG = {
        projectId: "YOUR-PROJECT-ID"
    };
    (function() {
        var phraseapp = document.createElement('script'); phraseapp.type = 'text/javascript'; phraseapp.async = true;
        phraseapp.src = ['https://', 'phrase.com/assets/in-context-editor/2.0/app.js?', new Date().getTime()].join('');
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(phraseapp, s);
    })();
    </script>
    {% endif %}

You can find your Project-ID in the Phrase Translation Center.

Your application is connected to the In-Context Editor. Reload your application to start the translation process!

### More Information ###

* https://phrase.com/
* https://help.phrase.com/

*The code in this tutorial was originally created by Malte Marx from [marxbeck](http://www.marxbeck.de)*

## Get help / support

Please contact [support@phrase.com](mailto:support@phrase.com?subject=[GitHub]%20) and we can take more direct action toward finding a solution.
