<?php
    use yii\cfusermgmt\common\models\Setting;
    
    define('ACTIVE', 1);
    define('INACTIVE', 0);
    define('DELETED', 1);      // For now its used for sending DELETED status (in ajax) , (later can be used to make a record as deleted in database(for now records are actually get deleted from database on request))
    define('VERIFIED', 1);
    define('NOT_VERIFIED', 0);
    define('BY_ADMIN', 1);
    
    //Do not editthis role if not expertise with permission(as this rolename can never be deleted)
    define('SUPER_ADMIN_ROLE_NAME', 'superadmin');
    
    $allSettings=Setting::getAllSettings();

    date_default_timezone_set((isset($allSettings['defaultTimeZone'])) ? $allSettings['defaultTimeZone']['value'] : 'America/New_York');
    
    if(!defined("DEFAULT_PAGE_SIZE")) {define("DEFAULT_PAGE_SIZE", ((isset($allSettings['default_page_size'])) ? $allSettings['default_page_size']['value'] : 10));}
    if(!defined("NOT_FOUND_TEXT")) {define("NOT_FOUND_TEXT", ((isset($allSettings['not_found_text'])) ? $allSettings['not_found_text']['value'] : '<span style="color:red;">Not Found</span>'));}
    if(!defined("DATE_FORMAT")) {define("DATE_FORMAT", ((isset($allSettings['date_format'])) ? $allSettings['date_format']['value'] : 'F jS, Y'));}
    if(!defined("USER_PROFILE_IMAGES_DIRECTORY")) {define("USER_PROFILE_IMAGES_DIRECTORY", ((isset($allSettings['user_profile_images_directory'])) ? $allSettings['user_profile_images_directory']['value'] : 'user_photos'));}
    if(!defined("USER_PROFILE_DEFAULT_IMAGE")) {define("USER_PROFILE_DEFAULT_IMAGE", ((isset($allSettings['user_profile_default_image'])) ? $allSettings['user_profile_default_image']['value'] : 'user-default.jpg'));}  // Place this image under the directory USER_PROFILE_IMAGES_DIRECTORY
    if(!defined("APP_IMAGES_DIRECTORY")) {define("APP_IMAGES_DIRECTORY", ((isset($allSettings['app_images_directory'])) ? $allSettings['app_images_directory']['value'] : 'app_images'));}
    if(!defined("AJAX_LOADING_BIG_IMAGE")) {define("AJAX_LOADING_BIG_IMAGE", ((isset($allSettings['ajax_loading_big_image'])) ? $allSettings['ajax_loading_big_image']['value'] : 'circle-loading-animation.gif'));}
    if(!defined("DEFAULT_STATUS_FOR_NEW_USER")) {define("DEFAULT_STATUS_FOR_NEW_USER", ((isset($allSettings['default_status_for_new_user'])) ? $allSettings['default_status_for_new_user']['value'] : ACTIVE));}
    
    
    
    if(!defined("SITE_NAME")) { define("SITE_NAME", ((isset($allSettings['siteName'])) ? $allSettings['siteName']['value'] : 'Yii User Management Plugin')); }
	if(!defined("NEW_REGISTRATION_IS_ALLOWED")) { define("NEW_REGISTRATION_IS_ALLOWED", ((isset($allSettings['siteRegistration'])) ? $allSettings['siteRegistration']['value'] : 1));}
	if(!defined("ALLOW_USERS_TO_DELETE_ACCOUNT")) {define("ALLOW_USERS_TO_DELETE_ACCOUNT", ((isset($allSettings['allowDeleteAccount'])) ? $allSettings['allowDeleteAccount']['value'] : 0));}
	if(!defined("SEND_REGISTRATION_MAIL")) {define("SEND_REGISTRATION_MAIL", ((isset($allSettings['sendRegistrationMail'])) ? $allSettings['sendRegistrationMail']['value'] : 1));}	
	if(!defined("SEND_PASSWORD_CHANGE_MAIL")) {define("SEND_PASSWORD_CHANGE_MAIL", ((isset($allSettings['sendPasswordChangeMail'])) ? $allSettings['sendPasswordChangeMail']['value'] : 1));}	
	if(!defined("EMAIL_VERIFICATION")) {define("EMAIL_VERIFICATION", ((isset($allSettings['emailVerification'])) ? $allSettings['emailVerification']['value'] : 1));}
	if(!defined("EMAIL_FROM_ADDRESS")) {define("EMAIL_FROM_ADDRESS", ((isset($allSettings['emailFromAddress'])) ? $allSettings['emailFromAddress']['value'] : 'example@example.com'));}
	if(!defined("EMAIL_FROM_NAME")) {define("EMAIL_FROM_NAME", ((isset($allSettings['emailFromName'])) ? $allSettings['emailFromName']['value'] : 'User Management Plugin'));}	
	if(!defined("ALLOW_CHANGE_USERNAME")) {define("ALLOW_CHANGE_USERNAME", ((isset($allSettings['allowChangeUsername'])) ? $allSettings['allowChangeUsername']['value'] : 0));}
	if(!defined("BANNED_USERNAMES")) {define("BANNED_USERNAMES", ((isset($allSettings['bannedUsernames'])) ? $allSettings['bannedUsernames']['value'] : ''));}
	if(!defined("USE_RECAPTCHA")) {define("USE_RECAPTCHA", ((isset($allSettings['useRecaptcha'])) ? $allSettings['useRecaptcha']['value'] : 1));}
	if(!defined("PRIVATE_KEY_FROM_RECAPTCHA_GOOGLE")) {define("PRIVATE_KEY_FROM_RECAPTCHA_GOOGLE", ((isset($allSettings['privateKeyFromRecaptcha'])) ? $allSettings['privateKeyFromRecaptcha']['value'] : ''));}
	if(!defined("PUBLIC_KEY_FROM_RECAPTCHA_GOOLE")) {define("PUBLIC_KEY_FROM_RECAPTCHA_GOOLE", ((isset($allSettings['publicKeyFromRecaptcha'])) ? $allSettings['publicKeyFromRecaptcha']['value'] : ''));}
	if(!defined("LOGIN_REDIRECT_URL_FOR_ADMIN")) {define("LOGIN_REDIRECT_URL_FOR_ADMIN", ((isset($allSettings['loginRedirectUrlForAdmin'])) ? $allSettings['loginRedirectUrlForAdmin']['value'] : ''));}
	if(!defined("LOGOUT_REDIRECT_URL_FOR_ADMIN")) {define("LOGOUT_REDIRECT_URL_FOR_ADMIN", ((isset($allSettings['logoutRedirectUrlForAdmin'])) ? $allSettings['logoutRedirectUrlForAdmin']['value'] : ''));}
	if(!defined("LOGIN_REDIRECT_URL_FOR_USER")) {define("LOGIN_REDIRECT_URL_FOR_USER", ((isset($allSettings['loginRedirectUrlForUser'])) ? $allSettings['loginRedirectUrlForUser']['value'] : ''));}
	if(!defined("LOGOUT_REDIRECT_URL_FOR_USER")) {define("LOGOUT_REDIRECT_URL_FOR_USER", ((isset($allSettings['logoutRedirectUrlForUser'])) ? $allSettings['logoutRedirectUrlForUser']['value'] : ''));}
    if(!defined("USE_PERMISSIONS_FOR_USERS")) {define("USE_PERMISSIONS_FOR_USERS", ((isset($allSettings['permissions'])) ? $allSettings['permissions']['value'] : 1));}
	if(!defined("CHECK_PERMISSIONS_FOR_ADMIN")) {define("CHECK_PERMISSIONS_FOR_ADMIN", ((isset($allSettings['adminPermissions'])) ? $allSettings['adminPermissions']['value'] : 0));}
	if(!defined("DEFAULT_ROLE_NAME")) {define("DEFAULT_ROLE_NAME", ((isset($allSettings['defaultRoleName'])) ? $allSettings['defaultRoleName']['value'] : 'guest'));}
	if(!defined("ADMIN_ROLE_NAME")) {define("ADMIN_ROLE_NAME", ((isset($allSettings['adminRoleName'])) ? $allSettings['adminRoleName']['value'] : 'admin'));}
	
    
    
    
    /*************FOR other apis*******/
	if(!defined("USE_FB_LOGIN")) {define("USE_FB_LOGIN", ((isset($allSettings['useFacebookLogin'])) ? $allSettings['useFacebookLogin']['value'] : 0));}
	if(!defined("FB_APP_ID")) {define("FB_APP_ID", ((isset($allSettings['facebookAppId'])) ? $allSettings['facebookAppId']['value'] : ''));}
	if(!defined("FB_SECRET")) {define("FB_SECRET", ((isset($allSettings['facebookSecret'])) ? $allSettings['facebookSecret']['value'] : ''));}
	if(!defined("FB_SCOPE")) {define("FB_SCOPE", ((isset($allSettings['facebookScope'])) ? $allSettings['facebookScope']['value'] : ''));}
    
	if(!defined("USE_TWT_LOGIN")) {define("USE_TWT_LOGIN", ((isset($allSettings['useTwitterLogin'])) ? $allSettings['useTwitterLogin']['value'] : 0));}
	if(!defined("TWT_APP_ID")) {define("TWT_APP_ID", ((isset($allSettings['twitterConsumerKey'])) ? $allSettings['twitterConsumerKey']['value'] : ''));}
    if(!defined("TWT_SECRET")) {define("TWT_SECRET", ((isset($allSettings['twitterConsumerSecret'])) ? $allSettings['twitterConsumerSecret']['value'] : ''));}
    
	if(!defined("USE_GMAIL_LOGIN")) {define("USE_GMAIL_LOGIN", ((isset($allSettings['useGmailLogin'])) ? $allSettings['useGmailLogin']['value'] : 1));}
    if(!defined("GMAIL_APP_ID")) {define("GMAIL_APP_ID", ((isset($allSettings['gmailAppId'])) ? $allSettings['gmailAppId']['value'] : 1));}
    if(!defined("GMAIL_SECRET_ID")) {define("GMAIL_SECRET_ID", ((isset($allSettings['gmailSecretId'])) ? $allSettings['gmailSecretId']['value'] : 1));}
    
	if(!defined("USE_YAHOO_LOGIN")) {define("USE_YAHOO_LOGIN", ((isset($allSettings['useYahooLogin'])) ? $allSettings['useYahooLogin']['value'] : 1));}
	
    if(!defined("USE_LDN_LOGIN")) {define("USE_LDN_LOGIN", ((isset($allSettings['useLinkedinLogin'])) ? $allSettings['useLinkedinLogin']['value'] : 0));}
	if(!defined("LDN_API_KEY")) {define("LDN_API_KEY", ((isset($allSettings['linkedinApiKey'])) ? $allSettings['linkedinApiKey']['value'] : ''));}
	if(!defined("LDN_SECRET_KEY")) {define("LDN_SECRET_KEY", ((isset($allSettings['linkedinSecretKey'])) ? $allSettings['linkedinSecretKey']['value'] : ''));}
	
    if(!defined("USE_FS_LOGIN")) {define("USE_FS_LOGIN", ((isset($allSettings['useFoursquareLogin'])) ? $allSettings['useFoursquareLogin']['value'] : 0));}
	if(!defined("FS_CLIENT_ID")) {define("FS_CLIENT_ID", ((isset($allSettings['foursquareClientId'])) ? $allSettings['foursquareClientId']['value'] : ''));}
	if(!defined("FS_CLIENT_SECRET")) {define("FS_CLIENT_SECRET", ((isset($allSettings['foursquareClientSecret'])) ? $allSettings['foursquareClientSecret']['value'] : ''));}
	
    if(!defined("VIEW_ONLINE_USER_TIME")) {define("VIEW_ONLINE_USER_TIME", ((isset($allSettings['viewOnlineUserTime'])) ? $allSettings['viewOnlineUserTime']['value'] : 30));}
	if(!defined("USE_HTTPS")) {define("USE_HTTPS", ((isset($allSettings['useHttps'])) ? $allSettings['useHttps']['value'] : 0));}
	if(!defined("HTTPS_URLS")) {define("HTTPS_URLS", ((isset($allSettings['httpsUrls'])) ? $allSettings['httpsUrls']['value'] : ''));}
	
    
    
    
    

    
    /*define('USE_FACEOOK_FOR_SITE', ''); 
    define('FACEBOOK_APPLICATION_ID', ''); 
    define('FACEBOOK_APPLICATION_SECRET_CODE', ''); 
    define('FACEBOOK_PERMISSIONS', ''); //user_status, publish_stream, email

    define('USE_TWITTER_FOR_SITE', ''); 
    define('TWITTER_CONSUMER_KEY', ''); 
    define('TWITTER_CONSUMER_SECRET', ''); 

    define('USE_google_FOR_SITE', ''); 
    define('GOOGLE_API_KEY', ''); 
    define('GOOGLE_SECRET_KEY', ''); 

    define('USE_LINKEDIN_FOR_SITE', ''); 
    define('LINKEDIN_API_KEY', ''); 
    define('LINKEDIN_IN_SECRET_KEY', ''); 


    define('USE_FOURSQUARE_FOR_SITE', ''); 
    define('FOURSQUARE_API_KEY', ''); 
    define('FOURSQUARE_SECRET_KEY', ''); 

    define('USE_YAHOO_FOR_SITE', ''); 
    define('YAHOO_API_KEY', ''); 
    define('YAHOO_SECRET_KEY', ''); 

*/
#Need to configure:
//define('LOGIN_URL_FOR_USER', 'user/login');     //Used in /var/www/yii-plugin/vendor/yiisoft/yii2/web/User.php
//define('LOGIN_URL_FORv_ADMIN', 'user/login');
define('LOGIN_URL', 'user/login');







