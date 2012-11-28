<?php

namespace Acme\YourBundle\Translation;

use Symfony\Bundle\FrameworkBundle\Translation\Translator as BaseTranslator;

class PhraseTranslator extends BaseTranslator
{
    
    public function trans($id, array $parameters = array(), $domain = 'messages', $locale = null)
    {
        $prefix = "{{__phrase_";
        $suffix = "__}}";

        if (!isset($locale)) {
            $locale = $this->getLocale();
        }

        if (!isset($this->catalogues[$locale])) {
            $this->loadCatalogue($locale);
        }

        if ($domain == 'routes') {
            return strtr($this->catalogues[$locale]->get((string) $id, $domain), $parameters);
        } else {
            return $prefix.$id.$suffix;
        }
    }
}
