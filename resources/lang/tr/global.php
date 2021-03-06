<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',			'approved' => 'Approved',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Zaman',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'faq-management' => [		'title' => 'FAQ Management',		'fields' => [		],	],
		'faq-categories' => [		'title' => 'Categories',		'fields' => [			'title' => 'Category',		],	],
		'faq-questions' => [		'title' => 'Questions',		'fields' => [			'category' => 'Category',			'question-text' => 'Question',			'answer-text' => 'Answer',		],	],
		'internal-notifications' => [		'title' => 'Notifications',		'fields' => [			'text' => 'Text',			'link' => 'Link',			'users' => 'Users',		],	],
		'content-management' => [		'title' => 'Content management',		'fields' => [		],	],
		'content-categories' => [		'title' => 'Categories',		'fields' => [			'title' => 'Category',			'slug' => 'Slug',		],	],
		'content-tags' => [		'title' => 'Tags',		'fields' => [			'title' => 'Tag',			'slug' => 'Slug',		],	],
		'content-pages' => [		'title' => 'Pages',		'fields' => [			'title' => 'Title',			'category-id' => 'Categories',			'tag-id' => 'Tags',			'page-text' => 'Text',			'excerpt' => 'Excerpt',			'featured-image' => 'Featured image',		],	],
		'settings' => [		'title' => 'Settings',		'fields' => [		],	],
		'site-settings' => [		'title' => 'Site settings',		'fields' => [			'site-title' => 'Site title',			'admin-email' => 'Admin email',			'your-copyright-message' => 'Your copyright message',			'delete-auctions-older-than' => 'Delete auctions older than',			'created-by' => 'Created by',			'results-shown-per-page' => 'Results shown per page',			'users-confirmation-method' => 'Users confirmation method',			'default-country' => 'Default country',			'default-language' => 'Default language',		],	],
		'auction-settings' => [		'title' => 'Auction settings',		'fields' => [			'allow-custom-increments' => 'Allow custom increments',			'hours-until-auction-ends-count-down' => 'Hours until auction ends count down',			'enable-featured-items' => 'Enable featured items',			'enable-auctions-auto-extension' => 'Enable auctions auto extension',			'extend-auction-by' => 'Extend auction by',			'during-the-last' => 'During the last',			'activate-picture-gallery' => 'Activate picture gallery',			'max-number-of-pictures' => 'Max number of pictures',			'max-pictures-size' => 'Max pictures size',			'thumbnails-size' => 'Thumbnails size',			'created-by' => 'Created by',			'bidder-privacy' => 'Activate Bidder Privacy?',		],	],
		'currency-settings' => [		'title' => 'Currency settings',		'fields' => [			'site-currency' => 'Site currency',			'money-format' => 'Money format',			'decimal-digits' => 'Decimal digits',			'symbol-position' => 'Symbol position',			'created-by' => 'Created by',		],	],
		'time-settings' => [		'title' => 'Time settings',		'fields' => [			'date-format' => 'Date format',			'time-zone' => 'Time zone',			'created-by' => 'Created by',		],	],
		'seo-settings' => [		'title' => 'Seo settings',		'fields' => [			'meta-description-tag' => 'Meta description tag',			'meta-keywords-tag' => 'Meta keywords tag',			'created-by' => 'Created by',		],	],
		'fee-settings' => [		'title' => 'Fee settings',		'fields' => [		],	],
		'payment-gateways' => [		'title' => 'Payment gateways',		'fields' => [		],	],
		'paypal' => [		'title' => 'Paypal',		'fields' => [			'is-enabled' => 'Enable/Disable',			'paypal-email-address' => 'Paypal email address',			'mode' => 'Mode',			'created-by' => 'Created by',		],	],
		'categories' => [		'title' => 'Categories',		'fields' => [		],	],
		'category' => [		'title' => 'Category',		'fields' => [			'category' => 'Category',			'created-by' => 'Created by',		],	],
		'sub-catogories' => [		'title' => 'Sub catogories',		'fields' => [			'category' => 'Category ',			'sub-category' => 'Sub category',			'created-by' => 'Created by',		],	],
		'auctions' => [		'title' => 'Auctions',		'fields' => [		],	],
		'create' => [		'title' => 'Create',		'fields' => [			'title' => 'Title',			'category' => 'Category id',			'sub-category' => 'Sub category ',			'description' => 'Description',			'start-date' => 'Start date',			'end-date' => 'End date',			'minimum-bid' => 'Minimum bid',			'reserve-price' => 'Reserve price',			'buy-now-price' => 'Buy now price',			'bid-increment' => 'Bid increment',			'shipping-conditions' => 'Shipping conditions',			'international-shipping' => 'International shipping',			'shipping-terms' => 'Shipping terms',			'make-featured' => 'Make featured',			'status' => 'Status',			'created-by' => 'Created by',			'user' => 'Seller ID',			'images' => 'Images',		],	],
		'testmonies' => [		'title' => 'Testmonies',		'fields' => [		],	],
		'testmony' => [		'title' => 'Testmony',		'fields' => [			'user' => 'User id',			'testmony' => 'Testmony',			'status' => 'Status',			'created-by' => 'Created by',		],	],
		'social-logins' => [		'title' => 'Social logins',		'fields' => [			'facebook-client-id' => 'Facebook client id',			'facebook-client-secret' => 'Facebook client secret',			'facebook-redirect-url' => 'Facebook redirect url',			'facebook-login-enable' => 'Facebook login enable',			'google-client-id' => 'Google client id',			'google-client-secret' => 'Google client secret',			'google-redirect-url' => 'Google redirect url',			'google-login-enable' => 'Google login enable ?',			'created-by' => 'Created by',		],	],
		'email-settings' => [		'title' => 'Email settings',		'fields' => [		],	],
		'templates' => [		'title' => 'Templates',		'fields' => [			'key' => 'Key',			'type' => 'Type',			'subject' => 'Subject',			'from-email' => 'From email',			'from-name' => 'From name',			'content' => 'Content',			'created-by' => 'Created by',		],	],
		'news-letter' => [		'title' => 'News letter',		'fields' => [		],	],
		'create-letter' => [		'title' => 'Create letter',		'fields' => [			'to' => 'To',			'title' => 'Title',			'message' => 'Message',			'created-by' => 'Created by',		],	],
		'social-networks' => [		'title' => 'Social networks',		'fields' => [		],	],
		'location-master' => [		'title' => 'Location master',		'fields' => [		],	],
		'countries' => [		'title' => 'Countries',		'fields' => [			'shortcode' => 'Shortcode',			'title' => 'Title',			'created-by' => 'Created by',		],	],
		'states' => [		'title' => 'States',		'fields' => [			'state' => 'State',			'country' => 'Country',			'created-by' => 'Created by',		],	],
		'cities' => [		'title' => 'Cities',		'fields' => [			'city' => 'City',			'country' => 'Country',			'state' => 'State',			'created-by' => 'Created by',		],	],
	'app_create' => 'Olu??tur',
	'app_save' => 'Kaydet',
	'app_edit' => 'D??zenle',
	'app_view' => 'G??r??nt??le',
	'app_update' => 'G??ncelle',
	'app_list' => 'Listele',
	'app_no_entries_in_table' => 'Tabloda kay??t bulunamad??',
	'app_custom_controller_index' => '??zel denet??i dizini.',
	'app_logout' => '????k???? yap',
	'app_add_new' => 'Yeni ekle',
	'app_are_you_sure' => 'Emin misiniz?',
	'app_back_to_list' => 'Listeye d??n',
	'app_dashboard' => 'Kontrol Paneli',
	'app_delete' => 'Sil',
	'app_delete_selected' => 'Se??ileni Sil',
	'app_category' => 'Kategori',
	'app_categories' => 'Kategoriler',
	'app_sample_category' => '??rnek Kategori',
	'app_questions' => 'Sorular',
	'app_question' => 'Soru',
	'app_answer' => 'Cevap',
	'app_sample_question' => '??rnek Soru',
	'app_sample_answer' => '??rnek Cevap',
	'app_faq_management' => 'SSS Y??netimi',
	'app_administrator_can_create_other_users' => 'Y??netici (di??er kullan??c??lar?? olu??turabilir)',
	'app_simple_user' => 'Basit Kullan??c??',
	'app_title' => 'Ba??l??k',
	'app_roles' => 'Roller',
	'app_role' => 'Rol',
	'app_user_management' => 'Kullan??c?? Y??netimi',
	'app_users' => 'Kullan??c??lar',
	'app_user' => 'Kullan??c??',
	'app_name' => 'Ad',
	'app_email' => 'E-posta',
	'app_password' => '??ifre',
	'app_remember_token' => 'Beni Hat??rla',
	'app_subject' => 'Konu',
	'app_message' => 'Mesaj',
	'app_send' => 'G??nder',
	'app_reply' => 'Cevapla',
	'app_calendar_sources' => 'Takvim kayna????',
	'app_new_calendar_source' => 'Yeni takvim kayna???? olu??tur',
	'app_crud_title' => 'Crud ba??l??????',
	'app_crud_date_field' => 'Crud tarih alan??',
	'app_prefix' => '??nek',
	'app_label_field' => 'Etiket alan??',
	'app_suffix' => 'Sonek',
	'app_no_calendar_sources' => 'Hen??z takvim kayna???? olu??turulmad??',
	'app_crud_event_field' => 'Olay etiket alan??',
	'app_create_new_calendar_source' => 'Takvim Kayna???? Olu??tur',
	'app_edit_calendar_source' => 'Takvim Kayna????n?? D??zenle',
	'app_client_management' => 'M????teri y??netimi',
	'app_client_management_settings' => 'M????teri y??netim ayarlar??',
	'app_country' => '??lke',
	'app_client_status' => 'M????teri Durumu',
	'app_clients' => 'M????teriler',
	'app_client_statuses' => 'M????teri durumlar??',
	'app_currencies' => 'Kurlar',
	'app_main_currency' => 'Ana kur',
	'app_documents' => 'D??k??man',
	'app_file' => 'Dosya',
	'app_income_source' => 'Gelir kayna????',
	'app_income_sources' => 'Gelir kaynaklar??',
	'app_fee_percent' => '??cret oran??',
	'app_note_text' => 'Not yaz??s??',
	'app_client' => 'M????teri',
	'app_start_date' => 'Ba??lang???? Tarihi',
	'app_budget' => 'B??t??e',
	'app_project_status' => 'Proje durumu',
	'app_project_statuses' => 'Proje durumlar??',
	'app_transactions' => '????lemler',
	'app_transaction_types' => '????lem T??rleri',
	'app_transaction_type' => '????lem t??r??',
	'app_transaction_date' => '????lem tarihi',
	'app_currency' => 'Kur',
	'app_current_password' => 'Ge??erli ??ifreniz',
	'app_new_password' => 'Yeni ??ifre',
	'app_password_confirm' => 'Yeni ??ifreyi onayla',
	'app_dashboard_text' => 'Giri?? Yapt??n??z!',
	'app_forgot_password' => '??ifrenizi mi unuttunuz?',
	'app_remember_me' => 'Beni Hat??rla',
	'app_login' => 'Giri??',
	'app_change_password' => '??ifreyi de??i??tir',
	'app_csv' => 'CSV',
	'app_print' => 'Yazd??r',
	'app_excel' => 'Excel',
	'app_copy' => 'Kopyala',
	'app_colvis' => 'S??tun g??r??n??rl??????',
	'app_pdf' => 'PDF',
	'app_email_greet' => 'Merhaba',
	'app_email_regards' => 'Sayg??lar',
	'app_confirm_password' => '??ifreyi onayla',
	'app_if_you_are_having_trouble' => 't??klamakta sorun ya????yorsan??z',
	'app_please_select' => 'L??tfen se??iniz',
	'app_register' => 'Kaydol',
	'app_registration' => 'Kay??t',
	'app_not_approved_title' => 'Onaylandmad??n??z',
	'app_not_approved_p' => 'Hesab??n??z y??netici taraf??ndan hen??z onaylanmad??. L??tfen daha sonra tekrar deneyiniz.',
	'app_restore' => 'Geri y??kle',
	'app_permadel' => 'Tamamen Sil',
	'app_all' => 'Hepsi',
	'app_trash' => '????p',
	'app_permissions' => '??zinler',
	'app_user_actions' => 'Kullan??c?? hareketleri',
	'app_action' => 'Hareket',
	'app_action_model' => 'Hareket Modeli',
	'app_action_id' => 'Hareket id',
	'app_time' => 'Zaman',
	'app_campaign' => 'Kampanya',
	'app_campaigns' => 'Kampanyalar',
	'app_description' => 'A????klama',
	'app_valid_from' => 'Zaman??ndan itibaren',
	'app_valid_to' => 'Zaman??na kadar',
	'app_discount_amount' => '??ndirim tutar??',
	'app_discount_percent' => '??ndirim y??zdesi',
	'app_coupons_amount' => 'Kupon tutar??',
	'app_coupons' => 'Kuponlar',
	'app_code' => 'Kod',
	'app_redeem_time' => '??deme zaman??',
	'app_coupon_management' => 'Kupon y??netimi',
	'app_time_management' => 'Tarih y??netimi',
	'app_projects' => 'Projeler',
	'app_reports' => 'Raporlar',
	'app_time_entries' => 'Tarih girdileri',
	'app_work_type' => '??al????ma t??r??',
	'app_work_types' => '??al????ma t??rleri',
	'app_project' => 'Proje',
	'app_start_time' => 'Ba??lang???? zaman??',
	'app_end_time' => 'Biti?? zaman??',
	'app_expense_category' => 'Gider Kategorisi',
	'app_expense_categories' => 'Gider Kategorileri',
	'app_expense_management' => 'Gider Y??netimi',
	'app_expenses' => 'Giderler',
	'app_expense' => 'Gider',
	'app_entry_date' => 'Giri?? tarihi',
	'app_amount' => 'Tutar',
	'app_income_categories' => 'Gelir kategorileri',
	'app_monthly_report' => 'Ayl??k rapor',
	'app_companies' => '??irketler',
	'app_company_name' => '??irket ad??',
	'app_address' => 'Adres',
	'app_website' => 'Website',
	'app_contact_management' => '??leti??im y??netimi',
	'app_contacts' => '??rtibatlar',
	'app_company' => '??irket',
	'app_first_name' => 'Ad',
	'app_last_name' => 'Soyad',
	'app_phone' => 'Telefon',
	'app_phone1' => 'Telefon 1',
	'app_phone2' => 'Telefon 2',
	'app_skype' => 'Skype',
	'app_photo' => 'Foto??raf (max 8mb)',
	'app_category_name' => 'Kategori ad??',
	'app_product_management' => '??r??n y??netimi',
	'app_products' => '??r??nler',
	'app_product_name' => '??r??n ad??',
	'app_price' => 'Fiyat',
	'app_tags' => 'Etiketler',
	'app_tag' => 'Etiket',
	'app_photo1' => 'Foto??raf 1',
	'app_photo2' => 'Foto??raf 2',
	'app_photo3' => 'Foto??raf 3',
	'app_calendar' => 'Takvim',
	'app_statuses' => 'Durumlar',
	'app_task_management' => 'G??rev Y??netimi',
	'app_tasks' => 'G??revler',
	'app_status' => 'Durum',
	'app_attachment' => 'Ek',
	'app_due_date' => 'Vade tarihi',
	'app_assigned_to' => 'Atanm????',
	'app_assets' => 'Varl??klar',
	'app_asset' => 'Varl??k',
	'app_serial_number' => 'Seri numaras??',
	'app_location' => 'Yer',
	'app_locations' => 'Yerler',
	'app_assigned_user' => 'Atanm???? (kullan??c??)',
	'app_notes' => 'Notlar',
	'app_assets_history' => 'Varl??k ge??mi??i',
	'app_assets_management' => 'Varl??k y??netimi',
	'app_slug' => 'K??sa ??sim',
	'app_content_management' => '????erik Y??netimi',
	'app_text' => 'Yaz??',
	'app_excerpt' => 'Al??nt??',
	'app_featured_image' => '??ne ????kan foto??raf',
	'app_pages' => 'Sayfalar',
	'app_axis' => 'Eksen',
	'app_show' => 'G??ster',
	'app_group_by' => 'Grupla',
	'app_chart_type' => '??izelge t??r??',
	'app_create_new_report' => 'Yeni rapor olu??tur',
	'app_no_reports_yet' => 'Hen??z rapor yok.',
	'app_created_at' => 'tarihinde olu??turuldu',
	'app_updated_at' => 'tarihinde g??ncellendi',
	'app_deleted_at' => 'tarihinde silindi',
	'app_reports_x_axis_field' => 'X-ekseni - l??tfen tarih/zaman se??imi yap??n??z',
	'app_reports_y_axis_field' => 'Y-ekseni - l??tfen tarih/zaman se??imi yap??n??z',
	'app_select_crud_placeholder' => 'L??tfen ??retilecek rapor alan??n?? se??iniz',
	'app_select_dt_placeholder' => 'L??tfen tarih/zamandan birini se??iniz.',
	'app_aggregate_function_use' => 'Kullanmak i??in fnoksiyonlar?? toplay??n??z',
	'app_x_axis_group_by' => 'X-eksenini grupla',
	'app_x_axis_field' => 'X-eksen alan?? (tarih/zaman)',
	'app_y_axis_field' => 'Y-eksen alan??',
	'app_integer_float_placeholder' => 'L??tfen alanlardan birini se??iniz',
	'app_change_notifications_field_1_label' => 'Kullan??c??lara uyar?? mesaj?? g??nder',
	'app_select_users_placeholder' => 'L??tfen kullan??c??lar??n??zdan birini se??iniz',
	'app_is_created' => 'olu??turuldu',
	'app_is_updated' => 'g??ncellendi',
	'app_is_deleted' => 'silindi',
	'app_notifications' => 'Bildiriler',
	'app_notify_user' => 'Kullan??c??ya Bildir',
	'app_create_new_notification' => 'Yeni bildiri olu??tur',
	'app_messages' => 'Mesajlar',
	'app_you_have_no_messages' => 'Mesaj??n??z yok',
	'app_all_messages' => 'T??m mesajlar',
	'app_new_message' => 'Yeni Mesaj',
	'app_outbox' => 'Giden kutusu',
	'app_inbox' => 'Gelen kutusu',
	'app_recipient' => 'Al??c??',
	'app_reset_password' => '??ifreyi yenile',
	'app_reset_password_woops' => '<strong>T??h!</strong> input: ile ilgili sorunlar var',
	'app_email_line1' => 'Hesab??n??zla ilgili ??ifre yenileme talebi ald??k. ',
	'app_email_line2' => '??ifre yenileme talebinden bulunmad??ysan??z bu mesaj?? g??rmezden geliniz.',
	'app_copy_paste_url_bellow' => 'l??tfen ??stteki URLyi yeni bir sayfada a????n??z.',
	'app_stripe_transactions' => 'Stripe Al????veri??leri',
	'app_upgrade_to_premium' => 'Premiuma Ge??in',
	'app_there_were_problems_with_input' => 'Girdide sorunlar var',
	'app_whoops' => 'T??h!',
	'app_csvImport' => 'CSV Y??kleme',
	'app_csv_file_to_import' => 'Y??klenecek CSV dosyas??',
	'app_change_notifications_field_2_label' => 'Kay??t Eklendi??inde',
	'app_when_crud' => 'CRUD Olu??turulurken',
	'app_file_contains_header_row' => 'Dosyada ba??l??k s??tunu mevcut mu?',
	'app_parse_csv' => 'Y??kle',
	'app_import_data' => 'Veriyi ????eri Al',
	'app_imported_rows_to_table' => ':rows s??tunlar?? :table tablosuna eklenmi??tir',
	'global_title' => 'E-Auction',
];