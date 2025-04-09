<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomainCreateRequest;
use App\Models\Domain;
use App\Services\DomainService;

readonly class DomainController
{

    public function __construct(private DomainService $domainService)
    {}
    public function store(DomainCreateRequest $request)
    {
        $domain = $this->domainService->formatDomain($request->domain);
        if ($this->domainService->validateUniqueDomain($domain)) {
            return redirect()->back()->with('error', 'Domain already exists');
        }

        auth()->user()->domains()->create(['domain' => $domain]);

        return redirect()->back()->with('success', 'Domain added successfully!');
    }

    public function update(DomainCreateRequest $request, Domain $domain)
    {
        $formatted = $this->domainService->formatDomain($request->domain);

        if (
            $domain->domain !== $formatted &&
            !$this->domainService->validateUniqueDomain($formatted)
        ) {
            return redirect()->back()->with('error', 'Domain already exists');
        }

        $domain->update(['domain' => $formatted]);

        return redirect()->back()->with('success', 'Domain updated successfully!');
    }


    public function destroy(Domain $domain)
    {
        $domain->delete();
        return redirect()->back()->with('success', 'Domain added successfully!');;
    }
}
