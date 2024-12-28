<?php
/**
 * @category Mdbhojwani
 * @package Mdbhojwani_QuickCacheClean
 * @author Manish Bhojwani <manishbhojwani3@gmail.com>
 * @github https://github.com/mdbhojwani
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
declare(strict_types=1);

namespace Mdbhojwani\QuickCacheClean\Plugin;

use Magento\AdminNotification\Model\System\Message\CacheOutdated;
use Magento\Framework\UrlInterface;

/**
 * Class CacheOutdatedMessage
 */
class CacheOutdatedMessage
{
    /**
     * @var UrlInterface
     */
    private $_urlBuilder;

    /**
     * CacheOutdated constructor.
     * @param UrlInterface $_urlBuilder
     */
    public function __construct(
        UrlInterface $_urlBuilder
    ) {
        $this->_urlBuilder = $_urlBuilder;
    }

    public function afterGetText(CacheOutdated $subject, $result)
    {
        $parts = explode(".", $result);
        $url = $this->_urlBuilder->getUrl('adminhtml/quickCache/refresh');
        $result = $parts[0]. __('. Please <a id="quick-cache-clean" href="%1">Click Here</a> to refresh them instantly.', $url);
        return $result;
    }
}
