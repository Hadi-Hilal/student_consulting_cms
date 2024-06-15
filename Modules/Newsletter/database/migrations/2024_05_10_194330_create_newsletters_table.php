<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->enum('to', ['Subscribers', 'Users', 'Admins', 'Custom']);
            $table->string('lang', 2)->default('en');
            $table->enum('status', ['Pending', 'Failed', 'Sent'])->default('Pending');
            $table->text('subject')->nullable();
            $table->text('message');
            $table->integer('count_receivers')->default(0);
            $table->json('extra')->nullable();
            $table->foreignId('created_by')->nullable()->unsigned()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletters');
    }
};
