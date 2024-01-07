<?php

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
    Schema::create('messages', function (Blueprint $table) {
      $table->ulid("id_message")->primary();
      $table->foreignUlid('id_room')->constrained('rooms', 'id_room');
      $table->foreignUlid("id_user")->constrained("users", 'id_user');
      $table->string("text");
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
    Schema::dropIfExists('messages');
  }
};
