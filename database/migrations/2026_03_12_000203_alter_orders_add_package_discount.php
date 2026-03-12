<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('applied_package_id')->nullable()->after('user_id');
            $table->decimal('discount_percent', 5, 2)->default(0)->after('order_amount_sum');
            $table->decimal('discount_amount', 10, 2)->default(0)->after('discount_percent');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['applied_package_id', 'discount_percent', 'discount_amount']);
        });
    }
};
