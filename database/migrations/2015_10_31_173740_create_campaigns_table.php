<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            //Generated by Artisan
            $table->increments('id');
            $table->timestamps();

            //Developer Created
            //Foreign Key Constraints
            $table->integer('founder_id')->unsigned();
            $table->foreign('founder_id')
                ->references('id')
                ->on('founders');
            /*$table->integer('investor_id')->unsigned();
            $table->foreign('investor_id')
                ->references('id')
                ->on('investors');*/
            //Attributes
            $table->boolean('is_active');
            $table->string('campaign_name');
            $table->longText('description');
            //$table->text('campaign_image');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('target_goal');
            $table->float('target_current');
            $table->integer('acct_number');

        });
    /*
        Schema::create('campaign_investor', function (Blueprint $table) {

            $table->integer('campaign_id')->unsigned()->index();
            $table->foreign('campaign_id')
                    ->references('id')
                    ->on('campaigns');

            $table->integer('investor_id')->unsigned()->index();
            $table->foreign('investor_id')
                    ->references('id')
                    ->on('investors');

            $table->string('invst_label');
            $table->float('invst_amount', 8, 2);
            $table->timestamps();

        });
    */

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaigns');
        //Schema::drop('campaign_investor');
    }
}
