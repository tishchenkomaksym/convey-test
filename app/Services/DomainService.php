<?php

namespace App\Services;

use App\Models\Domain;

class DomainService
{

    public function formatDomain(mixed $domain): string
    {
        $cleanDomain = strtolower(parse_url($domain, PHP_URL_HOST) ?? $domain);
        return preg_replace('/^www\./', '', $cleanDomain);
    }
    public function validateUniqueDomain($domain): bool
    {
        $cleanDomain = $this->formatDomain($domain);
        if (Domain::where('domain', $cleanDomain)->exists()) {
            return true;
        }

        return false;
    }

}
