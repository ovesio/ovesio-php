# Ovesio PHP SDK

A lightweight, fluent PHP client for interacting with the [Ovesio API](https://api.ovesio.com/docs/) and [Ovesio AI platform](https://ovesio.com).

## 🔐 Getting Started

To use this SDK, you must have an account on [https://ovesio.com](https://ovesio.com). After registration, you'll be able to:

- Create and manage **projects**
- Retrieve a unique **API Key** per project
- Monitor API usage and translation stats

👉 Each project has its own API key, which must be used in API requests. You can find it in your Ovesio dashboard under **Settings → API Token**.

---

## 📦 Installation

```bash
composer require ovesio/ovesio-php
```

---

## ⚙️ Requirements

- PHP >= 7.1
- cURL enabled

---

## 🚀 What This SDK Can Do

This library allows you to:

- Send translation requests to Ovesio
- Generate product descriptions using AI
- Generate SEO meta tags
- Retrieve translation/generation status
- List workflows
- List supported languages
- Handle asynchronous callbacks from Ovesio

---

## 🔧 Basic Usage Example

```php
use Ovesio\OvesioAI;

$client = new OvesioAI('YOUR_API_KEY');

$response = $client->translate()
    ->from('en')
    ->to(['fr', 'de'])
    ->workflow(1)
    ->data([
        [
            'key' => 'title',
            'value' => 'Awesome Product',
            'context' => 'E-commerce / Electronics'
        ],
        [
            'key' => 'desc',
            'value' => '' // this will be filtered out if filterByValue() is called
        ]
    ], 'ref-123')
    ->filterByValue() // optional: remove empty values
    ->request();

print_r($response);
```

### 🔄 Check Status
```php
$status = $client->translate()->status($response['data'][0]['id']);
print_r($status);
```

---

## 🧠 Features by Endpoint

### ➤ Translation
```php
$client->translate()
    ->from('en')
    ->to('fr')
    ->callbackUrl('https://yourdomain.com/callback')
    ->data([
        [
            'key' => 'name',
            'value' => 'Modern Chair',
            'context' => 'Furniture Product Title'
        ],
        [
            'key' => 'description',
            'value' => '',
            'context' => 'Product Description'
        ]
    ], 'product-102')
    ->filterByValue() // optional
    ->request();
```

### ➤ Generate Description
```php
$client->generateDescription()
    ->workflow(2)
    ->to('en')
    ->data([
        'name' => 'HP MT43 Laptop',
        'categories' => ['Laptop', 'Second Hand'],
        'description' => 'Compact, powerful and affordable.',
        'additional' => [
            'RAM: 8GB',
            'Storage: 256GB SSD'
        ]
    ], 'ref-laptop')
    ->request();
```

### ➤ Generate SEO Meta
```php
$client->generateSeo()
    ->workflow(3)
    ->to('en')
    ->data([
        'name' => 'iPhone 14 Pro Max',
        'categories' => ['Phones', 'Apple'],
        'description' => 'Latest flagship Apple phone.',
        'additional' => [
            'Camera: 48MP',
            'Chipset: A16 Bionic'
        ]
    ], 'ref-iphone')
    ->request();
```

### ➤ List Workflows
```php
$workflows = $client->workflow()->list();
```

### ➤ List Languages
```php
$languages = $client->languages()->list();
```

### ➤ Handle Callbacks
```php
use Ovesio\Callback\CallbackHandler;

$callback = new CallbackHandler();
$data = $callback->handle();

if (!$data) {
    $callback->fail('Invalid callback payload');
    exit;
}

// process $data ...
$callback->success();
```

---

## 📂 Example Files

All example files can be found in the `/examples` directory:

| File                     | Description                               |
|--------------------------|-------------------------------------------|
| `translate.php`          | Send a translation request and fetch status |
| `generate_description.php` | Generate product description and fetch status |
| `generate_seo.php`       | Generate SEO meta tags and fetch status    |
| `workflows.php`          | List available workflows                   |
| `languages.php`          | List available languages                   |
| `callback.php`           | Handle and log Ovesio callback requests    |

---

## 📚 Documentation

- [Ovesio Official Docs](https://ovesio.com/docs/)
- [API Reference](https://api.ovesio.com/docs/)

---

## 🛠 Maintainer

**Ovesio**
https://ovesio.com

---

## 📄 License

This SDK is open-sourced under the MIT license.
