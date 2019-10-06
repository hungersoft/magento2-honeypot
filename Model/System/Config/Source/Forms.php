<?php
/**
 * @category  HS
 *
 * @copyright Copyright (c) 2015 Hungersoft (http://www.hungersoft.com)
 * @license   http://www.hungersoft.com/license.txt Hungersoft General License
 */

namespace HS\Honeypot\Model\System\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Forms implements ArrayInterface
{
    const TYPE_LOGIN = 'customer_account_loginPost';
    const TYPE_CREATE = 'customer_account_createpost';
    const TYPE_FORGOT = 'customer_account_forgotpasswordpost';
    const TYPE_CONTACT = 'contact_index_post';
    const TYPE_CHANGE_PASSWORD = 'customer_account_editPost';
    const TYPE_PRODUCT_REVIEW = 'review_product_post';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        foreach ($this->getOptions() as $value => $label) {
            $options[] = [
                'value' => $value,
                'label' => $label,
            ];
        }

        return $options;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return [
            self::TYPE_LOGIN => __('Login'),
            self::TYPE_CREATE => __('Create User'),
            self::TYPE_FORGOT => __('Forgot Password'),
            self::TYPE_CONTACT => __('Contact Us'),
            self::TYPE_CHANGE_PASSWORD => __('Change Password'),
            self::TYPE_PRODUCT_REVIEW => __('Product Review'),
        ];
    }
}
