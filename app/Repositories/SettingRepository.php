<?php

namespace App\Repositories;

use App\Models\InvoiceSetting;
use App\Models\Setting;
use Illuminate\Support\Arr;

/**
 * Class SettingRepository
 * @version February 19, 2020, 1:45 pm UTC
 */
class SettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'app_name',
        'app_logo',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Setting::class;
    }

    public function getSyncList()
    {
        return Setting::pluck('value', 'key')->toBase();
    }

    /**
     * @param $input
     */
    public function updateSetting($input)
    {
        $input['mail_notification'] = ($input['mail_notification'] == 1)?1:0;
        $input['company_phone'] = "+".$input['prefix_code'].$input['company_phone'];
        if (isset($input['app_logo']) && ! empty($input['app_logo'])) {
            /** @var Setting $setting */
            $setting = Setting::where('key', '=', 'app_logo')->first();
            $setting = $this->uploadSettingImages($setting, $input['app_logo']);
        }
        if (isset($input['favicon_icon']) && ! empty($input['favicon_icon'])) {
            /** @var Setting $setting */
            $setting = Setting::where('key', '=', 'favicon_icon')->first();
            $setting = $this->uploadSettingImages($setting, $input['favicon_icon']);
        }

        $settingInputArray = Arr::only($input, [
            'app_name', 'company_name', 'company_address', 'company_phone', 'date_format', 'time_format', 'time_zone',
            'current_currency',
            'decimal_separator', 'thousand_separator','mail_notification'
        ]);
        foreach ($settingInputArray as $key => $value) {
            Setting::where('key', '=', $key)->first()->update(['value' => $value]);
        }
    }

    public function editSettingsData()
    {
        $data = [];
        $timezoneArr = file_get_contents(storage_path('timezone/timezone.json'));
        $timezoneArr = json_decode($timezoneArr, true);
        $timezones = [];

        foreach ($timezoneArr as $utcData) {
            foreach ($utcData['utc'] as $item) {
                $timezones[$item] = $item;
            }
        }
        $data['timezones'] = $timezones;
        $data['settings'] = $this->getSyncList();
        $data['dateFormats'] = Setting::DateFormatArray;
        $data['currencies'] = getCurrencies();
        $data['templates'] = Setting::INVOICE__TEMPLATE_ARRAY;
        $data['invoiceTemplate'] = InvoiceSetting::all();

        return $data;
    }

    /**
     * @param $input
     *
     * @return bool
     */
    public function updateInvoiceSetting($input): bool
    {
        $invoiceSetting = InvoiceSetting::where('key', $input['template'])->first();
        $invoiceSetting->update([
            'template_color' => $input['default_invoice_color'],
        ]);

        return true;
    }

    /**
     * @param $setting
     * @param $value
     *
     * @return mixed
     */
    public function uploadSettingImages($setting, $value)
    {
        $setting->clearMediaCollection(Setting::PATH);
        $media = $setting->addMedia($value)->toMediaCollection(Setting::PATH, config('app.media_disc'));
        $setting = $setting->refresh();
        $setting->update(['value' => $media->getFullUrl()]);

        return $setting;
    }
}
