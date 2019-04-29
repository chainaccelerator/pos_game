<?php

require_once __DIR__ . '/date.php';

D::init();

require_once '../vendor/autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;

require_once __DIR__ . '/conf.php';
require_once __DIR__ . '/graph.php';
require_once __DIR__ . '/graph_label.php';
require_once __DIR__ . '/graph_relationship.php';
require_once __DIR__ . '/draw.php';
require_once __DIR__ . '/draw_point.php';
require_once __DIR__ . '/score.php';
require_once __DIR__ . '/text.php';
require_once __DIR__ . '/style.php';
require_once __DIR__ . '/account.php';
require_once __DIR__ . '/node.php';
require_once __DIR__ . '/account_run_node.php';
require_once __DIR__ . '/game_text.php';
require_once __DIR__ . '/game_style.php';
require_once __DIR__ . '/game_score_item_type.php';
require_once __DIR__ . '/game_score_item.php';
require_once __DIR__ . '/game_score.php';
require_once __DIR__ . '/game_account.php';

Account::$version = 'Game_account';
Node::$version = 'Game_node';

