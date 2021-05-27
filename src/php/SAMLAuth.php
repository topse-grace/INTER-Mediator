<?php

/**
 * INTER-Mediator
 * Copyright (c) INTER-Mediator Directive Committee (http://inter-mediator.org)
 * This project started at the end of 2009 by Masayuki Nii msyk@msyk.net.
 *
 * INTER-Mediator is supplied under MIT License.
 * Please see the full license for details:
 * https://github.com/INTER-Mediator/INTER-Mediator/blob/master/dist-docs/License.txt
 *
 * @copyright     Copyright (c) INTER-Mediator Directive Committee (http://inter-mediator.org)
 * @link          https://inter-mediator.com/
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace INTERMediator;

use INTERMediator\DB\Proxy;
use SimpleSAML\Auth\Simple;

class SAMLAuth
{
    private $authSimple;

    public function __construct($authSource)
    {
        $this->authSimple = new Simple($authSource);
    }

    public function samlLoginCheck()
    {
        if ($this->authSimple->isAuthenticated()) {
            $attributes = $this->authSimple->getAttributes();
            return $attributes["uid"][0];
        }
        return false;
    }

    public function samlLoginURL($url = null)
    {
        return $this->authSimple->getLoginURL($url);
    }

    public function samlLogoutURL($url = null)
    {
        return $this->authSimple->getLogoutURL($url);
    }
}