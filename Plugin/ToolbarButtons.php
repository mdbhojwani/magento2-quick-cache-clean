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

use Magento\Backend\Block\Cache;
use Magento\Backend\Block\Widget\Button\ButtonList;
use Magento\Backend\Block\Widget\Button\Toolbar;
use Magento\Framework\View\Element\AbstractBlock;

/**
 * Class ToolbarButtons
 */
class ToolbarButtons
{
    /**
     * @param Toolbar $subject
     * @param AbstractBlock $context
     * @param ButtonList $buttonList
     * @return array
     */
    public function beforePushButtons(
        Toolbar $subject,
        AbstractBlock $context,
        ButtonList $buttonList
    ) {
        if ($context instanceof Cache) {
            $url = $context->getUrl('adminhtml/quickCache/refresh');

            $message = __('Are you sure that you want to refresh the cache?');
            $buttonList->add(
                'flush_invalidated_cache',
                [
                    'label' => __('Flush Invalidated Cache(s)'),
                    'onclick' => 'confirmSetLocation(\'' . $message . '\', \'' . $url . '\')',
                    'class' => 'flush-cache-storage'
                ],
                0,
                -1
            );
        }
        return [$context, $buttonList];
    }
}
