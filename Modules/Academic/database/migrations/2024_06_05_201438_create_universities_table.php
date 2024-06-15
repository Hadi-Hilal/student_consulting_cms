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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('slug')->unique();
            $table->json('description');
            $table->json('keywords');
            $table->json('content');
            $table->string('image');
            $table->string('logo');
            $table->string('video')->nullable();
            $table->string('location')->nullable();
            $table->float('price')->default(0);
            $table->float('discount')->default(0);
            $table->string('rank')->nullable();
            $table->foreignId('created_by')->nullable()->unsigned()->constrained('users')->nullOnDelete();
            $table->enum('type', ['private', 'public'])->default('private');
            $table->enum('publish', ['published', 'archived'])->default('published');
            $table->boolean('featured')->default(true);
            $table->bigInteger('visits')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
