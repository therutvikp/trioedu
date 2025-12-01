<?php

use App\TrioModuleManager;
use App\SmGeneralSettings;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $exist = TrioModuleManager::where('name', 'ToyyibPay')->first();
        if (! $exist) {
            $name = 'ToyyibPay';
            $trioModuleManager = new TrioModuleManager();
            $trioModuleManager->name = $name;
            $trioModuleManager->email = 'support@spondonit.com';
            $trioModuleManager->notes = 'This is ToyyibPay module for Online payemnt. Thanks for using.';
            $trioModuleManager->version = '1.0';
            $trioModuleManager->update_url = 'https://spondonit.com/contact';
            $trioModuleManager->is_default = 0;
            $trioModuleManager->addon_url = 'https://codecanyon.net/item/trioedu-zoom-live-class/27623128?s_rank=12';
            $trioModuleManager->installed_domain = url('/');
            $trioModuleManager->activated_date = date('Y-m-d');
            $trioModuleManager->save();
        }

        $generalSettings = SmGeneralSettings::first();
        if ($generalSettings) {
            $generalSettings->software_version = '8.2.0';
            $generalSettings->update();
        }

        $permissions = [
            'fees_collect_student_wise' => [
                'module' => null,
                'sidebar_menu' => 'system_settings',
                'name' => 'Fees Collect Student Wise',
                'lang_name' => 'Fees Collect Student Wise',
                'icon' => null,
                'svg' => null,
                'route' => 'fees_collect_student_wise',
                'parent_route' => 'collect_fees',
                'is_admin' => 1,
                'is_teacher' => 0,
                'is_student' => 0,
                'is_parent' => 0,
                'position' => 3,
                'is_saas' => 0,
                'is_menu' => 0,
                'status' => 1,
                'menu_status' => 0,
                'relate_to_child' => 0,
                'alternate_module' => null,
                'permission_section' => 0,
                'section_id' => 1,
                'user_id' => null,
                'type' => 3,
                'old_id' => null,
                'child' => [],
            ],
        ];
        foreach ($permissions as $permission) {
            storePermissionData($permission);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
