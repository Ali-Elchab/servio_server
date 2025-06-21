<?php


namespace App\Helpers;


class Constants
{
    const VIEW_DATE_FORMAT = 'd-m-Y';
    const VIEW_DATE_TIME_FORMAT = 'd-m-Y H:i';

    const PRODUCT_TYPE = [
        'simple',
        'complex'
    ];

    const ATTRIBUTE_DATA_TYPE = [
        'Short Text',
        'Long Text',
        'Rich Text',
        'Decimal',
        'Yes/No',
        'Date',
        'Date/Time',
        'From List',
        'Color Swatch',
    ];

    const ATTRIBUTE_EDITOR_TYPE = [
        'Short Text' => 'textbox',
        'Long Text' => 'textarea',
        'Rich Text' => 'textarea',
        'Decimal' => 'number',
        'Yes/No' => 'checkbox',
        'Date' => 'date',
        'Date/Time' => 'datetime',
        'From List' => 'dropdown',
        'Color Swatch' => 'dropdown',
    ];

    const DECIMAL_PLACES = 2;

    const PRODUCT_BULK_ACTIONS = [
        ["label" => "Delete", "action" => "delete"],
        ["label" => "Update Categories", "action" => "category"],
        ["label" => "Update Collections", "action" => "collection"],
        ["label" => "Update Brand", "action" => "brand"],
        ["label" => "Update Prices", "action" => "price"],
        ["label" => "Update Images", "action" => "image"],
    ];

    const GLOBAL_SETTINGS = [
        [
            'key'         => 'company_display_name',
            'label'       => 'Display Name',
            'group_name'  => 'General',
            'data_type'   => 'Short Text',
            'value'       => [
                'value'   => 'Company Display Name'
            ]
        ],
        [
            'key'         => 'company_about_short_text',
            'label'       => 'Display Name',
            'group_name'  => 'General',
            'data_type'   => 'Long Text',
            'value'       => [
                'value'   => 'About Company Short Text'
            ]
        ],
        [
            'key'         => 'image_company_logo_invoice',
            'label'       => 'Logo [Invoice]',
            'group_name'  => 'General',
            'data_type'   => 'Image',
            'value'       => [
                'value'   => ''
            ],
            'options'     => [
                'width'   => 150,
                'height'  => 150
            ]
        ],
        [
            'key'         => 'image_company_logo_email',
            'label'       => 'Logo [Email]',
            'group_name'  => 'General',
            'data_type'   => 'Image',
            'value'       => [
                'value'   => ''
            ],
            'options'     => [
                'width'   => 150,
                'height'  => 150
            ]
        ],
        [
            'key'         => 'image_company_logo_header',
            'label'       => 'Logo [Header]',
            'group_name'  => 'General',
            'data_type'   => 'Image',
            'value'       => [
                'value'   => ''
            ],
            'options'     => [
                'width'   => 158,
                'height'  => 51
            ]
        ],
        [
            'key'         => 'image_company_logo_footer',
            'label'       => 'Logo [Footer]',
            'group_name'  => 'General',
            'data_type'   => 'Image',
            'value'       => [
                'value'   => ''
            ],
            'options'     => [
                'width'   => 158,
                'height'  => 51
            ]
        ],
        [
            'key'         => 'support_wa_number',
            'label'       => 'Whatsapp Number for Support',
            'group_name'  => 'General',
            'data_type'   => 'Short Text',
            'value'       => [
                'value'   => '096181048911'
            ]
        ],
        [
            'key'         => 'affiliate_wa_number',
            'label'       => 'Whatsapp Number for Affiliates',
            'group_name'  => 'General',
            'data_type'   => 'Short Text',
            'value'       => [
                'value'   => '096181048911'
            ]
        ],
        [
            'key'         => 'ask_me_wa_number',
            'label'       => 'Whatsapp Number for Ask About Items',
            'group_name'  => 'General',
            'data_type'   => 'Short Text',
            'value'       => [
                'value'   => '096181048911'
            ]
        ],
        [
            'key'         => 'company_wa_number',
            'label'       => 'Whatsapp Number',
            'group_name'  => 'General',
            'data_type'   => 'Short Text',
            'value'       => [
                'value'   => '096181048911'
            ]
        ],
        [
            'key'         => 'company_wa_message',
            'label'       => 'Whatsapp Message',
            'group_name'  => 'General',
            'data_type'   => 'Short Text',
            'value'       => [
                'value'   => 'Contact us on whatsapp'
            ]
        ],
        [
            'key'         => 'user_is_unique_in_store',
            'label'       => 'User is Unique in The Store',
            'group_name'  => 'General',
            'data_type'   => 'Yes/No',
            'value'       => [
                'value'   => false
            ]
        ],
        [
            'key'         => 'update_qty_from_external_api',
            'label'       => 'Update Quantity from External API',
            'group_name'  => 'General',
            'data_type'   => 'Yes/No',
            'value'       => [
                'value'   => true
            ]
        ],
        [
            'key'         => 'show_categories_slider_in_home_page',
            'label'       => 'Show Slider of Categories in Home Page ',
            'group_name'  => 'Layout',
            'data_type'   => 'Yes/No',
            'value'       => [
                'value'   => false
            ]
        ],
        [
            'key'         => 'layout_product_default',
            'label'       => 'Default Product Layout',
            'group_name'  => 'Layout',
            'data_type'   => 'Size',
            'value'       => [
                'width'   => 600,
                'height'  => 600
            ]
        ],
        [
            'key'         => 'layout_product_mobile',
            'label'       => 'Mobile Product Layout',
            'group_name'  => 'Layout',
            'data_type'   => 'Size',
            'value'       => [
                'width'   => 600,
                'height'  => 600
            ]
        ],
        [
            'key'         => 'layout_category_default',
            'label'       => 'Default Category Layout',
            'group_name'  => 'Layout',
            'data_type'   => 'Size',
            'value'       => [
                'width'   => 150,
                'height'  => 150
            ]
        ],
        [
            'key'         => 'layout_category_mobile',
            'label'       => 'Mobile Category Layout',
            'group_name'  => 'Layout',
            'data_type'   => 'Size',
            'value'       => [
                'width'   => 150,
                'height'  => 150
            ]
        ],
        [
            'key'         => 'layout_category_thumb',
            'label'       => 'Thumbnail Category Layout',
            'group_name'  => 'Layout',
            'data_type'   => 'Size',
            'value'       => [
                'width'   => 50,
                'height'  => 50
            ]
        ],
        [
            'key'         => 'layout_category_mega',
            'label'       => 'Mega Menu Category Layout',
            'group_name'  => 'Layout',
            'data_type'   => 'Size',
            'value'       => [
                'width'   => 1050,
                'height'  => 180
            ]
        ],
        [
            'key'         => 'layout_brand_default',
            'label'       => 'Default Brand Layout',
            'group_name'  => 'Layout',
            'data_type'   => 'Size',
            'value'       => [
                'width'   => 164,
                'height'  => 38
            ]
        ],
        [
            'key'         => 'layout_brand_mobile',
            'label'       => 'Mobile Brand Layout',
            'group_name'  => 'Layout',
            'data_type'   => 'Size',
            'value'       => [
                'width'   => 164,
                'height'  => 38
            ]
        ],
        [
            'key'         => 'layout_collection_default',
            'label'       => 'Default Collection Layout',
            'group_name'  => 'Layout',
            'data_type'   => 'Size',
            'value'       => [
                'width'   => 150,
                'height'  => 150
            ]
        ],
        [
            'key'         => 'layout_collection_mobile',
            'label'       => 'Mobile Collection Layout',
            'group_name'  => 'Layout',
            'data_type'   => 'Size',
            'value'       => [
                'width'   => 150,
                'height'  => 150
            ]
        ],
        [
            'key'         => 'layout_products_per_page',
            'label'       => 'Products per Page',
            'group_name'  => 'Layout',
            'data_type'   => 'Decimal',
            'value'       => [
                'value'   => 12
            ]
        ],
        [
            'key'         => 'default_image_product',
            'label'       => 'Default Image For Products',
            'group_name'  => 'Layout',
            'data_type'   => 'Image',
            'value'       => [
                'value'   => ''
            ],
            'options'     => [
                'width'   => 440,
                'height'  => 600
            ]
        ],
        [
            'key'         => 'show_variants_as_separated_products',
            'label'       => 'Show Variants as Separated Products',
            'group_name'  => 'Layout',
            'data_type'   => 'Yes/No',
            'value'       => [
                'value'   => false
            ]
        ],
        [
            'key'         => 'firebase_enabled',
            'label'       => 'Enable Firebase Cloud Messaging',
            'group_name'  => 'Firebase',
            'data_type'   => 'Yes/No',
            'value'       => [
                'value'   => false
            ]
        ],
        [
            'key'         => 'firebase_server_key',
            'label'       => 'Firebase Key',
            'group_name'  => 'Firebase',
            'data_type'   => 'Short Text',
            'value'       => [
                'value'   => ''
            ]
        ],
        [
            'key'         => 'google_client_id',
            'label'       => 'Google Client Id',
            'group_name'  => 'Social Login',
            'data_type'   => 'Short Text',
            'value'       => [
                'value'   => ''
            ]
        ]
    ];
}
