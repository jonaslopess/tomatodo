<?php

use App\Models\Category;
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
        Schema::table('tasks', function(Blueprint $table){
            $table->dateTime('due_date');
            $table->integer('priority');

            $table->foreignIdFor(Category::class)->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function(Blueprint $table){
            $table->dropColumn('due_date');
            $table->dropColumn('priority');

            $table->dropForeignIdFor(Category::class);
        });
    }
};
