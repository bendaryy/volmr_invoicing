<?php

return [
    /*
    |--------------------------------------------------------------------------
    | All Titles and static string in blade files - English Language
    |--------------------------------------------------------------------------
    |
    */
    //menu.blade keys
    'dashboard'         => 'Tablero de mandos',
    'users'             => 'Usuarios',
    'settings'          => 'Configuración',
    'apps'              => 'Aplicaciones',
    'countries'         => 'Países',
    'states'            => 'Estados',
    'cities'            => 'Ciudades',
    'roles'             => 'Roles',
    'sign_out'          => 'Cerrar sesión',
    'language'          => 'Idioma',
    'clients'           => 'Clientes',
    'products'          => 'Productos',
    'invoices'          => 'Facturas',
    'general'           => 'General',
    'taxes'             => 'Impuestos',
    'transactions'      => 'Transacciones',
    'categories'        => 'Categorías',
    'invoice_templates' => 'Plantillas de facturas',
    'payments'          => 'Pagos',

    'admin_dashboard' => [
        'dashboard'                   => 'Tablero de mandos',
        'name'                        => 'NOMBRE',
        'registered'                  => 'REGISTRADO',
        'month'                       => 'Mes',
        'year'                        => 'año',
        'week'                        => 'Semana',
        'day'                         => 'Día',
        'total_invoices'              => 'Facturas totales',
        'total_clients'               => 'Total de clientes',
        'total_payments'              => 'Pagos totales',
        'total_products'              => 'Productos totales',
        'total_paid_invoices'         => 'Total de facturas pagadas',
        'total_unpaid_invoices'       => 'Total de facturas impagas',
        'total_partial_paid_invoices' => 'Total de facturas pagadas parcialmente',
        'total_overdue_invoice'       => 'Total de facturas vencidas',
        'payment_overview'            => 'Resumen de pagos',
        'no_record_found'             => 'No se encontró ningún registro',
        'total_amount'                => 'Cantidad total',
        'total_paid'                  => 'Total pagado',
        'total_due'                   => 'Total adeudado',
        'yearly_income_overview'      => 'Resumen de ingresos anuales',
        'monthly_income_overview'     => 'Resumen de ingresos mensuales',
        'invoice_overview'            => 'Resumen de facturas',
        'income_overview'             => 'Resumen de ingresos',
    ],
    'common'          => [
        'save'            => 'Guardar',
        'submit'          => 'Enviar',
        'cancel'          => 'Cancelar',
        'discard'         => 'Descartar',
        'country'         => 'País',
        'state'           => 'Estado',
        'city'            => 'Ciudad',
        'please_wait'     => 'Por favor espere ...',
        'back'            => 'Atrás',
        'action'          => 'Acción',
        'add'             => 'Agregar',
        'edit'            => 'Editar',
        'name'            => 'Nombre',
        'details'         => 'Detalles',
        'service'         => 'Servicio',
        'active'          => 'Activo',
        'de_active'       => 'Desactivado',
        'created_at'      => 'Creado',
        'updated_at'      => 'Actualizado',
        'status'          => 'Estado',
        'filter'          => 'Filtro',
        'actions'         => 'Acciones',
        'address'         => 'Dirección',
        'n/a'             => 'N/A',
        'filter_options'  => 'Opciones de filtro',
        'reset'           => 'Reiniciar',
        'payment_type'    => 'Tipo de pago',
        'pay'             => 'Pagar',
        'value'           => 'Valor',
        'default'         => 'Predeterminado',
        'allow_file_type' => 'Tipos de archivos permitidos',
        'save_send'       => 'Guardar y enviar',
        'save_draft'      => 'Guardar como borrador',
        'last_update'     => 'Última actualización',
        'delete'          => 'Eliminar',
        'reminder'        => 'recordatorio',
    ],

    'user' => [
        'profile_details'  => 'Detalles del perfil',
        'avatar'           => 'Avatar',
        'full_name'        => 'Nombre completo',
        'email'            => 'Correo electrónico',
        'contact_number'   => 'Número de contacto',
        'save_changes'     => 'Guardar cambios',
        'setting'          => 'Configuración',
        'account_setting'  => 'Configuración de la cuenta',
        'change_password'  => 'Cambiar contraseña',
        'current_password' => 'Contraseña actual',
        'new_password'     => 'Nueva contraseña',
        'confirm_password' => 'Confirmar contraseña',
        'account'          => 'Cuenta',
        'user_details'     => 'Detalles del usuario',
        'gender'           => 'Género',
        'phone'            => 'Teléfono',
        'profile'          => 'Perfil',
    ],

    'setting' => [
        'setting'                  => 'Configuración',
        'general'                  => 'General',
        'contact_information'      => 'Información de contacto',
        'currency_settings'        => 'Configuración de moneda',
        'general_details'          => 'Detalles generales',
        'clinic_name'              => 'Nombre de la clínica',
        'specialities'             => 'Especialidades',
        'currencies'                 => 'monedas',
        'prefix'                   => 'Prefijo',
        'address'                  => 'Dirección',
        'postal_code'              => 'Código postal',
        'app_name'                 => 'Nombre de la aplicación',
        'company_name'             => 'Nombre de la empresa',
        'app_logo'                 => 'Logotipo de la aplicación',
        'image_validation'         => 'La imagen debe tener un tamaño de píxel 90 x 60.',
        'company_image_validation' => 'La imagen debe tener un tamaño de píxel 210 x 50.',
        'company_logo'             => 'Logotipo de la empresa',
        'date_format'              => 'Formato de fecha',
        'time_format'              => 'Formato de hora',
        'timezone'                 => 'Zona horaria',
        'decimal_separator'        => 'Separador decimal',
        'thousand_separator'       => 'Separador de mil',
        'company_address'          => 'Dirección de la empresa',
        'company_phone'            => 'Teléfono de la empresa',
        'fav_icon'                 => 'Favicon',
        'invoice_template'         => 'Plantilla de factura',
        'color'                    => 'Color',
        'mail_notifications'       => 'Notificaciones de correo',
    ],

    'client' => [
        'add_user'         => 'Agregar usuario',
        'role'             => 'Rol',
        'first_name'       => 'Nombre',
        'last_name'        => 'Apellido',
        'email'            => 'Correo electrónico',
        'contact_no'       => 'Número de contacto',
        'password'         => 'Contraseña',
        'confirm_password' => 'Confirmar contraseña',
        'gender'           => 'Género',
        'male'             => 'Hombre',
        'female'           => 'Mujer',
        'profile'          => 'Perfil',
        'edit_user'        => 'Editar usuario',
        'client'           => 'Cliente',
        'add_client'       => 'Agregar cliente',
        'website'          => 'Sitio web',
        'address'          => 'Dirección',
        'client_details'   => 'Detalles del cliente',
        'postal_code'      => 'Código postal',
        'notes'            => 'Notas',
        'note'             => 'Nota',
        'city'             => 'Ciudad',
        'state'            => 'Estado',
        'country'          => 'País',
        'created_at'       => 'Fecha',
    ],

    'category' => [
        'add_category'  => 'Agregar categoría',
        'edit_category' => 'Editar categoría',
        'category'      => 'Categoría',
    ],

    'product' => [
        'add_product'     => 'Agregar producto',
        'edit_product'    => 'Editar producto',
        'image'           => 'Imagen',
        'name'            => 'Nombre',
        'code'            => 'Código de producto',
        'category'        => 'Categoría',
        'price'           => 'Precio',
        'unit_price'      => 'Precio unitario',
        'description'     => 'Descripción',
        'product'         => 'Producto',
        'updated_at'      => 'Actualizado en',
        'product_name'    => 'Nombre del producto',
        'product_details' => 'Detalles del producto',
    ],

    'invoice' => [
        'new_invoice'      => 'Nueva factura',
        'edit_invoice'     => 'Editar factura',
        'client'           => 'Cliente',
        'invoice_date'     => 'Fecha de la factura',
        'discount'         => 'Descuento',
        'add'              => 'Agregar',
        'qty'              => 'Cantidad',
        'tax'              => 'Impuestos',
        'price'            => 'Precio',
        'amount'           => 'Importe',
        'invoice_id'       => 'ID de factura',
        'sub_total'        => 'Sub Total',
        'total'            => 'Total',
        'due_date'         => 'Fecha de vencimiento',
        'recurring'        => 'Recurrente',
        'total_tax'        => 'Impuestos',
        'client_name'      => 'Nombre del cliente',
        'client_email'     => 'Correo electrónico del cliente',
        'invoice_details'  => 'Detalles de la factura',
        'add_note_term'    => 'Agregar nota y condiciones',
        'remove_note_term' => 'Eliminar nota y términos',
        'note'             => 'Nota',
        'terms'            => "Condiciones",
        'print_invoice'    => 'Imprimir factura',
        'discount_type'    => 'Tipo de descuento',
        'invoice'          => 'Factura',
        'paid'             => 'Pagado',
        'due_amount'       => 'Importe adeudado',
        'payment_method'   => 'Método de pago',
        'invoice_pdf'      => 'Factura',
        'transactions'     => 'Transacciones',
        'download'         => 'Descargar',
        'payment'          => 'Pago',
        'overview'         => 'Resumen',
        'note_terms'       => 'Nota y condiciones',
        'payment_history'  => 'Historial de pagos',
        'issue_for'        => 'Emitir para',
        'issue_by'         => 'Emitido por',
        'paid_amount'      => 'Monto pagado',
        'remaining_amount' => 'Cantidad restante',
        'client_overview'  => 'DESCRIPCIÓN GENERAL DEL CLIENTE',
        'note_not_found'   => 'Nota no encontrada',
        'terms_not_found'  => 'Términos no encontrados',
        'make_payment'     => 'Hacer el pago',
        'excel_export'     => 'Exportación de Excel',
    ],

    'tax' => [
        'tax'        => 'Impuestos',
        'add_tax'    => 'Agregar impuestos',
        'edit_tax'   => 'Editar impuesto',
        'is_default' => 'Es predeterminado',
        'yes'        => 'Sí',
        'no'         => 'No',
    ],

    'notification' => [
        'notifications'                       => 'Notificaciones',
        'mark_all_as_read'                    => 'Marcar todo como leído',
        'you_don`t_have_any_new_notification' => 'No tienes ninguna notificación nueva',
    ],
    'payment'      => [
        'payment_date'   => 'Fecha de pago',
        'add_payment'    => 'Agregar pago',
        'payable_amount' => 'Monto a pagar',
        'payment_type'   => 'Tipo de pago',
        'payment_mode'   => 'Modo de pago',
        'transaction_id' => 'Id de transacción',
        'payment_amount' => 'Importe del pago',
        'payment_method' => 'Método de pago',
        'edit_payment'   => 'Editar pago',
    ],

    'currency' => [
        'add_currency'  => 'Agregar moneda',
        'edit_currency' => 'Editar moneda',
        'icon'          => 'Icono',
        'currency_code' =>'Código de moneda',
    ],
];