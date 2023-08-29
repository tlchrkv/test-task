<?php

declare(strict_types=1);

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Organization\Converter\XmlJsonConverter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class ConverterController extends Controller
{
    public function __construct(private readonly XmlJsonConverter $xmlJsonConverter) {}

    public function __invoke(Request $request): Response
    {
        return response(($this->xmlJsonConverter)($request->request->get('data')))
            ->header('Content-type', 'application/json');
    }
}
