<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacunisTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('racunis', function (Blueprint $table) {
      $table->id();
      $table->mediumInteger('iznos');
      $table->string('opis')->nullable();
      $table->string('poziv');
      $table->datetime('izvrsen');
      $table->string('referencija');
      $table->tinyInteger('naknada')->nullable();
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
    Schema::dropIfExists('racunis');
  }
}
