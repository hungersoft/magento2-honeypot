<?php
/**
 * Copyright 2019 Hungersoft (http://www.hungersoft.com).
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace HS\Honeypot\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use HS\Honeypot\Model\System\Config\Source\Forms;

class Data extends AbstractHelper
{
    const CONFIG_ENABLED = 'hs_honeypot/general/enabled';
    const CONFIG_FORMS = 'hs_honeypot/general/forms';
    const CONFIG_CUSTOM_FORMS = 'hs_honeypot/general/custom_forms';

    private $formActionSelectors = [
        Forms::TYPE_LOGIN => 'body.customer-account-login #login-form.form.form-login',
        Forms::TYPE_CREATE => 'body.customer-account-create #form-validate.form-create-account',
        Forms::TYPE_FORGOT => '#form-validate.form.password.forget',
        Forms::TYPE_CONTACT => '#contact-form',
        Forms::TYPE_CHANGE_PASSWORD => '#form-validate.form.form-edit-account',
        Forms::TYPE_PRODUCT_REVIEW => '#review-form',
    ];

    /**
     * Currently selected store ID if applicable.
     *
     * @var int
     */
    protected $_storeId = null;

    /**
     * Get config value by path.
     *
     * @param string $path
     *
     * @return mixed
     */
    public function getConfigValue($path)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Get config flag by path.
     *
     * @param string $path
     *
     * @return bool
     */
    public function getConfigFlag($path)
    {
        return $this->scopeConfig->isSetFlag($path, ScopeInterface::SCOPE_STORE, $this->_storeId);
    }

    /**
     * Return true if active and false otherwise.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->getConfigFlag(self::CONFIG_ENABLED);
    }

    /**
     * Get selected forms.
     *
     * @return array
     */
    public function getForms($store = null)
    {
        $forms = $this->scopeConfig->getValue(
            self::CONFIG_FORMS,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $store
        );

        $forms = explode(',', $forms) ?: [];
        if (!is_array($forms)) {
            return [trim($forms)];
        }

        return array_map('trim', $forms);
    }

    /**
     * Get selected forms.
     *
     * @return array
     */
    public function getCustomForms()
    {
        $data = $this->scopeConfig->getValue(
            self::CONFIG_CUSTOM_FORMS,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        return json_decode($data, true) ?: [];
    }

    /**
     * Get css selectors for the selected forms.
     *
     * @return array
     */
    public function getSelectedFormSelectors()
    {
        $forms = $this->getForms();
        $finalForms = [];
        foreach ($forms as $action) {
            if (isset($this->formActionSelectors[$action])) {
                $finalForms[] = $this->formActionSelectors[$action];
            }
        }

        return $finalForms;
    }

    /**
     * Get selected forms paths.
     *
     * @return array
     */
    public function getFormSelectors()
    {
        $forms = $this->getSelectedFormSelectors();
        $customForms = array_column($this->getCustomForms(), 'selector');

        return array_merge($forms, $customForms);
    }

    /**
     * Get selected form actions.
     *
     * @return array
     */
    public function getFormActions()
    {
        $forms = $this->getForms();
        $customForms = array_column($this->getCustomForms(), 'action');

        return array_merge($forms, $customForms);
    }
}
