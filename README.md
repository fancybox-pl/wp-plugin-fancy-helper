# Fancy Helper

## Generate translations

1. Generate file with translations ``wp i18n make-pot . languages/fancy-helper-pl_PL.pot``
1. Generate binary file ``msgfmt -o languages/fancy-helper-pl_PL.mo languages/fancy-helper-pl_PL.pot``

## Delivery address

Delivery email address is in the file ``env.php`` field ``$_ENV['fancy_helper_delivery_address']``

If you want to overwrite this value:

1. Copy ``env.php`` file and create ``env.dev.php`` (``cp env.php env.dev.php``)
1. In ``env.dev.php`` paste your addres email
