<?php


declare(strict_types=1);

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
 * Product Web service.
 *
 * @link http://publisher.affili.net/Solutions/Webservices_Webservices.aspx?nr=1&pnp=57#Product_Product
 */
class ProductService extends AbstractService
{
    /** @var string */
    const TYPE = 'Product';

    /** @var string */
    const WSDL = 'https://product-api.affili.net/V3/WSDLFactory/Product_ProductData.wsdl';
}
