<?php

use App\TrioModuleManager;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $exist = TrioModuleManager::where('name', 'SslCommerz')->first();
        if (!$exist) {
            $name = 'SslCommerz';
            $s = new TrioModuleManager();
            $s->name = $name;
            $s->email = 'support@spondonit.com';
            $s->notes = "This is SSLCommerz module for Online payemnt. Thanks for using.";
            $s->version = "1.0";
            $s->update_url = "https://spondonit.com/contact";
            $s->is_default = 0;
            $s->addon_url = "https://codecanyon.net/item/trioedu-zoom-live-class/27623128?s_rank=12";
            $s->installed_domain = url('/');
            $s->activated_date = date('Y-m-d');
            $s->save();
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
