<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration
{

  public function up()
  {
    Schema::table('favourites', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')
        ->onDelete("cascade");

    });


    Schema::table('country_translations', function (Blueprint $table) {
      $table->foreign('country_id')->references('id')->on('countries')
        ->onDelete("cascade");

    });

    Schema::table('devices', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')
        ->onDelete("cascade");

    });


    Schema::table('notifications', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')
        ->onDelete("cascade");

    });

    Schema::table('providers', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')
        ->onDelete("cascade");

    });
    Schema::table('groups', function (Blueprint $table) {
      $table->foreign('owner_id')->references('id')->on('users')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('groups', function (Blueprint $table) {
      $table->foreign('category_id')->references('id')->on('categories')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('feeds', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('feed_media', function (Blueprint $table) {
      $table->foreign('feed_id')->references('id')->on('feeds')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });

    Schema::table('feed_likes', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });

    Schema::table('comment_feeds', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')
        ->onDelete('no action')
        ->onUpdate('cascade');
    });
    Schema::table('goals', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('followers', function (Blueprint $table) {
      $table->foreign('follower_id')->references('id')->on('users')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('followers', function (Blueprint $table) {
      $table->foreign('following_id')->references('id')->on('users')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('focus_sessions', function (Blueprint $table) {
      $table->foreign('feature_id')->references('id')->on('features')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('focus_sessions', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('focus_session_events', function (Blueprint $table) {
      $table->foreign('focus_session_id')->references('id')->on('focus_sessions')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('group_users', function (Blueprint $table) {
      $table->foreign('user_id')->references('id')->on('users')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('group_users', function (Blueprint $table) {
      $table->foreign('group_id')->references('id')->on('groups')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('reminders', function (Blueprint $table) {
      $table->foreign('focus_session_id')->references('id')->on('focus_sessions')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('shares', function (Blueprint $table) {
      $table->foreign('shared_feed_id')->references('id')->on('feeds')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });
    Schema::table('shares', function (Blueprint $table) {
      $table->foreign('sharing_user_id')->references('id')->on('users')
        ->onDelete('cascade')
        ->onUpdate('no action');
    });

    Schema::table('focus_sessions', function (Blueprint $table) {
      $table->foreign("goal_id")->references("id")->on("goals")->
        onDelete("cascade")
        ->onUpdate('no action');
    });



  }

  public function down()
  {
    Schema::table('favourites', function (Blueprint $table) {
      $table->dropForeign('favourites_user_id_foreign');
    });


    Schema::table('devices', function (Blueprint $table) {
      $table->dropForeign('devices_user_id_foreign');
    });



    Schema::table('notifications', function (Blueprint $table) {
      $table->dropForeign('notifications_user_id_foreign');
    });

    Schema::table('providers', function (Blueprint $table) {
      $table->dropForeign('providers_user_id_foreign');
    });

    Schema::table('groups', function (Blueprint $table) {
      $table->dropForeign('groups_owner_id_foreign');
    });
    Schema::table('groups', function (Blueprint $table) {
      $table->dropForeign('groups_category_id_foreign');
    });
    Schema::table('feeds', function (Blueprint $table) {
      $table->dropForeign('feeds_user_id_foreign');
    });
    Schema::table('feed_media', function (Blueprint $table) {
      $table->dropForeign('feed_media_feed_id_foreign');
    });

    Schema::table('feed_likes', function (Blueprint $table) {
      $table->dropForeign('feed_likes_user_id_foreign');
    });

    Schema::table('comment_feeds', function (Blueprint $table) {
      $table->dropForeign('comment_feeds_user_id_foreign');
    });
    Schema::table('goals', function (Blueprint $table) {
      $table->dropForeign('goals_user_id_foreign');
    });
    Schema::table('followers', function (Blueprint $table) {
      $table->dropForeign('followers_follower_id_foreign');
    });
    Schema::table('followers', function (Blueprint $table) {
      $table->dropForeign('followers_following_id_foreign');
    });
    Schema::table('focus_sessions', function (Blueprint $table) {
      $table->dropForeign('focus_sessions_feature_id_foreign');
    });
    Schema::table('focus_sessions', function (Blueprint $table) {
      $table->dropForeign('focus_sessions_user_id_foreign');
    });
    Schema::table('focus_session_events', function (Blueprint $table) {
      $table->dropForeign('focus_session_events_focus_session_id_foreign');
    });
    Schema::table('group_users', function (Blueprint $table) {
      $table->dropForeign('group_users_user_id_foreign');
    });
    Schema::table('group_users', function (Blueprint $table) {
      $table->dropForeign('group_users_group_id_foreign');
    });
    Schema::table('reminders', function (Blueprint $table) {
      $table->dropForeign('reminders_focus_session_id_foreign');
    });
    Schema::table('shares', function (Blueprint $table) {
      $table->dropForeign('shares_shared_feed_id_foreign');
    });
    Schema::table('shares', function (Blueprint $table) {
      $table->dropForeign('shares_sharing_user_id_foreign');
    });

    Schema::table('focus_sessions', function (Blueprint $table) {
      $table->dropForeign('focus_sessions_goal_id_foreign');
    });


  }
}
