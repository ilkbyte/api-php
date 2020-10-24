### **Ilkbyte Package**

This package mainly developed for laravel package but you can use as a standalone package.

#### **Installation**

`composer require netinternet/ilkbyte`

Package should be autodiscover by default but if you are using older versions of laravel you should change config/app.php with below;

Add this in providers array;

`Netinternet\Ilkbyte\IlkbyteServiceProvider::class,`

Add this in aliases array;

`'Ilkbyte' => Netinternet\Ilkbyte\Facades\Ilkbyte::class,`

#### **Configuration**

Use command below and choose ilkbyte option when asked. It will create ilkbyte.php in config directory.

`php artisan vendor:publish`

You can also create this file manually and paste below content in file;

```
<?php
    return [
        'access' => env('ILKBYTE_ACCESSKEY'),
        'secret' => env('İLKBYTE_SECRETKEY')
    ];
```
    
#### **Usage**

You can choose to use helper function

```
public function myMethod()
{
	return ilkbyte()->server()->list();
}
```
#### **Avalaible Methods**

##### **Server**

```
// get all servers
ilkbyte()->server()->list()
// get only active servers
ilkbyte()->server()->active
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
ilkbyte()->server('domain-name')->show()
// Get monitoring data
ilkbyte()->server('domain-name')->monitor()
// Server power settings
ilkbyte()->server('domain-name')->power($status)
// Get all ips from server
ilkbyte()->server('domain-name')->ip()
// Get ip logs
ilkbyte()->server('domain-name')->ipLogs()
// Add a new rdns record
ilkbyte()->server('domain-name')->ipRdns('127.0.0.1', 'test.ni.net.tr')
```

##### **Domain**

```
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
