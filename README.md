Requirments:
* Yii 2 with advanced application template
* Init your application for development mode
* Php 5.4+
* MySql 5.6+

Steps To install the 'cfusermgmt' plugin:
---------------------------------------------------------------------------------------
1. You can use composer to install extension add below line in your composer require
	"codefiretech/cfusermgmt": "dev-master" or Just copy the folder into vendor/yiisoft directory of your ADVANCED application.(While extracting remember that all the hidden files or like .htaccess files are also copied)
Note - If you are using composer then place the vendor/codefiretech/cfusermgmt folder inside vendor/yiisoft folder.
2. Open your extension.php (in yiisoft folder of your application) and add the array in the list of extensions as-
    'yiisoft/cfusermgmt' => 
        array (
          'name' => 'yiisoft/cfusermgmt',
          'version' => '2.0.2.0',
          'alias' => 
          array (
            '@yii/cfusermgmt' => $vendorDir . '/yiisoft/cfusermgmt',
          ),
        ),
3. in common/config/main.php (in components) add below array and change BaseFolderName to your base folder name
    'authManager'=>[
        'class'=>'yii\rbac\DbManager',
        'defaultRoles' => [DEFAULT_ROLE_NAME]
    ],
    'user' => [
        'identityClass' => 'yii\cfusermgmt\common\models\User',
        'enableAutoLogin' => true,
    ],
	'urlManager'=>[
		'showScriptName'=>false,
		'enablePrettyUrl'=>true,
		'enableStrictParsing'=>false,
		'rules'=>[
			[
				'pattern'=>'<controller:\w+>/<action:\w+>',
				'route'=>'<controller>/<action>',
			]
		],
	],
	'urlManagerBackend' => [
		'class' => 'yii\web\urlManager',
		'baseUrl' => '/BaseFolderName/advanced/vendor/yiisoft/cfusermgmt/backend/web',
		'enablePrettyUrl' => true,
		'showScriptName' => false,
	],
	'urlManagerFrontend' => [
		'class' => 'yii\web\urlManager',
		'baseUrl' => '/BaseFolderName/advanced/vendor/yiisoft/cfusermgmt/frontend/web',
		'enablePrettyUrl' => true,
		'showScriptName' => false,
	], 

  add parameter array (sibling to components)
    'params'=>[
        'home_base_path' => __DIR__ . '/../../',
    ]
4. Table name for users and user have a single array of user identity
	* delete User.php from common/models
	* remove user array from backend/config main.php (from components)
	* remove user array from frontend/config main.php (from components)
    * Now user model is placed in new path (vendor\yiisoft\cfusermgmt\common\models) so place your user model function(if any) there.
5. add below line in index.php before $application->run() for both frontend and backend.
 include_once __DIR__ . '/../../vendor/yiisoft/cfusermgmt/common/config/constants.php';
    
6. Include below lines in the (frontend & backend)/web/.htaccess file: (This is to ignore the "index.php" in the url)

<IfModule mod_rewrite.c>
    Options -MultiViews
    RewriteEngine On
    #RewriteBase /path/to/app
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

Order allow,deny
allow from all


NOTES:
-----------------------------
* make sure you have import database from plugin.sql file
* Admin credentials (codefire/111111)
Useful Url example:
* FrontEnd Url (http://localhost/BaseFolderName/advanced/vendor/yiisoft/cfusermgmt/frontend/web/user/login)
* BackEnd Url (http://localhost/BaseFolderName/advanced/vendor/yiisoft/cfusermgmt/backend/web/user/login)


        
