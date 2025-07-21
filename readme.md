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

## 📂 Example Usage

All example files can be found in the `/examples` directory:

| File | Description |
|------|-------------|
| `translate.php` | Send a translation request and fetch status |
| `generate_description.php` | Generate product description and fetch status |
| `generate_seo.php` | Generate SEO meta tags and fetch status |
| `workflows.php` | List available workflows |
| `languages.php` | List available languages |
| `callback.php` | Handle and log Ovesio callback requests |

---

## 🔧 Integration Steps

```php
use Ovesio\OvesioAI;

$client = new OvesioAI('YOUR_API_KEY');

$response = $client->translate()
    ->from('en')
    ->to(['fr', 'de'])
    ->data([
        'key' => 'title',
        'value' => 'Awesome Product'
    ], 'ref-123')
    ->request();
```

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