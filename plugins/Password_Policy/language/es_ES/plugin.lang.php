<?php
$lang['PP_Title'] = 'Password Policy - Versión: ';
$lang['PP_SubTitle'] = 'Configuración del plugin';
$lang['PP_submit'] = 'Guardar configuración';
$lang['PP_save_config'] ='Configuración guardada.';
$lang['PP_Disable'] = ' Desactivar (por defecto)';
$lang['PP_Enable'] = ' Activar ';
$lang['PP_Support_txt'] = 'El apoyo oficial sobre este plugin se encuentra solo en el foro de Piwigo:<br>
<a href="http://piwigo.org/forum/viewtopic.php?id=" onclick="window.open(this.href);return false;">Foro Inglés - http://piwigo.org/forum/viewtopic.php?id=</a>';
$lang['PP_PasswordTest'] = 'Test de Contraseña: ';
$lang['PP_ScoreTest'] = 'Resultado: ';
$lang['PP_Error_Password_Mandatory'] = '¡Seguridad: Contraseña obligatoria!';
$lang['PP_Error_Password_Need_Enforcement_%s'] = 'Seguridad: Un sistema de control calcula la puntuación de la complejidad de la contraseñas. La complejidad de la contraseña es demasiado baja (puntuación = %s). Por favor, elija una nueva contraseña más segura siguiendo estas reglas:<br>
- Usar letras y números<br>
- Utilice minúsculas y mayúsculas<br>
- Aumentar su longitud (número de caracteres)<br>
La puntuación mínima de las contraseñas   exigida por el administrador es la siguiente: ';
$lang['PP_Password_Enforced'] = 'Fortalecimiento del nivel de seguridad de las contraseñas';
$lang['PP_Password_Enforced_true'] = ' Activar. Puntuación mínima:';
$lang['PP_AdminPassword_Enforced'] = 'Aplicar a los administradores';
$lang['PP_Password_Reset_Msg'] = 'Por favor cambie su contraseña';
$lang['PP_PwdReset'] = 'Renovar contraseña';
$lang['PP_Password reset selected users'] = 'Solicitud de renovación de contraseñas para usuarios seleccionados';
$lang['PP_Guest cannot be pwdreset'] = 'Renovación de contraseñas no se pueden establecer para visitantes';
$lang['PP_Default user cannot be pwdreset'] = 'Renovación de contraseñas, no se pueden establecer para la cuenta de usuario por defecto!';
$lang['PP_Webmaster cannot be pwdreset'] = 'La contraseña de webmaster no puede ser renovada !';
$lang['PP_Generic cannot be pwdreset'] = 'Renovación de contraseñas no se pueden establecer para cuentas genéricas!';
$lang['PP_Admins cannot be pwdreset'] = 'La renovación de contraseña no puede ser solicitada para un administrador';
$lang['PP_You cannot pwdreset your account'] = 'Renovación de contraseñas no se pueden establecer para su propia cuenta!';
$lang['PP_You need to confirm pwdreset'] = 'Debe confirmar la renovación de contraseñas (casilla de verificación)!';
$lang['PP_PwdReset_Todo'] = 'Contraseñas a renovar';
$lang['PP_PwdReset_Done'] = 'Contraseña renovada';
$lang['PP_PwdReset_NA'] = 'Contraseña original';
$lang['PP %d user pwdreseted'] = 'Se pide renovación de contraseña para el usuario %d';
$lang['PP %d users pwdreseted'] = 'Se pide renovación de contraseña para los usuarios %d';
$lang['PP_passwtestTitle'] = 'Prueba de la complejidad de la contraseña';
$lang['PP_passwtestTitle_d'] = 'Introduzca la contrase&ntilde;a para pruebar y luego haga clic en &quot;c&aacute;lcular complejidad&quot; para ver el resultado.';
$lang['PP_passwTitle_d'] = 'Al habilitar esta opción hace obligatoria la creación de una contraseña en el registro, y requiere la contraseña elegida por el usuario para cumplir un nivel mínimo de complejidad. Si el umbral no se alcanza, la puntuación obtenida y la puntuación mínima que deben alcanzarse se muestran, junto con recomendaciones para aumentar el valor de esta puntuación.<br><br>
Un campo de prueba permite medir la complejidad de la contraseña, y puede hacerse una idea de la puntuación necesaria para alcanzar una contraseña valida .<br><br>
Nota: La puntuación de una contraseña se calcula en función de varios parámetros: longitud, tipo de caracteres utilizados (letras, números, mayúsculas, minúsculas, caracteres especiales). Una puntuación por debajo de 100 se considera bajo, de 100 a 500, la complejidad es mediana, más allá de 500, la seguridad es excelente.';
$lang['PP_passwadmTitle_d'] = 'Un administrador puede crear una cuenta de usuario, con o sin aplicación de la regla de la complejidad informática.<br><br>
Nota: Si el  usuario de la cuenta  creada quiere cambiar la contraseña, y el fortalecimiento de las contraseñas de los usuarios está activo, la misma estará sujeta a la norma establecida.';
$lang['PP_PwdResetTitle_d'] = 'Al habilitar esta opción, se agregará una nueva función en el panel de gestión de usuarios de Piwigo (Usuarios> Administrar) para  solicitar la renovación de la contraseña para los usuarios seleccionados. Además, una nueva columna se agrega para mostrar el estado de contraseñas para cada uno de ellos con los siguientes valores: <br>
- La contraseña debe renovarse:. Una solicitud de renovación de contraseña ha sido planeado <br>
- Password renovado:. La contraseña se ha renovado después de una solicitud <br>
- Password Original:. La contraseña original elegido al crear la cuenta y que nunca ha sido requerido para una renovación <br>
Webmaster, cuentas genéricas y su acompañante están excluidos de esta función. <br>
Estos usuarios serán redirigidos automáticamente a su página de personalización en cada una de sus conexiones hasta que cambien su contraseña y un mensaje explícito se muestrara en esta página.';
$lang['PP_You need to confirm unlock'] = 'Debe confirmar el desbloqueo (casilla de verificación)!';
$lang['PP %d user unlocked'] = '%d usuario desbloqueado';
$lang['PP %d users unlocked'] = '%d usuarios desbloqueados';
$lang['PP_Admins is not unlockable'] = 'Los usuarios administradores no pueden ser bloqueados y no se pueden desbloquear';
$lang['PP_Default user is not unlockable'] = 'Usuario por defecto no se puede bloquear y no se puede desbloquear';
$lang['PP_Generic is not unlockable'] = 'Usuario genéricos no se pueden bloquear y no se pueden desbloquear';
$lang['PP_Guest is not unlockable'] = 'Usuario invitados no se pueden bloquear y no se pueden desbloquear';
$lang['PP_LockedUsers'] = 'Estado del bloqueo';
$lang['PP_LoginAttempts'] = 'Gestión de los intentos fallidos de conexión';
$lang['PP_LoginAttempts_d'] = 'Esta opción permite el registro de los intentos fallidos de conexión a la galería debido a una contraseña incorrecta y bloquear automáticamente la cuenta del usuario en cuestión. Está diseñado para contrarrestar posibles intentos de hacking con el uso de diccionarios de contraseñas.<br/><br/>
<b style=&quot;color: red;&quot;>Webmaster, genéricos y cuentas de invitados están excluidos de esta función.</b><br/><br/>
Al permitir, usted será capaz de especificar el número máximo de intentos fallidos permitidos antes del bloqueo y definir un mensaje personalizado al usuario que ha bloqueado su cuenta. Este mensaje sólo aparece si el usuario tiene éxito en la identificación después del bloqueo.<br/><br/>
Para desbloquear las cuentas, vaya a la interfaz de gestión de usuarios para su galería. Usted encontrará una nueva columna que indica el estado de las cuentas simbolizados por un símbolo rojo (para la cuenta bloqueada) y verde (por cuenta desbloqueado). Seleccionar una o más cuentas para desbloquear y utilizar el botón de desbloqueo diseñado para este propósito.';
$lang['PP_Max number of failed attempts'] = 'Número máximo de intentos fallidos:';
$lang['PP_Max number of failed attempts_d'] = 'El número 0 desactiva el recuento de intentos.';
$lang['PP_Unlock'] = 'Desbloquear';
$lang['PP_Unlock selected users'] = 'Desbloquear los usuarios seleccionados';
$lang['PP_User Locked'] = 'Usuario bloqueado';
$lang['PP_User Not Locked'] = 'Usuario no bloqueado';
$lang['PP_UserLocked_Custom_Txt'] = 'Personalizar el mensaje de información para el usuario bloqueado';
$lang['PP_UserLocked_Custom_Txt_d'] = 'Aquí puede cambiar el texto del mensaje que se muestra al usuario cuya cuenta ha sido bloqueada. Para utilizar varios idiomas, puede utilizar la etiqueta Descripción ampliada del plugin si está activo.';
$lang['PP_User_Account_Locked_Txt'] = 'Lo sentimos, por razones de seguridad el acceso a la galería ha sido bloqueado debido a demasiados intentos de conexión fallidos. Esto puede ser debido a un intento de hacking en su cuenta. Por favor, póngase en contacto con el administrador del sitio para solicitar el desbloqueo.';
$lang['PP_Webmaster is not unlockable'] = 'Usuarios webmasters no pueden ser bloqueados y no se pueden desbloquear';
$lang['PP_You cannot unlock your account'] = 'No puede bloquear su propia cuenta';
$lang['PP_Err_Userlist_Settings'] = 'Esta ficha sólo está disponible si la renovación de contraseñas o cuentas de desbloqueo está activado';
$lang['PP_No_Userlist'] = 'No hay usuarios disponibles para mostrar';
$lang['PP_Pwd_Actions'] = 'Administración de usuarios';
$lang['PP_Pwd_Actions_d'] = 'Desbloqueo de cuentas y renovación de contraseñas se ajustan aquí.<br/><br/>
Selecciona los usuarios antes de seleccionar una acción. Marca el cuadro de confirmación antes de aplicar cualquier acción es obligatorio.<br/><br/>
<b style=&quot;color: red;&quot;>Importante:</b> Acciones aplicadas <u><b>SOLO</b> en las cuentas de visitantes</u> y no administradores, webmaster, por efecto e invitados.';
$lang['PP_Select page number'] = 'Selecciona el número de páginas a mostrar.';
$lang['PP_Select page size'] = 'Selecciona el tamaño de la página.';
$lang['PP_Users_List_Tab'] = 'Administración';
$lang['PP_config_tab'] = 'Configuración';
?>