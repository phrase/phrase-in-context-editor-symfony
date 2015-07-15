# phrase for Symfony2

The Symfony2 adapter for phrase enables you to use the [phrase translation management system](https://phraseapp.com) with your Symfony application.

For more information, read the documentation at [phraseapp.com/docs](https://phraseapp.com/docs).

## Installation ##

We recommend creating a new environment in which phrase is available. Let's call the new environment "translation":

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
    
Add the "PhraseTranslator" class to your bundle. It will override the standard translation method to expose the translation keys to phrase.

When everything is in place, you need to add the Javascript to your layout:

    # Acme/YourBundle/Resources/views/layout.html.twig
    {% if app.environment == 'translation' %}
    <script>
    window.PHRASEAPP_CONFIG = {
        projectId: "YOUR-PROJECT-ID"
    };
    (function() {
        var phraseapp = document.createElement('script'); phraseapp.type = 'text/javascript'; phraseapp.async = true;
        phraseapp.src = ['https://', 'phraseapp.com/assets/in-context-editor/2.0/app.js?', new Date().getTime()].join('');
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(phraseapp, s);
    })();
    </script>
    {% endif %}
    
You can find your Project-ID in the PhraseApp Translation Center.

Now your application is connected to phrase. You can now start pushing and pulling your translations. [See the documentation for more information](https://phraseapp.com/docs).

### More Information ###

* https://phraseapp.com/
* https://phraseapp.com/docs
* https://phraseapp.com/de/docs/installation/symfony2

*The code in this tutorial was originally created by Malte Marx from [marxbeck](http://www.marxbeck.de)*
