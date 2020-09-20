<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use GoDaddyDomainsClient\ApiException;
use GoDaddyDomainsClient\Model\DNSRecord;
use Illuminate\Http\Request;
use App\Models\Site;

class DomainController extends Controller
{
    
    public function __construct()
    {
        $this->domain = env('GO_DADDY_DOMAIN');
        $this->apiKey = env('GO_DADDY_API_KEY');
        $this->apiSecret = env('GO_DADDY_API_SECRET');

        $this->configuration = new \GoDaddyDomainsClient\Configuration();
        $this->configuration->addDefaultHeader("Authorization", "sso-key " . $this->apiKey . ":" . $this->apiSecret);
        $this->configuration->setDebug(false);

        $this->apiClient = new \GoDaddyDomainsClient\ApiClient($this->configuration);
        $this->apiInstance = new \GoDaddyDomainsClient\Api\VdomainsApi($this->apiClient);
    }

    
    public function checkDnsZoneAvailability(Request $request)
    {
        $availability = Site::where('site_id', '=', "{$request->name}")
                            ->get();
        return response()->json($availability);
    }

    public function registerDnsZone(Request $request)
    {
        $record = new DNSRecord();
        $record->setType(DNSRecord::TYPE_CNAME);
        $record->setName($request->site_id);
        $record->setData('@');
        $record->setPriority(null);
        $record->setTtl(3600);
        $record->setService(null);
        $record->setProtocol(null);
        $record->setWeight(null);
        $records = [$record];
        try {
            $response = $this->apiInstance->recordAddWithHttpInfo($this->domain, $records);
            return response()->json($this->apiClient->getSerializer()->sanitizeForSerialization($response));
        } catch (ApiException $th) {
            return response()->json([
                'statusCode' => $th->getCode(),
            ]);
        }
    }
}
