<?php
/**
 * Table Migration
 * @package  5.0
**/

use App\Classes\Hook;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if ( ! Schema::hasTable( Hook::filter( 'ns-table-prefix', 'nexopos_registers' ) ) ) {
            Schema::create( Hook::filter( 'ns-table-prefix', 'nexopos_registers' ), function( Blueprint $table ) {
                $table->bigIncrements( 'id' );
                $table->string( 'name' );
                $table->string( 'status' )->default( 'closed' ); // open, closed, disabled
                $table->text( 'description' )->nullable();
                $table->integer( 'used_by' );
                $table->integer( 'author' );
                $table->string( 'uuid' )->nullable();
                $table->timestamps();            
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        if ( Schema::hasTable( Hook::filter( 'ns-table-prefix', 'nexopos_registers' ) ) ) {
            Schema::dropIfExists( Hook::filter( 'ns-table-prefix', 'nexopos_registers' ) );
        }
    }
}

