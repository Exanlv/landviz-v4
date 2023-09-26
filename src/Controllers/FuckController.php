<?php

namespace Exan\Landviz\Controllers;

use Exan\Config\Config;
use Exan\InputParser\Exceptions\NoDriverException;
use Exan\InputParser\Parser;
use Exan\Landviz\ResponseBuilder;
use Exan\PhpFuck\Fucker;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FuckController extends Controller
{
    public function __construct(
        private readonly ResponseBuilder $responseBuilder,
        private readonly Config $config,
        private readonly Fucker $fucker,
        private readonly Parser $parser,
        private readonly ValidatorInterface $validator,
    ) {
    }

    public function form(RequestInterface $request)
    {
        return $this->responseBuilder->build($request, 'pages/fuck/form', [], false);
    }

    public function fuck(RequestInterface $request): ResponseInterface
    {
        try {
            $body = $this->parser->parse($request);
        } catch (NoDriverException) {
            $body = [];
        }

        /** @var ConstraintViolationListInterface */
        $violations = $this->validator->validate($body, new Collection([
            'code' => new Type('string'),
        ], allowMissingFields: true));

        $errors = array_map(fn (ConstraintViolationInterface $constraintViolation) => [
            'path' => $constraintViolation->getPropertyPath(),
            'message' => $constraintViolation->getMessage(),
        ], iterator_to_array($violations));

        if (count($errors)) {
            return $this->responseBuilder->build(
                $request,
                'pages/fuck/form',
                ['errors' => $errors]
            )->withStatus(400);
        }

        $default = 'echo "Hello, world", PHP_EOL;';

        $code = $body['code'] ?? $default;

        if ($code === '') {
            $code = $default;
        }

        return $this->responseBuilder->build($request, 'pages/fuck/display', ['code' => $this->fucker->fuckCode($code)]);
    }
}
