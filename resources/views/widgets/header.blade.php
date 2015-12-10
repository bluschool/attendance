<?php $navbar = new Illuminate\Support\Fluent([
    'id'    => 'host',
    'title' => 'Host Broadcasters',
    'url'   => handles('blupl::host/member'),
    'menu'  => view('blupl/host::widgets._menu'),
]); ?>

@decorator('navbar', $navbar)
