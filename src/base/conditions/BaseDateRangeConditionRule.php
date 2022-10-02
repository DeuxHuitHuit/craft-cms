<?php

namespace craft\base\conditions;

use Craft;
use craft\enums\DateRangeType;
use craft\enums\PeriodType;
use craft\fields\Date;
use craft\helpers\ArrayHelper;
use craft\helpers\Cp;
use craft\helpers\DateRange;
use craft\helpers\DateTimeHelper;
use craft\helpers\Html;
use craft\helpers\UrlHelper;
use DateTime;
use Exception;

/**
 * BaseDateRangeConditionRule provides a base implementation for condition rules that are composed of date range inputs.
 *
 * @property string|null $startDate
 * @property string|null $endDate
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 4.0.0
 */
abstract class BaseDateRangeConditionRule extends BaseConditionRule
{
    /**
     * @var string
     * @phpstan-var DateRangeType::*
     * @since 4.3.0
     */
    public string $rangeType = DateRangeType::Today;

    /**
     * @var string
     * @since 4.3.0
     */
    public string $periodType = PeriodType::Days;

    /**
     * @var float|null
     * @since 4.3.0
     */
    public ?float $periodValue = null;

    /**
     * @var string|null
     */
    private ?string $_startDate = null;

    /**
     * @var string|null
     */
    private ?string $_endDate = null;

    /**
     * @inheritdoc
     */
    public function __construct($config = [])
    {
        if (
            !isset($config['attributes']['rangeType']) &&
            (!empty($config['attributes']['startDate']) || !empty($config['attributes']['endDate']))
        ) {
            $config['attributes']['rangeType'] = DateRangeType::Range;
        }

        parent::__construct($config);
    }

    /**
     * @return string|null
     */
    public function getStartDate(): ?string
    {
        return $this->_startDate;
    }

    /**
     * @param mixed $value
     */
    public function setStartDate(mixed $value): void
    {
        $this->_startDate = ($value ? DateTimeHelper::toIso8601($value) : null);
    }

    /**
     * @return string|null
     */
    public function getEndDate(): ?string
    {
        return $this->_endDate;
    }

    /**
     * @param mixed $value
     */
    public function setEndDate(mixed $value): void
    {
        $this->_endDate = ($value ? DateTimeHelper::toIso8601($value) : null);
    }

    /**
     * Returns the input container attributes.
     *
     * @return array
     */
    protected function containerAttributes(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getConfig(): array
    {
        return array_merge(parent::getConfig(), [
            'rangeType' => $this->rangeType,
            'periodType' => $this->periodType,
            'periodValue' => $this->periodValue,
            'startDate' => $this->getStartDate(),
            'endDate' => $this->getEndDate(),
        ]);
    }

    /**
     * @inheritdoc
     * @noinspection PhpNamedArgumentsWithChangedOrderInspection
     */
    protected function inputHtml(): string
    {
        $rangeTypeOptionsHtml = Html::beginTag('ul', ['class' => 'padded']);
        $foundAdvancedRuleType = false;

        foreach (DateRange::rangeTypeOptions() as $value => $label) {
            if (!$foundAdvancedRuleType && in_array($value, [DateRangeType::Before, DateRangeType::After, DateRangeType::Range])) {
                $rangeTypeOptionsHtml .= Html::tag('hr', options: ['class' => 'padded']);
                $foundAdvancedRuleType = true;
            }

            $rangeTypeOptionsHtml .= Html::tag('li',
                Html::a($label, options: [
                    'class' => $value === $this->rangeType ? 'sel' : false,
                    'data' => ['value' => $value],
                ])
            );
        }
        $rangeTypeOptionsHtml .= Html::endTag('ul');

        $buttonId = 'date-range-btn';
        $inputId = 'date-range-input';
        $menuId = 'date-range-menu';

        $view = Craft::$app->getView();
        $view->registerJsWithVars(
            fn($buttonId, $inputId) => <<<JS
Garnish.requestAnimationFrame(() => {
  const \$button = $('#' + $buttonId);
  \$button.menubtn().data('menubtn').on('optionSelect', event => {
    const \$option = $(event.option);
    \$button.text(\$option.text()).removeClass('add');
    // Don't use data('value') here because it could result in an object if data-value is JSON
    const \$input = $('#' + $inputId).val(\$option.attr('data-value'));
    htmx.trigger(\$input[0], 'change');
  });
});
JS,
            [
                $view->namespaceInputId($buttonId),
                $view->namespaceInputId($inputId),
            ]
        );

        $html = Html::button(DateRange::rangeTypeOptions()[$this->rangeType], [
            'id' => $buttonId,
            'class' => ['btn', 'menubtn'],
            'autofocus' => false,
            'aria' => [
                'label' => Craft::t('app', 'Date Range'),
            ],
        ]) .
        Html::tag('div', $rangeTypeOptionsHtml, [
            'id' => $menuId,
            'class' => 'menu',
        ]) .
        Html::hiddenInput('rangeType', $this->rangeType, [
            'id' => $inputId,
            'hx' => [
                'post' => UrlHelper::actionUrl('conditions/render'),
            ],
        ]);

        if ($this->rangeType === DateRangeType::Range) {
            $html .= Html::tag(
                    'div',
                    options: ['class' => ['flex', 'flex-nowrap']],
                    content:
                    Html::label(Craft::t('app', 'From'), 'start-date-date') .
                    Html::tag('div',
                        Cp::dateHtml([
                            'id' => 'start-date',
                            'name' => 'startDate',
                            'value' => $this->getStartDate(),
                        ])
                    )
                ) .
                Html::tag(
                    'div',
                    options: ['class' => ['flex', 'flex-nowrap']],
                    content:
                    Html::label(Craft::t('app', 'To'), 'end-date-date') .
                    Html::tag('div',
                        Cp::dateHtml([
                            'id' => 'end-date',
                            'name' => 'endDate',
                            'value' => $this->getEndDate(),
                        ])
                    )
                );
        } elseif (in_array($this->rangeType, [DateRangeType::Before, DateRangeType::After])) {
            $periodValueId = 'period-value';
            $periodTypeId = 'period-type';

            $html .= Html::hiddenLabel(Craft::t('app', 'Period Value'), $periodValueId) .
                Html::tag(
                'div',
                options: ['class' => ['flex', 'flex-nowrap']],
                content:
                Cp::textHtml([
                    'id' => $periodValueId,
                    'name' => 'periodValue',
                    'value' => $this->periodValue,
                    'size' => '5',
                ]) .
                Html::hiddenLabel(Craft::t('app', 'Period Type'), $periodTypeId) .
                Cp::selectHtml([
                    'id' => $periodTypeId,
                    'name' => 'periodType',
                    'value' => $this->periodType,
                    'options' => DateRange::periodTypeOptions(),
                ])
            );
        }

        return Html::tag('div', $html, ['class' => ['flex']]);
    }

    /**
     * @inheritdoc
     */
    protected function defineRules(): array
    {
        return array_merge(parent::defineRules(), [
            [['startDate', 'endDate', 'rangeType', 'timeFrameUnits', 'timeFrameValue'], 'safe'],
            [['rangeType'], 'in', 'range' => array_keys(DateRange::rangeTypeOptions())],
            [['periodType'], 'in', 'range' => array_keys(DateRange::periodTypeOptions())],
            [['periodValue'], 'number', 'skipOnEmpty' => true],
        ]);
    }

    /**
     * Returns the rule’s value, prepped for [[\craft\helpers\Db::parseDateParam()]].
     *
     * @return array|string|null
     */
    protected function queryParamValue(): array|string|null
    {
        if ($this->rangeType === DateRangeType::Range && ($this->_startDate || $this->_endDate)) {
            return array_filter([
                'and',
                $this->_startDate ? ">= $this->_startDate" : null,
                $this->_endDate ? "< $this->_endDate" : null,
            ]);
        }

        if (in_array($this->rangeType, [DateRangeType::Before, DateRangeType::After]) && $this->periodValue && $this->periodType) {
            $dateInterval = DateRange::dateIntervalByTimePeriod($this->periodValue, $this->periodType);

            return ($this->rangeType === DateRangeType::After ? '>=' : '<') . ' ' . DateTimeHelper::toIso8601(DateTimeHelper::now()->sub($dateInterval));
        }

        $rangeTypeOptions = DateRange::rangeTypeOptions();
        ArrayHelper::remove($rangeTypeOptions, DateRangeType::Before);
        ArrayHelper::remove($rangeTypeOptions, DateRangeType::After);
        ArrayHelper::remove($rangeTypeOptions, DateRangeType::Range);

        if (array_key_exists($this->rangeType, $rangeTypeOptions)) {
            [$startDate, $endDate] = DateRange::dateRangeByType($this->rangeType);
            $startDate = DateTimeHelper::toIso8601($startDate);
            $endDate = DateTimeHelper::toIso8601($endDate);
            return ['and', ">= $startDate", "< $endDate"];
        }

        return null;
    }

    /**
     * Returns whether the condition rule matches the given value.
     *
     * @param DateTime|null $value
     * @return bool
     * @throws Exception
     */
    protected function matchValue(?DateTime $value): bool
    {
        if ($this->rangeType === DateRangeType::Range) {
            return (
                (!$this->_startDate || ($value && $value >= DateTimeHelper::toDateTime($this->_startDate))) &&
                (!$this->_endDate || ($value && $value < DateTimeHelper::toDateTime($this->_endDate)))
            );
        }

        if (in_array($this->rangeType, [DateRangeType::Before, DateRangeType::After]) && $this->periodValue && $this->periodType) {
            $date = DateTimeHelper::now()->sub(DateRange::dateIntervalByTimePeriod($this->periodValue, $this->periodType));

            if ($this->rangeType === DateRangeType::After) {
                return $value && $value >= $date;
            }

            return $value && $value < $date;
        }

        $rangeTypeOptions = DateRange::rangeTypeOptions();
        ArrayHelper::remove($rangeTypeOptions, DateRangeType::Before);
        ArrayHelper::remove($rangeTypeOptions, DateRangeType::After);
        ArrayHelper::remove($rangeTypeOptions, DateRangeType::Range);
        if (array_key_exists($this->rangeType, $rangeTypeOptions)) {
            [$startDate, $endDate] = DateRange::dateRangeByType($this->rangeType);
            return $value && $value >= $startDate && $value < $endDate;
        }

        return false;
    }
}