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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type'); // The type of notification (e.g., App\Notifications\NewMessageReceived)
            $table->text('data'); // JSON data associated with the notification
            $table->nullableMorphs('notifiable'); // This creates notifiable_id and notifiable_type for polymorphic relationships
            $table->timestamp('read_at')->nullable(); // Timestamp for when the notification was read
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
