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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // foreign key table user
            $table->string('title'); // judul dari task
            $table->text('description') -> nullable(); // deskripsi task nya
            $table->enum('status', ['not_start', 'in_progress', 'complete'])->default('not_start'); // Status task
            $table->date('deadline'); // deadline dari tasknya
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
