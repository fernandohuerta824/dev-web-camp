<?php

function auth () {
    session_start();

    if(!isset($_SESSION['id'])) {
        header('Location: /');
        exit;
    }
}

function debug($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

function s($html): string {
    return htmlspecialchars($html);
}

function paginaActual(string $url): bool {
    return str_contains($_SERVER['PATH_INFO'], $url);
}

function aos_animation(): string {
    $efectos = ['fade-up', 'fade-right', 'fade-left', 'fade-up-right', 'fade-down', 'fade-up-left', 'fade-down-right', 'fade-down-left', 'flip-left', 'flip-right', 'flip-up', 'flip-down', 'zoom-in', 'zoom-in-up', 'zoom-in-right', 'zoom-in-left', 'zoom-in-down', 'zoom-out', 'zoom-out-up', 'zoom-out-right', 'zoom-out-left', 'zoom-out-down','fade', 'zoom-in', 'zoom-out', ];

    return $efectos[array_rand($efectos)];
}