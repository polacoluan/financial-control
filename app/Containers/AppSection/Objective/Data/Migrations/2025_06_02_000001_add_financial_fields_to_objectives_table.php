<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::table('objectives', static function (Blueprint $table) {
            $table->decimal('target_value', 15, 2)->nullable();
            $table->decimal('saved_amount', 15, 2)->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('objectives', static function (Blueprint $table) {
            $table->dropColumn(['target_value', 'saved_amount']);
        });
    }
};
