<?php

namespace Acme\YourBundle\Translation;

use Symfony\Bundle\FrameworkBundle\Translation\Translator as BaseTranslator;

class PhraseTranslator extends BaseTranslator
{
    
    /**
     * {@inheritdoc}
     */
    public function trans($id, array $parameters = array(), $domain = 'messages', $locale = null)
    {
        return parent::trans($this->transformId($id, $domain), $parameters, $domain, $locale);
    }

    /**
     * {@inheritdoc}
     */
    public function transChoice($id, $number, array $parameters = array(), $domain = null, $locale = null)
    {
        return parent::transChoice($this->transformId($id, $domain), $number, $parameters, $domain, $locale);
    }

    /**
     * Converts the Id to a PhraseApp-compatible Id
     * Skips the `routes` domain as per documentation
     *
     * @param int $id
     * @param int $domain
     * @return string
     */
    protected function transformId($id, $domain)
    {
        if ($domain == 'routes') {
            return $id;
        }

        return "{{__phrase_" . $id . "__}}";
    }
    
}
