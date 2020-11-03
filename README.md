### **Ilkbyte Package**

This package mainly developed for laravel package but you can use as a standalone package.

#### **Installation**

`composer require ilkbyte/api-php`

Package should be autodiscover by default but if you are using older versions of laravel you should change config/app.php with below;

Add this in providers array;

```js
Netinternet\Ilkbyte\IlkbyteServiceProvider::class,
```

Add this in aliases array;

```js
'Ilkbyte' => Netinternet\Ilkbyte\Facades\Ilkbyte::class,
```

#### **Configuration**

Use command below and choose ilkbyte option when asked. It will create ilkbyte.php in config directory.

`php artisan vendor:publish`

You can also create this file manually and paste below content in file;

```php
<?php
    return [
        'access' => env('ILKBYTE_ACCESSKEY'),
        'secret' => env('İLKBYTE_SECRETKEY')
    ];
```
    
#### **Usage**

You can choose to use facade or helper function. We will use helper functions for examples in this documentation.

```php
use Ilkbyte;
// With Facade
public function myMethod()
{
	return Ilkbyte::server()->all();
}
```

```php
public function myMethod()
{
	return ilkbyte()->server()->all();
}
```
#### **Avalaible Methods**

##### **Server**

```php
// get all servers
ilkbyte()->server()->all()
// get only active servers
ilkbyte()->server()->active()
// create a new server
ilkbyte()->server()->create([
    'username' => $username,
    'password' => $password,
    'name' => $name,
    'os_id' => $osID,
    'app_id' => $appID,
    'package_id' => $packageID,
    'sshkey' => $sshkey,
])
// Get server configs you can choose
ilkbyte()->server()->getConfig()
// Get server details
ilkbyte()->server('server-name')->show()
// Server power settings
ilkbyte()->server('server-name')->power($status)
// Get all ips from server
ilkbyte()->server('server-name')->ip()
// Get ip logs
ilkbyte()->server('server-name')->ipLogs()
// Add a new rdns record
ilkbyte()->server('server-name')->ipRdns('127.0.0.1', 'test.ni.net.tr')
```

##### **Domain**

```php
// Get all domains
ilkbyte()->domain()->all()
// Create a new domain
ilkbyte()->domain()->create('domain-name')
// Get domain details
ilkbyte()->domain('domain-name')->show()
// Add a new record
ilkbyte()->domain('domain-name')->add([
    'record_name' => $recordName,
    'record_type' => $recordType,
    'record_content' => $recordContent,
    'record_priority' => $recordPriority,
])
// Update an existing record
ilkbyte()->domain('domain-name')->update([
    'record_id' => $recordID,
    'record_content' => $recordContent,
    'record_priority' => $recordPriority,
])
// Delete domain
ilkbyte()->domain('domain-name')->delete()
// Push changes to server
ilkbyte()->domain('domain-name')->push()
```
