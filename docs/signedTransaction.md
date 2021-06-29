<br />
<p align="center">
  <h3 align="center">Signed Transaction</h3>
</p>

<!-- TABLE OF CONTENTS -->

## Table of Contents

- [Table of Contents](#table-of-contents)
    - [How To Send Signed Transaction](#how-to-send-signed-transaction)
- [License](#license)
- [Contact](#contact)

#### How To Send Signed Transaction

Below is an short code to send an signed transaction for Cryptum using sdk.

```php
$protocol = "STELLAR";
$blob = "sampleSignedTransaction";
$type = "TRANSFER"; // or Another type valid: TRANSFER | CALL_CONTRACT_METHOD | DEPLOY_CONTRACT | CHANGE_TRUST

$sdk = new CryptumSDK($config);
$controller = $sdk->getTransactionController();
$controller->sendSignedTransaction($blob, $type, $protocol);
```

It's all 🤷🏻‍♂️

## License

Distributed under the MIT license. See `LICENSE` for more information.

## Contact

Blockforce - [SITE](https://blockforce.in/) - **HELLO@BLOCKFORCE.IN**
