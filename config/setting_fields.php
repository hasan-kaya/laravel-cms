<?php

return [

    'app' => [
        'title' => 'Genel',
        'desc' => '',
        'icon' => 'fa fa-home',
        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'title',
                'label' => 'Site Başlığı',
                'rules' => 'required|min:2|max:50'
            ],
            [
                'type' => 'textarea',
                'data' => 'string',
                'name' => 'description',
                'label' => 'SEO Açıklama',
                'rules' => ''
            ],
            [
                'type' => 'textarea',
                'data' => 'string',
                'name' => 'keywords',
                'label' => 'SEO Etiketler',
                'rules' => ''
            ],
            [
                'name' => 'logo',
                'type' => 'image',
                'data' => 'file',
                'label' => 'Logo',
                'rules' => 'image|mimes:jpeg,png,jpg,gif|max:500',
            ],
            [
                'name' => 'email',
                'type' => 'email',
                'label' => 'E-Posta',
                'rules' => 'email',
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'phone',
                'label' => 'Telefon',
                'rules' => ''
            ], 
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'whatsapp',
                'label' => 'Whatsapp',
                'rules' => ''
            ], 
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'fax',
                'label' => 'Fax',
                'rules' => ''
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'address',
                'label' => 'Adres',
                'rules' => ''
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'map',
                'label' => 'Harita Url',
                'rules' => ''
            ],
        ]
    ],

    'email' => [
        'title' => 'E-Posta',
        'desc' => '',
        'icon' => 'fa fa-envelope',
        'elements' => [
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'mail_host',
                'label' => 'E-Posta Sunucusu',
                'rules' => ''
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'mail_username',
                'label' => 'E-Posta Adresi',
                'rules' => ''
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'mail_password',
                'label' => 'Şifre',
                'rules' => ''
            ],
            [
                'type' => 'select',
                'data' => 'string',
                'options' => [
                    'ssl' => 'SSL',
                    'tls' => 'TLS',
                ],
                'name' => 'mail_encryption',
                'label' => 'Şifreleme Türü',
                'rules' => ''
            ],
            [
                'type' => 'text',
                'data' => 'string',
                'name' => 'mail_from_name',
                'label' => 'Hangi İsim ile Gönderilsin',
                'rules' => ''
            ],
        ]
    ]
];