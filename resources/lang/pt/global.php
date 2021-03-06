<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',			'approved' => 'Approved',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Tempo',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
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
	'app_create' => 'Criar',
	'app_save' => 'Salvar',
	'app_edit' => 'Editar',
	'app_view' => 'Visualizar',
	'app_update' => 'Atualizar',
	'app_list' => 'Listar',
	'app_no_entries_in_table' => 'Sem entradas na tabela',
	'app_custom_controller_index' => '??ndice de Controller personalizado.',
	'app_logout' => 'Sair',
	'app_add_new' => 'Novo',
	'app_are_you_sure' => 'Tem certeza?',
	'app_back_to_list' => 'Voltar',
	'app_dashboard' => 'Painel',
	'app_delete' => 'Excluir',
	'app_restore' => 'Restaurar',
	'app_permadel' => 'Excluir',
	'app_all' => 'Todos',
	'app_trash' => 'Lixo',
	'app_delete_selected' => 'Excluir Selecionados',
	'app_category' => 'Categoria',
	'app_categories' => 'Categorias',
	'app_sample_category' => 'Categoria Exemplo',
	'app_questions' => 'Quest??es',
	'app_question' => 'Quest??o',
	'app_answer' => 'Resposta',
	'app_administrator_can_create_other_users' => 'Administrador',
	'app_simple_user' => 'Usu??rio simples',
	'app_title' => 'T??tulo',
	'app_roles' => 'Fun????es',
	'app_role' => 'Fun????o',
	'app_name' => 'Nome',
	'app_password' => 'Senha',
	'app_remember_token' => 'Lembrar Senha',
	'app_permissions' => 'Permiss??es',
	'app_action' => 'A????o',
	'app_forgot_password' => 'Esqueceu sua senha?',
	'app_remember_me' => 'Lembrar-me',
	'app_change_password' => 'Alterar senha',
	'app_print' => 'Imprimir',
	'app_copy' => 'Copiar',
	'app_colvis' => 'Colunas Vis??veis',
	'app_reset_password' => 'Redefinir senha',
	'app_email_greet' => 'Ol??',
	'app_confirm_password' => 'Confirma????o da senha',
	'app_please_select' => 'Selecione por favor',
	'app_sample_question' => 'Quest??o Exemplo',
	'app_sample_answer' => 'Resposta Exemplo',
	'app_faq_management' => 'Gerenciamento de FAQ',
	'app_user_management' => 'Gerenciamento de usu??rios',
	'app_users' => 'Usu??rios',
	'app_user' => 'Usu??rio',
	'app_email' => 'E-mail',
	'app_user_actions' => 'A????es do usu??rio',
	'app_action_model' => 'Modelo de a????o',
	'app_action_id' => 'ID de a????o',
	'app_time' => 'Tempo',
	'app_campaign' => 'Campanha',
	'app_campaigns' => 'Campanhas',
	'app_description' => 'Descri????o',
	'app_valid_from' => 'V??lido de',
	'app_valid_to' => 'V??lido at??',
	'app_discount_amount' => 'Quantia de desconto',
	'app_discount_percent' => 'Percentual de desconto',
	'app_coupons_amount' => 'Quantia de cupons',
	'app_coupons' => 'Cupons',
	'app_code' => 'C??digo',
	'app_redeem_time' => 'Tempo de resgate',
	'app_coupon_management' => 'Gerenciamento de cupons',
	'app_time_management' => 'Gerenciamento de tempo',
	'app_projects' => 'Projetos',
	'app_reports' => 'Relat??rios',
	'app_time_entries' => 'Entradas de tempo',
	'app_work_type' => 'Tipo de trabalho',
	'app_work_types' => 'Tipos de trabalho',
	'app_project' => 'Projeto',
	'app_start_time' => 'Tempo de in??cio',
	'app_end_time' => 'Tempo de final',
	'app_expense_category' => 'Categoria de Despesa',
	'app_expense_categories' => 'Categorias de Despesa',
	'app_expense_management' => 'Gerenciamento de Despesa',
	'app_expenses' => 'Despesas',
	'app_expense' => 'Despesa',
	'app_entry_date' => 'Data de entrada',
	'app_amount' => 'Quantidade',
	'app_income_categories' => 'Categorias de entrada',
	'app_monthly_report' => 'Relat??rio mensal',
	'app_companies' => 'Empresas',
	'app_company_name' => 'Nome da empresa',
	'app_address' => 'Endere??o',
	'app_website' => 'Website',
	'app_contact_management' => 'Gerenciamento de contato',
	'app_contacts' => 'Contatos',
	'app_company' => 'Empresa',
	'app_first_name' => 'Primeiro nome',
	'app_last_name' => '??ltimo nome',
	'app_phone' => 'Telefone',
	'app_phone1' => 'Telefone 1',
	'app_phone2' => 'Telefone 2',
	'app_skype' => 'Skype',
	'app_photo' => 'Foto (m??x. 8 MB)',
	'app_category_name' => 'Nome da categoria',
	'app_product_management' => 'Gerenciamento de produtos',
	'app_products' => 'Produtos',
	'app_product_name' => 'Nome do produto',
	'app_price' => 'Pre??o',
	'app_tags' => 'Tags',
	'app_tag' => 'Tag',
	'app_photo1' => 'Foto1',
	'app_photo2' => 'Foto2',
	'app_photo3' => 'Foto3',
	'app_calendar' => 'Calend??rio',
	'app_statuses' => 'Status',
	'app_task_management' => 'Gerenciamento de tarefas',
	'app_tasks' => 'Tarefas',
	'app_status' => 'Status',
	'app_attachment' => 'Anexo',
	'app_due_date' => 'Data de vencimento',
	'app_assigned_to' => 'Atribu??do',
	'app_assets' => 'Ativos',
	'app_asset' => 'Ativo',
	'app_serial_number' => 'N??mero de s??rie',
	'app_location' => 'Local',
	'app_locations' => 'Locais',
	'app_assigned_user' => 'Atribu??do (usu??rio)',
	'app_notes' => 'Notas',
	'app_assets_history' => 'Hist??rico de ativos',
	'app_assets_management' => 'Gerenciamento de ativos',
	'app_content_management' => 'Gerenciamento de conte??do',
	'app_text' => 'Texto',
	'app_pages' => 'P??ginas',
	'app_axis' => 'Eixo',
	'app_show' => 'Exibir',
	'app_group_by' => 'Agrupar por',
	'app_chart_type' => 'Tipo de gr??fico',
	'app_create_new_report' => 'Criar novo relat??rio',
	'app_no_reports_yet' => 'Nenhum relat??rio ainda.',
	'app_created_at' => 'Criado em',
	'app_updated_at' => 'Atualizado em',
	'app_deleted_at' => 'Exclu??do em',
	'app_reports_x_axis_field' => 'Eixo X - por favor escolha um dos campos de data/hora',
	'app_reports_y_axis_field' => 'Eixo Y - por favor escolha um dos campos num??ricos',
	'app_select_crud_placeholder' => 'Por favor selecione um de seus CRUDs',
	'app_select_dt_placeholder' => 'Por favor selecione um dos campos de data/hora',
	'app_aggregate_function_use' => 'Agregar fun????o a utilizar',
	'app_x_axis_group_by' => 'Eixo X agrupar por',
	'app_x_axis_field' => 'Campo do eixo X (data/hora)',
	'app_y_axis_field' => 'Campo do eixo Y',
	'app_integer_float_placeholder' => 'Por favor selecione um dos campos inteiros/float',
	'app_change_notifications_field_1_label' => 'Enviar notifica????o por e-mail ao Usu??rio',
	'app_select_users_placeholder' => 'Por favor selecione um de seus Usu??rios',
	'app_is_created' => 'foi criado',
	'app_is_updated' => 'foi atualizado',
	'app_is_deleted' => 'foi exclu??do',
	'app_notifications' => 'Notifica????es',
	'app_notify_user' => 'Notificar Usu??rio',
	'app_when_crud' => 'Quando CRUD',
	'app_create_new_notification' => 'Criar nova Notifica????o',
	'app_stripe_transactions' => 'Transa????es Stripe',
	'app_upgrade_to_premium' => 'Atualizar para Premium',
	'app_messages' => 'Mensagens',
	'app_you_have_no_messages' => 'Voc?? n??o possui nenhuma mensagem.',
	'app_all_messages' => 'Todas as mensagens',
	'app_new_message' => 'Nova mensagem',
	'app_outbox' => 'Caixa de sa??da',
	'app_inbox' => 'Caixa de entrada',
	'app_recipient' => 'Destinat??rio',
	'app_subject' => 'Assunto',
	'app_message' => 'Mensagem',
	'app_send' => 'Enviar',
	'app_reply' => 'Responder',
	'app_calendar_sources' => 'Fontes de calend??rio',
	'app_new_calendar_source' => 'Criar nova fonte de calend??rio',
	'app_crud_title' => 'T??tulo do CRUD',
	'app_crud_date_field' => 'Campo de data CRUD',
	'app_prefix' => 'Prefixo',
	'app_label_field' => 'Campo de r??tulo',
	'app_suffix' => 'Sufixo',
	'app_no_calendar_sources' => 'Nenhuma fonte de calend??rio ainda.',
	'app_crud_event_field' => 'Campo de r??tulo do evento',
	'app_create_new_calendar_source' => 'Criar nova Fonte de Calend??rio',
	'app_edit_calendar_source' => 'Editar Fonte de Calend??rio',
	'app_client_management' => 'Gerenciamento de clientes',
	'app_client_management_settings' => 'Configura????es de gerenciamento de clientes',
	'app_country' => 'Pa??s',
	'app_client_status' => 'Status do cliente',
	'app_clients' => 'Clientes',
	'app_client_statuses' => 'Status do cliente',
	'app_currencies' => 'Moedas',
	'app_main_currency' => 'Moeda principal',
	'app_documents' => 'Documentos',
	'app_file' => 'Arquivo',
	'app_income_source' => 'Fonte de entrada',
	'app_income_sources' => 'Fontes de entrada',
	'app_fee_percent' => 'Percentual de taxa',
	'app_note_text' => 'Texto da nota',
	'app_client' => 'Cliente',
	'app_start_date' => 'Data de in??cio',
	'app_budget' => 'Or??amento',
	'app_project_status' => 'Status do projeto',
	'app_project_statuses' => 'Status do projeto',
	'app_transactions' => 'Transa????es',
	'app_transaction_types' => 'Tipos de transa????o',
	'app_transaction_type' => 'Tipo de transa????o',
	'app_transaction_date' => 'Data da transa????o',
	'app_currency' => 'Moeda',
	'app_current_password' => 'Senha atual',
	'app_new_password' => 'Nova senha',
	'app_password_confirm' => 'Confirma????o da nova senha',
	'app_dashboard_text' => 'Voc?? entrou!',
	'app_login' => 'Entrar',
	'app_reset_password_woops' => '<strong> Ops! </strong> H?? problemas com a entrada:',
	'app_email_line1' => 'Voc?? est?? recebendo este e-mail porque n??s recebemos uma solicita????o de redefini????o de senha para a sua conta.',
	'app_email_line2' => 'Se voc?? n??o solicitou redefini????o de senha, nenhuma a????o ?? necess??ria.',
	'app_if_you_are_having_trouble' => 'Se voc?? est?? tendo problemas para clicar no',
	'app_copy_paste_url_bellow' => 'bot??o, copie e cole a URL abaixo no seu navegador web:',
	'app_excerpt' => 'Resumo',
	'app_featured_image' => 'Imagem em destaque',
	'app_change_notifications_field_2_label' => 'Quando entrar no CRUD',
	'app_email_regards' => 'Sauda????es',
	'app_register' => 'Registrar',
	'app_registration' => 'Registro',
	'app_not_approved_title' => 'Voc?? n??o est?? aprovado',
	'app_not_approved_p' => 'Sua conta n??o foi liberada ainda pelo administrador, por favor, aguarde e tente mais tarde.',
	'app_there_were_problems_with_input' => 'H?? problemas com a entrada',
	'app_whoops' => 'Ops!',
	'app_slug' => 'Slug',
	'app_csv' => 'CSV',
	'app_excel' => 'Excel',
	'app_pdf' => 'PDF',
	'app_file_contains_header_row' => 'O arquivo cont??m cabe??alho?',
	'app_csvImport' => 'Importa????o CSV',
	'app_csv_file_to_import' => 'Arquivo CSV para importar',
	'app_parse_csv' => 'Analisar CSV',
	'app_import_data' => 'Importar data',
	'app_imported_rows_to_table' => 'Importado :rows linhas para tabela :table',
	'global_title' => 'E-Auction',
];