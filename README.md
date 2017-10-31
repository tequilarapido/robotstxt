# 

## Contents

- [Installation](#installation)
- [Usage](#usage)

## Installation

You can install the package using composer

``` bash
$ composer require tequilarapido/robotstxt
```     
      
> Only if you are using Laravel below 5.5, you will need to add the Service Provider inside config/app.php
```
'providers' => [
    // Laravel Framework Service Providers...
    //...
        
    // Package Service Providers
    Tequilarapido\RobotsTxt::class,
],
```

Finally, you need to publish config file
``` bash
$ php artisan vendor:publish
```

## Usage

There are 3 types of robots.txt file. In your .env file, add:
``` 
ROBOTS_TXT_STATUS=  #disallow_all|allow_all|custom
```

### robots.txt content

#### 1. disallow_all (default)
 ``` 
 User-agent: *
 Disallow: /
 ```
 
 #### 2. allow_all
  ``` 
  User-agent: *
  ```
  
  
 #### 3. custom
 You need to add in your .env file :
 ``` 
 ROBOTS_TXT_CUSTOM=  #What do you want to be written in your robots.txt file
 ```
