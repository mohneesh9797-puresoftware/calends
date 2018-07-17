<?php

namespace Zephir\Optimizers\FunctionCall;

use Zephir\Call;
use Zephir\CompilationContext;
use Zephir\CompiledExpression;
use Zephir\Optimizers\OptimizerAbstract;
use Zephir\Compiler\CompilerException;

class CalendsCalendarListRegisteredOptimizer extends OptimizerAbstract
{
    public function optimize(array $expression, Call $call, CompilationContext $context)
    {
        if (array_key_exists('parameters', $expression)) {
            throw new CompilerException("'Calends_calendar_registered' doesn't accept any parameters", $expression);
        }

        /**
         * Process the expected symbol to be returned
         */
        $call->processExpectedReturn($context);
        $symbolVariable = $call->getSymbolVariable(true, $context);
        if ($symbolVariable->isNotVariable()) {
            throw new CompilerException("Return value can only be assigned to variant variables", $expression);
        }
        $context->headersManager->add('wrap_libcalends');
        $context->headersManager->add('kernel/string');
        $symbolVariable->setDynamicTypes('string');
        if ($call->mustInitSymbolVariable()) {
            $symbolVariable->initVariant($context);
        }
        $symbol = $context->backend->getVariableCode($symbolVariable);
        $context->codePrinter->output($symbolVariable->getRealName() . ' = ext_Calends_calendar_list_registered();');
        return new CompiledExpression('variable', $symbolVariable->getRealName(), $expression);
    }
}