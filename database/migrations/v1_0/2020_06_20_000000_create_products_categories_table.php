<?php
/**
 * Table Migration
 * @package  5.0
**/

use App\Classes\Hook;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        if ( ! Schema::hasTable( Hook::filter( 'ns-table-prefix', 'nexopos_products_categories' ) ) ) {
            Schema::create( Hook::filter( 'ns-table-prefix', 'nexopos_products_categories' ), function( Blueprint $table ) {
                $table->bigIncrements( 'id' );
                $table->string( 'name' );
                $table->integer( 'parent_id' )->default(0)->nullable();
                $table->integer( 'media_id' )->default(0);
                $table->string( 'preview_url' )->nullable();
                $table->boolean( 'displays_on_pos' )->default(true);
                $table->integer( 'total_items' )->default(0);
                $table->text( 'description' )->nullable();
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
        if ( Schema::hasTable( Hook::filter( 'ns-table-prefix', 'nexopos_products_categories' ) ) ) {
            Schema::dropIfExists( Hook::filter( 'ns-table-prefix', 'nexopos_products_categories' ) );
        }
    }
}

