<?php

use App\TrioModuleManager;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $exist = TrioModuleManager::where('name', 'QRCodeAttendance')->first();
        if (! $exist) {
            $name = 'QRCodeAttendance';
            $trioModuleManager = new TrioModuleManager();
            $trioModuleManager->name = $name;
            $trioModuleManager->email = 'support@spondonit.com';
            $trioModuleManager->notes = 'Welcome to the QRCodeAttendance, Module: Thanks for using';
            $trioModuleManager->version = '1.0';
            $trioModuleManager->update_url = 'https://spondonit.com/contact';
            $trioModuleManager->is_default = 0;
            $trioModuleManager->addon_url = 'https://codecanyon.net/item/trioedu-zoom-live-class/27623128?s_rank=12';
            $trioModuleManager->installed_domain = url('/');
            $trioModuleManager->activated_date = date('Y-m-d');
            $trioModuleManager->save();
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
