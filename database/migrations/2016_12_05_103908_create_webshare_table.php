<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateWebshareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        
        //#######################
        // BUILD
        //#######################
        
        
        //## Links table
        
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->integer('user_id');
            $table->integer('site_id');
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->integer('visits')->default(0);
            $table->integer('privacy_id')->default(1);
            $table->timestamps();
        });
       
        
        //## Sites table
            
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default("");
            $table->string('image')->default("");
            $table->timestamps();
        });
        
        
        
        //## Categories table
            
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default("");
            $table->string('image')->default("");
            $table->timestamps();
        });
        
        
        
        //## Labels pivot table
            
        Schema::create('label_link', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('link_id');
            $table->integer('label_id');
            $table->timestamps();
        });


        //## Labels table

        Schema::create('labels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });        


        //## Collections table

        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('privacy_id')->default(1);
            $table->integer('seq')->default(10);
            $table->timestamps();
        });
        
        
        //## Collection pivot table
        
        Schema::create('collection_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('collection_id');
            $table->timestamps();
        });
        
        Schema::create('collection_link', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('link_id');
            $table->integer('collection_id');
            $table->timestamps();
        });  
        
        
        //## Privacy
        
        Schema::create('privacies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        
        
        
        //#######################
        // SEED
        //#######################

        //## Privacy seed
        
        DB::table('privacies')->insert(
        array('name' => 'Public')
        );
        DB::table('privacies')->insert(
        array('name' => 'Private')
        );
       
        //## Users

        User::create([
        'name'  => "Owen Merry",  
        'email' => "me@owenmerry.com",    
        'password' => bcrypt("password"),    
        ]);
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
        Schema::dropIfExists('sites');
        Schema::dropIfExists('categories');
        
        Schema::dropIfExists('label_link');
        Schema::dropIfExists('labels');
        
        Schema::dropIfExists('collections');
        Schema::dropIfExists('collection_user');
        Schema::dropIfExists('collection_link');
        
        Schema::dropIfExists('privacies');
    }
}




