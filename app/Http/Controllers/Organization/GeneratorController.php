<?php

declare(strict_types=1);

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Organization\Converter\ArrayXmlConverter;
use App\Models\Organization\Generator;
use Illuminate\Http\Request;

final class GeneratorController extends Controller
{
    public function __construct(
        private readonly Generator $generator,
        private readonly ArrayXmlConverter $arrayXmlConverter
    ) {}

    public function __invoke(Request $request)
    {
        $organizations = ($this->generator)($request->query->getInt('count'));

        return response(($this->arrayXmlConverter)($organizations))
            ->header('Content-type', 'application/xml');
    }
}
