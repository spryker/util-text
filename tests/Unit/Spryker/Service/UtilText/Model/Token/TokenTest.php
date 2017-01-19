<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Unit\Spryker\Service\UtilText\Model\Token;

use PHPUnit_Framework_TestCase;
use Spryker\Service\UtilText\Model\Token\Token;

/**
 * @group Unit
 * @group Spryker
 * @group Service
 * @group UtilText
 * @group Model
 * @group Token
 * @group TokenTest
 */
class TokenTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testGenerateTokenMustReturnString()
    {
        $tokenService = new Token();
        $token = $tokenService->generate('token');

        $this->assertInternalType('string', $token);
    }

    /**
     * @return void
     */
    public function testCheckTokenMustReturnTrueIfTokenIsValid()
    {
        $tokenService = new Token();
        $rawToken = 'token';
        $token = $tokenService->generate($rawToken);

        $isValid = $tokenService->check($rawToken, $token);
        $this->assertTrue($isValid);
    }

    /**
     * @return void
     */
    public function testCheckTokenMustReturnFalseIfTokenIsInValid()
    {
        $tokenService = new Token();
        $rawToken = 'token';
        $token = $tokenService->generate($rawToken);

        $isValid = $tokenService->check('wrong' . $rawToken, $token);
        $this->assertFalse($isValid);
    }

}
