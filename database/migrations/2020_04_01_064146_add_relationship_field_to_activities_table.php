<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipFieldToActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('activities', function (Blueprint $table) {
          $table->unsignedInteger('activity_id')->nullable();

          $table->foreign('activity_id', 'event_fk_556522')->references('id')->on('activities');
      });
    }


}
