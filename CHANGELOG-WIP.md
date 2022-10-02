# Release Notes for Craft CMS 4.3 (WIP)

### Added
- Added a “View” menu to element indexes, which enable users to customize the visible table columns for themselves, without affecting other users. ([#11915](https://github.com/craftcms/cms/pull/11915))
- Added source setting menus to element index pages, which now contain the “Customize sources” option when allowed, and “New subfolder”, “Rename folder”, and “Delete folder” actions on the Assets index page. ([#11906/](https://github.com/craftcms/cms/pull/11906))
- Added the `extraLastNamePrefixes` config setting. ([#11903](https://github.com/craftcms/cms/pull/11903))
- Added the `extraNameSalutations` config setting. ([#11903](https://github.com/craftcms/cms/pull/11903))
- Added the `extraNameSuffixes` config setting. ([#11903](https://github.com/craftcms/cms/pull/11903))
- Added the `canCreateDrafts()` Twig function. ([#11797](https://github.com/craftcms/cms/discussions/11797), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added the `canDelete()` Twig function. ([#11797](https://github.com/craftcms/cms/discussions/11797), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added the `canDeleteForSite()` Twig function. ([#11797](https://github.com/craftcms/cms/discussions/11797), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added the `canDuplicate()` Twig function. ([#11797](https://github.com/craftcms/cms/discussions/11797), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added the `canSave()` Twig function. ([#11797](https://github.com/craftcms/cms/discussions/11797), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added the `canView()` Twig function. ([#11797](https://github.com/craftcms/cms/discussions/11797), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added the `|boolean` Twig filter. ([#11792](https://github.com/craftcms/cms/pull/11792))
- Added the `|float` Twig filter. ([#11792](https://github.com/craftcms/cms/pull/11792))
- Added the `|integer` Twig filter. ([#11792](https://github.com/craftcms/cms/pull/11792))
- Added the `|string` Twig filter. ([#11792](https://github.com/craftcms/cms/pull/11792))
- Added support for the `CRAFT_DOTENV_PATH` PHP constant. ([#11894](https://github.com/craftcms/cms/discussions/11894))
- Added `craft\base\ExpirableElementInterface`. ([#11901](https://github.com/craftcms/cms/pull/11901))
- Added `craft\db\ActiveQuery::collect()`. ([#11842](https://github.com/craftcms/cms/pull/11842))
- Added `craft\elements\actions\Restore::$restorableElementsOnly`.
- Added `craft\enums\DateRangeType`.
- Added `craft\events\AuthorizationCheckEvent::$element`.
- Added `craft\events\CreateTwigEvent`.
- Added `craft\events\DefineAddressFieldLabelEvent`.
- Added `craft\events\DefineAddressFieldsEvent`.
- Added `craft\events\SearchEvent::$scores`. ([#11882](https://github.com/craftcms/cms/discussions/11882))
- Added `craft\helpers\DateRange`.
- Added `craft\helpers\DateTimeHelper::firstWeekDay()`.
- Added `craft\helpers\DateTimeHelper::lastMonth()`.
- Added `craft\helpers\DateTimeHelper::lastWeek()`.
- Added `craft\helpers\DateTimeHelper::lastWeekDay()`.
- Added `craft\helpers\DateTimeHelper::lastYear()`.
- Added `craft\helpers\DateTimeHelper::nextMonth()`.
- Added `craft\helpers\DateTimeHelper::nextWeek()`.
- Added `craft\helpers\DateTimeHelper::nextYear()`.
- Added `craft\helpers\DateTimeHelper::thisMonth()`.
- Added `craft\helpers\DateTimeHelper::thisWeek()`.
- Added `craft\helpers\DateTimeHelper::thisYear()`.
- Added `craft\helpers\DateTimeHelper::today()`.
- Added `craft\helpers\DateTimeHelper::tomorrow()`.
- Added `craft\helpers\DateTimeHelper::yesterday()`.
- Added `craft\helpers\ElementHelper::attributeHtml()`.
- Added `craft\helpers\Html::svg()`. ([#11932](https://github.com/craftcms/cms/pull/11932))
- Added `craft\i18n\FormatConverter::convertDatePhpToHuman()`. ([#10546](https://github.com/craftcms/cms/pull/10546))
- Added `craft\i18n\Locale::FORMAT_HUMAN`.
- Added `craft\nameparsing\CustomLanguage`.
- Added `craft\services\Addresses::EVENT_DEFINE_FIELD_LABEL`. ([#11788](https://github.com/craftcms/cms/discussions/11788))
- Added `craft\services\Addresses::EVENT_DEFINE_USED_FIELDS`. ([#11788](https://github.com/craftcms/cms/discussions/11788))
- Added `craft\services\Addresses::EVENT_DEFINE_USED_SUBDIVISION_FIELDS`. ([#11788](https://github.com/craftcms/cms/discussions/11788))
- Added `craft\services\Addresses::getFieldLabel()`.
- Added `craft\services\Addresses::getUsedFields()`.
- Added `craft\services\Addresses::getUsedSubdivisionFields()`.
- Added `craft\services\Elements::EVENT_AUTHORIZE_CREATE_DRAFTS`. ([#11759](https://github.com/craftcms/cms/discussions/11759), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added `craft\services\Elements::EVENT_AUTHORIZE_DELETE_FOR_SITE`. ([#11759](https://github.com/craftcms/cms/discussions/11759), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added `craft\services\Elements::EVENT_AUTHORIZE_DELETE`. ([#11759](https://github.com/craftcms/cms/discussions/11759), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added `craft\services\Elements::EVENT_AUTHORIZE_DUPLICATE`. ([#11759](https://github.com/craftcms/cms/discussions/11759), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added `craft\services\Elements::EVENT_AUTHORIZE_SAVE`. ([#11759](https://github.com/craftcms/cms/discussions/11759), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added `craft\services\Elements::EVENT_AUTHORIZE_VIEW`. ([#11759](https://github.com/craftcms/cms/discussions/11759), [#11808](https://github.com/craftcms/cms/pull/11808))
- Added `craft\services\Elements::canCreateDrafts()`.
- Added `craft\services\Elements::canDelete()`.
- Added `craft\services\Elements::canDeleteForSite()`.
- Added `craft\services\Elements::canDuplicate()`.
- Added `craft\services\Elements::canSave()`.
- Added `craft\services\Elements::canView()`.
- Added `craft\services\Elements::getIsCollectingCacheInfo()`. ([#11901](https://github.com/craftcms/cms/pull/11901))
- Added `craft\services\Elements::setCacheExpiryDate()`. ([#11901](https://github.com/craftcms/cms/pull/11901))
- Added `craft\services\Elements::startCollectingCacheInfo()`. ([#11901](https://github.com/craftcms/cms/pull/11901))
- Added `craft\services\Elements::stopCollectingCacheInfo()`. ([#11901](https://github.com/craftcms/cms/pull/11901))
- Added `craft\services\Search::EVENT_BEFORE_SCORE_RESULTS`. ([#11882](https://github.com/craftcms/cms/discussions/11882))
- Added `craft\web\Controller::currentUser()`. ([#11754](https://github.com/craftcms/cms/pull/11754), [#11916](https://github.com/craftcms/cms/pull/11916))
- Added `craft\web\View::EVENT_AFTER_CREATE_TWIG`. ([#11774](https://github.com/craftcms/cms/pull/11774))
- Added the `Craft.useMobileStyles()` JavaScript method. ([#11636](https://github.com/craftcms/cms/pull/11636))
- Added `Craft.BaseElementIndex::getParentSource()`.
- Added `Craft.BaseElementIndex::getRootSource()`.
- Added `Craft.BaseElementIndex::getSourceActions()`. ([#11906](https://github.com/craftcms/cms/pull/11906))
- Added `Craft.BaseElementIndex::getSourceLevel()`.

### Changed
- Improved the control panel accessibility. ([#10546](https://github.com/craftcms/cms/pull/10546), [#11534](https://github.com/craftcms/cms/pull/11534), [#11565](https://github.com/craftcms/cms/pull/11565), [#11578](https://github.com/craftcms/cms/pull/11578), [#11589](https://github.com/craftcms/cms/pull/11589), [#11604](https://github.com/craftcms/cms/pull/11604), [#11610](https://github.com/craftcms/cms/pull/11610), [#11611](https://github.com/craftcms/cms/pull/11611), [#11613](https://github.com/craftcms/cms/pull/11613), [#11636](https://github.com/craftcms/cms/pull/11636), [#11662](https://github.com/craftcms/cms/pull/11662)[#11703](https://github.com/craftcms/cms/pull/11703), [#11727](https://github.com/craftcms/cms/pull/11727), [#11763](https://github.com/craftcms/cms/pull/11763), [#11768](https://github.com/craftcms/cms/pull/11768), [#11775](https://github.com/craftcms/cms/pull/11775), [#11844](https://github.com/craftcms/cms/pull/11844), [#11905](https://github.com/craftcms/cms/pull/11905), [#11906](https://github.com/craftcms/cms/pull/11906), [#11911](https://github.com/craftcms/cms/pull/11911), [#11915](https://github.com/craftcms/cms/pull/11915), [#11926](https://github.com/craftcms/cms/discussions/11926))
- Element indexes now respect field layouts’ user conditions when determining which custom field columns to show. ([#11913](https://github.com/craftcms/cms/pull/11913))  
- Element index footers now stick to the bottom of the window, and element action triggers are now inserted into the footer rather than replacing the contents of the page’s toolbar. ([#11844](https://github.com/craftcms/cms/pull/11844))
- Notifications are now shown after executing folder actions on the Assets index page. ([#11906/](https://github.com/craftcms/cms/pull/11906))
- Date range condition rules now support “Today”, “This week”, “This month”, “This year”, “Past 7 days”, “Past 30 days”, “Past 30 days”, “Past year”, “Before…”, and “After…” relative range types, in addition to specifyng a custom date range. ([#11888](https://github.com/craftcms/cms/pull/11888))
- If Live Preview is triggered while a draft is saving, it will now wait until the save completes before opening. ([#11858](https://github.com/craftcms/cms/issues/11858), [#11895](https://github.com/craftcms/cms/pull/11895))
- Addresses now support change tracking.
- It’s now possible to restore assets that were deleted programmatically with `craft\elements\Asset::$keepFile` set to `true`. ([#11761](https://github.com/craftcms/cms/issues/11761))
- Control panel-defined image transforms can now have custom quality values. ([#9622](https://github.com/craftcms/cms/discussions/9622))
- Name parsing now checks for common German salutations, suffixes, and last name prefixes.
- “Generating pending image transforms” jobs no longer attempt to process transforms that had previously failed. ([#11970](https://github.com/craftcms/cms/issues/11970))
- `users/session-info` responses now include a `csrfTokenName` key. ([#11706](https://github.com/craftcms/cms/pull/11706), [#11767](https://github.com/craftcms/cms/pull/11767))
- Twig templates now have `today`, `tomorrow`, and `yesterday` global variables available to them.
- Element query date params now support passing `today`, `tomorrow`, and `yesterday`. ([#10485](https://github.com/craftcms/cms/issues/10485))
- Element queries now support passing ambiguous column names (e.g. `dateCreated`) and field handles into `select()`. ([#11790](https://github.com/craftcms/cms/pull/11790), [#11800](https://github.com/craftcms/cms/pull/11800))
- `{% cache %}` tags now store any HTML registered with `{% html %}` tags. ([#11811](https://github.com/craftcms/cms/discussions/11811))
- `{% cache %}` tags and GraphQL query caches now get a max cache duration based on the fetched/referenced entries’ expiry dates. ([#8525](https://github.com/craftcms/cms/discussions/8525), [#11901](https://github.com/craftcms/cms/pull/11901)) 
- Control panel `.twig` templates are now prioritized over `.html`. ([#11809](https://github.com/craftcms/cms/discussions/11809), [#11840](https://github.com/craftcms/cms/pull/11840))
- `craft\events\DraftEvent::$creatorId` is now nullable. ([#11904](https://github.com/craftcms/cms/issues/11904))
- `craft\fieldlayoutelements\BaseField::statusClass()` and `statusLabel()` now return status info from the element for the attribute specified by `attribute()`.
- `craft\helpers\Component::iconSvg()` now namespaces the SVG contents, and adds `aria-hidden="true"`. ([#11703](https://github.com/craftcms/cms/pull/11703))
- `craft\services\Drafts::createDraft()` now accepts `null` passed to its `$creatorId` argument. ([#11904](https://github.com/craftcms/cms/issues/11904)) 
- `craft\services\Search::EVENT_AFTER_SEARCH` now includes the computed search result scores, set to `craft\events\SearchEvent::$scores`, and any changes made to it will be returned by `searchElements()`. ([#11882](https://github.com/craftcms/cms/discussions/11882))
- `craft\services\Search::EVENT_BEFORE_INDEX_KEYWORDS` is now cancellable by setting `$event->isValid` to `false`. ([#11705](https://github.com/craftcms/cms/discussions/11705))
- `checkboxSelect` inputs without `showAllOption: true` now post an empty value if no options were selected. ([#11748](https://github.com/craftcms/cms/issues/11748))
- Updated Yii to 2.0.46.

### Deprecated
- Deprecated `craft\base\Element::EVENT_AUTHORIZE_CREATE_DRAFTS`. `craft\services\Elements::EVENT_AUTHORIZE_CREATE_DRAFTS` should be used instead.
- Deprecated `craft\base\Element::EVENT_AUTHORIZE_DELETE_FOR_SITE`. `craft\services\Elements::EVENT_AUTHORIZE_DELETE_FOR_SITE` should be used instead.
- Deprecated `craft\base\Element::EVENT_AUTHORIZE_DELETE`. `craft\services\Elements::EVENT_AUTHORIZE_DELETE` should be used instead.
- Deprecated `craft\base\Element::EVENT_AUTHORIZE_DUPLICATE`. `craft\services\Elements::EVENT_AUTHORIZE_DUPLICATE` should be used instead.
- Deprecated `craft\base\Element::EVENT_AUTHORIZE_SAVE`. `craft\services\Elements::EVENT_AUTHORIZE_SAVE` should be used instead.
- Deprecated `craft\base\Element::EVENT_AUTHORIZE_VIEW`. `craft\services\Elements::EVENT_AUTHORIZE_VIEW` should be used instead.
- Deprecated `craft\elements\Address::addressAttributeLabel()`. `craft\services\Addresses::getFieldLabel()` should be used instead.
- Deprecated `craft\services\Elements::getIsCollectingCacheTags()`. `getIsCollectingCacheInfo()` should be used instead. ([#11901](https://github.com/craftcms/cms/pull/11901))
- Deprecated `craft\services\Elements::startCollectingCacheTags()`. `startCollectingCacheInfo()` should be used instead. ([#11901](https://github.com/craftcms/cms/pull/11901))
- Deprecated `craft\services\Elements::stopCollectingCacheTags()`. `stopCollectingCacheInfo()` should be used instead. ([#11901](https://github.com/craftcms/cms/pull/11901))