<?php

class MyEncryption
{

    public function __construct($privkey, $pubkey)
    {
        $this->privkey = $privkey;
        $this->pubkey = $pubkey;
    }

    public function encrypt($data)
    {
        if (openssl_public_encrypt($data, $encrypted, $this->pubkey))
            $data = base64_encode($encrypted);
        else
            throw new Exception('Unable to encrypt data. Perhaps it is bigger than the key size?');
        return $data;
    }

    public function decrypt($data)
    {
        if (openssl_private_decrypt(base64_decode($data), $decrypted, $this->privkey))
            $data = $decrypted;
        else
            $data = '';

        return $data;
    }
}


// $enc = new MyEncryption();

// $out = $enc->encrypt("rahasia");
// echo $out;
// echo "\n-------------------------------------\n";
// $out = $enc->decrypt($out);
// echo $out;
