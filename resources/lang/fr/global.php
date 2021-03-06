<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',			'approved' => 'Approved',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
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
	'app_create' => 'Cr??er',
	'app_save' => 'Enregistrer',
	'app_edit' => 'Modifier',
	'app_restore' => 'Restaurer',
	'app_permadel' => 'Supprimer d??finitivement',
	'app_all' => 'Tous',
	'app_trash' => 'Corbeille',
	'app_view' => 'Afficher',
	'app_update' => 'Mettre ?? jour',
	'app_list' => 'Lister',
	'app_logout' => 'D??connexion',
	'app_add_new' => 'Ajouter',
	'app_are_you_sure' => '??tes-vous s??r ?',
	'app_back_to_list' => 'Retour ?? la liste',
	'app_dashboard' => 'Tableau de bord',
	'app_delete' => 'Supprimer',
	'app_delete_selected' => 'Supprimer les ??l??ments s??lectionn??s',
	'app_category' => 'Cat??gorie',
	'app_categories' => 'Cat??gories',
	'app_please_select' => 'S??lectionner',
	'app_crud_event_field' => 'Champ de l\'??tiquette d\'??v??nement',
	'app_create_new_calendar_source' => 'Cr??er une nouvelle source de calendrier',
	'app_edit_calendar_source' => 'Modifier la source du calendrier',
	'app_client_management' => 'Gestion des clients',
	'app_client_management_settings' => 'Param??tres de gestion du client',
	'app_country' => 'Pays',
	'app_client_status' => 'Statut du client',
	'app_clients' => 'Clients',
	'app_client_statuses' => 'Statut des clients',
	'app_currencies' => 'Devises',
	'app_main_currency' => 'Devise principale',
	'app_documents' => 'Documents',
	'app_file' => 'Fichier',
	'app_income_source' => 'Source de revenu',
	'app_income_sources' => 'Sources de revenu',
	'app_fee_percent' => 'Pourcentage de frais',
	'app_note_text' => 'Note',
	'app_client' => 'Client',
	'app_start_date' => 'Date de d??but',
	'app_budget' => 'Budget',
	'app_project_status' => 'L\'??tat du projet',
	'app_project_statuses' => 'Statut du projet',
	'app_transactions' => 'Transactions',
	'app_transaction_types' => 'Types de transactions',
	'app_transaction_type' => 'Type de transaction',
	'app_transaction_date' => 'Date de la transaction',
	'app_currency' => 'Devise',
	'app_current_password' => 'Mot de passe actuel',
	'app_new_password' => 'Nouveau mot de passe',
	'app_password_confirm' => 'Confirmation du nouveau mot de passe',
	'app_dashboard_text' => 'Vous ??tes authentifi?? !',
	'app_forgot_password' => 'Mot de passe oubli?? ?',
	'app_remember_me' => 'Se souvenir de moi',
	'app_login' => 'Connexion',
	'app_change_password' => 'Changer le mot de passe',
	'app_print' => 'Imprimer',
	'app_copy' => 'Copier',
	'app_colvis' => 'Visibilit?? de la colonne',
	'app_reset_password' => 'R??initialiser le mot de passe',
	'app_reset_password_woops' => '<strong>Whoops!</strong> Il y a eu des probl??mes d\'entr??e :',
	'app_email_line1' => 'Vous recevez ce courrier ??lectronique parce que nous avons re??u une demande de r??initialisation de mot de passe pour votre compte.',
	'app_email_line2' => 'Si vous n\'avez pas demand?? de r??initialisation d\'un mot de passe, aucune autre action n\'est requise.',
	'app_email_greet' => 'Bonjour',
	'app_email_regards' => 'Cordialement',
	'app_confirm_password' => 'Confirmez le mot de passe',
	'app_if_you_are_having_trouble' => 'Si vous rencontrez des probl??mes, cliquez sur',
	'app_copy_paste_url_bellow' => 'bouton, copiez et collez l\'URL ci-dessous dans votre navigateur Web:',
	'app_register' => 'S\'inscrire',
	'app_registration' => 'Enregistrement',
	'app_not_approved_title' => 'Vous n\'??tes pas approuv??',
	'app_not_approved_p' => 'Votre compte n\'est toujours pas approuv?? par l\'administrateur. Veuillez patienter et r??essayer plus tard.',
	'app_questions' => 'Questions',
	'app_question' => 'Question',
	'app_answer' => 'R??ponse',
	'app_sample_question' => 'Exemple de question',
	'app_sample_answer' => 'Exemple de r??ponse',
	'app_password' => 'Mot de passe',
	'app_remember_token' => 'Se souvenir du jeton',
	'app_permissions' => 'Autorisations',
	'app_user_actions' => 'Actions de l\'utilisateur',
	'app_action' => 'Action',
	'app_time' => 'Heure',
	'app_description' => 'D??scription',
	'app_valid_from' => 'Validation ?? partir de ',
	'app_discount_amount' => 'Montant de l\'abonnement',
	'app_discount_percent' => '% De r??duction',
	'app_coupons_amount' => 'Montant des coupons',
	'app_coupons' => 'Coupons',
	'app_redeem_time' => '??changez le temps',
	'app_coupon_management' => 'Gestion des coupons',
	'app_time_management' => 'Gestion du temps',
	'app_projects' => 'Projet',
	'app_reports' => 'Rapports',
	'app_time_entries' => 'Entr??es de l\'heure',
	'app_work_type' => 'Type de travail',
	'app_work_types' => 'Types de travail',
	'app_project' => 'Projet',
	'app_start_time' => 'Heure de d??but',
	'app_end_time' => 'Heure de fin',
	'app_expense_category' => 'Cat??gorie de d??penses',
	'app_expense_categories' => 'Cat??gories de d??penses',
	'app_expense_management' => 'Gestion des d??penses',
	'app_expenses' => 'D??penses',
	'app_expense' => 'D??pense',
	'app_entry_date' => 'Date d\'entr??e',
	'app_amount' => 'Montant',
	'app_income_categories' => 'Cat??gories de revenu',
	'app_monthly_report' => 'Rapport mensuel',
	'app_companies' => 'Organisme',
	'app_company_name' => 'Nom de l\'organisme',
	'app_address' => 'Addresse',
	'app_website' => 'Site web',
	'app_contact_management' => 'Gestion des contacts',
	'app_contacts' => 'Contacts',
	'app_company' => 'Organisme',
	'app_first_name' => 'Pr??nom',
	'app_last_name' => 'Nom',
	'app_phone' => 'T??l??phone',
	'app_category_name' => 'Nom de la cat??gorie',
	'app_product_management' => 'Gestion des produits',
	'app_products' => 'Produits',
	'app_product_name' => 'D??signation du produit',
	'app_price' => 'Prix',
	'app_calendar' => 'Calendrier',
	'app_statuses' => 'Statut',
	'app_task_management' => 'Gestion des t??ches',
	'app_tasks' => 'T??ches',
	'app_status' => 'Statut',
	'app_attachment' => 'Pi??ce jointe',
	'app_due_date' => 'Date d\'??ch??ance',
	'app_assigned_to' => 'Assign?? ??',
	'app_assets' => 'Les atouts',
	'app_asset' => 'Atout',
	'app_serial_number' => 'Num??ro de s??rie',
	'app_assigned_user' => 'Affect?? (utilisateur)',
	'app_assets_history' => 'Historique des actifs',
	'app_assets_management' => 'Gestion d\'actifs',
	'app_slug' => 'Slug',
	'app_content_management' => 'Gestion de contenu',
	'app_text' => 'Texte',
	'app_excerpt' => 'Extrait',
	'app_featured_image' => 'Image ?? la une',
	'app_axis' => 'Axe',
	'app_show' => 'Afficher',
	'app_group_by' => 'Grouper par',
	'app_chart_type' => 'Type de graphique',
	'app_create_new_report' => 'Cr??er un nouveau rapport',
	'app_select_dt_placeholder' => 'S??lectionnez un des champs date / heure',
	'app_aggregate_function_use' => 'Fonction agr??g??e ?? utiliser',
	'app_change_notifications_field_1_label' => 'Envoyer une notification par courrier ??lectronique ?? l\'utilisateur',
	'app_select_users_placeholder' => 'S??lectionnez un de vos Utilisateurs',
	'app_is_created' => 'est cr????',
	'app_is_updated' => 'est mis ?? jour',
	'app_is_deleted' => 'est supprim??',
	'app_notifications' => 'Notifications',
	'app_notify_user' => 'Notifier l\'utilisateur',
	'app_create_new_notification' => 'Cr??er une nouvelle notification',
	'app_stripe_transactions' => 'Transactions de rayures',
	'app_upgrade_to_premium' => 'Passer ?? la version premium',
	'app_messages' => 'Messages',
	'app_you_have_no_messages' => 'Vous n\'avez pas de messages.',
	'app_all_messages' => 'Tous les messages',
	'app_new_message' => 'Nouveau message',
	'app_outbox' => 'Bo??te d\'envoi',
	'app_inbox' => 'Bo??te de r??ception',
	'app_recipient' => 'Destinataire',
	'app_message' => 'Message',
	'app_send' => 'Envoyer',
	'app_reply' => 'R??pondre',
	'app_calendar_sources' => 'Sources de calendrier',
	'app_new_calendar_source' => 'Cr??er une nouvelle source de calendrier',
	'app_crud_title' => 'Titre de Crud',
	'app_crud_date_field' => 'Champ de dates de Crud',
	'app_prefix' => 'Pr??fixe',
	'app_label_field' => 'Champ d\'??tiquette',
	'app_suffix' => 'Suffixe',
	'app_no_calendar_sources' => 'Il n\'y a pas encore de sources de calendrier.',
	'app_no_entries_in_table' => 'Aucun enregistrement',
	'app_faq_management' => 'Gestion des questions',
	'app_administrator_can_create_other_users' => 'Administrateur',
	'app_simple_user' => 'Utilisateur',
	'app_title' => 'Titre',
	'app_roles' => 'R??les',
	'app_role' => 'R??le',
	'app_user_management' => 'Gestion des Utilisateurs',
	'app_users' => 'Utilisateurs',
	'app_user' => 'Utilisateur',
	'app_name' => 'Nom',
	'app_email' => 'eMail',
	'app_valid_to' => 'Valide jusqu\'??',
	'app_phone1' => 'T??l??phone 1',
	'app_tags' => 'Tags',
	'app_tag' => 'Tag',
	'app_when_crud' => 'Sur modification',
	'app_phone2' => 'T??l??phone 2',
	'app_location' => 'Localisation',
	'app_locations' => 'Localisations',
	'app_created_at' => 'Cr??er ??',
	'app_updated_at' => 'Modifier ?? ',
	'app_deleted_at' => 'Supprimer ??',
	'app_subject' => 'Sujet',
	'app_imported_rows_to_table' => ':rows lignes import??es dans la table :table',
	'app_pages' => 'Pages',
	'app_csv' => 'CSV',
	'app_excel' => 'Excel',
	'app_pdf' => 'PDF',
	'app_import_data' => 'Importer les donn??es ',
	'app_action_model' => 'Mod??le de l\'action',
	'app_action_id' => 'ID de l\'action',
	'app_campaign' => 'Campagne',
	'app_campaigns' => 'Campagnes',
	'app_code' => 'Code',
	'app_skype' => 'Skype',
	'app_photo' => 'Photo (max 8Mo)',
	'app_photo1' => 'Photo 1',
	'app_photo2' => 'Photo 2',
	'app_photo3' => 'Photo 3',
	'app_notes' => 'Notes',
	'app_no_reports_yet' => 'Il n\'y a pas de rapport.',
	'app_whoops' => 'Oups !',
	'app_file_contains_header_row' => 'Le fichier contient t-il une ligne d\'ent??tes.',
	'app_csvImport' => 'Importer CSV.',
	'app_csv_file_to_import' => 'Fichier CSV ?? importer.',
	'app_parse_csv' => 'Analyser CSV.',
	'global_title' => 'E-Auction',
];