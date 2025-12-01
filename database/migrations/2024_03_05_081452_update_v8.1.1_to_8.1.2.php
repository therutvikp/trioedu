<?php

use App\TrioModuleManager;
use App\SmGeneralSettings;
use App\SmHeaderMenuManager;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $exist = TrioModuleManager::where('name', 'Certificate')->first();
        if (! $exist) {
            $trioModuleManager = new TrioModuleManager();
            $trioModuleManager->name = 'Certificate';
            $trioModuleManager->email = 'support@spondonit.com';
            $trioModuleManager->notes = "This is the module to generate Certificate's for students and employees.";
            $trioModuleManager->version = '1.0';
            $trioModuleManager->update_url = 'https://spondonit.com/contact';
            $trioModuleManager->is_default = 0;
            $trioModuleManager->addon_url = 'maito:support@spondonit.com';
            $trioModuleManager->installed_domain = url('/');
            $trioModuleManager->activated_date = date('Y-m-d');
            $trioModuleManager->save();
        }

        $extraContactPage = SmHeaderMenuManager::where([
            ['type', 'sPages'],
            ['title', 'Contact'],
            ['link', '/contact-us'],
            ['parent_id', null],
        ])->latest()->first();
        if ($extraContactPage) {
            $extraContactPage->delete();
        }

        $generalSettings = SmGeneralSettings::first();
        if ($generalSettings) {
            $generalSettings->software_version = '8.1.2';
            $generalSettings->update();
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
