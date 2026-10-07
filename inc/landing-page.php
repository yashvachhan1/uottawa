<?php
/**
 * Program landing page.
 *
 * Ported from the uottawa-mu-plugin: the editor meta boxes that hold the
 * content and the [uottawa_landing] shortcode that renders it. The plugin's
 * own global header, footer and stylesheet are gone - the theme supplies
 * those, and the stylesheet now lives in assets/css/landing.css.
 *
 * @package uottawa-online
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// ==========================================
// DYNAMIC META BOXES FOR EDIT PAGE (MANUAL LAYOUT)
// ==========================================

function uottawa_add_meta_boxes() {
    add_meta_box('uottawa_landing_meta', 'uOttawa Landing Page Content', 'uottawa_meta_box_callback', 'page', 'normal', 'high');
}
add_action('add_meta_boxes', 'uottawa_add_meta_boxes');

function uottawa_meta_box_callback($post) {
    wp_nonce_field('uottawa_save_meta', 'uottawa_meta_nonce');
    
    echo '<style>
        .uottawa-admin-wrap { display: flex; border: 1px solid #ccc; background: #fff; margin-top: 15px; }
        .uottawa-tabs { width: 250px; background: #f1f1f1; border-right: 1px solid #ccc; padding: 0; margin: 0; list-style: none; }
        .uottawa-tabs li { padding: 15px; cursor: pointer; border-bottom: 1px solid #ddd; font-weight: bold; margin:0; transition: 0.3s; }
        .uottawa-tabs li:hover { background: #e2e2e2; }
        .uottawa-tabs li.active { background: #fff; border-right: 1px solid #fff; margin-right: -1px; color: #8f001a; }
        .uottawa-tab-content { flex: 1; padding: 20px; display: none; }
        .uottawa-tab-content.active { display: block; }
        .uottawa-field { margin-bottom: 15px; border-bottom:1px solid #eee; padding-bottom:15px; }
        .uottawa-field label { font-weight: bold; display: block; margin-bottom: 5px; color:#333; }
        .uottawa-field input[type="text"], .uottawa-field textarea { width: 100%; max-width: 800px; padding: 8px; }
        .uottawa-field textarea { min-height: 80px; }
        .uottawa-section-title { margin-top: 0; padding-bottom: 10px; border-bottom: 2px solid #8f001a; }
    </style>';
    
    echo '<div class="uottawa-admin-wrap">';
    
    // TABS NAV
    echo '<ul class="uottawa-tabs">';
echo '<li class="active" data-tab="tab-0">General</li>';
echo '<li data-tab="tab-1">Info Grid</li>';
echo '<li data-tab="tab-2">Why uOttawa</li>';
echo '<li data-tab="tab-3">Overview</li>';
echo '<li data-tab="tab-4">Program Insights</li>';
echo '<li data-tab="tab-5">Admissions</li>';
echo '<li data-tab="tab-6">FAQ</li>';
echo '<li data-tab="tab-7">Course Information</li>';
echo '<li data-tab="tab-8">Areas of Study</li>';
echo '<li data-tab="tab-9">Final CTA</li>';
echo '</ul>';

echo '<div class="uottawa-tab-content active" id="tab-0">';
echo '<h3 class="uottawa-section-title">General</h3>';

        $val_text_general_1 = get_post_meta($post->ID, 'text_general_1', true) ?: 'Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated)';
        echo '<div class="uottawa-field"><label>General Paragraph 1 (Preview: Bachelor of Arts, Interdisciplinary Stud...)</label>';
            echo '<textarea name="text_general_1">'.esc_textarea($val_text_general_1).'</textarea>';echo '</div>';

        $val_text_general_2 = get_post_meta($post->ID, 'text_general_2', true) ?: 'Build on your college diploma &amp; sharpen the human skills the AI era rewards.';
        echo '<div class="uottawa-field"><label>General Paragraph 2 (Preview: Build on your college diploma &amp; shar...)</label>';
            echo '<textarea name="text_general_2">'.esc_textarea($val_text_general_2).'</textarea>';echo '</div>';
echo '</div>';
echo '<div class="uottawa-tab-content" id="tab-1">';
echo '<h3 class="uottawa-section-title">Info Grid</h3>';

        $val_text_info_grid_1 = get_post_meta($post->ID, 'text_info_grid_1', true) ?: 'Delivery';
        echo '<div class="uottawa-field"><label>Info Grid Text 1 (Preview: Delivery...)</label>';
            echo '<input type="text" name="text_info_grid_1" value="'.esc_attr($val_text_info_grid_1).'">';echo '</div>';

        $val_text_info_grid_2 = get_post_meta($post->ID, 'text_info_grid_2', true) ?: '100% online';
        echo '<div class="uottawa-field"><label>Info Grid Text 2 (Preview: 100% online...)</label>';
            echo '<input type="text" name="text_info_grid_2" value="'.esc_attr($val_text_info_grid_2).'">';echo '</div>';

        $val_text_info_grid_3 = get_post_meta($post->ID, 'text_info_grid_3', true) ?: 'Admission pathways';
        echo '<div class="uottawa-field"><label>Info Grid Text 3 (Preview: Admission pathways...)</label>';
            echo '<input type="text" name="text_info_grid_3" value="'.esc_attr($val_text_info_grid_3).'">';echo '</div>';

        $val_text_info_grid_4 = get_post_meta($post->ID, 'text_info_grid_4', true) ?: '2-year or 3-year accredited Canadian college diploma*';
        echo '<div class="uottawa-field"><label>Info Grid Text 4 (Preview: 2-year or 3-year accredited Canadian col...)</label>';
            echo '<input type="text" name="text_info_grid_4" value="'.esc_attr($val_text_info_grid_4).'">';echo '</div>';

        $val_text_info_grid_5 = get_post_meta($post->ID, 'text_info_grid_5', true) ?: 'Program length';
        echo '<div class="uottawa-field"><label>Info Grid Text 5 (Preview: Program length...)</label>';
            echo '<input type="text" name="text_info_grid_5" value="'.esc_attr($val_text_info_grid_5).'">';echo '</div>';

        $val_text_info_grid_6 = get_post_meta($post->ID, 'text_info_grid_6', true) ?: '20-28 months**';
        echo '<div class="uottawa-field"><label>Info Grid Text 6 (Preview: 20-28 months**...)</label>';
            echo '<input type="text" name="text_info_grid_6" value="'.esc_attr($val_text_info_grid_6).'">';echo '</div>';

        $val_text_info_grid_7 = get_post_meta($post->ID, 'text_info_grid_7', true) ?: 'Designed for';
        echo '<div class="uottawa-field"><label>Info Grid Text 7 (Preview: Designed for...)</label>';
            echo '<input type="text" name="text_info_grid_7" value="'.esc_attr($val_text_info_grid_7).'">';echo '</div>';

        $val_text_info_grid_8 = get_post_meta($post->ID, 'text_info_grid_8', true) ?: 'College-credentialed adults with 3+ years of work or professional experience.';
        echo '<div class="uottawa-field"><label>Info Grid Paragraph 8 (Preview: College-credentialed adults with 3+ year...)</label>';
            echo '<textarea name="text_info_grid_8">'.esc_textarea($val_text_info_grid_8).'</textarea>';echo '</div>';

        $val_text_info_grid_9 = get_post_meta($post->ID, 'text_info_grid_9', true) ?: 'Language of delivery';
        echo '<div class="uottawa-field"><label>Info Grid Text 9 (Preview: Language of delivery...)</label>';
            echo '<input type="text" name="text_info_grid_9" value="'.esc_attr($val_text_info_grid_9).'">';echo '</div>';

        $val_text_info_grid_10 = get_post_meta($post->ID, 'text_info_grid_10', true) ?: 'English';
        echo '<div class="uottawa-field"><label>Info Grid Text 10 (Preview: English...)</label>';
            echo '<input type="text" name="text_info_grid_10" value="'.esc_attr($val_text_info_grid_10).'">';echo '</div>';

        $val_text_info_grid_11 = get_post_meta($post->ID, 'text_info_grid_11', true) ?: '*Your existing college credential determines your uOttawa learning pathway.';
        echo '<div class="uottawa-field"><label>Info Grid Paragraph 11 (Preview: *Your existing college credential determ...)</label>';
            echo '<textarea name="text_info_grid_11">'.esc_textarea($val_text_info_grid_11).'</textarea>';echo '</div>';

        $val_text_info_grid_12 = get_post_meta($post->ID, 'text_info_grid_12', true) ?: '**Based on your existing college credential';
        echo '<div class="uottawa-field"><label>Info Grid Text 12 (Preview: **Based on your existing college credent...)</label>';
            echo '<input type="text" name="text_info_grid_12" value="'.esc_attr($val_text_info_grid_12).'">';echo '</div>';
echo '</div>';
echo '<div class="uottawa-tab-content" id="tab-2">';
echo '<h3 class="uottawa-section-title">Why uOttawa</h3>';

        $val_text_why_uottawa_1 = get_post_meta($post->ID, 'text_why_uottawa_1', true) ?: 'Why choose uOttawa&rsquo;s Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated)?';
        echo '<div class="uottawa-field"><label>Why uOttawa Paragraph 1 (Preview: Why choose uOttawa&rsquo;s Bachelor of A...)</label>';
            echo '<textarea name="text_why_uottawa_1">'.esc_textarea($val_text_why_uottawa_1).'</textarea>';echo '</div>';

        $val_text_why_uottawa_2 = get_post_meta($post->ID, 'text_why_uottawa_2', true) ?: 'Respected degree:';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 2 (Preview: Respected degree:...)</label>';
            echo '<input type="text" name="text_why_uottawa_2" value="'.esc_attr($val_text_why_uottawa_2).'">';echo '</div>';

        $val_text_why_uottawa_3 = get_post_meta($post->ID, 'text_why_uottawa_3', true) ?: 'Earn a uOttawa degree, 100% online.';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 3 (Preview: Earn a uOttawa degree, 100% online....)</label>';
            echo '<input type="text" name="text_why_uottawa_3" value="'.esc_attr($val_text_why_uottawa_3).'">';echo '</div>';

        $val_text_why_uottawa_4 = get_post_meta($post->ID, 'text_why_uottawa_4', true) ?: 'Future-proof skills:';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 4 (Preview: Future-proof skills:...)</label>';
            echo '<input type="text" name="text_why_uottawa_4" value="'.esc_attr($val_text_why_uottawa_4).'">';echo '</div>';

        $val_text_why_uottawa_5 = get_post_meta($post->ID, 'text_why_uottawa_5', true) ?: 'Build human capabilities AI can&rsquo;t replace.';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 5 (Preview: Build human capabilities AI can&rsquo;t ...)</label>';
            echo '<input type="text" name="text_why_uottawa_5" value="'.esc_attr($val_text_why_uottawa_5).'">';echo '</div>';

        $val_text_why_uottawa_6 = get_post_meta($post->ID, 'text_why_uottawa_6', true) ?: 'In-demand competencies:';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 6 (Preview: In-demand competencies:...)</label>';
            echo '<input type="text" name="text_why_uottawa_6" value="'.esc_attr($val_text_why_uottawa_6).'">';echo '</div>';

        $val_text_why_uottawa_7 = get_post_meta($post->ID, 'text_why_uottawa_7', true) ?: 'Strengthen critical thinking, communication, adaptability, and creativity.';
        echo '<div class="uottawa-field"><label>Why uOttawa Paragraph 7 (Preview: Strengthen critical thinking, communicat...)</label>';
            echo '<textarea name="text_why_uottawa_7">'.esc_textarea($val_text_why_uottawa_7).'</textarea>';echo '</div>';

        $val_text_why_uottawa_8 = get_post_meta($post->ID, 'text_why_uottawa_8', true) ?: 'Advanced analysis:';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 8 (Preview: Advanced analysis:...)</label>';
            echo '<input type="text" name="text_why_uottawa_8" value="'.esc_attr($val_text_why_uottawa_8).'">';echo '</div>';

        $val_text_why_uottawa_9 = get_post_meta($post->ID, 'text_why_uottawa_9', true) ?: 'Learn to interpret, question, and apply information.';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 9 (Preview: Learn to interpret, question, and apply ...)</label>';
            echo '<input type="text" name="text_why_uottawa_9" value="'.esc_attr($val_text_why_uottawa_9).'">';echo '</div>';

        $val_text_why_uottawa_10 = get_post_meta($post->ID, 'text_why_uottawa_10', true) ?: 'Transferable expertise:';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 10 (Preview: Transferable expertise:...)</label>';
            echo '<input type="text" name="text_why_uottawa_10" value="'.esc_attr($val_text_why_uottawa_10).'">';echo '</div>';

        $val_text_why_uottawa_11 = get_post_meta($post->ID, 'text_why_uottawa_11', true) ?: 'Gain skills applicable across industries and roles.';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 11 (Preview: Gain skills applicable across industries...)</label>';
            echo '<input type="text" name="text_why_uottawa_11" value="'.esc_attr($val_text_why_uottawa_11).'">';echo '</div>';

        $val_text_why_uottawa_12 = get_post_meta($post->ID, 'text_why_uottawa_12', true) ?: 'Accelerated path:';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 12 (Preview: Accelerated path:...)</label>';
            echo '<input type="text" name="text_why_uottawa_12" value="'.esc_attr($val_text_why_uottawa_12).'">';echo '</div>';

        $val_text_why_uottawa_13 = get_post_meta($post->ID, 'text_why_uottawa_13', true) ?: 'Complete your degree in less time using credits from your existing college diploma.';
        echo '<div class="uottawa-field"><label>Why uOttawa Paragraph 13 (Preview: Complete your degree in less time using ...)</label>';
            echo '<textarea name="text_why_uottawa_13">'.esc_textarea($val_text_why_uottawa_13).'</textarea>';echo '</div>';

        $val_text_why_uottawa_14 = get_post_meta($post->ID, 'text_why_uottawa_14', true) ?: 'Strengthen the skills';
        echo '<div class="uottawa-field"><label>Why uOttawa Heading 14 (Preview: Strengthen the skills...)</label>';
            echo '<input type="text" name="text_why_uottawa_14" value="'.esc_attr($val_text_why_uottawa_14).'">';echo '</div>';

        $val_text_why_uottawa_15 = get_post_meta($post->ID, 'text_why_uottawa_15', true) ?: 'AI can&rsquo;t replace.';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 15 (Preview: AI can&rsquo;t replace....)</label>';
            echo '<input type="text" name="text_why_uottawa_15" value="'.esc_attr($val_text_why_uottawa_15).'">';echo '</div>';

        $val_text_why_uottawa_16 = get_post_meta($post->ID, 'text_why_uottawa_16', true) ?: 'Request more info.';
        echo '<div class="uottawa-field"><label>Why uOttawa Text 16 (Preview: Request more info....)</label>';
            echo '<input type="text" name="text_why_uottawa_16" value="'.esc_attr($val_text_why_uottawa_16).'">';echo '</div>';



        $val_forminator_shortcode = get_post_meta($post->ID, 'forminator_shortcode', true) ?: '';
        echo '<div class="uottawa-field"><label>Forminator Shortcode (e.g. [forminator_form id="123"])</label>';
            echo '<input type="text" name="forminator_shortcode" value="'.esc_attr($val_forminator_shortcode).'" placeholder="Enter shortcode here to replace the hardcoded form">';echo '</div>';
echo '</div>';
echo '<div class="uottawa-tab-content" id="tab-3">';
echo '<h3 class="uottawa-section-title">Overview</h3>';

        $val_text_overview_1 = get_post_meta($post->ID, 'text_overview_1', true) ?: 'Overview';
        echo '<div class="uottawa-field"><label>Overview Text 1 (Preview: Overview...)</label>';
            echo '<input type="text" name="text_overview_1" value="'.esc_attr($val_text_overview_1).'">';echo '</div>';

        $val_text_overview_2 = get_post_meta($post->ID, 'text_overview_2', true) ?: 'Overview';
        echo '<div class="uottawa-field"><label>Overview Heading 2 (Preview: Overview...)</label>';
            echo '<input type="text" name="text_overview_2" value="'.esc_attr($val_text_overview_2).'">';echo '</div>';

        $val_text_overview_3 = get_post_meta($post->ID, 'text_overview_3', true) ?: 'Your thinking. Your work. Your future.';
        echo '<div class="uottawa-field"><label>Overview Heading 3 (Preview: Your thinking. Your work. Your future....)</label>';
            echo '<input type="text" name="text_overview_3" value="'.esc_attr($val_text_overview_3).'">';echo '</div>';

        $val_text_overview_4 = get_post_meta($post->ID, 'text_overview_4', true) ?: 'uOttawa Online&rsquo;s Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) offers unparalleled opportunities to discover your passions while staying focused on real-world relevance and long-term career goals.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 4 (Preview: uOttawa Online&rsquo;s Bachelor of Arts,...)</label>';
            echo '<textarea name="text_overview_4">'.esc_textarea($val_text_overview_4).'</textarea>';echo '</div>';

        $val_text_overview_5 = get_post_meta($post->ID, 'text_overview_5', true) ?: 'The program is rooted in the Faculty of Arts&rsquo; Human Intelligence perspective: the idea that human capacities matter more, not less, in the future of work shaped by AI, automation and rapid change.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 5 (Preview: The program is rooted in the Faculty of ...)</label>';
            echo '<textarea name="text_overview_5">'.esc_textarea($val_text_overview_5).'</textarea>';echo '</div>';

        $val_text_overview_6 = get_post_meta($post->ID, 'text_overview_6', true) ?: 'This degree elevates essential human capacities including critical thinking, judgement, creativity, empathy and communication. Developing these strengths provides the agility to interpret complex information, lead through uncertainty and thrive in a rapidly changing world.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 6 (Preview: This degree elevates essential human cap...)</label>';
            echo '<textarea name="text_overview_6">'.esc_textarea($val_text_overview_6).'</textarea>';echo '</div>';

        $val_img_overview_7 = get_post_meta($post->ID, 'img_overview_7', true) ?: 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=940&q=80';
        echo '<div class="uottawa-field"><label>Overview Image 7 (Preview: https://images.unsplash.com/photo-157349...)</label>';
            echo '<input type="text" name="img_overview_7" value="'.esc_attr($val_img_overview_7).'">';echo '</div>';

        $val_img_overview_8 = get_post_meta($post->ID, 'img_overview_8', true) ?: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=930&q=80';
        echo '<div class="uottawa-field"><label>Overview Image 8 (Preview: https://images.unsplash.com/photo-158048...)</label>';
            echo '<input type="text" name="img_overview_8" value="'.esc_attr($val_img_overview_8).'">';echo '</div>';

        $val_text_overview_9 = get_post_meta($post->ID, 'text_overview_9', true) ?: 'Who is this program made for?';
        echo '<div class="uottawa-field"><label>Overview Heading 9 (Preview: Who is this program made for?...)</label>';
            echo '<input type="text" name="text_overview_9" value="'.esc_attr($val_text_overview_9).'">';echo '</div>';

        $val_text_overview_10 = get_post_meta($post->ID, 'text_overview_10', true) ?: 'The program is designed for working adults across Canada who hold a 2-year or 3-year college diploma, have 3+ years of work experience and are ready to build on that foundation.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 10 (Preview: The program is designed for working adul...)</label>';
            echo '<textarea name="text_overview_10">'.esc_textarea($val_text_overview_10).'</textarea>';echo '</div>';

        $val_text_overview_11 = get_post_meta($post->ID, 'text_overview_11', true) ?: 'The Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) is a strong fit for professionals in healthcare, education, technology, the trades, the not-for-profit sector, the public sector and other fields where a bachelor\'s degree can support career growth. It is particularly useful for those whose next career step is gated by a credential they don\'t yet hold.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 11 (Preview: The Bachelor of Arts, Interdisciplinary ...)</label>';
            echo '<textarea name="text_overview_11">'.esc_textarea($val_text_overview_11).'</textarea>';echo '</div>';

        $val_text_overview_12 = get_post_meta($post->ID, 'text_overview_12', true) ?: 'The uOttawa online difference';
        echo '<div class="uottawa-field"><label>Overview Heading 12 (Preview: The uOttawa online difference...)</label>';
            echo '<input type="text" name="text_overview_12" value="'.esc_attr($val_text_overview_12).'">';echo '</div>';

        $val_text_overview_13 = get_post_meta($post->ID, 'text_overview_13', true) ?: 'Turn your college diploma into a uOttawa degree';
        echo '<div class="uottawa-field"><label>Overview Text 13 (Preview: Turn your college diploma into a uOttawa...)</label>';
            echo '<input type="text" name="text_overview_13" value="'.esc_attr($val_text_overview_13).'">';echo '</div>';

        $val_text_overview_14 = get_post_meta($post->ID, 'text_overview_14', true) ?: 'Build on your 2-year or 3-year diploma and earn a respected credential from a U15 research university, 100% online.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 14 (Preview: Build on your 2-year or 3-year diploma a...)</label>';
            echo '<textarea name="text_overview_14">'.esc_textarea($val_text_overview_14).'</textarea>';echo '</div>';

        $val_text_overview_15 = get_post_meta($post->ID, 'text_overview_15', true) ?: 'Learn from a Faculty leading the AI-era skills conversation';
        echo '<div class="uottawa-field"><label>Overview Text 15 (Preview: Learn from a Faculty leading the AI-era ...)</label>';
            echo '<input type="text" name="text_overview_15" value="'.esc_attr($val_text_overview_15).'">';echo '</div>';

        $val_text_overview_16 = get_post_meta($post->ID, 'text_overview_16', true) ?: 'Our Faculty of Arts is a leading Canadian voice on what a liberal arts education means in an age of artificial intelligence.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 16 (Preview: Our Faculty of Arts is a leading Canadia...)</label>';
            echo '<textarea name="text_overview_16">'.esc_textarea($val_text_overview_16).'</textarea>';echo '</div>';

        $val_text_overview_17 = get_post_meta($post->ID, 'text_overview_17', true) ?: 'Designed for working adults';
        echo '<div class="uottawa-field"><label>Overview Text 17 (Preview: Designed for working adults...)</label>';
            echo '<input type="text" name="text_overview_17" value="'.esc_attr($val_text_overview_17).'">';echo '</div>';

        $val_text_overview_18 = get_post_meta($post->ID, 'text_overview_18', true) ?: 'Study fully online with flexible pacing and dedicated advisors, so you can progress without pausing your career or relocating.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 18 (Preview: Study fully online with flexible pacing ...)</label>';
            echo '<textarea name="text_overview_18">'.esc_textarea($val_text_overview_18).'</textarea>';echo '</div>';

        $val_text_overview_19 = get_post_meta($post->ID, 'text_overview_19', true) ?: 'What sets this program apart';
        echo '<div class="uottawa-field"><label>Overview Heading 19 (Preview: What sets this program apart...)</label>';
            echo '<input type="text" name="text_overview_19" value="'.esc_attr($val_text_overview_19).'">';echo '</div>';

        $val_text_overview_20 = get_post_meta($post->ID, 'text_overview_20', true) ?: 'Human-centred skills that travel';
        echo '<div class="uottawa-field"><label>Overview Text 20 (Preview: Human-centred skills that travel...)</label>';
            echo '<input type="text" name="text_overview_20" value="'.esc_attr($val_text_overview_20).'">';echo '</div>';

        $val_text_overview_21 = get_post_meta($post->ID, 'text_overview_21', true) ?: 'Every course builds transferable capabilities, including critical thinking, judgement, creativity and communication, that move with you across roles, sectors and technological change.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 21 (Preview: Every course builds transferable capabil...)</label>';
            echo '<textarea name="text_overview_21">'.esc_textarea($val_text_overview_21).'</textarea>';echo '</div>';

        $val_text_overview_22 = get_post_meta($post->ID, 'text_overview_22', true) ?: 'Interdisciplinary breadth';
        echo '<div class="uottawa-field"><label>Overview Text 22 (Preview: Interdisciplinary breadth...)</label>';
            echo '<input type="text" name="text_overview_22" value="'.esc_attr($val_text_overview_22).'">';echo '</div>';

        $val_text_overview_23 = get_post_meta($post->ID, 'text_overview_23', true) ?: 'Explore ideas across history, culture, ethics, environment, digital cultures and Indigenous thought, connecting knowledge across fields rather than one narrow lane.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 23 (Preview: Explore ideas across history, culture, e...)</label>';
            echo '<textarea name="text_overview_23">'.esc_textarea($val_text_overview_23).'</textarea>';echo '</div>';

        $val_text_overview_24 = get_post_meta($post->ID, 'text_overview_24', true) ?: 'A credential with momentum';
        echo '<div class="uottawa-field"><label>Overview Text 24 (Preview: A credential with momentum...)</label>';
            echo '<input type="text" name="text_overview_24" value="'.esc_attr($val_text_overview_24).'">';echo '</div>';

        $val_text_overview_25 = get_post_meta($post->ID, 'text_overview_25', true) ?: 'Complete your degree in as little as 20 months using credit from your existing college diploma, without relocating or stepping away from work or other commitments.';
        echo '<div class="uottawa-field"><label>Overview Paragraph 25 (Preview: Complete your degree in as little as 20 ...)</label>';
            echo '<textarea name="text_overview_25">'.esc_textarea($val_text_overview_25).'</textarea>';echo '</div>';

        $val_text_overview_26 = get_post_meta($post->ID, 'text_overview_26', true) ?: 'Request more information';
        echo '<div class="uottawa-field"><label>Overview Text 26 (Preview: Request more information...)</label>';
            echo '<input type="text" name="text_overview_26" value="'.esc_attr($val_text_overview_26).'">';echo '</div>';
echo '</div>';
echo '<div class="uottawa-tab-content" id="tab-4">';
echo '<h3 class="uottawa-section-title">Program Insights</h3>';

        $val_text_program_insights_1 = get_post_meta($post->ID, 'text_program_insights_1', true) ?: 'Program insights';
        echo '<div class="uottawa-field"><label>Program Insights Text 1 (Preview: Program insights...)</label>';
            echo '<input type="text" name="text_program_insights_1" value="'.esc_attr($val_text_program_insights_1).'">';echo '</div>';

        $val_text_program_insights_2 = get_post_meta($post->ID, 'text_program_insights_2', true) ?: 'Career &amp; learning outcomes';
        echo '<div class="uottawa-field"><label>Program Insights Text 2 (Preview: Career &amp; learning outcomes...)</label>';
            echo '<input type="text" name="text_program_insights_2" value="'.esc_attr($val_text_program_insights_2).'">';echo '</div>';

        $val_text_program_insights_3 = get_post_meta($post->ID, 'text_program_insights_3', true) ?: 'Program insights';
        echo '<div class="uottawa-field"><label>Program Insights Heading 3 (Preview: Program insights...)</label>';
            echo '<input type="text" name="text_program_insights_3" value="'.esc_attr($val_text_program_insights_3).'">';echo '</div>';

        $val_text_program_insights_4 = get_post_meta($post->ID, 'text_program_insights_4', true) ?: 'The Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) is designed specifically for college diploma graduates. We recognize the work you\'ve already completed by creating a direct, supported path to your bachelor\'s degree.';
        echo '<div class="uottawa-field"><label>Program Insights Paragraph 4 (Preview: The Bachelor of Arts, Interdisciplinary ...)</label>';
            echo '<textarea name="text_program_insights_4">'.esc_textarea($val_text_program_insights_4).'</textarea>';echo '</div>';

        $val_text_program_insights_5 = get_post_meta($post->ID, 'text_program_insights_5', true) ?: 'From a college diploma to a university degree';
        echo '<div class="uottawa-field"><label>Program Insights Text 5 (Preview: From a college diploma to a university d...)</label>';
            echo '<input type="text" name="text_program_insights_5" value="'.esc_attr($val_text_program_insights_5).'">';echo '</div>';

        $val_text_program_insights_6 = get_post_meta($post->ID, 'text_program_insights_6', true) ?: 'We make the transfer process simple: your eligible college diploma is recognized at admission and sets your pathway.';
        echo '<div class="uottawa-field"><label>Program Insights Paragraph 6 (Preview: We make the transfer process simple: you...)</label>';
            echo '<textarea name="text_program_insights_6">'.esc_textarea($val_text_program_insights_6).'</textarea>';echo '</div>';

        $val_text_program_insights_7 = get_post_meta($post->ID, 'text_program_insights_7', true) ?: 'Eligible 2-year or 3-year college diploma';
        echo '<div class="uottawa-field"><label>Program Insights Text 7 (Preview: Your eligible 2-year or 3-year college d...)</label>';
            echo '<input type="text" name="text_program_insights_7" value="'.esc_attr($val_text_program_insights_7).'">';echo '</div>';

        $val_text_program_insights_8 = get_post_meta($post->ID, 'text_program_insights_8', true) ?: 'remaining uOttawa Online courses';
        echo '<div class="uottawa-field"><label>Program Insights Text 8 (Preview: your remaining uOttawa Online courses...)</label>';
            echo '<input type="text" name="text_program_insights_8" value="'.esc_attr($val_text_program_insights_8).'">';echo '</div>';

        $val_text_program_insights_9 = get_post_meta($post->ID, 'text_program_insights_9', true) ?: '(45 or 60 units, depending on your diploma)';
        echo '<div class="uottawa-field"><label>Program Insights Text 9 (Preview: (45 or 60 units, depending on your diplo...)</label>';
            echo '<input type="text" name="text_program_insights_9" value="'.esc_attr($val_text_program_insights_9).'">';echo '</div>';

        $val_text_program_insights_10 = get_post_meta($post->ID, 'text_program_insights_10', true) ?: 'Bachelor of Arts, Interdisciplinary Studies';
        echo '<div class="uottawa-field"><label>Program Insights Text 10 (Preview: your Bachelor of Arts, Interdisciplinary...)</label>';
            echo '<input type="text" name="text_program_insights_10" value="'.esc_attr($val_text_program_insights_10).'">';echo '</div>';

        $val_text_program_insights_11 = get_post_meta($post->ID, 'text_program_insights_11', true) ?: 'How it works';
        echo '<div class="uottawa-field"><label>Program Insights Text 11 (Preview: How it works...)</label>';
            echo '<input type="text" name="text_program_insights_11" value="'.esc_attr($val_text_program_insights_11).'">';echo '</div>';

        $val_text_program_insights_12 = get_post_meta($post->ID, 'text_program_insights_12', true) ?: 'The University of Ottawa recognizes your eligible college diploma with a block transfer at admission. This process determines which of the two accelerated pathways applies to you. Complete the remaining 45 units (~20 months) or 60 units (~28 months) through uOttawa Online to earn your degree and graduate.';
        echo '<div class="uottawa-field"><label>Program Insights Paragraph 12 (Preview: The University of Ottawa recognizes your...)</label>';
            echo '<textarea name="text_program_insights_12">'.esc_textarea($val_text_program_insights_12).'</textarea>';echo '</div>';
echo '</div>';
echo '<div class="uottawa-tab-content" id="tab-5">';
echo '<h3 class="uottawa-section-title">Admissions</h3>';

        $val_text_admissions_1 = get_post_meta($post->ID, 'text_admissions_1', true) ?: 'Admissions';
        echo '<div class="uottawa-field"><label>Admissions Text 1 (Preview: Admissions...)</label>';
            echo '<input type="text" name="text_admissions_1" value="'.esc_attr($val_text_admissions_1).'">';echo '</div>';
echo '</div>';
echo '<div class="uottawa-tab-content" id="tab-6">';
echo '<h3 class="uottawa-section-title">FAQ</h3>';

        $val_text_faq_1 = get_post_meta($post->ID, 'text_faq_1', true) ?: 'FAQ';
        echo '<div class="uottawa-field"><label>FAQ Text 1 (Preview: FAQ...)</label>';
            echo '<input type="text" name="text_faq_1" value="'.esc_attr($val_text_faq_1).'">';echo '</div>';
echo '</div>';
echo '<div class="uottawa-tab-content" id="tab-7">';
echo '<h3 class="uottawa-section-title">Course Information</h3>';

        $val_text_course_information_1 = get_post_meta($post->ID, 'text_course_information_1', true) ?: 'Course information';
        echo '<div class="uottawa-field"><label>Course Information Heading 1 (Preview: Course information...)</label>';
            echo '<input type="text" name="text_course_information_1" value="'.esc_attr($val_text_course_information_1).'">';echo '</div>';

        $val_text_course_information_2 = get_post_meta($post->ID, 'text_course_information_2', true) ?: 'Explore ideas across disciplines while building transferable, workplace-relevant skills such as digital literacy, interdisciplinary problem-solving, cultural context and historical understanding. Courses progress from 1000-level foundations through 4000-level application.';
        echo '<div class="uottawa-field"><label>Course Information Paragraph 2 (Preview: Explore ideas across disciplines while b...)</label>';
            echo '<textarea name="text_course_information_2">'.esc_textarea($val_text_course_information_2).'</textarea>';echo '</div>';

        $val_text_course_information_3 = get_post_meta($post->ID, 'text_course_information_3', true) ?: '1000-level foundations';
        echo '<div class="uottawa-field"><label>Course Information Text 3 (Preview: 1000-level foundations...)</label>';
            echo '<input type="text" name="text_course_information_3" value="'.esc_attr($val_text_course_information_3).'">';echo '</div>';

        $val_text_course_information_4 = get_post_meta($post->ID, 'text_course_information_4', true) ?: 'Rebuild core academic skills and explore the disciplines that shape how we understand the world, from digital literacy and global history to Indigenous studies.';
        echo '<div class="uottawa-field"><label>Course Information Paragraph 4 (Preview: Rebuild core academic skills and explore...)</label>';
            echo '<textarea name="text_course_information_4">'.esc_textarea($val_text_course_information_4).'</textarea>';echo '</div>';

        $val_text_course_information_5 = get_post_meta($post->ID, 'text_course_information_5', true) ?: '2000-level breadth';
        echo '<div class="uottawa-field"><label>Course Information Text 5 (Preview: 2000-level breadth...)</label>';
            echo '<input type="text" name="text_course_information_5" value="'.esc_attr($val_text_course_information_5).'">';echo '</div>';

        $val_text_course_information_6 = get_post_meta($post->ID, 'text_course_information_6', true) ?: 'Expand your thinking across human experience: culture, communication, ethics, and knowledge systems from ancient to contemporary times.';
        echo '<div class="uottawa-field"><label>Course Information Paragraph 6 (Preview: Expand your thinking across human experi...)</label>';
            echo '<textarea name="text_course_information_6">'.esc_textarea($val_text_course_information_6).'</textarea>';echo '</div>';

        $val_text_course_information_7 = get_post_meta($post->ID, 'text_course_information_7', true) ?: '3000-level integration';
        echo '<div class="uottawa-field"><label>Course Information Text 7 (Preview: 3000-level integration...)</label>';
            echo '<input type="text" name="text_course_information_7" value="'.esc_attr($val_text_course_information_7).'">';echo '</div>';

        $val_text_course_information_8 = get_post_meta($post->ID, 'text_course_information_8', true) ?: 'Examine how ideas, identities and cultures intersect across time and place, developing interdisciplinary analytical range.';
        echo '<div class="uottawa-field"><label>Course Information Paragraph 8 (Preview: Examine how ideas, identities and cultur...)</label>';
            echo '<textarea name="text_course_information_8">'.esc_textarea($val_text_course_information_8).'</textarea>';echo '</div>';

        $val_text_course_information_9 = get_post_meta($post->ID, 'text_course_information_9', true) ?: '4000-level application';
        echo '<div class="uottawa-field"><label>Course Information Text 9 (Preview: 4000-level application...)</label>';
            echo '<input type="text" name="text_course_information_9" value="'.esc_attr($val_text_course_information_9).'">';echo '</div>';

        $val_text_course_information_10 = get_post_meta($post->ID, 'text_course_information_10', true) ?: 'Apply everything you\'re learning and synthesize your ideas in a capstone-style course.';
        echo '<div class="uottawa-field"><label>Course Information Paragraph 10 (Preview: Apply everything you\'re learning and sy...)</label>';
            echo '<textarea name="text_course_information_10">'.esc_textarea($val_text_course_information_10).'</textarea>';echo '</div>';
echo '</div>';
echo '<div class="uottawa-tab-content" id="tab-8">';
echo '<h3 class="uottawa-section-title">Areas of Study</h3>';

        $val_text_areas_of_study_1 = get_post_meta($post->ID, 'text_areas_of_study_1', true) ?: 'Areas of study';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 1 (Preview: Areas of study...)</label>';
            echo '<input type="text" name="text_areas_of_study_1" value="'.esc_attr($val_text_areas_of_study_1).'">';echo '</div>';

        $val_text_areas_of_study_2 = get_post_meta($post->ID, 'text_areas_of_study_2', true) ?: 'Global history';
        echo '<div class="uottawa-field"><label>Areas of Study Text 2 (Preview: Global history...)</label>';
            echo '<input type="text" name="text_areas_of_study_2" value="'.esc_attr($val_text_areas_of_study_2).'">';echo '</div>';

        $val_text_areas_of_study_3 = get_post_meta($post->ID, 'text_areas_of_study_3', true) ?: 'Canadian culture';
        echo '<div class="uottawa-field"><label>Areas of Study Text 3 (Preview: Canadian culture...)</label>';
            echo '<input type="text" name="text_areas_of_study_3" value="'.esc_attr($val_text_areas_of_study_3).'">';echo '</div>';

        $val_text_areas_of_study_4 = get_post_meta($post->ID, 'text_areas_of_study_4', true) ?: 'Literature';
        echo '<div class="uottawa-field"><label>Areas of Study Text 4 (Preview: Literature...)</label>';
            echo '<input type="text" name="text_areas_of_study_4" value="'.esc_attr($val_text_areas_of_study_4).'">';echo '</div>';

        $val_text_areas_of_study_5 = get_post_meta($post->ID, 'text_areas_of_study_5', true) ?: 'Architecture &amp; art';
        echo '<div class="uottawa-field"><label>Areas of Study Text 5 (Preview: Architecture &amp; art...)</label>';
            echo '<input type="text" name="text_areas_of_study_5" value="'.esc_attr($val_text_areas_of_study_5).'">';echo '</div>';

        $val_text_areas_of_study_6 = get_post_meta($post->ID, 'text_areas_of_study_6', true) ?: 'Environmental studies';
        echo '<div class="uottawa-field"><label>Areas of Study Text 6 (Preview: Environmental studies...)</label>';
            echo '<input type="text" name="text_areas_of_study_6" value="'.esc_attr($val_text_areas_of_study_6).'">';echo '</div>';

        $val_text_areas_of_study_7 = get_post_meta($post->ID, 'text_areas_of_study_7', true) ?: 'Indigenous thought';
        echo '<div class="uottawa-field"><label>Areas of Study Text 7 (Preview: Indigenous thought...)</label>';
            echo '<input type="text" name="text_areas_of_study_7" value="'.esc_attr($val_text_areas_of_study_7).'">';echo '</div>';

        $val_text_areas_of_study_8 = get_post_meta($post->ID, 'text_areas_of_study_8', true) ?: 'Digital cultures';
        echo '<div class="uottawa-field"><label>Areas of Study Text 8 (Preview: Digital cultures...)</label>';
            echo '<input type="text" name="text_areas_of_study_8" value="'.esc_attr($val_text_areas_of_study_8).'">';echo '</div>';

        $val_text_areas_of_study_9 = get_post_meta($post->ID, 'text_areas_of_study_9', true) ?: 'Ethics';
        echo '<div class="uottawa-field"><label>Areas of Study Text 9 (Preview: Ethics...)</label>';
            echo '<input type="text" name="text_areas_of_study_9" value="'.esc_attr($val_text_areas_of_study_9).'">';echo '</div>';

        $val_text_areas_of_study_10 = get_post_meta($post->ID, 'text_areas_of_study_10', true) ?: 'Agency, identity and society';
        echo '<div class="uottawa-field"><label>Areas of Study Text 10 (Preview: Agency, identity and society...)</label>';
            echo '<input type="text" name="text_areas_of_study_10" value="'.esc_attr($val_text_areas_of_study_10).'">';echo '</div>';

        $val_text_areas_of_study_11 = get_post_meta($post->ID, 'text_areas_of_study_11', true) ?: 'Communication';
        echo '<div class="uottawa-field"><label>Areas of Study Text 11 (Preview: Communication...)</label>';
            echo '<input type="text" name="text_areas_of_study_11" value="'.esc_attr($val_text_areas_of_study_11).'">';echo '</div>';

        $val_text_areas_of_study_12 = get_post_meta($post->ID, 'text_areas_of_study_12', true) ?: 'Interpretation';
        echo '<div class="uottawa-field"><label>Areas of Study Text 12 (Preview: Interpretation...)</label>';
            echo '<input type="text" name="text_areas_of_study_12" value="'.esc_attr($val_text_areas_of_study_12).'">';echo '</div>';

        $val_text_areas_of_study_13 = get_post_meta($post->ID, 'text_areas_of_study_13', true) ?: 'Critical analysis';
        echo '<div class="uottawa-field"><label>Areas of Study Text 13 (Preview: Critical analysis...)</label>';
            echo '<input type="text" name="text_areas_of_study_13" value="'.esc_attr($val_text_areas_of_study_13).'">';echo '</div>';

        $val_img_areas_of_study_14 = get_post_meta($post->ID, 'img_areas_of_study_14', true) ?: '/wp-content/uploads/2026/08/09a3437c81e0706f56f386a8cdcda7ccbf69d2b5.webp';
        echo '<div class="uottawa-field"><label>Areas of Study Image 14 (Preview: https://images.unsplash.com/photo-152207...)</label>';
            echo '<input type="text" name="img_areas_of_study_14" value="'.esc_attr($val_img_areas_of_study_14).'">';echo '</div>';

        $val_text_areas_of_study_15 = get_post_meta($post->ID, 'text_areas_of_study_15', true) ?: 'Pathway 1: 45-unit accelerated pathway';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 15 (Preview: Pathway 1: 45-unit accelerated pathway...)</label>';
            echo '<input type="text" name="text_areas_of_study_15" value="'.esc_attr($val_text_areas_of_study_15).'">';echo '</div>';

        $val_text_areas_of_study_16 = get_post_meta($post->ID, 'text_areas_of_study_16', true) ?: 'Year 1';
        echo '<div class="uottawa-field"><label>Areas of Study Text 16 (Preview: Year 1...)</label>';
            echo '<input type="text" name="text_areas_of_study_16" value="'.esc_attr($val_text_areas_of_study_16).'">';echo '</div>';

        $val_text_areas_of_study_17 = get_post_meta($post->ID, 'text_areas_of_study_17', true) ?: 'CMN 2130 - Interpersonal Communication';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 17 (Preview: CMN 2130 - Interpersonal Communication...)</label>';
            echo '<input type="text" name="text_areas_of_study_17" value="'.esc_attr($val_text_areas_of_study_17).'">';echo '</div>';

        $val_text_areas_of_study_18 = get_post_meta($post->ID, 'text_areas_of_study_18', true) ?: 'Major theories and techniques of interpersonal communication, applied to professional and social situations.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 18 (Preview: Major theories and techniques of interpe...)</label>';
            echo '<textarea name="text_areas_of_study_18">'.esc_textarea($val_text_areas_of_study_18).'</textarea>';echo '</div>';

        $val_text_areas_of_study_19 = get_post_meta($post->ID, 'text_areas_of_study_19', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 19 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_19" value="'.esc_attr($val_text_areas_of_study_19).'">';echo '</div>';

        $val_text_areas_of_study_20 = get_post_meta($post->ID, 'text_areas_of_study_20', true) ?: 'DCN 1101 - Digital Literacy';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 20 (Preview: DCN 1101 - Digital Literacy...)</label>';
            echo '<input type="text" name="text_areas_of_study_20" value="'.esc_attr($val_text_areas_of_study_20).'">';echo '</div>';

        $val_text_areas_of_study_21 = get_post_meta($post->ID, 'text_areas_of_study_21', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 21 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_21" value="'.esc_attr($val_text_areas_of_study_21).'">';echo '</div>';

        $val_text_areas_of_study_22 = get_post_meta($post->ID, 'text_areas_of_study_22', true) ?: 'EAS 1101 - Introduction to Indigenous Studies';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 22 (Preview: EAS 1101 - Introduction to Indigenous St...)</label>';
            echo '<input type="text" name="text_areas_of_study_22" value="'.esc_attr($val_text_areas_of_study_22).'">';echo '</div>';

        $val_text_areas_of_study_23 = get_post_meta($post->ID, 'text_areas_of_study_23', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 23 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_23" value="'.esc_attr($val_text_areas_of_study_23).'">';echo '</div>';

        $val_text_areas_of_study_24 = get_post_meta($post->ID, 'text_areas_of_study_24', true) ?: 'HIS 1110 - Introduction to Global History';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 24 (Preview: HIS 1110 - Introduction to Global Histor...)</label>';
            echo '<input type="text" name="text_areas_of_study_24" value="'.esc_attr($val_text_areas_of_study_24).'">';echo '</div>';

        $val_text_areas_of_study_25 = get_post_meta($post->ID, 'text_areas_of_study_25', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 25 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_25" value="'.esc_attr($val_text_areas_of_study_25).'">';echo '</div>';

        $val_text_areas_of_study_26 = get_post_meta($post->ID, 'text_areas_of_study_26', true) ?: 'EAS 2172 - Indigenous Peoples, Technology, Media, and Law';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 26 (Preview: EAS 2172 - Indigenous Peoples, Technolog...)</label>';
            echo '<input type="text" name="text_areas_of_study_26" value="'.esc_attr($val_text_areas_of_study_26).'">';echo '</div>';

        $val_text_areas_of_study_27 = get_post_meta($post->ID, 'text_areas_of_study_27', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 27 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_27" value="'.esc_attr($val_text_areas_of_study_27).'">';echo '</div>';

        $val_text_areas_of_study_28 = get_post_meta($post->ID, 'text_areas_of_study_28', true) ?: 'PHI 2100 - Animal Ethics';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 28 (Preview: PHI 2100 - Animal Ethics...)</label>';
            echo '<input type="text" name="text_areas_of_study_28" value="'.esc_attr($val_text_areas_of_study_28).'">';echo '</div>';

        $val_text_areas_of_study_29 = get_post_meta($post->ID, 'text_areas_of_study_29', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 29 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_29" value="'.esc_attr($val_text_areas_of_study_29).'">';echo '</div>';

        $val_text_areas_of_study_30 = get_post_meta($post->ID, 'text_areas_of_study_30', true) ?: 'AHL 2170 - Interdisciplinary Studies: Expanding Boundaries of Knowledge';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 30 (Preview: AHL 2170 - Interdisciplinary Studies: Ex...)</label>';
            echo '<textarea name="text_areas_of_study_30">'.esc_textarea($val_text_areas_of_study_30).'</textarea>';echo '</div>';

        $val_text_areas_of_study_31 = get_post_meta($post->ID, 'text_areas_of_study_31', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 31 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_31" value="'.esc_attr($val_text_areas_of_study_31).'">';echo '</div>';

        $val_text_areas_of_study_32 = get_post_meta($post->ID, 'text_areas_of_study_32', true) ?: 'AHL 2171 - The Persistence of Magic: Myth, Ritual, and the Human Experience';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 32 (Preview: AHL 2171 - The Persistence of Magic: Myt...)</label>';
            echo '<textarea name="text_areas_of_study_32">'.esc_textarea($val_text_areas_of_study_32).'</textarea>';echo '</div>';

        $val_text_areas_of_study_33 = get_post_meta($post->ID, 'text_areas_of_study_33', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 33 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_33" value="'.esc_attr($val_text_areas_of_study_33).'">';echo '</div>';

        $val_text_areas_of_study_34 = get_post_meta($post->ID, 'text_areas_of_study_34', true) ?: 'GEG 2110 - Sustainable Cities';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 34 (Preview: GEG 2110 - Sustainable Cities...)</label>';
            echo '<input type="text" name="text_areas_of_study_34" value="'.esc_attr($val_text_areas_of_study_34).'">';echo '</div>';

        $val_text_areas_of_study_35 = get_post_meta($post->ID, 'text_areas_of_study_35', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 35 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_35" value="'.esc_attr($val_text_areas_of_study_35).'">';echo '</div>';

        $val_text_areas_of_study_36 = get_post_meta($post->ID, 'text_areas_of_study_36', true) ?: 'Year 2';
        echo '<div class="uottawa-field"><label>Areas of Study Text 36 (Preview: Year 2...)</label>';
            echo '<input type="text" name="text_areas_of_study_36" value="'.esc_attr($val_text_areas_of_study_36).'">';echo '</div>';

        $val_text_areas_of_study_37 = get_post_meta($post->ID, 'text_areas_of_study_37', true) ?: 'LCM 3101 - World Cultures in Contact';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 37 (Preview: LCM 3101 - World Cultures in Contact...)</label>';
            echo '<input type="text" name="text_areas_of_study_37" value="'.esc_attr($val_text_areas_of_study_37).'">';echo '</div>';

        $val_text_areas_of_study_38 = get_post_meta($post->ID, 'text_areas_of_study_38', true) ?: 'Explores how cultures interact, exchange ideas and influence one another across history.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 38 (Preview: Explores how cultures interact, exchange...)</label>';
            echo '<textarea name="text_areas_of_study_38">'.esc_textarea($val_text_areas_of_study_38).'</textarea>';echo '</div>';

        $val_text_areas_of_study_39 = get_post_meta($post->ID, 'text_areas_of_study_39', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 39 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_39" value="'.esc_attr($val_text_areas_of_study_39).'">';echo '</div>';

        $val_text_areas_of_study_40 = get_post_meta($post->ID, 'text_areas_of_study_40', true) ?: 'SRS 3173 - Bible and Culture';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 40 (Preview: SRS 3173 - Bible and Culture...)</label>';
            echo '<input type="text" name="text_areas_of_study_40" value="'.esc_attr($val_text_areas_of_study_40).'">';echo '</div>';

        $val_text_areas_of_study_41 = get_post_meta($post->ID, 'text_areas_of_study_41', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 41 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_41" value="'.esc_attr($val_text_areas_of_study_41).'">';echo '</div>';

        $val_text_areas_of_study_42 = get_post_meta($post->ID, 'text_areas_of_study_42', true) ?: 'AHL 3170 - Exploring Art and Architecture';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 42 (Preview: AHL 3170 - Exploring Art and Architectur...)</label>';
            echo '<input type="text" name="text_areas_of_study_42" value="'.esc_attr($val_text_areas_of_study_42).'">';echo '</div>';

        $val_text_areas_of_study_43 = get_post_meta($post->ID, 'text_areas_of_study_43', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 43 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_43" value="'.esc_attr($val_text_areas_of_study_43).'">';echo '</div>';

        $val_text_areas_of_study_44 = get_post_meta($post->ID, 'text_areas_of_study_44', true) ?: 'LCM 3105 - Identities, Ideas, and Ideologies Across World Cultures';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 44 (Preview: LCM 3105 - Identities, Ideas, and Ideolo...)</label>';
            echo '<textarea name="text_areas_of_study_44">'.esc_textarea($val_text_areas_of_study_44).'</textarea>';echo '</div>';

        $val_text_areas_of_study_45 = get_post_meta($post->ID, 'text_areas_of_study_45', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 45 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_45" value="'.esc_attr($val_text_areas_of_study_45).'">';echo '</div>';

        $val_text_areas_of_study_46 = get_post_meta($post->ID, 'text_areas_of_study_46', true) ?: 'AHL 4170 - Harnessing Interdisciplinary Thinking: Knowledge for Insight Application';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 46 (Preview: AHL 4170 - Harnessing Interdisciplinary ...)</label>';
            echo '<textarea name="text_areas_of_study_46">'.esc_textarea($val_text_areas_of_study_46).'</textarea>';echo '</div>';

        $val_text_areas_of_study_47 = get_post_meta($post->ID, 'text_areas_of_study_47', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 47 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_47" value="'.esc_attr($val_text_areas_of_study_47).'">';echo '</div>';

        $val_text_areas_of_study_48 = get_post_meta($post->ID, 'text_areas_of_study_48', true) ?: 'PHI 2122 - Ancient Wisdom';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 48 (Preview: PHI 2122 - Ancient Wisdom...)</label>';
            echo '<input type="text" name="text_areas_of_study_48" value="'.esc_attr($val_text_areas_of_study_48).'">';echo '</div>';

        $val_text_areas_of_study_49 = get_post_meta($post->ID, 'text_areas_of_study_49', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 49 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_49" value="'.esc_attr($val_text_areas_of_study_49).'">';echo '</div>';

        $val_text_areas_of_study_50 = get_post_meta($post->ID, 'text_areas_of_study_50', true) ?: 'Download course map';
        echo '<div class="uottawa-field"><label>Areas of Study Text 50 (Preview: Download course map...)</label>';
            echo '<input type="text" name="text_areas_of_study_50" value="'.esc_attr($val_text_areas_of_study_50).'">';echo '</div>';

        $val_text_areas_of_study_51 = get_post_meta($post->ID, 'text_areas_of_study_51', true) ?: 'Pathway 2: 60-unit accelerated pathway';
        echo '<div class="uottawa-field"><label>Areas of Study Text 51 (Preview: Pathway 2: 60-unit accelerated pathway...)</label>';
            echo '<input type="text" name="text_areas_of_study_51" value="'.esc_attr($val_text_areas_of_study_51).'">';echo '</div>';

        $val_text_areas_of_study_52 = get_post_meta($post->ID, 'text_areas_of_study_52', true) ?: 'Year 1';
        echo '<div class="uottawa-field"><label>Areas of Study Text 52 (Preview: Year 1...)</label>';
            echo '<input type="text" name="text_areas_of_study_52" value="'.esc_attr($val_text_areas_of_study_52).'">';echo '</div>';

        $val_text_areas_of_study_53 = get_post_meta($post->ID, 'text_areas_of_study_53', true) ?: 'CMN 2130 - Interpersonal Communication';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 53 (Preview: CMN 2130 - Interpersonal Communication...)</label>';
            echo '<input type="text" name="text_areas_of_study_53" value="'.esc_attr($val_text_areas_of_study_53).'">';echo '</div>';

        $val_text_areas_of_study_54 = get_post_meta($post->ID, 'text_areas_of_study_54', true) ?: 'Major theories and techniques of interpersonal communication, applied to professional and social situations.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 54 (Preview: Major theories and techniques of interpe...)</label>';
            echo '<textarea name="text_areas_of_study_54">'.esc_textarea($val_text_areas_of_study_54).'</textarea>';echo '</div>';

        $val_text_areas_of_study_55 = get_post_meta($post->ID, 'text_areas_of_study_55', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 55 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_55" value="'.esc_attr($val_text_areas_of_study_55).'">';echo '</div>';

        $val_text_areas_of_study_56 = get_post_meta($post->ID, 'text_areas_of_study_56', true) ?: 'DCN 1101 - Digital Literacy';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 56 (Preview: DCN 1101 - Digital Literacy...)</label>';
            echo '<input type="text" name="text_areas_of_study_56" value="'.esc_attr($val_text_areas_of_study_56).'">';echo '</div>';

        $val_text_areas_of_study_57 = get_post_meta($post->ID, 'text_areas_of_study_57', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 57 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_57" value="'.esc_attr($val_text_areas_of_study_57).'">';echo '</div>';

        $val_text_areas_of_study_58 = get_post_meta($post->ID, 'text_areas_of_study_58', true) ?: 'EAS 1101 - Introduction to Indigenous Studies';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 58 (Preview: EAS 1101 - Introduction to Indigenous St...)</label>';
            echo '<input type="text" name="text_areas_of_study_58" value="'.esc_attr($val_text_areas_of_study_58).'">';echo '</div>';

        $val_text_areas_of_study_59 = get_post_meta($post->ID, 'text_areas_of_study_59', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 59 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_59" value="'.esc_attr($val_text_areas_of_study_59).'">';echo '</div>';

        $val_text_areas_of_study_60 = get_post_meta($post->ID, 'text_areas_of_study_60', true) ?: 'HIS 1110 - Introduction to Global History';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 60 (Preview: HIS 1110 - Introduction to Global Histor...)</label>';
            echo '<input type="text" name="text_areas_of_study_60" value="'.esc_attr($val_text_areas_of_study_60).'">';echo '</div>';

        $val_text_areas_of_study_61 = get_post_meta($post->ID, 'text_areas_of_study_61', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 61 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_61" value="'.esc_attr($val_text_areas_of_study_61).'">';echo '</div>';

        $val_text_areas_of_study_62 = get_post_meta($post->ID, 'text_areas_of_study_62', true) ?: 'EAS 2172 - Indigenous Peoples, Technology, Media, and Law';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 62 (Preview: EAS 2172 - Indigenous Peoples, Technolog...)</label>';
            echo '<input type="text" name="text_areas_of_study_62" value="'.esc_attr($val_text_areas_of_study_62).'">';echo '</div>';

        $val_text_areas_of_study_63 = get_post_meta($post->ID, 'text_areas_of_study_63', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 63 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_63" value="'.esc_attr($val_text_areas_of_study_63).'">';echo '</div>';

        $val_text_areas_of_study_64 = get_post_meta($post->ID, 'text_areas_of_study_64', true) ?: 'PHI 2100 - Animal Ethics';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 64 (Preview: PHI 2100 - Animal Ethics...)</label>';
            echo '<input type="text" name="text_areas_of_study_64" value="'.esc_attr($val_text_areas_of_study_64).'">';echo '</div>';

        $val_text_areas_of_study_65 = get_post_meta($post->ID, 'text_areas_of_study_65', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 65 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_65" value="'.esc_attr($val_text_areas_of_study_65).'">';echo '</div>';

        $val_text_areas_of_study_66 = get_post_meta($post->ID, 'text_areas_of_study_66', true) ?: 'AHL 2170 - Interdisciplinary Studies: Expanding Boundaries of Knowledge';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 66 (Preview: AHL 2170 - Interdisciplinary Studies: Ex...)</label>';
            echo '<textarea name="text_areas_of_study_66">'.esc_textarea($val_text_areas_of_study_66).'</textarea>';echo '</div>';

        $val_text_areas_of_study_67 = get_post_meta($post->ID, 'text_areas_of_study_67', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 67 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_67" value="'.esc_attr($val_text_areas_of_study_67).'">';echo '</div>';

        $val_text_areas_of_study_68 = get_post_meta($post->ID, 'text_areas_of_study_68', true) ?: 'AHL 2171 - The Persistence of Magic: Myth, Ritual, and the Human Experience';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 68 (Preview: AHL 2171 - The Persistence of Magic: Myt...)</label>';
            echo '<textarea name="text_areas_of_study_68">'.esc_textarea($val_text_areas_of_study_68).'</textarea>';echo '</div>';

        $val_text_areas_of_study_69 = get_post_meta($post->ID, 'text_areas_of_study_69', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 69 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_69" value="'.esc_attr($val_text_areas_of_study_69).'">';echo '</div>';

        $val_text_areas_of_study_70 = get_post_meta($post->ID, 'text_areas_of_study_70', true) ?: 'GEG 2110 - Sustainable Cities';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 70 (Preview: GEG 2110 - Sustainable Cities...)</label>';
            echo '<input type="text" name="text_areas_of_study_70" value="'.esc_attr($val_text_areas_of_study_70).'">';echo '</div>';

        $val_text_areas_of_study_71 = get_post_meta($post->ID, 'text_areas_of_study_71', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 71 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_71" value="'.esc_attr($val_text_areas_of_study_71).'">';echo '</div>';

        $val_text_areas_of_study_72 = get_post_meta($post->ID, 'text_areas_of_study_72', true) ?: 'Year 2';
        echo '<div class="uottawa-field"><label>Areas of Study Text 72 (Preview: Year 2...)</label>';
            echo '<input type="text" name="text_areas_of_study_72" value="'.esc_attr($val_text_areas_of_study_72).'">';echo '</div>';

        $val_text_areas_of_study_73 = get_post_meta($post->ID, 'text_areas_of_study_73', true) ?: 'LCM 3101 - World Cultures in Contact';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 73 (Preview: LCM 3101 - World Cultures in Contact...)</label>';
            echo '<input type="text" name="text_areas_of_study_73" value="'.esc_attr($val_text_areas_of_study_73).'">';echo '</div>';

        $val_text_areas_of_study_74 = get_post_meta($post->ID, 'text_areas_of_study_74', true) ?: 'Explores how cultures interact, exchange ideas and influence one another across history.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 74 (Preview: Explores how cultures interact, exchange...)</label>';
            echo '<textarea name="text_areas_of_study_74">'.esc_textarea($val_text_areas_of_study_74).'</textarea>';echo '</div>';

        $val_text_areas_of_study_75 = get_post_meta($post->ID, 'text_areas_of_study_75', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 75 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_75" value="'.esc_attr($val_text_areas_of_study_75).'">';echo '</div>';

        $val_text_areas_of_study_76 = get_post_meta($post->ID, 'text_areas_of_study_76', true) ?: 'SRS 3173 - Bible and Culture';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 76 (Preview: SRS 3173 - Bible and Culture...)</label>';
            echo '<input type="text" name="text_areas_of_study_76" value="'.esc_attr($val_text_areas_of_study_76).'">';echo '</div>';

        $val_text_areas_of_study_77 = get_post_meta($post->ID, 'text_areas_of_study_77', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 77 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_77" value="'.esc_attr($val_text_areas_of_study_77).'">';echo '</div>';

        $val_text_areas_of_study_78 = get_post_meta($post->ID, 'text_areas_of_study_78', true) ?: 'AHL 3170 - Exploring Art and Architecture';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 78 (Preview: AHL 3170 - Exploring Art and Architectur...)</label>';
            echo '<input type="text" name="text_areas_of_study_78" value="'.esc_attr($val_text_areas_of_study_78).'">';echo '</div>';

        $val_text_areas_of_study_79 = get_post_meta($post->ID, 'text_areas_of_study_79', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 79 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_79" value="'.esc_attr($val_text_areas_of_study_79).'">';echo '</div>';

        $val_text_areas_of_study_80 = get_post_meta($post->ID, 'text_areas_of_study_80', true) ?: 'LCM 3105 - Identities, Ideas, and Ideologies Across World Cultures';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 80 (Preview: LCM 3105 - Identities, Ideas, and Ideolo...)</label>';
            echo '<textarea name="text_areas_of_study_80">'.esc_textarea($val_text_areas_of_study_80).'</textarea>';echo '</div>';

        $val_text_areas_of_study_81 = get_post_meta($post->ID, 'text_areas_of_study_81', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 81 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_81" value="'.esc_attr($val_text_areas_of_study_81).'">';echo '</div>';

        $val_text_areas_of_study_82 = get_post_meta($post->ID, 'text_areas_of_study_82', true) ?: 'AHL 4170 - Harnessing Interdisciplinary Thinking: Knowledge for Insight Application';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 82 (Preview: AHL 4170 - Harnessing Interdisciplinary ...)</label>';
            echo '<textarea name="text_areas_of_study_82">'.esc_textarea($val_text_areas_of_study_82).'</textarea>';echo '</div>';

        $val_text_areas_of_study_83 = get_post_meta($post->ID, 'text_areas_of_study_83', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 83 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_83" value="'.esc_attr($val_text_areas_of_study_83).'">';echo '</div>';

        $val_text_areas_of_study_84 = get_post_meta($post->ID, 'text_areas_of_study_84', true) ?: 'PHI 2122 - Ancient Wisdom';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 84 (Preview: PHI 2122 - Ancient Wisdom...)</label>';
            echo '<input type="text" name="text_areas_of_study_84" value="'.esc_attr($val_text_areas_of_study_84).'">';echo '</div>';

        $val_text_areas_of_study_85 = get_post_meta($post->ID, 'text_areas_of_study_85', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 85 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_85" value="'.esc_attr($val_text_areas_of_study_85).'">';echo '</div>';

        $val_text_areas_of_study_86 = get_post_meta($post->ID, 'text_areas_of_study_86', true) ?: 'LIN 1300 - What Is Language?';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 86 (Preview: LIN 1300 - What Is Language?...)</label>';
            echo '<input type="text" name="text_areas_of_study_86" value="'.esc_attr($val_text_areas_of_study_86).'">';echo '</div>';

        $val_text_areas_of_study_87 = get_post_meta($post->ID, 'text_areas_of_study_87', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 87 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_87" value="'.esc_attr($val_text_areas_of_study_87).'">';echo '</div>';

        $val_text_areas_of_study_88 = get_post_meta($post->ID, 'text_areas_of_study_88', true) ?: 'HIS 1101 - The Making of Canada';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 88 (Preview: HIS 1101 - The Making of Canada...)</label>';
            echo '<input type="text" name="text_areas_of_study_88" value="'.esc_attr($val_text_areas_of_study_88).'">';echo '</div>';

        $val_text_areas_of_study_89 = get_post_meta($post->ID, 'text_areas_of_study_89', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 89 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_89" value="'.esc_attr($val_text_areas_of_study_89).'">';echo '</div>';

        $val_text_areas_of_study_90 = get_post_meta($post->ID, 'text_areas_of_study_90', true) ?: 'ENV 1101 - Global Environmental Challenges';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 90 (Preview: ENV 1101 - Global Environmental Challeng...)</label>';
            echo '<input type="text" name="text_areas_of_study_90" value="'.esc_attr($val_text_areas_of_study_90).'">';echo '</div>';

        $val_text_areas_of_study_91 = get_post_meta($post->ID, 'text_areas_of_study_91', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 91 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_91" value="'.esc_attr($val_text_areas_of_study_91).'">';echo '</div>';

        $val_text_areas_of_study_92 = get_post_meta($post->ID, 'text_areas_of_study_92', true) ?: 'Year 3';
        echo '<div class="uottawa-field"><label>Areas of Study Text 92 (Preview: Year 3...)</label>';
            echo '<input type="text" name="text_areas_of_study_92" value="'.esc_attr($val_text_areas_of_study_92).'">';echo '</div>';

        $val_text_areas_of_study_93 = get_post_meta($post->ID, 'text_areas_of_study_93', true) ?: 'ENG 2107 - Introduction to Canadian Literature';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 93 (Preview: LCM 3101 - World Cultures in Contact...)</label>';
            echo '<input type="text" name="text_areas_of_study_93" value="'.esc_attr($val_text_areas_of_study_93).'">';echo '</div>';

        $val_text_areas_of_study_94 = get_post_meta($post->ID, 'text_areas_of_study_94', true) ?: 'An introduction to authors, works, and movements in Canadian Literature in their social, cultural, and historical contexts.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 94 (Preview: Explores how cultures interact, exchange...)</label>';
            echo '<textarea name="text_areas_of_study_94">'.esc_textarea($val_text_areas_of_study_94).'</textarea>';echo '</div>';

        $val_text_areas_of_study_95 = get_post_meta($post->ID, 'text_areas_of_study_95', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 95 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_95" value="'.esc_attr($val_text_areas_of_study_95).'">';echo '</div>';

        $val_text_areas_of_study_96 = get_post_meta($post->ID, 'text_areas_of_study_96', true) ?: 'SRS 2173 - World Religions';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 96 (Preview: SRS 3173 - Bible and Culture...)</label>';
            echo '<input type="text" name="text_areas_of_study_96" value="'.esc_attr($val_text_areas_of_study_96).'">';echo '</div>';

        $val_text_areas_of_study_97 = get_post_meta($post->ID, 'text_areas_of_study_97', true) ?: 'Learn more';
        echo '<div class="uottawa-field"><label>Areas of Study Text 97 (Preview: Learn more...)</label>';
            echo '<input type="text" name="text_areas_of_study_97" value="'.esc_attr($val_text_areas_of_study_97).'">';echo '</div>';

        $val_text_areas_of_study_98 = get_post_meta($post->ID, 'text_areas_of_study_98', true) ?: 'Download course map';
        echo '<div class="uottawa-field"><label>Areas of Study Text 98 (Preview: Download course map...)</label>';
            echo '<input type="text" name="text_areas_of_study_98" value="'.esc_attr($val_text_areas_of_study_98).'">';echo '</div>';

        $val_text_areas_of_study_99 = get_post_meta($post->ID, 'text_areas_of_study_99', true) ?: '*Course list subject to change. Consult the uOttawa academic calendar for the most up-to-date information.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 99 (Preview: *Course list subject to change. Consult ...)</label>';
            echo '<textarea name="text_areas_of_study_99">'.esc_textarea($val_text_areas_of_study_99).'</textarea>';echo '</div>';

        $val_text_areas_of_study_100 = get_post_meta($post->ID, 'text_areas_of_study_100', true) ?: 'Career &amp; learning outcomes';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 100 (Preview: Career &amp; learning outcomes...)</label>';
            echo '<input type="text" name="text_areas_of_study_100" value="'.esc_attr($val_text_areas_of_study_100).'">';echo '</div>';

        $val_text_areas_of_study_101 = get_post_meta($post->ID, 'text_areas_of_study_101', true) ?: 'You will graduate with practical, human-centred skills that map to real roles. Outcomes vary by experience and location, but the pathways below reflect where graduates of interdisciplinary arts programs typically land.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 101 (Preview: You will graduate with practical, human-...)</label>';
            echo '<textarea name="text_areas_of_study_101">'.esc_textarea($val_text_areas_of_study_101).'</textarea>';echo '</div>';

        $val_text_areas_of_study_102 = get_post_meta($post->ID, 'text_areas_of_study_102', true) ?: 'Program &amp; operations leadership';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 102 (Preview: Program &amp; operations leadership...)</label>';
            echo '<input type="text" name="text_areas_of_study_102" value="'.esc_attr($val_text_areas_of_study_102).'">';echo '</div>';

        $val_text_areas_of_study_103 = get_post_meta($post->ID, 'text_areas_of_study_103', true) ?: 'Typical roles:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 103 (Preview: Typical roles:...)</label>';
            echo '<input type="text" name="text_areas_of_study_103" value="'.esc_attr($val_text_areas_of_study_103).'">';echo '</div>';

        $val_text_areas_of_study_104 = get_post_meta($post->ID, 'text_areas_of_study_104', true) ?: 'Program manager, operations manager, business transformation coordinator';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 104 (Preview: Program manager, operations manager, bus...)</label>';
            echo '<textarea name="text_areas_of_study_104">'.esc_textarea($val_text_areas_of_study_104).'</textarea>';echo '</div>';

        $val_text_areas_of_study_105 = get_post_meta($post->ID, 'text_areas_of_study_105', true) ?: 'What you\'ll learn to do:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 105 (Preview: What you\'ll learn to do:...)</label>';
            echo '<input type="text" name="text_areas_of_study_105" value="'.esc_attr($val_text_areas_of_study_105).'">';echo '</div>';

        $val_text_areas_of_study_106 = get_post_meta($post->ID, 'text_areas_of_study_106', true) ?: 'Apply interdisciplinary thinking to complex organizational problems, coordinate cross-functional work and manage change.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 106 (Preview: Apply interdisciplinary thinking to comp...)</label>';
            echo '<textarea name="text_areas_of_study_106">'.esc_textarea($val_text_areas_of_study_106).'</textarea>';echo '</div>';

        $val_text_areas_of_study_107 = get_post_meta($post->ID, 'text_areas_of_study_107', true) ?: 'Relevant courses:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 107 (Preview: Relevant courses:...)</label>';
            echo '<input type="text" name="text_areas_of_study_107" value="'.esc_attr($val_text_areas_of_study_107).'">';echo '</div>';

        $val_text_areas_of_study_108 = get_post_meta($post->ID, 'text_areas_of_study_108', true) ?: 'AHL 2170 Interdisciplinary Studies: Expanding Boundaries of Knowledge';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 108 (Preview: AHL 2170 Interdisciplinary Studies: Expa...)</label>';
            echo '<textarea name="text_areas_of_study_108">'.esc_textarea($val_text_areas_of_study_108).'</textarea>';echo '</div>';

        $val_text_areas_of_study_109 = get_post_meta($post->ID, 'text_areas_of_study_109', true) ?: 'AHL 4170 Harnessing Interdisciplinary Thinking';
        echo '<div class="uottawa-field"><label>Areas of Study Text 109 (Preview: AHL 4170 Harnessing Interdisciplinary Th...)</label>';
            echo '<input type="text" name="text_areas_of_study_109" value="'.esc_attr($val_text_areas_of_study_109).'">';echo '</div>';

        $val_text_areas_of_study_110 = get_post_meta($post->ID, 'text_areas_of_study_110', true) ?: 'DCN 1101 Digital Literacy';
        echo '<div class="uottawa-field"><label>Areas of Study Text 110 (Preview: DCN 1101 Digital Literacy...)</label>';
            echo '<input type="text" name="text_areas_of_study_110" value="'.esc_attr($val_text_areas_of_study_110).'">';echo '</div>';

        $val_text_areas_of_study_111 = get_post_meta($post->ID, 'text_areas_of_study_111', true) ?: 'CMN 2130 Interpersonal Communication';
        echo '<div class="uottawa-field"><label>Areas of Study Text 111 (Preview: CMN 2130 Interpersonal Communication...)</label>';
            echo '<input type="text" name="text_areas_of_study_111" value="'.esc_attr($val_text_areas_of_study_111).'">';echo '</div>';

        $val_text_areas_of_study_112 = get_post_meta($post->ID, 'text_areas_of_study_112', true) ?: 'Communications &amp; community engagement';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 112 (Preview: Communications &amp; community engagemen...)</label>';
            echo '<input type="text" name="text_areas_of_study_112" value="'.esc_attr($val_text_areas_of_study_112).'">';echo '</div>';

        $val_text_areas_of_study_113 = get_post_meta($post->ID, 'text_areas_of_study_113', true) ?: 'Public service &amp; policy';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 113 (Preview: Public service &amp; policy...)</label>';
            echo '<input type="text" name="text_areas_of_study_113" value="'.esc_attr($val_text_areas_of_study_113).'">';echo '</div>';

        $val_text_areas_of_study_114 = get_post_meta($post->ID, 'text_areas_of_study_114', true) ?: 'Sustainability, environment, &amp; cities';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 114 (Preview: Sustainability, environment, &amp; citie...)</label>';
            echo '<input type="text" name="text_areas_of_study_114" value="'.esc_attr($val_text_areas_of_study_114).'">';echo '</div>';

        $val_text_areas_of_study_115 = get_post_meta($post->ID, 'text_areas_of_study_115', true) ?: 'Further studies &amp; professional pathways';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 115 (Preview: Further studies &amp; professional pathw...)</label>';
            echo '<input type="text" name="text_areas_of_study_115" value="'.esc_attr($val_text_areas_of_study_115).'">';echo '</div>';

        $val_text_areas_of_study_116 = get_post_meta($post->ID, 'text_areas_of_study_116', true) ?: 'Request more information';
        echo '<div class="uottawa-field"><label>Areas of Study Text 116 (Preview: Request more information...)</label>';
            echo '<input type="text" name="text_areas_of_study_116" value="'.esc_attr($val_text_areas_of_study_116).'">';echo '</div>';

        $val_text_areas_of_study_117 = get_post_meta($post->ID, 'text_areas_of_study_117', true) ?: 'Admission requirements';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 117 (Preview: Admission requirements...)</label>';
            echo '<input type="text" name="text_areas_of_study_117" value="'.esc_attr($val_text_areas_of_study_117).'">';echo '</div>';

        $val_text_areas_of_study_118 = get_post_meta($post->ID, 'text_areas_of_study_118', true) ?: 'Completed a 2-year or 3-year accredited Canadian college diploma';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 118 (Preview: Completed a 2-year or 3-year accredited ...)</label>';
            echo '<textarea name="text_areas_of_study_118">'.esc_textarea($val_text_areas_of_study_118).'</textarea>';echo '</div>';

        $val_text_areas_of_study_119 = get_post_meta($post->ID, 'text_areas_of_study_119', true) ?: 'Minimum admission average of 63%';
        echo '<div class="uottawa-field"><label>Areas of Study Text 119 (Preview: Minimum admission average of 63%...)</label>';
            echo '<input type="text" name="text_areas_of_study_119" value="'.esc_attr($val_text_areas_of_study_119).'">';echo '</div>';

        $val_text_areas_of_study_120 = get_post_meta($post->ID, 'text_areas_of_study_120', true) ?: 'English proficiency';
        echo '<div class="uottawa-field"><label>Areas of Study Text 120 (Preview: English proficiency...)</label>';
            echo '<input type="text" name="text_areas_of_study_120" value="'.esc_attr($val_text_areas_of_study_120).'">';echo '</div>';

        $val_text_areas_of_study_121 = get_post_meta($post->ID, 'text_areas_of_study_121', true) ?: '3+ years of work or professional experience';
        echo '<div class="uottawa-field"><label>Areas of Study Text 121 (Preview: 3+ years of work or professional experie...)</label>';
            echo '<input type="text" name="text_areas_of_study_121" value="'.esc_attr($val_text_areas_of_study_121).'">';echo '</div>';

        $val_text_areas_of_study_122 = get_post_meta($post->ID, 'text_areas_of_study_122', true) ?: 'Your previous credential and educational background will determine your exact program pathway (45 or 60 units). UOttawa confirms final admission and credit recognition.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 122 (Preview: Your previous credential and educational...)</label>';
            echo '<textarea name="text_areas_of_study_122">'.esc_textarea($val_text_areas_of_study_122).'</textarea>';echo '</div>';

        $val_img_areas_of_study_123 = get_post_meta($post->ID, 'img_areas_of_study_123', true) ?: '/wp-content/uploads/2026/08/62d370ec3bf8ccd7d20c0419ced8b558a214aee4.webp';
        echo '<div class="uottawa-field"><label>Areas of Study Image 123 (Preview: https://images.unsplash.com/photo-157349...)</label>';
            echo '<input type="text" name="img_areas_of_study_123" value="'.esc_attr($val_img_areas_of_study_123).'">';echo '</div>';

        $val_text_areas_of_study_124 = get_post_meta($post->ID, 'text_areas_of_study_124', true) ?: 'Application process';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 124 (Preview: Application process...)</label>';
            echo '<input type="text" name="text_areas_of_study_124" value="'.esc_attr($val_text_areas_of_study_124).'">';echo '</div>';

        $val_text_areas_of_study_125 = get_post_meta($post->ID, 'text_areas_of_study_125', true) ?: 'Speak to our admissions team who can guide you through the OUAC application process.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 125 (Preview: Speak to our admissions team who can gui...)</label>';
            echo '<textarea name="text_areas_of_study_125">'.esc_textarea($val_text_areas_of_study_125).'</textarea>';echo '</div>';


        $val_text_admissions_1 = get_post_meta($post->ID, 'text_admissions_1', true) ?: 'Your next step, with someone in your corner.';
        echo '<div class="uottawa-field"><label>Admissions: Next step heading</label>';
            echo '<input type="text" name="text_admissions_1" value="'.esc_attr($val_text_admissions_1).'">';echo '</div>';

        $val_text_admissions_2 = get_post_meta($post->ID, 'text_admissions_2', true) ?: 'Applying to a uOttawa Online program isn\'t something you have to figure out alone. An enrolment advisor will walk you through it: what you\'ll need, what your prior learning could count toward, and whether the timing works for the life you\'re already living.';
        echo '<div class="uottawa-field"><label>Admissions: Next step intro</label>';
            echo '<textarea name="text_admissions_2">'.esc_textarea($val_text_admissions_2).'</textarea>';echo '</div>';

        $val_text_admissions_3 = get_post_meta($post->ID, 'text_admissions_3', true) ?: '1. Connect with an enrolment advisor';
        echo '<div class="uottawa-field"><label>Admissions: Step 1 heading</label>';
            echo '<input type="text" name="text_admissions_3" value="'.esc_attr($val_text_admissions_3).'">';echo '</div>';

        $val_text_admissions_4 = get_post_meta($post->ID, 'text_admissions_4', true) ?: 'Start with a conversation. Your advisor will ask about your background, your goals, and your timeline, and help you figure out whether, and how, a uOttawa Online program fits.';
        echo '<div class="uottawa-field"><label>Admissions: Step 1 text</label>';
            echo '<textarea name="text_admissions_4">'.esc_textarea($val_text_admissions_4).'</textarea>';echo '</div>';

        $val_text_admissions_5 = get_post_meta($post->ID, 'text_admissions_5', true) ?: '2. Review your experience';
        echo '<div class="uottawa-field"><label>Admissions: Step 2 heading</label>';
            echo '<input type="text" name="text_admissions_5" value="'.esc_attr($val_text_admissions_5).'">';echo '</div>';

        $val_text_admissions_6 = get_post_meta($post->ID, 'text_admissions_6', true) ?: 'Your advisor will ask about your prior post-secondary credit or professional experience to see what may be recognized toward your program, so you\'re not starting from zero.';
        echo '<div class="uottawa-field"><label>Admissions: Step 2 text</label>';
            echo '<textarea name="text_admissions_6">'.esc_textarea($val_text_admissions_6).'</textarea>';echo '</div>';

        $val_text_admissions_7 = get_post_meta($post->ID, 'text_admissions_7', true) ?: '3. Submit your application';
        echo '<div class="uottawa-field"><label>Admissions: Step 3 heading</label>';
            echo '<input type="text" name="text_admissions_7" value="'.esc_attr($val_text_admissions_7).'">';echo '</div>';

        $val_text_admissions_8 = get_post_meta($post->ID, 'text_admissions_8', true) ?: 'With your advisor\'s guidance, you\'ll pull together what\'s needed and submit your application, no guessing at the process on your own.';
        echo '<div class="uottawa-field"><label>Admissions: Step 3 text</label>';
            echo '<textarea name="text_admissions_8">'.esc_textarea($val_text_admissions_8).'</textarea>';echo '</div>';

        $val_text_admissions_9 = get_post_meta($post->ID, 'text_admissions_9', true) ?: '4. Receive your decision';
        echo '<div class="uottawa-field"><label>Admissions: Step 4 heading</label>';
            echo '<input type="text" name="text_admissions_9" value="'.esc_attr($val_text_admissions_9).'">';echo '</div>';

        $val_text_admissions_10 = get_post_meta($post->ID, 'text_admissions_10', true) ?: 'Once you have an offer, our team can help you plan your first term, from enrolment through to your first login.';
        echo '<div class="uottawa-field"><label>Admissions: Step 4 text</label>';
            echo '<textarea name="text_admissions_10">'.esc_textarea($val_text_admissions_10).'</textarea>';echo '</div>';

        $val_text_admissions_11 = get_post_meta($post->ID, 'text_admissions_11', true) ?: 'Start your application';
        echo '<div class="uottawa-field"><label>Admissions: Steps button</label>';
            echo '<input type="text" name="text_admissions_11" value="'.esc_attr($val_text_admissions_11).'">';echo '</div>';

        $val_text_admissions_12 = get_post_meta($post->ID, 'text_admissions_12', true) ?: 'What your enrolment advisor actually does';
        echo '<div class="uottawa-field"><label>Admissions: Advisor heading</label>';
            echo '<input type="text" name="text_admissions_12" value="'.esc_attr($val_text_admissions_12).'">';echo '</div>';

        $val_text_admissions_13 = get_post_meta($post->ID, 'text_admissions_13', true) ?: 'Helps you along the way';
        echo '<div class="uottawa-field"><label>Admissions: Advisor 1 heading</label>';
            echo '<input type="text" name="text_admissions_13" value="'.esc_attr($val_text_admissions_13).'">';echo '</div>';

        $val_text_admissions_14 = get_post_meta($post->ID, 'text_admissions_14', true) ?: 'Get direct answers to your specific questions about the program, schedule, or fit. You\'ll have a consistent point of contact throughout your journey.';
        echo '<div class="uottawa-field"><label>Admissions: Advisor 1 text</label>';
            echo '<textarea name="text_admissions_14">'.esc_textarea($val_text_admissions_14).'</textarea>';echo '</div>';

        $val_text_admissions_15 = get_post_meta($post->ID, 'text_admissions_15', true) ?: 'Talks admissions';
        echo '<div class="uottawa-field"><label>Admissions: Advisor 2 heading</label>';
            echo '<input type="text" name="text_admissions_15" value="'.esc_attr($val_text_admissions_15).'">';echo '</div>';

        $val_text_admissions_16 = get_post_meta($post->ID, 'text_admissions_16', true) ?: 'Navigate the submission process with step-by-step help. Your advisor ensures nothing is missed and guides you from first login through enrolment.';
        echo '<div class="uottawa-field"><label>Admissions: Advisor 2 text</label>';
            echo '<textarea name="text_admissions_16">'.esc_textarea($val_text_admissions_16).'</textarea>';echo '</div>';

        $val_text_admissions_17 = get_post_meta($post->ID, 'text_admissions_17', true) ?: 'Assesses the details';
        echo '<div class="uottawa-field"><label>Admissions: Advisor 3 heading</label>';
            echo '<input type="text" name="text_admissions_17" value="'.esc_attr($val_text_admissions_17).'">';echo '</div>';

        $val_text_admissions_18 = get_post_meta($post->ID, 'text_admissions_18', true) ?: 'Discuss your background before you even apply. We\'ll review your prior post-secondary credits and professional experience to see what counts toward your degree.';
        echo '<div class="uottawa-field"><label>Admissions: Advisor 3 text</label>';
            echo '<textarea name="text_admissions_18">'.esc_textarea($val_text_admissions_18).'</textarea>';echo '</div>';

        $val_text_admissions_19 = get_post_meta($post->ID, 'text_admissions_19', true) ?: 'Start your application';
        echo '<div class="uottawa-field"><label>Admissions: Advisor button</label>';
            echo '<input type="text" name="text_admissions_19" value="'.esc_attr($val_text_admissions_19).'">';echo '</div>';
        $val_text_areas_of_study_126 = get_post_meta($post->ID, 'text_areas_of_study_126', true) ?: 'Tuition';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 126 (Preview: Tuition...)</label>';
            echo '<input type="text" name="text_areas_of_study_126" value="'.esc_attr($val_text_areas_of_study_126).'">';echo '</div>';

        $val_text_areas_of_study_127 = get_post_meta($post->ID, 'text_areas_of_study_127', true) ?: 'A university degree is a significant milestone, and financial planning is an important part of that journey. Tuition depends on your admission pathway (45 or 60 units).';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 127 (Preview: A university degree is a significant mil...)</label>';
            echo '<textarea name="text_areas_of_study_127">'.esc_textarea($val_text_areas_of_study_127).'</textarea>';echo '</div>';

        $val_text_areas_of_study_128 = get_post_meta($post->ID, 'text_areas_of_study_128', true) ?: 'Contact our team for more detailed tuition information, including payment options and financial aid opportunities.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 128 (Preview: Contact our team for more detailed tuiti...)</label>';
            echo '<textarea name="text_areas_of_study_128">'.esc_textarea($val_text_areas_of_study_128).'</textarea>';echo '</div>';

        $val_text_areas_of_study_129 = get_post_meta($post->ID, 'text_areas_of_study_129', true) ?: 'Request more information';
        echo '<div class="uottawa-field"><label>Areas of Study Text 129 (Preview: Request more information...)</label>';
            echo '<input type="text" name="text_areas_of_study_129" value="'.esc_attr($val_text_areas_of_study_129).'">';echo '</div>';

        $val_text_areas_of_study_130 = get_post_meta($post->ID, 'text_areas_of_study_130', true) ?: '*Tuition and fees are subject to change each academic year. Textbooks may be required for some courses and are an additional cost.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 130 (Preview: *Tuition and fees are subject to change ...)</label>';
            echo '<textarea name="text_areas_of_study_130">'.esc_textarea($val_text_areas_of_study_130).'</textarea>';echo '</div>';

        $val_img_areas_of_study_131 = get_post_meta($post->ID, 'img_areas_of_study_131', true) ?: '/wp-content/uploads/2026/08/7c98b18301ccaa1ff078e67d5351da8cdd8d49e9.webp';
        echo '<div class="uottawa-field"><label>Areas of Study Image 131 (Preview: https://images.unsplash.com/photo-158089...)</label>';
            echo '<input type="text" name="img_areas_of_study_131" value="'.esc_attr($val_img_areas_of_study_131).'">';echo '</div>';

        $val_text_areas_of_study_132 = get_post_meta($post->ID, 'text_areas_of_study_132', true) ?: 'Frequently asked questions';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 132 (Preview: Frequently asked questions...)</label>';
            echo '<input type="text" name="text_areas_of_study_132" value="'.esc_attr($val_text_areas_of_study_132).'">';echo '</div>';

        $val_text_areas_of_study_133 = get_post_meta($post->ID, 'text_areas_of_study_133', true) ?: 'Who is the Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) for?';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 133 (Preview: Who is the Bachelor of Arts, Interdiscip...)</label>';
            echo '<textarea name="text_areas_of_study_133">'.esc_textarea($val_text_areas_of_study_133).'</textarea>';echo '</div>';

        $val_text_areas_of_study_134 = get_post_meta($post->ID, 'text_areas_of_study_134', true) ?: 'Our program is designed for working adults across Canada who hold a college diploma and want to build on that foundation with a uOttawa degree. It may be a strong fit for professionals in healthcare, education, technology, the trades, the public sector, the not-for-profit sector and other fields where a bachelor\'s degree can support career growth.';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 134 (Preview: Our program is designed for working adul...)</label>';
            echo '<textarea name="text_areas_of_study_134">'.esc_textarea($val_text_areas_of_study_134).'</textarea>';echo '</div>';

        $val_text_areas_of_study_135 = get_post_meta($post->ID, 'text_areas_of_study_135', true) ?: 'Is the program fully online?';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 135 (Preview: Is the program fully online?...)</label>';
            echo '<input type="text" name="text_areas_of_study_135" value="'.esc_attr($val_text_areas_of_study_135).'">';echo '</div>';

        $val_text_areas_of_study_136 = get_post_meta($post->ID, 'text_areas_of_study_136', true) ?: 'What is the language of instruction for this program?';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 136 (Preview: What is the language of instruction for ...)</label>';
            echo '<input type="text" name="text_areas_of_study_136" value="'.esc_attr($val_text_areas_of_study_136).'">';echo '</div>';

        $val_text_areas_of_study_137 = get_post_meta($post->ID, 'text_areas_of_study_137', true) ?: 'How does transfer credit work?';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 137 (Preview: How does transfer credit work?...)</label>';
            echo '<input type="text" name="text_areas_of_study_137" value="'.esc_attr($val_text_areas_of_study_137).'">';echo '</div>';

        $val_text_areas_of_study_138 = get_post_meta($post->ID, 'text_areas_of_study_138', true) ?: 'Do I need to stop working to complete the program?';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 138 (Preview: Do I need to stop working to complete th...)</label>';
            echo '<input type="text" name="text_areas_of_study_138" value="'.esc_attr($val_text_areas_of_study_138).'">';echo '</div>';

        $val_text_areas_of_study_139 = get_post_meta($post->ID, 'text_areas_of_study_139', true) ?: 'What skills will I build?';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 139 (Preview: What skills will I build?...)</label>';
            echo '<input type="text" name="text_areas_of_study_139" value="'.esc_attr($val_text_areas_of_study_139).'">';echo '</div>';

        $val_text_areas_of_study_140 = get_post_meta($post->ID, 'text_areas_of_study_140', true) ?: 'What makes this different from a narrow career credential?';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 140 (Preview: What makes this different from a narrow ...)</label>';
            echo '<input type="text" name="text_areas_of_study_140" value="'.esc_attr($val_text_areas_of_study_140).'">';echo '</div>';

        $val_text_areas_of_study_141 = get_post_meta($post->ID, 'text_areas_of_study_141', true) ?: 'Can this degree support graduate study or professional pathways?';
        echo '<div class="uottawa-field"><label>Areas of Study Paragraph 141 (Preview: Can this degree support graduate study o...)</label>';
            echo '<textarea name="text_areas_of_study_141">'.esc_textarea($val_text_areas_of_study_141).'</textarea>';echo '</div>';

        $val_text_areas_of_study_142 = get_post_meta($post->ID, 'text_areas_of_study_142', true) ?: 'uOttawa: Supporting your success';
        echo '<div class="uottawa-field"><label>Areas of Study Heading 142 (Preview: uOttawa: Supporting your success...)</label>';
            echo '<input type="text" name="text_areas_of_study_142" value="'.esc_attr($val_text_areas_of_study_142).'">';echo '</div>';

        $val_text_areas_of_study_143 = get_post_meta($post->ID, 'text_areas_of_study_143', true) ?: '12,000';
        echo '<div class="uottawa-field"><label>Areas of Study Text 143 (Preview: 6,200...)</label>';
            echo '<input type="text" name="text_areas_of_study_143" value="'.esc_attr($val_text_areas_of_study_143).'">';echo '</div>';

        $val_text_areas_of_study_144 = get_post_meta($post->ID, 'text_areas_of_study_144', true) ?: 'professors, researchers';
        echo '<div class="uottawa-field"><label>Areas of Study Text 144 (Preview: professors, researchers...)</label>';
            echo '<input type="text" name="text_areas_of_study_144" value="'.esc_attr($val_text_areas_of_study_144).'">';echo '</div>';

        $val_text_areas_of_study_145 = get_post_meta($post->ID, 'text_areas_of_study_145', true) ?: 'and support staff';
        echo '<div class="uottawa-field"><label>Areas of Study Text 145 (Preview: and support staff...)</label>';
            echo '<input type="text" name="text_areas_of_study_145" value="'.esc_attr($val_text_areas_of_study_145).'">';echo '</div>';

        $val_text_areas_of_study_146 = get_post_meta($post->ID, 'text_areas_of_study_146', true) ?: '300,000+';
        echo '<div class="uottawa-field"><label>Areas of Study Text 146 (Preview: 280,000+...)</label>';
            echo '<input type="text" name="text_areas_of_study_146" value="'.esc_attr($val_text_areas_of_study_146).'">';echo '</div>';

        $val_text_areas_of_study_147 = get_post_meta($post->ID, 'text_areas_of_study_147', true) ?: 'alumni worldwide';
        echo '<div class="uottawa-field"><label>Areas of Study Text 147 (Preview: alumni worldwide...)</label>';
            echo '<input type="text" name="text_areas_of_study_147" value="'.esc_attr($val_text_areas_of_study_147).'">';echo '</div>';

        $val_text_areas_of_study_148 = get_post_meta($post->ID, 'text_areas_of_study_148', true) ?: '90%';
        echo '<div class="uottawa-field"><label>Areas of Study Text 148 (Preview: 90%...)</label>';
            echo '<input type="text" name="text_areas_of_study_148" value="'.esc_attr($val_text_areas_of_study_148).'">';echo '</div>';

        $val_text_areas_of_study_149 = get_post_meta($post->ID, 'text_areas_of_study_149', true) ?: 'employment rate six';
        echo '<div class="uottawa-field"><label>Areas of Study Text 149 (Preview: employment rate six...)</label>';
            echo '<input type="text" name="text_areas_of_study_149" value="'.esc_attr($val_text_areas_of_study_149).'">';echo '</div>';

        $val_text_areas_of_study_150 = get_post_meta($post->ID, 'text_areas_of_study_150', true) ?: 'months after graduation';
        echo '<div class="uottawa-field"><label>Areas of Study Text 150 (Preview: months after graduation...)</label>';
            echo '<input type="text" name="text_areas_of_study_150" value="'.esc_attr($val_text_areas_of_study_150).'">';echo '</div>';

        $val_text_areas_of_study_151 = get_post_meta($post->ID, 'text_areas_of_study_151', true) ?: 'Builds foundational digital skills: evaluating information and technology, understanding digital media, and using core productivity tools.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 151 (Preview: Builds foundational digital skills: eval...)</label>';
            echo '<textarea name="text_areas_of_study_151">'.esc_textarea($val_text_areas_of_study_151).'</textarea>';echo '</div>';

        $val_text_areas_of_study_152 = get_post_meta($post->ID, 'text_areas_of_study_152', true) ?: 'An introduction to Indigenous worldviews, histories and contemporary issues across Turtle Island.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 152 (Preview: An introduction to Indigenous worldviews...)</label>';
            echo '<textarea name="text_areas_of_study_152">'.esc_textarea($val_text_areas_of_study_152).'</textarea>';echo '</div>';

        $val_text_areas_of_study_153 = get_post_meta($post->ID, 'text_areas_of_study_153', true) ?: 'A survey of major turning points and cross-cultural connections that have shaped the modern world.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 153 (Preview: A survey of major turning points and cro...)</label>';
            echo '<textarea name="text_areas_of_study_153">'.esc_textarea($val_text_areas_of_study_153).'</textarea>';echo '</div>';

        $val_text_areas_of_study_154 = get_post_meta($post->ID, 'text_areas_of_study_154', true) ?: 'Examines the intersection of Indigenous communities with technology, media representation and legal frameworks.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 154 (Preview: Examines the intersection of Indigenous ...)</label>';
            echo '<textarea name="text_areas_of_study_154">'.esc_textarea($val_text_areas_of_study_154).'</textarea>';echo '</div>';

        $val_text_areas_of_study_155 = get_post_meta($post->ID, 'text_areas_of_study_155', true) ?: 'Explores the moral status of animals and the ethical questions raised by our relationships with them.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 155 (Preview: Explores the moral status of animals and...)</label>';
            echo '<textarea name="text_areas_of_study_155">'.esc_textarea($val_text_areas_of_study_155).'</textarea>';echo '</div>';

        $val_text_areas_of_study_156 = get_post_meta($post->ID, 'text_areas_of_study_156', true) ?: 'Introduces the interdisciplinary methods and thinking that connect ideas across the humanities.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 156 (Preview: Introduces the interdisciplinary methods...)</label>';
            echo '<textarea name="text_areas_of_study_156">'.esc_textarea($val_text_areas_of_study_156).'</textarea>';echo '</div>';

        $val_text_areas_of_study_157 = get_post_meta($post->ID, 'text_areas_of_study_157', true) ?: 'Explores how myth, ritual and belief continue to shape human culture and meaning-making.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 157 (Preview: Explores how myth, ritual and belief con...)</label>';
            echo '<textarea name="text_areas_of_study_157">'.esc_textarea($val_text_areas_of_study_157).'</textarea>';echo '</div>';

        $val_text_areas_of_study_158 = get_post_meta($post->ID, 'text_areas_of_study_158', true) ?: 'Examines the environmental, social and planning challenges of building sustainable urban environments.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 158 (Preview: Examines the environmental, social and p...)</label>';
            echo '<textarea name="text_areas_of_study_158">'.esc_textarea($val_text_areas_of_study_158).'</textarea>';echo '</div>';

        $val_text_areas_of_study_159 = get_post_meta($post->ID, 'text_areas_of_study_159', true) ?: 'Examines the Bible\'s influence on literature, art and culture across centuries.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 159 (Preview: Examines the Bibles influence on litera...)</label>';
            echo '<textarea name="text_areas_of_study_159">'.esc_textarea($val_text_areas_of_study_159).'</textarea>';echo '</div>';

        $val_text_areas_of_study_160 = get_post_meta($post->ID, 'text_areas_of_study_160', true) ?: 'Surveys architectural traditions and their cultural, historical and aesthetic significance.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 160 (Preview: Surveys architectural traditions and the...)</label>';
            echo '<textarea name="text_areas_of_study_160">'.esc_textarea($val_text_areas_of_study_160).'</textarea>';echo '</div>';

        $val_text_areas_of_study_161 = get_post_meta($post->ID, 'text_areas_of_study_161', true) ?: 'Examines how identity and ideology are constructed and contested across world cultures.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 161 (Preview: Examines how identity and ideology are c...)</label>';
            echo '<textarea name="text_areas_of_study_161">'.esc_textarea($val_text_areas_of_study_161).'</textarea>';echo '</div>';

        $val_text_areas_of_study_162 = get_post_meta($post->ID, 'text_areas_of_study_162', true) ?: 'A capstone-style course applying interdisciplinary methods to real-world problems and insight generation.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 162 (Preview: A capstone-style course applying interdi...)</label>';
            echo '<textarea name="text_areas_of_study_162">'.esc_textarea($val_text_areas_of_study_162).'</textarea>';echo '</div>';

        $val_text_areas_of_study_163 = get_post_meta($post->ID, 'text_areas_of_study_163', true) ?: 'Explores philosophical traditions and enduring ideas from the ancient world.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 163 (Preview: Explores philosophical traditions and en...)</label>';
            echo '<textarea name="text_areas_of_study_163">'.esc_textarea($val_text_areas_of_study_163).'</textarea>';echo '</div>';

        $val_text_areas_of_study_164 = get_post_meta($post->ID, 'text_areas_of_study_164', true) ?: 'Builds foundational digital skills: evaluating information and technology, understanding digital media, and using core productivity tools.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 164 (Preview: Builds foundational digital skills: eval...)</label>';
            echo '<textarea name="text_areas_of_study_164">'.esc_textarea($val_text_areas_of_study_164).'</textarea>';echo '</div>';

        $val_text_areas_of_study_165 = get_post_meta($post->ID, 'text_areas_of_study_165', true) ?: 'An introduction to Indigenous worldviews, histories and contemporary issues across Turtle Island.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 165 (Preview: An introduction to Indigenous worldviews...)</label>';
            echo '<textarea name="text_areas_of_study_165">'.esc_textarea($val_text_areas_of_study_165).'</textarea>';echo '</div>';

        $val_text_areas_of_study_166 = get_post_meta($post->ID, 'text_areas_of_study_166', true) ?: 'A survey of major turning points and cross-cultural connections that have shaped the modern world.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 166 (Preview: A survey of major turning points and cro...)</label>';
            echo '<textarea name="text_areas_of_study_166">'.esc_textarea($val_text_areas_of_study_166).'</textarea>';echo '</div>';

        $val_text_areas_of_study_167 = get_post_meta($post->ID, 'text_areas_of_study_167', true) ?: 'Examines the intersection of Indigenous communities with technology, media representation and legal frameworks.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 167 (Preview: Examines the intersection of Indigenous ...)</label>';
            echo '<textarea name="text_areas_of_study_167">'.esc_textarea($val_text_areas_of_study_167).'</textarea>';echo '</div>';

        $val_text_areas_of_study_168 = get_post_meta($post->ID, 'text_areas_of_study_168', true) ?: 'Explores the moral status of animals and the ethical questions raised by our relationships with them.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 168 (Preview: Explores the moral status of animals and...)</label>';
            echo '<textarea name="text_areas_of_study_168">'.esc_textarea($val_text_areas_of_study_168).'</textarea>';echo '</div>';

        $val_text_areas_of_study_169 = get_post_meta($post->ID, 'text_areas_of_study_169', true) ?: 'Introduces the interdisciplinary methods and thinking that connect ideas across the humanities.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 169 (Preview: Introduces the interdisciplinary methods...)</label>';
            echo '<textarea name="text_areas_of_study_169">'.esc_textarea($val_text_areas_of_study_169).'</textarea>';echo '</div>';

        $val_text_areas_of_study_170 = get_post_meta($post->ID, 'text_areas_of_study_170', true) ?: 'Explores how myth, ritual and belief continue to shape human culture and meaning-making.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 170 (Preview: Explores how myth, ritual and belief con...)</label>';
            echo '<textarea name="text_areas_of_study_170">'.esc_textarea($val_text_areas_of_study_170).'</textarea>';echo '</div>';

        $val_text_areas_of_study_171 = get_post_meta($post->ID, 'text_areas_of_study_171', true) ?: 'Examines the environmental, social and planning challenges of building sustainable urban environments.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 171 (Preview: Examines the environmental, social and p...)</label>';
            echo '<textarea name="text_areas_of_study_171">'.esc_textarea($val_text_areas_of_study_171).'</textarea>';echo '</div>';

        $val_text_areas_of_study_172 = get_post_meta($post->ID, 'text_areas_of_study_172', true) ?: 'Examines the Bible\'s influence on literature, art and culture across centuries.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 172 (Preview: Examines the Bibles influence on litera...)</label>';
            echo '<textarea name="text_areas_of_study_172">'.esc_textarea($val_text_areas_of_study_172).'</textarea>';echo '</div>';

        $val_text_areas_of_study_173 = get_post_meta($post->ID, 'text_areas_of_study_173', true) ?: 'Surveys architectural traditions and their cultural, historical and aesthetic significance.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 173 (Preview: Surveys architectural traditions and the...)</label>';
            echo '<textarea name="text_areas_of_study_173">'.esc_textarea($val_text_areas_of_study_173).'</textarea>';echo '</div>';

        $val_text_areas_of_study_174 = get_post_meta($post->ID, 'text_areas_of_study_174', true) ?: 'Examines how identity and ideology are constructed and contested across world cultures.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 174 (Preview: Examines how identity and ideology are c...)</label>';
            echo '<textarea name="text_areas_of_study_174">'.esc_textarea($val_text_areas_of_study_174).'</textarea>';echo '</div>';

        $val_text_areas_of_study_175 = get_post_meta($post->ID, 'text_areas_of_study_175', true) ?: 'A capstone-style course applying interdisciplinary methods to real-world problems and insight generation.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 175 (Preview: A capstone-style course applying interdi...)</label>';
            echo '<textarea name="text_areas_of_study_175">'.esc_textarea($val_text_areas_of_study_175).'</textarea>';echo '</div>';

        $val_text_areas_of_study_176 = get_post_meta($post->ID, 'text_areas_of_study_176', true) ?: 'Explores philosophical traditions and enduring ideas from the ancient world.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 176 (Preview: Explores philosophical traditions and en...)</label>';
            echo '<textarea name="text_areas_of_study_176">'.esc_textarea($val_text_areas_of_study_176).'</textarea>';echo '</div>';

        $val_text_areas_of_study_177 = get_post_meta($post->ID, 'text_areas_of_study_177', true) ?: 'An introduction to the structure, diversity and social role of human language.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 177 (Preview: An introduction to the structure, divers...)</label>';
            echo '<textarea name="text_areas_of_study_177">'.esc_textarea($val_text_areas_of_study_177).'</textarea>';echo '</div>';

        $val_text_areas_of_study_178 = get_post_meta($post->ID, 'text_areas_of_study_178', true) ?: 'Traces the historical events and forces that shaped modern Canada.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 178 (Preview: Traces the historical events and forces ...)</label>';
            echo '<textarea name="text_areas_of_study_178">'.esc_textarea($val_text_areas_of_study_178).'</textarea>';echo '</div>';

        $val_text_areas_of_study_179 = get_post_meta($post->ID, 'text_areas_of_study_179', true) ?: 'Introduces the major environmental issues facing the world today and approaches to addressing them.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 179 (Preview: Introduces the major environmental issue...)</label>';
            echo '<textarea name="text_areas_of_study_179">'.esc_textarea($val_text_areas_of_study_179).'</textarea>';echo '</div>';

        $val_text_areas_of_study_180 = get_post_meta($post->ID, 'text_areas_of_study_180', true) ?: 'An exploration of the distinct beliefs, practices, and histories of the world\'s major religious traditions.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 180 (Preview: Examines the Bibles influence on litera...)</label>';
            echo '<textarea name="text_areas_of_study_180">'.esc_textarea($val_text_areas_of_study_180).'</textarea>';echo '</div>';

        $val_text_areas_of_study_181 = get_post_meta($post->ID, 'text_areas_of_study_181', true) ?: 'Typical roles:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 181 (Preview: Typical roles:)</label>';
            echo '<input type="text" name="text_areas_of_study_181" value="'.esc_attr($val_text_areas_of_study_181).'">';echo '</div>';

        $val_text_areas_of_study_182 = get_post_meta($post->ID, 'text_areas_of_study_182', true) ?: 'Communications manager, community engagement lead';
        echo '<div class="uottawa-field"><label>Areas of Study Text 182 (Preview: Communications manager, community engage...)</label>';
            echo '<textarea name="text_areas_of_study_182">'.esc_textarea($val_text_areas_of_study_182).'</textarea>';echo '</div>';

        $val_text_areas_of_study_183 = get_post_meta($post->ID, 'text_areas_of_study_183', true) ?: 'What you\'ll learn to do:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 183 (Preview: What youll learn to do:)</label>';
            echo '<input type="text" name="text_areas_of_study_183" value="'.esc_attr($val_text_areas_of_study_183).'">';echo '</div>';

        $val_text_areas_of_study_184 = get_post_meta($post->ID, 'text_areas_of_study_184', true) ?: 'Communicate clearly across audiences, interpret cultural context and build engagement strategies grounded in critical analysis.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 184 (Preview: Communicate clearly across audiences, in...)</label>';
            echo '<textarea name="text_areas_of_study_184">'.esc_textarea($val_text_areas_of_study_184).'</textarea>';echo '</div>';

        $val_text_areas_of_study_185 = get_post_meta($post->ID, 'text_areas_of_study_185', true) ?: 'Relevant courses:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 185 (Preview: Relevant courses:)</label>';
            echo '<input type="text" name="text_areas_of_study_185" value="'.esc_attr($val_text_areas_of_study_185).'">';echo '</div>';

        $val_text_areas_of_study_186 = get_post_meta($post->ID, 'text_areas_of_study_186', true) ?: 'CMN 2130 Interpersonal Communication';
        echo '<div class="uottawa-field"><label>Areas of Study Text 186 (Preview: CMN 2130 Interpersonal Communication)</label>';
            echo '<input type="text" name="text_areas_of_study_186" value="'.esc_attr($val_text_areas_of_study_186).'">';echo '</div>';

        $val_text_areas_of_study_187 = get_post_meta($post->ID, 'text_areas_of_study_187', true) ?: 'LCM 3101 World Cultures in Contact';
        echo '<div class="uottawa-field"><label>Areas of Study Text 187 (Preview: LCM 3101 World Cultures in Contact)</label>';
            echo '<input type="text" name="text_areas_of_study_187" value="'.esc_attr($val_text_areas_of_study_187).'">';echo '</div>';

        $val_text_areas_of_study_188 = get_post_meta($post->ID, 'text_areas_of_study_188', true) ?: 'LCM 3105 Identities, Ideas, and Ideologies Across World Cultures';
        echo '<div class="uottawa-field"><label>Areas of Study Text 188 (Preview: LCM 3105 Identities, Ideas, and Ideologi...)</label>';
            echo '<input type="text" name="text_areas_of_study_188" value="'.esc_attr($val_text_areas_of_study_188).'">';echo '</div>';

        $val_text_areas_of_study_189 = get_post_meta($post->ID, 'text_areas_of_study_189', true) ?: 'AHL 2171 The Persistence of Magic';
        echo '<div class="uottawa-field"><label>Areas of Study Text 189 (Preview: AHL 2171 The Persistence of Magic)</label>';
            echo '<input type="text" name="text_areas_of_study_189" value="'.esc_attr($val_text_areas_of_study_189).'">';echo '</div>';

        $val_text_areas_of_study_190 = get_post_meta($post->ID, 'text_areas_of_study_190', true) ?: 'Typical roles:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 190 (Preview: Typical roles:)</label>';
            echo '<input type="text" name="text_areas_of_study_190" value="'.esc_attr($val_text_areas_of_study_190).'">';echo '</div>';

        $val_text_areas_of_study_191 = get_post_meta($post->ID, 'text_areas_of_study_191', true) ?: 'Policy coordinator';
        echo '<div class="uottawa-field"><label>Areas of Study Text 191 (Preview: Policy coordinator)</label>';
            echo '<textarea name="text_areas_of_study_191">'.esc_textarea($val_text_areas_of_study_191).'</textarea>';echo '</div>';

        $val_text_areas_of_study_192 = get_post_meta($post->ID, 'text_areas_of_study_192', true) ?: 'What you\'ll learn to do:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 192 (Preview: What youll learn to do:)</label>';
            echo '<input type="text" name="text_areas_of_study_192" value="'.esc_attr($val_text_areas_of_study_192).'">';echo '</div>';

        $val_text_areas_of_study_193 = get_post_meta($post->ID, 'text_areas_of_study_193', true) ?: 'Analyze historical and global context, apply ethical reasoning and connect policy questions to lived experience.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 193 (Preview: Analyze historical and global context, a...)</label>';
            echo '<textarea name="text_areas_of_study_193">'.esc_textarea($val_text_areas_of_study_193).'</textarea>';echo '</div>';

        $val_text_areas_of_study_194 = get_post_meta($post->ID, 'text_areas_of_study_194', true) ?: 'Relevant courses:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 194 (Preview: Relevant courses:)</label>';
            echo '<input type="text" name="text_areas_of_study_194" value="'.esc_attr($val_text_areas_of_study_194).'">';echo '</div>';

        $val_text_areas_of_study_195 = get_post_meta($post->ID, 'text_areas_of_study_195', true) ?: 'HIS 1110 Introduction to Global History';
        echo '<div class="uottawa-field"><label>Areas of Study Text 195 (Preview: HIS 1110 Introduction to Global History)</label>';
            echo '<input type="text" name="text_areas_of_study_195" value="'.esc_attr($val_text_areas_of_study_195).'">';echo '</div>';

        $val_text_areas_of_study_196 = get_post_meta($post->ID, 'text_areas_of_study_196', true) ?: 'PHI 2100 Animal Ethics';
        echo '<div class="uottawa-field"><label>Areas of Study Text 196 (Preview: PHI 2100 Animal Ethics)</label>';
            echo '<input type="text" name="text_areas_of_study_196" value="'.esc_attr($val_text_areas_of_study_196).'">';echo '</div>';

        $val_text_areas_of_study_197 = get_post_meta($post->ID, 'text_areas_of_study_197', true) ?: 'EAS 2172 Indigenous Peoples, Technology, Media, and Law';
        echo '<div class="uottawa-field"><label>Areas of Study Text 197 (Preview: EAS 2172 Indigenous Peoples, Technology,...)</label>';
            echo '<input type="text" name="text_areas_of_study_197" value="'.esc_attr($val_text_areas_of_study_197).'">';echo '</div>';

        $val_text_areas_of_study_198 = get_post_meta($post->ID, 'text_areas_of_study_198', true) ?: 'GEG 2110 Sustainable Cities';
        echo '<div class="uottawa-field"><label>Areas of Study Text 198 (Preview: GEG 2110 Sustainable Cities)</label>';
            echo '<input type="text" name="text_areas_of_study_198" value="'.esc_attr($val_text_areas_of_study_198).'">';echo '</div>';

        $val_text_areas_of_study_199 = get_post_meta($post->ID, 'text_areas_of_study_199', true) ?: 'Typical roles:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 199 (Preview: Typical roles:)</label>';
            echo '<input type="text" name="text_areas_of_study_199" value="'.esc_attr($val_text_areas_of_study_199).'">';echo '</div>';

        $val_text_areas_of_study_200 = get_post_meta($post->ID, 'text_areas_of_study_200', true) ?: 'Sustainability coordinator, environmental program coordinator, community planning assistant';
        echo '<div class="uottawa-field"><label>Areas of Study Text 200 (Preview: Sustainability coordinator, environmenta...)</label>';
            echo '<textarea name="text_areas_of_study_200">'.esc_textarea($val_text_areas_of_study_200).'</textarea>';echo '</div>';

        $val_text_areas_of_study_201 = get_post_meta($post->ID, 'text_areas_of_study_201', true) ?: 'What you\'ll learn to do:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 201 (Preview: What youll learn to do:)</label>';
            echo '<input type="text" name="text_areas_of_study_201" value="'.esc_attr($val_text_areas_of_study_201).'">';echo '</div>';

        $val_text_areas_of_study_202 = get_post_meta($post->ID, 'text_areas_of_study_202', true) ?: 'Evaluate environmental and urban challenges and apply sustainability frameworks to real-world planning questions.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 202 (Preview: Evaluate environmental and urban challen...)</label>';
            echo '<textarea name="text_areas_of_study_202">'.esc_textarea($val_text_areas_of_study_202).'</textarea>';echo '</div>';

        $val_text_areas_of_study_203 = get_post_meta($post->ID, 'text_areas_of_study_203', true) ?: 'Relevant courses:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 203 (Preview: Relevant courses:)</label>';
            echo '<input type="text" name="text_areas_of_study_203" value="'.esc_attr($val_text_areas_of_study_203).'">';echo '</div>';

        $val_text_areas_of_study_204 = get_post_meta($post->ID, 'text_areas_of_study_204', true) ?: 'GEG 2110 Sustainable Cities';
        echo '<div class="uottawa-field"><label>Areas of Study Text 204 (Preview: GEG 2110 Sustainable Cities)</label>';
            echo '<input type="text" name="text_areas_of_study_204" value="'.esc_attr($val_text_areas_of_study_204).'">';echo '</div>';

        $val_text_areas_of_study_205 = get_post_meta($post->ID, 'text_areas_of_study_205', true) ?: 'ENV 1101 Global Environmental Challenges (60-unit pathway)';
        echo '<div class="uottawa-field"><label>Areas of Study Text 205 (Preview: ENV 1101 Global Environmental Challenges...)</label>';
            echo '<input type="text" name="text_areas_of_study_205" value="'.esc_attr($val_text_areas_of_study_205).'">';echo '</div>';

        $val_text_areas_of_study_206 = get_post_meta($post->ID, 'text_areas_of_study_206', true) ?: 'Typical roles:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 206 (Preview: Typical roles:)</label>';
            echo '<input type="text" name="text_areas_of_study_206" value="'.esc_attr($val_text_areas_of_study_206).'">';echo '</div>';

        $val_text_areas_of_study_207 = get_post_meta($post->ID, 'text_areas_of_study_207', true) ?: 'Graduate study, professional certification pathways';
        echo '<div class="uottawa-field"><label>Areas of Study Text 207 (Preview: Graduate study, professional certificati...)</label>';
            echo '<textarea name="text_areas_of_study_207">'.esc_textarea($val_text_areas_of_study_207).'</textarea>';echo '</div>';

        $val_text_areas_of_study_208 = get_post_meta($post->ID, 'text_areas_of_study_208', true) ?: 'What you\'ll learn to do:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 208 (Preview: What youll learn to do:)</label>';
            echo '<input type="text" name="text_areas_of_study_208" value="'.esc_attr($val_text_areas_of_study_208).'">';echo '</div>';

        $val_text_areas_of_study_209 = get_post_meta($post->ID, 'text_areas_of_study_209', true) ?: 'Build the interdisciplinary foundation and human-centred skills that may support eligibility for future graduate study or professional pathways, depending on the specific program and admission requirements.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 209 (Preview: Build the interdisciplinary foundation a...)</label>';
            echo '<textarea name="text_areas_of_study_209">'.esc_textarea($val_text_areas_of_study_209).'</textarea>';echo '</div>';

        $val_text_areas_of_study_210 = get_post_meta($post->ID, 'text_areas_of_study_210', true) ?: 'Relevant courses:';
        echo '<div class="uottawa-field"><label>Areas of Study Text 210 (Preview: Relevant courses:)</label>';
            echo '<input type="text" name="text_areas_of_study_210" value="'.esc_attr($val_text_areas_of_study_210).'">';echo '</div>';

        $val_text_areas_of_study_211 = get_post_meta($post->ID, 'text_areas_of_study_211', true) ?: 'AHL 4170 Harnessing Interdisciplinary Thinking (capstone-style)';
        echo '<div class="uottawa-field"><label>Areas of Study Text 211 (Preview: AHL 4170 Harnessing Interdisciplinary Th...)</label>';
            echo '<input type="text" name="text_areas_of_study_211" value="'.esc_attr($val_text_areas_of_study_211).'">';echo '</div>';

        $val_text_areas_of_study_212 = get_post_meta($post->ID, 'text_areas_of_study_212', true) ?: 'PHI 2122 Ancient Wisdom';
        echo '<div class="uottawa-field"><label>Areas of Study Text 212 (Preview: CLA 2122 Ancient Wisdom)</label>';
            echo '<input type="text" name="text_areas_of_study_212" value="'.esc_attr($val_text_areas_of_study_212).'">';echo '</div>';

        $val_text_areas_of_study_213 = get_post_meta($post->ID, 'text_areas_of_study_213', true) ?: 'Yes. Our Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) is delivered fully online, making it a flexible option for working adults who need to balance school with work, family and other responsibilities.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 213 (Preview: Yes. Our Bachelor of Arts, Interdiscipli...)</label>';
            echo '<textarea name="text_areas_of_study_213">'.esc_textarea($val_text_areas_of_study_213).'</textarea>';echo '</div>';

        $val_text_areas_of_study_214 = get_post_meta($post->ID, 'text_areas_of_study_214', true) ?: 'English.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 214 (Preview: English.)</label>';
            echo '<textarea name="text_areas_of_study_214">'.esc_textarea($val_text_areas_of_study_214).'</textarea>';echo '</div>';

        $val_text_areas_of_study_215 = get_post_meta($post->ID, 'text_areas_of_study_215', true) ?: 'Our program is designed to recognize prior college learning at admission. Your exact pathway will depend on your previous credential and educational background. An advisor can help you understand which pathway may apply to you.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 215 (Preview: Our program is designed to recognize pri...)</label>';
            echo '<textarea name="text_areas_of_study_215">'.esc_textarea($val_text_areas_of_study_215).'</textarea>';echo '</div>';

        $val_text_areas_of_study_216 = get_post_meta($post->ID, 'text_areas_of_study_216', true) ?: 'No. Our program is designed for working adults, so you can continue working while studying online.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 216 (Preview: No. Our program is designed for working ...)</label>';
            echo '<textarea name="text_areas_of_study_216">'.esc_textarea($val_text_areas_of_study_216).'</textarea>';echo '</div>';

        $val_text_areas_of_study_217 = get_post_meta($post->ID, 'text_areas_of_study_217', true) ?: 'You\'ll build transferable, workplace-relevant skills such as critical thinking, communication, judgement, creativity, digital fluency, interdisciplinary problem-solving, cultural literacy and historical understanding.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 217 (Preview: Youll build transferable, workplace-rel...)</label>';
            echo '<textarea name="text_areas_of_study_217">'.esc_textarea($val_text_areas_of_study_217).'</textarea>';echo '</div>';

        $val_text_areas_of_study_218 = get_post_meta($post->ID, 'text_areas_of_study_218', true) ?: 'The Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) is accelerated, broad, interdisciplinary and future-focused. Instead of preparing you for one narrow role, it helps you build skills that can travel across roles, sectors and career changes.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 218 (Preview: The Bachelor of Arts, Interdisciplinary ...)</label>';
            echo '<textarea name="text_areas_of_study_218">'.esc_textarea($val_text_areas_of_study_218).'</textarea>';echo '</div>';

        $val_text_areas_of_study_219 = get_post_meta($post->ID, 'text_areas_of_study_219', true) ?: 'It may help support eligibility for future graduate study or professional pathways, depending on the specific program, institution and admission requirements. Students should confirm requirements for any future program they\'re considering.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 219 (Preview: It may help support eligibility for futu...)</label>';
            echo '<textarea name="text_areas_of_study_219">'.esc_textarea($val_text_areas_of_study_219).'</textarea>';echo '</div>';

        $val_text_areas_of_study_220 = get_post_meta($post->ID, 'text_areas_of_study_220', true) ?: 'Please note that the pathway is a suggestion. Your chosen course load/semester will determine your individual pathway.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 220 (Preview: Please note that the pathway is a sug...)</label>';
            echo '<textarea name="text_areas_of_study_220">'.esc_textarea($val_text_areas_of_study_220).'</textarea>';echo '</div>';

        $val_text_areas_of_study_221 = get_post_meta($post->ID, 'text_areas_of_study_221', true) ?: 'Please note that the pathway is a suggestion. Your chosen course load/semester will determine your individual pathway.';
        echo '<div class="uottawa-field"><label>Areas of Study Text 221 (Preview: Please note that the pathway is a sug...)</label>';
            echo '<textarea name="text_areas_of_study_221">'.esc_textarea($val_text_areas_of_study_221).'</textarea>';echo '</div>';

echo '</div>';
echo '<div class="uottawa-tab-content" id="tab-9">';
echo '<h3 class="uottawa-section-title">Final CTA</h3>';

        $val_text_final_cta_1 = get_post_meta($post->ID, 'text_final_cta_1', true) ?: 'Your degree is closer than you think';
        echo '<div class="uottawa-field"><label>Final CTA Heading 1 (Preview: Your degree is closer than you think...)</label>';
            echo '<input type="text" name="text_final_cta_1" value="'.esc_attr($val_text_final_cta_1).'">';echo '</div>';

        $val_text_final_cta_2 = get_post_meta($post->ID, 'text_final_cta_2', true) ?: 'Build on your college diploma. Strengthen the human skills employers value. Earn a career-relevant degree 100% online.';
        echo '<div class="uottawa-field"><label>Final CTA Paragraph 2 (Preview: Build on your college diploma. Strengthe...)</label>';
            echo '<textarea name="text_final_cta_2">'.esc_textarea($val_text_final_cta_2).'</textarea>';echo '</div>';

        $val_text_final_cta_3 = get_post_meta($post->ID, 'text_final_cta_3', true) ?: 'Request more info';
        echo '<div class="uottawa-field"><label>Final CTA Text 3 (Preview: Request more info...)</label>';
            echo '<input type="text" name="text_final_cta_3" value="'.esc_attr($val_text_final_cta_3).'">';echo '</div>';

        $val_text_final_cta_4 = get_post_meta($post->ID, 'text_final_cta_4', true) ?: 'Get program details, tuition information, and application instructions.';
        echo '<div class="uottawa-field"><label>Final CTA Paragraph 4 (Preview: Get program details, tuition information...)</label>';
            echo '<textarea name="text_final_cta_4">'.esc_textarea($val_text_final_cta_4).'</textarea>';echo '</div>';

        $val_text_final_cta_5 = get_post_meta($post->ID, 'text_final_cta_5', true) ?: 'Start your application';
        echo '<div class="uottawa-field"><label>Final CTA Text 5 (Preview: Start your application...)</label>';
            echo '<input type="text" name="text_final_cta_5" value="'.esc_attr($val_text_final_cta_5).'">';echo '</div>';

        $val_text_final_cta_6 = get_post_meta($post->ID, 'text_final_cta_6', true) ?: 'Begin your journey toward building in-demand, future-proof skills.';
        echo '<div class="uottawa-field"><label>Final CTA Paragraph 6 (Preview: Begin your journey toward building in-de...)</label>';
            echo '<textarea name="text_final_cta_6">'.esc_textarea($val_text_final_cta_6).'</textarea>';echo '</div>';
echo '</div>';

    echo '</div>';
    echo '<script>
    jQuery(document).ready(function($){
        $(".uottawa-tabs li").click(function(){
            $(".uottawa-tabs li").removeClass("active");
            $(this).addClass("active");
            $(".uottawa-tab-content").removeClass("active");
            $("#" + $(this).data("tab")).addClass("active");
        });
    });
    </script>';
}

function uottawa_save_meta_boxes($post_id) {
    if (!isset($_POST['uottawa_meta_nonce']) || !wp_verify_nonce($_POST['uottawa_meta_nonce'], 'uottawa_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_page', $post_id)) return;
    if (isset($_POST['text_general_1'])) update_post_meta($post_id, 'text_general_1', wp_kses_post($_POST['text_general_1']));
    if (isset($_POST['text_general_2'])) update_post_meta($post_id, 'text_general_2', wp_kses_post($_POST['text_general_2']));
    if (isset($_POST['text_info_grid_1'])) update_post_meta($post_id, 'text_info_grid_1', sanitize_text_field($_POST['text_info_grid_1']));
    if (isset($_POST['text_info_grid_2'])) update_post_meta($post_id, 'text_info_grid_2', sanitize_text_field($_POST['text_info_grid_2']));
    if (isset($_POST['text_info_grid_3'])) update_post_meta($post_id, 'text_info_grid_3', sanitize_text_field($_POST['text_info_grid_3']));
    if (isset($_POST['text_info_grid_4'])) update_post_meta($post_id, 'text_info_grid_4', sanitize_text_field($_POST['text_info_grid_4']));
    if (isset($_POST['text_info_grid_5'])) update_post_meta($post_id, 'text_info_grid_5', sanitize_text_field($_POST['text_info_grid_5']));
    if (isset($_POST['text_info_grid_6'])) update_post_meta($post_id, 'text_info_grid_6', sanitize_text_field($_POST['text_info_grid_6']));
    if (isset($_POST['text_info_grid_7'])) update_post_meta($post_id, 'text_info_grid_7', sanitize_text_field($_POST['text_info_grid_7']));
    if (isset($_POST['text_info_grid_8'])) update_post_meta($post_id, 'text_info_grid_8', wp_kses_post($_POST['text_info_grid_8']));
    if (isset($_POST['text_info_grid_9'])) update_post_meta($post_id, 'text_info_grid_9', sanitize_text_field($_POST['text_info_grid_9']));
    if (isset($_POST['text_info_grid_10'])) update_post_meta($post_id, 'text_info_grid_10', sanitize_text_field($_POST['text_info_grid_10']));
    if (isset($_POST['text_info_grid_11'])) update_post_meta($post_id, 'text_info_grid_11', wp_kses_post($_POST['text_info_grid_11']));
    if (isset($_POST['text_info_grid_12'])) update_post_meta($post_id, 'text_info_grid_12', sanitize_text_field($_POST['text_info_grid_12']));
    if (isset($_POST['text_why_uottawa_1'])) update_post_meta($post_id, 'text_why_uottawa_1', wp_kses_post($_POST['text_why_uottawa_1']));
    if (isset($_POST['text_why_uottawa_2'])) update_post_meta($post_id, 'text_why_uottawa_2', sanitize_text_field($_POST['text_why_uottawa_2']));
    if (isset($_POST['text_why_uottawa_3'])) update_post_meta($post_id, 'text_why_uottawa_3', sanitize_text_field($_POST['text_why_uottawa_3']));
    if (isset($_POST['text_why_uottawa_4'])) update_post_meta($post_id, 'text_why_uottawa_4', sanitize_text_field($_POST['text_why_uottawa_4']));
    if (isset($_POST['text_why_uottawa_5'])) update_post_meta($post_id, 'text_why_uottawa_5', sanitize_text_field($_POST['text_why_uottawa_5']));
    if (isset($_POST['text_why_uottawa_6'])) update_post_meta($post_id, 'text_why_uottawa_6', sanitize_text_field($_POST['text_why_uottawa_6']));
    if (isset($_POST['text_why_uottawa_7'])) update_post_meta($post_id, 'text_why_uottawa_7', wp_kses_post($_POST['text_why_uottawa_7']));
    if (isset($_POST['text_why_uottawa_8'])) update_post_meta($post_id, 'text_why_uottawa_8', sanitize_text_field($_POST['text_why_uottawa_8']));
    if (isset($_POST['text_why_uottawa_9'])) update_post_meta($post_id, 'text_why_uottawa_9', sanitize_text_field($_POST['text_why_uottawa_9']));
    if (isset($_POST['text_why_uottawa_10'])) update_post_meta($post_id, 'text_why_uottawa_10', sanitize_text_field($_POST['text_why_uottawa_10']));
    if (isset($_POST['text_why_uottawa_11'])) update_post_meta($post_id, 'text_why_uottawa_11', sanitize_text_field($_POST['text_why_uottawa_11']));
    if (isset($_POST['text_why_uottawa_12'])) update_post_meta($post_id, 'text_why_uottawa_12', sanitize_text_field($_POST['text_why_uottawa_12']));
    if (isset($_POST['text_why_uottawa_13'])) update_post_meta($post_id, 'text_why_uottawa_13', wp_kses_post($_POST['text_why_uottawa_13']));
    if (isset($_POST['text_why_uottawa_14'])) update_post_meta($post_id, 'text_why_uottawa_14', sanitize_text_field($_POST['text_why_uottawa_14']));
    if (isset($_POST['text_why_uottawa_15'])) update_post_meta($post_id, 'text_why_uottawa_15', sanitize_text_field($_POST['text_why_uottawa_15']));
    if (isset($_POST['text_why_uottawa_16'])) update_post_meta($post_id, 'text_why_uottawa_16', sanitize_text_field($_POST['text_why_uottawa_16']));

    if (isset($_POST['forminator_shortcode'])) update_post_meta($post_id, 'forminator_shortcode', sanitize_text_field($_POST['forminator_shortcode']));
    if (isset($_POST['text_overview_1'])) update_post_meta($post_id, 'text_overview_1', sanitize_text_field($_POST['text_overview_1']));
    if (isset($_POST['text_program_insights_1'])) update_post_meta($post_id, 'text_program_insights_1', sanitize_text_field($_POST['text_program_insights_1']));
    if (isset($_POST['text_program_insights_2'])) update_post_meta($post_id, 'text_program_insights_2', sanitize_text_field($_POST['text_program_insights_2']));
    if (isset($_POST['text_admissions_1'])) update_post_meta($post_id, 'text_admissions_1', sanitize_text_field($_POST['text_admissions_1']));
    if (isset($_POST['text_faq_1'])) update_post_meta($post_id, 'text_faq_1', sanitize_text_field($_POST['text_faq_1']));
    if (isset($_POST['text_overview_2'])) update_post_meta($post_id, 'text_overview_2', sanitize_text_field($_POST['text_overview_2']));
    if (isset($_POST['text_overview_3'])) update_post_meta($post_id, 'text_overview_3', sanitize_text_field($_POST['text_overview_3']));
    if (isset($_POST['text_overview_4'])) update_post_meta($post_id, 'text_overview_4', wp_kses_post($_POST['text_overview_4']));
    if (isset($_POST['text_overview_5'])) update_post_meta($post_id, 'text_overview_5', wp_kses_post($_POST['text_overview_5']));
    if (isset($_POST['text_overview_6'])) update_post_meta($post_id, 'text_overview_6', wp_kses_post($_POST['text_overview_6']));
    if (isset($_POST['img_overview_7'])) update_post_meta($post_id, 'img_overview_7', sanitize_text_field($_POST['img_overview_7']));
    if (isset($_POST['img_overview_8'])) update_post_meta($post_id, 'img_overview_8', sanitize_text_field($_POST['img_overview_8']));
    if (isset($_POST['text_overview_9'])) update_post_meta($post_id, 'text_overview_9', sanitize_text_field($_POST['text_overview_9']));
    if (isset($_POST['text_overview_10'])) update_post_meta($post_id, 'text_overview_10', wp_kses_post($_POST['text_overview_10']));
    if (isset($_POST['text_overview_11'])) update_post_meta($post_id, 'text_overview_11', wp_kses_post($_POST['text_overview_11']));
    if (isset($_POST['text_overview_12'])) update_post_meta($post_id, 'text_overview_12', sanitize_text_field($_POST['text_overview_12']));
    if (isset($_POST['text_overview_13'])) update_post_meta($post_id, 'text_overview_13', sanitize_text_field($_POST['text_overview_13']));
    if (isset($_POST['text_overview_14'])) update_post_meta($post_id, 'text_overview_14', wp_kses_post($_POST['text_overview_14']));
    if (isset($_POST['text_overview_15'])) update_post_meta($post_id, 'text_overview_15', sanitize_text_field($_POST['text_overview_15']));
    if (isset($_POST['text_overview_16'])) update_post_meta($post_id, 'text_overview_16', wp_kses_post($_POST['text_overview_16']));
    if (isset($_POST['text_overview_17'])) update_post_meta($post_id, 'text_overview_17', sanitize_text_field($_POST['text_overview_17']));
    if (isset($_POST['text_overview_18'])) update_post_meta($post_id, 'text_overview_18', wp_kses_post($_POST['text_overview_18']));
    if (isset($_POST['text_overview_19'])) update_post_meta($post_id, 'text_overview_19', sanitize_text_field($_POST['text_overview_19']));
    if (isset($_POST['text_overview_20'])) update_post_meta($post_id, 'text_overview_20', sanitize_text_field($_POST['text_overview_20']));
    if (isset($_POST['text_overview_21'])) update_post_meta($post_id, 'text_overview_21', wp_kses_post($_POST['text_overview_21']));
    if (isset($_POST['text_overview_22'])) update_post_meta($post_id, 'text_overview_22', sanitize_text_field($_POST['text_overview_22']));
    if (isset($_POST['text_overview_23'])) update_post_meta($post_id, 'text_overview_23', wp_kses_post($_POST['text_overview_23']));
    if (isset($_POST['text_overview_24'])) update_post_meta($post_id, 'text_overview_24', sanitize_text_field($_POST['text_overview_24']));
    if (isset($_POST['text_overview_25'])) update_post_meta($post_id, 'text_overview_25', wp_kses_post($_POST['text_overview_25']));
    if (isset($_POST['text_overview_26'])) update_post_meta($post_id, 'text_overview_26', sanitize_text_field($_POST['text_overview_26']));
    if (isset($_POST['text_program_insights_3'])) update_post_meta($post_id, 'text_program_insights_3', sanitize_text_field($_POST['text_program_insights_3']));
    if (isset($_POST['text_program_insights_4'])) update_post_meta($post_id, 'text_program_insights_4', wp_kses_post($_POST['text_program_insights_4']));
    if (isset($_POST['text_program_insights_5'])) update_post_meta($post_id, 'text_program_insights_5', sanitize_text_field($_POST['text_program_insights_5']));
    if (isset($_POST['text_program_insights_6'])) update_post_meta($post_id, 'text_program_insights_6', wp_kses_post($_POST['text_program_insights_6']));
    if (isset($_POST['text_program_insights_7'])) update_post_meta($post_id, 'text_program_insights_7', sanitize_text_field($_POST['text_program_insights_7']));
    if (isset($_POST['text_program_insights_8'])) update_post_meta($post_id, 'text_program_insights_8', sanitize_text_field($_POST['text_program_insights_8']));
    if (isset($_POST['text_program_insights_9'])) update_post_meta($post_id, 'text_program_insights_9', sanitize_text_field($_POST['text_program_insights_9']));
    if (isset($_POST['text_program_insights_10'])) update_post_meta($post_id, 'text_program_insights_10', sanitize_text_field($_POST['text_program_insights_10']));
    if (isset($_POST['text_program_insights_11'])) update_post_meta($post_id, 'text_program_insights_11', sanitize_text_field($_POST['text_program_insights_11']));
    if (isset($_POST['text_program_insights_12'])) update_post_meta($post_id, 'text_program_insights_12', wp_kses_post($_POST['text_program_insights_12']));
    if (isset($_POST['text_course_information_1'])) update_post_meta($post_id, 'text_course_information_1', sanitize_text_field($_POST['text_course_information_1']));
    if (isset($_POST['text_course_information_2'])) update_post_meta($post_id, 'text_course_information_2', wp_kses_post($_POST['text_course_information_2']));
    if (isset($_POST['text_course_information_3'])) update_post_meta($post_id, 'text_course_information_3', sanitize_text_field($_POST['text_course_information_3']));
    if (isset($_POST['text_course_information_4'])) update_post_meta($post_id, 'text_course_information_4', wp_kses_post($_POST['text_course_information_4']));
    if (isset($_POST['text_course_information_5'])) update_post_meta($post_id, 'text_course_information_5', sanitize_text_field($_POST['text_course_information_5']));
    if (isset($_POST['text_course_information_6'])) update_post_meta($post_id, 'text_course_information_6', wp_kses_post($_POST['text_course_information_6']));
    if (isset($_POST['text_course_information_7'])) update_post_meta($post_id, 'text_course_information_7', sanitize_text_field($_POST['text_course_information_7']));
    if (isset($_POST['text_course_information_8'])) update_post_meta($post_id, 'text_course_information_8', wp_kses_post($_POST['text_course_information_8']));
    if (isset($_POST['text_course_information_9'])) update_post_meta($post_id, 'text_course_information_9', sanitize_text_field($_POST['text_course_information_9']));
    if (isset($_POST['text_course_information_10'])) update_post_meta($post_id, 'text_course_information_10', wp_kses_post($_POST['text_course_information_10']));
    if (isset($_POST['text_areas_of_study_1'])) update_post_meta($post_id, 'text_areas_of_study_1', sanitize_text_field($_POST['text_areas_of_study_1']));
    if (isset($_POST['text_areas_of_study_2'])) update_post_meta($post_id, 'text_areas_of_study_2', sanitize_text_field($_POST['text_areas_of_study_2']));
    if (isset($_POST['text_areas_of_study_3'])) update_post_meta($post_id, 'text_areas_of_study_3', sanitize_text_field($_POST['text_areas_of_study_3']));
    if (isset($_POST['text_areas_of_study_4'])) update_post_meta($post_id, 'text_areas_of_study_4', sanitize_text_field($_POST['text_areas_of_study_4']));
    if (isset($_POST['text_areas_of_study_5'])) update_post_meta($post_id, 'text_areas_of_study_5', sanitize_text_field($_POST['text_areas_of_study_5']));
    if (isset($_POST['text_areas_of_study_6'])) update_post_meta($post_id, 'text_areas_of_study_6', sanitize_text_field($_POST['text_areas_of_study_6']));
    if (isset($_POST['text_areas_of_study_7'])) update_post_meta($post_id, 'text_areas_of_study_7', sanitize_text_field($_POST['text_areas_of_study_7']));
    if (isset($_POST['text_areas_of_study_8'])) update_post_meta($post_id, 'text_areas_of_study_8', sanitize_text_field($_POST['text_areas_of_study_8']));
    if (isset($_POST['text_areas_of_study_9'])) update_post_meta($post_id, 'text_areas_of_study_9', sanitize_text_field($_POST['text_areas_of_study_9']));
    if (isset($_POST['text_areas_of_study_10'])) update_post_meta($post_id, 'text_areas_of_study_10', sanitize_text_field($_POST['text_areas_of_study_10']));
    if (isset($_POST['text_areas_of_study_11'])) update_post_meta($post_id, 'text_areas_of_study_11', sanitize_text_field($_POST['text_areas_of_study_11']));
    if (isset($_POST['text_areas_of_study_12'])) update_post_meta($post_id, 'text_areas_of_study_12', sanitize_text_field($_POST['text_areas_of_study_12']));
    if (isset($_POST['text_areas_of_study_13'])) update_post_meta($post_id, 'text_areas_of_study_13', sanitize_text_field($_POST['text_areas_of_study_13']));
    if (isset($_POST['img_areas_of_study_14'])) update_post_meta($post_id, 'img_areas_of_study_14', sanitize_text_field($_POST['img_areas_of_study_14']));
    if (isset($_POST['text_areas_of_study_15'])) update_post_meta($post_id, 'text_areas_of_study_15', sanitize_text_field($_POST['text_areas_of_study_15']));
    if (isset($_POST['text_areas_of_study_16'])) update_post_meta($post_id, 'text_areas_of_study_16', sanitize_text_field($_POST['text_areas_of_study_16']));
    if (isset($_POST['text_areas_of_study_17'])) update_post_meta($post_id, 'text_areas_of_study_17', sanitize_text_field($_POST['text_areas_of_study_17']));
    if (isset($_POST['text_areas_of_study_18'])) update_post_meta($post_id, 'text_areas_of_study_18', wp_kses_post($_POST['text_areas_of_study_18']));
    if (isset($_POST['text_areas_of_study_19'])) update_post_meta($post_id, 'text_areas_of_study_19', sanitize_text_field($_POST['text_areas_of_study_19']));
    if (isset($_POST['text_areas_of_study_20'])) update_post_meta($post_id, 'text_areas_of_study_20', sanitize_text_field($_POST['text_areas_of_study_20']));
    if (isset($_POST['text_areas_of_study_21'])) update_post_meta($post_id, 'text_areas_of_study_21', sanitize_text_field($_POST['text_areas_of_study_21']));
    if (isset($_POST['text_areas_of_study_22'])) update_post_meta($post_id, 'text_areas_of_study_22', sanitize_text_field($_POST['text_areas_of_study_22']));
    if (isset($_POST['text_areas_of_study_23'])) update_post_meta($post_id, 'text_areas_of_study_23', sanitize_text_field($_POST['text_areas_of_study_23']));
    if (isset($_POST['text_areas_of_study_24'])) update_post_meta($post_id, 'text_areas_of_study_24', sanitize_text_field($_POST['text_areas_of_study_24']));
    if (isset($_POST['text_areas_of_study_25'])) update_post_meta($post_id, 'text_areas_of_study_25', sanitize_text_field($_POST['text_areas_of_study_25']));
    if (isset($_POST['text_areas_of_study_26'])) update_post_meta($post_id, 'text_areas_of_study_26', sanitize_text_field($_POST['text_areas_of_study_26']));
    if (isset($_POST['text_areas_of_study_27'])) update_post_meta($post_id, 'text_areas_of_study_27', sanitize_text_field($_POST['text_areas_of_study_27']));
    if (isset($_POST['text_areas_of_study_28'])) update_post_meta($post_id, 'text_areas_of_study_28', sanitize_text_field($_POST['text_areas_of_study_28']));
    if (isset($_POST['text_areas_of_study_29'])) update_post_meta($post_id, 'text_areas_of_study_29', sanitize_text_field($_POST['text_areas_of_study_29']));
    if (isset($_POST['text_areas_of_study_30'])) update_post_meta($post_id, 'text_areas_of_study_30', wp_kses_post($_POST['text_areas_of_study_30']));
    if (isset($_POST['text_areas_of_study_31'])) update_post_meta($post_id, 'text_areas_of_study_31', sanitize_text_field($_POST['text_areas_of_study_31']));
    if (isset($_POST['text_areas_of_study_32'])) update_post_meta($post_id, 'text_areas_of_study_32', wp_kses_post($_POST['text_areas_of_study_32']));
    if (isset($_POST['text_areas_of_study_33'])) update_post_meta($post_id, 'text_areas_of_study_33', sanitize_text_field($_POST['text_areas_of_study_33']));
    if (isset($_POST['text_areas_of_study_34'])) update_post_meta($post_id, 'text_areas_of_study_34', sanitize_text_field($_POST['text_areas_of_study_34']));
    if (isset($_POST['text_areas_of_study_35'])) update_post_meta($post_id, 'text_areas_of_study_35', sanitize_text_field($_POST['text_areas_of_study_35']));
    if (isset($_POST['text_areas_of_study_36'])) update_post_meta($post_id, 'text_areas_of_study_36', sanitize_text_field($_POST['text_areas_of_study_36']));
    if (isset($_POST['text_areas_of_study_37'])) update_post_meta($post_id, 'text_areas_of_study_37', sanitize_text_field($_POST['text_areas_of_study_37']));
    if (isset($_POST['text_areas_of_study_38'])) update_post_meta($post_id, 'text_areas_of_study_38', wp_kses_post($_POST['text_areas_of_study_38']));
    if (isset($_POST['text_areas_of_study_39'])) update_post_meta($post_id, 'text_areas_of_study_39', sanitize_text_field($_POST['text_areas_of_study_39']));
    if (isset($_POST['text_areas_of_study_40'])) update_post_meta($post_id, 'text_areas_of_study_40', sanitize_text_field($_POST['text_areas_of_study_40']));
    if (isset($_POST['text_areas_of_study_41'])) update_post_meta($post_id, 'text_areas_of_study_41', sanitize_text_field($_POST['text_areas_of_study_41']));
    if (isset($_POST['text_areas_of_study_42'])) update_post_meta($post_id, 'text_areas_of_study_42', sanitize_text_field($_POST['text_areas_of_study_42']));
    if (isset($_POST['text_areas_of_study_43'])) update_post_meta($post_id, 'text_areas_of_study_43', sanitize_text_field($_POST['text_areas_of_study_43']));
    if (isset($_POST['text_areas_of_study_44'])) update_post_meta($post_id, 'text_areas_of_study_44', wp_kses_post($_POST['text_areas_of_study_44']));
    if (isset($_POST['text_areas_of_study_45'])) update_post_meta($post_id, 'text_areas_of_study_45', sanitize_text_field($_POST['text_areas_of_study_45']));
    if (isset($_POST['text_areas_of_study_46'])) update_post_meta($post_id, 'text_areas_of_study_46', wp_kses_post($_POST['text_areas_of_study_46']));
    if (isset($_POST['text_areas_of_study_47'])) update_post_meta($post_id, 'text_areas_of_study_47', sanitize_text_field($_POST['text_areas_of_study_47']));
    if (isset($_POST['text_areas_of_study_48'])) update_post_meta($post_id, 'text_areas_of_study_48', sanitize_text_field($_POST['text_areas_of_study_48']));
    if (isset($_POST['text_areas_of_study_49'])) update_post_meta($post_id, 'text_areas_of_study_49', sanitize_text_field($_POST['text_areas_of_study_49']));
    if (isset($_POST['text_areas_of_study_50'])) update_post_meta($post_id, 'text_areas_of_study_50', sanitize_text_field($_POST['text_areas_of_study_50']));
    if (isset($_POST['text_areas_of_study_51'])) update_post_meta($post_id, 'text_areas_of_study_51', sanitize_text_field($_POST['text_areas_of_study_51']));
    if (isset($_POST['text_areas_of_study_52'])) update_post_meta($post_id, 'text_areas_of_study_52', sanitize_text_field($_POST['text_areas_of_study_52']));
    if (isset($_POST['text_areas_of_study_53'])) update_post_meta($post_id, 'text_areas_of_study_53', sanitize_text_field($_POST['text_areas_of_study_53']));
    if (isset($_POST['text_areas_of_study_54'])) update_post_meta($post_id, 'text_areas_of_study_54', wp_kses_post($_POST['text_areas_of_study_54']));
    if (isset($_POST['text_areas_of_study_55'])) update_post_meta($post_id, 'text_areas_of_study_55', sanitize_text_field($_POST['text_areas_of_study_55']));
    if (isset($_POST['text_areas_of_study_56'])) update_post_meta($post_id, 'text_areas_of_study_56', sanitize_text_field($_POST['text_areas_of_study_56']));
    if (isset($_POST['text_areas_of_study_57'])) update_post_meta($post_id, 'text_areas_of_study_57', sanitize_text_field($_POST['text_areas_of_study_57']));
    if (isset($_POST['text_areas_of_study_58'])) update_post_meta($post_id, 'text_areas_of_study_58', sanitize_text_field($_POST['text_areas_of_study_58']));
    if (isset($_POST['text_areas_of_study_59'])) update_post_meta($post_id, 'text_areas_of_study_59', sanitize_text_field($_POST['text_areas_of_study_59']));
    if (isset($_POST['text_areas_of_study_60'])) update_post_meta($post_id, 'text_areas_of_study_60', sanitize_text_field($_POST['text_areas_of_study_60']));
    if (isset($_POST['text_areas_of_study_61'])) update_post_meta($post_id, 'text_areas_of_study_61', sanitize_text_field($_POST['text_areas_of_study_61']));
    if (isset($_POST['text_areas_of_study_62'])) update_post_meta($post_id, 'text_areas_of_study_62', sanitize_text_field($_POST['text_areas_of_study_62']));
    if (isset($_POST['text_areas_of_study_63'])) update_post_meta($post_id, 'text_areas_of_study_63', sanitize_text_field($_POST['text_areas_of_study_63']));
    if (isset($_POST['text_areas_of_study_64'])) update_post_meta($post_id, 'text_areas_of_study_64', sanitize_text_field($_POST['text_areas_of_study_64']));
    if (isset($_POST['text_areas_of_study_65'])) update_post_meta($post_id, 'text_areas_of_study_65', sanitize_text_field($_POST['text_areas_of_study_65']));
    if (isset($_POST['text_areas_of_study_66'])) update_post_meta($post_id, 'text_areas_of_study_66', wp_kses_post($_POST['text_areas_of_study_66']));
    if (isset($_POST['text_areas_of_study_67'])) update_post_meta($post_id, 'text_areas_of_study_67', sanitize_text_field($_POST['text_areas_of_study_67']));
    if (isset($_POST['text_areas_of_study_68'])) update_post_meta($post_id, 'text_areas_of_study_68', wp_kses_post($_POST['text_areas_of_study_68']));
    if (isset($_POST['text_areas_of_study_69'])) update_post_meta($post_id, 'text_areas_of_study_69', sanitize_text_field($_POST['text_areas_of_study_69']));
    if (isset($_POST['text_areas_of_study_70'])) update_post_meta($post_id, 'text_areas_of_study_70', sanitize_text_field($_POST['text_areas_of_study_70']));
    if (isset($_POST['text_areas_of_study_71'])) update_post_meta($post_id, 'text_areas_of_study_71', sanitize_text_field($_POST['text_areas_of_study_71']));
    if (isset($_POST['text_areas_of_study_72'])) update_post_meta($post_id, 'text_areas_of_study_72', sanitize_text_field($_POST['text_areas_of_study_72']));
    if (isset($_POST['text_areas_of_study_73'])) update_post_meta($post_id, 'text_areas_of_study_73', sanitize_text_field($_POST['text_areas_of_study_73']));
    if (isset($_POST['text_areas_of_study_74'])) update_post_meta($post_id, 'text_areas_of_study_74', wp_kses_post($_POST['text_areas_of_study_74']));
    if (isset($_POST['text_areas_of_study_75'])) update_post_meta($post_id, 'text_areas_of_study_75', sanitize_text_field($_POST['text_areas_of_study_75']));
    if (isset($_POST['text_areas_of_study_76'])) update_post_meta($post_id, 'text_areas_of_study_76', sanitize_text_field($_POST['text_areas_of_study_76']));
    if (isset($_POST['text_areas_of_study_77'])) update_post_meta($post_id, 'text_areas_of_study_77', sanitize_text_field($_POST['text_areas_of_study_77']));
    if (isset($_POST['text_areas_of_study_78'])) update_post_meta($post_id, 'text_areas_of_study_78', sanitize_text_field($_POST['text_areas_of_study_78']));
    if (isset($_POST['text_areas_of_study_79'])) update_post_meta($post_id, 'text_areas_of_study_79', sanitize_text_field($_POST['text_areas_of_study_79']));
    if (isset($_POST['text_areas_of_study_80'])) update_post_meta($post_id, 'text_areas_of_study_80', wp_kses_post($_POST['text_areas_of_study_80']));
    if (isset($_POST['text_areas_of_study_81'])) update_post_meta($post_id, 'text_areas_of_study_81', sanitize_text_field($_POST['text_areas_of_study_81']));
    if (isset($_POST['text_areas_of_study_82'])) update_post_meta($post_id, 'text_areas_of_study_82', wp_kses_post($_POST['text_areas_of_study_82']));
    if (isset($_POST['text_areas_of_study_83'])) update_post_meta($post_id, 'text_areas_of_study_83', sanitize_text_field($_POST['text_areas_of_study_83']));
    if (isset($_POST['text_areas_of_study_84'])) update_post_meta($post_id, 'text_areas_of_study_84', sanitize_text_field($_POST['text_areas_of_study_84']));
    if (isset($_POST['text_areas_of_study_85'])) update_post_meta($post_id, 'text_areas_of_study_85', sanitize_text_field($_POST['text_areas_of_study_85']));
    if (isset($_POST['text_areas_of_study_86'])) update_post_meta($post_id, 'text_areas_of_study_86', sanitize_text_field($_POST['text_areas_of_study_86']));
    if (isset($_POST['text_areas_of_study_87'])) update_post_meta($post_id, 'text_areas_of_study_87', sanitize_text_field($_POST['text_areas_of_study_87']));
    if (isset($_POST['text_areas_of_study_88'])) update_post_meta($post_id, 'text_areas_of_study_88', sanitize_text_field($_POST['text_areas_of_study_88']));
    if (isset($_POST['text_areas_of_study_89'])) update_post_meta($post_id, 'text_areas_of_study_89', sanitize_text_field($_POST['text_areas_of_study_89']));
    if (isset($_POST['text_areas_of_study_90'])) update_post_meta($post_id, 'text_areas_of_study_90', sanitize_text_field($_POST['text_areas_of_study_90']));
    if (isset($_POST['text_areas_of_study_91'])) update_post_meta($post_id, 'text_areas_of_study_91', sanitize_text_field($_POST['text_areas_of_study_91']));
    if (isset($_POST['text_areas_of_study_92'])) update_post_meta($post_id, 'text_areas_of_study_92', sanitize_text_field($_POST['text_areas_of_study_92']));
    if (isset($_POST['text_areas_of_study_93'])) update_post_meta($post_id, 'text_areas_of_study_93', sanitize_text_field($_POST['text_areas_of_study_93']));
    if (isset($_POST['text_areas_of_study_94'])) update_post_meta($post_id, 'text_areas_of_study_94', wp_kses_post($_POST['text_areas_of_study_94']));
    if (isset($_POST['text_areas_of_study_95'])) update_post_meta($post_id, 'text_areas_of_study_95', sanitize_text_field($_POST['text_areas_of_study_95']));
    if (isset($_POST['text_areas_of_study_96'])) update_post_meta($post_id, 'text_areas_of_study_96', sanitize_text_field($_POST['text_areas_of_study_96']));
    if (isset($_POST['text_areas_of_study_97'])) update_post_meta($post_id, 'text_areas_of_study_97', sanitize_text_field($_POST['text_areas_of_study_97']));
    if (isset($_POST['text_areas_of_study_98'])) update_post_meta($post_id, 'text_areas_of_study_98', sanitize_text_field($_POST['text_areas_of_study_98']));
    if (isset($_POST['text_areas_of_study_99'])) update_post_meta($post_id, 'text_areas_of_study_99', wp_kses_post($_POST['text_areas_of_study_99']));
    if (isset($_POST['text_areas_of_study_100'])) update_post_meta($post_id, 'text_areas_of_study_100', sanitize_text_field($_POST['text_areas_of_study_100']));
    if (isset($_POST['text_areas_of_study_101'])) update_post_meta($post_id, 'text_areas_of_study_101', wp_kses_post($_POST['text_areas_of_study_101']));
    if (isset($_POST['text_areas_of_study_102'])) update_post_meta($post_id, 'text_areas_of_study_102', sanitize_text_field($_POST['text_areas_of_study_102']));
    if (isset($_POST['text_areas_of_study_103'])) update_post_meta($post_id, 'text_areas_of_study_103', sanitize_text_field($_POST['text_areas_of_study_103']));
    if (isset($_POST['text_areas_of_study_104'])) update_post_meta($post_id, 'text_areas_of_study_104', wp_kses_post($_POST['text_areas_of_study_104']));
    if (isset($_POST['text_areas_of_study_105'])) update_post_meta($post_id, 'text_areas_of_study_105', sanitize_text_field($_POST['text_areas_of_study_105']));
    if (isset($_POST['text_areas_of_study_106'])) update_post_meta($post_id, 'text_areas_of_study_106', wp_kses_post($_POST['text_areas_of_study_106']));
    if (isset($_POST['text_areas_of_study_107'])) update_post_meta($post_id, 'text_areas_of_study_107', sanitize_text_field($_POST['text_areas_of_study_107']));
    if (isset($_POST['text_areas_of_study_108'])) update_post_meta($post_id, 'text_areas_of_study_108', wp_kses_post($_POST['text_areas_of_study_108']));
    if (isset($_POST['text_areas_of_study_109'])) update_post_meta($post_id, 'text_areas_of_study_109', sanitize_text_field($_POST['text_areas_of_study_109']));
    if (isset($_POST['text_areas_of_study_110'])) update_post_meta($post_id, 'text_areas_of_study_110', sanitize_text_field($_POST['text_areas_of_study_110']));
    if (isset($_POST['text_areas_of_study_111'])) update_post_meta($post_id, 'text_areas_of_study_111', sanitize_text_field($_POST['text_areas_of_study_111']));
    if (isset($_POST['text_areas_of_study_112'])) update_post_meta($post_id, 'text_areas_of_study_112', sanitize_text_field($_POST['text_areas_of_study_112']));
    if (isset($_POST['text_areas_of_study_113'])) update_post_meta($post_id, 'text_areas_of_study_113', sanitize_text_field($_POST['text_areas_of_study_113']));
    if (isset($_POST['text_areas_of_study_114'])) update_post_meta($post_id, 'text_areas_of_study_114', sanitize_text_field($_POST['text_areas_of_study_114']));
    if (isset($_POST['text_areas_of_study_115'])) update_post_meta($post_id, 'text_areas_of_study_115', sanitize_text_field($_POST['text_areas_of_study_115']));
    if (isset($_POST['text_areas_of_study_116'])) update_post_meta($post_id, 'text_areas_of_study_116', sanitize_text_field($_POST['text_areas_of_study_116']));
    if (isset($_POST['text_areas_of_study_117'])) update_post_meta($post_id, 'text_areas_of_study_117', sanitize_text_field($_POST['text_areas_of_study_117']));
    if (isset($_POST['text_areas_of_study_118'])) update_post_meta($post_id, 'text_areas_of_study_118', wp_kses_post($_POST['text_areas_of_study_118']));
    if (isset($_POST['text_areas_of_study_119'])) update_post_meta($post_id, 'text_areas_of_study_119', sanitize_text_field($_POST['text_areas_of_study_119']));
    if (isset($_POST['text_areas_of_study_120'])) update_post_meta($post_id, 'text_areas_of_study_120', sanitize_text_field($_POST['text_areas_of_study_120']));
    if (isset($_POST['text_areas_of_study_121'])) update_post_meta($post_id, 'text_areas_of_study_121', sanitize_text_field($_POST['text_areas_of_study_121']));
    if (isset($_POST['text_areas_of_study_122'])) update_post_meta($post_id, 'text_areas_of_study_122', wp_kses_post($_POST['text_areas_of_study_122']));
    if (isset($_POST['img_areas_of_study_123'])) update_post_meta($post_id, 'img_areas_of_study_123', sanitize_text_field($_POST['img_areas_of_study_123']));
    if (isset($_POST['text_areas_of_study_124'])) update_post_meta($post_id, 'text_areas_of_study_124', sanitize_text_field($_POST['text_areas_of_study_124']));
    if (isset($_POST['text_areas_of_study_125'])) update_post_meta($post_id, 'text_areas_of_study_125', wp_kses_post($_POST['text_areas_of_study_125']));
    if (isset($_POST['text_admissions_1'])) update_post_meta($post_id, 'text_admissions_1', sanitize_text_field($_POST['text_admissions_1']));
    if (isset($_POST['text_admissions_2'])) update_post_meta($post_id, 'text_admissions_2', wp_kses_post($_POST['text_admissions_2']));
    if (isset($_POST['text_admissions_3'])) update_post_meta($post_id, 'text_admissions_3', sanitize_text_field($_POST['text_admissions_3']));
    if (isset($_POST['text_admissions_4'])) update_post_meta($post_id, 'text_admissions_4', wp_kses_post($_POST['text_admissions_4']));
    if (isset($_POST['text_admissions_5'])) update_post_meta($post_id, 'text_admissions_5', sanitize_text_field($_POST['text_admissions_5']));
    if (isset($_POST['text_admissions_6'])) update_post_meta($post_id, 'text_admissions_6', wp_kses_post($_POST['text_admissions_6']));
    if (isset($_POST['text_admissions_7'])) update_post_meta($post_id, 'text_admissions_7', sanitize_text_field($_POST['text_admissions_7']));
    if (isset($_POST['text_admissions_8'])) update_post_meta($post_id, 'text_admissions_8', wp_kses_post($_POST['text_admissions_8']));
    if (isset($_POST['text_admissions_9'])) update_post_meta($post_id, 'text_admissions_9', sanitize_text_field($_POST['text_admissions_9']));
    if (isset($_POST['text_admissions_10'])) update_post_meta($post_id, 'text_admissions_10', wp_kses_post($_POST['text_admissions_10']));
    if (isset($_POST['text_admissions_11'])) update_post_meta($post_id, 'text_admissions_11', sanitize_text_field($_POST['text_admissions_11']));
    if (isset($_POST['text_admissions_12'])) update_post_meta($post_id, 'text_admissions_12', sanitize_text_field($_POST['text_admissions_12']));
    if (isset($_POST['text_admissions_13'])) update_post_meta($post_id, 'text_admissions_13', sanitize_text_field($_POST['text_admissions_13']));
    if (isset($_POST['text_admissions_14'])) update_post_meta($post_id, 'text_admissions_14', wp_kses_post($_POST['text_admissions_14']));
    if (isset($_POST['text_admissions_15'])) update_post_meta($post_id, 'text_admissions_15', sanitize_text_field($_POST['text_admissions_15']));
    if (isset($_POST['text_admissions_16'])) update_post_meta($post_id, 'text_admissions_16', wp_kses_post($_POST['text_admissions_16']));
    if (isset($_POST['text_admissions_17'])) update_post_meta($post_id, 'text_admissions_17', sanitize_text_field($_POST['text_admissions_17']));
    if (isset($_POST['text_admissions_18'])) update_post_meta($post_id, 'text_admissions_18', wp_kses_post($_POST['text_admissions_18']));
    if (isset($_POST['text_admissions_19'])) update_post_meta($post_id, 'text_admissions_19', sanitize_text_field($_POST['text_admissions_19']));
    if (isset($_POST['text_areas_of_study_126'])) update_post_meta($post_id, 'text_areas_of_study_126', sanitize_text_field($_POST['text_areas_of_study_126']));
    if (isset($_POST['text_areas_of_study_127'])) update_post_meta($post_id, 'text_areas_of_study_127', wp_kses_post($_POST['text_areas_of_study_127']));
    if (isset($_POST['text_areas_of_study_128'])) update_post_meta($post_id, 'text_areas_of_study_128', wp_kses_post($_POST['text_areas_of_study_128']));
    if (isset($_POST['text_areas_of_study_129'])) update_post_meta($post_id, 'text_areas_of_study_129', sanitize_text_field($_POST['text_areas_of_study_129']));
    if (isset($_POST['text_areas_of_study_130'])) update_post_meta($post_id, 'text_areas_of_study_130', wp_kses_post($_POST['text_areas_of_study_130']));
    if (isset($_POST['img_areas_of_study_131'])) update_post_meta($post_id, 'img_areas_of_study_131', sanitize_text_field($_POST['img_areas_of_study_131']));
    if (isset($_POST['text_areas_of_study_132'])) update_post_meta($post_id, 'text_areas_of_study_132', sanitize_text_field($_POST['text_areas_of_study_132']));
    if (isset($_POST['text_areas_of_study_133'])) update_post_meta($post_id, 'text_areas_of_study_133', wp_kses_post($_POST['text_areas_of_study_133']));
    if (isset($_POST['text_areas_of_study_134'])) update_post_meta($post_id, 'text_areas_of_study_134', wp_kses_post($_POST['text_areas_of_study_134']));
    if (isset($_POST['text_areas_of_study_135'])) update_post_meta($post_id, 'text_areas_of_study_135', sanitize_text_field($_POST['text_areas_of_study_135']));
    if (isset($_POST['text_areas_of_study_136'])) update_post_meta($post_id, 'text_areas_of_study_136', sanitize_text_field($_POST['text_areas_of_study_136']));
    if (isset($_POST['text_areas_of_study_137'])) update_post_meta($post_id, 'text_areas_of_study_137', sanitize_text_field($_POST['text_areas_of_study_137']));
    if (isset($_POST['text_areas_of_study_138'])) update_post_meta($post_id, 'text_areas_of_study_138', sanitize_text_field($_POST['text_areas_of_study_138']));
    if (isset($_POST['text_areas_of_study_139'])) update_post_meta($post_id, 'text_areas_of_study_139', sanitize_text_field($_POST['text_areas_of_study_139']));
    if (isset($_POST['text_areas_of_study_140'])) update_post_meta($post_id, 'text_areas_of_study_140', sanitize_text_field($_POST['text_areas_of_study_140']));
    if (isset($_POST['text_areas_of_study_141'])) update_post_meta($post_id, 'text_areas_of_study_141', wp_kses_post($_POST['text_areas_of_study_141']));
    if (isset($_POST['text_areas_of_study_142'])) update_post_meta($post_id, 'text_areas_of_study_142', sanitize_text_field($_POST['text_areas_of_study_142']));
    if (isset($_POST['text_areas_of_study_143'])) update_post_meta($post_id, 'text_areas_of_study_143', sanitize_text_field($_POST['text_areas_of_study_143']));
    if (isset($_POST['text_areas_of_study_144'])) update_post_meta($post_id, 'text_areas_of_study_144', sanitize_text_field($_POST['text_areas_of_study_144']));
    if (isset($_POST['text_areas_of_study_145'])) update_post_meta($post_id, 'text_areas_of_study_145', sanitize_text_field($_POST['text_areas_of_study_145']));
    if (isset($_POST['text_areas_of_study_146'])) update_post_meta($post_id, 'text_areas_of_study_146', sanitize_text_field($_POST['text_areas_of_study_146']));
    if (isset($_POST['text_areas_of_study_147'])) update_post_meta($post_id, 'text_areas_of_study_147', sanitize_text_field($_POST['text_areas_of_study_147']));
    if (isset($_POST['text_areas_of_study_148'])) update_post_meta($post_id, 'text_areas_of_study_148', sanitize_text_field($_POST['text_areas_of_study_148']));
    if (isset($_POST['text_areas_of_study_149'])) update_post_meta($post_id, 'text_areas_of_study_149', sanitize_text_field($_POST['text_areas_of_study_149']));
    if (isset($_POST['text_areas_of_study_150'])) update_post_meta($post_id, 'text_areas_of_study_150', sanitize_text_field($_POST['text_areas_of_study_150']));
    if (isset($_POST['text_areas_of_study_151'])) update_post_meta($post_id, 'text_areas_of_study_151', wp_kses_post($_POST['text_areas_of_study_151']));
    if (isset($_POST['text_areas_of_study_152'])) update_post_meta($post_id, 'text_areas_of_study_152', wp_kses_post($_POST['text_areas_of_study_152']));
    if (isset($_POST['text_areas_of_study_153'])) update_post_meta($post_id, 'text_areas_of_study_153', wp_kses_post($_POST['text_areas_of_study_153']));
    if (isset($_POST['text_areas_of_study_154'])) update_post_meta($post_id, 'text_areas_of_study_154', wp_kses_post($_POST['text_areas_of_study_154']));
    if (isset($_POST['text_areas_of_study_155'])) update_post_meta($post_id, 'text_areas_of_study_155', wp_kses_post($_POST['text_areas_of_study_155']));
    if (isset($_POST['text_areas_of_study_156'])) update_post_meta($post_id, 'text_areas_of_study_156', wp_kses_post($_POST['text_areas_of_study_156']));
    if (isset($_POST['text_areas_of_study_157'])) update_post_meta($post_id, 'text_areas_of_study_157', wp_kses_post($_POST['text_areas_of_study_157']));
    if (isset($_POST['text_areas_of_study_158'])) update_post_meta($post_id, 'text_areas_of_study_158', wp_kses_post($_POST['text_areas_of_study_158']));
    if (isset($_POST['text_areas_of_study_159'])) update_post_meta($post_id, 'text_areas_of_study_159', wp_kses_post($_POST['text_areas_of_study_159']));
    if (isset($_POST['text_areas_of_study_160'])) update_post_meta($post_id, 'text_areas_of_study_160', wp_kses_post($_POST['text_areas_of_study_160']));
    if (isset($_POST['text_areas_of_study_161'])) update_post_meta($post_id, 'text_areas_of_study_161', wp_kses_post($_POST['text_areas_of_study_161']));
    if (isset($_POST['text_areas_of_study_162'])) update_post_meta($post_id, 'text_areas_of_study_162', wp_kses_post($_POST['text_areas_of_study_162']));
    if (isset($_POST['text_areas_of_study_163'])) update_post_meta($post_id, 'text_areas_of_study_163', wp_kses_post($_POST['text_areas_of_study_163']));
    if (isset($_POST['text_areas_of_study_164'])) update_post_meta($post_id, 'text_areas_of_study_164', wp_kses_post($_POST['text_areas_of_study_164']));
    if (isset($_POST['text_areas_of_study_165'])) update_post_meta($post_id, 'text_areas_of_study_165', wp_kses_post($_POST['text_areas_of_study_165']));
    if (isset($_POST['text_areas_of_study_166'])) update_post_meta($post_id, 'text_areas_of_study_166', wp_kses_post($_POST['text_areas_of_study_166']));
    if (isset($_POST['text_areas_of_study_167'])) update_post_meta($post_id, 'text_areas_of_study_167', wp_kses_post($_POST['text_areas_of_study_167']));
    if (isset($_POST['text_areas_of_study_168'])) update_post_meta($post_id, 'text_areas_of_study_168', wp_kses_post($_POST['text_areas_of_study_168']));
    if (isset($_POST['text_areas_of_study_169'])) update_post_meta($post_id, 'text_areas_of_study_169', wp_kses_post($_POST['text_areas_of_study_169']));
    if (isset($_POST['text_areas_of_study_170'])) update_post_meta($post_id, 'text_areas_of_study_170', wp_kses_post($_POST['text_areas_of_study_170']));
    if (isset($_POST['text_areas_of_study_171'])) update_post_meta($post_id, 'text_areas_of_study_171', wp_kses_post($_POST['text_areas_of_study_171']));
    if (isset($_POST['text_areas_of_study_172'])) update_post_meta($post_id, 'text_areas_of_study_172', wp_kses_post($_POST['text_areas_of_study_172']));
    if (isset($_POST['text_areas_of_study_173'])) update_post_meta($post_id, 'text_areas_of_study_173', wp_kses_post($_POST['text_areas_of_study_173']));
    if (isset($_POST['text_areas_of_study_174'])) update_post_meta($post_id, 'text_areas_of_study_174', wp_kses_post($_POST['text_areas_of_study_174']));
    if (isset($_POST['text_areas_of_study_175'])) update_post_meta($post_id, 'text_areas_of_study_175', wp_kses_post($_POST['text_areas_of_study_175']));
    if (isset($_POST['text_areas_of_study_176'])) update_post_meta($post_id, 'text_areas_of_study_176', wp_kses_post($_POST['text_areas_of_study_176']));
    if (isset($_POST['text_areas_of_study_177'])) update_post_meta($post_id, 'text_areas_of_study_177', wp_kses_post($_POST['text_areas_of_study_177']));
    if (isset($_POST['text_areas_of_study_178'])) update_post_meta($post_id, 'text_areas_of_study_178', wp_kses_post($_POST['text_areas_of_study_178']));
    if (isset($_POST['text_areas_of_study_179'])) update_post_meta($post_id, 'text_areas_of_study_179', wp_kses_post($_POST['text_areas_of_study_179']));
    if (isset($_POST['text_areas_of_study_180'])) update_post_meta($post_id, 'text_areas_of_study_180', wp_kses_post($_POST['text_areas_of_study_180']));
    if (isset($_POST['text_areas_of_study_181'])) update_post_meta($post_id, 'text_areas_of_study_181', sanitize_text_field($_POST['text_areas_of_study_181']));
    if (isset($_POST['text_areas_of_study_182'])) update_post_meta($post_id, 'text_areas_of_study_182', wp_kses_post($_POST['text_areas_of_study_182']));
    if (isset($_POST['text_areas_of_study_183'])) update_post_meta($post_id, 'text_areas_of_study_183', sanitize_text_field($_POST['text_areas_of_study_183']));
    if (isset($_POST['text_areas_of_study_184'])) update_post_meta($post_id, 'text_areas_of_study_184', wp_kses_post($_POST['text_areas_of_study_184']));
    if (isset($_POST['text_areas_of_study_185'])) update_post_meta($post_id, 'text_areas_of_study_185', sanitize_text_field($_POST['text_areas_of_study_185']));
    if (isset($_POST['text_areas_of_study_186'])) update_post_meta($post_id, 'text_areas_of_study_186', sanitize_text_field($_POST['text_areas_of_study_186']));
    if (isset($_POST['text_areas_of_study_187'])) update_post_meta($post_id, 'text_areas_of_study_187', sanitize_text_field($_POST['text_areas_of_study_187']));
    if (isset($_POST['text_areas_of_study_188'])) update_post_meta($post_id, 'text_areas_of_study_188', sanitize_text_field($_POST['text_areas_of_study_188']));
    if (isset($_POST['text_areas_of_study_189'])) update_post_meta($post_id, 'text_areas_of_study_189', sanitize_text_field($_POST['text_areas_of_study_189']));
    if (isset($_POST['text_areas_of_study_190'])) update_post_meta($post_id, 'text_areas_of_study_190', sanitize_text_field($_POST['text_areas_of_study_190']));
    if (isset($_POST['text_areas_of_study_191'])) update_post_meta($post_id, 'text_areas_of_study_191', wp_kses_post($_POST['text_areas_of_study_191']));
    if (isset($_POST['text_areas_of_study_192'])) update_post_meta($post_id, 'text_areas_of_study_192', sanitize_text_field($_POST['text_areas_of_study_192']));
    if (isset($_POST['text_areas_of_study_193'])) update_post_meta($post_id, 'text_areas_of_study_193', wp_kses_post($_POST['text_areas_of_study_193']));
    if (isset($_POST['text_areas_of_study_194'])) update_post_meta($post_id, 'text_areas_of_study_194', sanitize_text_field($_POST['text_areas_of_study_194']));
    if (isset($_POST['text_areas_of_study_195'])) update_post_meta($post_id, 'text_areas_of_study_195', sanitize_text_field($_POST['text_areas_of_study_195']));
    if (isset($_POST['text_areas_of_study_196'])) update_post_meta($post_id, 'text_areas_of_study_196', sanitize_text_field($_POST['text_areas_of_study_196']));
    if (isset($_POST['text_areas_of_study_197'])) update_post_meta($post_id, 'text_areas_of_study_197', sanitize_text_field($_POST['text_areas_of_study_197']));
    if (isset($_POST['text_areas_of_study_198'])) update_post_meta($post_id, 'text_areas_of_study_198', sanitize_text_field($_POST['text_areas_of_study_198']));
    if (isset($_POST['text_areas_of_study_199'])) update_post_meta($post_id, 'text_areas_of_study_199', sanitize_text_field($_POST['text_areas_of_study_199']));
    if (isset($_POST['text_areas_of_study_200'])) update_post_meta($post_id, 'text_areas_of_study_200', wp_kses_post($_POST['text_areas_of_study_200']));
    if (isset($_POST['text_areas_of_study_201'])) update_post_meta($post_id, 'text_areas_of_study_201', sanitize_text_field($_POST['text_areas_of_study_201']));
    if (isset($_POST['text_areas_of_study_202'])) update_post_meta($post_id, 'text_areas_of_study_202', wp_kses_post($_POST['text_areas_of_study_202']));
    if (isset($_POST['text_areas_of_study_203'])) update_post_meta($post_id, 'text_areas_of_study_203', sanitize_text_field($_POST['text_areas_of_study_203']));
    if (isset($_POST['text_areas_of_study_204'])) update_post_meta($post_id, 'text_areas_of_study_204', sanitize_text_field($_POST['text_areas_of_study_204']));
    if (isset($_POST['text_areas_of_study_205'])) update_post_meta($post_id, 'text_areas_of_study_205', sanitize_text_field($_POST['text_areas_of_study_205']));
    if (isset($_POST['text_areas_of_study_206'])) update_post_meta($post_id, 'text_areas_of_study_206', sanitize_text_field($_POST['text_areas_of_study_206']));
    if (isset($_POST['text_areas_of_study_207'])) update_post_meta($post_id, 'text_areas_of_study_207', wp_kses_post($_POST['text_areas_of_study_207']));
    if (isset($_POST['text_areas_of_study_208'])) update_post_meta($post_id, 'text_areas_of_study_208', sanitize_text_field($_POST['text_areas_of_study_208']));
    if (isset($_POST['text_areas_of_study_209'])) update_post_meta($post_id, 'text_areas_of_study_209', wp_kses_post($_POST['text_areas_of_study_209']));
    if (isset($_POST['text_areas_of_study_210'])) update_post_meta($post_id, 'text_areas_of_study_210', sanitize_text_field($_POST['text_areas_of_study_210']));
    if (isset($_POST['text_areas_of_study_211'])) update_post_meta($post_id, 'text_areas_of_study_211', sanitize_text_field($_POST['text_areas_of_study_211']));
    if (isset($_POST['text_areas_of_study_212'])) update_post_meta($post_id, 'text_areas_of_study_212', sanitize_text_field($_POST['text_areas_of_study_212']));
    if (isset($_POST['text_areas_of_study_213'])) update_post_meta($post_id, 'text_areas_of_study_213', wp_kses_post($_POST['text_areas_of_study_213']));
    if (isset($_POST['text_areas_of_study_214'])) update_post_meta($post_id, 'text_areas_of_study_214', wp_kses_post($_POST['text_areas_of_study_214']));
    if (isset($_POST['text_areas_of_study_215'])) update_post_meta($post_id, 'text_areas_of_study_215', wp_kses_post($_POST['text_areas_of_study_215']));
    if (isset($_POST['text_areas_of_study_216'])) update_post_meta($post_id, 'text_areas_of_study_216', wp_kses_post($_POST['text_areas_of_study_216']));
    if (isset($_POST['text_areas_of_study_217'])) update_post_meta($post_id, 'text_areas_of_study_217', wp_kses_post($_POST['text_areas_of_study_217']));
    if (isset($_POST['text_areas_of_study_218'])) update_post_meta($post_id, 'text_areas_of_study_218', wp_kses_post($_POST['text_areas_of_study_218']));
    if (isset($_POST['text_areas_of_study_219'])) update_post_meta($post_id, 'text_areas_of_study_219', wp_kses_post($_POST['text_areas_of_study_219']));
    if (isset($_POST['text_areas_of_study_220'])) update_post_meta($post_id, 'text_areas_of_study_220', wp_kses_post($_POST['text_areas_of_study_220']));
    if (isset($_POST['text_areas_of_study_221'])) update_post_meta($post_id, 'text_areas_of_study_221', wp_kses_post($_POST['text_areas_of_study_221']));
    if (isset($_POST['text_final_cta_1'])) update_post_meta($post_id, 'text_final_cta_1', sanitize_text_field($_POST['text_final_cta_1']));
    if (isset($_POST['text_final_cta_2'])) update_post_meta($post_id, 'text_final_cta_2', wp_kses_post($_POST['text_final_cta_2']));
    if (isset($_POST['text_final_cta_3'])) update_post_meta($post_id, 'text_final_cta_3', sanitize_text_field($_POST['text_final_cta_3']));
    if (isset($_POST['text_final_cta_4'])) update_post_meta($post_id, 'text_final_cta_4', wp_kses_post($_POST['text_final_cta_4']));
    if (isset($_POST['text_final_cta_5'])) update_post_meta($post_id, 'text_final_cta_5', sanitize_text_field($_POST['text_final_cta_5']));
    if (isset($_POST['text_final_cta_6'])) update_post_meta($post_id, 'text_final_cta_6', wp_kses_post($_POST['text_final_cta_6']));
}
add_action('save_post', 'uottawa_save_meta_boxes');


function uottawa_landing_page_shortcode($atts) {
    global $post;
    $post_id = $post ? $post->ID : 0;
    ob_start();
    ?>
    <div class="uottawa-lp uottawa-landing-wrap">
    

<section class="hero">
  <div class="container hero-content">
    <h1><?php echo wp_kses_post(get_post_meta($post_id, 'text_general_1', true) ?: 'Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated)'); ?></h1>
    <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_general_2', true) ?: 'Build on your college diploma &amp; sharpen the human skills the AI era rewards.'); ?></p>
  </div>
</section>

<section class="stats">
 <div class="container">
  <div class="stats-grid">
    <div class="stat">
      <div class="label"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_1', true) ?: 'Delivery'); ?></div>
      <div class="value"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_2', true) ?: '100% online'); ?></div>
    </div>
    <div class="stat">
      <div class="label"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_3', true) ?: 'Admission pathways'); ?></div>
      <div class="value"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_4', true) ?: '2-year or 3-year accredited Canadian college diploma*'); ?></div>
    </div>
    <div class="stat">
      <div class="label"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_5', true) ?: 'Program length'); ?></div>
      <div class="value"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_6', true) ?: '20-28 months**'); ?></div>
    </div>
    <div class="stat">
      <div class="label"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_7', true) ?: 'Designed for'); ?></div>
      <div class="value"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_8', true) ?: 'College-credentialed adults with 3+ years of work or professional experience.'); ?></div>
    </div>
    <div class="stat">
      <div class="label"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_9', true) ?: 'Language of delivery'); ?></div>
      <div class="value"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_10', true) ?: 'English'); ?></div>
    </div>
  </div>

  <div class="footnotes"><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_11', true) ?: '*Your existing college credential determines your uOttawa learning pathway.'); ?><br><?php echo wp_kses_post(get_post_meta($post_id, 'text_info_grid_12', true) ?: '**Based on your existing college credential'); ?></div>
 </div>
</section>

<section class="why">
 <div class="container">

  <div class="why-content">
    <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_1', true) ?: 'Why choose uOttawa&rsquo;s Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated)?'); ?></h2>
    <div class="rule"></div>
    <ul>
      <li><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_2', true) ?: 'Respected degree:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_3', true) ?: 'Earn a uOttawa degree, 100% online.'); ?></li>
      <li><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_4', true) ?: 'Future-proof skills:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_5', true) ?: 'Build human capabilities AI can&rsquo;t replace.'); ?></li>
      <li><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_6', true) ?: 'In-demand competencies:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_7', true) ?: 'Strengthen critical thinking, communication, adaptability, and creativity.'); ?></li>
      <li><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_8', true) ?: 'Advanced analysis:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_9', true) ?: 'Learn to interpret, question, and apply information.'); ?></li>
      <li><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_10', true) ?: 'Transferable expertise:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_11', true) ?: 'Gain skills applicable across industries and roles.'); ?></li>
      <li><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_12', true) ?: 'Accelerated path:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_13', true) ?: 'Complete your degree in less time using credits from your existing college diploma.'); ?></li>
    </ul>
  </div>

  <?php 
  $form_shortcode = get_post_meta($post_id, 'forminator_shortcode', true);
  if ($form_shortcode): 
  ?>
  <div class="card forminator-card-wrapper">
    <h3><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_14', true) ?: 'Strengthen the skills'); ?><br><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_15', true) ?: 'AI can&rsquo;t replace.'); ?></h3>
    <p class="sub"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_16', true) ?: 'Request more info.'); ?></p>
    <?php echo do_shortcode($form_shortcode); ?>
    <p class="disclaimer"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_25', true) ?: 'By submitting this form, you agree to be contacted by uOttawa Online or its representatives about this program.'); ?></p>
  </div>
  <?php else: ?>
  <form class="card" onsubmit="return false;">
    <h3><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_14', true) ?: 'Strengthen the skills'); ?><br><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_15', true) ?: 'AI can&rsquo;t replace.'); ?></h3>
    <p class="sub"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_16', true) ?: 'Request more info.'); ?></p>

    <div class="field field-row">
      <div>
        <label for="fname"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_17', true) ?: 'First name'); ?></label>
        <input id="fname" type="text" autocomplete="given-name">
      </div>
      <div>
        <label for="lname"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_18', true) ?: 'Last name'); ?></label>
        <input id="lname" type="text" autocomplete="family-name">
      </div>
    </div>

    <div class="field field-row">
      <div>
        <label for="email"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_19', true) ?: 'Email'); ?></label>
        <input id="email" type="email" autocomplete="email">
      </div>
      <div>
        <label for="phone"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_20', true) ?: 'Phone'); ?></label>
        <input id="phone" type="tel" autocomplete="tel">
      </div>
    </div>

    <div class="field">
      <label for="province"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_21', true) ?: 'Province'); ?></label>
      <input id="province" type="text">
    </div>

    <div class="field">
      <label for="credential"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_22', true) ?: 'College credential'); ?></label>
      <input id="credential" type="text">
    </div>

    <div class="field">
      <label for="start"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_23', true) ?: 'Preferred start'); ?></label>
      <input id="start" type="text">
    </div>

    <button class="submit" type="submit"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_24', true) ?: 'Get program details'); ?></button>

    <p class="disclaimer"><?php echo wp_kses_post(get_post_meta($post_id, 'text_why_uottawa_25', true) ?: 'By submitting this form, you agree to be contacted by uOttawa Online or its representatives about this program.'); ?></p>
  </form>
  <?php endif; ?>

 </div>
</section>

<!-- ---------- TABS ---------- -->
<div class="tabs-wrap">
<div class="nav-bg">
<nav class="tabbar" id="tabbar">
  <button class="active" data-tab="overview"><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_1', true) ?: 'Overview'); ?></button>
  <button data-tab="insights"><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_1', true) ?: 'Program insights'); ?></button>
  <button data-tab="outcomes"><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_2', true) ?: 'Career &amp; learning outcomes'); ?></button>
  <button data-tab="admissions"><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_1', true) ?: 'Admissions'); ?></button>
  <button data-tab="faq"><?php echo wp_kses_post(get_post_meta($post_id, 'text_faq_1', true) ?: 'FAQ'); ?></button>
</nav>
</div>

<!-- ---------- OVERVIEW PANEL ---------- -->
<section class="panel active" id="overview">
 <div class="container">

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_2', true) ?: 'Overview'); ?></h2>
  <div class="rule"></div>

  <div class="split">
    <div>
      <h3><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_3', true) ?: 'Your thinking. Your work. Your future.'); ?></h3>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_4', true) ?: 'uOttawa Online&rsquo;s Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) offers unparalleled opportunities to discover your passions while staying focused on real-world relevance and long-term career goals.'); ?></p>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_5', true) ?: 'The program is rooted in the Faculty of Arts&rsquo; Human Intelligence perspective: the idea that human capacities matter more, not less, in the future of work shaped by AI, automation and rapid change.'); ?></p>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_6', true) ?: 'This degree elevates essential human capacities including critical thinking, judgement, creativity, empathy and communication. Developing these strengths provides the agility to interpret complex information, lead through uncertainty and thrive in a rapidly changing world.'); ?></p>
    </div>
    <img src="<?php echo esc_url(get_post_meta($post_id, 'img_overview_7', true) ?: 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=940&q=80'); ?>" alt="Student working at a desk">
  </div>

  <div class="split reverse">
    <img src="<?php echo esc_url(get_post_meta($post_id, 'img_overview_8', true) ?: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=930&q=80'); ?>" alt="Student holding a laptop">
    <div>
      <h3><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_9', true) ?: 'Who is this program made for?'); ?></h3>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_10', true) ?: 'The program is designed for working adults across Canada who hold a 2-year or 3-year college diploma, have 3+ years of work experience and are ready to build on that foundation.'); ?></p>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_11', true) ?: 'The Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) is a strong fit for professionals in healthcare, education, technology, the trades, the not-for-profit sector, the public sector and other fields where a bachelor\'s degree can support career growth. It is particularly useful for those whose next career step is gated by a credential they don\'t yet hold.'); ?></p>
    </div>
  </div>

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_12', true) ?: 'The uOttawa online difference'); ?></h2>
  <div class="rule"></div>

  <div class="cards">
    <div class="fcard garnet">
      <svg width="107" height="111" viewBox="0 0 1600 1600" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
<g id="noun-diploma-5482365-FFFFFF 1">
<path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M716.04 1064.17V1186.55C657.237 1192.73 587.904 1200.01 587.904 1200.01C576.378 1201.21 568.003 1211.56 569.201 1223.06C570.415 1234.58 580.743 1242.96 592.269 1241.76C592.269 1241.76 775.829 1222.51 798.909 1220.08C799.623 1220 800.378 1220 801.092 1220.08L1170.89 1259C1196.44 1261.7 1220.18 1245.52 1227.01 1220.75C1227.03 1220.69 1227.05 1220.6 1227.05 1220.54C1243.92 1156.73 1245.54 1092.95 1227.3 1029.18C1227.28 1029.12 1227.26 1029.04 1227.24 1028.97C1220.05 1004.85 1196.71 989.297 1171.69 991.922C1089.86 1000.3 833.155 1027.31 801.089 1030.69C800.375 1030.78 799.62 1030.78 798.906 1030.69L427.867 991.625C403.055 989.021 379.84 1004.22 372.325 1028C372.283 1028.11 372.263 1028.21 372.221 1028.32C352.95 1092.7 354.752 1157.02 372.935 1221.32C372.955 1221.39 372.976 1221.43 372.976 1221.49C380.049 1245.78 403.518 1261.52 428.664 1258.87C438.784 1257.83 466.284 1254.97 466.284 1254.97C477.81 1253.78 486.206 1243.45 485.008 1231.92C483.816 1220.4 473.487 1212.02 461.962 1213.22L424.279 1217.13C419.367 1217.65 414.768 1214.6 413.32 1209.88C397.367 1153.41 395.518 1097.03 412.378 1040.56C413.93 1035.86 418.529 1032.88 423.461 1033.38L716.04 1064.17ZM883.973 1186.59L1175.31 1217.25C1180.38 1217.79 1185.13 1214.58 1186.52 1209.67C1201.35 1153.36 1203.04 1097.13 1186.95 1040.81C1185.48 1036.15 1180.95 1033.17 1176.08 1033.67H1176.04C1118.67 1039.55 975.534 1054.56 883.974 1064.2L883.973 1186.59ZM758.02 1068.6V1182.17L794.504 1178.32C798.155 1177.95 801.848 1177.95 805.504 1178.32L841.988 1182.17V1068.6C824.165 1070.47 811.233 1071.83 805.504 1072.44C801.848 1072.82 798.155 1072.82 794.504 1072.44L758.02 1068.6Z" fill="white"/>
<path id="Vector_2" fill-rule="evenodd" clip-rule="evenodd" d="M485.12 581.36V880.333C485.12 904.052 501.016 924.812 523.896 931.005C523.917 931.005 523.959 931.026 523.979 931.026C708.033 980.042 892.099 980.526 1076.15 931.005C1076.17 931.005 1076.22 931.005 1076.24 930.985C1099.03 924.75 1114.84 904.053 1114.84 880.417C1114.86 829.11 1114.88 688.59 1114.88 581.363L1156.87 568.743V715.863C1156.87 727.452 1166.27 736.853 1177.85 736.853C1189.44 736.853 1198.85 727.452 1198.85 715.863V556.117L1231.98 546.164C1249.74 540.836 1261.87 524.481 1261.87 505.945C1261.87 487.429 1249.74 471.076 1231.98 465.748C1111.44 429.513 865.522 355.56 815.175 340.425C805.263 337.461 794.727 337.461 784.82 340.425L741.471 353.461C730.388 356.8 724.064 368.513 727.403 379.617C730.742 390.701 742.455 396.997 753.559 393.68L796.908 380.644C798.924 380.034 801.065 380.034 803.08 380.644L1219.88 505.946L1175.9 519.191L880.102 486.718C876.93 479.036 871.81 471.879 864.946 465.644C850.232 452.27 826.738 442.972 799.998 442.972C773.252 442.972 749.763 452.269 735.044 465.644C722.721 476.853 716.028 490.978 716.028 505.947C716.028 520.917 722.721 535.062 735.044 546.275C749.763 559.644 773.252 568.926 799.998 568.926C826.738 568.926 850.232 559.645 864.946 546.275C870.716 541.004 875.274 535.103 878.467 528.764L1073 550.114L803.08 631.27C801.065 631.879 798.924 631.879 796.908 631.27L380.108 505.947L690.588 412.619C701.672 409.281 707.99 397.546 704.651 386.463C701.312 375.354 689.599 369.057 678.495 372.395C678.495 372.395 437.175 444.969 368.015 465.75C350.26 471.078 338.124 487.433 338.124 505.947C338.124 524.483 350.26 540.838 368.015 546.166L485.12 581.36ZM527.104 593.975V880.348C527.104 885.072 530.276 889.228 534.854 890.462C711.627 937.53 888.401 938.03 1065.17 890.483C1069.71 889.228 1072.86 885.114 1072.86 880.41V880.39C1072.88 831.078 1072.9 699.349 1072.9 593.976L815.178 671.476C805.266 674.44 794.73 674.44 784.823 671.476L527.104 593.975ZM841.984 505.871V506.037C841.916 511.058 837.807 514.876 832.869 518.152C824.474 523.756 812.801 526.928 800 526.928C787.193 526.928 775.521 523.756 767.125 518.152C762.151 514.855 758.016 510.99 758.016 505.933C758.016 500.897 762.152 497.032 767.125 493.735C775.521 488.131 787.193 484.943 800 484.943C812.802 484.943 824.473 488.131 832.869 493.735C837.828 497.032 841.942 500.855 841.984 505.871Z" fill="white"/>
<path id="Vector_3" fill-rule="evenodd" clip-rule="evenodd" d="M548.093 1227.52C548.093 1239.11 538.692 1248.51 527.099 1248.51C515.505 1248.51 506.109 1239.11 506.109 1227.52C506.109 1215.93 515.505 1206.53 527.099 1206.53C538.692 1206.53 548.093 1215.93 548.093 1227.52Z" fill="white"/>
</g>
</svg>
      <h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_13', true) ?: 'Turn your college diploma into a uOttawa degree'); ?></h4>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_14', true) ?: 'Build on your 2-year or 3-year diploma and earn a respected credential from a U15 research university, 100% online.'); ?></p>
    </div>

    <div class="fcard">
      <svg width="81" height="77" viewBox="0 0 81 77" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
<g id="noun-opinion-8062850-FFFFFF 1">
<path id="Vector" d="M37.7447 15.4456L33.1884 19.3316L37.8522 23.308C38.2066 23.6118 38.3901 24.0298 38.3901 24.4509L38.3965 28.7761C38.3965 29.7085 38.7983 30.5567 39.4438 31.1703C40.0893 31.7839 40.9847 32.1659 41.9624 32.1659H72.4035C73.3843 32.1659 74.2766 31.7839 74.9221 31.1703C75.5675 30.5567 75.9694 29.7085 75.9694 28.7761V9.88096C75.9694 8.94855 75.5676 8.10033 74.9221 7.48677C74.2766 6.87321 73.3812 6.49116 72.4035 6.49116H41.9624C40.9783 6.49116 40.0861 6.87315 39.4406 7.48376C38.7983 8.10036 38.3965 8.94855 38.3965 9.88096V14.2092C38.3965 14.7145 38.1402 15.1626 37.7447 15.4454L37.7447 15.4456ZM11.7767 65.1073L11.7736 67.4294C11.7799 68.2776 12.1438 69.0506 12.7259 69.6041C13.3144 70.1635 14.1244 70.5094 15.0167 70.5094H15.8394V51.3287H11.7767L11.7736 65.1104L11.7767 65.1073ZM19.0823 70.5094H19.9049C20.7972 70.5094 21.6104 70.1635 22.1926 69.6101C22.7811 69.0506 23.1449 68.2806 23.1449 67.4324V51.3285H19.0823V70.5094ZM8.5428 67.4294L8.53963 51.3255H5.73312C4.65103 51.3255 3.66701 50.9044 2.94874 50.2247L2.94242 50.2186C2.22732 49.5389 1.78439 48.6004 1.78439 47.5748V37.7605C1.78439 35.3723 2.37606 33.1134 3.4297 31.1103C4.51814 29.0379 6.11282 27.2332 8.05237 25.8466C8.70733 25.3804 9.61857 25.4586 10.1754 26C11.1373 26.8362 12.27 27.5129 13.5199 27.9761C14.7317 28.4273 16.0638 28.677 17.4591 28.677C18.8576 28.677 20.1865 28.4273 21.3983 27.9761C22.6735 27.5009 23.8252 26.8061 24.8029 25.9489C25.3851 25.4375 26.2552 25.4105 26.8658 25.8466C28.8054 27.2332 30.4001 29.0349 31.4885 31.1102C32.5421 33.1135 33.1338 35.3723 33.1338 37.7605V47.5748C33.1338 48.6034 32.6908 49.5389 31.9758 50.2216L31.9663 50.2307C31.2512 50.9105 30.264 51.3285 29.1851 51.3285H26.3786V67.4324C26.3786 69.1198 25.6509 70.6568 24.4801 71.7757L24.4706 71.7847C23.2936 72.9007 21.6768 73.5924 19.8986 73.5924H15.0101C13.2351 73.5924 11.6182 72.9007 10.4412 71.7878L10.4317 71.7787C9.25779 70.6598 8.53008 69.1228 8.53325 67.4325L8.5428 67.4294ZM23.1444 48.2455V39.0087C23.1444 38.1575 23.8689 37.4687 24.7644 37.4687C25.6599 37.4687 26.3844 38.1575 26.3844 39.0087V48.2455H29.1909C29.3903 48.2455 29.5674 48.1703 29.6908 48.053C29.8206 47.9297 29.8997 47.7612 29.8997 47.5748V37.7605C29.8997 35.8626 29.4282 34.0669 28.5961 32.4817C27.919 31.1914 27.0014 30.0364 25.9035 29.0709C24.891 29.7988 23.774 30.3973 22.5812 30.8395C20.9897 31.432 19.2621 31.7568 17.4649 31.7568C15.6677 31.7568 13.9401 31.429 12.3486 30.8395C11.1557 30.3943 10.0388 29.7957 9.0263 29.0709C7.92835 30.0364 7.01399 31.1914 6.33366 32.4817C5.50152 34.0668 5.0301 35.8595 5.0301 37.7605V47.5748C5.0301 47.7612 5.10604 47.9327 5.2326 48.05C5.36233 48.1733 5.53951 48.2485 5.73568 48.2485H8.5422V39.0117C8.5422 38.1605 9.26674 37.4717 10.1622 37.4717C11.0577 37.4717 11.7822 38.1605 11.7822 39.0117V48.2485H23.1438L23.1444 48.2455ZM17.4617 9.24629C20.1195 9.24629 22.5274 10.2719 24.2711 11.9292C26.0145 13.5865 27.0934 15.8755 27.0934 18.4024C27.0934 20.9292 26.0145 23.2179 24.2711 24.8755C22.5277 26.5328 20.1199 27.5584 17.4617 27.5584C14.8036 27.5584 12.396 26.5328 10.6523 24.8755C8.90892 23.2182 7.83 20.9292 7.83 18.4024C7.83 15.8755 8.90892 13.5868 10.6523 11.9292C12.3957 10.2719 14.8036 9.24629 17.4617 9.24629ZM21.98 14.1069C20.8252 13.0091 19.2273 12.3293 17.4617 12.3293C15.6961 12.3293 14.0983 13.0091 12.9434 14.1069C11.7885 15.2047 11.0734 16.7237 11.0734 18.4021C11.0734 20.0805 11.7885 21.5994 12.9434 22.6973C14.0983 23.7951 15.6961 24.4749 17.4617 24.4749C19.2273 24.4749 20.8251 23.7951 21.98 22.6973C23.1349 21.5995 23.85 20.0805 23.85 18.4021C23.85 16.7237 23.1349 15.2048 21.98 14.1069ZM67.0964 16.832C68.6024 16.832 69.8238 17.993 69.8238 19.4247C69.8238 20.8564 68.6024 22.0174 67.0964 22.0174C65.5903 22.0174 64.3689 20.8564 64.3689 19.4247C64.3689 17.993 65.5903 16.832 67.0964 16.832ZM57.1867 16.832C58.6927 16.832 59.9141 17.993 59.9141 19.4247C59.9141 20.8564 58.6927 22.0174 57.1867 22.0174C55.6806 22.0174 54.4593 20.8564 54.4593 19.4247C54.4593 17.993 55.6806 16.832 57.1867 16.832ZM47.277 16.832C48.7831 16.832 50.0044 17.993 50.0044 19.4247C50.0044 20.8564 48.7831 22.0174 47.277 22.0174C45.7709 22.0174 44.5496 20.8564 44.5496 19.4247C44.5496 17.993 45.7709 16.832 47.277 16.832ZM29.6973 18.1916L35.1585 13.5355V9.88706C35.1585 8.10643 35.9242 6.48821 37.1581 5.31518C38.3985 4.14215 40.1007 3.41424 41.9675 3.41424H72.4087C74.2818 3.41424 75.9841 4.14215 77.218 5.31518C78.452 6.48821 79.2177 8.10643 79.2177 9.88706V28.7822C79.2177 30.5628 78.452 32.1811 77.218 33.3541C75.9841 34.5271 74.2818 35.255 72.4087 35.255H41.9675C40.0944 35.255 38.3889 34.5271 37.1581 33.3541C35.9242 32.1811 35.1585 30.5628 35.1585 28.7822V25.1368L29.5707 20.3603C28.9759 19.7287 29.0328 18.7601 29.6973 18.1947V18.1916Z" fill="white"/>
</g>
</svg>
      <h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_15', true) ?: 'Learn from a Faculty leading the AI-era skills conversation'); ?></h4>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_16', true) ?: 'Our Faculty of Arts is a leading Canadian voice on what a liberal arts education means in an age of artificial intelligence.'); ?></p>
    </div>

    <div class="fcard">
      <svg width="81" height="81" viewBox="0 0 81 81" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
<g id="noun-briefcase-2518702-FFFFFF 1">
<path id="Vector" d="M30.3554 10.1513C28.3689 10.1513 26.7371 11.7829 26.7371 13.7686V19.2978C26.7371 20.2676 27.5387 21.0755 28.5105 21.0755C29.4845 21.0755 30.2882 20.2719 30.2882 19.2978V13.7686C30.2882 13.7196 30.3074 13.7014 30.3554 13.7014H50.6345C50.6835 13.7014 50.7017 13.7207 50.7017 13.7686V19.2978C50.7017 20.2676 51.5033 21.0755 52.4751 21.0755H52.4793C53.4534 21.0755 54.257 20.2697 54.257 19.2978V13.7686C54.257 11.7821 52.6254 10.1513 50.6387 10.1513H30.3554ZM8.23702 23.0539C6.2505 23.0539 4.61869 24.6856 4.61869 26.6723V35.8145C4.61869 35.8145 4.62291 35.8316 4.62291 35.8358V35.8443V35.8527V67.2308C4.62291 69.2173 6.25452 70.8491 8.24124 70.8491H72.7631C74.7497 70.8491 76.3815 69.2175 76.3815 67.2308V26.672C76.3815 24.6855 74.7499 23.0537 72.7631 23.0537L8.23702 23.0539ZM8.23702 26.6051H72.7589C72.808 26.6051 72.8262 26.6243 72.8262 26.6723V35.8145V35.8229C72.8241 35.8933 72.7312 36.1929 72.3518 36.6053C71.9682 37.0219 71.3446 37.5249 70.5198 38.0494C68.87 39.0991 66.4261 40.2492 63.4377 41.2968C57.4619 43.3922 49.2998 45.0974 40.7314 45.0974C32.0401 45.0974 23.7619 43.3922 17.7004 41.2968C14.6692 40.2492 12.1891 39.1001 10.515 38.0494C9.67732 37.5239 9.04424 37.0177 8.65403 36.6011C8.26406 36.1845 8.17124 35.8763 8.17124 35.8146V26.6724C8.17124 26.6233 8.19049 26.6051 8.23848 26.6051L8.23702 26.6051ZM8.17005 40.5938C10.9623 42.5697 15.13 44.3943 20.2478 45.8311C26.2643 47.5204 33.4529 48.65 40.7314 48.65C47.9073 48.65 54.9935 47.5267 60.9274 45.8395C65.9643 44.408 70.0689 42.5879 72.8303 40.6193V67.2312C72.8303 67.2803 72.8111 67.2985 72.7631 67.2985H8.23714C8.1881 67.2985 8.1699 67.2792 8.1699 67.2312L8.17005 40.5938ZM35.1269 53.3749C34.1505 53.2789 33.283 54.0037 33.1989 54.9907C33.118 55.9541 33.847 56.8237 34.8147 56.906C36.8226 57.0766 38.8104 57.1639 40.7268 57.1639C42.4887 57.1639 44.3143 57.0893 46.1603 56.9474C47.13 56.8738 47.8742 56.0117 47.7963 55.0408C47.7207 54.0976 46.8616 53.3175 45.8768 53.4092C42.2167 53.6937 38.7818 53.6842 35.1314 53.3762L35.1269 53.3749Z" fill="white"/>
</g>
</svg>
      <h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_17', true) ?: 'Designed for working adults'); ?></h4>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_18', true) ?: 'Study fully online with flexible pacing and dedicated advisors, so you can progress without pausing your career or relocating.'); ?></p>
    </div>
  </div>

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_19', true) ?: 'What sets this program apart'); ?></h2>
  <div class="rule"></div>

  <div class="cards">
    <div class="fcard">
      <svg width="69" height="69" viewBox="0 0 69 69" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
<g id="noun-think-8433505-FFFFFF 1">
<path id="Vector" d="M62.192 34.3304L56.7205 25.975C56.5157 25.622 56.3863 25.1934 56.3405 24.7136C55.2031 11.6065 44.4219 1.72569 31.2688 1.72569C17.3664 1.72569 6.05674 13.0273 6.05674 26.9245C6.05674 35.312 10.1563 43.7191 16.7972 49.0206V63.3323C16.7972 63.9846 17.2877 64.5344 17.9373 64.6072L41.9067 67.2702C41.9552 67.2756 42.0011 67.2756 42.0496 67.2756C42.3622 67.2756 42.6695 67.1624 42.9067 66.9494C43.1789 66.7042 43.3325 66.3591 43.3325 65.9926V55.8041H51.1842C54.1058 55.8041 56.4831 53.4269 56.4831 50.5052V41.3655H58.3968C60.0868 41.3655 61.5772 40.4788 62.3831 38.9937C63.1917 37.5005 63.1217 35.7593 62.1918 34.3308L62.192 34.3304ZM60.1274 37.7696C59.777 38.4137 59.1301 38.8019 58.397 38.8019H55.9766C54.8419 38.8019 53.92 39.7263 53.92 40.8611V50.505C53.92 52.0116 52.6937 53.2407 51.1843 53.2407H42.0499C41.341 53.2407 40.7669 53.8148 40.7669 54.5236V64.5637L19.3608 62.181V48.3919C19.3608 47.9903 19.1748 47.613 18.8568 47.3704C12.5445 42.5727 8.62008 34.7353 8.62008 26.9234C8.62008 14.4442 18.7815 4.29082 31.2688 4.29082C43.0793 4.29082 52.7611 13.1665 53.7858 24.95C53.872 25.8152 54.1119 26.5942 54.5404 27.3246L60.0443 35.7345C60.4486 36.3571 60.4809 37.1199 60.1278 37.7695L60.1274 37.7696Z" fill="white"/>
<path id="Vector_2" d="M45.6475 22.5975L43.9468 22.3522L43.6126 21.5437L44.6395 20.1691C45.5451 18.9535 45.4211 17.2285 44.3457 16.1584L42.3134 14.1262C41.2434 13.0507 39.5184 12.9241 38.3028 13.8351L36.9282 14.862L36.1196 14.525L35.8743 12.8243C35.6533 11.3257 34.3461 10.1964 32.8313 10.1964L29.9608 10.1991C28.4433 10.1991 27.1361 11.3311 26.9178 12.8324L26.6725 14.5277L25.8613 14.862L24.4867 13.8351C23.2738 12.9321 21.5488 13.0507 20.476 14.1262L18.4438 16.1584C17.371 17.2285 17.2444 18.9535 18.1527 20.1691L19.1823 21.541L18.8453 22.3522L17.1446 22.5975C15.6433 22.8185 14.514 24.1257 14.514 25.6405V28.5137C14.514 30.0285 15.6433 31.3357 17.1473 31.5567L18.8453 31.802L19.1823 32.6133L18.1527 33.9879C17.247 35.2062 17.371 36.9312 18.4464 38.0012L20.4787 40.0308C21.5514 41.1008 23.2764 41.2221 24.4894 40.3219V40.3192L25.8639 39.295L26.6752 39.6319L26.9205 41.3272C27.1388 42.8285 28.446 43.9606 29.9635 43.9606H32.8367C34.3515 43.9606 35.6587 42.8312 35.8797 41.3272L36.125 39.6319L36.9363 39.295L38.3109 40.3219C39.5238 41.2248 41.2488 41.1062 42.3215 40.0308L44.3538 37.9985C45.4265 36.9285 45.5532 35.2035 44.6449 33.9879L43.6126 32.6025L43.9441 31.802L45.6529 31.554C47.1542 31.3357 48.2836 30.0285 48.2836 28.5137L48.2782 25.6405C48.2782 24.1284 47.1488 22.8185 45.6475 22.5975ZM45.7149 28.5137C45.7149 28.7643 45.5262 28.98 45.281 29.015L42.8498 29.3681C42.3997 29.4328 42.0223 29.7293 41.8471 30.147L40.9577 32.2979C40.7852 32.7157 40.8444 33.1927 41.1167 33.5539L42.5829 35.5215C42.7339 35.7237 42.715 36.0094 42.5371 36.1845L40.5048 38.2141C40.3242 38.3974 40.0466 38.4163 39.8391 38.2653L37.8796 36.8045C37.5184 36.5323 37.036 36.4676 36.6209 36.6482L34.4673 37.5403C34.0496 37.7128 33.7531 38.0929 33.6884 38.543L33.338 40.958C33.3002 41.2114 33.09 41.3973 32.834 41.3973L29.9607 41.3946C29.7101 41.3946 29.4918 41.206 29.4567 40.958L29.1063 38.5403C29.0416 38.0902 28.7452 37.7128 28.3274 37.5376L26.1738 36.6454C26.0148 36.5781 25.8477 36.5484 25.6806 36.5484C25.4084 36.5484 25.1388 36.6347 24.9151 36.8018L22.9557 38.2599C22.7481 38.4136 22.4705 38.3947 22.2899 38.2114L20.2576 36.1818C20.0797 36.0039 20.0609 35.7209 20.2091 35.5188L21.6727 33.5593C21.9449 33.1954 22.0042 32.7184 21.8317 32.3006L20.9369 30.1443C20.7644 29.7239 20.3843 29.4274 19.9342 29.3627L17.5165 29.0123C17.2631 28.9745 17.0772 28.7643 17.0772 28.5083L17.0799 25.6404C17.0799 25.3871 17.2658 25.1741 17.5165 25.1364L19.9369 24.786C20.387 24.7213 20.7644 24.4249 20.9396 24.0044L21.8318 21.8508C22.007 21.4304 21.945 20.9533 21.6754 20.5894L20.2119 18.6299C20.0636 18.4304 20.0852 18.1447 20.2604 17.9669L22.2927 15.9346C22.4733 15.7594 22.7563 15.7405 22.9557 15.8861L24.9098 17.3523C25.271 17.6246 25.748 17.6865 26.1685 17.5113L28.3248 16.6165C28.7452 16.444 29.0417 16.064 29.1064 15.6138L29.4568 13.1961C29.4919 12.9482 29.7102 12.7595 29.9608 12.7595H32.8341C33.0847 12.7595 33.303 12.9482 33.3381 13.1934L33.6885 15.6139C33.7532 16.0613 34.0496 16.4413 34.4674 16.6165L36.621 17.5087C37.0361 17.6812 37.5158 17.6219 37.8824 17.3524L39.8419 15.8888C40.0414 15.7406 40.3271 15.7595 40.5049 15.9373L42.5372 17.9696C42.7151 18.1475 42.734 18.4332 42.5857 18.6354L41.1249 20.5948C40.8527 20.956 40.796 21.4331 40.9659 21.8509L41.858 24.0044C42.0305 24.4249 42.4106 24.7214 42.8607 24.7861L45.2784 25.1365C45.5291 25.1715 45.7178 25.3898 45.7178 25.6405L45.7124 28.5137L45.7149 28.5137Z" fill="white"/>
<path id="Vector_3" d="M31.3979 20.1583C27.5813 20.1583 24.4795 23.2606 24.4795 27.0767C24.4795 30.8929 27.5818 33.998 31.3979 33.998C35.214 33.998 38.3192 30.893 38.3192 27.0767C38.3165 23.2602 35.2142 20.1583 31.3979 20.1583ZM31.3979 31.4358C28.9963 31.4358 27.0423 29.4817 27.0423 27.0775C27.0423 24.676 28.9963 22.7219 31.3979 22.7219C33.8021 22.7219 35.7562 24.676 35.7562 27.0775C35.7535 29.4817 33.7994 31.4358 31.3979 31.4358Z" fill="white"/>
</g>
</svg>
      <h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_20', true) ?: 'Human-centred skills that travel'); ?></h4>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_21', true) ?: 'Every course builds transferable capabilities, including critical thinking, judgement, creativity and communication, that move with you across roles, sectors and technological change.'); ?></p>
    </div>

    <div class="fcard">
      <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
<g id="noun-puzzle-8106681-FFFFFF 1" clip-path="url(#clip0_0_8)">
<path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M61.0783 64.6587H18.8868C16.7159 64.6587 14.964 62.9068 14.964 60.7359V39.6412C14.964 39.0318 15.4591 38.5367 16.0685 38.5367H25.6257C25.4352 37.8893 25.2067 37.318 25.0163 36.8228C24.6354 35.8707 24.3307 35.0328 24.3307 34.1187C24.3307 31.1861 26.7302 28.8248 29.6628 28.8248C32.5954 28.8248 34.9567 31.1861 34.9567 34.1187C34.9567 35.0328 34.652 35.8707 34.3093 36.8228C34.0808 37.3179 33.8903 37.8893 33.6999 38.5367H38.8415V31.5319C38.8415 31.2272 38.9939 30.8844 39.2605 30.694C39.5271 30.4655 39.8698 30.3893 40.1745 30.4655C41.6599 30.7701 42.7263 31.151 43.6022 31.4938C44.4021 31.7984 44.9733 32.027 45.4684 32.027C47.1823 32.027 48.5534 30.6178 48.5534 28.942C48.5534 27.2281 47.1823 25.8571 45.4684 25.8571C44.9733 25.8571 44.402 26.0475 43.6022 26.3522C42.7263 26.6949 41.6599 27.1139 40.1745 27.4186C39.8698 27.4948 39.5271 27.3805 39.2605 27.1901C38.9939 26.9616 38.8415 26.6569 38.8415 26.3141V16.1476C38.8415 15.3097 39.5651 14.6241 40.403 14.6241H61.0021C63.211 14.6241 65.0011 16.4142 65.0011 18.6231V60.7767C65.0011 62.9095 63.2491 64.6615 61.0782 64.6615L61.0783 64.6587ZM41.0881 62.4498H61.0783C62.0305 62.4498 62.7541 61.6881 62.7541 60.774V40.7464H54.8729C55.0633 41.3938 55.2918 41.9651 55.4823 42.4984C55.8631 43.4124 56.1678 44.2503 56.1678 45.1644C56.1678 48.097 53.7684 50.4583 50.8357 50.4583C47.9031 50.4583 45.5418 48.097 45.5418 45.1644C45.5418 44.2503 45.8465 43.4124 46.1893 42.4984C46.4178 41.9651 46.6082 41.3938 46.7986 40.7464H41.0857V47.8281C41.0857 48.1328 40.9714 48.3994 40.781 48.5898C40.781 48.6279 40.7429 48.6279 40.7429 48.6279C40.5525 48.8183 40.2859 48.9326 39.9812 48.9326H39.7146C38.2673 48.6279 37.201 48.209 36.325 47.9043C35.5252 47.5615 34.9539 47.3711 34.4588 47.3711C32.7449 47.3711 31.3738 48.7422 31.3738 50.456C31.3738 52.1699 32.7449 53.541 34.4588 53.541C34.9539 53.541 35.5252 53.3125 36.325 53.0078C37.201 52.665 38.2673 52.2842 39.7146 51.9795C39.7908 51.9795 39.867 51.9414 39.9431 51.9414H40.0193C40.2859 51.9414 40.5144 52.0557 40.7048 52.2461C40.7429 52.2842 40.781 52.2842 40.781 52.3223C40.9714 52.5127 41.0857 52.7793 41.0857 53.0459V62.4508L41.0881 62.4498ZM17.1752 40.7457V60.7359C17.1752 61.6881 17.9369 62.4498 18.8891 62.4498H38.8408V54.4927C38.1933 54.6832 37.6601 54.9117 37.1269 55.1021C36.1748 55.4449 35.3749 55.7496 34.4609 55.7496C31.5282 55.7496 29.1288 53.3882 29.1288 50.4557C29.1288 47.5231 31.5282 45.1236 34.4609 45.1236C35.3749 45.1236 36.1748 45.4283 37.1269 45.8091C37.6601 45.9996 38.1933 46.2281 38.8408 46.4185V40.7435H32.2541C31.9114 40.7435 31.6067 40.5911 31.4162 40.3626C31.1877 40.096 31.1115 39.7532 31.1877 39.4105C31.4543 37.9632 31.8732 36.8968 32.216 36.0208C32.5207 35.221 32.7492 34.6116 32.7492 34.1165C32.7492 32.4407 31.34 31.0316 29.6643 31.0316C27.9504 31.0316 26.5793 32.4408 26.5793 34.1165C26.5793 34.6117 26.7697 35.2211 27.0744 36.0208C27.4172 36.8968 27.8361 37.9632 28.1409 39.4105C28.1789 39.7532 28.1028 40.096 27.9123 40.3626C27.6838 40.5911 27.3791 40.7435 27.0364 40.7435H17.1748L17.1752 40.7457ZM41.0881 38.5368H48.2457C48.5885 38.5368 48.8932 38.6891 49.0836 38.9557C49.3121 39.1842 49.3883 39.527 49.3121 39.8698C49.0455 41.3171 48.6266 42.4215 48.2838 43.2594C47.9791 44.0592 47.7506 44.6686 47.7506 45.1637C47.7506 46.8776 49.1598 48.2487 50.8356 48.2487C52.5495 48.2487 53.9586 46.8776 53.9586 45.1637C53.9586 44.6686 53.7301 44.0592 53.4254 43.2594C53.0826 42.4215 52.6637 41.3171 52.359 39.8698C52.3209 39.527 52.3971 39.1842 52.5875 38.9557C52.816 38.6891 53.1207 38.5368 53.4635 38.5368H62.7541V18.6229C62.7541 17.6327 61.9924 16.8329 61.0022 16.8329H41.0883V24.9048C41.7358 24.7144 42.3071 24.4859 42.8022 24.2954C43.7544 23.9146 44.5542 23.6099 45.4683 23.6099C48.4009 23.6099 50.8003 26.0093 50.8003 28.942C50.8003 31.8746 48.4009 34.2359 45.4683 34.2359C44.5542 34.2359 43.7544 33.9312 42.8022 33.5884C42.3071 33.3599 41.7358 33.1695 41.0883 32.979V38.5398L41.0881 38.5368ZM12.5282 35.4137H12.4901C12.2235 35.4137 11.9188 35.2995 11.7284 35.071C11.6903 35.0329 11.6142 34.9567 11.5761 34.8805L0.571586 16.9069C-0.571006 15.0407 0.0383799 12.6413 1.86649 11.4987L19.8785 0.494232C20.3737 0.15146 21.0592 0.341888 21.402 0.837004C21.4401 0.913173 21.4781 0.989348 21.4781 1.06552C21.5162 1.10361 21.5924 1.14169 21.6305 1.21787L26.1627 8.67987C26.6198 8.14666 27.0006 7.68965 27.3434 7.23259C27.9528 6.43276 28.486 5.74723 29.2477 5.29022C31.7613 3.76679 35.037 4.52853 36.5575 7.04219C38.0809 9.55585 37.3192 12.8315 34.8055 14.352C34.0438 14.809 33.1678 14.9614 32.1775 15.1518C31.6443 15.2661 31.035 15.3803 30.3875 15.5327L33.8914 21.2456C34.1961 21.7788 34.0438 22.4644 33.5106 22.7691L26.9239 26.8062C26.6573 26.9585 26.3145 26.9966 25.9718 26.8823C25.6671 26.8062 25.4386 26.5396 25.3243 26.2349C24.7911 24.8257 24.6007 23.6831 24.4103 22.7691C24.2579 21.9312 24.1437 21.3218 23.877 20.9029C23.0011 19.4556 21.0968 18.9986 19.6495 19.8746C18.1641 20.7506 17.7071 22.6548 18.6212 24.1402C18.8878 24.5591 19.3829 24.94 20.0304 25.4732C20.7921 26.0445 21.7062 26.73 22.6964 27.8345C22.925 28.063 23.0392 28.4058 23.0011 28.7105C22.963 29.0533 22.7726 29.358 22.4679 29.5103L13.1014 35.2612C13.0633 35.2993 12.9872 35.3374 12.9491 35.3374C12.7967 35.4135 12.6825 35.4135 12.5301 35.4135L12.5282 35.4137ZM20.0671 2.96952L3.04471 13.4026C2.24488 13.8977 1.97827 14.926 2.47341 15.7258L12.9065 32.7856L20.102 28.3677C19.6068 27.9106 19.1117 27.5679 18.6928 27.2251C17.8929 26.6157 17.1693 26.0444 16.7123 25.2827C15.9506 24.064 15.7602 22.6548 16.0649 21.2837C16.4076 19.8745 17.2455 18.732 18.4643 17.9702C20.9779 16.4468 24.2536 17.2466 25.7741 19.7222C26.2311 20.522 26.4215 21.3599 26.612 22.3882C26.6881 22.9214 26.8024 23.4927 26.9928 24.1402L31.3727 21.4742L27.7545 15.4947C27.5641 15.2281 27.526 14.8472 27.6403 14.5426C27.7545 14.2379 27.983 13.9713 28.3258 13.857C29.6969 13.3619 30.8395 13.1334 31.7535 12.981C32.5914 12.8287 33.2008 12.7144 33.6578 12.4478C35.1051 11.5719 35.5621 9.66757 34.648 8.18221C33.772 6.73493 31.8678 6.27793 30.4205 7.19199C30.0015 7.42051 29.6207 7.9156 29.0875 8.60119C28.5162 9.3248 27.7926 10.277 26.7261 11.2672C26.4595 11.4957 26.1549 11.61 25.8121 11.5719C25.4693 11.5338 25.2027 11.3434 25.0123 11.0387L20.0611 2.96678L20.0671 2.96952Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_0_8">
<rect width="65" height="65" fill="white"/>
</clipPath>
</defs>
</svg>
      <h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_22', true) ?: 'Interdisciplinary breadth'); ?></h4>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_23', true) ?: 'Explore ideas across history, culture, ethics, environment, digital cultures and Indigenous thought, connecting knowledge across fields rather than one narrow lane.'); ?></p>
    </div>

    <div class="fcard">
      <svg width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
<g id="noun-certificate-2355099-FFFFFF 1">
<path id="Vector" d="M5.762 53.198H42.612L39.6639 61.774C39.53 62.3101 39.6639 62.8459 40.0659 63.2479C40.4679 63.6498 41.004 63.784 41.5398 63.5159L49.5798 60.2998L57.7538 63.5159C58.2899 63.6498 58.8257 63.6498 59.2277 63.2479C59.6296 62.8459 59.7638 62.3098 59.6296 61.774L56.6816 53.198H61.5055C63.9174 53.198 65.9274 51.188 65.9274 48.7761L65.9278 7.77206C65.9278 5.36011 63.9178 3.35011 61.5059 3.35011H5.7619C3.34995 3.35011 1.33996 5.36011 1.33996 7.77206V48.9101C1.33996 51.322 3.34995 53.1981 5.7619 53.1981L5.762 53.198ZM43.282 36.046C43.684 35.778 45.4259 36.1799 46.7659 35.644C47.4359 35.376 47.972 34.8402 48.5078 34.304C48.7759 34.036 49.3117 33.5002 49.4459 33.5002C49.5798 33.5002 50.1159 34.0362 50.3839 34.304C51.5901 35.644 52.2601 35.9121 54.1359 35.9121C54.2698 35.9121 55.342 35.9121 55.6098 36.046C55.7437 36.1799 55.7437 36.8499 55.7437 37.2521C55.7437 39.2621 56.0117 39.9321 57.3517 41.2721C57.6198 41.5402 58.1556 42.076 58.1556 42.2102C58.1556 42.3441 57.6195 42.8802 57.3517 43.1482C56.8157 43.6843 56.2798 44.2202 56.0117 44.8902C55.4757 46.2302 55.8778 47.9721 55.6098 48.3741C55.3417 48.6421 53.3317 48.2402 52.1259 48.776C51.1878 49.178 50.652 49.9821 49.982 50.518H48.9101C48.2401 49.848 47.5701 49.178 46.7662 48.776C45.6942 48.3741 43.6842 48.508 43.2823 48.3741C43.1484 48.2402 43.1484 47.5702 43.1484 47.168C43.1484 45.158 42.8803 44.488 41.5403 43.148C41.2723 42.8799 40.7364 42.3441 40.7364 42.2099C40.7364 42.076 41.2725 41.5399 41.5403 41.2718C42.8803 39.9318 43.1484 39.3957 43.1484 37.2518C43.2821 36.8499 43.2821 36.1799 43.2821 36.046L43.282 36.046ZM49.982 57.62C49.714 57.4861 49.312 57.4861 49.0439 57.62L43.1479 60.0319L46.096 51.5899C46.9001 52.126 47.8382 53.5999 49.5801 53.5999C51.1882 53.5999 52.1262 52.1261 53.064 51.4561L56.0121 59.8981L49.982 57.62ZM4.02 7.772C4.02 6.83394 4.82389 6.03006 5.76194 6.03006H61.3719C62.31 6.03006 63.1139 6.83394 63.1139 7.772V48.91C63.1139 49.8481 62.31 50.6519 61.3719 50.6519H57.3519C57.4859 50.518 57.62 50.518 57.62 50.3839C58.96 49.0439 58.29 46.9 58.558 46.0958C58.96 45.0239 63.1142 43.282 59.3619 39.3958C59.0939 39.1278 58.6919 38.7258 58.558 38.592C58.1561 37.52 59.63 33.3658 54.6719 33.3658C53.198 33.3658 53.3319 33.4998 52.3939 32.562C50.25 30.4181 48.7758 30.2839 46.6319 32.562C45.6938 33.5 45.828 33.3658 44.3538 33.3658C39.3958 33.3658 40.8699 37.5197 40.4677 38.592C40.0658 39.6639 35.9116 41.54 39.6638 45.292C40.6019 46.0958 40.4677 46.0958 40.4677 47.302C40.4677 48.642 40.6016 49.8481 41.6738 50.652H5.76182C4.82376 50.652 4.01988 49.8481 4.01988 48.91L4.02 7.772Z" fill="white"/>
<path id="Vector_2" d="M12.73 13.4H52.662C53.4659 13.4 54.002 12.8639 54.002 12.06C54.002 11.2561 53.4659 10.72 52.662 10.72H12.73C11.9261 10.72 11.39 11.2561 11.39 12.06C11.39 12.73 12.06 13.4 12.73 13.4Z" fill="white"/>
<path id="Vector_3" d="M12.73 20.636H52.662C53.4659 20.636 54.002 20.0999 54.002 19.296C54.002 18.4921 53.4659 17.956 52.662 17.956H12.73C11.9261 17.956 11.39 18.4921 11.39 19.296C11.39 19.966 12.06 20.636 12.73 20.636Z" fill="white"/>
<path id="Vector_4" d="M12.73 27.738H52.662C53.4659 27.738 54.002 27.2019 54.002 26.398C54.002 25.5941 53.4659 25.058 52.662 25.058H12.73C11.9261 25.058 11.39 25.5941 11.39 26.398C11.39 27.2019 12.06 27.738 12.73 27.738Z" fill="white"/>
<path id="Vector_5" d="M12.73 38.726H34.438C35.2419 38.726 35.778 38.1899 35.778 37.386C35.778 36.5821 35.2419 36.046 34.438 36.046H12.73C11.9261 36.046 11.39 36.5821 11.39 37.386C11.39 38.056 12.06 38.726 12.73 38.726Z" fill="white"/>
<path id="Vector_6" d="M12.73 45.962H26.934C27.7379 45.962 28.274 45.4259 28.274 44.622C28.274 43.8181 27.7379 43.282 26.934 43.282H12.73C11.9261 43.282 11.39 43.8181 11.39 44.622C11.39 45.292 12.06 45.962 12.73 45.962Z" fill="white"/>
<path id="Vector_7" d="M49.58 47.57C52.5281 47.57 54.94 45.1581 54.94 42.21C54.94 39.2619 52.5281 36.85 49.58 36.85C46.6319 36.85 44.22 39.2619 44.22 42.21C44.22 45.1581 46.4981 47.57 49.58 47.57ZM49.58 39.53C51.0539 39.53 52.26 40.7361 52.26 42.21C52.26 43.6839 51.0539 44.89 49.58 44.89C48.1061 44.89 46.9 43.6839 46.9 42.21C46.9 40.7361 48.1061 39.53 49.58 39.53Z" fill="white"/>
</g>
</svg>
      <h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_24', true) ?: 'A credential with momentum'); ?></h4>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_25', true) ?: 'Complete your degree in as little as 20 months using credit from your existing college diploma, without relocating or stepping away from work or other commitments.'); ?></p>
    </div>
  </div>

  <?php $u = uottawa_cta_url( 'request' ); ?><a href="<?php echo esc_url( $u ); ?>"<?php echo uottawa_link_atts( $u ); ?> class="cta-btn"><?php echo wp_kses_post(get_post_meta($post_id, 'text_overview_26', true) ?: 'Request more information'); ?></a>

 </div>
</section>

<!-- other panels get filled in as screenshots arrive -->
<section class="panel" id="insights">
 <div class="container">

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_3', true) ?: 'Program insights'); ?></h2>
  <div class="rule"></div>

  <p style="margin-bottom:44px"><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_4', true) ?: 'The Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) is designed specifically for college diploma graduates. We recognize the work you\'ve already completed by creating a direct, supported path to your bachelor\'s degree.'); ?></p>

  <div class="banner">
    <h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_5', true) ?: 'From a college diploma to a university degree'); ?></h4>
    <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_6', true) ?: 'We make the transfer process simple: your eligible college diploma is recognized at admission and sets your pathway.'); ?></p>
  </div>

  <div class="two-col">
    <div class="dcard center">
      <h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_7', true) ?: 'Eligible 2-year or 3-year college diploma'); ?></h4>
      <div class="op">+</div>
      <div class="strong"><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_8', true) ?: 'remaining uOttawa Online courses'); ?></div>
      <div class="thin"><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_9', true) ?: '(45 or 60 units, depending on your diploma)'); ?></div>
      <div class="op">=</div>
      <div class="strong"><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_10', true) ?: 'Bachelor of Arts, Interdisciplinary Studies'); ?></div>
    </div>

    <div class="dcard">
      <h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_11', true) ?: 'How it works'); ?></h4>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_program_insights_12', true) ?: 'The University of Ottawa recognizes your eligible college diploma with a block transfer at admission. This process determines which of the two accelerated pathways applies to you. Complete the remaining 45 units (~20 months) or 60 units (~28 months) through uOttawa Online to earn your degree and graduate.'); ?></p>
    </div>
  </div>

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_course_information_1', true) ?: 'Course information'); ?></h2>
  <div class="rule"></div>

  <p style="margin-bottom:44px"><?php echo wp_kses_post(get_post_meta($post_id, 'text_course_information_2', true) ?: 'Explore ideas across disciplines while building transferable, workplace-relevant skills such as digital literacy, interdisciplinary problem-solving, cultural context and historical understanding. Courses progress from 1000-level foundations through 4000-level application.'); ?></p>

  <div class="levels">
    <div>
      <h5><?php echo wp_kses_post(get_post_meta($post_id, 'text_course_information_3', true) ?: '1000-level foundations'); ?></h5>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_course_information_4', true) ?: 'Rebuild core academic skills and explore the disciplines that shape how we understand the world, from digital literacy and global history to Indigenous studies.'); ?></p>
    </div>
    <div>
      <h5><?php echo wp_kses_post(get_post_meta($post_id, 'text_course_information_5', true) ?: '2000-level breadth'); ?></h5>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_course_information_6', true) ?: 'Expand your thinking across human experience: culture, communication, ethics, and knowledge systems from ancient to contemporary times.'); ?></p>
    </div>
    <div>
      <h5><?php echo wp_kses_post(get_post_meta($post_id, 'text_course_information_7', true) ?: '3000-level integration'); ?></h5>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_course_information_8', true) ?: 'Examine how ideas, identities and cultures intersect across time and place, developing interdisciplinary analytical range.'); ?></p>
    </div>
    <div>
      <h5><?php echo wp_kses_post(get_post_meta($post_id, 'text_course_information_9', true) ?: '4000-level application'); ?></h5>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_course_information_10', true) ?: 'Apply everything you\'re learning and synthesize your ideas in a capstone-style course.'); ?></p>
    </div>
  </div>

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_1', true) ?: 'Areas of study'); ?></h2>
  <div class="rule"></div>

  <div class="areas">
    <div class="areas-grid">
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_2', true) ?: 'Global history'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_3', true) ?: 'Canadian culture'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_4', true) ?: 'Literature'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_5', true) ?: 'Architecture &amp; art'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_6', true) ?: 'Environmental studies'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_7', true) ?: 'Indigenous thought'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_8', true) ?: 'Digital cultures'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_9', true) ?: 'Ethics'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_10', true) ?: 'Agency, identity and society'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_11', true) ?: 'Communication'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_12', true) ?: 'Interpretation'); ?></span>
      <span><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_13', true) ?: 'Critical analysis'); ?></span>
    </div>
    <img src="/wp-content/uploads/2026/08/09a3437c81e0706f56f386a8cdcda7ccbf69d2b5.webp" alt="Colleagues talking in an office">
  </div>

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_15', true) ?: 'Pathway 1: 45-unit accelerated pathway'); ?></h2>
  <div class="rule"></div>

  <p class="pathway-note"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_220', true) ?: 'Please note that the pathway is a suggestion. Your chosen course load/semester will determine your individual pathway.'); ?></p>

  <p class="yearlbl"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_16', true) ?: 'Year 1'); ?></p>

  <details class="acc" open>
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_17', true) ?: 'CMN 2130 - Interpersonal Communication'); ?></summary>
    <div class="acc-body">
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_18', true) ?: 'Major theories and techniques of interpersonal communication, applied to professional and social situations.'); ?></p>
      <a href="https://catalogue.uottawa.ca/search/?P=CMN%202130" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_19', true) ?: 'Learn more'); ?></a>
    </div>
  </details>

  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_20', true) ?: 'DCN 1101 - Digital Literacy'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_151', true) ?: 'Builds foundational digital skills: evaluating information and technology, understanding digital media, and using core productivity tools.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=DCN%201101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_21', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_22', true) ?: 'EAS 1101 - Introduction to Indigenous Studies'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_152', true) ?: 'An introduction to Indigenous worldviews, histories and contemporary issues across Turtle Island.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=EAS%201101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_23', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_24', true) ?: 'HIS 1110 - Introduction to Global History'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_153', true) ?: 'A survey of major turning points and cross-cultural connections that have shaped the modern world.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=HIS%201110" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_25', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_26', true) ?: 'EAS 2172 - Indigenous Peoples, Technology, Media, and Law'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_154', true) ?: 'Examines the intersection of Indigenous communities with technology, media representation and legal frameworks.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=EAS%202172" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_27', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_28', true) ?: 'PHI 2100 - Animal Ethics'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_155', true) ?: 'Explores the moral status of animals and the ethical questions raised by our relationships with them.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=PHI%202100" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_29', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_30', true) ?: 'AHL 2170 - Interdisciplinary Studies: Expanding Boundaries of Knowledge'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_156', true) ?: 'Introduces the interdisciplinary methods and thinking that connect ideas across the humanities.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=AHL%202170" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_31', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_32', true) ?: 'AHL 2171 - The Persistence of Magic: Myth, Ritual, and the Human Experience'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_157', true) ?: 'Explores how myth, ritual and belief continue to shape human culture and meaning-making.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=AHL%202171" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_33', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc group-end"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_34', true) ?: 'GEG 2110 - Sustainable Cities'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_158', true) ?: 'Examines the environmental, social and planning challenges of building sustainable urban environments.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=GEG%202110" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_35', true) ?: 'Learn more'); ?></a></div></details>

  <p class="yearlbl"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_36', true) ?: 'Year 2'); ?></p>

  <details class="acc" open>
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_37', true) ?: 'LCM 3101 - World Cultures in Contact'); ?></summary>
    <div class="acc-body">
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_38', true) ?: 'Explores how cultures interact, exchange ideas and influence one another across history.'); ?></p>
      <a href="https://catalogue.uottawa.ca/search/?P=LCM%203101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_39', true) ?: 'Learn more'); ?></a>
    </div>
  </details>

  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_40', true) ?: 'SRS 3173 - Bible and Culture'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_159', true) ?: 'Examines the Bible\'s influence on literature, art and culture across centuries.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=SRS%203173" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_41', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_42', true) ?: 'AHL 3170 - Exploring Art and Architecture'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_160', true) ?: 'Surveys architectural traditions and their cultural, historical and aesthetic significance.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=AHL%203170" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_43', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_44', true) ?: 'LCM 3105 - Identities, Ideas, and Ideologies Across World Cultures'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_161', true) ?: 'Examines how identity and ideology are constructed and contested across world cultures.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=LCM%203105" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_45', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_46', true) ?: 'AHL 4170 - Harnessing Interdisciplinary Thinking: Knowledge for Insight Application'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_162', true) ?: 'A capstone-style course applying interdisciplinary methods to real-world problems and insight generation.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=AHL%204170" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_47', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc group-end"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_48', true) ?: 'PHI 2122 - Ancient Wisdom'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_163', true) ?: 'Explores philosophical traditions and enduring ideas from the ancient world.'); ?></p><a href="https://catalogue.uottawa.ca/en/courses/phi/" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_49', true) ?: 'Learn more'); ?></a></div></details>

  <?php $u = uottawa_cta_url( 'coursemap' ); ?><a href="<?php echo esc_url( $u ); ?>"<?php echo uottawa_link_atts( $u ); ?> class="cta-btn"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_50', true) ?: 'Download course map'); ?></a>

  <h2 style="margin-top:64px"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_51', true) ?: 'Pathway 2: 60-unit accelerated pathway'); ?></h2>
  <div class="rule"></div>

  <p class="pathway-note"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_221', true) ?: 'Please note that the pathway is a suggestion. Your chosen course load/semester will determine your individual pathway.'); ?></p>

  <p class="yearlbl"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_52', true) ?: 'Year 1'); ?></p>

  <details class="acc" open>
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_53', true) ?: 'CMN 2130 - Interpersonal Communication'); ?></summary>
    <div class="acc-body">
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_54', true) ?: 'Major theories and techniques of interpersonal communication, applied to professional and social situations.'); ?></p>
      <a href="https://catalogue.uottawa.ca/search/?P=CMN%202130" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_55', true) ?: 'Learn more'); ?></a>
    </div>
  </details>

  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_56', true) ?: 'DCN 1101 - Digital Literacy'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_164', true) ?: 'Builds foundational digital skills: evaluating information and technology, understanding digital media, and using core productivity tools.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=DCN%201101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_57', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_58', true) ?: 'EAS 1101 - Introduction to Indigenous Studies'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_165', true) ?: 'An introduction to Indigenous worldviews, histories and contemporary issues across Turtle Island.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=EAS%201101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_59', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_60', true) ?: 'HIS 1110 - Introduction to Global History'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_166', true) ?: 'A survey of major turning points and cross-cultural connections that have shaped the modern world.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=HIS%201110" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_61', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_62', true) ?: 'EAS 2172 - Indigenous Peoples, Technology, Media, and Law'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_167', true) ?: 'Examines the intersection of Indigenous communities with technology, media representation and legal frameworks.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=EAS%202172" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_63', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_64', true) ?: 'PHI 2100 - Animal Ethics'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_168', true) ?: 'Explores the moral status of animals and the ethical questions raised by our relationships with them.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=PHI%202100" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_65', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_66', true) ?: 'AHL 2170 - Interdisciplinary Studies: Expanding Boundaries of Knowledge'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_169', true) ?: 'Introduces the interdisciplinary methods and thinking that connect ideas across the humanities.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=AHL%202170" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_67', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_68', true) ?: 'AHL 2171 - The Persistence of Magic: Myth, Ritual, and the Human Experience'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_170', true) ?: 'Explores how myth, ritual and belief continue to shape human culture and meaning-making.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=AHL%202171" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_69', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc group-end"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_70', true) ?: 'GEG 2110 - Sustainable Cities'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_171', true) ?: 'Examines the environmental, social and planning challenges of building sustainable urban environments.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=GEG%202110" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_71', true) ?: 'Learn more'); ?></a></div></details>

  <p class="yearlbl"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_72', true) ?: 'Year 2'); ?></p>

  <details class="acc" open>
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_73', true) ?: 'LCM 3101 - World Cultures in Contact'); ?></summary>
    <div class="acc-body">
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_74', true) ?: 'Explores how cultures interact, exchange ideas and influence one another across history.'); ?></p>
      <a href="https://catalogue.uottawa.ca/search/?P=LCM%203101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_75', true) ?: 'Learn more'); ?></a>
    </div>
  </details>

  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_76', true) ?: 'SRS 3173 - Bible and Culture'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_172', true) ?: 'Examines the Bible\'s influence on literature, art and culture across centuries.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=SRS%203173" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_77', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_78', true) ?: 'AHL 3170 - Exploring Art and Architecture'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_173', true) ?: 'Surveys architectural traditions and their cultural, historical and aesthetic significance.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=AHL%203170" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_79', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_80', true) ?: 'LCM 3105 - Identities, Ideas, and Ideologies Across World Cultures'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_174', true) ?: 'Examines how identity and ideology are constructed and contested across world cultures.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=LCM%203105" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_81', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_82', true) ?: 'AHL 4170 - Harnessing Interdisciplinary Thinking: Knowledge for Insight Application'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_175', true) ?: 'A capstone-style course applying interdisciplinary methods to real-world problems and insight generation.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=AHL%204170" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_83', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_84', true) ?: 'PHI 2122 - Ancient Wisdom'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_176', true) ?: 'Explores philosophical traditions and enduring ideas from the ancient world.'); ?></p><a href="https://catalogue.uottawa.ca/en/courses/phi/" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_85', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_86', true) ?: 'LIN 1300 - What Is Language?'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_177', true) ?: 'An introduction to the structure, diversity and social role of human language.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=LIN%201300" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_87', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_88', true) ?: 'HIS 1101 - The Making of Canada'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_178', true) ?: 'Traces the historical events and forces that shaped modern Canada.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=HIS%201101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_89', true) ?: 'Learn more'); ?></a></div></details>
  <details class="acc group-end"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_90', true) ?: 'ENV 1101 - Global Environmental Challenges'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_179', true) ?: 'Introduces the major environmental issues facing the world today and approaches to addressing them.'); ?></p><a href="https://catalogue.uottawa.ca/search/?P=ENV%201101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_91', true) ?: 'Learn more'); ?></a></div></details>

  <p class="yearlbl"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_92', true) ?: 'Year 3'); ?></p>

  <details class="acc" open>
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_93', true) ?: 'ENG 2107 - Introduction to Canadian Literature'); ?></summary>
    <div class="acc-body">
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_94', true) ?: 'An introduction to authors, works, and movements in Canadian Literature in their social, cultural, and historical contexts.'); ?></p>
      <a href="https://catalogue.uottawa.ca/search/?P=ENG%202107" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_95', true) ?: 'Learn more'); ?></a>
    </div>
  </details>

  <details class="acc group-end"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_96', true) ?: 'SRS 2173 - World Religions'); ?></summary><div class="acc-body"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_180', true) ?: 'An exploration of the distinct beliefs, practices, and histories of the world\'s major religious traditions.'); ?></p><a href="https://catalogue.uottawa.ca/en/courses/srs/" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_97', true) ?: 'Learn more'); ?></a></div></details>

  <?php $u = uottawa_cta_url( 'coursemap' ); ?><a href="<?php echo esc_url( $u ); ?>"<?php echo uottawa_link_atts( $u ); ?> class="cta-btn"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_98', true) ?: 'Download course map'); ?></a>

  <p class="note-italic"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_99', true) ?: '*Course list subject to change. Consult the uOttawa academic calendar for the most up-to-date information.'); ?></p>

 </div>
</section>
<section class="panel" id="outcomes">
 <div class="container">

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_100', true) ?: 'Career &amp; learning outcomes'); ?></h2>
  <div class="rule"></div>

  <p style="margin-bottom:52px"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_101', true) ?: 'You will graduate with practical, human-centred skills that map to real roles. Outcomes vary by experience and location, but the pathways below reflect where graduates of interdisciplinary arts programs typically land.'); ?></p>

  <details class="acc" open>
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_102', true) ?: 'Program &amp; operations leadership'); ?></summary>
    <div class="acc-body rich">
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_103', true) ?: 'Typical roles:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_104', true) ?: 'Program manager, operations manager, business transformation coordinator'); ?></p>
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_105', true) ?: 'What you\'ll learn to do:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_106', true) ?: 'Apply interdisciplinary thinking to complex organizational problems, coordinate cross-functional work and manage change.'); ?></p>
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_107', true) ?: 'Relevant courses:'); ?></b></p>
      <ul>
        <li><a href="https://catalogue.uottawa.ca/search/?P=AHL%202170" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_108', true) ?: 'AHL 2170 Interdisciplinary Studies: Expanding Boundaries of Knowledge'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/search/?P=AHL%204170" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_109', true) ?: 'AHL 4170 Harnessing Interdisciplinary Thinking'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/search/?P=DCN%201101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_110', true) ?: 'DCN 1101 Digital Literacy'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/search/?P=CMN%202130" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_111', true) ?: 'CMN 2130 Interpersonal Communication'); ?></a></li>
      </ul>
    </div>
  </details>

  <details class="acc">
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_112', true) ?: 'Communications &amp; community engagement'); ?></summary>
    <div class="acc-body rich">
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_181', true) ?: 'Typical roles:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_182', true) ?: 'Communications manager, community engagement lead'); ?></p>
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_183', true) ?: 'What you\'ll learn to do:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_184', true) ?: 'Communicate clearly across audiences, interpret cultural context and build engagement strategies grounded in critical analysis.'); ?></p>
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_185', true) ?: 'Relevant courses:'); ?></b></p>
      <ul>
        <li><a href="https://catalogue.uottawa.ca/search/?P=CMN%202130" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_186', true) ?: 'CMN 2130 Interpersonal Communication'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/search/?P=LCM%203101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_187', true) ?: 'LCM 3101 World Cultures in Contact'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/search/?P=LCM%203105" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_188', true) ?: 'LCM 3105 Identities, Ideas, and Ideologies Across World Cultures'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/search/?P=AHL%202171" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_189', true) ?: 'AHL 2171 The Persistence of Magic'); ?></a></li>
      </ul>
    </div>
  </details>

  <details class="acc">
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_113', true) ?: 'Public service &amp; policy'); ?></summary>
    <div class="acc-body rich">
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_190', true) ?: 'Typical roles:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_191', true) ?: 'Policy coordinator'); ?></p>
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_192', true) ?: 'What you\'ll learn to do:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_193', true) ?: 'Analyze historical and global context, apply ethical reasoning and connect policy questions to lived experience.'); ?></p>
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_194', true) ?: 'Relevant courses:'); ?></b></p>
      <ul>
        <li><a href="https://catalogue.uottawa.ca/search/?P=HIS%201110" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_195', true) ?: 'HIS 1110 Introduction to Global History'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/search/?P=PHI%202100" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_196', true) ?: 'PHI 2100 Animal Ethics'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/search/?P=EAS%202172" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_197', true) ?: 'EAS 2172 Indigenous Peoples, Technology, Media, and Law'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/search/?P=GEG%202110" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_198', true) ?: 'GEG 2110 Sustainable Cities'); ?></a></li>
      </ul>
    </div>
  </details>

  <details class="acc">
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_114', true) ?: 'Sustainability, environment, &amp; cities'); ?></summary>
    <div class="acc-body rich">
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_199', true) ?: 'Typical roles:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_200', true) ?: 'Sustainability coordinator, environmental program coordinator, community planning assistant'); ?></p>
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_201', true) ?: 'What you\'ll learn to do:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_202', true) ?: 'Evaluate environmental and urban challenges and apply sustainability frameworks to real-world planning questions.'); ?></p>
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_203', true) ?: 'Relevant courses:'); ?></b></p>
      <ul>
        <li><a href="https://catalogue.uottawa.ca/search/?P=GEG%202110" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_204', true) ?: 'GEG 2110 Sustainable Cities'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/search/?P=ENV%201101" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_205', true) ?: 'ENV 1101 Global Environmental Challenges (60-unit pathway)'); ?></a></li>
      </ul>
    </div>
  </details>

  <details class="acc group-end">
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_115', true) ?: 'Further studies &amp; professional pathways'); ?></summary>
    <div class="acc-body rich">
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_206', true) ?: 'Typical roles:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_207', true) ?: 'Graduate study, professional certification pathways'); ?></p>
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_208', true) ?: 'What you\'ll learn to do:'); ?></b> <?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_209', true) ?: 'Build the interdisciplinary foundation and human-centred skills that may support eligibility for future graduate study or professional pathways, depending on the specific program and admission requirements.'); ?></p>
      <p><b><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_210', true) ?: 'Relevant courses:'); ?></b></p>
      <ul>
        <li><a href="https://catalogue.uottawa.ca/search/?P=AHL%204170" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_211', true) ?: 'AHL 4170 Harnessing Interdisciplinary Thinking (capstone-style)'); ?></a></li>
        <li><a href="https://catalogue.uottawa.ca/en/courses/phi/" target="_blank" rel="noopener"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_212', true) ?: 'PHI 2122 Ancient Wisdom'); ?></a></li>
      </ul>
    </div>
  </details>

  <?php $u = uottawa_cta_url( 'request' ); ?><a href="<?php echo esc_url( $u ); ?>"<?php echo uottawa_link_atts( $u ); ?> class="cta-btn"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_116', true) ?: 'Request more information'); ?></a>

 </div>
</section>
<section class="panel" id="admissions">
 <div class="container">

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_117', true) ?: 'Admission requirements'); ?></h2>
  <div class="rule"></div>

  <div class="split adm">
    <div>
      <ul class="reqs">
        <li><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_118', true) ?: 'Completed a 2-year or 3-year accredited Canadian college diploma'); ?></li>
        <li><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_119', true) ?: 'Minimum admission average of 63%'); ?></li>
        <li><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_120', true) ?: 'English proficiency'); ?></li>
        <li><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_121', true) ?: '3+ years of work or professional experience'); ?></li>
      </ul>
      <p class="note-italic" style="margin-top:0"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_122', true) ?: 'Your previous credential and educational background will determine your exact program pathway (45 or 60 units). UOttawa confirms final admission and credit recognition.'); ?></p>
    </div>
    <img src="/wp-content/uploads/2026/08/62d370ec3bf8ccd7d20c0419ced8b558a214aee4.webp" alt="Student at a desk">
  </div>

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_1', true) ?: 'Your next step, with someone in your corner.'); ?></h2>
  <div class="rule"></div>
  <p style="margin-bottom:48px"><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_2', true) ?: 'Applying to a uOttawa Online program isn\'t something you have to figure out alone. An enrolment advisor will walk you through it: what you\'ll need, what your prior learning could count toward, and whether the timing works for the life you\'re already living.'); ?></p>

  <div class="levels">
    <div><h5><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_3', true) ?: '1. Connect with an enrolment advisor'); ?></h5><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_4', true) ?: 'Start with a conversation. Your advisor will ask about your background, your goals, and your timeline, and help you figure out whether, and how, a uOttawa Online program fits.'); ?></p></div>
    <div><h5><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_5', true) ?: '2. Review your experience'); ?></h5><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_6', true) ?: 'Your advisor will ask about your prior post-secondary credit or professional experience to see what may be recognized toward your program, so you\'re not starting from zero.'); ?></p></div>
    <div><h5><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_7', true) ?: '3. Submit your application'); ?></h5><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_8', true) ?: 'With your advisor\'s guidance, you\'ll pull together what\'s needed and submit your application, no guessing at the process on your own.'); ?></p></div>
    <div><h5><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_9', true) ?: '4. Receive your decision'); ?></h5><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_10', true) ?: 'Once you have an offer, our team can help you plan your first term, from enrolment through to your first login.'); ?></p></div>
  </div>

  <?php $u = uottawa_cta_url( 'apply' ); ?><a href="<?php echo esc_url( $u ); ?>"<?php echo uottawa_link_atts( $u ); ?> class="cta-btn"><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_11', true) ?: 'Start your application'); ?></a>

  <h2 style="margin-top:64px"><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_12', true) ?: 'What your enrolment advisor actually does'); ?></h2>
  <div class="rule"></div>

  <div class="cards">
    <div class="fcard"><h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_13', true) ?: 'Helps you along the way'); ?></h4><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_14', true) ?: 'Get direct answers to your specific questions about the program, schedule, or fit. You\'ll have a consistent point of contact throughout your journey.'); ?></p></div>
    <div class="fcard"><h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_15', true) ?: 'Talks admissions'); ?></h4><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_16', true) ?: 'Navigate the submission process with step-by-step help. Your advisor ensures nothing is missed and guides you from first login through enrolment.'); ?></p></div>
    <div class="fcard"><h4><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_17', true) ?: 'Assesses the details'); ?></h4><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_18', true) ?: 'Discuss your background before you even apply. We\'ll review your prior post-secondary credits and professional experience to see what counts toward your degree.'); ?></p></div>
  </div>

  <?php $u = uottawa_cta_url( 'apply' ); ?><a href="<?php echo esc_url( $u ); ?>"<?php echo uottawa_link_atts( $u ); ?> class="cta-btn"><?php echo wp_kses_post(get_post_meta($post_id, 'text_admissions_19', true) ?: 'Start your application'); ?></a>

  <div class="split tuition">
    <div>
      <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_126', true) ?: 'Tuition'); ?></h2>
      <div class="rule"></div>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_127', true) ?: 'A university degree is a significant milestone, and financial planning is an important part of that journey. Tuition depends on your admission pathway (45 or 60 units).'); ?></p>
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_128', true) ?: 'Contact our team for more detailed tuition information, including payment options and financial aid opportunities.'); ?></p>
      <?php $u = uottawa_cta_url( 'request' ); ?><a href="<?php echo esc_url( $u ); ?>"<?php echo uottawa_link_atts( $u ); ?> class="cta-btn"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_129', true) ?: 'Request more information'); ?></a>
      <p class="note-italic"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_130', true) ?: '*Tuition and fees are subject to change each academic year. Textbooks may be required for some courses and are an additional cost.'); ?></p>
    </div>
    <img src="/wp-content/uploads/2026/08/7c98b18301ccaa1ff078e67d5351da8cdd8d49e9.webp" alt="Student using a tablet">
  </div>

 </div>
</section>
<section class="panel" id="faq">
 <div class="container">

  <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_132', true) ?: 'Frequently asked questions'); ?></h2>
  <div class="rule"></div>

  <details class="acc" open>
    <summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_133', true) ?: 'Who is the Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) for?'); ?></summary>
    <div class="acc-body rich">
      <p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_134', true) ?: 'Our program is designed for working adults across Canada who hold a college diploma and want to build on that foundation with a uOttawa degree. It may be a strong fit for professionals in healthcare, education, technology, the trades, the public sector, the not-for-profit sector and other fields where a bachelor\'s degree can support career growth.'); ?></p>
    </div>
  </details>

  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_135', true) ?: 'Is the program fully online?'); ?></summary><div class="acc-body rich"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_213', true) ?: 'Yes. Our Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) is delivered fully online, making it a flexible option for working adults who need to balance school with work, family and other responsibilities.'); ?></p></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_136', true) ?: 'What is the language of instruction for this program?'); ?></summary><div class="acc-body rich"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_214', true) ?: 'English.'); ?></p></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_137', true) ?: 'How does transfer credit work?'); ?></summary><div class="acc-body rich"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_215', true) ?: 'Our program is designed to recognize prior college learning at admission. Your exact pathway will depend on your previous credential and educational background. An advisor can help you understand which pathway may apply to you.'); ?></p></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_138', true) ?: 'Do I need to stop working to complete the program?'); ?></summary><div class="acc-body rich"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_216', true) ?: 'No. Our program is designed for working adults, so you can continue working while studying online.'); ?></p></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_139', true) ?: 'What skills will I build?'); ?></summary><div class="acc-body rich"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_217', true) ?: 'You\'ll build transferable, workplace-relevant skills such as critical thinking, communication, judgement, creativity, digital fluency, interdisciplinary problem-solving, cultural literacy and historical understanding.'); ?></p></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_140', true) ?: 'What makes this different from a narrow career credential?'); ?></summary><div class="acc-body rich"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_218', true) ?: 'The Bachelor of Arts, Interdisciplinary Studies (Online, Accelerated) is accelerated, broad, interdisciplinary and future-focused. Instead of preparing you for one narrow role, it helps you build skills that can travel across roles, sectors and career changes.'); ?></p></div></details>
  <details class="acc"><summary><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_141', true) ?: 'Can this degree support graduate study or professional pathways?'); ?></summary><div class="acc-body rich"><p><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_219', true) ?: 'It may help support eligibility for future graduate study or professional pathways, depending on the specific program, institution and admission requirements. Students should confirm requirements for any future program they\'re considering.'); ?></p></div></details>

 </div>
</section>

</div><!-- /.tabs-wrap -->

<!-- ---------- SUPPORTING YOUR SUCCESS ---------- -->
<section class="success">
 <div class="container">
  <h3><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_142', true) ?: 'uOttawa: Supporting your success'); ?></h3>
  <div class="rule"></div>

  <div class="success-grid">
    <div>
      <div class="num"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_143', true) ?: '12,000'); ?></div>
      <div class="lbl"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_144', true) ?: 'professors, researchers'); ?><br><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_145', true) ?: 'and support staff'); ?></div>
    </div>
    <div>
      <div class="num"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_146', true) ?: '300,000+'); ?></div>
      <div class="lbl"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_147', true) ?: 'alumni worldwide'); ?></div>
    </div>
    <div>
      <div class="num"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_148', true) ?: '90%'); ?></div>
      <div class="lbl"><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_149', true) ?: 'employment rate six'); ?><br><?php echo wp_kses_post(get_post_meta($post_id, 'text_areas_of_study_150', true) ?: 'months after graduation'); ?></div>
    </div>
  </div>
 </div>
</section>

<!-- ---------- FINAL CTA ---------- -->
<section class="final-cta">
 <div class="container">
  <div class="title-col">
    <h2><?php echo wp_kses_post(get_post_meta($post_id, 'text_final_cta_1', true) ?: 'Your degree is closer than you think'); ?></h2>
    <p class="lede"><?php echo wp_kses_post(get_post_meta($post_id, 'text_final_cta_2', true) ?: 'Build on your college diploma. Strengthen the human skills employers value. Earn a career-relevant degree 100% online.'); ?></p>
  </div>

  <div class="cta-col">
    <div>
      <?php $u = uottawa_cta_url( 'request' ); ?><a href="<?php echo esc_url( $u ); ?>"<?php echo uottawa_link_atts( $u ); ?> class="cta-btn"><?php echo wp_kses_post(get_post_meta($post_id, 'text_final_cta_3', true) ?: 'Request more info'); ?></a>
      <p class="cta-note"><?php echo wp_kses_post(get_post_meta($post_id, 'text_final_cta_4', true) ?: 'Get program details, tuition information, and application instructions.'); ?></p>
    </div>

    <div>
      <?php $u = uottawa_cta_url( 'apply' ); ?><a href="<?php echo esc_url( $u ); ?>"<?php echo uottawa_link_atts( $u ); ?> class="cta-btn"><?php echo wp_kses_post(get_post_meta($post_id, 'text_final_cta_5', true) ?: 'Start your application'); ?></a>
      <p class="cta-note"><?php echo wp_kses_post(get_post_meta($post_id, 'text_final_cta_6', true) ?: 'Begin your journey toward building in-demand, future-proof skills.'); ?></p>
    </div>
  </div>
 </div>
</section>

<!-- ---------- FOOTER ---------- -->

    </div>

    <script>
      document.getElementById('tabbar').addEventListener('click', function (e) {
        var btn = e.target.closest('button[data-tab]');
        if (!btn) return;

        this.querySelectorAll('button').forEach(function (b) {
          b.classList.toggle('active', b === btn);
        });
        document.querySelectorAll('.panel').forEach(function (p) {
          p.classList.toggle('active', p.id === btn.dataset.tab);
        });

        // Panels differ in length, so a tab opened from halfway down the last
        // one would otherwise start halfway down. Bring the reader back to
        // where the bar pins, with the new panel beginning just beneath it.
        var wrap = document.querySelector('.tabs-wrap');
        if (!wrap) return;
        var headerH = parseFloat(
          getComputedStyle(document.documentElement).getPropertyValue('--header-h')
        ) || 70;
        var top = wrap.getBoundingClientRect().top + window.pageYOffset - headerH;
        if (window.pageYOffset > top) {
          window.scrollTo({ top: top, behavior: 'smooth' });
        }
      });
    </script>
<!--
    // Pardot tracking code | added: 2026-Oct-01
    <script type='text/javascript'>
        piAId = '1132142';
        piCId = '';
        piHostname = 'go.online.uottawa.ca';

        (function() {
            function async_load(){
                var s = document.createElement('script'); s.type = 'text/javascript';
                s.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + piHostname + '/pd.js';
                var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);
            }
            if(window.attachEvent) { window.attachEvent('onload', async_load); }
            else { window.addEventListener('load', async_load, false); }
        })();
    </script> -->
    <?php
    return ob_get_clean();
}
add_shortcode('uottawa_landing', 'uottawa_landing_page_shortcode');
