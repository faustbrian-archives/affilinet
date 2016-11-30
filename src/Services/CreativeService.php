<?php

/*
 * This file is part of Affili.net PHP SDK.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Affilinet\Services;

/**
 * Creative Web service.
 *
 * @link http://publisher.affili.net/Solutions/Webservices_Webservices.aspx?nr=1&pnp=57#Creative
 */
class CreativeService extends AbstractService
{
    /** @var string */
    const TYPE = 'Publisher';

    /** @var string */
    const WSDL = 'https://api.affili.net/V2.0/PublisherCreative.svc?wsdl';
}
