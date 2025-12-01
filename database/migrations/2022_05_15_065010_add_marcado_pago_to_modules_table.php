<?php

use App\TrioModuleManager;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarcadoPagoToModulesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $trioModuleManager = new TrioModuleManager();
        $trioModuleManager->name = 'MercadoPago';
        $trioModuleManager->email = 'support@spondonit.com';
        $trioModuleManager->notes = 'This is MercadoPago Payment Module For Online Payment. Thanks For Using.';
        $trioModuleManager->version = '1.0';
        $trioModuleManager->update_url = 'https://spondonit.com/contact';
        $trioModuleManager->is_default = 0;
        $trioModuleManager->addon_url = 'https://spondonit.com/contact';
        $trioModuleManager->installed_domain = url('/');
        $trioModuleManager->activated_date = date('Y-m-d');
        $trioModuleManager->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('modules', function (Blueprint $blueprint): void {
            //
        });
    }
}
