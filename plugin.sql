
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii_git_copied`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('author', '96', 0),
('Superadmin', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1424086540, 1424086540),
('author', 1, NULL, NULL, NULL, 1424086547, 1424086547),
('backend:Site:Index', 2, 'Allow call to Site Index', NULL, NULL, NULL, NULL),
('backend:Site:Login', 2, 'Allow call to Site Login', NULL, NULL, NULL, NULL),
('backend:Site:Logout', 2, 'Allow call to Site Logout', NULL, NULL, NULL, NULL),
('backend:Site:ShowData', 2, 'Allow call to Site ShowData', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:GroupPermission:GetChild', 2, 'Allow call to GroupPermission GetChild', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:GroupPermission:GetChildRole', 2, 'Allow call to GroupPermission GetChildRole', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:GroupPermission:GetParent', 2, 'Allow call to GroupPermission GetParent', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:GroupPermission:GetRolePermission', 2, 'Allow call to GroupPermission GetRolePermission', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:GroupPermission:Index', 2, 'Allow call to GroupPermission Index', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:GroupPermission:Load', 2, 'Allow call to GroupPermission Load', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:Rbac:Init', 2, 'Allow call to Rbac Init', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:Setting:Edit', 2, 'Allow call to Setting Edit', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:Setting:Index', 2, 'Allow call to Setting Index', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:Site:Dashboard', 2, 'Allow call to Site Dashboard', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:Site:Index', 2, 'Allow call to Site Index', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:Site:Login', 2, 'Allow call to Site Login', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:Site:Logout', 2, 'Allow call to Site Logout', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:Site:ShowName', 2, 'Allow call to Site ShowName', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:ChangePassword', 2, 'Allow call to User ChangePassword', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:ChangeUserPassword', 2, 'Allow call to User ChangeUserPassword', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:ClearCache', 2, 'Allow call to User ClearCache', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:Dashboard', 2, 'Allow call to User Dashboard', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:Delete', 2, 'Allow call to User Delete', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:Edit', 2, 'Allow call to User Edit', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:EditProfile', 2, 'Allow call to User EditProfile', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:Index', 2, 'Allow call to User Index', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:Login', 2, 'Allow call to User Login', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:Logout', 2, 'Allow call to User Logout', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:LogoutUser', 2, 'Allow call to User LogoutUser', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:MyProfile', 2, 'Allow call to User MyProfile', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:Online', 2, 'Allow call to User Online', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:PermissionDenied', 2, 'Allow call to User PermissionDenied', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:RequestPasswordReset', 2, 'Allow call to User RequestPasswordReset', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:ResetPassword', 2, 'Allow call to User ResetPassword', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:Save', 2, 'Allow call to User Save', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:SendVerificationEmail', 2, 'Allow call to User SendVerificationEmail', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:Status', 2, 'Allow call to User Status', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:StatusUser', 2, 'Allow call to User StatusUser', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:VerifyEmail', 2, 'Allow call to User VerifyEmail', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:VerifyMyEmail', 2, 'Allow call to User VerifyMyEmail', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:User:View', 2, 'Allow call to User View', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:UserGroup:DeleteRole', 2, 'Allow call to UserGroup DeleteRole', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:UserGroup:Edit', 2, 'Allow call to UserGroup Edit', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:UserGroup:Index', 2, 'Allow call to UserGroup Index', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:UserGroup:Save', 2, 'Allow call to UserGroup Save', NULL, NULL, NULL, NULL),
('cfusermgmt:backend:UserGroup:View', 2, 'Allow call to UserGroup View', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:Site:About', 2, 'Allow call to Site About', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:Site:Contact', 2, 'Allow call to Site Contact', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:Site:Index', 2, 'Allow call to Site Index', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:Site:Login', 2, 'Allow call to Site Login', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:Site:Logout', 2, 'Allow call to Site Logout', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:Site:RequestPasswordReset', 2, 'Allow call to Site RequestPasswordReset', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:Site:ResetPassword', 2, 'Allow call to Site ResetPassword', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:Site:Signup', 2, 'Allow call to Site Signup', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:ChangePassword', 2, 'Allow call to User ChangePassword', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:ClearCache', 2, 'Allow call to User ClearCache', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:Dashboard', 2, 'Allow call to User Dashboard', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:DeleteMyAccount', 2, 'Allow call to User DeleteMyAccount', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:EditProfile', 2, 'Allow call to User EditProfile', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:Index', 2, 'Allow call to User Index', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:Login', 2, 'Allow call to User Login', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:Logout', 2, 'Allow call to User Logout', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:MyProfile', 2, 'Allow call to User MyProfile', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:PermissionDenied', 2, 'Allow call to User PermissionDenied', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:Register', 2, 'Allow call to User Register', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:RegisterUsingApis', 2, 'Allow call to User RegisterUsingApis', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:RequestPasswordReset', 2, 'Allow call to User RequestPasswordReset', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:ResetPassword', 2, 'Allow call to User ResetPassword', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:SendVerifyEmail', 2, 'Allow call to User SendVerifyEmail', NULL, NULL, NULL, NULL),
('cfusermgmt:frontend:User:VerifyEmail', 2, 'Allow call to User VerifyEmail', NULL, NULL, NULL, NULL),
('frontend:Site:About', 2, 'Allow call to Site About', NULL, NULL, NULL, NULL),
('frontend:Site:Contact', 2, 'Allow call to Site Contact', NULL, NULL, NULL, NULL),
('frontend:Site:Index', 2, 'Allow call to Site Index', NULL, NULL, NULL, NULL),
('frontend:Site:Login', 2, 'Allow call to Site Login', NULL, NULL, NULL, NULL),
('frontend:Site:Logout', 2, 'Allow call to Site Logout', NULL, NULL, NULL, NULL),
('frontend:Site:RequestPasswordReset', 2, 'Allow call to Site RequestPasswordReset', NULL, NULL, NULL, NULL),
('frontend:Site:ResetPassword', 2, 'Allow call to Site ResetPassword', NULL, NULL, NULL, NULL),
('frontend:Site:Signup', 2, 'Allow call to Site Signup', NULL, NULL, NULL, NULL),
('guest', 1, NULL, NULL, NULL, 1424086551, 1424086551),
('Superadmin', 1, NULL, NULL, NULL, 1424086525, 1424086525);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Superadmin', 'admin'),
('admin', 'author'),
('admin', 'backend:Site:Index'),
('Superadmin', 'backend:Site:Index'),
('admin', 'backend:Site:Login'),
('Superadmin', 'backend:Site:Login'),
('admin', 'backend:Site:Logout'),
('Superadmin', 'backend:Site:Logout'),
('admin', 'backend:Site:ShowData'),
('Superadmin', 'backend:Site:ShowData'),
('admin', 'cfusermgmt:backend:GroupPermission:GetChild'),
('Superadmin', 'cfusermgmt:backend:GroupPermission:GetChild'),
('admin', 'cfusermgmt:backend:GroupPermission:GetChildRole'),
('Superadmin', 'cfusermgmt:backend:GroupPermission:GetChildRole'),
('admin', 'cfusermgmt:backend:GroupPermission:GetParent'),
('Superadmin', 'cfusermgmt:backend:GroupPermission:GetParent'),
('admin', 'cfusermgmt:backend:GroupPermission:GetRolePermission'),
('Superadmin', 'cfusermgmt:backend:GroupPermission:GetRolePermission'),
('admin', 'cfusermgmt:backend:GroupPermission:Index'),
('Superadmin', 'cfusermgmt:backend:GroupPermission:Index'),
('admin', 'cfusermgmt:backend:GroupPermission:Load'),
('Superadmin', 'cfusermgmt:backend:GroupPermission:Load'),
('admin', 'cfusermgmt:backend:Rbac:Init'),
('Superadmin', 'cfusermgmt:backend:Rbac:Init'),
('admin', 'cfusermgmt:backend:Setting:Edit'),
('Superadmin', 'cfusermgmt:backend:Setting:Edit'),
('admin', 'cfusermgmt:backend:Setting:Index'),
('Superadmin', 'cfusermgmt:backend:Setting:Index'),
('admin', 'cfusermgmt:backend:Site:Dashboard'),
('Superadmin', 'cfusermgmt:backend:Site:Dashboard'),
('admin', 'cfusermgmt:backend:Site:Index'),
('Superadmin', 'cfusermgmt:backend:Site:Index'),
('admin', 'cfusermgmt:backend:Site:Login'),
('Superadmin', 'cfusermgmt:backend:Site:Login'),
('admin', 'cfusermgmt:backend:Site:Logout'),
('Superadmin', 'cfusermgmt:backend:Site:Logout'),
('admin', 'cfusermgmt:backend:Site:ShowName'),
('Superadmin', 'cfusermgmt:backend:Site:ShowName'),
('admin', 'cfusermgmt:backend:User:ChangePassword'),
('Superadmin', 'cfusermgmt:backend:User:ChangePassword'),
('admin', 'cfusermgmt:backend:User:ChangeUserPassword'),
('Superadmin', 'cfusermgmt:backend:User:ChangeUserPassword'),
('admin', 'cfusermgmt:backend:User:ClearCache'),
('Superadmin', 'cfusermgmt:backend:User:ClearCache'),
('admin', 'cfusermgmt:backend:User:Dashboard'),
('Superadmin', 'cfusermgmt:backend:User:Dashboard'),
('admin', 'cfusermgmt:backend:User:Delete'),
('Superadmin', 'cfusermgmt:backend:User:Delete'),
('admin', 'cfusermgmt:backend:User:Edit'),
('Superadmin', 'cfusermgmt:backend:User:Edit'),
('admin', 'cfusermgmt:backend:User:EditProfile'),
('Superadmin', 'cfusermgmt:backend:User:EditProfile'),
('admin', 'cfusermgmt:backend:User:Index'),
('Superadmin', 'cfusermgmt:backend:User:Index'),
('admin', 'cfusermgmt:backend:User:Login'),
('Superadmin', 'cfusermgmt:backend:User:Login'),
('admin', 'cfusermgmt:backend:User:Logout'),
('Superadmin', 'cfusermgmt:backend:User:Logout'),
('admin', 'cfusermgmt:backend:User:LogoutUser'),
('Superadmin', 'cfusermgmt:backend:User:LogoutUser'),
('admin', 'cfusermgmt:backend:User:MyProfile'),
('Superadmin', 'cfusermgmt:backend:User:MyProfile'),
('admin', 'cfusermgmt:backend:User:Online'),
('Superadmin', 'cfusermgmt:backend:User:Online'),
('admin', 'cfusermgmt:backend:User:PermissionDenied'),
('Superadmin', 'cfusermgmt:backend:User:PermissionDenied'),
('admin', 'cfusermgmt:backend:User:RequestPasswordReset'),
('Superadmin', 'cfusermgmt:backend:User:RequestPasswordReset'),
('admin', 'cfusermgmt:backend:User:ResetPassword'),
('Superadmin', 'cfusermgmt:backend:User:ResetPassword'),
('admin', 'cfusermgmt:backend:User:Save'),
('Superadmin', 'cfusermgmt:backend:User:Save'),
('admin', 'cfusermgmt:backend:User:SendVerificationEmail'),
('Superadmin', 'cfusermgmt:backend:User:SendVerificationEmail'),
('admin', 'cfusermgmt:backend:User:Status'),
('Superadmin', 'cfusermgmt:backend:User:Status'),
('admin', 'cfusermgmt:backend:User:StatusUser'),
('Superadmin', 'cfusermgmt:backend:User:StatusUser'),
('admin', 'cfusermgmt:backend:User:VerifyEmail'),
('Superadmin', 'cfusermgmt:backend:User:VerifyEmail'),
('admin', 'cfusermgmt:backend:User:VerifyMyEmail'),
('Superadmin', 'cfusermgmt:backend:User:VerifyMyEmail'),
('admin', 'cfusermgmt:backend:User:View'),
('Superadmin', 'cfusermgmt:backend:User:View'),
('admin', 'cfusermgmt:backend:UserGroup:DeleteRole'),
('Superadmin', 'cfusermgmt:backend:UserGroup:DeleteRole'),
('admin', 'cfusermgmt:backend:UserGroup:Edit'),
('Superadmin', 'cfusermgmt:backend:UserGroup:Edit'),
('admin', 'cfusermgmt:backend:UserGroup:Index'),
('Superadmin', 'cfusermgmt:backend:UserGroup:Index'),
('admin', 'cfusermgmt:backend:UserGroup:Save'),
('Superadmin', 'cfusermgmt:backend:UserGroup:Save'),
('admin', 'cfusermgmt:backend:UserGroup:View'),
('Superadmin', 'cfusermgmt:backend:UserGroup:View'),
('admin', 'cfusermgmt:frontend:Site:About'),
('Superadmin', 'cfusermgmt:frontend:Site:About'),
('admin', 'cfusermgmt:frontend:Site:Contact'),
('Superadmin', 'cfusermgmt:frontend:Site:Contact'),
('admin', 'cfusermgmt:frontend:Site:Index'),
('Superadmin', 'cfusermgmt:frontend:Site:Index'),
('admin', 'cfusermgmt:frontend:Site:Login'),
('Superadmin', 'cfusermgmt:frontend:Site:Login'),
('admin', 'cfusermgmt:frontend:Site:Logout'),
('Superadmin', 'cfusermgmt:frontend:Site:Logout'),
('admin', 'cfusermgmt:frontend:Site:RequestPasswordReset'),
('Superadmin', 'cfusermgmt:frontend:Site:RequestPasswordReset'),
('admin', 'cfusermgmt:frontend:Site:ResetPassword'),
('Superadmin', 'cfusermgmt:frontend:Site:ResetPassword'),
('admin', 'cfusermgmt:frontend:Site:Signup'),
('Superadmin', 'cfusermgmt:frontend:Site:Signup'),
('admin', 'cfusermgmt:frontend:User:ChangePassword'),
('author', 'cfusermgmt:frontend:User:ChangePassword'),
('Superadmin', 'cfusermgmt:frontend:User:ChangePassword'),
('admin', 'cfusermgmt:frontend:User:ClearCache'),
('Superadmin', 'cfusermgmt:frontend:User:ClearCache'),
('admin', 'cfusermgmt:frontend:User:Dashboard'),
('author', 'cfusermgmt:frontend:User:Dashboard'),
('Superadmin', 'cfusermgmt:frontend:User:Dashboard'),
('admin', 'cfusermgmt:frontend:User:DeleteMyAccount'),
('author', 'cfusermgmt:frontend:User:DeleteMyAccount'),
('Superadmin', 'cfusermgmt:frontend:User:DeleteMyAccount'),
('admin', 'cfusermgmt:frontend:User:EditProfile'),
('author', 'cfusermgmt:frontend:User:EditProfile'),
('Superadmin', 'cfusermgmt:frontend:User:EditProfile'),
('admin', 'cfusermgmt:frontend:User:Index'),
('author', 'cfusermgmt:frontend:User:Index'),
('guest', 'cfusermgmt:frontend:User:Index'),
('Superadmin', 'cfusermgmt:frontend:User:Index'),
('admin', 'cfusermgmt:frontend:User:Login'),
('author', 'cfusermgmt:frontend:User:Login'),
('guest', 'cfusermgmt:frontend:User:Login'),
('Superadmin', 'cfusermgmt:frontend:User:Login'),
('admin', 'cfusermgmt:frontend:User:Logout'),
('author', 'cfusermgmt:frontend:User:Logout'),
('guest', 'cfusermgmt:frontend:User:Logout'),
('Superadmin', 'cfusermgmt:frontend:User:Logout'),
('admin', 'cfusermgmt:frontend:User:MyProfile'),
('author', 'cfusermgmt:frontend:User:MyProfile'),
('Superadmin', 'cfusermgmt:frontend:User:MyProfile'),
('admin', 'cfusermgmt:frontend:User:PermissionDenied'),
('author', 'cfusermgmt:frontend:User:PermissionDenied'),
('Superadmin', 'cfusermgmt:frontend:User:PermissionDenied'),
('admin', 'cfusermgmt:frontend:User:Register'),
('author', 'cfusermgmt:frontend:User:Register'),
('guest', 'cfusermgmt:frontend:User:Register'),
('Superadmin', 'cfusermgmt:frontend:User:Register'),
('admin', 'cfusermgmt:frontend:User:RegisterUsingApis'),
('Superadmin', 'cfusermgmt:frontend:User:RegisterUsingApis'),
('admin', 'cfusermgmt:frontend:User:RequestPasswordReset'),
('author', 'cfusermgmt:frontend:User:RequestPasswordReset'),
('guest', 'cfusermgmt:frontend:User:RequestPasswordReset'),
('Superadmin', 'cfusermgmt:frontend:User:RequestPasswordReset'),
('admin', 'cfusermgmt:frontend:User:ResetPassword'),
('author', 'cfusermgmt:frontend:User:ResetPassword'),
('guest', 'cfusermgmt:frontend:User:ResetPassword'),
('Superadmin', 'cfusermgmt:frontend:User:ResetPassword'),
('admin', 'cfusermgmt:frontend:User:SendVerifyEmail'),
('author', 'cfusermgmt:frontend:User:SendVerifyEmail'),
('Superadmin', 'cfusermgmt:frontend:User:SendVerifyEmail'),
('admin', 'cfusermgmt:frontend:User:VerifyEmail'),
('author', 'cfusermgmt:frontend:User:VerifyEmail'),
('Superadmin', 'cfusermgmt:frontend:User:VerifyEmail'),
('admin', 'frontend:Site:About'),
('Superadmin', 'frontend:Site:About'),
('admin', 'frontend:Site:Contact'),
('Superadmin', 'frontend:Site:Contact'),
('admin', 'frontend:Site:Index'),
('Superadmin', 'frontend:Site:Index'),
('admin', 'frontend:Site:Login'),
('Superadmin', 'frontend:Site:Login'),
('admin', 'frontend:Site:Logout'),
('Superadmin', 'frontend:Site:Logout'),
('admin', 'frontend:Site:RequestPasswordReset'),
('Superadmin', 'frontend:Site:RequestPasswordReset'),
('admin', 'frontend:Site:ResetPassword'),
('Superadmin', 'frontend:Site:ResetPassword'),
('admin', 'frontend:Site:Signup'),
('Superadmin', 'frontend:Site:Signup'),
('author', 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE IF NOT EXISTS `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `user_id`, `token`, `duration`, `used`, `created`, `expires`) VALUES
(5, 1, '7948c60a1d7d89a73920be9705d4a121', '2 weeks', 0, '2015-01-09 12:38:04', '2015-01-23 12:38:04'),
(6, 1, '41cb218235863452c2287bbc83d3e097', '2 weeks', 0, '2015-01-09 12:38:04', '2015-01-23 12:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1420541648),
('m130524_201442_init', 1420541658);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `name_public` text,
  `value` varchar(256) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `name_public`, `value`, `type`) VALUES
(1, 'defaultTimeZone', 'Enter default time zone identifier', 'America/New_York', 'input'),
(2, 'siteName', 'Enter Your Site Name', 'YUMP', 'input'),
(3, 'siteRegistration', 'New Registration is allowed or not', '1', 'checkbox'),
(4, 'allowDeleteAccount', 'Allow users to delete account', '1', 'checkbox'),
(5, 'sendRegistrationMail', 'Send Registration Mail After User Registered', '1', 'checkbox'),
(6, 'sendPasswordChangeMail', 'Send Password Change Mail After User changed password', '1', 'checkbox'),
(7, 'emailVerification', 'Want to verify user''s email address?', '0', 'checkbox'),
(8, 'emailFromAddress', 'Enter email by which emails will be send.', 'example@yump.com', 'input'),
(9, 'emailFromName', 'Enter Email From Name', 'Yii User Management Plugin', 'input'),
(10, 'bannedUsernames', 'Set banned usernames comma separated(no space, no quotes)', 'Administrator, SuperAdmin', 'input'),
(11, 'allowChangeUsername', 'Do you want to allow users to change their username?', '1', 'checkbox'),
(12, 'viewOnlineUserTime', 'You can view online users and guest from last few minutes, set time in minutes ', '30', 'input'),
(13, 'useHttps', 'Do you want to HTTPS for whole site?', '0', 'checkbox'),
(14, 'httpsUrls', 'You can set selected urls for HTTPS (e.g. users/login, users/register)', NULL, 'input'),
(15, 'loginRedirectUrlForAdmin', 'Enter URL where ADMIN will be redirected after login ', 'user/dashboard', 'input'),
(16, 'logoutRedirectUrlForAdmin', 'Enter URL where ADMIN will be redirected after logout\r\n(Warning: It should be a public action)', 'user/login', 'input'),
(17, 'loginRedirectUrlForUser', 'Enter URL where USER will be redirected after login', 'user/my-profile', 'input'),
(18, 'logoutRedirectUrlForUser', 'Enter URL where USER will be redirected after logout \r\n(Warning: It should be a public action)', 'user/index', 'input'),
(19, 'default_status_for_new_user', 'The new registering user will be registered as by default. For ACTIVE(Checked) or INACTIVE(Unchecked) ', '1', 'checkbox'),
(20, 'defaultRoleName', 'Enter default Role name for user registration (Warning: This role should exist in the Roles of your application(if you are using permisssions))', 'author', 'input'),
(21, 'adminRoleName', 'Enter Admin Role Name \r\n(Warning:By deafult ''Superadmin'' is the super admin on application roles(user roles) and this can never be deleted. If you want to specify other user role as admin, you can do that here)', 'admin', 'input'),
(22, 'permissions', 'Do you Want to enable permissions for users?', '1', 'checkbox'),
(23, 'adminPermissions', 'Do you want to check permissions for Admin?', '0', 'checkbox'),
(24, 'app_images_directory', 'Directory for application images ', 'app_images', 'input'),
(25, 'user_profile_images_directory', 'Enter Image directory name where users profile photos will be uploaded. This directory should be in (frontend or backend respectively)/web/images directory', 'user_photos', 'input'),
(26, 'user_profile_default_image', 'Default image for profile image not found', 'user-default.jpg', 'input'),
(27, 'default_page_size', 'No. of results to show per page in listing ', '10', 'input'),
(28, 'date_format', 'Date Format to show the dates in application', 'F jS, Y', 'input'),
(29, 'useRecaptcha', 'Do you want to captcha support on registration form?', '0', 'checkbox'),
(30, 'privateKeyFromRecaptcha', 'Enter private key for Recaptcha from google', 'currently not in use', 'input'),
(31, 'publicKeyFromRecaptcha', 'Enter public key for recaptcha from google', 'currently not in use', 'input'),
(32, 'useFacebookLogin', 'Want to use Facebook Connect on your site?', '0', 'checkbox'),
(33, 'facebookAppId', 'Facebook Application Id', '', 'input'),
(34, 'facebookSecret', 'Facebook Application Secret Code', '', 'input'),
(35, 'facebookScope', 'Facebook Permissions', 'user_status, publish_stream, email', 'input'),
(36, 'useTwitterLogin', 'Want to use Twitter Connect on your site?', '0', 'checkbox'),
(37, 'twitterConsumerKey', 'Twitter Consumer Key', '', 'input'),
(38, 'twitterConsumerSecret', 'Twitter Consumer Secret', '', 'input'),
(39, 'useGmailLogin', 'Want to use Gmail Connect on your site?', '1', 'checkbox'),
(40, 'gmailAppId', 'GMail Application Id', '', 'input'),
(41, 'gmailSecretId', 'GMail Application Secret Code', '', 'input'),
(42, 'useYahooLogin', 'Want to use Yahoo Connect on your site?', '1', 'checkbox'),
(43, 'useLinkedinLogin', 'Want to use Linkedin Connect on your site?', '0', 'checkbox'),
(44, 'linkedinApiKey', 'Linkedin Api Key', '', 'input'),
(45, 'linkedinSecretKey', 'Linkedin Secret Key', '', 'input'),
(46, 'useFoursquareLogin', 'Want to use Foursquare Connect on your site?', '0', 'checkbox'),
(47, 'foursquareClientId', 'Foursquare Client Id', '', 'input'),
(48, 'foursquareClientSecret', 'Foursquare Client Secret', '', 'input'),
(49, 'not_found_text', 'The text to show when results not found for a particular attribute', '<span style="color:red;">Not Found</span>', NULL),
(50, 'ajax_loading_big_image', 'Big ajax loading image for ajax requests while in process', 'circle-loading-animation.gif', 'input');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_emails`
--

CREATE TABLE IF NOT EXISTS `tmp_emails` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` tinyint(3) DEFAULT '0',
  `role` tinyint(1) DEFAULT '0',
  `fb_id` bigint(100) DEFAULT NULL,
  `fb_access_token` text,
  `twt_id` bigint(100) DEFAULT NULL,
  `twt_access_token` text,
  `twt_access_secret` text,
  `ldn_id` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `email_verified` tinyint(1) DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL,
  `by_admin` tinyint(1) DEFAULT '0',
  `created_at` varchar(10) DEFAULT NULL,
  `updated_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `group_id`, `role`, `fb_id`, `fb_access_token`, `twt_id`, `twt_access_token`, `twt_access_secret`, `ldn_id`, `status`, `email_verified`, `last_login`, `by_admin`, `created_at`, `updated_at`) VALUES
(1, 'test', 'user', 'info@codefire.in', 'codefire', 'w1LvF4zcQRbRvJXJhSC1TE3UR1FfVGKm', '$2y$13$muBE9jjk.L/TXyUtwnZ/oOV/4Ou1YPgD.bibyg8B7u3gEh47xSorW', 'o6Wp1aNkt_xo5R20V2utCq0cWXIdZv5F_1422427173', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2015-01-08 14:15:33', 1, '1421403049', '1424156882');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE IF NOT EXISTS `user_activities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `useragent` varchar(256) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `last_action` int(10) DEFAULT NULL,
  `last_url` text,
  `logout_time` int(10) DEFAULT NULL,
  `user_browser` text,
  `ip_address` varchar(50) DEFAULT NULL,
  `logout` int(11) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` varchar(10) DEFAULT NULL,
  `updated_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=273 ;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`id`, `name`, `username`, `email`, `useragent`, `user_id`, `last_action`, `last_url`, `logout_time`, `user_browser`, `ip_address`, `logout`, `deleted`, `status`, `created_at`, `updated_at`) VALUES
(272, 'Test User', 'codefire', 'info@codefire.in', NULL, 1, NULL, 'user/permission-denied', NULL, 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', '127.0.0.1', 0, 0, 1, '1424158621', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `gender` enum('M','F','O') DEFAULT NULL COMMENT 'M=>Male, F=>Femaile, O=>Any Other',
  `photo` text,
  `bday` varchar(10) DEFAULT NULL,
  `location` varchar(256) DEFAULT NULL,
  `marital_status` enum('M','U','D','W') DEFAULT NULL COMMENT 'M => Married, U=>Unmarried, D=>Divorced, W=>Widowed',
  `cellphone` varchar(15) DEFAULT NULL,
  `web_page` text,
  `created_at` varchar(11) DEFAULT NULL,
  `updated_at` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `gender`, `photo`, `bday`, `location`, `marital_status`, `cellphone`, `web_page`, `created_at`, `updated_at`) VALUES
(1, 1, 'M', 'User (1).png', '15-01-2015', 'Noida', 'D', '1111111111', 'http://mywebpage.com/mypage', '2015-01-07 ', '2015-01-07 ');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
