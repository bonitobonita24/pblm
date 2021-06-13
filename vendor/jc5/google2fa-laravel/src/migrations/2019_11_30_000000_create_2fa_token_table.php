<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Create2FaTokenTable
 * @codeCoverageIgnore
 */
class Create2FaTokenTable extends Migration
{
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('2fa_tokens')) {
            Schema::drop('2fa_tokens');
        }
    }

    /**
     * Run the migrations.
     *
     * @SuppressWarnings(PHPMD.ShortMethodName)
     */
    public function up(): void
    {
        $this->createTokenTable();
    }

    /**
     * Create the actual table.
     */
    private function createTokenTable(): void
    {
        if (!Schema::hasTable('2fa_tokens')) {
            Schema::create(
                '2fa_tokens',
                static function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('user_id', false, true);
                    $table->datetime('expires_at');
                    $table->string('token', 64);

                    // assumes "users" table exists:
                    $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

                    // token must be unique.
                    $table->unique(['token']);
                }
            );
        }
    }
}
