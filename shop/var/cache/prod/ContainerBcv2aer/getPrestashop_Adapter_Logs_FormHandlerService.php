<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.adapter.logs.form_handler' shared service.

return $this->services['prestashop.adapter.logs.form_handler'] = new \PrestaShop\PrestaShop\Core\Form\FormHandler(${($_ = isset($this->services['form.factory']) ? $this->services['form.factory'] : $this->load('getForm_FactoryService.php')) && false ?: '_'}->createBuilder(), ${($_ = isset($this->services['prestashop.core.hook.dispatcher']) ? $this->services['prestashop.core.hook.dispatcher'] : $this->getPrestashop_Core_Hook_DispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.logs.form_provider']) ? $this->services['prestashop.adapter.logs.form_provider'] : $this->load('getPrestashop_Adapter_Logs_FormProviderService.php')) && false ?: '_'}, ['logs_by_email' => 'PrestaShopBundle\\Form\\Admin\\Configure\\AdvancedParameters\\Logs\\LogsByEmailType'], 'LogsPage');
