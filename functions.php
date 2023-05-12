<?php
// CSS読み込み
function add_theme_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

/* ---------- カスタム投稿の追加 ---------- */
add_action('init', 'create_post_type');
function create_post_type()
{
    register_post_type( // カスタム投稿タイプの追加関数
        'news', //カスタム投稿タイプ名（半角英数字の小文字）
        array( //オプション（以下）
            'label' => '新着情報', // 管理画面上の表示（日本語でもOK）
            'public' => true, // 管理画面に表示するかどうかの指定
            'has_archive' => true, // 投稿した記事の一覧ページを作成する
            'menu_position' => 5, // 管理画面メニューの表示位置（投稿の下に追加）
            'show_in_rest' => true, // Gutenbergの有効化
            'supports' => array( // サポートする機能（以下）
                'title',  // タイトル
                'editor', // エディター
                'thumbnail', // アイキャッチ画像
                'revisions' // リビジョンの保存
            ),
        )
    );
}

function post_has_archive($args, $post_type)
{
    if ('post' === $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'blog';
        $args['label'] = 'ブログ';
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

/* 特定のページの１ページあたりの表示数を変更する */
function change_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) /* メインクエリでの表示数 */
        return;
    if ($query->is_post_type_archive('news')) { //アーカイブページの場合
        $query->set('posts_per_page', '10'); /* 表示件数を指定する。-1で全件表示できる */
        return;
    }
    if ($query->is_archive()) { //アーカイブページの場合
        $query->set('posts_per_page', '9'); /* 表示件数を指定する。-1で全件表示できる */
        return;
    }
}
add_action('pre_get_posts', 'change_posts_per_page');
