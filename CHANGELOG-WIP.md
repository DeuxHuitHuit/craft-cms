# Release Notes for Craft CMS 4.13 (WIP)

### Administration
- Added the “Language” element condition rule. ([#15952](https://github.com/craftcms/cms/discussions/15952))
- Added `pc/*` commands as an alias of `project-config/*`.
- Added the `--except`, `--minor-only`, and `--patch-only` options to the `update` command. ([#15829](https://github.com/craftcms/cms/pull/15829))

### Development
- Added the `encodeUrl()` Twig function. ([#15838](https://github.com/craftcms/cms/issues/15838))
- Added support for passing aliased field handles into element queries’ `select()`/`addSelect()` methods. ([#15827](https://github.com/craftcms/cms/issues/15827))
- Added support for appending subpaths to environment variable names in environmental settings (e.g. `$PRIMARY_SITE_URL/uploads`).

### Extensibility
- Added `craft\base\RequestTrait::getIsWebRequest()`. ([#15690](https://github.com/craftcms/cms/pull/15690))
- Added `craft\events\ApplyFieldSaveEvent`. ([#15872](https://github.com/craftcms/cms/discussions/15872))
- Added `craft\events\DefineAddressCountriesEvent`. ([#15711](https://github.com/craftcms/cms/pull/15711))
- Added `craft\filters\BasicHttpAuthLogin`. ([#15720](https://github.com/craftcms/cms/pull/15720))
- Added `craft\filters\BasicHttpAuthStatic`. ([#15720](https://github.com/craftcms/cms/pull/15720))
- Added `craft\filters\ConditionalFilterTrait`. ([#15948](https://github.com/craftcms/cms/pull/15948))
- Added `craft\filters\UtilityAccess`.
- Added `craft\helpers\Session::addFlash()`.
- Added `craft\helpers\Session::getAllFlashes()`.
- Added `craft\helpers\Session::getFlash()`.
- Added `craft\helpers\Session::hasFlash()`.
- Added `craft\helpers\Session::removeAllFlashes()`.
- Added `craft\helpers\Session::removeFlash()`.
- Added `craft\helpers\UrlHelper::encodeUrl()`. ([#15838](https://github.com/craftcms/cms/issues/15838))
- Added `craft\log\MonologTarget::getAllowLineBreaks()`.
- Added `craft\log\MonologTarget::getFormatter()`.
- Added `craft\log\MonologTarget::getLevel()`.
- Added `craft\log\MonologTarget::getMaxFiles()`.
- Added `craft\log\MonologTarget::getName()`.
- Added `craft\log\MonologTarget::getProcessor()`.
- Added `craft\log\MonologTarget::getUseMicrosecondTimestamps()`.
- Added `craft\services\Addresses::EVENT_DEFINE_ADDRESS_COUNTRIES`. ([#15711](https://github.com/craftcms/cms/pull/15711))
- Added `craft\services\Addresses::getCountryList()`. ([#15711](https://github.com/craftcms/cms/pull/15711))
- Added `craft\services\Fields::EVENT_BEFORE_APPLY_FIELD_SAVE`. ([#15872](https://github.com/craftcms/cms/discussions/15872))
- Added `craft\services\Gc::deleteOrphanedFieldLayouts()`.
- Added `craft\web\View::registerCpTwigExtension()`.
- Added `craft\web\View::registerSiteTwigExtension()`.
- Improved support for creating log targets for third party logging services. ([#14974](https://github.com/craftcms/cms/pull/14974))
- Deprecated the `enableBasicHttpAuth` config setting. `craft\filters\BasicHttpAuthLogin` should be used instead. ([#15720](https://github.com/craftcms/cms/pull/15720))
- Added the `serializeForm` event to `Craft.ElementEditor`. ([#15794](https://github.com/craftcms/cms/discussions/15794))

### System
- `Location` headers added via `craft\web\Response::redirect()` are now set to encoded URLs. ([#15838](https://github.com/craftcms/cms/issues/15838)) 
- Fixed a bug where orphaned field layouts weren’t getting garbage collected. ([#16032](https://github.com/craftcms/cms/issues/16032))
