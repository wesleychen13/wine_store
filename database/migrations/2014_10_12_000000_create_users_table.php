<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('姓名');
            $table->string('nickname')->comment('微信昵称');
            $table->string('avatar')->comment('微信头像');
            $table->string('openid')->comment('微信opendid');
            $table->string('phone')->nullable()->unique()->comment('电话');
            $table->string('email')->nullable()->unique()->comment('邮箱');
            $table->string('qrcode')->nullable()->comment('分销二维码');
            $table->string('parent_id')->comment('上级分销商');

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
        Schema::dropIfExists('users');
    }
}
