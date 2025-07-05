<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('expenses', static function (Blueprint $table) {
            $table->id();
            $table->string('expense');
            $table->text('description')->nullable(true);
            $table->double('amount');
            $table->date('date');
            $table->integer('installments')->nullable();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('type_id')->constrained('types');
            $table->foreignId('card_id')->nullable()->constrained('cards');
            $table->foreignId('installment_id')->nullable(true)->constrained('installments', 'installment_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
