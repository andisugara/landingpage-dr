<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('hero_title')->nullable()->after('short_description');
            $table->text('hero_description')->nullable()->after('hero_title');
            $table->text('hero_wa_message')->nullable()->after('hero_description');
            $table->string('hero_image_1')->nullable()->after('hero_wa_message');
            $table->string('hero_image_2')->nullable()->after('hero_image_1');

            $table->string('feature_1_title')->nullable()->after('hero_image_2');
            $table->text('feature_1_description')->nullable()->after('feature_1_title');
            $table->string('feature_2_title')->nullable()->after('feature_1_description');
            $table->text('feature_2_description')->nullable()->after('feature_2_title');
            $table->string('feature_3_title')->nullable()->after('feature_2_description');
            $table->text('feature_3_description')->nullable()->after('feature_3_title');

            $table->string('package_1_name')->nullable()->after('feature_3_description');
            $table->text('package_1_description')->nullable()->after('package_1_name');
            $table->string('package_1_price')->nullable()->after('package_1_description');
            $table->string('package_1_image')->nullable()->after('package_1_price');
            $table->text('package_1_wa_message')->nullable()->after('package_1_image');

            $table->string('package_2_name')->nullable()->after('package_1_wa_message');
            $table->text('package_2_description')->nullable()->after('package_2_name');
            $table->string('package_2_price')->nullable()->after('package_2_description');
            $table->string('package_2_image')->nullable()->after('package_2_price');
            $table->text('package_2_wa_message')->nullable()->after('package_2_image');

            $table->string('package_3_name')->nullable()->after('package_2_wa_message');
            $table->text('package_3_description')->nullable()->after('package_3_name');
            $table->string('package_3_price')->nullable()->after('package_3_description');
            $table->string('package_3_image')->nullable()->after('package_3_price');
            $table->text('package_3_wa_message')->nullable()->after('package_3_image');

            $table->string('faq_1_question')->nullable()->after('package_3_wa_message');
            $table->text('faq_1_answer')->nullable()->after('faq_1_question');
            $table->string('faq_2_question')->nullable()->after('faq_1_answer');
            $table->text('faq_2_answer')->nullable()->after('faq_2_question');
            $table->string('faq_3_question')->nullable()->after('faq_2_answer');
            $table->text('faq_3_answer')->nullable()->after('faq_3_question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title',
                'hero_description',
                'hero_wa_message',
                'hero_image_1',
                'hero_image_2',
                'feature_1_title',
                'feature_1_description',
                'feature_2_title',
                'feature_2_description',
                'feature_3_title',
                'feature_3_description',
                'package_1_name',
                'package_1_description',
                'package_1_price',
                'package_1_image',
                'package_1_wa_message',
                'package_2_name',
                'package_2_description',
                'package_2_price',
                'package_2_image',
                'package_2_wa_message',
                'package_3_name',
                'package_3_description',
                'package_3_price',
                'package_3_image',
                'package_3_wa_message',
                'faq_1_question',
                'faq_1_answer',
                'faq_2_question',
                'faq_2_answer',
                'faq_3_question',
                'faq_3_answer',
            ]);
        });
    }
};
