![Hungersoft.com](https://www.hungersoft.com/skin/front/custom/images/logo.png)

# Honeypot [M2]
**hs/module-honeypot**

Hungersoft's [Honeypot](https://www.hungersoft.com/p/magento2-honeypot) extension adds a honeypot field to block spam form submissions.

## Installation

```sh
composer config repositories.hs-module-all vcs https://github.com/hungersoft/module-all.git
composer config repositories.hs-module-honeypot vcs https://github.com/hungersoft/magento2-honeypot.git
composer require hs/module-honeypot:dev-master

php bin/magento module:enable HS_All HS_Honeypot
php bin/magento setup:upgrade
```

**Note:** Make sure you've installed our Base extension. The above commands already include it, but if you haven't, you can find it [here](https://github.com/hungersoft/module-all)

## Support

Magento 2 Honeypot extension is provided for free by Hungersoft. Feel free to contact Hungersoft at support@hungersoft.com if you are facing any issues with this extension. Reviews, suggestions and feedback will be greatly appreciated.
