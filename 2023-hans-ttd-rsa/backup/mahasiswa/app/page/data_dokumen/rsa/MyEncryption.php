<?php

/**
 * Security warning: This code snippet is vulnerable to Bleichenbacher's 1998 padding oracle attack.
 * See this answer (https://stackoverflow.com/a/34088308/2224584) for better security.
 **/

class MyEncryption
{
    public $pubkey = '-----BEGIN PUBLIC KEY-----
MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBAIKTKW+9Xyqn0Yg16YUZLwzeU8psbveZ
Ukr3EKMxEdPdowtCYB/L98lkyIbryyPqXejeCkW2kLVlpoHs0Uu6b7cCAwEAAQ==
-----END PUBLIC KEY-----';
    public $privkey = '-----BEGIN RSA PRIVATE KEY-----
MIIBOgIBAAJBAIKTKW+9Xyqn0Yg16YUZLwzeU8psbveZUkr3EKMxEdPdowtCYB/L
98lkyIbryyPqXejeCkW2kLVlpoHs0Uu6b7cCAwEAAQJAGmMa8JXYcYpQcbJTaq5Y
L8WOMU4QbsDxPG0JU7FK5QGMABpRTcqAZazzZ5vuXCQsRtAUhA1uzXP/CRh3npuy
YQIhAPa5uxUk8DP91cs2AsaxUC3PCP1oMGYr9/Sfy/IdjjsrAiEAh3uzBxezq/pP
Vf0wCNp4AVfVmr3JORgafb/2pG/AZ6UCIDHivdv5mwO4KDktU4RfJ6oLeXLbVSXj
cAArKy5qIW7/AiEAhWfUfSNlk+5BuJY6ej1E9W2bs2c1gLavPyuKnZg8iNECIEKq
yOsQ5z7wWHmFgwnT+t0YBZlsbKcMxTWRqv+ZxGhT
-----END RSA PRIVATE KEY-----';

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
