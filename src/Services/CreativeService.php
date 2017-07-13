<?php

declare(strict_types=1);

/*
 * This file is part of Affilinet PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\AffilinetSdk\Services;

/**
 * Creative Web service.
 *
 * @see http://publisher.affili.net/Solutions/Webservices_Webservices.aspx?nr=1&pnp=57#Creative
 */
class CreativeService extends AbstractService
{
    /** @var string */
    const TYPE = 'Publisher';

    /** @var string */
    const WSDL = 'https://api.affili.net/V2.0/PublisherCreative.svc?wsdl';
}
