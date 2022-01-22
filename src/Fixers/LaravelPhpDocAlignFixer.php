<?php

namespace MattAllan\LaravelCodeStyle\Fixers;

use PhpCsFixer\DocBlock\TypeExpression;
use PhpCsFixer\Fixer\FixerInterface;
use PhpCsFixer\FixerDefinition\CodeSample;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;
use SplFileInfo;

class LaravelPhpDocAlignFixer implements FixerInterface
{
    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isAnyTokenKindsFound([\T_DOC_COMMENT]);
    }

    public function isRisky(): bool
    {
        return false;
    }

    public function fix(SplFileInfo $file, Tokens $tokens): void
    {
        for ($index = $tokens->count() - 1; $index > 0; $index--) {
            if (! $tokens[$index]->isGivenKind([\T_DOC_COMMENT])) {
                continue;
            }

            $newContent = preg_replace_callback(
                '/(?P<tag>@param)\s+(?P<hint>(?:'.TypeExpression::REGEX_TYPES.')?)\s+(?P<var>(?:&|\.{3})?\$\S+)/ux',
                function ($matches) {
                    return $matches['tag'].'  '.$matches['hint'].'  '.$matches['var'];
                },
                $tokens[$index]->getContent()
            );

            if ($newContent === $tokens[$index]->getContent()) {
                continue;
            }

            $tokens[$index] = new Token([\T_DOC_COMMENT, $newContent]);
        }
    }

    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition('After @param must be two spaces and after the Type Definition must also be two spaces.', [
            new CodeSample('<?php
/**
 * @param string $foo
 * @param  string  $bar
 * @return string
 */
function a($foo, $bar) {}
'),
        ]);
    }

    public function getName(): string
    {
        return 'LaravelCodeStyle/laravel_phpdoc_align';
    }

    public function getPriority(): int
    {
        return -100;
    }

    public function supports(SplFileInfo $file): bool
    {
        return true;
    }
}
