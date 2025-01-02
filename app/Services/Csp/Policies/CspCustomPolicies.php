<?php

namespace App\Services\Csp\Policies;

use Spatie\Csp\Policies\Policy;
use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;

class CspCustomPolicies extends Policy
{
    public function configure()
    {
        $this
            ->addDirective(Directive::BASE, Keyword::SELF)
            ->addDirective(Directive::CONNECT, [
                Keyword::SELF,
                'ka-p.fontawesome.com',
                'kit.fontawesome.com',
            ])
            ->addDirective(Directive::FORM_ACTION, Keyword::SELF)
            ->addDirective(Directive::IMG, [
                Keyword::SELF,
                'data:',
                'blob:',
            ])
            ->addDirective(Directive::MEDIA, Keyword::SELF)
            ->addDirective(Directive::SCRIPT, [
                Keyword::SELF,
                'www.google.com',
                'www.gstatic.com',
                'cdn.jsdelivr.net',
                'kit.fontawesome.com',
                'cdnjs.cloudflare.com',
                Keyword::UNSAFE_INLINE,
                'unsafe-eval', //Not safe, finding a way to fix this
            ])
            ->addDirective(Directive::STYLE, [
                Keyword::SELF,
                'ka-p.fontawesome.com',
                'fonts.googleapis.com',
                'cdnjs.cloudflare.com',
                'cdn.jsdelivr.net',
                Keyword::UNSAFE_INLINE,
            ])
            ->addDirective(Directive::OBJECT, Keyword::NONE)
            ->addDirective(Directive::FRAME, [
                Keyword::SELF,
                'www.google.com',
            ])
            ->addDirective(Directive::FRAME_ANCESTORS, Keyword::NONE)
            ->addDirective(Directive::MANIFEST, Keyword::SELF)
            ->addDirective(Directive::FONT, [
                Keyword::SELF,
                'ka-p.fontawesome.com',
                'fonts.gstatic.com',
                'fonts.googleapis.com',
                'cdn.jsdelivr.net',
                'cdnjs.cloudflare.com',
            ]);
    }
}
