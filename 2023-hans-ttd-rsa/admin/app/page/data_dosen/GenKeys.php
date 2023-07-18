<?php

class GenKeys
{
    public function __construct()
    {
        $this->config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 4096,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );

        $this->res = openssl_pkey_new($this->config);

        openssl_pkey_export($this->res, $privKey);

        $pubKey = openssl_pkey_get_details($this->res);
        $pubKey = $pubKey["key"];


        $this->privateKey = $privKey;
        $this->publicKey = $pubKey;
    }

    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function getPrivateKey()
    {
        return $this->privateKey;
    }
}


/* $key = new GenKeys();

echo $key->getPrivateKey();
echo $key->getPublicKey(); */
