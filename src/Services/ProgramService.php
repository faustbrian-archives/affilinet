<?php



declare(strict_types=1);



namespace BrianFaust\Affilinet\Services;

/**
 * Program Web service.
 *
 * @link http://publisher.affili.net/Solutions/Webservices_Webservices.aspx?nr=1&pnp=55#list
 */
class ProgramService extends AbstractService
{
    /** @var string */
    const TYPE = 'Publisher';

    /** @var string */
    const WSDL = 'https://api.affili.net/V2.0/PublisherProgram.svc?wsdl';
}
