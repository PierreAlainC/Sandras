# Problèmes fixtures

## make:migration

```bash
php bin/console migrations:migrate
```
Ne fonctionne plus
=>

```bash
php bin/console make:migration

                                                                                                                        
 [WARNING] No database changes were detected.                                                                           
                                                                                                                        

 The database schema and the application mapping information are already in sync.
```
Pas de nouvelles versions créées!!!

## doctrine:migrations:migrate

```bash
bin/console doctrine:migrations:migrate
```

=>

```bash
bin/console doctrine:migrations:migrate

 WARNING! You are about to execute a migration in database "Sandras" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:
 > 

                                                                                                                        
 [ERROR] The version "latest" couldn't be reached, there are no registered migrations.
```

## Unique façon de faire les fixtures

```bash
php bin/console doctrine:fixtures:load
```

