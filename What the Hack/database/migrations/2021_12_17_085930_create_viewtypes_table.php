<?php

use App\Models\Viewtype;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewtypes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('blade');
            $table->timestamps();
        });

        $plain = new Viewtype([
            'name' => 'Plain',
            'blade' => 'plain'
        ]);
        $plain->save();

        $grid = new Viewtype([
            'name' => 'Grid',
            'blade' => 'grid'
        ]);
        $grid->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viewtypes');
    }
}
