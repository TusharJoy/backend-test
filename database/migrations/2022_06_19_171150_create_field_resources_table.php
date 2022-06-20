<?php

use App\Models\Subscriber;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('subscriber_id')
                ->constrained()
                ->onDelete('cascade');;
            $table->dateTime('dateType')->nullable();
            $table->integer('numberType')->nullable();
            $table->string('stringType')->nullable();
            $table->boolean('booleanType')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_resources');
    }
};
