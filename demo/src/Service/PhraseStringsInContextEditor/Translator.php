<?php

namespace App\Service\PhraseStringsInContextEditor;

use Symfony\Bundle\FrameworkBundle\Translation\Translator as BaseTranslator;
use Symfony\Component\DependencyInjection\Attribute\When;
use Symfony\Component\Translation\MessageCatalogueInterface;
use Symfony\Component\Translation\TranslatorBagInterface;
use Symfony\Contracts\Translation\LocaleAwareInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

#[When(env: 'dev')]
class Translator implements TranslatorInterface, TranslatorBagInterface, LocaleAwareInterface
{
    private BaseTranslator $translator;

    private bool $isPhraseEnabled = true;
    private string $phrasePrefix = '{{__';
    private string $phraseSuffix = '__}}';

    public function __construct(BaseTranslator $translator)
    {
        $this->translator = $translator;
    }
    
    /**
     * Translates accordingly based on if Phrase is enabled or not.
     */
    public function trans(?string $id, array $parameters = [], string $domain = null, string $locale = null): string
    {
        if ($this->isPhraseEnabled) return $this->getPhraseStringsKey($id);

        return $this->translator->trans($id, $parameters, $domain, $locale);
    }

    /**
     * Converts the Id to a PhraseStrings-compatible Id.
     */
    protected function getPhraseStringsKey(?string $id): string
    {
        if (!$id) return '';

        return $this->phrasePrefix . 'phrase_' . $id . $this->phraseSuffix;
    }

    // below functions are needed due to the interfaces and do not have any custom logic
    public function getLocale(): string
    {
        return $this->translator->getLocale();
    }

    public function setLocale(string $locale)
    {
        return $this->translator->setLocale($locale); 
    }

    public function getCatalogue(string $locale = null): MessageCatalogueInterface
    {
        return $this->translator->getCatalogue($locale);
    }

    public function getCatalogues(): array
    {
        return $this->translator->getCatalogues();
    }
}
