To get composer.json file execute following command:
```
 composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition=<version> <install-directory-name>
```

To install magento 2 run following command:
```
bin/magento setup:install \
--admin-user=admin \
--admin-firstname=Milos \
--admin-lastname=Stambolija \
--admin-email=milos.stambolija96@gmail.com \
--admin-password=password123$ \
--base-url=http://dev.gamabunta.com \
--db-host=db \
--db-name=gamabunta \
--db-user=gamabunta \
--db-password=gamabunta \
--backend-frontname=admin \
--cleanup-database \
--elasticsearch-host=elasticsearch
```