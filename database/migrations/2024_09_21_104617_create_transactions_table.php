<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->index('transaction_reference_index');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('account_id')->constrained('accounts');
            $table->decimal('amount', 16,4);
            $table->foreignId('transfer_id')->constrained('transfers');
            $table->double('balance', 16, 4);
            $table->string('category'); //deposit or withdrawal
            $table->boolean('confirmed')->nullable()->default(false);
            $table->string('description')->nullable();
            $table->text('metal')->nullable();
            $table->dateTime('date');;
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
